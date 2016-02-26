
<?php
use yii\helpers\Html;
use kartik\icons\Icon;
use yii\widgets\ActiveForm;
use yii\helpers\BaseJson;
use yii\web\UrlManager;
use frontend\assets\FormAsset;

use frontend\assets\InternationalTelephoneAsset;

FormAsset::register($this);

InternationalTelephoneAsset::register($this);


$this->title = 'Order transfer from Airport to Baku, Azerbaijan';

?>


<!-- Steps -->
<div id="form" class="container-fluid steps-wrap">
    <div class="row steps">
        <div class="col-xs-4 col-md-4 step step-complete">
            <span id="step1">Destination</span>
            
        </div>
        <div class="col-xs-4 col-md-4 step step-active">
            <span id="step2">Passenger information</span>
            <div class="rounded-border"></div>
        </div>
        <div class=" col-xs-4 col-md-4 step step-inactive">
            <span id="step3">Confirmation</span>
            <div class="rounded-border"></div>
        </div>
    </div>
</div><!--Steps end-->

<div class="container" id="parent-container"> <!-- Passenger form container -->
    <div class="row">
<?php $form = ActiveForm::begin(['method' => 'post']); ?>
        <div class="col-md-9">
            <div class="cpanel">
                <div class="cpanel-heading">

                    <h4><span id="heading-from"><?= Yii::$app->request->get('Transferorder')['from'] ?></span> <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> <span id="heading-to"><?= Yii::$app->request->get('Transferorder')['to'] ?></span><br></h4>
                   <?php $jsondata = BaseJson::decode(Yii::$app->request->get('Transferorder')['car'], true) ?>
                    <div id='rate' data-rate='<?= $jsondata['rate'] ?>'></div>
                    <div id='sign' data-sign='<?= $jsondata['sign']?>'></div>

                </div>
                <?php
                    
                    $getRequestReturn = Yii::$app->request->get('return-check'); //get return fron "get request" and then pass it to the form
                                                                                 //which renders airportToCity and CityToCity
                    $getRequestFrom = Yii::$app->request->get('Transferorder')['from'];
                    $getRequestTo = Yii::$app->request->get('Transferorder')['to'];
                    
                    
                     
                    $fromAirport = stristr($getRequestFrom, 'airport'); //find substr 'airport' in getRuquestFrom
                    $toAirport = stristr($getRequestTo, 'airport'); //find substr 'airport' in getRuquestFrom
                    
                    if ($fromAirport){
                        echo $this->render('fromAirportToCity', ['model'=>$model,
                            'form' => $form, 'return' => $getRequestReturn]);
                    }elseif(!$fromAirport && $toAirport){
                        echo $this->render('fromCityToAirport', ['model'=>$model,
                            'form' => $form, 'return' => $getRequestReturn]);
                    }else{
                        echo $this->render('fromCityToCity', ['model'=>$model,
                            'form' => $form, 'return' => $getRequestReturn]);
                    }
                ?>
                
                <div id="fromLatLng" data-coords="<?= Yii::$app->request->get('Transferorder')['fplaceid']?>"></div>
                <div id="toLatLng" data-coords="<?= Yii::$app->request->get('Transferorder')['tplaceid']?>"></div>
                
                <?= Html::activeHiddenInput($model, 'fplaceid', ['id'=>'distanceConfirm']) ?>
                
                <!-- origin and destination for confirmation map-->
                <?= Html::activeHiddenInput($model, 'placeStart', ['id'=>'start', 'value'=>''])?> 
                <?= Html::activeHiddenInput($model, 'placeEnd', ['id'=>'end', 'value'=>''])?>
                <?= Html::activeHiddenInput($model, 'distance', ['id'=>'distance']) ?>
                <?= Html::activeHiddenInput($model, 'duration', ['id'=>'duration']) ?>
        

                <div class="cpanel-footer">
                    Free cancellation of the trip in an 12 hours before the start 
                </div>
            </div>
						
    <?= $this->render('passengerInformation', ['model'=>$model, 'form'=>$form,
        'seat'=>'var', 'sign'=>$jsondata['sign']]); ?>

