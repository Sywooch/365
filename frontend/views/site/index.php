<?php
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<?php $lang = 'name_'.Yii::$app->language;?>

<div class="container-fluid steps-wrap">
<div class="row steps">
<div class="col-xs-4 col-md-4 step step-active">
<span id="step1">Destination</span>

</div>
<div class="col-xs-4 col-md-4 step step-inactive">
<span id="step2">Passenger information</span>
<div class="rounded-border"></div>
</div>
<div class=" col-xs-4 col-md-4 step step-inactive">
<span id="step3">Confirmation</span>
<div class="rounded-border"></div>
</div>
</div>
</div>

<div class="destination-choice-wrap">
<div class="wrap-for-dotted-border">
</div>
<div class="container">
<div class="row">
<div class="col-md-3 service-choice">
                <div class="row">
                        <div class="col-md-12">
                                <div>
                                        <label for="transfer-radio">
                                                <input type="radio" id="transfer-radio" name="service" checked=true />
                                                Transfer
                                        </label>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                                <label for="chaffeur-radio">
                                        <input id="chaffeur-radio" type="radio" name="service" />
                                        Chaffeur Service
                                </label>
                        </div>
                </div>
        </div>

        <div class="col-md-9 destination-choice">
                <div class="row">
                        <div class="chaffeur" id="chaffeur">
                                <div id="input-from-chaffeur" class="col-md-4">
                                        <label for="from">
                                        <span>From</span>
                                        <input type="text" id="pac-input-from-chaffeur" class="controls" name="destination-from" 
                                        autofocus=true/>
                                        </label>
                                        </div>
                                <div id="chaffeur-time-from-col" class="col-md-4">
                                        <label for="chaffeur-time-from">
                                                Time from
                                                <input type="text" id="chaffeur-time-from" />
                                        </label>
                                        </div>
                                        <div id="chaffeur-time-to-col" class="col-md-4">
                                        <label for="chaffeur-time-to">
                                                Time to
                                                <input type="text" id="chaffeur-time-to"/>
                                        </label>
                                        </div>
                        </div>

<?= Html::beginForm(['site/form'], 'get', ['enctype' => 'multipart/form-data']) ?>
                        <div class="transfer" id="transfer">
    <div class="col-xs-12 col-md-4 input-from">
    <label for="from"><span>From</span></label>


        <?= Html::activeInput('text', $model, 'from', ['id'=>'pac-input-from' ,'class' => 'controls' ,
            'autofocus' => 'true']) ?>


                                </div>
                        <div id="swap-icon-col" class="col-md-1 swap-icon">
                                <span id="swap-icon"><img src="/uploads/Flat.png"</span>
                        </div>
    <div class="col-xs-12 col-md-4 input-to">
            <label for="to"><span>To</span></label>


                                        <?= Html::activeInput('text', $model, 'to', ['id'=>'pac-input-to' ,'class' => 'controls' ,
                                             'disabled' => false]) ?>


                        </div>
                        <div class="col-md-3">
                                <div class="row placeholder">placeholder</div>
                                <div class="row placeholder">placeholder</div>
                                <label for="return">
                <input type="checkbox" id="return" name="return-check"/><span>Return</span>

                                </label>
                        </div>
                        </div>

                </div>
        </div>

</div>
</div>
</div>

<div id="fountainG">
<div id="fountainG_1" class="fountainG"></div>
<div id="fountainG_2" class="fountainG"></div>
<div id="fountainG_3" class="fountainG"></div>
<div id="fountainG_4" class="fountainG"></div>
<div id="fountainG_5" class="fountainG"></div>
<div id="fountainG_6" class="fountainG"></div>
<div id="fountainG_7" class="fountainG"></div>
<div id="fountainG_8" class="fountainG"></div>
</div>

<div id="car-class-container" class="container">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<div class="row">
    <div class="col-md-1"></div>
        <div id="accordion">    <?php 
$from_Currency = urlencode('AZN');
$to_Currency = urlencode('USD');

?>

            <?php foreach($auto as $cats): ?>


                                <button class="col-xs-12 car-class-main" name="button" type="button">

                                <div class="row">
                                        <div class="col-sm-3 car-button-image">
                                                <img src="/uploads/swap.png" />
                                        </div>
                                        <div class="col-sm-3 col-xs-4 car-button-classname">
                                                <?= $cats[$lang] ?><br>
                                                max 3 <?=Icon::show('user',[],Icon::FA)?>
                                        </div>
                                        <div class="col-sm-3 col-xs-4 car-button-features">

                                            <span><?= Icon::show('wifi',[], Icon::FA)?></span>


                                        </div>
                                        <div data-price="<?= $cats['autos']['0']['price']  ?>" class="col-sm-3 col-xs-4 car-class-min-price">
                                            <?= $cats['autos']['0']['price'] ?>
                                            <?php 
                                            $amount = urldecode($cats['autos']['0']['price']);
                                            //$get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
                                            //$get = explode("<span class=bld>",$get);
                                            //$get = explode("</span>",$get[1]);
                                            $converted_amount = 5;//preg_replace("/[^0-9\.]/", null, $get[0]);
                                            ?>

            <?php 
             // $amount = urldecode($cats['price']);
              // $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
              // $get = explode("<span class=bld>",$get);
              // $get = explode("</span>",$get[1]);
              $converted_amount = 5; //preg_replace("/[^0-9\.]/", null, $get[0]);
            ?>
                                                <?=substr($converted_amount, 0 , -2) ?>
                                        </div>
                                    <div class="col-sm-3 arrow">

                                    </div>

                                </div>
                        </button>


            <ul>
                <?php foreach($cats['autos'] as $autos): ?>
                    <?php
                        $buttonContent = $this->context->renderPartial(
                                'carClassButtonContent', ['price'=>$autos['price'],
                                    'name'=>$autos['name']]);
                    ?>
                    <?= Html::button($buttonContent,
                        ['name'=>'Transferorder[car]','value'=>['car' => $autos['id'],
                            'amount' => $autos['price']], 'type' => 'submit', 'class'=>'car-class' ]); ?>



                    <?php endforeach ?>
            </ul>

                <?php endforeach ?>

        </div>

</div> <!-- child row -->
</div>
<div class="col-md-1"></div>
</div> <!-- father row -->
</div>
<?= $this->render('features') ?>         
                <?= Html::endForm() ?>
