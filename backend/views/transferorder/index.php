<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TransferorderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Transferorders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transferorder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('yii', 'Create Transferorder'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at',
            'updated_at',
            'lastname',
            'firstname',
            // 'email:email',
            // 'phone',
            // 'phone1',
            // 'flightnumber',
            // 'notes',
            // 'type',
            // 'from',
            // 'to',
            // 'anotherd',
            // 'anotherd1',
            // 'anotherd2',
            // 'pickuptime:datetime',
            // 'car',
            // 'amount',
            // 'currency',
            // 'return',
            // 'seat',
            // 'gsign',
            // 'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
