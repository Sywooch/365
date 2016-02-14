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
use common\models\Rentorder;
use yii\helpers\BaseJson;
use yii\db\Query;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\services\DirectionsClient;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\services\DirectionsWayPoint;
use yii\data\Sort;
use imanilchaudhari\CurrencyConverter\CurrencyConverter;
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
        \Yii::$app->view->registerMetaTag([
        'name' => 'Description',
        'content' => 'This service has been created due to insufficient and outdated systems of transportation. With us your first few minutes of entering the country will be nothing short of outstanding as every customer is important to us. A \'meet and greet\' service is offered where our driver will meet you in arrivals with a  board clearly displaying your name. Currently our services are provided with unified standards and fixed rates. 24 hours a day, 7 days a week, 365 days a year, you can book a transfer via our website and telephone in a matter of minutes.'
    ]);
//        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
     
        $auto = Autocat::find()->joinWith('autos')->orderBy(['autocat.id' => SORT_ASC])->asArray()->all();
        $model = new Transferorder();
        $rentmodel = new Rentorder();
        return $this->render('index',['auto' => $auto,'model' => $model, 'rentmodel' => $rentmodel]);
    }
    public function actionAccardion(){
        $auto = Autocat::find()->joinWith('autos')->orderBy(['autocat.id' => SORT_ASC])->asArray()->all();
        return $this->renderPartial('accardion',['auto' => $auto]);
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
              //  $rentmodel = new Rentorder();
                if (!empty(Yii::$app->request->get('Transferorder')['from']) and  !empty(Yii::$app->request->get('Transferorder')['to']) and !empty(Yii::$app->request->get('Transferorder')['car'])) {
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
//                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
//                                    $returnOrigin = $destination;
//                                    $returnDestination = $origin;
//                                }
                                
                            }if(!empty($anotherd) and !empty($anotherd1)){
                                $destination = $anotherd1;
                                $anotherd = Yii::$app->request->get('Transferorder')['to'];
                                $anotherd1 = ' | '.$model->anotherd;
//                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
//                                    $returnOrigin = $destination;
//                                    $returnDestination = $origin;
//                                }
                                
                            }
                            if(!empty($anotherd) and !empty($anotherd1) and !empty($anotherd2)){
                                $destination = $anotherd2;
                                $anotherd = Yii::$app->request->get('Transferorder')['to'];
                                $anotherd1 = ' | '.$model->anotherd;
                                $anotherd2 = ' | '.$model->anotherd1;
//                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
//                                    $returnOrigin = $destination;
//                                    $returnDestination = $origin;
//                                }
                                
                            }
                            if(empty($anotherd) and !empty($anotherd1)){
                                $destination = $model->anotherd1;
                                $anotherd = Yii::$app->request->get('Transferorder')['to'];
//                                $anotherd1 = null;
//                                $anotherd2 = null;
//                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
//                                    $returnOrigin = $destination;
//                                    $returnDestination = $origin;
//                                }
                                
                            }if(empty($anotherd) and empty($anotherd1) and !empty($anotherd2)){
                                $destination = $model->anotherd2;
                                $anotherd = Yii::$app->request->get('Transferorder')['to'];
//                                $anotherd1 = null;
//                                $anotherd2 = null;
//                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
//                                    $returnOrigin = $destination;
//                                    $returnDestination = $origin;
//                                }
                                
                            }
//                        if($model->return == 1){
//                            
//                       
//                            $return =   new DirectionsClient([
//                            'params' => [
//                                'origin' => $returnOrigin,
//                                'destination' => $returnDestination,                                                         
//                               ]
//                            ]);
//                            }
                            
                            $direction =   new DirectionsClient([
                            'params' => [
                                'origin' => $origin,
                                'destination' => $destination,
                                'waypoints' => $anotherd.$anotherd1.$anotherd2                            

                               ]
                            ]);
                        }
                      // var_dump($direction->lookup()['routes'][0]);
