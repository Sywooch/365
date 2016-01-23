//function initAutocomplete(){
    // Create the search box and link it to the UI element.
//  jQuery.fn.exists = function(){return this.length>0;}; // function to check if element exists
//  
//  var options = {
//  	componentRestrictions: {country: 'az'}
//  };
//  
//  //check if elements exist. workaround to fix unexistent elements problem on the pages
//  if($('#pac-input-from').exists() && $('#pac-input-from-chaffeur').exists() && $('#pac-input-to').exists()){
//  	var inputFrom = document.getElementById('pac-input-from');
//  	var inputFromChaffeur = document.getElementById('pac-input-from-chaffeur');
//  	var inputTo = document.getElementById('pac-input-to');
//  	
//  	var searchBoxFrom = new google.maps.places.Autocomplete(inputFrom, options);
//  	var searchBoxChaffeur = new google.maps.places.Autocomplete(inputFromChaffeur, options);
//  	var searchBoxTo = new google.maps.places.Autocomplete(inputTo, options);
//  }else if($('#pac-input-order-form').exists()){
//  	var inputFormOrder = document.getElementById('pac-input-order-form');
//  	var searchBoxFormOrder = new google.maps.places.Autocomplete(inputFormOrder, options);
//  }

  // [START region_getplaces]
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  
  // [END region_getplaces] 
//}

/* Main scripts */

$(document).ready(function (){    
    
    $('#currency-converter').dropdown();
    
    /*check viewport size*/
    function checkViewportSize(width){
        return viewportSize = $(window).width(); 
    }
    
    /*set appropriate text and font-size depending on viewport size*/
    function setStepsText(){
        var viewportSize = checkViewportSize($(this).width());
        if (viewportSize > 1200){
            $('#step1').text('Step 1: Choose destination');
            $('#step2').text('Step 2: Input passenger information');
            $('#step3').text('Step 3: Confirmation');
        }else{
            $('#step1').text('Destination');
            $('#step2').text('Passenger information');
            $('#step3').text('Confirmation');
        }
    }
    
    /*apply new text and font-size to steps*/
    $(function() {
        setStepsText();
        $(window).resize(function() {
            setStepsText();
        });
    }); //how this function works?

    //set default values in destination choice fields
//    function setDefaultInputValues(){
//       var defaultFrom = 'Heydar Aliyev International Airport (Terminal 1), Azerbaijan';
//       var defaultTo = 'Baku, Azerbaijan';
//       $('#pac-input-from').val(defaultFrom);
//       $('#pac-input-to').val(defaultTo); 
//    }
//    
//    setDefaultInputValues();

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
	
    $.getScript("destination_fields_swap_and_disable.js");
        
    /* main page car buttons accordion*/
    $('#accordion').accordion({
            heightStyle: "content",
            collapsible: true,
            active: false,
            icons: false,
            create:function(event, ui){
                var currentButton = ui.header[0];
                var currentButtonArrow = $(currentButton).find('.arrow');
                
                $(currentButtonArrow).css({
                    'transform': 'rotate(180deg)',
                    'margin-right': '14px'
                }); 
            },
            activate: function (event, ui){
                var oldButton = ui.oldHeader[0];
                var oldButtonArrow = $(oldButton).find('.arrow');
                $(oldButtonArrow).css({
                    'transform': 'rotate(0deg)',
                    'margin-right': '0px'
                });
            },
            beforeActivate: function(event, ui){
                var currentButton = ui.newHeader[0];
                var currentButtonArrow = $(currentButton).find('.arrow');
                
                $(currentButtonArrow).css({
                    'transform': 'rotate(180deg)',
                    'margin-right': '14px'
                    

                });
                
            }
            
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
	document.getElementById("pac-input-from").addEventListener("input", changeEventHandler);
	document.getElementsByClassName("swap-icon")[0].addEventListener("click", swapFieldValues);
	
	var transferForm = document.getElementsByClassName('transfer')[0];
	var chaffeurForm = document.getElementsByClassName('chaffeur')[0];
	
	if  (document.getElementById('transfer-radio').checked){
		transferForm.style.display = "block";
		chaffeurForm.style.display = "none";
	} else if (document.getElementById('chaffeur-radio').checked){
		transferForm.style.display = "none";
		chaffeurForm.style.display = "block";
	}
       
        /* function that reloads car class buttons*/
        function hideCarClassContainer(){
            $('#car-class-container').animate({
                opacity: 0,          
            }, 200, callback);
        }
        
        function callback(){
            $('#fountainG').css('display','block');
            
            setTimeout( function(){
                $('#fountainG').css('visibility', 'visible');
            }, 400);
            
            
            setTimeout( function(){
                $('#fountainG').css('visibility', 'hidden');
                $('#fountainG').css('display', 'none');
                $('#car-class-container').animate({
                    opacity: 1,
                }, 400);
            }, 1000);
        }
        
       // var returnCheckBox = document.getElementById('return'); //get checkbox index.php
        
	document.getElementById('transfer-radio').addEventListener("change", function () {
		$('#transfer').show('fast').fadeIn();
		$('#chaffeur').hide('fast').fadeOut();
                hideCarClassContainer();
	});
        
	document.getElementById('chaffeur-radio').addEventListener("change", function () {
		$('#transfer').hide('fast').fadeOut();
		$('#chaffeur').show('fast').fadeIn();
                hideCarClassContainer();
                
                /*reset car cost for chaffeur*/
                /*setTimeout to hide the moment when price is updated*/
                returnCheckBox.checked = false;
                resetCost();
	});
        
        /* function to update cost when return is checked */
      /*  function multiplyCost(){
            var carClassArray = document.getElementsByClassName('car-class-min-price');
            
            for (var i = 0; i < carClassArray.length; i++){
               var oldCarClassPrice = carClassArray[i].dataset.price;
               newCarClassPrice = Number(oldCarClassPrice)*2;
               carClassArray[i].innerHTML ='$' + oldCarClassPrice + ' + ' + '$'+ oldCarClassPrice +
                       ' = $' + newCarClassPrice;
               
            }
            
        };*/
        /* function to reset cost when return is unchecked */
        function resetCost(){
            var carClassArray = document.getElementsByClassName('car-class-min-price');
            for (var i = 0; i < carClassArray.length; i++){
               carClassArray[i].innerHTML = '$' + carClassArray[i].dataset.price;
            }
        };
        
        
        /*when page reloads check if checkbox is checked then update cost*/
//        if (returnCheckBox.checked){
//           multiplyCost(); 
//        };
        
        /* update cost when checkbox is true */
//        returnCheckBox.addEventListener('change', function(){
//           
//           hideCarClassContainer();
//           if (this.checked && document.getElementById('transfer-radio').checked){
//               setTimeout(function(){
//                   multiplyCost();
//               }, 200);
//               
//           }else{
//               setTimeout(function(){
//                   resetCost();
//               }, 200);
//           }
//        });
  
    }

});


	
	





