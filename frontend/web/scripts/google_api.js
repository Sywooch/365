/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* PLEASE, FIND SOME TIME TO THINK ABOUT ALL THIS CRAP YOU HAVE MADE*/

var kilometers = 0;
var currentPrice = 0;
var returnCheckBox = document.getElementById('return');
var returnState = 1;
function Autocomplete(){
    var directionsService = new google.maps.DirectionsService;
    jQuery.fn.exists = function(){return this.length>0;}; // function to check if element exists
//    var directionsDisplay = new google.maps.DirectionsRenderer;
//    var mapProp = {
//        center: new google.maps.LatLng(51.508742,-0.120850),
//        zoom:9,
//        mapTypeId: google.maps.MapTypeId.ROADMAP
//    };
//      var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
//      directionsDisplay.setMap(map);
//      directionsService.route({
//          origin: 'Heydar Aliyev International Airport (Terminal 1), Khazar, Azerbaijan',
//          destination: 'Gence, Azerbaycan',
//          waypoints: [
//              {location: 'Salyan, Azərbaycan'},
//              {location: 'Lenkoran, Azerbaijan'},
//              {location: 'Barda, Azerbaijan'}],
//            travelMode: google.maps.TravelMode.DRIVING
//      },function(response,status){
//           if (status === google.maps.DirectionsStatus.OK) {
//            directionsDisplay.setDirections(response);
//        }else {
//      window.alert('Directions request failed due to ' + status);
//    }
//
//
//      });

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
  
  
  var origin_place_id = null; //set initial origin value to From input
  var destination_place_id = null; //set initial origin value to To input
  
  //check if elements exist. workaround to fix unexistent elements errors on the pages
  if($('#pac-input-from').exists() && $('#pac-input-to').exists()){
    var inputFrom = document.getElementById('pac-input-from');
    var inputFromChaffeur = document.getElementById('pac-input-from-chaffeur');
    var inputTo = document.getElementById('pac-input-to');


    var searchBoxFrom = new google.maps.places.Autocomplete(inputFrom, options);
    var searchBoxChaffeur = new google.maps.places.Autocomplete(inputFromChaffeur, options);
    var searchBoxTo = new google.maps.places.Autocomplete(inputTo, options);
    /* sometimes it gives errors */

    searchBoxFrom.addListener('place_changed', function(e){
        hideCarClassContainer();
        $(inputFrom).removeClass('error');
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
        $(inputTo).removeClass('error');
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
        
        /*add autocompletes to add destination inputs*/
        var addDestinationInputs = document.getElementsByClassName('add-dest-address');
        for (var i=0; i < addDestinationInputs.length; i++)
            new google.maps.places.Autocomplete(addDestinationInputs[i], options);

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
            kilometers = response.routes[0].legs[0].distance.value / 1000;
            console.log(kilometers);
            updatePrice(kilometers, returnState);
            
            
                
      } else {
        window.alert('Directions request failed due to ' + status);
        window.alert(response.routes[0]);
        
      }
    });
  }

  //function to update car prices depending on distance and return value
  function updatePrice(kilometers, returnState){
      var carClassArray = document.getElementsByClassName('car-class-min-price');
      var carSpecificArray = document.getElementsByClassName('car-price');

      for (var i = 0; i < carClassArray.length; i++){
          
            var oldCarClassPrice = carClassArray[i].dataset.price; //array of car class prices
            
            //if there is no distance or it is less than 35km then price should stay the same
            // only return updates the price in this case. 
            if (kilometers == 0 || kilometers < 35){ //kilometers is global parameter
                newCarClassPrice = Number(oldCarClassPrice)*returnState;
                
                carClassArray[i].innerHTML ='from $ ' + Math.floor(newCarClassPrice);
                
                for (var j = 0; j < carSpecificArray.length; j++){
                    var priceClass =  Number(carSpecificArray[j].dataset.price) * returnState;
                    console.log('class price' + priceClass);
                    
                    
                    var newSpecificPrice = Math.floor(priceClass);
                        carSpecificArray[j].innerHTML = '$ ' + 
                            newSpecificPrice;
                };
                
            }       
            //if distance is more than 35km then price should be calculated like this:
            //koeff * (distance - 35)+
            if (kilometers >= 35 ){
                var s = (kilometers - 35); //normalized distance
                
                var priceClass = (carClassArray[i].dataset.coefficient*s +
                        Number(oldCarClassPrice))*returnState;
                
                newCarClassPrice = priceClass;
                carClassArray[i].innerHTML ='from $ ' + Math.floor(newCarClassPrice);
                
                for (var j = 0; j < carSpecificArray.length; j++){
                    
                    var kSpecific = carSpecificArray[j].dataset.coefficient; //car coefficient
                    var priceSpecific = Math.floor((kSpecific*s + 
                            Number(carSpecificArray[j].dataset.price)) * returnState);
                    
                    
                    
                    var newSpecificPrice = Math.floor(priceSpecific);
                    carSpecificArray[j].innerHTML = '$ ' + newSpecificPrice;
                        
                };
                
            }

        }
   }
  
//if checkbox value is "checked" then update price
  returnCheckBox.addEventListener('change', function (){
      hideCarClassContainer();
      if (!this.checked){
         returnState = 1; //global parameter
      }else{
          returnState = 2;
      }
      setTimeout(function(){updatePrice(kilometers, returnState);}, 300)
  });
  
  
  
};

