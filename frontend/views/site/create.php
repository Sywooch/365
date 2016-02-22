<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Driverequest */

$this->title = Yii::t('yii', 'Create Driverequest');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Driverequests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driverequest-create">
    <div class="container">
        

        <h1><?= Html::encode($this->title) ?></h1>
        
       
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
      
    </div>

</div>
