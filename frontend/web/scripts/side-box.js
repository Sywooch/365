$(document).ready(function (){
	function foo(from, to){
		console.log(from.value);
		to.innerHTML = from.value;
	};
	
	//flight number
	var flight_number = document.getElementById("flight-number");
	var flight_number_side = document.getElementById("fn-fixed"); 
	
	flight_number.addEventListener("change", function(){
		foo(flight_number, flight_number_side);
	});
	
	// //number of passengers
	// var pass_num = document.getElementById("pass-num");
	// var pass_num_side = document.getElementById("pass-num-fixed");
// 	
	// pass_num.addEventListener("change", function(){
		// foo(pass_num, pass_num_side);
	// });
// 	
	// //child seat
	// var child_seat = document.getElementById("chair");
	// var child_seat_side = document.getElementById("chair-side"); 
	
	
	// child_seat.addEventListener("click", function(){
		// if (child_seat.checked === true){
			// child_seat_side.innerHTML = " + child seat";
		// }else{
			// child_seat_side.innerHTML = "";
		// }
	// });
	
	//destination
	var destination_input = document.getElementById("pac-input-order-form");
	var destination_fixed = document.getElementById("dest_fixed");
	
	destination_input.addEventListener("change", function (){
		console.log("i don't know what to do here :()");
	});
	
	//contact information	
	var first_name = document.getElementById("pass-name");
	var last_name = document.getElementById("pass-lastname");
	var email = document.getElementById("email");
	var phone = document.getElementById("phone-number");
	
	var first_name_fixed = document.getElementById("first-name-fixed");
	var last_name_fixed = document.getElementById("last-name-fixed");
	var phone_name_fixed = document.getElementById("phone-fixed");
	var email_fixed = document.getElementById("email-fixed");
	
	var dict = {
		first_name: first_name_fixed,
		last_name: last_name_fixed,
		email: email_fixed,
		phone: phone_name_fixed
	};
	
	console.log(dict);
	
	first_name.addEventListener("change", function (){
		if (first_name_fixed.innerHTML = ""){
			$("#contacts-fixed").addClass("hide");
		}else{
			$("#contacts-fixed").removeClass("hide");
		first_name_fixed.innerHTML = this.value;
		}
		
	});
	
	var notes = document.getElementById("notes");
	var notes_fixed = document.getElementById("notes-fixed");
	
	notes.addEventListener("change", function(){
		if (notes_fixed.innerHTML = ""){
			$("#nfixed").addClass("hide");
		}else{
			$("#nfixed").removeClass("hide");
			notes_fixed.innerHTML = this.value;
		}
	});
	
	//greeting sign
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
});
