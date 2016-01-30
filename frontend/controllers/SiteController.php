<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Autocat;
use common\models\Auto;
use common\models\Transferorder;
use yii\helpers\BaseJson;
use yii\db\Query;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\services\DirectionsClient;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\services\DirectionsWayPoint;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = 'layout';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $auto = Autocat::find()->all();
        $model = new Transferorder();
        
        return $this->render('index',['auto' => $auto,'model' => $model]);
    }
    
    public function actionUl(){
        return $this->renderPartial('ul');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(['t4le777@gmail.com'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }public function actionLetter(){
        return $this->render('letter');
    }
	
	//passenger form render
	public function actionForm(){
                $model = new Transferorder();
                if ( !empty(Yii::$app->request->get('Transferorder')['from']) and  !empty(Yii::$app->request->get('Transferorder')['to']) and !empty(Yii::$app->request->get('Transferorder')['car'])) {
                    if($model->load(Yii::$app->request->post())){
                        $jsondata = BaseJson::decode(Yii::$app->request->get('Transferorder')['car'], true);
                        $model->car = $jsondata['car'];
                        $amount = Yii::$app->db->createCommand('SELECT priceT , cent FROM auto  where id = :json')->bindValue(':json', $jsondata["car"])->queryOne();
                        
                        
                        if(empty($model->anotherd) and empty($model->anotherd1) and empty($model->anotherd2)){
                            $direction =   new DirectionsClient([
                            'params' => [
                                'origin' => Yii::$app->request->get('Transferorder')['from'],
                                'destination' => Yii::$app->request->get('Transferorder')['to'],
                               // 'waypoints' => 'Salyan, Azerbaijan | Ganja, Azerbaijan | Jalilabad, Azerbaijan'

                               ]
                            ]);
                            
                        }else if(!empty($model->anotherd) or !empty($model->anotherd1) or !empty($model->anotherd2)){
                            
                            $origin = Yii::$app->request->get('Transferorder')['from'];
                            $destination = Yii::$app->request->get('Transferorder')['to'];

                            $anotherd = $model->anotherd;
                            $anotherd1 = (!empty($model->anotherd1)) ? ' | '.$model->anotherd1: null;
                            $anotherd2 = (!empty($model->anotherd2)) ? ' | '.$model->anotherd2: null;
                            //$anotherd3 = null;
                            
                            if(!empty($anotherd)){
                                $destination = $model->anotherd;
                                $anotherd = Yii::$app->request->get('Transferorder')['to'];
//                                $anotherd1 = null;
//                                $anotherd2 = null;
                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
                                    $returnOrigin = $destination;
                                    $returnDestination = $origin;
                                }
                                
                            }if(!empty($anotherd) and !empty($anotherd1)){
                                $destination = $anotherd1;
                                $anotherd = Yii::$app->request->get('Transferorder')['to'];
                                $anotherd1 = ' | '.$model->anotherd;
                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
                                    $returnOrigin = $destination;
                                    $returnDestination = $origin;
                                }
                                
                            }
                            if(!empty($anotherd) and !empty($anotherd1) and !empty($anotherd2)){
                                $destination = $anotherd2;
                                $anotherd = Yii::$app->request->get('Transferorder')['to'];
                                $anotherd1 = ' | '.$model->anotherd;
                                $anotherd2 = ' | '.$model->anotherd1;
                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
                                    $returnOrigin = $destination;
                                    $returnDestination = $origin;
                                }
                                
                            }
                        if($model->return == 1){
                            
                       
                            $return =   new DirectionsClient([
                            'params' => [
                                'origin' => $returnOrigin,
                                'destination' => $returnDestination,                                                         
                               ]
                            ]);
                             }
                            
                            $direction =   new DirectionsClient([
                            'params' => [
                                'origin' => $origin,
                                'destination' => $destination,
                                'waypoints' => $anotherd.$anotherd1.$anotherd2                            

                               ]
                            ]);
                        }
                      // var_dump($direction->lookup()['routes'][0]);
//   echo 'sade'.$direction->lookup()['routes'][0]['legs'][0]['distance']['value'] / 1000  .'// '.$direction->lookup()['routes'][0]['legs'][0]['start_address'].'->'.$direction->lookup()['routes'][0]['legs'][0]['end_address'];
//    echo '<p>';
//   echo 'waypoint'.$direction->lookup()['routes'][0]['legs'][1]['distance']['text'].'// '.$direction->lookup()['routes'][0]['legs'][1]['start_address'].'->'.$direction->lookup()['routes'][0]['legs'][1]['end_address'];
//   echo '<p>';
//    echo 'waypoint'.$direction->lookup()['routes'][0]['legs'][2]['distance']['text'].'// '.$direction->lookup()['routes'][0]['legs'][2]['start_address'].'->'.$direction->lookup()['routes'][0]['legs'][2]['end_address'];
//      echo '</p>';
//      echo 'waypoint'.$direction->lookup()['routes'][0]['legs'][3]['distance']['text'].'// '.$direction->lookup()['routes'][0]['legs'][3]['start_address'].'->'.$direction->lookup()['routes'][0]['legs'][3]['end_address'];
//   
//   echo '<p>';
//   echo 'return'.$return->lookup()['routes'][0]['legs'][0]['distance']['text'].'// '.$return->lookup()['routes'][0]['legs'][0]['start_address'].'->'.$return->lookup()['routes'][0]['legs'][0]['end_address'];
       if(empty($direction->lookup()['routes'][0]['legs'][0]['distance']['value'])){
           return $this->redirect('site/error');
       }
        $routes[] = $direction->lookup()['routes'][0]['legs'][0]['distance']['value'];
        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][1]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][1]['distance']['value']:null);
        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][2]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][2]['distance']['value']  :null);
        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][3]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][3]['distance']['value']  :null);
        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][4]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][4]['distance']['value']  :null);
        if($model->return == 1 and count(array_filter($routes)) > 1){ 
           $routes[] =$return->lookup()['routes'][0]['legs'][0]['distance']['value'];
        }
        
