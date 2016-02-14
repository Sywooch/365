/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* PLEASE, FIND SOME TIME TO THINK ABOUT ALL THIS CRAP YOU HAVE MADE*/
/* 1. there are to many directionsService requests */
/* 2. what about using more high-level structures? PLEASE*/


/*THIS MONSTER GOT REALLY BIG*/


try{
    var returnCheckBox = document.getElementById('return');
    var origin = document.getElementById('from').value; 
    var destination = document.getElementById('to').value;
    
    console.log(returnFromIndexState);
}catch(e){
    console.log(e);
}

var overallDistance = 0;
var currentPrice = 0;

var returnState = 1;
var waypts = [];

function Autocomplete(){
    
    jQuery.fn.exists = function(){return this.length>0;}; // function to check if element exists
    
    try{
        var returnFromIndex = document.getElementById('return-panel');
        var returnFromIndexState = returnFromIndex.dataset.returnState;
        if (returnFromIndexState == 'on'){
            $('.return-panel').css('display', 'block');
            $('#return-form').prop('checked', true);
        }
    }catch(e){
        console.log(e);
    }


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
  	componentRestrictions: {country: 'az'},
        
  };
  
  var directionsService = new google.maps.DirectionsService;
  var travel_mode = google.maps.TravelMode.DRIVING;
  
  //display updated price when page reloads
//  google.maps.event.addDomListener(window, 'load', function(){
//
//      route(directionsService, origin, destination, waypts);
//  });
  
  var locationInputs = document.getElementsByClassName('add-dest-address'); //grab all inputs supposed to have autocomplete
