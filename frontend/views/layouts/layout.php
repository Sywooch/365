<?php
use yii\helpers\Html;
use kartik\icons\Icon;
use yii\jui\DatePicker;
use frontend\assets\AppAsset;
use frontend\assets\SemanticUiDropdownAsset;
use frontend\assets\BootstrapDateTimePickerAsset;
use yii\helpers\Url;
AppAsset::register($this);
SemanticUiDropdownAsset::register($this);
BootstrapDateTimePickerAsset::register($this);
?>

<?php Icon::map($this) ?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
	<head>
                <meta name="google-site-verification" content="QXFokgLn-W7fJUIjZpaX6LKJCpInEIho5DaV5pvYqeQ" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, 
			initial-scale=1">
                <title><?= Html::encode($this->title) ?></title>
                <link rel='shortcut icon' href='/uploads/favicon.ico' type='image/x-icon' />
                    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72751779-1', 'auto');
  ga('send', 'pageview');

</script>
		<?php $this->head() ?>
	</head>
	<body>
        <?php $this->beginBody() ?>
            <div class="container">
                <div class="row header">
                    <div class="col-sm-6 col-md-4">
                        <a href="/" alt="logo">
                            <div class="logo"></div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-8 header-num-phone">

                            <div class="row">
                                <div id="text-above-phone" class="col-md-12">
                                    круглосуточная поддержка
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span><?=Html::img('@web/css/images/phoneico.png', ['class'=>'phoneico'])?></span>
                                <div class="row phone-number">
                                    <div class="col-md-12">+994 50 999 0 365</div></div>
                                <div class="row phone-number">
                                    <div class="col-md-12">
                                        +994 70 555 0 365
                                    </div>
                                    </div>
                            </div>
                        </div>

                        </div>


                    </div>

                <div class="row">
                    <div class="col-xs-12 col-md-7 head-description">
                            Онлайн-бронирование трансфера  
                    </div>
                    <div class="col-xs-8 col-md-3 language-picker-wrap">
                        <?= \lajax\languagepicker\widgets\LanguagePicker::widget([
                            'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_BUTTON,
                            'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_LARGE
                        ]); ?>
                    </div>
         
                    <div  class="col-xs-4 col-md-2 currency-converter">
                        <div class="ui selection dropdown" id="currency">
                            <input name="currency" type="hidden" value = "">
                            <i class="dropdown icon"></i>
                            <div class="default text">USD</div>
                            <div id="curr-menu" class="menu">
                               <a id='usd' class="item currency-active selected" data-currency ='USD' href="#">USD<?= Icon::show('usd',['class' => ''], Icon::FA); ?></a>
                               <a id='rub' class="item" data-currency ='RUB' href="#">RUB<?= Icon::show('rub',['class' => ''], Icon::FA); ?></a> 
                               <a id='eur' class="item" data-currency ='EUR' href="#">EUR<?= Icon::show('eur',['class' => ''], Icon::FA); ?></a>
                               <a id='ytl' class="item" data-currency ='TRY' href="#">YTL &#8378</a>
                               
                            </div>
                          </div>
                    </div>
                    </div>

                    </div>
			
                        <div id="loader-wrapper">
			<div id="loader"></div>

			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

		</div>
 
		<?= $content ?>

			<div class="footer-wrap">
		<div class="container footer">
                    
                    <div class="row" >
                        <div class="col-xs-12 col-sm-6 col-lg-3">
                            <div class="row"><div class="col-xs-12">+994 50 999 0 365</div></div>
                            <div class="row"><div class="col-xs-12">+994 70 555 0 365</div></div>
                            <div class="row"><div class="col-xs-12">
                                    <a id="mailto" class="footer-link" href="mailto:support@transfer365.az">support@transfer365.az</a></div></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-3">
                            <div class="row"><a class="footer-link" href="/site/about">
                                    <div class="col-xs-12">
                                        About
                                    </div>
                                    </a></div>
                            <div class="row"><a class="footer-link" href="/site/corporate">
                                    <div class="col-xs-12">
                                        For corporate customers
                                    </div>
                                    </a></div>
                        </div>
                        <div class="col-xs-7 col-lg-3 footer-socials">
                            <div class="row">
                                <div class="col-xs-3">
                                    <a class="footer-link" href="https://www.facebook.com/transfer365.az/?fref=ts" target="_blank">
                                    <?= Icon::show('facebook-official',['class' => 'fa-2x'], Icon::FA); ?>
                                    </a>
                                </div>
                                <div class="col-xs-1">
                                    <?= Icon::show('instagram',['class' => 'fa-2x'], Icon::FA); ?>
                                </div>
                                <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
                                <div class="skype">
                                  <div id="SkypeButton_Call_transfer365.az_1">
                                     <script type="text/javascript">
                                     Skype.ui({
                                     "name": "call",
                                     "element": "SkypeButton_Call_transfer365.az_1",
                                     "participants": ["transfer365.az"],
                                     "imageColor": "white",
                                     "imageSize": 32
                                     });
                                     </script>  
                                </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3 footer-credit-cards">
                            
                        </div>
                        <a href="http://www.beyondsecurity.com/vulnerability-scanner-verification/transfer365.az"><img src="https://seal.beyondsecurity.com/verification-images/transfer365.az/vulnerability-scanner-2.gif" alt="Website Security Test" border="0" /></a>
                        
                        
                    </div>
			
		</div>
		</div>
                       
                <script src="/scripts/google_api.js"></script>
		
         
         
        <!-- <script src="/scripts/date-time-pickers.js"></script> -->
		<!--<script src="/scripts/script.js"></script>-->
         
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>

