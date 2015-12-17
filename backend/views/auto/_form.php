<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Autocat;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Auto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idcat')->dropDownList(
                    ArrayHelper::map(Autocat::find()->all(), 'id', 'name_az'),
                    [
                        'prompt' => '',
                    ])->label(false);
                ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carnumber')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
