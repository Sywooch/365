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
        <div class="col-xs-4 col-md-4 step step-active">
            <span id="step1"><?=Yii::t('yii', 'Destination')?></span>
        </div>
        <div class="col-xs-4 col-md-4 step step-inactive">
            <span id="step2"><?=Yii::t('yii', 'Passenger information')?></span>
            <div class="rounded-border"></div>
        </div>
        <div class=" col-xs-4 col-md-4 step step-inactive">
        <span id="step3"><?=Yii::t('yii', 'Confirmation')?></span>
        <div class="rounded-border"></div>
        </div>
    </div>
</div><!--Steps end-->



<div id="chaffeurForm" class="container">
<div id="parent-container" class="row">
    <div id="number-of-days" data-days="<?= Yii::$app->request->get('days')?>"></div>
    <div class="col-md-9">
        <div class="cpanel">
            <div class="cpanel-heading">
                <h4><span><?= $jsondata['car-name'] ?></span> <strong>-</strong> <?=Yii::t('yii', 'Chauffeur service')?></h4>
            </div>
            <?= Html::activeHiddenInput($model, 'fplaceid', ['id'=>'distanceConfirm']) ?>
            <div class="cpanel-section">
                <h3><?=Yii::t('yii', 'Departure')?></h3>
                <div class="row">
                    <div class="cpanel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label><?= Yii::t('yii','Place of pickup')?></label>
                            </div>
                            <div class="col-md-5">

                                <?= Html::activeInput('text', $model, 'from', ['class' => 'cpanel-input chaff-pickup-address' ,
                            'autofocus' => 'true', 
                                    'autocomplete'=>'false',
                                    'placeholder'=>'Baku, Azerbaijan' ,'value' =>Yii::$app->request->get('Rentorder')['from'],
                                    'disabled'=>'true'] ) ?>
                                <?= Html::activeHiddenInput($model, 'from', 
                                ['value' => Yii::$app->request->get('Rentorder')['from']]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="cpanel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label><?= Yii::t('yii','Please, specify address')?></label>
                            </div>
                            <div class="col-md-5">
                                <?= Html::activeInput('text', $model, 'address', ['class' => 'cpanel-input' ,
                                    'autocomplete'=>'false',
                            'autofocus' => 'true', 'placeholder'=> Yii::t('yii','Specify adress (I.e str,house etc.)')]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row cpanel-item">
                        <div class="col-md-3">
                            <label><?= Yii::t('yii','Date of pickup')?></label>
                        </div>
                        <div class="col-md-3">
                            
                            <?= $form->field($model, 'pickdate')->textInput(['class' => 'cpanel-input date-picker' , 'placeholder' => Yii::t('yii', 'dd/mm/yy') , 'value' =>Yii::$app->request->get('Rentorder')['pickdate'] ])->label(false) ?>
                        </div>
                        <div class="col-md-2">
                            <div class="ui selection dropdown chauffeurDays">
                                <input id="days" name="days" type="hidden">
                                    <i class="dropdown icon"></i>
                                    <div class="default text"><?= Yii::t('yii','Days')?></div>
                                    <div class="menu">
                                      <div class="item" data-value="1">1 <?= Yii::t('yii','Days')?></div>
                                      <div class="item" data-value="2">2 <?= Yii::t('yii','Days')?></div>
                                      <div class="item" data-value="3">3 <?= Yii::t('yii','Days')?></div>
                                      <div class="item" data-value="4">4 <?= Yii::t('yii','Days')?></div>
                                      <div class="item" data-value="5">5 <?= Yii::t('yii','Days')?></div>
                                      <div class="item" data-value="6">6 <?= Yii::t('yii','Days')?></div>
                                      <div class="item" data-value="7">7 <?= Yii::t('yii','Days')?></div>
                                      <div class="item" data-value="8">8 <?= Yii::t('yii','Days')?></div>
                                      <div class="item" data-value="9">9 <?= Yii::t('yii','Days')?></div>
                                      <div class="item" data-value="10">10 <?= Yii::t('yii','Days')?></div>
                                    </div>
                              </div>
                        </div>
                        <div class="col-md-3" style="float: left">
                            <div class="description"><?= Yii::t('yii','Select your rental period and pick up date')?></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="cpanel-section">
                <h3><?= Yii::t('yii','Please select day by day your renting hours')?></h3>
                <div class="row">
                    
                    
                    <div id="clone" class="row cpanel-item time-control">
                        <div class="col-md-12">
                        <div class="date"></div>
                    </div>
                        
                        <div class="col-md-3">
                            <label><?= Yii::t('yii','From ') ?></label>
                        </div>
                        <div class="col-md-2">
                           <input type="text" class="cpanel-input time-picker from" placeholder=<?= Yii::t('yii','hh:mm')?> />
                        </div>
                        <div class="col-md-3">
                            <label><?= Yii::t('yii','To ')?></label>
                        </div>
                        <div class="col-md-2">
                           
                            <input type="text" class="cpanel-input time-picker to" placeholder=<?= Yii::t('yii','hh:mm')?> />
                            
                        </div>
                    </div>
                    <div id="anchor">
                    
                </div>
                </div>
                
            </div>
            
        </div>
        <?= $this->render('passengerInformation', ['model'=>$model, 'form'=>$form, 'seat'=> 'yoxdu']); ?>
        
    </div>
    <div id="chaffeur-fixed-box" class="col-md-3">
        <div id="fixed-box" class="fixed-box">
            <div class="fixed-box-heading">
                <?= Yii::t('yii','Order information')?>
            </div>
            <div class="fixed-box-body">
                <div class="fixed-box-section">
                    <div class="fixed-box-section-heading">
                        <?= Yii::t('yii','Place and time of pick up')?>
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
                            <?= Yii::t('yii','Contact information')?>
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
                                <?= Yii::t('yii','Notes')?>
                        </div>
                        <div class="fixed-box-section-body" id="notes-fixed">

                        </div>
                    </div>

            </div>
            <div class="fixed-box-footer">
                <div class="fixed-box-heading">
                        <?= Yii::t('yii','Price')?>
                </div>
                <div class="fixed-box-section-body">
                    <div class="full-day"><?= Yii::t('yii','Full day (8 hours)')?> - <span class="prices"></span></div>
                    <div class="half-day"><?= Yii::t('yii','Half day (4 hours)')?>  - <span class="prices"></span></div>
                    <div class="overtime"><?= Yii::t('yii','1 hour overtime')?> - <span class="prices"></span></div><br>
                    
                </div>
                <div class="fixed-box-heading">
                    <?= Yii::t('yii','Summary')?>
                    <div  id="fixed-box-price" data-cent='<?= $jsondata['cent']?>'
                         data-car-price='<?= $jsondata['amount']?>'
                         data-transfer-car-price='<?= $jsondata['transfer-price']?>'
                         data-rate='<?= $jsondata['rate'] ?>'>
                        <div><span id='price'></span> <?= $jsondata['sign']?></div> 
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
                 <div class="row">
                        <div class="col-md-12 button-box-title"><?= Yii::t('yii', 'Total price')?> <span></span> <?= $jsondata['sign']?></div>
                    </div>
                <div class="col-md-12">
                    <?= Html::SubmitButton(Yii::t('yii', 'Confirm')); ?>
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
