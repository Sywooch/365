<?php
use kartik\icons\Icon;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

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
				<ul>
					<li>
						<div class="car-class">
							<button class="col-xs-12" name="button" type="button">
				
							<div class="row">
								<div class="col-xs-2">
									ICON
								</div>
								<div class="col-xs-3">
									ECONOM
								</div>
								<div class="col-xs-3">
									FEATURES
								</div>
								<div class="col-xs-3">
									PRICE
								</div>
								<div class="col-xs-1">
									<i class="fa fa-caret-right fa-3x"></i>
								</div>
							</div>
						</button>
						</div>
						
						<ul>
							<li><button>first</button></li>
							<li><button>first</button></li>
						</ul>
					</li>
					<li>
						<div class="car-class">
							<button class="col-xs-12" name="button" type="button">
				
							<div class="row">
								<div class="col-xs-2">
									ICON
								</div>
								<div class="col-xs-3">
									BUSINESS
								</div>
								<div class="col-xs-3">
									FEATURES
								</div>
								<div class="col-xs-3">
									PRICE
								</div>
								<div class="col-xs-1">
									<i class="fa fa-caret-right fa-3x"></i>
								</div>
							</div>
						</button>
						</div>
						
						<ul>
							<li><button>Lifan 620</button></li>
							<li><button>Daewoo Gentra</button></li>
						</ul>
					</li>
					<li>
						<div class="car-class">
							<button class="col-xs-12" name="button" type="button">
				
							<div class="row">
								<div class="col-xs-2">
									ICON
								</div>
								<div class="col-xs-3">
									LUXURY
								</div>
								<div class="col-xs-3">
									FEATURES
								</div>
								<div class="col-xs-3">
									PRICE
								</div>
								<div class="col-xs-1">
									<i class="fa fa-caret-right fa-3x"></i>
								</div>
							</div>
						</button>
						</div>
						
						<ul>
							<li><button>first</button></li>
							<li><button>first</button></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>