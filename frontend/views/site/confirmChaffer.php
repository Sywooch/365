<?php
use common\models\Transferorder;
use common\models\Rentorder;
use yii\helpers\Html;
use yii\helpers\Url;
date_default_timezone_set('Asia/Baku');

?>

<div id='location' data-location='<?=$model->from?>'></div>


<div class="container-fluid steps-wrap">
    <div class="row steps">
        <div class="col-xs-4 col-md-4 step step-active">
            <span id="step1"><?=Yii::t('yii', 'Destination')?></span>
        </div>
        <div class="col-xs-4 col-md-4 step step-inactive">
            <span id="step2"><?=Yii::t('yii', 'Passenger information')?></span>
            <div class="rounded-border"></div>
        </div>
        <div class=" col-xs-4 col-md-4 step step-inactive">
        <span id="step3"><?=Yii::t('yii', 'Confirmation')?></span>
        <div class="rounded-border"></div>
        </div>
    </div>
</div><!--Steps end-->

<div id="confirm-chaffer" class="container">
    <div class="row">
        <h1><?= Yii::t('yii','Confirmation')?></h1>
        <h2><?= Yii::t('yii','Review information below before proceeding to payment')?></h2>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div id="googleMap" style="width:600px;height:400px;z-index:1;margin-top: 25px;"></div>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="row"><h1><?= Yii::t('yii','Order summary')?></h1></div>
                    <div class="row">
                        <h4><?= Yii::t('yii','Pickup address')?></h4>
                        <div class="col-md-12"><?= $model->from ?> <?=$model->address?></div> 
                    </div>
                    <div class="row">
                        <h4><?= Yii::t('yii','Rent starts at')?>:</h4>
                        <div class="col-md-12"><?=date("Y F d",$model->pickuptime)?></div>
                    </div>
                    <div class="row">
                        <h4><?= Yii::t('yii','Rent ends at')?>:</h4>
                        <div class="col-md-12"><?=date("Y F d",$model->endtime)?></div>
                    </div>
                    <div class="row">
                        <h4><?= Yii::t('yii','Car')?>:</h4>
                        <div class="col-md-12"><?=$model->car0['0']['name']?></div>
                    </div>
                    <div class="row">
                        <h4><?= Yii::t('yii','Price')?>:</h4>
                        <div class="col-md-12"><?= substr($model->amount, 0, -2) ?> AZN 
                            <span class='description'>*<?= Yii::t('yii','the price to be paid in online payment system')?></span></div>
                    </div>
                    <div class="row">
                        <h3><?= Yii::t('yii','Schedule')?></h3>
                    </div>
                  
                    <?php foreach($model->time as $adday => $times):?>
                    <div class="row">
                        
                         <h4><?=date('Y F d', strtotime('+'.$adday.' day',$model->pickuptime));?></h4>
                         <div class="col-md-6"><?= Yii::t('yii', 'From ')?> <span><?= date("H:i",$times['time_start'])?></span></div>
                         <div class="col-md-6"><?= Yii::t('yii', 'To ')?> <span><?= date("H:i",$times['time_end'])?></span></div>
                    </div>
                    
                    <?php endforeach; ?>
                   
                    <div class="row">
                        <h3><?= Yii::t('yii','Customer')?>: </h3>
                        <span><?=$model->firstname.' '.$model->lastname?></span>
                    </div>
                    <div class="row">
                        <h3><?= Yii::t('yii','Tel')?>: </h3>
                        <span><?=$model->phone?></span>
                    </div>
                    <div class="row">
                        <h3><?= Yii::t('yii','Email')?>: </h3>
                        <span><?=$model->email?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div id="button-box-confirmation" class="col-md-6 button-box">
            <div class="row">
                <div class="col-md-12 button-box-title"><?= Yii::t('yii','Total price')?> <?=$model->amount?></span> USD</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= Html::a('<button>'.Yii::t('yii', 'Go To Payment').'</button>', ['site/confirm', 'id'=>$model->id,'mode' =>'ch' ]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12"></div>
            </div>

        </div>
        <div class="col-md-3"></div>

    </div>
</div>