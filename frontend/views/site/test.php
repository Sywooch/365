<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


 <?= Html::activeTextInput($model, 'flightnumber', ['id'=>'flight-number',
     'class' =>  'cpanel-input','placeholder' => 'Enter flight number']); ?>
