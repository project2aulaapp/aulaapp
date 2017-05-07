'use strict';

document.addEventListener('DOMContentLoaded',
function(){
    var contenedor = document.getElementById("contenedor");
    var section = contenedor.firstElementChild;
    var ul = document.getElementsByTagName("ul")[0];
    
    var menu = document.getElementsByClassName('menu');
    
    for(var i = 0;i<menu.length; i++){
        menu[i].addEventListener("click",cambiarId, true);
        console.log(menu[i]);
    }
    
    function cambiarId(elemento){
        console.log(elemento.target)
        section.setAttribute("class",elemento.target.id);
    }
},false);
