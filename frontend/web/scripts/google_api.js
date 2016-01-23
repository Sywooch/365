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
  
  
  var travel_mode = google.maps.TravelMode.DRIVING;
  var directionsService = new google.maps.DirectionsService;
  
  //check if elements exist. workaround to fix unexistent elements errors on the pages
  if($('#pac-input-from').exists() && $('#pac-input-from-chaffeur').exists() && $('#pac-input-to').exists()){
  	var inputFrom = document.getElementById('pac-input-from');
  	var inputFromChaffeur = document.getElementById('pac-input-from-chaffeur');
  	var inputTo = document.getElementById('pac-input-to');
  	
        
  	var searchBoxFrom = new google.maps.places.Autocomplete(inputFrom, options);
  	var searchBoxChaffeur = new google.maps.places.Autocomplete(inputFromChaffeur, options);
  	var searchBoxTo = new google.maps.places.Autocomplete(inputTo, options);
        
        var origin_place_id = inputFrom.value; //set initial origin value to From input
        var destination_place_id = inputTo.value; //set initial origin value to To input
        
        searchBoxFrom.addListener('place_changed', function(e){
            hideCarClassContainer();
            var place = searchBoxFrom.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
            return;}
            origin_place_id = place.place_id; //set origin
            
            var placeTo = searchBoxTo.getPlace();
            route(origin_place_id, destination_place_id, travel_mode,
               directionsService);
        });

        searchBoxTo.addListener('place_changed', function(e){
            hideCarClassContainer();
            var place = searchBoxTo.getPlace();
            if (!place.geometry) {
              window.alert("Autocomplete's returned place contains no geometry");
              return;
        }
    

    // If the place has a geometry, store its place ID and route if we have
    // the other place ID
    destination_place_id = place.place_id;
    route(origin_place_id, destination_place_id, travel_mode,
          directionsService);
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
  
  function route(origin_place_id, destination_place_id, travel_mode,
                 directionsService) {
    if (!origin_place_id || !destination_place_id) {
      return;
    }
    directionsService.route({
      origin: {'placeId': origin_place_id},
      destination: {'placeId': destination_place_id},
      travelMode: travel_mode
    }, function(response, status) {
      if (status === google.maps.DirectionsStatus.OK) {
            console.log(response.routes);
            console.log(response.routes[0].legs[0].distance.value / 1000);
            var kilometers = response.routes[0].legs[0].distance.value / 1000;
            updatePrice(kilometers);
                
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }
  
  function updatePrice(kilometers){
      var carClassArray = document.getElementsByClassName('car-class-min-price');
      var returnCheckBox = document.getElementById('return');
      
            for (var i = 0; i < carClassArray.length; i++){
               var oldCarClassPrice = carClassArray[i].dataset.price;
               var updatedPriceBuffer = carClassArray[i].dataset.pricebuffer;
               
               if (kilometers >= 35 && returnCheckBox.checked == true){
                    newCarClassPrice = 0.6 * (kilometers - 35) + Number(oldCarClassPrice);
                    updatedPriceBuffer = newCarClassPrice;
                    console.log(updatedPriceBuffer);
                    carClassArray[i].innerHTML ='$' + Math.floor(newCarClassPrice)*2;
                    
               }else if (kilometers >= 35 && returnCheckBox.checked != true){
                    newCarClassPrice = 0.6 * (kilometers - 35) + Number(oldCarClassPrice);
                    carClassArray[i].innerHTML ='$' + Math.floor(newCarClassPrice); 
               }
           
               
            }
  }
  
};

