/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function hideCarClassContainer(){
            $('#car-class-container').animate({
                opacity: 0,          
            }, 500, callback);
        }
        
        function callback(){
            $('#fountainG').hide();
            
            setTimeout( function(){
                $('#fountainG').show();
            }, 400);
            
            setTimeout( function(){
                $('#fountainG').show();
                $('#car-class-container').animate({
                    opacity: 1,
                }, 500);
            }, 1300);
        }