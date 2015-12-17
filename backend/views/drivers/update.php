<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Drivers */

$this->title = Yii::t('yii', 'Update {modelClass}: ', [
    'modelClass' => 'Drivers',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Drivers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="drivers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
