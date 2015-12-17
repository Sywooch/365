<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Drivers */

$this->title = Yii::t('yii', 'Create Drivers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Drivers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drivers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
