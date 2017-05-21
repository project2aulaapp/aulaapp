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
          if (xhr.responseText == 1) {
            nombre.style.borderColor = "lime";
            nombre.style.backgroundImage = "url('./src/img/ok.png')";
            nombre.style.backgroundRepeat = "no-repeat";
            nombre.style.backgroundSize = "25px 25px";
            nombre.style.backgroundPosition = "center right";
          }
          else {
            nombre.style.borderColor = "red";
            nombre.style.backgroundImage = "url('./src/img/error.png')";
            nombre.style.backgroundRepeat = "no-repeat";
            nombre.style.backgroundSize = "25px 25px";
            nombre.style.backgroundPosition = "center right";
          }
        }
      } else {
        //console.log('Error: ' + xhr.status); 
      }
    }
  }

}