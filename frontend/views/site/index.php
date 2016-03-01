<?php
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use imanilchaudhari\CurrencyConverter\CurrencyConverter;
 
$this->title = 'Transfer365 - Transfer service in Azerbaijan';
?>




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
</div>

<div id="index" class="destination-choice-wrap">
    
<div class="container">
    
<div class="row">
    
<div class="col-md-3 service-choice">
    
    <div class=" wrap-for-dotted-border">
    </div>

    <div class="row">
        <div class="col-md-12">
            <div>
                <label for="transfer-radio">
                    <input id="transfer-radio" class='transfer-active' type="radio"  data-priceajax = 'priceT'  name="service" checked=true />
                    <?=Yii::t('yii', 'Transfer')?>
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="chaffeur-radio">
                <input id="chaffeur-radio" type="radio" data-priceajax = 'priceC' name="service" />
                <?=Yii::t('yii', 'Chauffeur service')?>
            </label>
        </div>
    </div>
</div>
<?= Html::beginForm(['site/chauffeur'], 'get', ['id'=>'cform']) ?>
    <!-- destination and service choice -->
        <div class="col-md-9 destination-choice">
                <div class="row">
                    <div class="chaffeur" id="chaffeur">
                        <div id="input-from-chaffeur" class="col-md-4">
                            <label for="from">
                            <span><?=Yii::t('yii', 'From')?></span>
                                   <?= Html::activeInput('text', $rentmodel, 'from', ['id'=>"pac-input-from-chaffeur",'class' => 'controls chaff-pickup-address' ,
            'autofocus' => 'true', 'placeholder'=>Yii::t('yii', 'Baku, Azerbaijan')]) ?>
                            <?= Html::activeHiddenInput($model, 'chauffeurDestPlaceId', ['id'=>'chaffeur-dest-placeid']) ?>
                            </label>
                        </div>
                        <div id="input-date-chaffeur" class="col-md-4">
                            <label for="chaffeur-time-from">
                                <span><?=Yii::t('yii', 'Date')?></span> 
                                  
                                    
                                    <?= Html::activeInput('text', $rentmodel, 'pickdate', ['class' => 'chauffeur-datepicker' ,'id'=>'chaffeur-time-from' ,'placeholder' => Yii::t("yii","dd/mm/yy")]) ?>
                            </label>
                        </div>
                        <div id="input-days-chaffeur" class="col-md-2">
                            <div class="ui selection dropdown chauffeurDays">
                                <input id="days" name="days" type="hidden">
                                    <i class="dropdown icon"></i>
                                    <div class="default text"><?=Yii::t('yii', 'Days')?></div>
                                    <div class="menu">
                                      <div class="item" data-value="1">1 <?=Yii::t('yii', 'Days')?></div>
                                      <div class="item" data-value="2">2 <?=Yii::t('yii', 'Days')?></div>
                                      <div class="item" data-value="3">3 <?=Yii::t('yii', 'Days')?></div>
                                      <div class="item" data-value="4">4 <?=Yii::t('yii', 'Days')?></div>
                                      <div class="item" data-value="5">5 <?=Yii::t('yii', 'Days')?></div>
                                      <div class="item" data-value="6">6 <?=Yii::t('yii', 'Days')?></div>
                                      <div class="item" data-value="7">7 <?=Yii::t('yii', 'Days')?></div>
                                      <div class="item" data-value="8">8 <?=Yii::t('yii', 'Days')?></div>
                                      <div class="item" data-value="9">9 <?=Yii::t('yii', 'Days')?></div>
                                      <div class="item" data-value="10">10 <?=Yii::t('yii', 'Days')?></div>
                                    </div>
                              </div>
                        </div>
                    </div>
<?= Html::endForm() ?>
<?= Html::beginForm(['site/form'], 'get', ['enctype' => 'multipart/form-data', 'id'=>'tform']) ?>
                        <div class="transfer" id="transfer">
    <div class="col-xs-12 col-md-4 input-from">
    <label for="from"><span><?=Yii::t('yii', 'From')?></span></label>


        <?= Html::activeInput('text', $model, 'from', ['id'=>'from' ,'class' => 'controls add-dest-address' ,
            'autofocus' => 'true', 'placeholder'=>Yii::t('yii', 'Heydar Aliyev International Airport (Terminal 1), Azerbaijan')]) ?>
        <?= Html::activeHiddenInput($model, 'fplaceid', ['id'=>'fromLatLng']) ?>
        <?= Html::activeHiddenInput($model, 'tplaceid', ['id'=>'toLatLng']) ?>

                                </div>
                        <div id="swap-icon-col" class="col-md-1 swap-icon">
                                <span id="swap-icon"><img src="/uploads/Flat.png"</span>
                        </div>
    <div class="col-xs-12 col-md-4 input-to">
            <label for="to"><span><?=Yii::t('yii', 'To')?></span></label>


    <?= Html::activeInput('text', $model, 'to', ['id'=>'to','class' => 'controls add-dest-address' ,
         'disabled' => false, 'placeholder'=>Yii::t('yii', 'Baku, Azerbaijan')]) ?>


                        </div>
                        <div class="col-md-3">
                                <div class="row placeholder">placeholder</div>
                                <div class="row placeholder">placeholder</div>
                                
                                <input type="checkbox" id="return" name="return-check"/>
                                <label for="return"><span><?=Yii::t('yii', 'Return')?></span></label>

                                
                        </div>
                        </div>

                </div>
        </div> <!-- destination and service choice end -->

</div>
</div>
</div>
<?= Html::endForm() ?>
<div id="fountainG">
<div id="fountainG_1" class="fountainG"></div>
<div id="fountainG_2" class="fountainG"></div>
<div id="fountainG_3" class="fountainG"></div>
<div id="fountainG_4" class="fountainG"></div>
<div id="fountainG_5" class="fountainG"></div>
<div id="fountainG_6" class="fountainG"></div>
<div id="fountainG_7" class="fountainG"></div>
<div id="fountainG_8" class="fountainG"></div>
</div>

<div id="car-class-container" class="container">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<div id='ajaxaccardion' class="row">
    <div  class="col-md-1"></div>
   
       
   

</div> <!-- child row -->
</div>
<div class="col-md-1"></div>
</div> <!-- father row -->
</div>
<?= $this->render('features') ?>         
                