//  console.log(locationInputs);
//  console.log(waypts);

  function checkLocations(locationsArray){
      for (var i=0; i<locationsArray.length; i++){
          if (locationsArray[i].value == 'Shahdag & Spa Hotel, Qusar, Azerbaijan'){
                locationsArray[i].value = 'Shahdag & Spa Hotel, Кусары, Азербайджан'
            }
            
          if (locationsArray[i].value == 'Shafa Stadium, Nizami, Azerbaijan'){
                locationsArray[i].value = 'Стадион Шефа, Qaraçuxur, Азербайджан'
          }
            
      }
  }
  
  if (document.getElementById('index')){
      console.log('we are in index')
      
      var origin;
      var destination;
      
      var inputs = document.getElementsByClassName('add-dest-address');
      var arrayOfInputs = []
      
      for (var i=0; i<inputs.length; i++){
          arrayOfInputs.push(inputs.item(i))
      }
      
      var index = 0
        for (var i=0; i < locationInputs.length; i++){
            $(locationInputs[i]).on('keypress', function(e){
                index = arrayOfInputs.indexOf(e.target)
            })
        }
      
      for (var i = 0; i < inputs.length; i++){
          var autocomplete = new google.maps.places.Autocomplete(inputs.item(i))
          
          autocomplete.addListener('place_changed', function(){
                hideCarClassContainer()
                var place = this.getPlace()
                
                console.log(place.geometry.location.lat())
                console.log(place.geometry.location.lng())
               
                
                if (arrayOfInputs.indexOf(inputs.item(index)) == 0){
                    origin = place.geometry.location
                    var coordinates_lat = place.geometry.location.lat()
                    var coordinates_lng = place.geometry.location.lng()
                    coordinates_lat = coordinates_lat.toString()
                    coordinates_lng = coordinates_lng.toString()
                    console.log(coordinates_lat + ',' + coordinates_lng)
                    $('#fromLatLng').val(coordinates_lat + ',' + coordinates_lng)
                }else if(arrayOfInputs.indexOf(inputs.item(index)) == 1){
                    destination = place.geometry.location
                    var coordinates_lat = place.geometry.location.lat()
                    var coordinates_lng = place.geometry.location.lng()
                    coordinates_lat = coordinates_lat.toString()
                    coordinates_lng = coordinates_lng.toString()
                    $('#toLatLng').val(coordinates_lat + ',' + coordinates_lng)
                }

                route(origin, destination)
            
        });
      }
      
      
      returnCheckBox.addEventListener('change', function (){
        hideCarClassContainer();
        if (!this.checked){
           returnState = 1; //global parameter
        }else{
            returnState = 2;
        }

        setTimeout(function(){updatePrice(overallDistance, returnState);}, 300)
    });
  }
 
  if (document.getElementById('form')) {   
    console.log('we are in form')
    
    
    
    console.log(document.getElementById('fromLatLng').dataset.coords.split(','))
    console.log(document.getElementById('toLatLng').dataset.coords.split(','))
    
    var fromCoords = document.getElementById('fromLatLng').dataset.coords.split(',')
    var toCoords = document.getElementById('toLatLng').dataset.coords.split(',')
    
    var origin = {'lat': Number(fromCoords[0]), 'lng': Number(fromCoords[1])}
    var destination = {'lat': Number(toCoords[0]), 'lng':  Number(toCoords[1])}
    
    
    route(origin, destination)
    
    
    var waypoints = []; console.log(waypoints)
    
    var addDestInputs = document.getElementsByClassName('side-dests');
    var addDestsArray = []
    for (var i = 0; i < addDestInputs.length; i++){
      addDestsArray.push(addDestInputs.item(i))
    };
    
    for (var i = 0; i < addDestInputs.length; i++){
        var autocomplete = new google.maps.places.Autocomplete(addDestInputs.item(i))
        
        autocomplete.addListener('place_changed', function(){
            var place = this.getPlace()
            
             if (addDestsArray.indexOf(addDestInputs.item(index)) == 0) {
                $('#dest1 span').text(place.name)
                waypoints[0] = {'location': {'lat': place.geometry.location.lat(), 'lng': place.geometry.location.lng()}}
              } else if (addDestsArray.indexOf(addDestInputs.item(index)) == 1) {
                $('#dest2 span').text(place.name)
                waypoints[1] = {'location': {'lat': place.geometry.location.lat(), 'lng': place.geometry.location.lng()}}
              } else if (addDestsArray.indexOf(addDestInputs.item(index)) == 2) {
                $('#dest3 span').text(place.name)
                waypoints[2] = {'location': {'lat': place.geometry.location.lat(), 'lng': place.geometry.location.lng()}}
              }
              
              
              
              
              route(origin, destination, waypoints)
              
        })
    }
    
    var index = 0;
    for (var i = 0; i < addDestInputs.length; i++){
        
        $(addDestInputs[i]).on('keypress change', function(e){
            index = addDestsArray.indexOf(e.target)

            if (addDestsArray.indexOf(e.target) == 0){
                $('#dest1 span').text(e.target.value)
            }else if (addDestsArray.indexOf(e.target) == 1){
                $('#dest2 span').text(e.target.value)
            }else if (addDestsArray.indexOf(e.target) == 2){
                $('#dest3 span').text(e.target.value)
                    
                
            }
        });
    }
    
    var closes = document.getElementsByClassName('close')
    
    for (var i = 0; i < closes.length; i++){
        closes[i].addEventListener('click', function(e){
            var tinput = $(e.target).parents('.new-destination').find('.side-dests')
            console.log(addDestsArray.indexOf(tinput[0]))
            if (addDestsArray.indexOf(tinput[0]) == 0) {
            $('#dest1 span').text('')
            waypoints[0] = 'token'
            route(origin, destination, waypoints)
          } else if (addDestsArray.indexOf(tinput[0]) == 1) {
            $('#dest2 span').text('')
            waypoints[1] = 'token'
            route(origin, destination, waypoints)
          } else if (addDestsArray.indexOf(tinput[0]) == 2) {
            $('#dest3 span').text('')
            waypoints[2] = 'token'
            route(origin, destination, waypoints)
          }
        })
    }
}
    
  
  
  
  
 //attach autocomplete to those inputs
// for (var i = 0; i < locationInputs.length; i++){
//     var autocomplete = new google.maps.places.Autocomplete(locationInputs[i], options);
//     
//     autocomplete.addListener('place_changed', function(){
//        var place = this.getPlace();
//        
//        if (document.getElementById('index')){
//            $('#from, #to').removeClass('error'); //remove red inner border from inputs if there was place_changed
//            hideCarClassContainer(); //run loading animation
//            checkLocations(locationInputs);
//        }
//        
////        var place = this.getPlace();
//        
//        waypts = [];
//        for (var i = 0; i<locationInputs.length; i++){
//            
//            
//            if (locationInputs[i].id != 'from' && locationInputs[i].value != ''){
//                    waypts.push({
//                            location: locationInputs[i].value
//                    });
//            }
//
//        }
//        
//        origin = document.getElementById('from').value;
//        if (waypts.length == 0){
//            destination = origin;
//        }else{
//            destination = waypts[waypts.length - 1].location;
//        }
//        
//        route(directionsService, origin, destination, waypts);
//        waypts=[];
//     });
// }
 
    //recalculate on close
