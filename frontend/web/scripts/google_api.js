/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function Autocomplete(){
    jQuery.fn.exists = function(){return this.length>0;}; // function to check if element exists
    
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
  
  var options = {
  	componentRestrictions: {country: 'az'}
  };
  
  //check if elements exist. workaround to fix unexistent elements errors on the pages
  if($('#pac-input-from').exists() && $('#pac-input-from-chaffeur').exists() && $('#pac-input-to').exists()){
  	var inputFrom = document.getElementById('pac-input-from');
  	var inputFromChaffeur = document.getElementById('pac-input-from-chaffeur');
  	var inputTo = document.getElementById('pac-input-to');
  	
  	var searchBoxFrom = new google.maps.places.Autocomplete(inputFrom, options);
  	var searchBoxChaffeur = new google.maps.places.Autocomplete(inputFromChaffeur, options);
  	var searchBoxTo = new google.maps.places.Autocomplete(inputTo, options);
        
        searchBoxFrom.addListener('place_changed', function(e){
            hideCarClassContainer();
        });
        
        searchBoxTo.addListener('place_changed', function(e){
            hideCarClassContainer();
        });
        
        searchBoxChaffeur.addListener('place_changed', function(e){
            hideCarClassContainer();
        });
        
  }else if($('#pac-input-order-form').exists()){
  	var inputFormOrder = document.getElementById('pac-input-order-form');
  	var searchBoxFormOrder = new google.maps.places.Autocomplete(inputFormOrder, options);
        
        searchBoxFormOrder.addListener('place_changed', function(){
            $('#destination-fixed, #heading-to').text(inputFormOrder.value); 
        });
        
        
  }
  
  
  

};

