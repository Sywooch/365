<?php
 use yii\helpers\Html;
 use kartik\icons\Icon;
 use yii\widgets\ActiveForm;
?>

<div class="cpanel-section">
    <fieldset>
        <h3 id="route">Route</h3>
        <div class="row">
            <div class="row cpanel-item">
                
                <div class="col-md-3">
                    <label for="flight-number">Flight number</label>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'flightnumber')->textInput(['id' =>
                        'flight-number', 'class' => 'cpanel-input','placehodler' => 'Enter flight number'])->label(false) ?>

                </div>
                <div class="col-md-6">
                    <div class="description">
                        as specified in your flight ticket
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="row cpanel-item">
            
                <div class="col-md-3">
                        <label for="date-arrival">Arrival time</label>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'date')->textInput(['id' => 
                        'date-arrival', 'class' => 'cpanel-input date-picker' , 'placeholder' => 'dd/mm/yy'])->label(false) ?>
                </div>
                <div class="col-md-2">     
                    <?= $form->field($model, 'time')->textInput(['id' => 
                        'time-arrival', 'class' => 'cpanel-input time-picker' , 'placeholder' => 'HH:mm'])->label(false) ?>
                </div>
                <div class="col-md-3">
                    <div class="description">
                        local time
                    </div>
                </div>
            
        </div>
    </div>

<div class="row">
    <div class="cpanel-item">
       
        <?= $form->field($model, 'to')->HiddenInput(['id'=>'to','class'=>'add-dest-address',
            'value' => Yii::$app->request->get('Transferorder')['to']])->label(false) ?>
        <?= $form->field($model, 'from')->HiddenInput(['id'=>'from', 'class'=>'add-dest-address'
            ,'value' => Yii::$app->request->get('Transferorder')['from']])->label(false) ?>
        <div class="row">
            <div class="col-md-3">
                <label for="specify-address">Destination address</label>
            </div>
            <div class="col-md-9 location"><?= Yii::$app->request->get('Transferorder')['to']?></div>
        </div>
        
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5 location-input">
                <div class="inner-addon">
                    <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                    <?= $form->field($model, 'address')->textInput(['id' => 'specify-address', 
                        'class' => 'cpanel-input' ,'placeholder' => 'Specify address (i.e str, house etc.)'])->label(false) ?>
                </div>
            </div>
            <div class="col-md-4">
                <p class="description"> If you don't know the exact address, leave the field empty </p>
            </div>
        </div>





        
    </div>
</div>
     
    <div id="parent-container-add-destination">
        <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 
            'id'=>'anotherd', 'aaddress'=>'aaddress'])?>
        <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 
            'id'=>'anotherd1', 'aaddress'=>'aaddress1'])?>
        <div id="last"><?= $this->render('addDestination', ['model'=>$model,
            'form'=>$form, 'id'=>'anotherd2', 'aaddress'=>'aaddress2'])?></div>

            <div class="row">
                <div class="cpanel-item">
            <div class="col-md-4">
                <div id="add" class=" pseudo-link cpanel-item">Add another destination</div>
            </div>
                </div>
            </div>
        
    </div> 



    <div class="row">
        <div class="cpanel-item">
            
            <div class="col-md-2 return-checkbox">
                <?= $form->field($model, 'return')->checkbox(['id' => 'return-form',
                     'class' => 'cpanel-input'])->label(false); ?>
            </div>
            
        </div>
    </div>

</fieldset>


</div>

<div id="return-panel" class="return-panel" data-return-state="<?=$return?>">
    <?= $this->render('returnPanel', ['model'=>$model,'form'=>$form])?>
</div>