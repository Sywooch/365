function initAutocomplete() {

  // Create the search box and link it to the UI element.
  var inputFrom = document.getElementById('pac-input-from');
  var inputFromChaffeur = document.getElementById('pac-input-from-chaffeur');
  var inputTo = document.getElementById('pac-input-to');
  var inputFormOrder = document.getElementById('pac-input-order-form');
  var test = document.getElementById("pac-input-test");
  console.log(test);
  
  var options = {
  
  componentRestrictions: {country: 'az'}
};

  var searchBoxFrom = new google.maps.places.Autocomplete(inputFrom, options);
  var searchBoxChaffeur = new google.maps.places.Autocomplete(inputFromChaffeur, options);
  var searchBoxTo = new google.maps.places.Autocomplete(inputTo, options);
  var searchBoxFormOrder = new google.maps.places.Autocomplete(inputFormOrder, options); 
  
  
  

  // [START region_getplaces]
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  
  // [END region_getplaces]
}

/* Main scripts */

$(document).ready(function (){
	
	
		
	//datetimepicker widget
	
	$('#datetimepicker1').datetimepicker({
		format: 'LT'
	});
	$('#datetimepicker2').datetimepicker({
		format: 'LT'
	});
	$('#datetimepicker3').datetimepicker({
		format: 'DD/MM/YYYY, HH:mm',
		sideBySide: true
		
	});
	
	$.getScript("destination_fields_swap_and_disable.js");
	
	$('.car-class-button > ul').hide();
	
	$('.car-class-button > button').click(function (){
		$(this).siblings('ul').toggle();
		if ($(this).siblings('ul').css('display') !== "none"){
			$(this).parent().siblings().children('ul').css('display','none');
		}
		
		
	});
	

//main page destination choice fields. swap icon and disabled field functionalities	
function changeEventHandler(){
	var firstField = document.getElementById("pac-input-from");
	var secondField = document.getElementById("pac-input-to");
	
	if (firstField.value == ""){
		secondField.setAttribute("disabled", true);
		secondField.value = "";
	} else {
		secondField.removeAttribute("disabled");
	}
	
	return console.log(secondField.getAttribute("disabled"));
};

function swapFieldValues(){
	var firstField = document.getElementById("pac-input-from");
	var secondField = document.getElementById("pac-input-to");
	var tmp;
	
	tmp = secondField.value;
	secondField.value = firstField.value;
	firstField.value = tmp;
	
};


document.getElementById("pac-input-from").addEventListener("change", changeEventHandler);


document.getElementsByClassName("swap-icon")[0].addEventListener("click", swapFieldValues);
// почему если добавлять событие через addEventListener, то надо писать
// "change", а если нет, то "onchange"?

//main page input field. transfer and chaffeur toggles
var transferForm = document.getElementsByClassName('transfer')[0];
var chaffeurForm = document.getElementsByClassName('chaffeur')[0];
	
	if	(document.getElementById('transfer').checked){
		transferForm.style.display = "block";
		chaffeurForm.style.display = "none";
	} else if (document.getElementById('chaffeur').checked){
		transferForm.style.display = "none";
		chaffeurForm.style.display = "block";
	}
	
	document.getElementById('transfer').addEventListener("change", function () {
		transferForm.style.display = "block";
		chaffeurForm.style.display = "none";
	});
	document.getElementById('chaffeur').addEventListener("change", function () {
		transferForm.style.display = "none";
		chaffeurForm.style.display = "block";
	});	
	
	
	var place = searchBoxFrom.getPlace();
	console.log(place);
	
	
});


	
	





