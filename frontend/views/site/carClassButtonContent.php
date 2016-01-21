<?php
use yii\helpers\Html;
use kartik\icons\Icon;
?>

<div class="row">
    <div class="col-sm-3 car-image">
        
    </div>
    <div class="col-sm-3 col-xs-4 car-name">
        <?= Html::encode($name) ?><br>
        MAX 3 <?=Icon::show('user',[],Icon::FA)?>
    </div>
    <div class="col-sm-3 col-xs-4 car-features">
        <span><?= Icon::show('wifi',[], Icon::FA)?></span>
    </div>
    <div class="col-sm-3 col-xs-4 car-price">
        <?=Html::encode($price)?>
    </div>
    <div class="col-sm-3 car-arrow"></div>
</div>
