document.addEventListener("DOMContentLoaded", inicio, false);

function inicio() {
  var pizarra = document.getElementById("pizarra");

  pizarra.addEventListener("keyup", goAjax, false);

  function goAjax() {
    var xhr = new XMLHttpRequest();//objeto ajax

    xhr.open('GET', 'views/modules/pizarraCheck.php?texto=' + pizarra.value + '&' + Date.now());
    xhr.send(null);

    xhr.onreadystatechange = function () {
      var ESTADO = 4;
      var BIEN = 200;
      if (xhr.readyState === ESTADO) {
        if (xhr.status === BIEN) {
          console.log(xhr.responseText); // Respuesta del servidor
        }
      } else {
        //console.log('Error: ' + xhr.status); 
      }
    }
  }

setInterval(function() {
  var xhr = new XMLHttpRequest();//objeto ajax
  xhr.open('GET', 'views/modules/pizarraCheck2.php?' + Date.now());
  xhr.send(null);

  xhr.onreadystatechange = function () {
    var ESTADO = 4;
    var BIEN = 200;
    if (xhr.readyState === ESTADO) {
      if (xhr.status === BIEN) {
        console.log(xhr.responseText); // Respuesta del servidor
        pizarra.innerHTML = xhr.responseText;
      }
    } else {
      //console.log('Error: ' + xhr.status); 
    }
  }
}, 500);
  

}