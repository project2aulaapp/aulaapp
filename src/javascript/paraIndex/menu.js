document.addEventListener('DOMContentLoaded',
function(){
	
	var li = document.getElementsByTagName("li")[0];
	var i = 0;

	for(i = 0; i<=li.length; i++){
		li[i].addEventListener("click",cambiarClase,false);
	}

	function cambiarClase(e){

		var actual = document.getElementsByClassName("actual")[0];
		actual.removeAttribute("actual");

		e.target.className += "actual";
	}

},false);