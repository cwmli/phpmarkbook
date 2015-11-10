function RemoveDIV(e_id){
	var e = document.getElementById(e_id);
	e.parentNode.removeChild(e);
}

function StartRemove(e_id){
	var par_e = document.getElementById(e_id).parentElement;
	//set the closing transition

	par_e.style.WebkitAnimation = "slideOutLeft .5s 1";
	par_e.addEventListener("webkitAnimationEnd", function(){RemoveDIV(par_e.id);});
	
	par_e.style.Animation = "slideOutLeft .5s 1";
	par_e.addEventListener("animationend", function(){RemoveDIV(par_e.id);});
}