//   $unvanlar[] = (!empty($direction->lookup()['routes'][0]['legs'][0]) ? $direction->lookup()['routes'][0]['legs'][0]['start_address'].' --> '.$direction->lookup()['routes'][0]['legs'][0]['end_address'] : null);
//   $unvanlar[] = (!empty($direction->lookup()['routes'][0]['legs'][1]) ? $direction->lookup()['routes'][0]['legs'][1]['start_address'].' --> '.$direction->lookup()['routes'][0]['legs'][1]['end_address'] : null);
//   $unvanlar[] = (!empty($direction->lookup()['routes'][0]['legs'][2]) ? $direction->lookup()['routes'][0]['legs'][2]['start_address'].' --> '.$direction->lookup()['routes'][0]['legs'][2]['end_address'] : null);
//   $unvanlar[] = (!empty($direction->lookup()['routes'][0]['legs'][3]) ? $direction->lookup()['routes'][0]['legs'][3]['start_address'].' --> '.$direction->lookup()['routes'][0]['legs'][3]['end_address'] : null);
//   $address = (!empty($model->address) ?  '<h5 style="font-weight:bold;">Address: '.$model->address.'</h5>' : null);
//   $faddress = (!empty($model->faddress) ?  '<h5 style="font-weight:bold;">Address: '.$model->faddress.'</h5>' : null);
//   $aaddress = (!empty($model->aaddress) ?  '<h5 style="font-weight:bold;">Address: '.$model->aaddress.'</h5>' : null);
//   $aaddress1 = (!empty($model->aaddress1) ?   '<h5 style="font-weight:bold;">Address: '.$model->aaddress1.'</h5>' : null);
//   $aaddress2 = (!empty($model->aaddress2) ?     '<h5 style="font-weight:bold;">Address: '.$model->aaddress2.'</h5>' : null);
//   $unvanlar[] = $model->from.$faddress.'➟➟'.$model->to.$address;
//   $unvanlar[] = (!empty($model->anotherd) ? $model->to.'➟'.$model->anotherd.$aaddress : null);
//   $unvanlar[] = (!empty($model->anotherd1) ? $model->anotherd.'➟'.$model->anotherd1.$aaddress1 : null);
//   $unvanlar[] = (!empty($model->anotherd2) ? $model->anotherd1.'➟'.$model->anotherd2.$aaddress2 : null);
//$unvanlar[] = $direction->lookup()['routes'][0]['legs'][4]['start_address'].'-->'.$direction->lookup()['routes'][0]['legs'][4]['end_address'];
//   if($model->return == 1 and count(array_filter($unvanlar)) > 1){ 
//        $unvanlar[] = $return->lookup()['routes'][0]['legs'][0]['start_address'].'->'.$return->lookup()['routes'][0]['legs'][0]['end_address'];
//   }
   
        $routes[] = $direction->lookup()['routes'][0]['legs'][0]['distance']['value'];
        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][1]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][1]['distance']['value']:null);
        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][2]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][2]['distance']['value']  :null);
        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][3]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][3]['distance']['value']  :null);
        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][4]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][4]['distance']['value']  :null);
//        if($model->return == 1 and count(array_filter($routes)) > 1){ 
//           $routes[] =$return->lookup()['routes'][0]['legs'][0]['distance']['value'];
//        }
        
