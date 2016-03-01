<?php
 use yii\helpers\Html;
 use kartik\icons\Icon;
 use yii\widgets\ActiveForm;
?>
<div class="cpanel-section">
    <fieldset>
        <legend id="route"><?= Yii::t('yii', 'Route')?></legend>
        

    <div class="row">
        <div class="cpanel-item">
            <div class="row">
                <div class="col-xs-12 col-md-3">
                        <label for="date-arrival"><?= Yii::t('yii', 'Date and time of pick up')?></label>
                </div>
                <div class="col-xs-12 col-md-3">
                    <?= $form->field($model, 'date')->textInput(['id' =>'date-pickup-citytocity',
                        'autocomplete'=>'false',
                        'class' => 'cpanel-input date-picker' ,
                        'placeholder' => Yii::t('yii', 'dd/mm/yy')])->label(false) ?>
                </div>
                <div class="col-xs-12 col-md-2">
                    <?= $form->field($model, 'time')->
                textInput(['id' => 'time-pickup', 'class' => 'cpanel-input time-picker' ,
                    'autocomplete'=>'false',
                'placeholder' => Yii::t('yii', 'hh:mm')])->label(false) ?>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="description">
                        <?= Yii::t('yii', 'Local time')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<div class="row">
    <div class="cpanel-item">
        <div class="row">
            <div class="col-xs-12 col-md-3">
                <label for="specify-address"><?= Yii::t('yii','Pick up address') ?></label>
            </div>
            <div class="col-xs-12 col-md-9 location">
                <?= Yii::$app->request->get("Transferorder")["from"]?>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-3"></div>
            <div class="col-xs-12 col-md-5 location-input">
                <div class="inner-addon">
                    <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                    <?= $form->field($model, 'faaddress')->textInput(['id' => 'pickup-address',
                        'class' => 'cpanel-input' ,'placeholder' => Yii::t('yii', 'Specify adress (I.e str,house etc.)')])->label(false) ?>
                </div>
                
            </div>
            <div class="col-xs-12 col-md-4">
                <p class="description"> <?= Yii::t('yii','If you don\'t know the exact address, leave the field empty')?> </p>
            </div>
        </div>
        
   
    </div>
    
</div>

<div class="row">
    <div class="cpanel-item">
        <div class="row">
            <div class="col-xs-12 col-md-3" style="text-align: right">
                <label for="destination_address"><?= Yii::t('yii','Destination address')?></label>
            </div>
            <div class="col-xs-12 col-md-9 location"> 
                <?= Html::activeHiddenInput($model, 'from', ['value' =>  
                    Yii::$app->request->get("Transferorder")["to"]]); ?>
            <div id="destination-in-form"><?= Yii::$app->request->get("Transferorder")["to"]; ?></div>
        </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-3"></div>
        <div class="col-xs-12 col-md-5 location">
            <div class="inner-addon">
                <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                <?= $form->field($model, 'address')->textInput(['id' => 'specify-address', 
                    'class' => 'cpanel-input' ,'placeholder' => Yii::t('yii', 'Specify adress (I.e str,house etc.)')])->label(false) ?>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <p class="description"> <?= Yii::t('yii','If you don\'t know the exact address, leave the field empty')?> </p>
        </div>
        </div>

    </div>
</div>
 
       
    <?= $form->field($model, 'to')->HiddenInput(['id'=>'to','class'=>'add-dest-address',
        'value' => Yii::$app->request->get('Transferorder')['to']])->label(false) ?>
    <?= $form->field($model, 'from')->HiddenInput(['id'=>'from', 'class'=>'add-dest-address'
        ,'value' => Yii::$app->request->get('Transferorder')['from']])->label(false) ?>

  <div class="row">
     <div class="cpanel-item">
<div id="parent-container-add-destination">
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd', 'aaddress'=>'aaddress'])?>
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd1', 'aaddress'=>'aaddress1'])?>
    <div id="last"><?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd2', 'aaddress'=>'aaddress2'])?></div>
    
    <div style="display: inline-block;">
                <div id="add" class=" pseudo-link" style="display: inline-block;"><?= Yii::t('yii', 'Add another destination')?></div>
            </div>
    
</div> 
 </div>
 </div> <!--add destination end -->

<div class="row">
    <div class="cpanel-item">
        <div class="col-md-3 return-checkbox">
            <?= $form->field($model, 'return')->checkbox(['id' => 'return-form',
                 'class' => 'cpanel-input'])->label(false); ?>
        </div>
    </div>
</div>
 


</fieldset>


</div>



<div id="return-panel" class="return-panel" data-return-state="<?=$return?>">
    <?= $this->render('returnPanel', ['model'=>$model, 'form'=>$form])?>
</div>