

function Autocomplete(){
    
    
    var directionsService = new google.maps.DirectionsService();
    var geocoder = new google.maps.Geocoder();
    travelMode =  google.maps.TravelMode.DRIVING;
    
    options = {
        componentRestrictions: {coutry: 'az'}
    }
    
    console.log('works');
    
    var arrayOfInputs = []
    var locationInputs = document.getElementsByClassName('add-dest-address');
    
    for (var i = 0; i < locationInputs.length; i++){
        arrayOfInputs.push(
            locationInputs.item(i)
        )
    }
    
    var index = 0
    for (var i=0; i < locationInputs.length; i++){
        $(locationInputs[i]).on('keypress', function(e){
            index = arrayOfInputs.indexOf(e.target)
        })
    }   
    
    var origin;
    var destination;
    
    for (var i = 0; i < locationInputs.length; i++){
        var autocomplete = new google.maps.places.Autocomplete(locationInputs[i]);
        
        autocomplete.addListener('place_changed', function(){
            var place = this.getPlace()
            console.log(arrayOfInputs.indexOf(locationInputs.item(index)));
            if(document.getElementById('index')){
                if (arrayOfInputs.indexOf(locationInputs.item(index)) == 0){
                    console.log(place.place_id)
                    origin = {'placeId': place.place_id}
                }else if(arrayOfInputs.indexOf(locationInputs.item(index)) == 1){
                    console.log(place.place_id)
                    destination = {'placeId': place.place_id}
                }
             
                
                route(origin, destination)
            }
            
        });
    }
     
    
    function route(origin, destination){
        
        var request = {
            origin: origin,
            destination: destination,
    //        waypoints: [{location: 'Lenkoran, Azerbaijan'}],
            travelMode:  travelMode
        }


        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
              console.log(response.routes[0].legs[0].distance.value / 1000);
            }
        });

    }
    
    

function sendGeocodeRequest(address){
        geocoder.geocode({'address': address},function(result, status){
            if (status == google.maps.GeocoderStatus.OK) {
                callback(result[0].place_id)
        
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }

        })
    }
    
    
}
  




