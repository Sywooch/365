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
        
        //linking date and time pickers with sidebox
        
            document.getElementById('date-fixed').innerHTML = $('.cpanel-input.date-picker.hasDatepicker').val();
            document.getElementById('time-fixed').innerHTML = $('.cpanel-input.time-picker').val();
            document.getElementById('date-return-fixed').innerHTML = $('.cpanel-input.date-picker.return.hasDatepicker').val();
            document.getElementById('time-return-fixed').innerHTML = $('.cpanel-input.time-picker.return').val();
         //keep values in the sidebox when page reloads
        
        $('.time-picker').on('dp.change', function(e){
       var target = e.target.className;
       var time = moment(e.date).format('H:mm');// format e.date that comes
                                                //from datepicker to display
                                                // only time
       
       if (target == "cpanel-input time-picker"){
            
            document.getElementById('time-fixed').innerHTML = time;                                                    
       }
       if (target == "cpanel-input time-picker return"){
           
           document.getElementById('time-return-fixed').innerHTML = time;
       }
    });
        
        
        //fixed side box position on scrolling
        var rightSideBox = document.getElementById('fixed-box');

        //function sets position attribute of the 'box' to 'fixed'
        function fixBox(box){
            box.style.position = 'fixed';
            box.style.top = "0px"; //make box sit on top of the viewport
            box.style.width = "262.5px";
        }

        //bring box back where it was
        function unfixBox(box){
            box.style.position = 'initial'; 
        }
    
        window.onscroll = function(){
	
        //of course i am not sure how it works
        var scrolled = window.pageYOffset || document.documentElement.scrollTop; 
	if (scrolled >= 245){
		fixBox(rightSideBox);
	}else{
		unfixBox(rightSideBox);
	}
    }
});
