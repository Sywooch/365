/* scripts for updating right sidebox on the form page */

$(document).ready(function (){
    jQuery.fn.exists = function(){return this.length>0;}; //function to check if element exists
    
    var parentContainer = document.querySelector('#parent-container');
 
    parentContainer.addEventListener("input", updateSideBox, false);
    
    function updateSideBox(e){
        var sourceInput = document.querySelector('#' + e.target.id);
        var placeOnBoxId = '#' + e.target.id + '-fixed';
        var placeOnBox = document.querySelector(placeOnBoxId);
   
        $(placeOnBox).text(sourceInput.value);
    };
	
	//greeting sign
	var firstNameInput = document.getElementById("pass-name");
	var lastNameInput = document.getElementById("pass-lastname");
	var greetingField = document.getElementById("greeting-sign");
	var greetingValue = ['',''];


	firstNameInput.addEventListener("input", function(){
		var firstName = firstNameInput.value;
		greetingValue[0] = firstName;
                greetingField.value = greetingValue[0] + " " + greetingValue[1];     
	});
	
	lastNameInput.addEventListener("input", function(){
		var lastName = lastNameInput.value;
		greetingValue[1] = lastName;
		greetingField.value = greetingValue[0] + " " + greetingValue[1];
	});
});
