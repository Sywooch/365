
<?php
use imanilchaudhari\CurrencyConverter\CurrencyConverter;
 use yii\helpers\Html;
 use kartik\icons\Icon;
$converter = new CurrencyConverter();

?>

<div id="accordion"> 
    <?php 
//$rate =  $converter->convert('USD', 'AZN');
$sign = array('RUB' => '₽','USD' => '💲','EUR' => '€');
if(isset($_GET['currency'])){
        if($_GET['currency'] == 'RUB' or $_GET['currency'] == 'USD' or $_GET['currency'] == 'EUR'){
        $s = $_GET['currency'];
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
        'name' => 'currency',
        'value' => $_GET['currency'],
    ]));
        $rate =  $converter->convert('USD', $_GET['currency']);
        $rate = explode('.', $rate);
        }
}else{
    $s = 'USD';
    $rate['0'] = 1;
}
?>

            <?php foreach($auto as $cats): ?>

 <?php  $say =  count($cats['autos']);?>
            <button class="col-xs-12 car-class-main" name="button" type="button">

            <div class="row">
                    <div class="col-sm-3 car-button-image">
                        <?php if ($cats['name_en'] == 'Suv' || $cats['name_ru'] == 'Сув'): ?>
                            <img src="/uploads/prado.png" />
                        <?php else: ?>
                            <img src="/uploads/<?=$cats['autos'][$say-1]['photo']?>" />
                        <?php endif; ?>

                        
                        
                            

                    </div>
                    <div class="col-sm-3 col-xs-4 car-button-classname">
                            <?= $cats['name_en'] ?><br>
                            MAX <?=Html::encode($cats['autos'][$say-1]['maxpas'])?> <?=Icon::show('user',[],Icon::FA)?>
                    </div>
                    <div class="col-sm-3 col-xs-4 car-button-features">

                        <img src="uploads/wifi.png"/>


                    </div>

                    <div data-price="<?= $cats['autos']['0']['priceT']*$rate['0']  ?>" 
                         data-coefficient="<?= $cats['autos']['0']['cent']*$rate['0']?>"
                         class="col-sm-3 col-xs-4 car-class-min-price">
                        from <?= $sign[$s]?> <span><?= $cats['autos']['0'][$_GET['request']]*$rate['0'] ?></span>
                        <?php 
                        $amount = urldecode($cats['autos']['0']['priceT']);
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
                                'carClassButtonContent', ['autos'=>$autos,'rate'=>$rate, 'sign'=>$sign,'s'=>$s,'ajaxr' => $_GET['request']]);
                    ?>
                    <?= Html::button($buttonContent,
                        ['name'=>'Transferorder[car]','value'=>['car' => $autos['id'],
                            'amount' => $autos[$_GET['request']]*$rate['0'], 'cent' => $autos['cent']*$rate['0']], 'type' => 'submit','form'=>'index-form', 'class'=>'car-class' ]); ?>



                    <?php endforeach ?>
            </ul>

                <?php endforeach ?>

</div>