</div>
    <div id="transfer-fixed-box" class="col-md-3">
        <div id="fixed-box" class="fixed-box">
            <div class="fixed-box-heading">
                Order information
            </div>
            <div class="fixed-box-body">
                <div class="fixed-box-section">
                    <div class="fixed-box-section-heading">
                        Place and time of pick up
                    </div>
                    <div class="fixed-box-section-body">
                            <div class="fb-section-line"><?= Yii::$app->request->get('Transferorder')['from'] ?>
                                
                                <span id="flight-number-fixed"></span> <!-- flight number -->
                            </div>
                        <div clas="fb-section-line">
                            <span id="pickup-address-fixed"></span>
                        </div>

                        <div class="fb-section-line" >
                            <span id="date-fixed"></span>
                            <span id="time-fixed"></span>
                        </div>
                            
                    </div>
                </div>
                <div class="fixed-box-section">
                    <div class="fixed-box-section-heading">
                            Destination
                    </div>
                    <div class="fixed-box-section-body">
                        <div class="fb-section-line" id="destination-fixed"><?= Yii::$app->request->get('Transferorder')['to'] ?></div>
                        <div class="fb-section-line" id="specify-address-fixed"></div>

                    </div>
                    
                </div>
                <div class="fixed-box-section">
                    <div class="additionals-wrap">
                        <div class="fixed-box-section-heading">
                            Additional destinations
                        </div>
                        <div class="fixed-box-section-body">
                            <div class="fb-section-line" id="dest1"><span></span></div>
                            <div class="fb-section-line" id="dest2"><span></span></div>
                            <div class="fb-section-line" id="dest3"><span></span></div>
                            
                        </div>
                    </div>
                </div>
                <div class="fixed-box-section">
                    <div class="fixed-box-section-heading">
                            Transfer type
                    </div>
                    <div class="fixed-box-section-body">
<!--                            <div class="fb-section-line">Tarrif <span id="tariff-fixed">Economy</span></div>
                            <div class="fb-section-line">1-4 passengers,up to 3 lagguage places</div>
                            <div class="fb-section-line">Passengers: <span id="pass-num-fixed"></span></div>-->
                        <div class="fb-section-line" id="child-seat-fixed">Child seat: <span>yes</span></div>
                    </div>
                </div>
                <div id="contacts-fixed" class="fixed-box-section">
                    <div class="fixed-box-section-heading">
                            Contact information
                    </div>
                    <div class="fixed-box-section-body">
                            <div class="fb-section-line">
                                    <span id="pass-name-fixed"></span>
                                    <span id="pass-lastname-fixed"></span>
                            </div>
                            <div class="fb-section-line" id="phone-number-fixed"></div>
                            <div class="fb-section-line" id="email-fixed"></div>
                    </div>
                </div>
                    <div class="fixed-box-section">
                        <div class="fixed-box-section-heading">
                            Return
                        </div>
                        <div class="fixed-box-section-body">
                            <div class="fb-section-line">
                                <span id="date-return-fixed"></span>
                                <span id="time-return-fixed"></span>
                            </div>
                            <div id="pickup-address-return-fixed" class="fb-section-line"></div>
                        </div>
                    </div>
                    <div id="nfixed" class="fixed-box-section">
                        <div class = "fixed-box-section-heading">
                                Notes
                        </div>
                        <div class="fixed-box-section-body" id="notes-fixed">

                        </div>
                    </div>

            </div>
            <div class="fixed-box-footer">
                <div class="fixed-box-heading">
                        Transfer price
                </div>
                <div class="fixed-box-heading">
                    Summary
                    <div id='fixed-box-price' data-cent='<?= $jsondata['cent']?>'
                         data-car-price='<?= $jsondata['amount']?>' class="fixed-box-price">
                            <?= $jsondata['amount'] ?> <span><?= $jsondata['sign']?></span>
                    </div>
                </div>
            </div>
        </div>
</div>
			</div>
			
			
			
        </div> <!-- Passenger form container end -->
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6 button-box">
                    <div class="row">
                        <div class="col-md-12 button-box-title">Total price <span><?= $jsondata['amount'] ?></span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= Html::SubmitButton('Confirm'); ?>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-md-12">
                            </div>
                    </div>

                </div>
                <div class="col-md-2">
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
		

		
		<!--<script src="/scripts/add-destination.js"></script>-->
		<!--<script src="/scripts/side-box.js"></script>-->
                <!--<script src="/scripts/fixed-box-position.js"></script>-->  

