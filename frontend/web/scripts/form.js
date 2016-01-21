$(document).ready(function(){
    jQuery.fn.exists = function(){return this.length>0;}; //function to check if element exists
    var myDate = new Date("now");
    var months = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];
        
    $('#phone-number').intlTelInput({
            nationalMode: false
        });
        
    $('#time-arrival').datetimepicker({
       format: 'HH:mm',
       stepping: 15,
       minDate: moment()
    });
    
    //bootstrap3 datetimepicker 
    $('#time-pickup').datetimepicker({
        format: 'HH:mm',
        stepping: 15,
        minDate: moment()
    });
       
    //jquery-ui datepicker
    $('#date-arrival').datepicker({
        dateFormat:'dd/mm/yy',
        setDate: myDate,
        numberOfMonths: 2,
        showOtherMonths: true,
        minDate: 0,

        onSelect: function(){
            var full_date = '';
            var selected_date = $(this).datepicker("getDate");
            var day = selected_date.getDate();
            var month = months[selected_date.getMonth()];
            var year = selected_date.getFullYear();
            var side_box = document.getElementById('date-fixed');

            full_date = day + " " + month + " " + year;
            $('#date-fixed').text(full_date);
        }

    });
   
    if ($('#date-flight').exists()){
        $('#date-flight').datepicker({
        dateFormat:'dd/mm/yy',
        setDate: myDate,
        numberOfMonths: 2,
        showOtherMonths: true,
        minDate: 0,

            onSelect: function(){
                var full_date = '';
                var selected_date = $(this).datepicker("getDate");
                var day = selected_date.getDate();
                var month = months[selected_date.getMonth()];
                var year = selected_date.getFullYear();
                var side_box = document.getElementById('date-fixed');

                full_date = day + " " + month + " " + year;
                $('#date-fixed').text(full_date);

                $('#date-pickup').text(full_date);
            }
        });
    }
    
    
    
    if ($('#date-pickup-citytocity').exists()){
        $('#date-pickup-citytocity').datepicker({
        dateFormat:'dd/mm/yy',
        setDate: myDate,
        numberOfMonths: 2,
        showOtherMonths: true,
        minDate: 0,
        onSelect: function(){
            var full_date = '';
            var selected_date = $(this).datepicker("getDate");
            var day = selected_date.getDate();
            var month = months[selected_date.getMonth()];
            var year = selected_date.getFullYear();
            var side_box = document.getElementById('date-fixed');

            full_date = day + " " + month + " " + year;
            $('#date-fixed').text(full_date);
        }
        });
    }
    
    
    
    
});

//why script work only when i add $(document).ready()?



