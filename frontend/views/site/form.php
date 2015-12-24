<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=devide-width, 
			initial-scale=1">
		<title>Passenger form for Transfer365</title>
		<script src="scripts/greeting-sign.js"></script>	
		<script src="scripts/add-destination.js"></script>
		<script src="scripts/side-box.js"></script>
		

	</head>
	<body>
			<div class="container"> <!-- Passenger form container -->
			<div class="row">
				
				<div class="col-md-10">
					<div class="cpanel">
						<div class="cpanel-heading">
							<h4>Heathrow - London<br>
							Standard 100 RUB</h4>
										
						</div>
						<div class="cpanel-section">
							<fieldset>
								<legend id="tariff">Tariff</legend>
									<div class="row">
										<div class="cpanel-item">
											<div class="col-md-4">
												<select name="tariff" id="tariff-select" class="cpanel-input">
													<option value="economy">Economy: price</option>
													<option value="standard">Standard: price</option>
													<option value="Premium">Premium: price</option>
													<option value="Business">Business: price</option>
													<option value="Luxury">Luxury: price</option>
													<option value="SUV">SUV: price</option>
													<option value="Minivan">Minivan: price</option>
													<option value="Minibus">Minibus: price</option>
													<option value="Bus">Bus: price</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="cpanel-item">
											<div class="col-md-3">
												<label for="pass-num">Number of passengers</label>
											</div>
											<div class="col-md-1">
												<!-- Number of options must change according to car class -->
												<select name="pass-num" id="pass-num" class="cpanel-input">
													<option value="1">1</option>
													<option value="2">2</option>
												</select>
											</div>
										</div>
										
									</div>
									<div class="row">
										<div class="cpanel-item">
											<div class="col-md-3">
												<label for="chair">Add special child seats</label>
											</div>
											<div class="col-md-1">
												<input type="checkbox" id="chair" class="cpanel-input"
												 value="unchecked"/>
											</div>
										</div>
										
									</div>
							</fieldset>
						</div>
							
						<div class="cpanel-section">
							<fieldset>
								<legend id="route">Route</legend>
								<div class="row">
								<div class="cpanel-item">
									<div class="col-md-2">
										<label for="flight-number">Flight number</label>
									</div>
									<div class="col-md-2">
										<input id="flight-number" type="text" class="cpanel-input"/>	
									</div>
								</div>
							</div>
						
								<div class="row">
									<div class="cpanel-item">
									<div class="col-md-2">
										<label for="arrival_time">Arrival time</label>
									</div>
									<div class="col-md-3">
										<input type="text" id="datetimepicker3" class="cpanel-input"/>
									</div>
									
								</div>
								</div>
								<div id="add-dest-anchor">
									<div class="row">
										<div class="cpanel-item">
											<div class="col-md-2" style="text-align: right">
												<label for="destination_address">Destination address</label>
											</div>
											<div class="col-md-7">
												<input type="text" id="pac-input-order-form" class="cpanel-input"/>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="cpanel-item">
									<div class="col-md-2">
									</div>
									<div class="col-md-10">
										<div class="pseudo-link destination"><span id="pseudo-link">Add another destination</span> + 600 RUB</div>
									</div>
								</div>
								</div>
								
								<div class="row">
									<div class="cpanel-item">
									<div class="col-md-2" style="text-align: right">
										<label for="return">Return</label>
									</div>
									<div class="col-md-1">
										<input type="checkbox" id="return" class="cpanel-input"/>
									</div>
								</div>
								</div>
								
							</fieldset>
							
								
							</div>
						
						<div class="cpanel-footer">
							Free cancellation of the trip in an 6 hours before the start 
						</div>
					</div>
						
					<div class="cpanel">
						<div class="cpanel-heading">
							<h4>Passengers data</h4>
						</div>
						<div id="add-pass-anchor">
							<div class="cpanel-section">
							<div class="row">
								<div class="cpanel-item">
									<div class="col-md-2">
										<label for="pass-name">
											First name
										</label>
									</div>
									<div class="col-md-4">
										<input type="text" id="pass-name" class="cpanel-input"/>
									</div>
									
								</div>
							</div>
							<div class="row">
								<div class="cpanel-item">
									<div class="col-md-2">
										<label for="pass-lastname">
											Last name
										</label>
									</div>
									<div class="col-md-4">
										<input type="text" id="pass-lastname" class="cpanel-input"/>
									</div>
									
								</div>
							</div>
							<div class="row">
								<div class="cpanel-item">
									<div class="col-md-2">
										<label for="phone-number">
											Phone number
										</label>
									</div>
									<div class="col-md-4">
										<input type="text" id="phone-number" class="cpanel-input"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="cpanel-item">
									<div class="col-md-2">
										<label for="email">
											E-mail address
										</label>
									</div>
									<div class="col-md-4">
										<input type="text" id="email" class="cpanel-input"/>
									</div>
								</div>
							</div>
								
							<div class="row">
							<div class="cpanel-item">
								<div class="col-md-2"></div>
								<div class="col-md-6">
									<div class="pseudo-link passenger"><span id="pseudo-link">Add another passenger information</span></div>
								</div>
							</div>
						</div>
						</div>
						</div>
						
						
						
						<div class="cpanel-section">
							<div class="row">
								<div class="col-md-6">
									
										<div class="col-md-2">
											<label for="notes">
												Notes
											</label>
										</div>
										<div class="col-md-4 notes-field">
											<textarea rows="10" cols="100" id="notes" class="cpanel-input textarea"
											placeholder="Any important information (children, heavy lagguage and etc.)"></textarea>
										</div>
									
								</div>
								<div class="col-md-6">
									<div class="col-md-3">
										<label for="greeting-sign">Greeting sign</label>
									</div>
									<div class="col-md-3">
										<textarea id="greeting-sign"
									placeholder="By default first name and last name of the passenger"></textarea>
									</div>
								</div>
								
							</div>
						</div>
					</div>	
							
									
					</div>
			</div>
			<div class="col-md-2">
				<div class="fixed-box">
					<div class="fixed-box-heading">
						Order information
					</div>
					<div class="fixed-box-body">
						<div class="fixed-box-section">
							<div class="fixed-box-section-heading">
								Airport and arrival time
							</div>
							<div class="fixed-box-section-body">
								<div class="fb-section-line">Heathrow(London)
									<span id="fn-fixed"></span> <!-- flight number -->
									</div>
								<div class="fb-section-line">At 14:00</div>
							</div>
						</div>
						<div class="fixed-box-section">
							<div class="fixed-box-section-heading">
								Destination
							</div>
							<div class="fixed-box-section-body">
								<div class="fb-section-line">London</div>
								<div class="fb-section-line" id="dest_fixed"></div>
							</div>
						</div>
						<div class="fixed-box-section">
							<div class="fixed-box-section-heading">
								Transfer type
							</div>
							<div class="fixed-box-section-body">
								<div class="fb-section-line">Tarrif <span id="tariff-fixed">Economy</span></div>
								<div class="fb-section-line">1-4 passengers,up to 3 lagguage places</div>
								<div class="fb-section-line">Passengers: <span id="pass-num-fixed"></span></div>
								<div class="fb-section-line" id="chair-side"></div>
							</div>
						</div>
						<div id="contacts-fixed" class="fixed-box-section hide">
							<div class="fixed-box-section-heading">
								Contact information
							</div>
							<div class="fixed-box-section-body">
								<div class="fb-section-line">
									<span id="first-name-fixed"></span>
									<span id="last-name-fixed"></span>
								</div>
								<div class="fb-section-line" id="phone-fixed"></div>
								<div class="fb-section-line" id="email-fixed"></div>
							</div>
						</div>
						<div id="nfixed" class="fixed-box-section hide">
							<div class = "fixed-box-section-heading">
								Notes
							</div>
							<div class="fixed-box-section-body" id="notes-fixed">
								
							</div>
						</div>
						
					</div>
					<div class="fixed-box-footer">
						<div class="fixed-box-heading">
							Transfer price
						</div>
						<div class="fixed-box-heading">
							Summary
							<div class="fixed-box-price">2100</div>
						</div>
					</div>
				</div>
			</div>
			
			
		</div> <!-- Passenger form container end -->
		<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-6 button-box">
						<div class="row">
							<div class="col-md-12 button-box-title">Total price 9999 AZN</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button>Go To Payment</button>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
							</div>
						</div>
						
					</div>
					<div class="col-md-2">
					</div>
				</div>
			</div>
		

	</body>
</html>