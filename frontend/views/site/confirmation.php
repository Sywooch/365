<?php
use common\models\Transferorder;
    use yii\helpers\Html;
    use yii\helpers\Url;
    date_default_timezone_set('Asia/Baku');
    
   $address = (!empty($model->address) ? '<h5 style="font-weight:bold;">Address: '.$model->address.'</h5>' : null);
   $aaddress = (!empty($model->aaddress) ? '<h5 style="font-weight:bold;">Address: '.$model->aaddress.'</h5>' : null);
   $aaddress1 = (!empty($model->aaddress1) ? '<h5 style="font-weight:bold;">Address: '.$model->aaddress1.'</h5>' : null);
   $aaddress2 = (!empty($model->aaddress2) ? '<h5 style="font-weight:bold;">Address: '.$model->aaddress2.'</h5>' : null);
    
   $unvanlar[] = $model->from.'➟'.$model->to.$address;
   $unvanlar[] = (!empty($model->anotherd) ? $model->to.'➟'.$model->anotherd.$aaddress : null);
   $unvanlar[] = (!empty($model->anotherd1) ? $model->anotherd.'➟'.$model->anotherd1.$aaddress1 : null);
   $unvanlar[] = (!empty($model->anotherd2) ? $model->anotherd1.'➟'.$model->anotherd2.$aaddress2 : null);
?>
<!-- Steps -->
<div id="distance" data-distance="<?=Yii::$app->request->get('Transferorder')?>"></div>
<div id="orderId" data-id="<?= $model->id ?>"></div>
<div id="origin" data-origin="<?= Yii::$app->request->get('placeStart') ?>"></div>
<div id="destination" data-destination="<?= Yii::$app->request->get('placeEnd') ?>"></div>
<div id="distance" data-distance='<?= Yii::$app->request->get('distance') ?>'></div>
<div id="duration" data-duration='<?= Yii::$app->request->get('duration') ?>'></div>

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

<div id="confirmation" class="container">
    <div class="row">
        <h1>Confirmation</h1>
        <h2>Review information below before proceeding to payment.</h2>
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
            <div id="map"></div>
        </div>
        <div class="col-md-6">
            <div class="row"><h3>Order summary</h3></div>
            <div class="row"><h4>Destinations</h4></div>
            <ol>
                <?php 
                    foreach($unvanlar as $unvan):
                ?>
                    <?php if (!empty($unvan)): ?>
                        <li><?= $unvan ?></li>
                    <?php endif ?>
                
                <?php endforeach; ?>
         
            </ol>
            <div class="row"><h3>Tariff</h3></div>
            <ul>
                <li><div class="row">Pickup at: <strong><?=date("Y F d - H:i",$model->pickuptime)?></strong></div></li>
                <li><div class="row">Car: <strong><?= $model->autos['0']['name']?></strong></div></li>
                <?php if (!empty($model->seat)):?>
                    <li><div class="row">Child seats: <?= $model->seat?></div></li>
                <?php endif ?>
                <li><div id="total-distance" class="row">Total distance:
                    <strong><span><?= Yii::$app->request->get('distance') ?></span> km</strong> 
                    <span class='description'>*distance with waypoints</span></div></li>
                <li><div id="estimated-time" class="row">Estimated time of the trip:
                        <strong><span id='hours'></span> hour(s) <span id='minutes'></span> minute(s)</strong>
                     <span class='description'>*time with waypoints</span></div></li>
                <li><div id="price" class="row">Price: <strong><span><?= $amount = substr($model->amount, 0, -2) ?></span> AZN</strong></div>
            </ul>
            
            
            <div class="row"><h3>Customer information</h3></div>
            <ul>
                <li><div class="row">Customer: <strong><?=$model->firstname?> <?=$model->lastname?></strong></div></li>
                <li><div class="row">Tel: <strong><?=$model->phone?></strong></div></li>
                <li><div class="row">Email: <strong><?=$model->email?></strong></div></li>
                <li>
                    <?php if (!empty($model->gsign)):?>
                <div class="row">Greeting sign: <strong><?=$model->gsign?></strong></div>
            <?php endif ?>
                </li>
                <li><?php if (!empty($model->notes)):?>
                <div class="row">Notes: <?=$model->notes?></div>
            <?php endif ?></li>
            </ul>
        </div>
    </div>
    <script>
    
    
  
          
    </script>
         
            <?php
           /* $converter = new CurrencyConverter();
            $rate =  $converter->convert('USD', 'AZN');
           /* $kmsum = 0;
            foreach($routes as $route){
                 $kmsum += $route/1000; 
                // echo '<br>'.$route;
            }
            $kmsums =  intval($kmsum);
           // echo $kmsums;
            $zero = 00;*/
           /* if($kmsums > 35){
                $qiymet = $amount['cent']*$rate*($kmsums-35)+$amount['priceT']*$rate;

             //   $giymet = $qiymet-($qiymet*10/100);
               
                $model->amount = intval($qiymet);
               // echo $kmsums.' $'.$model->amount;
                if($model->return == 1 /*and count(array_filter($routes)) > 1*///){ 
                   // $model->amount = $model->amount*2;
                    
             /*   }
            }else{
                $model->amount = intval($amount['priceT']*$rate);
                
                
                
                if($model->return == 1){
                    $model->amount = $model->amount*2;
                    
                   
                }
            }
            */
            ?>
        </div>
    </div>
    
    </div>
<div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div id="button-box-confirmation" class="col-md-6 button-box">
                    <div class="row">
                        <div class="col-md-12 button-box-title">Total price <span><?= $model->amount ?></span> USD</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= Html::a('<button>Go To Payment</button>', ['site/confirm', 'id'=>$model->id, 'mode'=>'transfer' ]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                </div>
                
            </div>
        </div>



