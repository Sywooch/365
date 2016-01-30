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
                    <label for="date-arrival">Pick up date and time</label>
            </div>
            <div class="col-xs-12 col-md-3">
              
                <?= $form->field($model, 'date')->textInput(['id' => 
                    'date-pickup-citytocity', 'class' => 'cpanel-input date-picker' ,
                    'placeholder' => 'dd/mm/yy/'])->label(false) ?>
            </div>
            <div class="col-xs-12 col-md-2">
               
                <?= $form->field($model, 'time')->
        textInput(['id' => 'time-pickup', 'class' => 'cpanel-input time-picker' ,
            'placeholder' => 'HH:mm'])->label(false) ?>
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
               
            <?= $form->field($model, 'address')->textInput(['id' => 'pickup-address', 'class' => 'cpanel-input' ,'placeholder' => 'Specify address(i.e str, house etc.)'])->label(false) ?>
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
        <?= Html::activeHiddenInput($model, 'from', ['value' =>  Yii::$app->request->get("Transferorder")["to"]]); ?>
        <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Transferorder")["to"]]); -->
            <div id="destination-in-form"><?= Yii::$app->request->get("Transferorder")["to"]; ?></div>
        </div>


    </div>
</div>
        
        <div class="row">
    <div class="cpanel-item">
        <div class="col-xs-12 col-md-4" style="text-align: right">
                <label for="destination_address">Destination address</label>
        </div>
        <div class="col-xs-12 col-md-8">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
       
            <?= $form->field($model, 'from')->HiddenInput(['value' => Yii::$app->request->get('Transferorder')['to']])->label(false)?>

            <?= $form->field($model, 'to')->textInput(['id' => 'pac-input-order-form', 'class' => 'cpanel-input' ,'value' =>  Yii::$app->request->get("Transferorder")["to"]])->label(false) ?>
            
            <!--<div id="destination-in-form"> Yii::$app->request->get("Transferorder")["to"];</div>-->
        </div>


    </div>
</div>
        
    <div id="parent-container-add-destination">
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd', 'aaddress'=>'aaddress'])?>
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd1', 'aaddress'=>'aaddress1'])?>
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd2', 'aaddress'=>'aaddress2'])?>
        
    <div id="add" class="cpanel-item">Add another another destination</div>
</div> <!--add destination end --> 

<div class="row">
            <div class="cpanel-item">
                <div class="col-md-2">
                    <?= $form->field($model, 'return')->checkbox(['id' => 'return-form',
                         'class' => 'cpanel-input'])->label(false); ?>
                </div>
            </div>
        </div>


</fieldset>


</div>

<div id="return-panel" class="return-panel">
    <?= $this->render('returnPanel', ['model'=>$model, 'form'=>$form])?>
</div>