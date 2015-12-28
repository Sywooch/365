function initAutocomplete() {

  // Create the search box and link it to the UI element.
  jQuery.fn.exists = function(){return this.length>0;}; // function to check if element exists
  
  var options = {
  	componentRestrictions: {country: 'az'}
  };
  
  //check if elements exist. workaround to fix unexistent elements problem on the pages
  if($('#pac-input-from').exists() && $('#pac-input-from-chaffeur').exists() && $('#pac-input-to').exists()){
  	var inputFrom = document.getElementById('pac-input-from');
  	var inputFromChaffeur = document.getElementById('pac-input-from-chaffeur');
  	var inputTo = document.getElementById('pac-input-to');
  	
  	var searchBoxFrom = new google.maps.places.Autocomplete(inputFrom, options);
  	var searchBoxChaffeur = new google.maps.places.Autocomplete(inputFromChaffeur, options);
  	var searchBoxTo = new google.maps.places.Autocomplete(inputTo, options);
  }else if($('#pac-input-order-form').exists()){
  	var inputFormOrder = document.getElementById('pac-input-order-form');
  	var searchBoxFormOrder = new google.maps.places.Autocomplete(inputFormOrder, options);
  }

  // [START region_getplaces]
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  
  // [END region_getplaces]
  
}

/* Main scripts */

$(document).ready(function (){
	jQuery.fn.exists = function(){return this.length>0;}; //function to check if element exists
	
	function rotate(d, elem){
		$({deg:0}).animate({deg:d}, {
			duration: 250,
			step: function(now){
				elem.css({
					transform: "rotate(" + now +"deg)"	
					
				});
			}
		});
	}
		
	//datetimepicker widget
	
	// $('#datetimepicker1').datetimepicker({
		// format: 'LT'
	// });
	// $('#datetimepicker2').datetimepicker({
		// format: 'LT'
	// });
	// $('#datetimepicker3').datetimepicker({
		// format: 'DD/MM/YYYY, HH:mm',
		// sideBySide: true
// 		
	// });
// 	
	$.getScript("destination_fields_swap_and_disable.js");
	
	//$('.car-class').siblings('ul').hide();
	
	

	// $('.car-class > button').click(function(){
// 		
		// var i = $(this).find('i');
// 		
		// if($(this).parent().siblings('ul').css('display') == 'none'){
			// rotate(90, i);
		// }else {
			// rotate(0, i);
		// }
// 		
		// $(this).parent().siblings('ul').toggle('blind','fast');
// 		
// 		
		// if($(this).parent().siblings('ul').css('display') !== 'none'){
			// $(this).parent().parent().siblings().children('ul').hide('blind', 'fast');
			// var ii = $(this).parent().parent().siblings().find('i');
			// rotate(0, ii);
		// }
	// });
	
	$('#accordion').accordion({
		collapsible: true
	}); //jquery ui accordion

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

if ($("#pac-input-from").exists()){
	document.getElementById("pac-input-from").addEventListener("change", changeEventHandler);
	document.getElementsByClassName("swap-icon")[0].addEventListener("click", swapFieldValues);
	
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
}




// почему если добавлять событие через addEventListener, то надо писать
// "change", а если нет, то "onchange"?

//main page input field. transfer and chaffeur toggles


});


	
	





