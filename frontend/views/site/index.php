<?php
use kartik\icons\Icon;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<?php $lang = 'name_'.Yii::$app->language;?>

<div class="destination-choice-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-3 service-choice">
					<div class="row">
						<div class="col-md-12">
							<div>
								<label for="transfer">
									<input type="radio" id="transfer" name="service" checked=true />
									Transfer
								</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="chaffeur">
								<input id="chaffeur" type="radio" name="service" />
								Chaffeur Service
							</label>
						</div>
					</div>
				</div>
				
<div class="col-md-9 destination-choice">
					<div class="row">
						<div class="chaffeur">
							<div id="input-from-chaffeur" class="col-md-6">
								<label for="from">
								<span>From</span>
								<input type="text" id="pac-input-from-chaffeur" class="controls" name="destination-from" 
								autofocus=true/>
								<div id="dest-type-icons-from-chaffeur" class="dest-type-icons">
									<i class="fa fa-plane fa-lg"></i>
									<i class="fa fa-train fa-lg"></i>
								</div>
								</label>
								</div>
							<div class="col-md-3">
								<label for="time-from">
									Time from
									<input type="text" id="datetimepicker1" />
								</label>
								</div>
								<div class="col-md-3">
								<label for="time-to">
									Time to
									<input type="text" id="datetimepicker2" />
								</label>
								</div>
							
							
							
							
						</div>
						<div class="transfer">
							<div class="col-md-5 input-from">
							<label for="from">
								<span>From</span>
								<input type="text" id="pac-input-from" class="controls" name="destination-from" 
								autofocus=true/>
								<div id="dest-type-icons-from" class="dest-type-icons">
									<i class="fa fa-plane fa-lg"></i>
									<i class="fa fa-train fa-lg"></i>
								</div>
							</label>
						</div>
						<div class="col-md-1 swap-icon">
							<span id="swap-icon" class="glyphicon glyphicon-transfer"></span>
						</div>
						<div class="col-md-5 input-to">
							<label for="to">
								<span>To</span>
								<input type="text" id="pac-input-to" class="controls" name="destination-to" 
								disabled=true/>
								
								<div id="dest-type-icons-to" class="dest-type-icons">
									<i class="fa fa-plane fa-lg"></i>
									<i class="fa fa-train fa-lg"></i>
								</div>
							</label>
						</div>
						<div class="col-md-1">
							<label for="return">
							return
							<input type="checkbox" id="return" name="return-check" />
							</label>
						</div>
						</div>
						
					</div>
				</div>

		</div>
	</div>
</div>
				
<div class="container">
			<div class="row">
				<ul>    <?php 
  $from_Currency = urlencode('AZN');
  $to_Currency = urlencode('USD');
  
  ?>
                                    <?php foreach($auto as $cats): ?>
					<li>
						<div class="car-class">
							<button class="col-xs-12" name="button" type="button">
				
							<div class="row">
								<div class="col-xs-2">
									ICON
								</div>
								<div class="col-xs-3">
									<?= $cats[$lang] ?>
								</div>
								<div class="col-xs-3">
									FEATURES
								</div>
								<div class="col-xs-3">
                                                                    <?php 
                                                                    $amount = urldecode($cats['price']);
                                                                    $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
                                                                    $get = explode("<span class=bld>",$get);
                                                                    $get = explode("</span>",$get[1]);
                                                                    $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
                                                                    ?>
									<?=substr($converted_amount, 0 , -2) ?>
								</div>
								<div class="col-xs-1">
									<i class="fa fa-caret-right fa-3x"></i>
								</div>
							</div>
						</button>
						</div>
						
						<ul>
                                                    <?php foreach($cats['autos'] as $autos): ?>
							<li><button><?=$autos['name']?></button></li>
                                                        <?php endforeach ?>
						</ul>
					</li>
                                        <?php endforeach ?>
				</ul>
			</div>
		</div>