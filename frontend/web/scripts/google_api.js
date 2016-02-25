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
var childseats = 0;
var childseatsPrice = 0;

function Autocomplete(){
    if (document.getElementById('form')){
    var rateDiv = document.getElementById('rate');
    var rate = Number(rateDiv.dataset.rate) * 4;
    
    childseats = Number($('#childseat-amount-dropdown').val());
    childseatsPrice = childseats * rate;
    
    $('#childseat-price').text(rate);
    
    console.log(childseatsPrice);
    console.log($('#childseat-amount-dropdown').val());
    
    function checkChildSeatBox(){
       if ($('#childseat').prop('checked')){
            $('.ui.dropdown.childseat').removeClass('disabled'); 
            childseatsPrice = childseats * rate;
        }else{
            $('.ui.dropdown.childseat').addClass('disabled');
            childseatsPrice = 0;
            console.log($('#childseat-amount-dropdown').val());
        } 
    }

    
    
    checkChildSeatBox();
    
    $('#childseat-amount-dropdown').on('change', function() {
        childseats = Number($(this).val());
        childseatsPrice = childseats * rate;
        document.getElementById('fixed-box-price').innerHtml
        console.log(childseatsPrice);
    });
    }
    
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
      var boundsChaffeur = new google.maps.LatLng(40.391802, 49.866707)
      var optionsChaffeur = {
          location: boundsChaffeur,
          rankBy: google.maps.places.RankBy.DISTANCE,
          componentRestrictions: {country: 'az'}
      }
      
      var chaffInput = document.querySelector('.chaff-pickup-address')
      var chaffAutocomplete = new google.maps.places.Autocomplete(chaffInput, optionsChaffeur)
      
      chaffAutocomplete.addListener('place_changed', function() {
          //here origin always stays baku
          
          var origin = {'placeId': 'ChIJ-Rwh1mt9MEARa2zlel5rPzQ'}; //baku place id
          
          var place = chaffAutocomplete.getPlace()
          
          var destination = {'placeId': place.place_id}
          
          $('#chaffeur-dest-placeid').val(place.place_id)
          
          route(origin, destination)
          
      });
      
      //event to remove error class from input in chaffeur(index)
      $(chaffInput).on('keypress', function() {
          $(this).removeClass('error')
      });
      
      for (var i=0; i<locationInputs.length; i++) {
          locationInputs[i].value = '';
      }; //clear fields on page reload
      
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
                $(e.target).removeClass('error')
                index = arrayOfInputs.indexOf(e.target)
            })
        }
      
      for (var i = 0; i < inputs.length; i++){
          var autocomplete = new google.maps.places.Autocomplete(inputs.item(i), options)
          
          autocomplete.addListener('place_changed', function(){
                hideCarClassContainer()
                var place = this.getPlace()

                if (arrayOfInputs.indexOf(inputs.item(index)) == 0){
                    origin = place.geometry.location
                    
                    var coordinates_lat = place.geometry.location.lat()
                    var coordinates_lng = place.geometry.location.lng()
                    
                    coordinates_lat = coordinates_lat.toString()
                    coordinates_lng = coordinates_lng.toString()
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
    
    var fromCoords = document.getElementById('fromLatLng').dataset.coords.split(',')
    var toCoords = document.getElementById('toLatLng').dataset.coords.split(',')
    
    var origin = {'lat': Number(fromCoords[0]), 'lng': Number(fromCoords[1])}
    var destination = {'lat': Number(toCoords[0]), 'lng':  Number(toCoords[1])}

    route(origin, destination)
    
    //so complete mess happens here
    
    $('#childseat-amount-dropdown').on('change', function() {
        childseats = Number($(this).val());
        childseatsPrice = childseats * rate;
        route(origin, destination)
        console.log(childseatsPrice);
    });
    
    $('#childseat').on('change', function (){
        checkChildSeatBox();
        route(origin, destination)
    });

    var waypoints = []; 
    
    var addDestInputs = document.getElementsByClassName('side-dests');
    
    for (var i=0; i<addDestInputs.length; i++){
          addDestInputs[i].value = '';
      } //clear fields on page reload
    
    var addDestsArray = []
    for (var i = 0; i < addDestInputs.length; i++){
      addDestsArray.push(addDestInputs.item(i))
    };
    
    for (var i = 0; i < addDestInputs.length; i++){
        var autocomplete = new google.maps.places.Autocomplete(addDestInputs.item(i), options)
        
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
              
              $('#childseat-amount-dropdown').on('change', function() {
                childseats = Number($(this).val());
                childseatsPrice = childseats * rate;
                route(origin, destination, waypoints)
                console.log(childseatsPrice);
            });
            
            $('#childseat').on('change', function (){
                checkChildSeatBox();
                route(origin, destination, waypoints)
            });

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

if(document.getElementById('chaffeurForm')){
    console.log('we are in chauffeur')
    
    var placeidFromInput = $('#chaffeur-dest-placeid').data('id')
    console.log(placeidFromInput)
    
    var origin = {'placeId': 'ChIJ-Rwh1mt9MEARa2zlel5rPzQ'}
    var destination = {'placeId': placeidFromInput}
    
    console.log(destination)
    route(origin, destination)
    
    var chaffInput = document.querySelector('.chaff-pickup-address')
    var chaffAutocomplete = new google.maps.places.Autocomplete(chaffInput, options)
    
    chaffAutocomplete.addListener('place_changed', function(){
        var place = chaffAutocomplete.getPlace()
        
        var origin = {'placeId': 'ChIJ-Rwh1mt9MEARa2zlel5rPzQ'}
        var destination = {'placeId': place.place_id}
        
        route(origin, destination)
    })
    
}

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
        
        //here i write values into hidden inputs. these value the go to the
        //confirmation page. i need these values to display the route
        
        $("#start").val(origin.lat + ' ' + origin.lng)
        $('#end').val(destination.lat + ' ' + destination.lng)
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
        
        //i will display only origin and destination, without displayin
        //waypoints
        
        $("#start").val(origin.lat + ' ' + origin.lng)
        $('#end').val(modifiedDestination.lat + ' ' + modifiedDestination.lng)
    }

    directionsService.route(request, function(response, status) {
      if (status === google.maps.DirectionsStatus.OK) {
        var overallDistance = 0;
        var duration = 0;
        console.log(response.routes[0]);
        for (var i=0; i<response.routes[0].legs.length; i++){
                overallDistance += response.routes[0].legs[i].distance.value / 1000;
                 duration += response.routes[0].legs[i].duration.value;
                
        }
       
        console.log(overallDistance); 
        
        $('#distance').val(Math.round(overallDistance))
        $('#duration').val(duration)
        $('#distanceConfirm').val(overallDistance)
        
            //actually it will be better to call this functions from other place
            updatePrice(overallDistance, returnState);
            
            if(document.getElementById('transfer-fixed-box')){
                updatePriceInFixedBox(overallDistance);
            }
            
            if (document.getElementById('chaffeur-fixed-box')){
               updatePriceChaffeurBox(overallDistance)
            }
                        
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
  
  function updatePriceChaffeurBox(distance){
      console.log(distance)
      
      var priceInFixedBox = document.getElementById('fixed-box-price');
      var carPrice = Number(priceInFixedBox.dataset.carPrice);
      var carCent = Number(priceInFixedBox.dataset.cent);
      var transferPrice = Math.round(carCent * (distance - 35) + carPrice);
      
      console.log(carPrice)
      console.log(carCent)
      
      console.log(transferPrice);
      
      if (distance > 35) {
          $('#price').text(transferPrice);
          document.getElementById('transfer-price').dataset.price = transferPrice;
      };
  }
  
  //function updates summary price in right fixed box
  function updatePriceInFixedBox(distance){
      console.log(childseatsPrice)
      
      var priceInFixedBox = document.getElementById('fixed-box-price');
      var buttonBoxBottomSpan = $('.button-box-title span');

      if ($('#return-form').prop('checked')){
         var returnState = 2;
      }else{
         var returnState = 1;
      }
      
      var carPrice = Number(priceInFixedBox.dataset.carPrice);
      var carCent = Number(priceInFixedBox.dataset.cent);
//      console.log('childseat price')
//      console.log(4 * Number(priceInFixedBox.dataset.cent))
//      console.log('cent')
//      console.log(Number(priceInFixedBox.dataset.cent))
      if (distance == 0 || distance <= 35) {
            priceInFixedBox.innerHTML = Number(carPrice) * returnState + childseatsPrice;
          
          buttonBoxBottomSpan.text(priceInFixedBox.innerHTML);
          return;
      };
 
      var updatedPrice = Math.round(carCent * (distance - 35) + carPrice) * returnState;
      
      priceInFixedBox.innerHTML = updatedPrice + childseatsPrice;
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
                
                $(carClassArray[i]).find('.prices-transfer > span').text( Math.round(newCarClassPrice)); //update car class price
               
                for (var j = 0; j < carSpecificArray.length; j++){
                    var priceClass =  Number(carSpecificArray[j].dataset.price) * returnState;
                    var newSpecificPrice = Math.round(priceClass);
                        $(carSpecificArray[j]).find('.prices-transfer > span').text(newSpecificPrice); //update specific price
                            
                };
                
            }       
            //if distance is more than 35km then price should be calculated like this:
            //koeff * (distance - 35)+
            
            if (kilometers >= 35 ){
                var chaffeurDailyRentPrice = Number($(carClassArray[i]).find('.prices-chauffeur > .pricefull').text())
                var chaffeurHalfDayRentPrice = Number($(carClassArray[i]).find('.prices-chauffeur > .pricehalf').text())
                
                var s = (kilometers - 35); //normalized distance
             
                var priceClass = (carClassArray[i].dataset.coefficient*s +
                        Number(oldCarClassPrice))*returnState;
                
                var chaffeurPriceClass = carClassArray[i].dataset.coefficient*s +
                        Number(oldCarClassPrice);
                
//                console.log(chaffeurPriceClass);

                newCarClassPrice = priceClass;
                
                //here prices displayed on buttons are being updated
                $(carClassArray[i]).find('.prices-transfer > span').text(Math.round(newCarClassPrice));
                $(carClassArray[i]).find('.prices-chauffeur > .pricefull').
                        text(Math.round(chaffeurPriceClass + chaffeurDailyRentPrice))
                $(carClassArray[i]).find('.prices-chauffeur > .pricehalf').
                        text(Math.round(chaffeurPriceClass + chaffeurHalfDayRentPrice))

                for (var j = 0; j < carSpecificArray.length; j++){
                    
                    var kSpecific = carSpecificArray[j].dataset.coefficient; //car coefficient
                    
                    var priceSpecific = Math.round((kSpecific*s + 
                            Number(carSpecificArray[j].dataset.price)) * returnState);
                    
                    console.log(kSpecific)
                    console.log(s)
                    console.log(carSpecificArray[j].dataset.price)
                    
                    var chaffeurPriceSpecific = kSpecific*s + 
                            Number(carSpecificArray[j].dataset.price)
                    

                    var newSpecificPrice = priceSpecific;
 
                    $(carSpecificArray[j]).find('.prices-transfer > span').text(newSpecificPrice);
 
                };
                
            }

        }
   }

 function displayMapSummary(){
     
     var directionsService = new google.maps.DirectionsService;
     var directionsDisplay = new google.maps.DirectionsRenderer;
     var geocoder = new google.maps.Geocoder();

     if (document.getElementById('confirm-chaffer')){
         console.log('chaffer confirm')

         var place = document.getElementById('location').dataset.location
         
         console.log(place)
         
         var mapProp = {
            center: new google.maps.LatLng(51.508742,-0.120850),
            zoom:9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

         var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
         
         function geocodeAddress(geocoder, resultsMap) {
  
  geocoder.geocode({'address': place}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      resultsMap.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}
         geocodeAddress(geocoder,map)

     }else if(document.getElementById('confirmation')){
        try{ 
         var id = document.getElementById('orderId').dataset.id
         
         //here i take strings with coordinates, extract them and format them
         //before sending to directionsService
         
         var originDiv = document.getElementById("origin");
         
         var coordStringStart = originDiv.dataset.origin;
         
         var latStart = Number(coordStringStart.split(' ')[0])
         var lngStart = Number(coordStringStart.split(' ')[1])
         
         var origin = {'lat': latStart, 'lng': lngStart};
         
         var destinationDiv = document.getElementById("destination");
         
         var coordStringEnd = destinationDiv.dataset.destination;
         
         var latEnd = Number(coordStringEnd.split(' ')[0])
         var lngEnd = Number(coordStringEnd.split(' ')[1])
         
         var destination = {'lat': latEnd, 'lng': lngEnd};
         
         //here i take seconds and extract hours and minutes from them
         
         var durationDiv = document.getElementById('duration');
         
         var secondsDuration = Math.round(Number(durationDiv.dataset.duration));
         
         var hours = secondsDuration / 3600;
         var minutes = (secondsDuration / 60) % 60;

         $('#hours').text(Math.round(hours));
         $('#minutes').text(Math.round(minutes));
         

    }catch(e){
        console.log(e);
    } 
    
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
          travelMode: google.maps.TravelMode.DRIVING
      },function(response,status){
           if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);            
        }else {
      window.alert('Sorry, but we could not display your route on the map.');
    }


      });
     }
     
    console.log('summary map works');

};
  
  displayMapSummary();
  
};



