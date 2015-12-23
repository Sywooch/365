<?php
use yii\helpers\Html;
use kartik\icons\Icon;
?>
<?php Icon::map($this) ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, 
			initial-scale=1">
		
		<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		
		<script src="scripts/jquery.min.js"></script>
		<script src="scripts/moment.min.js"></script>
		<script src="scripts/bootstrap-datetimepicker.min.js"></script>		
		
	
		<?php $this->head() ?>
	</head>
	<body>
		<?php $this->beginBody() ?>
			<div class="container">
				<div class="row header">
				<div class="col-md-5">
					<div class="logo">
						<h1>Transfer<span>365</span><h1>
						<img src="css/Flat.png" />
						<img src="css/l73q8272rg.png" />							

					</div>
				</div>
				
				<div class="col-md-7 header-num-phone">
					
					<div class="row">
						<div id="text-above-phone">
							круглосуточная поддержка
						</div>
					</div>
					<div class="row">
						<div>
							<?= Icon::show('phone', ['class'=>'num-icon'], Icon::FA); ?>+99450 333 33 33
						</div>
					</div>
					
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-12 head-description">
					Онлайн-бронирование трансфера
				</div>
			</div>
			</div>
			
					<?= $content ?>
				
			
			<div class="footer-wrap">
		<div class="container footer">
			<div class="row">
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-12">
							+99450 333 33 33
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							info@transfer365.az
						</div>
						
					</div>
				</div>
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-4">
							test
						</div>
						<div class="col-md-4">
							test
						</div>
						<div class="col-md-4">
							test
						</div>
					</div>
				</div>
			</div>
			
		</div>
		</div>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB19cyGLWQeSz1amgo9wJN6ZeXlQtHZCU&libraries=places&callback=initAutocomplete"
         async defer></script>
         <script src="scripts/script.js"></script>
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>

