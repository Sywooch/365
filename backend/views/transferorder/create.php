<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Transferorder */

$this->title = Yii::t('yii', 'Create Transferorder');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Transferorders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transferorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
