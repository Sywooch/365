<?php
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="cpanel-section">
    <fieldset>
        <legend id="route">Return</legend>
        <div class="row">
            <div class="cpanel-item">
                <div class="col-xs-12 col-md-4">
                    <label for="date-flight">Date and time of pickup</label>
                </div>
                <div class="col-xs-12 col-md-3">
                    <?= $form->field($model, 'rdate')->textInput(['id' => 'date-pickup-return-panel',
                        'class' => 'cpanel-input date-picker return' ,'placeholder' => 'Choose date'])->label(false) ?>
                </div>
                <div class="col-xs-12 col-md-2">
        
                    <?= $form->field($model, 'rtime')->textInput(['id' => 'time-pickup-return-panel',
                        'class' => 'cpanel-input time-picker return' ,'placeholder' => 'HH:mm'])->label(false) ?>
                </div>
                <div class="col-xs-12 col-md-3">
                <div class="description">
                    *local time
                </div>
            </div>
            </div>
        </div>
        
<div class="row">
    <div class="cpanel-item">
        <div class="col-xs-12 col-md-4">
        <label for="specify-address">Pick up address</label>
    </div>
    <div class="col-xs-12 col-md-8">
        <div class="inner-addon">
            <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
               
            <?= $form->field($model, 'raaddress')->textInput(['id' => 'pickup-address-return-panel', 'class' => 'cpanel-input' ,'placeholder' => 'Imran Qasimov, 4'])->label(false) ?>
        </div>
    </div>
    </div>
    
</div>

<div class="row">
    <div class="cpanel-item">
        <div class="col-xs-12 col-md-4" style="text-align: right">
                <label for="destination_address">Destination</label>
        </div>
        <div class="col-xs-12 col-md-8">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
        
            <!--$form->field($model, 'from')->HiddenInput(['value' => Yii::$app->request->get('Transferorder')['to']])->label(false) ?>-->
        <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Transferorder")["to"]]); -->
            <div id="destination-in-form"><?= Yii::$app->request->get("Transferorder")["from"]; ?></div>
        </div>


    </div>
</div>
        
        




</fieldset>


</div>

