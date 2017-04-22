document.addEventListener('DOMContentLoaded', main, false);

function main() {

    var myForm = document.getElementById("myForm");
    myForm.addEventListener("submit", comprobarForm, false);
    myForm.addEventListener("reset", limpiarSpans, false);

    function comprobarForm(e) {

        var valido = true;

        valido = validarNombreUsuario(myForm.userName);
        valido &= validarContra(myForm.password);
        valido &= validarNombreApellidos(myForm.userNameReal);
        valido &= validarNombreApellidos(myForm.firstSurname);
        valido &= validarNombreApellidos(myForm.secondSurname);
        valido &= validarEmail(myForm.mail);
        valido &= validarPregunta(myForm.questions);
        valido &= validarRespuesta(myForm.answer);

        if (valido) return;
        e.preventDefault();
    }

    function limpiarSpans(){
        var spans = document.getElementsByTagName("span");
        for(var i=0; i<spans.length; i++){
            spans[i].textContent = "";
        }
    }

    function validarNombreUsuario(nombre) {
        nombre.nextElementSibling.textContent = "";
        if (nombre.value.trim().match(/^[A-Za-z0-9]{4,15}$/) == null) {
            nombre.nextElementSibling.textContent = "Introduce " + nombre.title + " correcto";
            return false;
        }
        return true;
    }

    function validarContra(contra) {
        contra.nextElementSibling.textContent = "";
        if (contra.value.trim().match(/^[\w]{6,15}$/) == null) {
            contra.nextElementSibling.textContent = "Introduce " + contra.title + " correcta";
            return false;
        }
        return true;
    }

    function validarNombreApellidos(cadena) {
        cadena.nextElementSibling.textContent = "";
        if (cadena.value.trim().match(/^([A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]?)+$/) == null) {
            cadena.nextElementSibling.textContent = "Introduce " + cadena.title + " correcto";
            return false;
        }
        return true;
    }

    function validarEmail(email) {
        email.nextElementSibling.textContent = "";
        if (email.value.trim().match(/^[a-z0-9](\.?[a-z0-9_-]){0,}@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/) == null) {
            email.nextElementSibling.textContent = "Introduce " + email.title + " correcto";
            return false;
        }
        return true;
    }

    function validarPregunta(pregunta) {
        pregunta.nextElementSibling.textContent = "";
        if (pregunta.selectedIndex == null || pregunta.selectedIndex == 0) {
            pregunta.nextElementSibling.textContent = "Selecciona una " + pregunta.title;
            return false;
        }
        return true;
    }

    function validarRespuesta(respuesta) {
        respuesta.nextElementSibling.textContent = "";
        if (respuesta.value.trim().length <= 0 || respuesta.value.trim().length > 20) {
            respuesta.nextElementSibling.textContent = "Introduce " + respuesta.title + " correcto";
            return false;
        }
        return true;
    }
}