//   var close = document.getElementsByClassName('close');
//    for (var i = 0; i < close.length; i++){
//        close[i].addEventListener('click', function (e){
//            console.log(e.target);
//            
//            var closed = $(e.target).parents('.parent-anchor');
//            
//            closed.find('.add-dest-address').val(''); //this clears the address fields when close is clicked
//            closed.find('.specify-address').val('');
//            waypts = [];
//            
//            for (var i = 0; i<locationInputs.length; i++){
//            if (locationInputs[i].id != 'from' && locationInputs[i].value != ''){
//                console.log(locationInputs[i].value);
//                    waypts.push({
//                            location: locationInputs[i].value
//                    });
//            }
//
//        }
//
//        origin = document.getElementById('from').value;
//        if (waypts.length == 0){
//            destination = origin;
//        }else{
//            destination = waypts[waypts.length - 1].location;
//        }
//
//        route(directionsService, origin, destination, waypts);
//            waypts = [];
//        });
//    };
  
   //function creates directionsService request and get response. then it calls functions for 
   // updating and displaying time
  function route(origin, destination, waypoints) {
    if (!origin || !destination) {
        console.log('no data');
        return;
    }
    
    if (!waypoints || typeof waypoints === 'undefined'){
        var request = {
            origin: origin,
            destination: destination,
            travelMode: travel_mode
        }
    }
    else if (waypoints.length > 0){
        function checkToken(value){
            if (value != 'token')
                return value
        }
        var filteredWaypoints = waypoints.filter(checkToken)
        filteredWaypoints.unshift({'location': destination})
        var modifiedDestination = filteredWaypoints[filteredWaypoints.length - 1].location
        filteredWaypoints.pop()
        var request = {
            origin: origin,
            destination: modifiedDestination,
            waypoints: filteredWaypoints,
            travelMode: travel_mode
        }
    }
    
    console.log('before passing to route request')
    console.log(origin)
    console.log(modifiedDestination)
    console.log(filteredWaypoints)
    
    
    directionsService.route(request, function(response, status) {
      if (status === google.maps.DirectionsStatus.OK) {
        overallDistance = 0;
        console.log(response.routes[0]);
        for (var i=0; i<response.routes[0].legs.length; i++){
                overallDistance += response.routes[0].legs[i].distance.value / 1000;
                
        }
       
        console.log(overallDistance); 
            
            //actually it will be better to call this functions from other place
            updatePrice(overallDistance, returnState);
            updatePriceInFixedBox(overallDistance); 
                        
        } else {
        window.alert('Directions request failed due to ' + status);
        window.alert(response.routes[0]);
        
      }
    });
    
      //check if return then double the price
        var returnForm = $('#return-form');
        if ($('#return-form').prop('checked')){
            
            $('.return-panel').css('display', 'block');
        }
        returnForm.on('change', showHideReturnPanel);
        
        
    
    //function works when return state changed. toggles return pannel and call updatePriceInFixedBox
    //to correctly update the price
    function showHideReturnPanel(event){

        if (event.target.checked){
            $('.return-panel').css('display', 'block');
            updatePriceInFixedBox(overallDistance);
        }
            
        else{
            $('.return-panel').css('display', 'none');
            updatePriceInFixedBox(overallDistance);
            
        }
    }
    
  }
  
  //function updates summary price in right fixed box
  function updatePriceInFixedBox(distance){
      var priceInFixedBox = document.getElementById('fixed-box-price');
      var buttonBoxBottomSpan = $('.button-box-title span');

      if ($('#return-form').prop('checked')){
         var returnState = 2;
      }else{
         var returnState = 1;
      }

      var carPrice = Number(priceInFixedBox.dataset.carPrice);
      var carCent = Number(priceInFixedBox.dataset.cent);
      
      if (distance == 0 || distance <= 35) {
          priceInFixedBox.innerHTML = Number(carPrice) * returnState;
          buttonBoxBottomSpan.text(priceInFixedBox.innerHTML);
          return;
      };
      
     
      
      
//      console.log('car price ' + priceInFixedBox.dataset.carPrice);
//      console.log('car cent ' + priceInFixedBox.dataset.cent);
//      console.log('distance ' + distance);
      
 
      var updatedPrice = Math.round(carCent * (distance - 35) + carPrice) * returnState;
      
      priceInFixedBox.innerHTML = updatedPrice;
      buttonBoxBottomSpan.text(priceInFixedBox.innerHTML);
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
                
                $(carClassArray[i]).children('span').text( Math.round(newCarClassPrice)); //update car class price
                
                for (var j = 0; j < carSpecificArray.length; j++){
                    var priceClass =  Number(carSpecificArray[j].dataset.price) * returnState;
                    var newSpecificPrice = Math.round(priceClass);
                        $(carSpecificArray[j]).children('span').text(newSpecificPrice); //update specific price
                            
                };
                
            }       
            //if distance is more than 35km then price should be calculated like this:
            //koeff * (distance - 35)+
            
            if (kilometers >= 35 ){
                var s = (kilometers - 35); //normalized distance
             
                
                var priceClass = (carClassArray[i].dataset.coefficient*s +
                        Number(oldCarClassPrice))*returnState;
                
                
                
                newCarClassPrice = priceClass;
                $(carClassArray[i]).children('span').text(Math.round(newCarClassPrice));
                
                for (var j = 0; j < carSpecificArray.length; j++){
                    
                    var kSpecific = carSpecificArray[j].dataset.coefficient; //car coefficient
                    var priceSpecific = Math.round((kSpecific*s + 
                            Number(carSpecificArray[j].dataset.price)) * returnState);
                    
                    
                    
                    var newSpecificPrice = Math.round(priceSpecific);
                    $(carSpecificArray[j]).children('span').text(newSpecificPrice);
                        
                };
                
            }

        }
   }
  
