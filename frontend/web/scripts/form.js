$(document).ready(function(){
    jQuery.fn.exists = function(){return this.length>0;}; //function to check if element exists
    var myDate = new Date("now");
    var months = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];
    
    
    if(document.getElementById('chaffeurForm')){
        var days = document.getElementById('days')
        var anchor = document.getElementById('anchor')
        $(days).on('change', function(){
            var items = document.getElementsByClassName('time-control')
            var alreadyExist = items.length
            var numToAdd = Number($(this).val()) - alreadyExist
            
            while(numToAdd != 0){
                if (numToAdd < 0){
                for (var i = alreadyExist - 1; i > (alreadyExist-1) + numToAdd; i--){
                        console.log(i)
                        anchor.removeChild(items[i])
                }
              }else{
                var item = document.getElementById('clone').cloneNode(true)
                
                anchor.appendChild(item)
                $('.time-picker').datetimepicker({
                    format: 'HH:mm',
                    stepping:1,
                    useCurrent: true
                });
                numToAdd--
              }
            }
        })
    }

    
    $('#childseat-amount-dropdown').dropdown();
    $('.ui.dropdown.chauffeurDays').dropdown();
    
        
    $('#phone-number').intlTelInput({
            nationalMode: false,
            preferredCountries: ["", ""]
        });
        
    $('.addpass-phone').intlTelInput({
       nationalMode: false,
       preferredCountries: ["",""]
    });
    
    
    
    
    $('.date-picker').datepicker({
        dateFormat:'dd/mm/yy',
        setDate: myDate,
        numberOfMonths: 2,
        showOtherMonths: true,
        minDate: 0,

        onSelect: function(e){
            console.log(this.className);
            var full_date = '';
            var selected_date = $(this).datepicker("getDate");
            var day = selected_date.getDate();
            var month = months[selected_date.getMonth()];
            var year = selected_date.getFullYear();
            var side_box = document.getElementById('date-fixed');

            full_date = day + " " + month + " " + year;
            //separate dates displayed on sidebox 
            if (this.className == 'cpanel-input date-picker return hasDatepicker'){
                $('#date-return-fixed').text(full_date);
            }else if (this.className == 'cpanel-input date-picker hasDatepicker'){
                $('#date-fixed').text(full_date);
            }
        }
    });
    
    var returnPanelParent = document.getElementById("return-panel");
    var dateInputReturnPanel = document.getElementById("date-pickup-return-panel");
    var timeInputReturnPanel = document.getElementById("time-pickup-return-panel");
    var pickupAdressInputReturnPanel = document.getElementById('pickup-address-return-panel');
    var pickupAddressFixed = document.getElementById('pickup-address-return-fixed');
    
    $(returnPanelParent).on('input change', function(e){
        if(e.target.id=="pickup-address-return-panel"){
            console.log(e.target.value);
           pickupAddressFixed.innerHTML = e.target.value;  
        }
            
    });
    
    function checkChildSeatBox(){
       if ($('#childseat').prop('checked')){
            $('.ui.dropdown.childseat').removeClass('disabled'); 
            
        }else{
            $('.ui.dropdown.childseat').addClass('disabled');
        } 
    }
    
    
    
    $('#childseat').on('change', function (){
        checkChildSeatBox();
        
    });
    
    checkChildSeatBox();

    });
    
   
    
    
    
        
        
        
        
        
        
        
        
        
        
        
        
        


//why script work only when i add $(document).ready()?



