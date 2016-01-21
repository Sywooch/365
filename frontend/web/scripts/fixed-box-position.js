   
    var rightSideBox = document.getElementById('fixed-box');

    //function sets position attribute of the 'box' to 'fixed'
    function fixBox(box){
	box.style.position = 'fixed';
        box.style.top = "0px"; //make box sit on top of the viewport
        box.style.width = "262.5px";
    }

    //bring box back where it was
    function unfixBox(box){
	box.style.position = 'initial'; 
    }
    
    window.onscroll = function(){
	
        //of course i am not sure how it works
        var scrolled = window.pageYOffset || document.documentElement.scrollTop; 
	if (scrolled >= 245){
		fixBox(rightSideBox);
	}else{
		unfixBox(rightSideBox);
	}
    }