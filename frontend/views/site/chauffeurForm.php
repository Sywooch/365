<?php
use yii\helpers\Html;
use kartik\icons\Icon;
use yii\widgets\ActiveForm;
use yii\helpers\BaseJson;
use yii\web\UrlManager;
use frontend\assets\FormAsset;
use frontend\assets\BootstrapDateTimePickerAsset;
use frontend\assets\InternationalTelephoneAsset;

FormAsset::register($this);
BootstrapDateTimePickerAsset::register($this);
InternationalTelephoneAsset::register($this);


$this->title = 'Order chaffeured service in Azerbaijan, Baku';

$jsondata = BaseJson::decode(Yii::$app->request->get('Transferorder')['car'], true);

?>
<!-- Steps -->
<?php $form = ActiveForm::begin(['method' => 'post']); ?>
<!-- here we take all the data we need, then we smoke weed, weed, weed...-->
<div id="car-price" data-price="<?=$jsondata['amount']?>"></div>
<div id="chaffeur-dest-placeid" data-id="<?= Yii::$app->request->get('Transferorder')['chauffeurDestPlaceId']; ?>"></div>

<div id="transfer-price" data-price=""></div>
     
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



<div id="chaffeurForm" class="container">
<div id="parent-container" class="row">
    <div id="number-of-days" data-days="<?= Yii::$app->request->get('days')?>"></div>
    <div class="col-xs-9">
        <div class="cpanel">
            <div class="cpanel-heading">
                <h4><span><?= $jsondata['car-name'] ?></span> <strong>-</strong> Chauffeur service</h4>
            </div>
            <?= Html::activeHiddenInput($model, 'fplaceid', ['id'=>'distanceConfirm']) ?>
            <div class="cpanel-section">
                <h3>Departure</h3>
                <div class="row">
                    <div class=" cpanel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Place of pickup</label>
                            </div>
                            <div class="col-md-5">

                                <?= Html::activeInput('text', $model, 'from', ['class' => 'cpanel-input chaff-pickup-address' ,
                            'autofocus' => 'true', 
                                    'autocomplete'=>'false',
                                    'placeholder'=>'Baku, Azerbaijan' ,'value' =>Yii::$app->request->get('Rentorder')['from'],
                                    'disabled'=>'true'] ) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Please, specify address</label>
                            </div>
                            <div class="col-md-5">
                                <?= Html::activeInput('text', $model, 'address', ['class' => 'cpanel-input' ,
                                    'autocomplete'=>'false',
                            'autofocus' => 'true', 'placeholder'=>'Specify address (i.e str, house etc.)']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row cpanel-item">
                        <div class="col-md-3">
                            <label>Date of pickup</label>
                        </div>
                        <div class="col-md-3">
                            
                            <?= $form->field($model, 'pickdate')->textInput(['class' => 'cpanel-input date-picker' , 'placeholder' => 'dd/mm/yy' , 'value' =>Yii::$app->request->get('Rentorder')['pickdate'] ])->label(false) ?>
                        </div>
                        <div class="col-md-2">
                            <div class="ui selection dropdown chauffeurDays">
                                <input id="days" name="days" type="hidden">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Days</div>
                                    <div class="menu">
                                      <div class="item" data-value="1">1 day</div>
                                      <div class="item" data-value="2">2 days</div>
                                      <div class="item" data-value="3">3 days</div>
                                      <div class="item" data-value="4">4 days</div>
                                      <div class="item" data-value="5">5 days</div>
                                      <div class="item" data-value="6">6 days</div>
                                      <div class="item" data-value="7">7 days</div>
                                      <div class="item" data-value="8">8 days</div>
                                      <div class="item" data-value="9">9 days</div>
                                      <div class="item" data-value="10">10 days</div>
                                    </div>
                              </div>
                        </div>
                        <div class="col-md-3" style="float: left">
                            <div class="description">Select your pick up date and number of days you wish to rent</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="cpanel-section">
                <h3>Please select day by day your rental hours</h3>
                <div class="row">
                    
                    
                    <div id="clone" class="row cpanel-item time-control">
                        <div class="col-md-3">
                            <label>From</label>
                        </div>
                        <div class="col-md-2">
                            
                         
                           <input type="text" class="cpanel-input time-picker from" placeholder="hh:mm" />
                        </div>
                        <div class="col-md-3">
                            <label>To</label>
                        </div>
                        <div class="col-md-2">
                           
                            <input type="text" class="cpanel-input time-picker to" placeholder="hh:mm" />
                            
                        </div>
                    </div>
                    <div id="anchor">
                    
                </div>
                </div>
                
            </div>
            
        </div>
        <?= $this->render('passengerInformation', ['model'=>$model, 'form'=>$form, 'seat'=> 'yoxdu']); ?>
        
    </div>
    <div id="chaffeur-fixed-box" class="col-xs-3">
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
                        <div class="fb-section-line">
                            <span id="pickup-address-fixed">
                                <?=Yii::$app->request->get('Rentorder')['from']?></span>
                        </div>

                        <div class="fb-section-line" >
                            <span id="date-fixed"><?=Yii::$app->request->get('Rentorder')['pickdate']?></span>
                        </div>
                            
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
                        Price
                </div>
                <div class="fixed-box-section-body">
                    <div class="full-day">8 hours rent - <span class="prices"></span></div>
                    <div class="half-day">Half day rent - <span class="prices"></span></div>
                    <div class="overtime">1 hour overtime - <span class="prices"></span></div><br>
                    
                </div>
                <div class="fixed-box-heading">
                    Summary
                    <div  id="fixed-box-price" data-cent='<?= $jsondata['cent']?>'
                         data-car-price='<?= $jsondata['amount']?>'
                         data-transfer-car-price='<?= $jsondata['transfer-price']?>'>
                            <p id="price"></p>
                    </div>
                </div>
            </div>
        </div>
</div>
    <!-- maybe will render this partial -->
    
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6 button-box">
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
