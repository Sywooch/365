window.onload = function () {
    jQuery.fn.exists = function(){return this.length>0;}; //function to check if element exists
    
    if ($('#parent-container-add-destination').exists()){
    var parentContainer = document.querySelector("#parent-container-add-destination");

    parentContainer.addEventListener("click", addHideDestination, false);}

    function addHideDestination(e){
        try {
            if (e.target.id == "add"){ //if clicked on "add destination" show div
                    var targetDiv = document.querySelector(".cpanel-item.new-destination.hide");
                    console.log(targetDiv.id);
                    if (targetDiv.id == "last"){ // hide "add destination link after last div was shown
                            e.target.className = "hide"; //hide "add destination link"
                    }
                    targetDiv.className = "cpanel-item new-destination"; //show div
            }else if(e.target.className == "fa-2x fa fa-times-circle"){ //if clicked on "close" hide div
                    e.target.parentElement.parentElement.className = "cpanel-item new-destination hide";
                    document.querySelector('#add').className = "cpanel-item"; //show "add destination" link
            }}catch (e){
                    console.log("cant add more destinations");
            }
        };

	function addPassenger(){
		var anchor = document.getElementById("add-pass-anchor"); //where to attach new node
		
		var p_clone = anchor.childNodes[1].cloneNode(true);
		
		var p_icon = document.createElement("i");
		p_icon.setAttribute("class", "fa fa-times-circle picon");
                
		anchor.appendChild(p_clone);
		
		var icons = document.getElementsByClassName("picon");
		
		 for (i = 0; i < icons.length; i++){
			 icons[i].addEventListener("click", function(event){
				 this.parentElement.parentElement.parentElement.parentElement.parentElement.removeChild(p_clone);
				 pindex--;
				 return pindex;
 				
			 });
		 };
	};

	var pindex = 0; //number of triggered events for passenger
	document.getElementsByClassName("passenger")[0].addEventListener("click", function(){
		if (pindex == 3){
			return;
		}
		pindex++;
		addPassenger(pindex);
		
	});
	
	
};