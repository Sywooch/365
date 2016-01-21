<?php
 use yii\helpers\Html;
 use kartik\icons\Icon;
 use yii\widgets\ActiveForm;
?>

<div class="cpanel-section">
    <fieldset>
        <legend id="route">Route</legend>
        <div class="row">
            <?= print_r(Yii::$app->request->get())?>
            <div class="cpanel-item">
                <div class="col-md-3">
                    <label for="flight-number">Flight number</label>
                </div>
                <div class="col-md-3">
                    <?= Html::activeTextInput($model, 'flightnumber', ['id'=>'flight-number',
                        'class' =>  'cpanel-input','placeholder' => 'Enter flight number']); ?>
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
                <!--<input type="text" id="date-arrival" class="cpanel-input" 
                    placeholder="Choose date"/>-->

                 <?= Html::activeTextInput($model, 'date', ['id' => 'date-arrival',
                     'class'=>'cpanel-input','placeholder' => 'Choose date']); ?>
        </div>
        <div class="col-md-2">
               <!-- <input type="text" id="time-arrival"
                       class="cpanel-input"
                    placeholder="Choose time"/>-->


                 <?= Html::activeTextInput($model, 'time', ['id' => 'time-arrival',
                     'class'=>'cpanel-input','placeholder' => 'HH:mm']); ?>
        </div>
            <div class="col-md-3">
                <div class="description">
                    *local time
                </div>
            </div>

</div>
</div>
<div id="add-dest-anchor">
<div class="row">
    <div class="cpanel-item">
        <div class="col-md-3" style="text-align: right">
                <label for="destination_address">Destination address</label>
        </div>
        <div class="col-md-3">
               <!-- <input type="text" id="pac-input-order-form" class="cpanel-input" value=""/>-->
        <?= Html::activeHiddenInput($model, 'from', ['value' =>  Yii::$app->request->get("Sifarish")["to"]]); ?>
        <!-- Html::activeTextInput($model, 'to', ['id' => 'pac-input-order-form','class'=>'cpanel-input','value' =>  Yii::$app->request->get("Sifarish")["to"]]); -->
            <div id="destination-in-form"><?= Yii::$app->request->get("Sifarish")["to"]; ?></div>
        </div>

        <div class="col-md-4">
            <div class="inner-addon">
                <span><?= Icon::show('home', ['class'=>'fa-2x'], Icon::FA);?></span>
                <!--<input type="text" id="specify-address" class="cpanel-input" placeholder="Specify address(i.e. str, house etc.)"/>-->

                   <?= Html::activeTextInput($model, 'address', ['id' => 'specify-address',
                       'class'=>'cpanel-input','placeholder' => 'Specify address(i.e. str, house etc.)']); ?>
            </div>


        </div>
        <!-- append icon here -->
        <div class="col-md-1">
        </div>
    </div>
</div>
</div>

        <div class="row">
                <div class="cpanel-item">

                <div class="col-md-10">
                        <div class="pseudo-link destination"><span id="pseudo-link">Add another destination</span> + 600 RUB</div>
                </div>
                    <div class="col-md-2">
                </div>
        </div>
        </div>

        <div class="row">
                <div class="cpanel-item">
                <div class="col-md-1" style="text-align: right">
                        <label id="return-check-form" for="return">Return</label>
                </div>
                <div class="col-md-1">
                    <?= Html::activeCheckbox($model, 'return', ['id' => 'return','class'=>'cpanel-input','label'=>null]); ?>
                </div>
                </div>
        </div>

</fieldset>


</div>