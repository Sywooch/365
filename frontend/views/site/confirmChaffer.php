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
        <div class="col-xs-4 col-md-4 step step-complete">
            <span id="step1">Destination</span>
            
        </div>
        <div class="col-xs-4 col-md-4 step step-complete">
            <span id="step2">Passenger information</span>
            <div class="rounded-border"></div>
        </div>
        <div class=" col-xs-4 col-md-4 step step-active">
            <span id="step3">Confirmation</span>
            <div class="rounded-border"></div>
        </div>
    </div>
</div><!--Steps end-->

<div id="confirm-chaffer" class="container">
    <div class="row">
        <h1>Confirmation</h1>
        <h2>Review information below before proceeding to payment.</h2>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div id="googleMap" style="width:600px;height:400px;z-index:9999;margin-top: 25px;"></div>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="row"><h1>Order summary</h1></div>
                    <div class="row">
                        <h4>Pickup address</h4>
                        <div class="col-md-12"><?= $model->from ?> <?=$model->address?></div> 
                    </div>
                    <div class="row">
                        <h4>Rent starts at:</h4>
                        <div class="col-md-12"><?=date("Y F d - H:i",$model->pickuptime)?></div>
                    </div>
                    <div class="row">
                        <h4>Rent ends at:</h4>
                        <div class="col-md-12"><?=date("Y F d - H:i",$model->endtime)?></div>
                    </div>
                    <div class="row">
                        <h4>Car:</h4>
                        <div class="col-md-12"><?=$model->car0['0']['name']?></div>
                    </div>
                    <div class="row">
                        <h4>Price:</h4>
                        <div class="col-md-12"><?=$model->amount?></div>
                    </div>
                    <div class="row">
                        <h3>Schedule</h3>
                    </div>
                  
                    <?php foreach($model->time as $adday => $times):?>
                    <div class="row">
                        
                         <h4><?=date('Y F d', strtotime('+'.$adday.' day',$model->pickuptime));?></h4>
                         <div class="col-md-6">From <span><?= date("H:i",$times['time_start'])?></span></div>
                         <div class="col-md-6">To <span><?= date("H:i",$times['time_end'])?></span></div>
                    </div>
                    
                    <?php endforeach; ?>
                   
                    <div class="row">
                        <h3>Customer: </h3>
                        <span><?=$model->firstname.' '.$model->lastname?></span>
                    </div>
                    <div class="row">
                        <h3>Tel: </h3>
                        <span><?=$model->phone?></span>
                    </div>
                    <div class="row">
                        <h3>Email: </h3>
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
                <div class="col-md-12 button-box-title">Total price <?=$model->amount?></span> USD</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= Html::a('<button>Go To Payment</button>', ['site/confirm', 'id'=>$model->id,'mode' =>'ch' ]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12"></div>
            </div>

        </div>
        <div class="col-md-3"></div>

    </div>
</div>