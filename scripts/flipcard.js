function fpcdPrint(element){
	var pnode = document.createElement("DIV");
	pnode.id = "temp_desc";

	var pnode_text = document.createTextNode("A blatant and terrible copy of Super Crate Box. First program I made with python and pygame for a school project.");
	
	var base_element = document.getElementById(element);
	
	var parent_element_id = base_element.parentNode.id;
	var parent_element = document.getElementById(parent_element_id);
	
	pnode.appendChild(pnode_text);
	
	if (parent_element.childElementCount != 2){
		//-------------pnode styling---------------//
		pnode.style.background = "white";
		
		pnode.style.border = "1px solid white";
		pnode.style.borderRadius = "0.75vw";
		
		pnode.style.marginTop = "2vw";
		
		pnode.style.color = "black";
		pnode.style.fontFamily =  "District, Tahoma, Geneva, sans-serif";
		pnode.style.fontSize = "1.25vw";
		pnode.style.textAlign = "center";
		pnode.style.verticalAlign = "middle";
		pnode.style.padding = "1vw";
		//animations
		pnode.style.WebkitAnimation = "slideInUp .5s 1";
		pnode.style.Animation = "slideInUp .5s 1";	
		//-------------END-------------------------//
		parent_element.appendChild(pnode);
	}
	else{
		var temp_pnode = document.getElementById("temp_desc");
		
		if(temp_pnode.style.WebkitAnimation = "fadeOut .5s 1"){
			temp_pnode.addEventListener("webkitAnimationEnd", fcpdRemove);
		}
		else{
			temp_pnode.style.Animation = "fadeOut .5s 1";
			temp_pnode.addEventListener("animationend", fcpdremove);
		}
	}
}

function fcpdRemove(){
	var e = document.querySelector("#temp_desc");
	e.parentElement.removeChild(e);
}