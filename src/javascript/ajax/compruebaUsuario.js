document.addEventListener("DOMContentLoaded", inicio, false);

function inicio() {
  var nombre = document.getElementById("userName");

  nombre.addEventListener("change", goAjax, false);

  function goAjax() {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'views/modules/ajaxUser.php?username=' + nombre.value + '&' + Date.now());
    xhr.send(null);

    xhr.onreadystatechange = function () {
      var ESTADO = 4; 
      var BIEN = 200; 
      if (xhr.readyState === ESTADO) {
        if (xhr.status === BIEN) {
          console.log(xhr.responseText); // Respuesta del servidor
          nombre.nextElementSibling.textContent = xhr.responseText;
        }
      } else {
        //console.log('Error: ' + xhr.status); 
      }
    }
  }

}