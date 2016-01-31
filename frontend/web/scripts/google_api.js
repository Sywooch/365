/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* PLEASE, FIND SOME TIME TO THINK ABOUT ALL THIS CRAP YOU HAVE MADE*/
var overallDistance = 0;
var currentPrice = 0;
var returnCheckBox = document.getElementById('return');
var returnState = 1;
var waypts = [];
var origin = document.getElementById('from').value;
var destination = document.getElementById('to').value;

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
  
  var directionsService = new google.maps.DirectionsService;
  var travel_mode = google.maps.TravelMode.DRIVING;
  
  google.maps.event.addDomListener(window, 'load', function(){
      console.log('origin ' + origin);
        console.log('destination ' + destination);
        console.log(waypts);
      route(directionsService, origin, destination, waypts);
  });
  
  var locationInputs = document.getElementsByClassName('add-dest-address'); //grab all inputs supposed to have autocomplete
//  console.log(locationInputs);
//  console.log(waypts);
  
 //attach autocomplete to those inputs
 for (var i = 0; i < locationInputs.length; i++){
     var autocompletes = new google.maps.places.Autocomplete(locationInputs[i], options);
     
     
     
//     locationInputs[i].value = '';

//    function gatherInfomation(){
//        return [origin, destination, waypts];
//    }
     
     autocompletes.addListener('place_changed', function(){
         waypts = [];
        for (var i = 0; i<locationInputs.length; i++){
            if (locationInputs[i].id != 'from' && locationInputs[i].value != ''){
                    waypts.push({
                            location: locationInputs[i].value
                    });

            }

        }
        
        
        origin = document.getElementById('from').value;
        if (waypts.length == 0){
            destination = origin;
        }else{
            destination = waypts[waypts.length - 1].location;
        }
        
//        waypts.pop();
        
        route(directionsService, origin, destination, waypts);
        waypts=[];
     });
 }
 
    //recalculate on close
   var close = document.getElementsByClassName('close');
    for (var i = 0; i < close.length; i++){
        close[i].addEventListener('click', function (e){
            waypts = [];
            var closed = $(e.target.parentElement.parentElement);
            closed.find('.add-dest-address').val('');
            
            for (var i = 0; i<locationInputs.length; i++){
            if (locationInputs[i].id != 'from' && locationInputs[i].value != ''){
                console.log(locationInputs[i].value);
                    waypts.push({
                            location: locationInputs[i].value
                    });
            }

        }
       
       
       
        
        origin = document.getElementById('from').value;
        if (waypts.length == 0){
            destination = origin;
        }else{
            destination = waypts[waypts.length - 1].location;
        }
        
//        
     
        
        route(directionsService, origin, destination, waypts);
            waypts = [];
        });
    };
  
  function route(directionsService, origin, destination, waypoints) {
    if (!origin || !destination) {
        console.log('no data');
      return;
    }
    console.log('origin ' + origin);
        console.log('destination ' + destination);
        console.log(waypts);
    
    directionsService.route({
        
      origin: origin,
      destination: destination,
      waypoints: waypts,
      travelMode: travel_mode
    }, function(response, status) {
      if (status === google.maps.DirectionsStatus.OK) {
        overallDistance = 0;

        for (var i=0; i<response.routes[0].legs.length; i++){
                overallDistance += response.routes[0].legs[i].distance.value / 1000;
        }
			console.log(overallDistance); 
                        
                        updatePrice(overallDistance, returnState);
                        updatePriceInFixedBox(overallDistance);
                        
      } else {
        window.alert('Directions request failed due to ' + status);
        window.alert(response.routes[0]);
        
      }
    });
  }
 
  function updatePriceInFixedBox(distance){
      var priceInFixedBox = document.getElementById('fixed-box-price');

      var carPrice = Number(priceInFixedBox.dataset.carPrice);
      var carCent = Number(priceInFixedBox.dataset.cent);
      
      if (distance == 0 || distance <= 35) {
          priceInFixedBox.innerHTML = Number(carPrice);
          return;
      };
      
      
      console.log('car price ' + priceInFixedBox.dataset.carPrice);
      console.log('car cent ' + priceInFixedBox.dataset.cent);
      console.log('distance ' + distance);
 
      var updatedPrice = Math.floor(carCent * (distance - 35) + carPrice);
      
      priceInFixedBox.innerHTML = updatedPrice;
  };

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
      console.log('kilometers in return ' + overallDistance);
      setTimeout(function(){updatePrice(overallDistance, returnState);}, 300)
  });
  
  
  
};

//function displayMapSummary(){
//    var directionsService = new google.maps.DirectionsService;
//        var directionsDisplay = new google.maps.DirectionsRenderer;
//        
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
//};
