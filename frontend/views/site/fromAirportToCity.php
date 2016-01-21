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
                <?= $form->field($model, 'date')->textInput(['id' => 'date-arrival', 'class' => 'cpanel-input' , 'placeholder' => 'Choose date'])->label(false) ?>
            </div>
            <div class="col-md-2">     
                <?= $form->field($model, 'time')->textInput(['id' => 'time-arrival', 'class' => 'cpanel-input' , 'placeholder' => 'HH:mm'])->label(false) ?>
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
        <div class="col-md-3" style="text-align: right">
                <label for="destination_address">Destination address</label>
        </div>
        <div class="col-md-3">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
       
            <?= $form->field($model, 'to')->HiddenInput(['value' => Yii::$app->request->get('Transferorder')['to']])->label(false) ?>
        <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Sifarish")["to"]]); -->
            <div id="destination-in-form"><?= $form->field($model, 'from')->textInput(['id' => 'pac-input-order-form', 'class' => 'cpanel-input' ,'value' => Yii::$app->request->get("Transferorder")["from"]])->label(false) ?></div>
        </div>

        <div class="col-md-4">
            <div class="inner-addon">
                <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                <!--<input type="text" id="specify-address" class="cpanel-input" placeholder="Specify address(i.e. str, house etc.)"/>-->

                   
                <?= $form->field($model, 'address')->textInput(['id' => 'specify-address', 'class' => 'cpanel-input' ,'placeholder' => 'Specify address (i.e str, house etc.)'])->label(false) ?>
            </div>


        </div>
        <!-- append icon here -->
        <div class="col-md-1">
        </div>
    </div>
</div>
<div id="parent-container-add-destination">
    <div class="row">
        <div class="cpanel-item new-destination hide">
            <div class="col-md-3" style="text-align: right">
                <label for="destination_address">Destination address</label>
        </div>
        <div class="col-md-3">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
       
            <?= $form->field($model, 'to')->HiddenInput(['value' => Yii::$app->request->get('Transferorder')['to']])->label(false) ?>
        <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Sifarish")["to"]]); -->
            <div id="destination-in-form"><?= $form->field($model, 'from')->textInput(['id' => 'pac-input-order-form', 'class' => 'cpanel-input' ,'value' => Yii::$app->request->get("Transferorder")["from"]])->label(false) ?></div>
        </div>

        <div class="col-md-4">
            <div class="inner-addon">
                <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                <!--<input type="text" id="specify-address" class="cpanel-input" placeholder="Specify address(i.e. str, house etc.)"/>-->

                   
                <?= $form->field($model, 'address')->textInput(['id' => 'specify-address', 'class' => 'cpanel-input' ,'placeholder' => 'Specify address (i.e str, house etc.)'])->label(false) ?>
            </div>
        </div>
        <!-- append icon here -->
        <div class="col-md-2 close">
           <?=Icon::show('times-circle', ['class'=>"fa-2x"], Icon::FA);?>
        </div>
        </div>
    </div>
    
    <div class="row">
        <div class="cpanel-item new-destination hide">
            <div class="col-md-3" style="text-align: right">
                <label for="destination_address">Destination address</label>
            </div>
        <div class="col-md-3">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
       
            <?= $form->field($model, 'to')->HiddenInput(['value' => Yii::$app->request->get('Transferorder')['to']])->label(false) ?>
        <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Sifarish")["to"]]); -->
            <div id="destination-in-form"><?= $form->field($model, 'from')->textInput(['id' => 'pac-input-order-form', 'class' => 'cpanel-input' ,'value' => Yii::$app->request->get("Transferorder")["from"]])->label(false) ?></div>
        </div>

        <div class="col-md-4">
            <div class="inner-addon">
                <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                <!--<input type="text" id="specify-address" class="cpanel-input" placeholder="Specify address(i.e. str, house etc.)"/>-->

                   
                <?= $form->field($model, 'address')->textInput(['id' => 'specify-address', 'class' => 'cpanel-input' ,'placeholder' => 'Specify address (i.e str, house etc.)'])->label(false) ?>
            </div>


        </div>
        <!-- append icon here -->
        <div class="col-md-2 close">
           <?=Icon::show('times-circle', ['class'=>"fa-2x"], Icon::FA);?>
        </div>
        </div>
    </div>
    <div class="row">
        <div id="last" class="cpanel-item new-destination hide">
            <div class="col-md-3" style="text-align: right">
                <label for="destination_address">Destination address</label>
        </div>
        <div class="col-md-3">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
       
            <?= $form->field($model, 'to')->HiddenInput(['value' => Yii::$app->request->get('Transferorder')['to']])->label(false) ?>
        <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Sifarish")["to"]]); -->
            <div id="destination-in-form"><?= $form->field($model, 'from')->textInput(['id' => 'pac-input-order-form', 'class' => 'cpanel-input' ,'value' => Yii::$app->request->get("Transferorder")["from"]])->label(false) ?></div>
        </div>

        <div class="col-md-4">
            <div class="inner-addon">
                <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                <!--<input type="text" id="specify-address" class="cpanel-input" placeholder="Specify address(i.e. str, house etc.)"/>-->

                   
                <?= $form->field($model, 'address')->textInput(['id' => 'specify-address', 'class' => 'cpanel-input' ,'placeholder' => 'Specify address (i.e str, house etc.)'])->label(false) ?>
            </div>


        </div>
        <!-- append icon here -->
        <div class="col-md-2 close">
           <?=Icon::show('times-circle', ['class'=>"fa-2x"], Icon::FA);?>
        </div>
        </div>
    </div>
    <div id="add" class="cpanel-item">Add another another destination</div>
</div>


        <div class="row">
                <div class="cpanel-item">
                <div class="col-md-1" style="text-align: right">
                        <label id="return-check-form" for="return">Return</label>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'return')->checkbox(['id' => 'return','label'=>false, 'class' => 'cpanel-input'])->label(false); ?>
                </div>
                </div>
        </div>

</fieldset>


</div>