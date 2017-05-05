
document.addEventListener("DOMContentLoaded", comprobarNotificaciones, false);

function comprobarNotificaciones() {
    var intervalo;
    contador = 0;

    if (contador === 0) { //la primera vez no espera los 5 segundos 
        goAjax();
        contador++;
    }
    intervalo = setInterval(goAjax, 5*1000); //comprobación cada 5 segundos de si hay notificaciones
}



function goAjax() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'views/modules/ajaxNotificaciones.php?' + Date.now());
    xhr.send(null);
    var texto = '';
    xhr.onreadystatechange = function () {
        var ESTADO = 4; // readyState 4 means the request is done.
        var BIEN = 200; // status 200 is a successful return.
        var spanNotificaciones = document.querySelector("#notificaciones");

        if (xhr.readyState === ESTADO) {
            if (xhr.status === BIEN)
                //console.log(xhr.responseText); // 'This is the returned text.'

                texto = xhr.responseText;
            spanNotificaciones.innerHTML = texto;




        } else {
            //console.log('Error: ' + xhr.status); 


        }
    }
}
