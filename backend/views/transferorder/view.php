<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Transferorder */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Transferorders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transferorder-view">

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
            'created_at',
            'updated_at',
            'lastname',
            'firstname',
            'email:email',
            'phone',
            'phone1',
            'flightnumber',
            'notes',
            'type',
            'from',
            'to',
            'anotherd',
            'anotherd1',
            'anotherd2',
            'pickuptime:datetime',
            'car',
            'amount',
            'currency',
            'return',
            'seat',
            'gsign',
            'address',
        ],
    ]) ?>

</div>
