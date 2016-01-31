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
                <div class="col-md-3">
                    <label for="flight-number">Flight number</label>
                </div>
                <div class="col-md-3">
                    
                    <?= $form->field($model, 'flightnumber')->textInput(['id' => 'flight-number', 'class' => 'cpanel-input','placehodler' => 'Enter flight number'])->label(false) ?>
                   <!-- $this->render('test', ['model'=>$model])-->
                </div>
                <div class="col-md-6">
                    <div class="description">
                        *as specified in your flight ticket
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="cpanel-item">
            <div class="col-md-3">
                    <label for="date-arrival">Arrival time</label>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'date')->textInput(['id' => 'date-arrival', 'class' => 'cpanel-input date-picker' , 'placeholder' => 'Choose date'])->label(false) ?>
            </div>
            <div class="col-md-2">     
                <?= $form->field($model, 'time')->textInput(['id' => 'time-arrival', 'class' => 'cpanel-input time-picker' , 'placeholder' => 'HH:mm'])->label(false) ?>
            </div>
            <div class="col-md-3">
                <div class="description">
                    *local time
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="cpanel-item">
        <div class="col-xs-12 col-md-3" style="text-align: right">
                <label for="destination_address">Destination address</label>
        </div>
        <div class="col-xs-12 col-md-9">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
       
            <?= $form->field($model, 'to')->HiddenInput(['class'=>'add-dest-address',
                'value' => Yii::$app->request->get('Transferorder')['to']])->label(false) ?>
            <?= $form->field($model, 'from')->HiddenInput(['id'=>'from', 'class'=>'add-dest-address'
                ,'value' => Yii::$app->request->get('Transferorder')['from']])->label(false) ?>
            
            <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Sifarish")["to"]]); -->
            <div id="destination-in-form"><?= Yii::$app->request->get("Transferorder")["to"] ?></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
        <div class="col-xs-12 col-md-5">
            <div class="inner-addon">
                <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                <!--<input type="text" id="specify-address" class="cpanel-input" placeholder="Specify address(i.e. str, house etc.)"/>-->

                   
                <?= $form->field($model, 'address')->textInput(['id' => 'specify-address', 
                    'class' => 'cpanel-input' ,'placeholder' => 'Specify street number'])->label(false) ?>
            </div>


        </div>
        </div>
        <!-- append icon here -->
        <div class="col-md-1">
        </div>
    </div>
</div>
<div id="parent-container-add-destination">
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd', 'aaddress'=>'aaddress'])?>
    <?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd1', 'aaddress'=>'aaddress1'])?>
    <div id="last"><?= $this->render('addDestination', ['model'=>$model, 'form'=>$form, 'id'=>'anotherd2', 'aaddress'=>'aaddress2'])?></div>
    
    <div class="row">
        <div id="add" class="col-xs-12 col-md-6 pseudo-link cpanel-item">Add another another destination</div>
    </div>
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
    <?= $this->render('returnPanel', ['model'=>$model,'form'=>$form])?>
</div>