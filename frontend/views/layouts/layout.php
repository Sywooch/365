<?php
use yii\helpers\Html;
use kartik\icons\Icon;
use yii\jui\DatePicker;
use frontend\assets\AppAsset;
use frontend\assets\SemanticUiDropdownAsset;
AppAsset::register($this);
SemanticUiDropdownAsset::register($this);
?>
<?php Icon::map($this) ?>

<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head><meta name="google-site-verification" content="QXFokgLn-W7fJUIjZpaX6LKJCpInEIho5DaV5pvYqeQ" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, 
			initial-scale=1">
		<?php $this->head() ?>
	</head>
	<body>
        <?php $this->beginBody() ?>
            <div class="container">
                <div class="row header">
                    <div class="col-sm-6 col-md-4">
                        <a href="/" alt="Transfer365 logo">
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
                    <div class="col-xs-12 col-md-8 head-description">
                            Онлайн-бронирование трансфера  
                    </div>
                    <div class="col-xs-8 col-md-3 language-picker-wrap">
                        <?= \lajax\languagepicker\widgets\LanguagePicker::widget([
                            'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_BUTTON,
                            'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_LARGE
                        ]); ?>
                    </div>
                    <div  class="col-xs-4 col-md-1 currency-converter">
                        <select id="currency-converter" name="currency">
                            <option value = "AZN">USD</option>
                            <option value = "RUB">EUR</option>
                            <option value = "USD">RUB</option>
                        </select>
                    </div>
                    </div>

                    </div>
			
                            
			</div>
 
		<?= $content ?>

			<div class="footer-wrap">
		<div class="container footer">
                    
                    <div class="row" >
                        <div class="col-xs-12 col-sm-6 col-lg-3">
                            <div class="row"><div class="col-xs-12">+994 50 999 0 365</div></div>
                            <div class="row"><div class="col-xs-12">+994 70 555 0 365</div></div>
                            <div class="row"><div class="col-xs-12">support@transfer.az</div></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-3">
                            <div class="row"><a class="footer-link" href="#">
                                    <div class="col-xs-12">
                                        About
                                    </div>
                                    </a></div>
                            <div class="row"><a class="footer-link" href="#">
                                    <div class="col-xs-12">
                                        Fleet
                                    </div>
                                    </a></div>
                            <div class="row"><a class="footer-link" href="#">
                                    <div class="col-xs-12">
                                        For corporate customers
                                    </div>
                                    </a></div>
                        </div>
                        <div class="col-xs-7 col-lg-3 footer-socials">
                            <div class="row">
                                <div class="col-xs-3">
                                    <?= Icon::show('facebook-official',['class' => 'fa-2x'], Icon::FA); ?>
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

