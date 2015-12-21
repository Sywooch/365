window.onload = function () {
	
		/*function creates/deletes new destination fields*/
	
		function addElement(){
		var newid = "pac-input-" + index;
		var elem = document.getElementById("add-dest-anchor");
		var clone = elem.childNodes[1].cloneNode(true);
		var icon = document.createElement("i");
		icon.setAttribute("class", "fa fa-times-circle");
		
		clone.childNodes[1].childNodes[3].appendChild(icon);
		console.log(clone.childNodes[1].childNodes[3].childNodes[1].id=newid);
		var id = clone.childNodes[1].childNodes[3].childNodes[1].id;  
		
	 	elem.appendChild(clone);
	 	
	 	var sb = new google.maps.places.Autocomplete(document.getElementById(newid)); //create google autosearch
	 
		var icons = document.getElementsByTagName("i");
		console.log("index in addElement: " + index);
		for (i = 0; i < icons.length; i++){
			icons[i].addEventListener("click", function(event){
				this.parentElement.parentElement.parentElement.parentElement.removeChild(clone);
				index--;
				return index;
				
			});
		};
	};
	
	var index=0; //this index tracks number of triggered events
	document.getElementsByClassName("destination")[0].addEventListener("click", function(){
		console.log("destination ok");
		if (index == 3){
			return;
		}
		index++;
		addElement(index);
		
		
	});
	
	function addPassenger(){
		var anchor = document.getElementById("add-pass-anchor");
		console.log(anchor.childNodes);
		var p_clone = anchor.childNodes[1].cloneNode(true);
		console.log(p_clone);
		var p_icon = document.createElement("i");
		p_icon.setAttribute("class", "fa fa-times-circle picon");
		
		console.log(p_clone.childNodes[1].childNodes[1].childNodes[3].appendChild(p_icon));
		
		anchor.appendChild(p_clone);
		
		var icons = document.getElementsByClassName("picon");
		console.log(icons);
	
		 for (i = 0; i < icons.length; i++){
			 icons[i].addEventListener("click", function(event){
			 	console.log(this.parentElement.parentElement.parentElement.parentElement.parentElement);
				 this.parentElement.parentElement.parentElement.parentElement.parentElement.removeChild(p_clone);
				 pindex--;
				 return pindex;
 				
			 });
		 };
	};

	var pindex = 0;
	document.getElementsByClassName("passenger")[0].addEventListener("click", function(){
		console.log("passenger ok");
		if (pindex == 3){
			return;
		}
		pindex++;
		addPassenger(pindex);
		
	});
};
