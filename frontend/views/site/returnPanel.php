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
                <div class="col-xs-12 col-md-3">
                    <label for="date-flight">Date and time of pickup</label>
                </div>
                <div class="col-xs-12 col-md-3">
                    <?= $form->field($model, 'rdate')->textInput(['id' => 'date-pickup-return-panel',
                        'class' => 'cpanel-input date-picker return' ,
                        'placeholder' => 'dd/mm/yy'])->label(false) ?>
                </div>
                <div class="col-xs-12 col-md-2">
                    <?= $form->field($model, 'rtime')->textInput(['id' => 'time-pickup-return-panel',
                        'class' => 'cpanel-input time-picker return' ,
                        'placeholder' => 'HH:mm'])->label(false) ?>
                </div>
                <div class="col-xs-12 col-md-3">
                <div class="description">
                    local time
                </div>
            </div>
            </div>
        </div>

</fieldset>


</div>

