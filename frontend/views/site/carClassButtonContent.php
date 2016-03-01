<?php
use yii\helpers\Html;
use kartik\icons\Icon;
?>

<div class="row">
    <div class="col-sm-3 col-xs-4 col-md-2 car-image">
        <img alt="Transfer and chauffeur service in baku <?=$autos['name']?>" src="/uploads/<?=  $autos['photo'] ?>" />
    </div>
    <div class="col-sm-2 col-xs-4 col-md-3 car-name">
        <?= Html::encode($autos['name']) ?><br>
        <?=Yii::t('yii', 'MAX')?> <?=Html::encode($autos['maxpas'])?> <?=Icon::show('user',[],Icon::FA)?>
    </div>
    <div class="col-sm-3 col-xs-4 col-md-2 car-features">
        <img alt="free wifi baku" src="uploads/wifi2.png" />
    </div>
    <div data-price="<?= intval($autos['priceT']*$rate['0']) ?>" 
         data-coefficient='<?= $autos['cent']*$rate['0']?>' 
         data-pricechaffeur='<?= intval($autos['priceC'] * $rate['0'])?>'
         class="col-sm-4 col-xs-12 col-md-4 car-price">
        
        <div class="prices-transfer"><?=$sign[$s]?> <span><?=Html::encode(intval($autos['priceT']*$rate['0']))?></span></div>
        <div class="prices-chauffeur">
            <span class="daily-rent"><?=Yii::t('yii', 'Full day (8 hours)')?>  </span><?=$sign[$s]?> <span class="pricefull-sp"><?=Html::encode(intval($autos[$ajaxr]*$rate['0']))?></span><br>
            <?=Yii::t('yii', 'Half day (4 hours)')?> <?=$sign[$s]?> <span class="pricehalf-sp"><?=Html::encode(intval($autos[$ajaxr]*$rate['0']))/2*1.2?></span><br>
        </div>
    </div>
    <div class="car-arrow col-md-2"></div>
</div>
