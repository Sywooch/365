<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Driverequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="driver-form" class="container-fluid steps-wrap">
   
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-8">
    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-8">
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-8">
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-8">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-8">
    <?= $form->field($model, 'car')->textInput(['maxlength' => true]) ?>
    </div>
    
    
        <div id="driver-bday"></div>
        <!--$form->field($model, 'bday')->textInput(['id' => '', 'class' => 'cpanel-input' , 'placeholder' => 'Choose date'])->label(false)--> 
   
    <div class="col-md-8">
    <div class="form-group">
        
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>
 

</div>
