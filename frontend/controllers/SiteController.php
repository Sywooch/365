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
use common\models\Rentime;
use common\models\Driverequest;
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
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
     
       // $auto = Autocat::find()->joinWith('autos')->orderBy(['autocat.id' => SORT_ASC])->asArray()->all();
        $model = new Transferorder();
        $rentmodel = new Rentorder();
        return $this->render('index',['model' => $model,'rentmodel' => $rentmodel]);
    }
    public function actionAccardion(){
        $auto = Autocat::find()->joinWith('autos')->orderBy(['autocat.id' => SORT_ASC])->asArray()->all();
        return $this->renderPartial('accardion',['auto' => $auto]);
    }

     public function actionCreateRequest()
    {
        $model = new Driverequest();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionUl(){
        return $this->renderPartial('ul');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
   /* public function actionLogin()
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
    }*/

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
   /* public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }*/

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
    /*public function actionSignup()
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
    }*/

    /**
     * Requests password reset.
     *
     * @return mixed
     */
 /*   public function actionRequestPasswordReset()
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
    }*/

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
 /*   public function actionResetPassword($token)
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
	*/
    
    public static function placeid($var){
        $placeid = simplexml_load_file('http://maps.googleapis.com/maps/api/geocode/xml?address='.$var.'&sensor=false');
        
        return $placeid->result->geometry->location;
        
    }
	//passenger form render
	public  function actionForm(){
                $model = new Transferorder();
              //  $rentmodel = new Rentorder();
                if (!empty(Yii::$app->request->get('Transferorder')['from']) and  !empty(Yii::$app->request->get('Transferorder')['to']) and !empty(Yii::$app->request->get('Transferorder')['car'])) {
                    if($model->load(Yii::$app->request->post())){
                        $jsondata = BaseJson::decode(Yii::$app->request->get('Transferorder')['car'], true);
                        $model->car = $jsondata['car'];
                       
                              
    
    $amount = Yii::$app->db->createCommand('SELECT priceT , cent FROM auto  where id = :json')->bindValue(':json', $model->car)->queryOne();
      $converter = new CurrencyConverter();
      $rate =  $converter->convert('USD', 'AZN');
      
            $kmsums =  $model->fplaceid;
           // echo $kmsums;
            $z = 0;
            if($kmsums > 35){
                $qiymet = $amount['cent']*$rate*($kmsums-35)+$amount['priceT']*$rate;

             //   $giymet = $qiymet-($qiymet*10/100);
               
                $model->amount = intval($qiymet).$z.$z;
               // echo $kmsums.' $'.$model->amount;
                if($model->return == 1 /*and count(array_filter($routes)) > 1*/){ 
                    $model->amount = $model->amount*2;
                    
                }
                if(!empty($model->cseat)){
                    $model->amount = intval($model->amount+(4*$rate));
                }
            }else{
                
                
                
                if($model->return == 1){
                    $model->amount = $model->amount*2;
                    
                   
                }
                if(!empty($model->cseat)){
                    $model->amount = $model->amount+4;
                }
                $model->amount = intval($amount['priceT']*$rate).$z.$z;
            }
            
            
           
            
                        
//                        if(empty($model->anotherd) and empty($model->anotherd1) and empty($model->anotherd2)){
//                            $requestfrom = SiteController::placeid(Yii::$app->request->get('Transferorder')['from']);
//                            $requestto = SiteController::placeid(Yii::$app->request->get('Transferorder')['to']);
//                            $requestfrom = $requestfrom->lat.','.$requestfrom->lng;
//                            $requestto = $requestto->lat.','.$requestto->lng;
//                            echo $requestfrom.'<br>'.$requestto.'<br>';
//                         //   $requestto = $requestto->result->place_id;
//                            
//                            $direction =   new DirectionsClient([
//                            'params' => [
//                                'origin' => $requestfrom,
//                                'destination' => $requestto,
//                                'mode' => 'driving',
//                                'region' => 'az'
//
//                               ]
//                            ]);
//                            
//                          //  echo '<br>'.$requestfrom;
//                        }else if(!empty($model->anotherd) or !empty($model->anotherd1) or !empty($model->anotherd2)){
//                            $requestfrom = SiteController::placeid(Yii::$app->request->get('Transferorder')['from']);
//                            $requestto = SiteController::placeid(Yii::$app->request->get('Transferorder')['to']);                           
//                            $origin = $requestfrom->result->place_id;
//                            $destination = $requestto->result->place_id;
//                            //var_dump($requestfrom);
//                            $anotherd = SiteController::placeid($model->anotherd);
//                            $anotherd = 'place_id:'.$anotherd->result->place_id;
//                            
//                            $anotherd1 = (!empty($model->anotherd1)) ? SiteController::placeid($model->anotherd1): null;
//                            $anotherd1 = ' | place_id:'.$anotherd1->result->place_id;
//                            $anotherd2 = (!empty($model->anotherd2)) ? SiteController::placeid($model->anotherd2): null;
//                            $anotherd2 = ' | place_id:'.$anotherd2->result->place_id;
//                            //$anotherd3 = null;
//                            //echo $anotherd.$anotherd1;
//                            if(!empty($anotherd)){
//                                $destination = SiteController::placeid($model->anotherd);
//                                $destination = $destination->result->place_id;
//                                $anotherd = SiteController::placeid(Yii::$app->request->get('Transferorder')['to']);
//                                $anotherd = $anotherd->result->place_id;
////                                $anotherd1 = null;
////                                $anotherd2 = null;
////                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
////                                    $returnOrigin = $destination;
////                                    $returnDestination = $origin;
////                                }
//                                
//                            }if(!empty($anotherd) and !empty($anotherd1)){
//                                $destination = $anotherd1;
//                                $anotherd = Yii::$app->request->get('Transferorder')['to'];
//                                $anotherd1 = ' | '.$model->anotherd;
////                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
////                                    $returnOrigin = $destination;
////                                    $returnDestination = $origin;
////                                }
//                                
//                            }
//                            if(!empty($anotherd) and !empty($anotherd1) and !empty($anotherd2)){
//                                $destination = $anotherd2;
//                                $anotherd = Yii::$app->request->get('Transferorder')['to'];
//                                $anotherd1 = ' | '.$model->anotherd;
//                                $anotherd2 = ' | '.$model->anotherd1;
////                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
////                                    $returnOrigin = $destination;
////                                    $returnDestination = $origin;
////                                }
//                                
//                            }
//                            if(empty($anotherd) and !empty($anotherd1)){
//                                $destination = $model->anotherd1;
//                                $anotherd = Yii::$app->request->get('Transferorder')['to'];
////                                $anotherd1 = null;
////                                $anotherd2 = null;
////                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
////                                    $returnOrigin = $destination;
////                                    $returnDestination = $origin;
////                                }
//                                
//                            }if(empty($anotherd) and empty($anotherd1) and !empty($anotherd2)){
//                                $destination = $model->anotherd2;
//                                $anotherd = Yii::$app->request->get('Transferorder')['to'];
////                                $anotherd1 = null;
////                                $anotherd2 = null;
////                                if(Yii::$app->request->post('Transferorder')['return'] == 1){
////                                    $returnOrigin = $destination;
////                                    $returnDestination = $origin;
////                                }
//                                
//                            }
////                        if($model->return == 1){
////                            
////                       
////                            $return =   new DirectionsClient([
////                            'params' => [
////                                'origin' => $returnOrigin,
////                                'destination' => $returnDestination,                                                         
////                               ]
////                            ]);
////                            }
//                            
//                            $direction =   new DirectionsClient([
//                            'params' => [
//                                'origin' => 'place_id:'.$origin,
//                                'destination' => 'place_id:'.$destination,
//                                'mode' => 'driving',
//                                'waypoints' => $anotherd.$anotherd1.$anotherd2                            
//
//                               ]
//                            ]);
//                        }
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
          // var_dump($direction->lookup());
//       $routes[] = $direction->lookup()['routes'][0]['legs'][0]['distance']['text'];
//       echo $routes[0];
//        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][1]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][1]['distance']['value']:null);
//        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][2]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][2]['distance']['value']  :null);
//        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][3]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][3]['distance']['value']  :null);
//        $routes[] = (!empty($direction->lookup()['routes'][0]['legs'][4]['distance']['value']) ? $direction->lookup()['routes'][0]['legs'][4]['distance']['value']  :null);
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
//        $converter = new CurrencyConverter();
//        $rate =  $converter->convert('USD', 'AZN');
//            $kmsum = 0;
//            foreach($routes as $route){
//                 $kmsum += $route/1000; 
//                // echo '<br>'.$route;
//            }
//            $kmsums =  intval($kmsum);
//           // echo $kmsums;
//            $zero = 00;
//            if($kmsums > 35){
//                $qiymet = $amount['cent']*$rate*($kmsums-35)+$amount['priceT']*$rate;
//
//             //   $giymet = $qiymet-($qiymet*10/100);
//               
//                $model->amount = intval($qiymet);
//               // echo $kmsums.' $'.$model->amount;
//                if($model->return == 1 /*and count(array_filter($routes)) > 1*/){ 
//                    $model->amount = $model->amount*2;
//                    
//                }
//            }else{
//                $model->amount = intval($amount['priceT']*$rate);
//                
//                
//                
//                if($model->return == 1){
//                    $model->amount = $model->amount*2;
//                    
//                   
//                }
//            }
            
        
        
      //  echo 'return '.$a5;
                      //  $model->amount = 0;
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
                                
                                return $this->redirect(['site/confirmation' , 'id' => $model->id, 'mode' =>'transfer']);
                                }
                            }
                        }else{
                            // validation failed: $errors is an array containing error messages

                           
                            foreach($model->errors as $errors){
                               var_dump($errors).'<br>';
                                 
                            }
                         
                         
                        }
                    }
                    return $this->render('form',['model'=>$model]);
                }
		return $this->redirect('site/error');
	}
        
        public function hesabla($amount,$hour,$invert){
             if($invert == 1){
                $hour = 24-$hour;
            }
            if($hour > 4 && $hour <= 8){
                $amount = $amount;
                
            }elseif($hour <= 4 && $hour != 0){
                $amount = $amount/2*1.2;
            }elseif($hour > 8){
                $overtime = $hour-8;
                $amount = $amount + ($amount*0.2*$overtime);
            }elseif($hour == 0){
                $amount = 0;
            }
            return $amount;
        }
        public function actionChauffeur(){
            //$model = array();
            $a = 'amcix';
            if($a == 'amcix'){
            $model = new Rentorder();
            $timemodel = new Rentime();
            date_default_timezone_set('Asia/Baku');
            if($model->load(Yii::$app->request->post())){
                $jsondata = BaseJson::decode(Yii::$app->request->get('Transferorder')['car'], true);
                $model->car = $jsondata['car'];
                $amount = Yii::$app->db->createCommand('SELECT priceC , cent FROM auto  where id = :json')->bindValue(':json', $model->car)->queryOne();
                $converter = new CurrencyConverter();
                $rate =  $converter->convert('USD', 'AZN');
                $reference = $model->id.time();
                $reference = sha1($reference);
                $model->reference = $reference;
                $model->pickuptime = strtotime(str_replace('/', '-', $model->pickdate).''.$model->time_start[0]);
                $count = count($model->time_start)-1;
                $model->endtime=strtotime("+".$count." day", $model->pickuptime);
                
                if($model->validate()){
                $model->save();
                
                  $amountC = 0;
                foreach($model->time_start as $i => $time){
                   // echo strtotime($time)-strtotime($model->time_end[$i]).'<br>';
                          $dteStart = new \DateTime($time);
                          $dteEnd   = new \DateTime($model->time_end[$i]); 
                          $diff=$dteStart->diff($dteEnd);
                          //echo 'saat '.$diff->h.' invert '.$diff->invert.'<br>';
                         $amountC += $this->hesabla($amount['priceC'],$diff->h,$diff->invert);
                    //$hours += $model->timestart
                   Yii::$app->db->createCommand()->insert('rentime',['rentid'=>$model->id,'time_start'=>strtotime($time), 'time_end'=>strtotime($model->time_end[$i])])->execute();
                  
                }
                $z = 0;
                $model->amount=intval($amountC*$rate);
                $model->amount = $model->amount.$z.$z;
                if($model->save() and $model->validate()){
                    return $this->redirect(['confirmation','id' => $model->id , 'mode' =>'ch']);
                }
                else{
                    foreach($model->errors as $errors){
                               var_dump($errors).'<br>';
                                 
                            }
                }
                }else{
                    foreach($model->errors as $errors){
                               var_dump($errors).'<br>';
                            }
                }

                
              
                
                
                
            }
           return $this->render('chauffeurForm',['model' => $model]);
            }
            return $this->redirect('error');
            
        }
        
        /*public function actionPinacolada($id,$pincolada){
            $request = Yii::$app->request;
if ($request->isAjax) {
    
    $foramount =  Transferorder::find()->where(['id' => $id])->one();
    if($foramount->amount == 0){
        
    
    $amount = Yii::$app->db->createCommand('SELECT priceT , cent FROM auto  where id = :json')->bindValue(':json', $foramount->car)->queryOne();
      $converter = new CurrencyConverter();
      $rate =  $converter->convert('USD', 'AZN');
      
            $kmsums =  $pinacolada;
           // echo $kmsums;
            $z = 0;
            if($kmsums > 35){
                $qiymet = $amount['cent']*$rate*($kmsums-35)+$amount['priceT']*$rate;

             //   $giymet = $qiymet-($qiymet*10/100);
               
                $foramount->amount = intval($qiymet).$z.$z;
               // echo $kmsums.' $'.$model->amount;
                if($foramount->return == 1 /*and count(array_filter($routes)) > 1){ 
             /*       $foramount->amount = $foramount->amount*2;
                    
                }
            }else{
                $foramount->amount = intval($amount['priceT']*$rate).$z.$z;
                
                
                
                if($foramount->return == 1){
                    $foramount->amount = $foramount->amount*2;
                    
                   
                }
            }
            
            
           
            $foramount->save(false);
            }
           }
        }*/
        
        public function actionConfirmation($id,$mode){
            if($mode == 'transfer'){
                $model =  Transferorder::find()->where(['id' => $id])->one();
                return $this->render('confirmation',['model' => $model]); 
            }elseif($mode == 'ch'){
                $model =  Rentorder::find()->where(['id' => $id])->one();
                return $this->render('confirmChaffer',['model' => $model]); 
            }
            
        }
        
        public function actionConfirm($id,$mode){
            
            //confirm yonlendirme zamani hemcinin daha bir parametr elave olunur. 
            //eger shoferdirse shofer tableinden reference code goturulur ve ya eksine transfer.
            //hemcinin descriptiona shofer ve ya transfer olduqu barede melumat yazilir summary ucun.
            if($mode == 'transfer'){
                $model =  Transferorder::find()->where(['id' => $id])->one();
                $description='transfer';
            }elseif($mode == 'ch'){
                $model =  Rentorder::find()->where(['id' => $id])->one();
                $description = 'ch';
            }
            $mid = 'transfer365';//'transfer365';
            $amount = $model->amount;
            $currency = 944;
            // = $model->amount.$model->from.$model->to;
            $reference = $model->reference;
            $language = 'en';
            $key = '7ML2FOQUUH249V4SEAPXX8QOJH47FY6X';
            //'123456qwerty';
            $signature = md5(strlen($mid).$mid.strlen($amount).$amount.strlen($currency).$currency.(!empty($description)?strlen($description).$description :"0").strlen($reference).$reference.strlen($language).$language.$key);
            $signature = strtoupper($signature);
            //return $this->redirect('https://test.millikart.az:7444/gateway/payment/register?' . http_build_query(['mid' => $mid,'amount' => $amount, 'currency' => $currency, 'description' => $description, 'reference'=>$model->reference,'language'=>$language,'signature'=>$signature,'redirect'=>1]));
             return $this->redirect('https://pay.millikart.az/gateway/payment/register?' . http_build_query(['mid' => $mid,'amount' => $amount, 'currency' => $currency, 'description' => $description, 'reference'=>$model->reference,'language'=>$language,'signature'=>$signature,'redirect'=>1]));
        }
        
        
        public function actionSummary(){
            $modelsave = new Transferorder();
            $reference = Yii::$app->request->get('reference');
            
            $xml = simplexml_load_file('https://pay.millikart.az/gateway/payment/status?mid=transfer365&reference='.$reference);
            $a = 'payment-description';
           
            if($xml->$a == 'transfer'){
                $model =  Transferorder::find()->where(['reference' => $reference])->one();
                    $address = (!empty($model->address) ?  '<h5 style="font-weight:bold;">Address: '.$model->address.'</h5>' : null);
                    $faddress = (!empty($model->faddress) ?  '<h5 style="font-weight:bold;">Address: '.$model->faddress.'</h5>' : null);
                    $aaddress = (!empty($model->aaddress) ?  '<h5 style="font-weight:bold;">Address: '.$model->aaddress.'</h5>' : null);
                    $aaddress1 = (!empty($model->aaddress1) ?   '<h5 style="font-weight:bold;">Address: '.$model->aaddress1.'</h5>' : null);
                    $aaddress2 = (!empty($model->aaddress2) ?     '<h5 style="font-weight:bold;">Address: '.$model->aaddress2.'</h5>' : null);
                    $unvanlar[] = $model->from.$faddress.'➟➟'.$model->to.$address;
                    $unvanlar[] = (!empty($model->anotherd) ? $model->to.'➟'.$model->anotherd.$aaddress : null);
                    $unvanlar[] = (!empty($model->anotherd1) ? $model->anotherd.'➟'.$model->anotherd1.$aaddress1 : null);
                    $unvanlar[] = (!empty($model->anotherd2) ? $model->anotherd1.'➟'.$model->anotherd2.$aaddress2 : null);
                   
            }else if ($xml->$a == 'ch'){
                $model =  Rentorder::find()->where(['reference' => $reference])->one();
            }
            //model asaqi dusur xml datadan description yoxlanilir eger shoferdirse shofer model caqirilir yada eksine transfer.
            if($model->status == null){
                if($xml->RC == 000){
                    $model->status = '000';
                    $model->save(false);
                    if($xml->$a == 'transfer'){
                    require(__DIR__ . '/../views/site/mail.php');
                    }elseif($xml->$a == 'ch'){
                        require(__DIR__ . '/../views/site/mailc.php');
                    }
                                     $email = \Yii::$app->mailer->compose()
                                    ->setFrom('support@transfer365.az')
                                    ->setTo(['support@transfer365.az','t4lex999@gmail.com','eldaraliyev93@gmail.com'])   
                                    ->setSubject('Yeni Sifariş')
                                    ->setHtmlBody($html)
                                    ->send();
                                     
                                     $email = \Yii::$app->mailer->compose()
                                    ->setFrom('support@transfer365.az')
                                    ->setTo([$model->email])   
                                    ->setSubject('Your Order')
                                    ->setHtmlBody($html)
                                    ->send();
                    $this->render('summary');
                }elseif($xml->RC == 101 ){
                    $model->status = $xml['RC'];
                    $model->save();
                }elseif($xml->RC == 119  ){
                    $model->status = $xml['RC'];
                    $model->save();
                }elseif($xml->RC == 100  ){
                    $model->status = $xml['RC'];
                    $model->save();
                }
            }
            //$model =  Transferorder::find()->where(['reference' => $reference])->one();
            //return $this->render('summary',['model' => $model,'xml' => $xml]); 
        }
        
        public function actionCorporate()
    {
        return $this->render('corporate');
    }
    




        
        
        
}
