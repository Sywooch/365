<?php
 use yii\helpers\Html;
 use kartik\icons\Icon;
 use yii\widgets\ActiveForm;
?>
<div class="cpanel-section">
    <fieldset>
        <legend id="route">Route</legend>
        <div class="row">
            <div class="cpanel-item">
                <div class="col-xs-12 col-md-4">
                    <label for="date-flight">Date and time of pickup</label>
                </div>
                <div class="col-xs-12 col-md-3">
                    
                    <?= $form->field($model, 'date')->textInput(['id' => 'date-pickup',
                        'class' => 'cpanel-input date-picker' ,'placeholder' => 'dd/mm/yy'])->label(false) ?>
                </div>
                <div class="col-xs-12 col-md-2">
        
                    <?= $form->field($model, 'time')->textInput(['id' => 'time-pickup',
                        'class' => 'cpanel-input time-picker' ,'placeholder' => 'HH:mm'])->label(false) ?>
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
        
        <div class="col-xs-12 col-md-4" style="margin-bottom: 4px;">
        <label for="specify-address">Pick up address</label>
    </div>
    <div class="col-xs-12 col-md-8" style="margin-bottom: 4px; margin-top: 6px;">
        <?= Yii::$app->request->get("Transferorder")["from"] ?>
    </div> 
        
        
            <div class="col-md-4"></div>
    <div class="col-xs-12 col-md-8" style="margin-bottom: 4px;">
        <div class="inner-addon">
            <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
               
            <?= $form->field($model, 'address')->textInput(['id' => 
                'pickup-address', 'class' => 'cpanel-input' ,'placeholder' => 'Specify street number'])->label(false) ?>
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
        
            <?= $form->field($model, 'from')->HiddenInput(['value' => Yii::$app->request->get('Transferorder')['to']])->label(false) ?>
        <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Transferorder")["to"]]); -->
            <div id="destination-in-form"><?= Yii::$app->request->get("Transferorder")["to"]; ?></div>
        </div>


    </div>
</div>
        
        




</fieldset>


</div>