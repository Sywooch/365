<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Auto */

$this->title = Yii::t('yii', 'Update {modelClass}: ', [
    'modelClass' => 'Auto',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Autos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="auto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
