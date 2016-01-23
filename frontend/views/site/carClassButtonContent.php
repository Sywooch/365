<?php
use yii\helpers\Html;
use kartik\icons\Icon;
?>

<div class="row">
    <div class="col-sm-3 car-image">
        <img src="/uploads/<?=  $photo ?>" />
    </div>
    <div class="col-sm-3 col-xs-4 car-name">
        <?= Html::encode($name) ?><br>
        MAX <?=Html::encode($pas)?> <?=Icon::show('user',[],Icon::FA)?>
    </div>
    <div class="col-sm-3 col-xs-4 car-features">
        <span><?= Icon::show('wifi',[], Icon::FA)?></span>
    </div>
    <div data-price="<?= $price  ?>" class="col-sm-3 col-xs-4 car-class-min-price">
        <?=Html::encode('$'.$price)?>
    </div>
    <div class="col-sm-3 car-arrow"></div>
</div>
