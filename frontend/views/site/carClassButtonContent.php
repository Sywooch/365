<?php
use yii\helpers\Html;
use kartik\icons\Icon;
?>

<div class="row">
    <div class="col-sm-3 car-image">
        <img src="/uploads/<?=  $autos['photo'] ?>" />
    </div>
    <div class="col-sm-3 col-xs-4 car-name">
        <?= Html::encode($autos['name']) ?><br>
        MAX <?=Html::encode($autos['maxpas'])?> <?=Icon::show('user',[],Icon::FA)?>
    </div>
    <div class="col-sm-3 col-xs-4 car-features">
        <img src="uploads/wifi2.png" />
    </div>
    <div data-price="<?= $autos['priceT'] *$rate['0'] ?>" data-coefficient='<?= $autos['cent']*$rate['0']?>' class="col-sm-3 col-xs-4 car-price">
        <?=Html::encode($sign[$s])?> <span><?=Html::encode($autos['priceT']*$rate['0'])?></span>
    </div>
    <div class="car-arrow"></div>
</div>
