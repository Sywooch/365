<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Autocat */

$this->title = Yii::t('yii', 'Create Autocat');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Autocats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autocat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
