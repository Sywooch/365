<?php
use yii\helpers\Html;
use kartik\icons\Icon;
?>

<div class="row">
    <div class="col-sm-3 col-xs-4 col-md-2 car-image">
        <img src="/uploads/<?=  $autos['photo'] ?>" />
    </div>
    <div class="col-sm-2 col-xs-4 col-md-3 car-name">
        <?= Html::encode($autos['name']) ?><br>
        MAX <?=Html::encode($autos['maxpas'])?> <?=Icon::show('user',[],Icon::FA)?>
    </div>
    <div class="col-sm-3 col-xs-4 col-md-3 car-features">
        <img src="uploads/wifi2.png" />
    </div>
    <div data-price="<?= intval($autos[$ajaxr]*$rate['0']) ?>" data-coefficient='<?= $autos['cent']*$rate['0']?>' 
         class="col-sm-4 col-xs-12 col-md-3 car-price">
        
        <div class="prices-transfer">from <?=$sign[$s]?> <span><?=Html::encode(intval($autos[$ajaxr]*$rate['0']))?></span></div>
        <div class="prices-chauffeur">
            Full day (8 hours) <?=$sign[$s]?> <span><?=Html::encode(intval($autos[$ajaxr]*$rate['0']))?></span><br>
            Half day (4 hours) <?=$sign[$s]?> <span><?=Html::encode(intval($autos[$ajaxr]*$rate['0']))/2*1.2?></span><br>
        </div>
    </div>
    <div class="car-arrow col-md-2"></div>
</div>
