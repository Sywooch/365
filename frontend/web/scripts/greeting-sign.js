window.onload = function(){
	console.log("greeting sign");
	var firstNameInput = document.getElementById("pass-name");
	var lastNameInput = document.getElementById("pass-lastname");
	var greetingField = document.getElementById("greeting-sign");
	var greetingValue = [];
	 
	function setGreeting(first, last){
		greetingField.value = first + " " + last;
	}
	
	firstNameInput.addEventListener("change", function(){
		var firstName = firstNameInput.value;
		greetingValue[0] = firstName;
		greetingField.value = greetingValue[0] + " " + greetingValue[1];
	});
	
	lastNameInput.addEventListener("change", function(){
		var lastName = lastNameInput.value;
		greetingValue[1] = lastName;
		greetingField.value = greetingValue[0] + " " + greetingValue[1];
	});
	
	
};




