$(document).ready(function(){
    jQuery.fn.exists = function(){return this.length>0;}; //function to check if element exists
    var myDate = new Date("now");
    var months = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];
    
    
    
    if(document.getElementById('chaffeurForm')){
        
        var daily_rent = Number(document.getElementById('car-price').dataset.price); //example
        $('.full-day > span').text(daily_rent)
        $('.half-day > span').text(Math.round(daily_rent/2*1.2))
        $('.overtime > span').text(Math.round(daily_rent*0.2))
        
        $('#greeting-row').css('display', 'none')
        
        $('.time-control').each(function (){
            $(this).find('.time-picker').val('')
        })
        
        var daysArray = []
        var pricesArray = []
        
        function putDaysToArray(){
            var days = document.getElementsByClassName('time-control')
            
            for (var i = 0; i < days.length; i++){
               
               daysArray[i] = days.item(i)
            }
        }
        
        function calculateAndDisplayPrice(){
            var displayPrice = 0
            for (var i = 0; i < pricesArray.length; i++){
                
                if (typeof pricesArray[i] != 'undefined'){
                    displayPrice += pricesArray[i]
                }
            }
            
            console.log(displayPrice)
            $('#price').text(Math.round(displayPrice))
        }
        
        function addIndex(){
            $('.time-control').each(function(index){
                    $(this).find('.time-picker.from').attr('name', 'Rentorder[time_start][' + index + ']')
                    $(this).find('.time-picker.to').attr('name', 'Rentorder[time_end][' + index + ']')
                })
        }
        
        function calculateHours(start, end, index){
            
            
            var hours = end - start
           
            var price;
            
            if (hours<0){
               hours = 24 - start + end
            }
            
            if (hours > 4 && hours <= 8){
                price = daily_rent;
                
            }if (hours>0 && hours <= 4){
                price = daily_rent/2 * 1.2
                
            }if (hours > 8){
                var overtime = hours - 8
                price = daily_rent + (daily_rent * 0.2 * overtime)
                
            }if(hours == 0){
                price = 0
            }
            
            pricesArray[index] = price
            
            console.log(pricesArray)
           
            calculateAndDisplayPrice()
        }
        
        function attachEvent(){
            $('.time-picker.from').on('dp.change', function(e){
              var fromHour = $(e.target).parents('.time-control').find('.time-picker.to').val()
              var fromHourSplitted = fromHour.split(':')
              var fromHourNumbered = Number(fromHourSplitted[0])
              var dayIndex = daysArray.indexOf(($(e.target).parents('.time-control'))[0])
              console.log(e.date.hour())
              calculateHours(fromHourNumbered, e.date.hour(), dayIndex)
              
            })
            
            $('.time-picker.to').on('dp.change', function(e){
              var fromHour = $(e.target).parents('.time-control').find('.time-picker.from').val()
              var fromHourSplitted = fromHour.split(':')
              var fromHourNumbered = Number(fromHourSplitted[0])
              var dayIndex = daysArray.indexOf(($(e.target).parents('.time-control'))[0])
              console.log(e.date.hour())
              calculateHours(fromHourNumbered, e.date.hour(), dayIndex)
           
            })
            
        }
        
        function attachTimePicker(){
            $('.time-picker').datetimepicker({
                format: 'HH:mm',
                stepping:1,
                useCurrent: true
            });
        }
        $('.ui.dropdown.chauffeurDays').dropdown();
        attachTimePicker()
        attachEvent()
        var days = document.getElementById('days')
        var anchor = document.getElementById('anchor')
        
        $(days).on('change', function(){
            var items = document.getElementsByClassName('time-control')
            console.log(items)
            var alreadyExist = items.length
            var numToAdd = Number($(this).val()) - alreadyExist
            addIndex() //this was necessery for server-side calculations
            while(numToAdd != 0){
                if (numToAdd < 0){
                for (var i = alreadyExist - 1; i > (alreadyExist-1) + numToAdd; i--){
                        anchor.removeChild(items[i])
                        addIndex()
                        pricesArray[i]=0
                        calculateAndDisplayPrice()
                        putDaysToArray()
                        
                }
                console.log(pricesArray)
              }else{
                var item = document.getElementById('clone').cloneNode(true)
                
                anchor.appendChild(item)
                addIndex()
                putDaysToArray()
                attachTimePicker()
                attachEvent()
                numToAdd--
              }
            }
            if (numToAdd == 0){
                putDaysToArray()
                calculateAndDisplayPrice()
                
            }
        })
        
     var numberOfDays = Number(document.getElementById('number-of-days').dataset.days)
     console.log(numberOfDays)
     /*this is a fix when not selecting days in index the Node not found error
      * occured in chaffeur form which caused not working datepicker and telephone*/
     if (numberOfDays == 0){ //when no days selected in index this value is zero
        $(days).val(1)  // so when this happens, number of days become 1 by default
     }else{
         $(days).val(numberOfDays) //else pass the value that was selected in index
     }
     
     $(days).trigger('change') //have to trigger this initially 
     
     
     
        
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