//           echo $from;
//        echo '<br>';
//        echo $a1;
//        echo '<br>';
//        echo $a2;
//        echo '<br>';
//        echo $a3;
//        echo '<br>';
        
            $kmsum = 0;
            foreach($routes as $route){
                 $kmsum += $route/1000;             
            }
            $kmsums =  intval($kmsum);

            if($kmsums > 35){
                $qiymet = $amount['cent']*($kmsums-35)+$amount['priceT'];

                $giymet = $qiymet-($qiymet*10/100);
               
                $model->amount = intval($giymet);
                echo $kmsums.' $'.$model->amount;
                if($model->return == 1 and count(array_filter($routes)) > 1){ 
                    echo $kmsums.' multiple 2'.$kmsum*2;
                }
            }else{
                $model->amount = $amount['priceT'];
                if($model->return == 1){
                    $model->amount = $model->amount*2;
                }
            }
            
        
        
      //  echo 'return '.$a5;

                        date_default_timezone_set('Asia/Baku');
                        $model->pickuptime = strtotime(str_replace('/', '-',$model->date).''.$model->time);
                        if(!empty($model->rdate) and !empty($model->rtime)){
                            $model->rpickuptime = strtotime(str_replace('/', '-',$model->rdate).''.$model->rtime);
                        }
                        if ($model->validate()) {
                            if($model->save()){
                             $email = \Yii::$app->mailer->compose()
                                ->setFrom('support@transfer365.az')
                                ->setTo('t4lex999@gmail.com')

                                ->setSubject($model->car)
                                ->setTextBody('from '.$model->from.' to '.$model->to .'timeee'.$model->date.'/'.$model->time)
                                ->send();

                            return $this->redirect(['site/summary', 'id' => $model->id]);
                            }
                        }else{
                            // validation failed: $errors is an array containing error messages
                            foreach($model->errors as $errors){
                                var_dump($errors);
                            }
                        }
                    }
                    return $this->render('form',['model'=>$model]);
                }
		return $this->redirect('site/error');
	}
        
        public function actionSummary($id){
            $model =  Transferorder::find()->where(['id' => $id])->one();
            return $this->render('summary',['model' => $model]); 
        }
}
