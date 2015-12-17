<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DriversSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drivers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'sname') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'address1') ?>

    <?php // echo $form->field($model, 'idcardN') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'phone1') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'car') ?>

    <?php // echo $form->field($model, 'bday') ?>

    <?php // echo $form->field($model, 'count') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('yii', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
