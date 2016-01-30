
<?php
use yii\helpers\Html;
use kartik\icons\Icon;
use yii\widgets\ActiveForm;
use yii\helpers\BaseJson;
use frontend\assets\FormAsset;
use frontend\assets\BootstrapDateTimePickerAsset;
use frontend\assets\InternationalTelephoneAsset;
FormAsset::register($this);
BootstrapDateTimePickerAsset::register($this);
InternationalTelephoneAsset::register($this);
?>

<!-- Steps -->
<div class="container-fluid steps-wrap">
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

                    <h4><span id="heading-from"><?= Yii::$app->request->get('Transferorder')['from'] ?></span> <--> <span id="heading-to"><?= Yii::$app->request->get('Transferorder')['to'] ?></span><br></h4>
                   <?php $jsondata = BaseJson::decode(Yii::$app->request->get('Transferorder')['car'], true) ?>

                </div>
                <?php
                 
                    $getRequestFrom = Yii::$app->request->get('Transferorder')['from'];
                    $getRequestTo = Yii::$app->request->get('Transferorder')['to'];
                    
                     
                    $fromAirport = stristr($getRequestFrom, 'airport'); //find substr 'airport' in getRuquestFrom
                    $toAirport = stristr($getRequestTo, 'airport'); //find substr 'airport' in getRuquestFrom
                    
                    if ($fromAirport){
                        echo $this->render('fromAirportToCity', ['model'=>$model,'form' => $form]);
                    }elseif(!$fromAirport && $toAirport){
                        echo $this->render('fromCityToAirport', ['model'=>$model,'form' => $form]);
                    }else{
                        echo $this->render('fromCityToCity', ['model'=>$model,'form' => $form]);
                    }
                ?>

                <div class="cpanel-footer">
                    Free cancellation of the trip in an 12 hours before the start 
                </div>
            </div>
						
    <?= $this->render('passengerInformation', ['model'=>$model, 'form'=>$form]); ?>

</div>
    <div  class="col-md-3">
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
                    <div class="fixed-box-section-heading">
                            Transfer type
                    </div>
                    <div class="fixed-box-section-body">
                            <div class="fb-section-line">Tarrif <span id="tariff-fixed">Economy</span></div>
                            <div class="fb-section-line">1-4 passengers,up to 3 lagguage places</div>
                            <div class="fb-section-line">Passengers: <span id="pass-num-fixed"></span></div>
                            <div class="fb-section-line" id="chair-side"></div>
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
                        <div class="fixed-box-price"><?= $jsondata['amount'] ?></div>
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
							<div class="col-md-12 button-box-title">Total price <?= $jsondata['amount'] ?> AZN</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								
                                                                <?= Html::SubmitButton('Go To Payment'); ?>
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