//if checkbox value is "checked" then update price
//try{
//  returnCheckBox.addEventListener('change', function (){
//      hideCarClassContainer();
//      if (!this.checked){
//         returnState = 1; //global parameter
//      }else{
//          returnState = 2;
//      }
//      
//      setTimeout(function(){updatePrice(overallDistance, returnState);}, 300)
//  });}
//  catch(e){
//      console.log(e);
//  }
  
 function displayMapSummary(){
    console.log('summary map works');
    try{
//         var waypoints = [];
         var originDiv = document.getElementById("origin");
         
         origin = originDiv.dataset.origin;
         var destinationDiv = document.getElementById("destination");
         
//         destination = destinationDiv.dataset.destination;
         waypoints=[];
         /*
          * сделать так
          * если waypoints.length == 0,
          * то destination = $model->to.
          * если в waypoints что-то есть, тогда
          * $model-to идет вначало waypoints, a
          * destination == последний непустой элемент в waypoits
          */
        var waypointDivs = document.getElementsByClassName("waypoints");
         
         for (var i = 0; i < waypointDivs.length; i++){
             if (waypointDivs[i].dataset.waypt == ""){
                 console.log('null')
             }else{
                 waypoints.push({
                     location: waypointDivs[i].dataset.waypt
                 });
             }
             
         }
         
         if (waypoints.length == 0){
             destination = destinationDiv.dataset.destination;
         }else{
             waypoints.unshift({location: destinationDiv.dataset.destination});
             destination = waypoints[waypoints.length-1].location;
         }

    }catch(e){
        console.log(e);
    }
 
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
        
    var mapProp = {
        center: new google.maps.LatLng(51.508742,-0.120850),
        zoom:9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
      
      var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
      directionsDisplay.setMap(map);
      directionsService.route({
          origin: origin,
          destination: destination,
          waypoints: waypoints,
            travelMode: google.maps.TravelMode.DRIVING
      },function(response,status){
           if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            console.log(response.routes[0]);
            var overallDistance=0;
            var duration=0;
            for (var i=0; i<response.routes[0].legs.length; i++){
                overallDistance += response.routes[0].legs[i].distance.value / 1000;
                duration += response.routes[0].legs[i].duration.value / 60 / 60;
            }
            
            $('#total-distance span').text(Math.round(overallDistance) + ' kilometers');
            $('#estimated-time span').text(Math.round(duration) + ' hours');
        }else {
      window.alert('Directions request failed due to ' + status);
    }


      });
};
  
  displayMapSummary();
  
};



