<?php
    use yii\helpers\Html;
    date_default_timezone_set('Asia/Baku');
?>
<!-- Steps -->
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

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="map"></div>
        </div>
        <div class="col-md-6">
            <div class="row"><h3>Order summary</h3></div>
            <div class="row">From <strong><input type="text" id="summary-from" value='<?=$model->from?>'/>,
                    <input type="text" id="summary-anotherd" value='<?=$model->anotherd?>'/>,
                <input type="text" id="summary-anotherd1" value='<?=$model->anotherd1?>'/>,
                <input type="text" id="summary-anotherd2" value='<?=$model->anotherd2?>'/></strong>
                
                to <strong><input type="text" id="summary-to" value='<?=$model->to?>'/></strong></div>
            <div class="row">Pickup time at <strong><?=date("Y/m/d H:i",$model->pickuptime)?></strong></div>
            <div class="row">Car <strong><?= $model->autos['0']['name']?></strong></div>
            <div class="row"><h3>Customer information</h3></div>
            <div class="row"><?=$model->firstname?> <?=$model->lastname?></strong></div>
            <div class="row">Tel: <strong><?=$model->phone?></strong></div>
            <div class="row">Email: <strong><?=$model->email?></strong></div>
            <div class="row">Notes: <?=$model->notes?></div>
        </div>
    </div>
    </div>


<div id="googleMap" style="width:400px;height:300px;"></div>
