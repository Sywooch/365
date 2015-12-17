<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Drivers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Drivers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drivers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fullname',
            'sname',
            'fname',
            'address',
            'address1',
            'idcardN',
            'photo',
            'phone',
            'phone1',
            'email:email',
            'car',
            'bday',
            'count',
        ],
    ]) ?>

</div>
