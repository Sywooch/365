$(document).ready(function(){
    jQuery.fn.exists = function(){return this.length>0;}; //function to check if element exists
    var myDate = new Date("now");
    var months = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];
    
    
    
    if(document.getElementById('chaffeurForm')){
        
               
        $('#greeting-row').css('display', 'none')
        
        $('.time-control').each(function (){
            $(this).find('.time-picker').val('')
        })
        
    }
    

    
    $('#childseat-amount-dropdown').dropdown();
    
    
        
    $('#phone-number').intlTelInput({
        nationalMode: false,
        preferredCountries: ["", ""],
        excludeCountries: ['am']
    });
        
    $('.addpass-phone').intlTelInput({
       nationalMode: false,
       preferredCountries: ["",""]
    });
    
    
    console.log('test')
    
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
    
    

    });
    
   
    
    
    
        
        
        
        
        
        
        
        
        
        
        
        
        


//why script work only when i add $(document).ready()?