//           echo $from;
//        echo '<br>';
//        echo $a1;
//        echo '<br>';
//        echo $a2;
//        echo '<br>';
//        echo $a3;
//        echo '<br>';
//        $cookies = Yii::$app->request->cookies;
//        $model->currency = $cookies->getValue('currency', 'USD');
        $converter = new CurrencyConverter();
        $rate =  $converter->convert('USD', 'AZN');
            $kmsum = 0;
            foreach($routes as $route){
                 $kmsum += $route/1000;             
            }
            $kmsums =  intval($kmsum);
            $zero = 00;
            if($kmsums > 35){
                $qiymet = $amount['cent']*$rate*($kmsums-35)+$amount['priceT']*$rate;

             //   $giymet = $qiymet-($qiymet*10/100);
               
                $model->amount = intval($qiymet);
               // echo $kmsums.' $'.$model->amount;
                if($model->return == 1 /*and count(array_filter($routes)) > 1*/){ 
                    $model->amount = $model->amount*2;
                    
                }
            }else{
                $model->amount = intval($amount['priceT']*$rate);
                
                
                
                if($model->return == 1){
                    $model->amount = $model->amount*2;
                    
                   
                }
            }
            
        
        
      //  echo 'return '.$a5;

                        date_default_timezone_set('Asia/Baku');
                        $model->pickuptime = strtotime(str_replace('/', '-',$model->date).''.$model->time);
                        
                        if($model->return == 1){
                            $model->rpickuptime = strtotime(str_replace('/', '-',$model->rdate).''.$model->rtime);
                        }
                            $reference = $model->id.time();
                            $reference = sha1($reference);
                            $model->reference = $reference;
                        if ($model->validate()) {
                            if(empty($model->status)){
                                if($model->save()){
                                   // require Yii::app()->basePath . '/frontend/views/site/mail.php';
//                                    require(__DIR__ . '/../views/site/mail.php');
//
//
//                                 $email = \Yii::$app->mailer->compose()
//                                    ->setFrom('support@transfer365.az')
//                                    ->setTo(['support@transfer365.az','t4lex999@gmail.com'])   
//                                    ->setSubject('Yeni Sifariş')
//                                    ->setHtmlBody($html)
//                                    ->send();
//                                $mid = 'transfer365';
//                                $amount = $model->amount;
//                                $currency = 944;
//                                $description = 'test';
//                                $referance = $model->reference;
//                                $language = 'az';
//                                $key = '123456qwerty';
//                                $signature = md5(strlen($mid).$mid.strlen($amount).$amount.strlen($currency).$currency.(!empty($description)?strlen($description).$description :"0").strlen($reference).$reference.strlen($language).$language.$key);
//                                $signature = strtoupper($signature);
                               // return $this->redirect('https://test.millikart.az:7444/gateway/payment/register?' . http_build_query(['mid' => $mid,'amount' => $amount, 'currency' => $currency, 'description' => $description, 'reference'=>$model->reference,'language'=>$language,'signature'=>$signature,'redirect'=>1]));
                                
                                return $this->redirect(['site/confirmation' , 'id' => $model->id]);
                                }
                            }
                        }else{
                            // validation failed: $errors is an array containing error messages

                           
                            foreach($model->errors as $errors){
                                
                                 
                            }
                         
                            echo $model->amount;
                        }
                    }
                    return $this->render('form',['model'=>$model]);
                }
		return $this->redirect('site/error');
	}
        
        public function actionConfirmation($id){

           $model =  Transferorder::find()->where(['id' => $id])->one();
           
           return $this->render('confirmation',['model' => $model]); 
        }
        
        public function actionConfirm($id){
            $model =  Transferorder::find()->where(['id' => $id])->one();
            $mid = 'transfer365';
            $amount = $model->amount;
            $currency = 944;
            $description = $model->amount.$model->from.$model->to;
            $reference = $model->reference;
            $language = 'en';
            $key = '123456qwerty';
            $signature = md5(strlen($mid).$mid.strlen($amount).$amount.strlen($currency).$currency.(!empty($description)?strlen($description).$description :"0").strlen($reference).$reference.strlen($language).$language.$key);
            $signature = strtoupper($signature);
            return $this->redirect('https://test.millikart.az:7444/gateway/payment/register?' . http_build_query(['mid' => $mid,'amount' => $amount, 'currency' => $currency, 'description' => $description, 'reference'=>$model->reference,'language'=>$language,'signature'=>$signature,'redirect'=>1]));
        }
        
        
        public function actionSummary(){
            $modelsave = new Transferorder();
            $reference = Yii::$app->request->get('reference');
            $model =  Transferorder::find()->where(['reference' => $reference])->one();
            $xml = simplexml_load_file('https://test.millikart.az:7444/gateway/payment/status?mid=transfer365&reference='.$reference);

            if($model->status == null){
                if($xml['RC'] == 000 and empty($model->status)){
                    $model->status = '000';
                    $model->save(false);
                    $address = (!empty($model->address) ?  '<h5 style="font-weight:bold;">Address: '.$model->address.'</h5>' : null);
                    $faddress = (!empty($model->faddress) ?  '<h5 style="font-weight:bold;">Address: '.$model->faddress.'</h5>' : null);
                    $aaddress = (!empty($model->aaddress) ?  '<h5 style="font-weight:bold;">Address: '.$model->aaddress.'</h5>' : null);
                    $aaddress1 = (!empty($model->aaddress1) ?   '<h5 style="font-weight:bold;">Address: '.$model->aaddress1.'</h5>' : null);
                    $aaddress2 = (!empty($model->aaddress2) ?     '<h5 style="font-weight:bold;">Address: '.$model->aaddress2.'</h5>' : null);
                    $unvanlar[] = $model->from.$faddress.'➟➟'.$model->to.$address;
                    $unvanlar[] = (!empty($model->anotherd) ? $model->to.'➟'.$model->anotherd.$aaddress : null);
                    $unvanlar[] = (!empty($model->anotherd1) ? $model->anotherd.'➟'.$model->anotherd1.$aaddress1 : null);
                    $unvanlar[] = (!empty($model->anotherd2) ? $model->anotherd1.'➟'.$model->anotherd2.$aaddress2 : null);
                    require(__DIR__ . '/../views/site/mail.php');
                                     $email = \Yii::$app->mailer->compose()
                                    ->setFrom('support@transfer365.az')
                                    ->setTo(['support@transfer365.az','t4lex999@gmail.com'])   
                                    ->setSubject('Yeni Sifariş')
                                    ->setHtmlBody($html)
                                    ->send();
                                     
                                     $email = \Yii::$app->mailer->compose()
                                    ->setFrom('support@transfer365.az')
                                    ->setTo([$model->email])   
                                    ->setSubject('Your Order')
                                    ->setHtmlBody($html)
                                    ->send();
                    
                }elseif($xml['RC'] == 101 and empty($model->status)){
                    $model->status = $xml['RC'];
                    $model->save();
                }elseif($xml['RC'] == 119 and empty($model->status)){
                    $model->status = $xml['RC'];
                    $model->save();
                }elseif($xml['RC'] == 100 and empty($model->status)){
                    $model->status = $xml['RC'];
                    $model->save();
                }
            }
            $model =  Transferorder::find()->where(['reference' => $reference])->one();
            //return $this->render('summary',['model' => $model,'xml' => $xml]); 
        }

        public function actionChauffeur(){
            return $this->render('chauffeurForm');
        }


        
        
        
}
