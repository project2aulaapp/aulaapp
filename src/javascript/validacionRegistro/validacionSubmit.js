document.addEventListener('DOMContentLoaded', main, false);

function main() {

    var myForm = document.getElementById("myForm");
    myForm.addEventListener("submit", comprobarForm, false);
    myForm.addEventListener("reset", limpiarSpans, false);

    function comprobarForm(e) {

        var valido = true;

        valido = validarNombreUsuario(myForm.userName);
        valido &= validarContra(myForm.password);
        valido &= comprobarContra(myForm.rePassword);
        valido &= validarNombreApellidos(myForm.userNameReal);
        valido &= validarNombreApellidos(myForm.firstSurname);
        valido &= validarNombreApellidos(myForm.secondSurname);
        valido &= validarEmail(myForm.mail);
        valido &= validarPregunta(myForm.questions);
        valido &= validarRespuesta(myForm.answer);

        if (valido) return;
        e.preventDefault();
    }

    function limpiarSpans() {
        var spans = document.getElementsByTagName("span");
        for (var i = 0; i < spans.length; i++) {
            spans[i].textContent = "";
            spans[i].className = "ok";
        }
    }

    function validarNombreUsuario(nombre) {
        nombre.nextElementSibling.textContent = "";
        nombre.nextElementSibling.className = "ok";
        if (nombre.value.trim().match(/^[A-Za-z0-9]{4,15}$/) == null) {
            nombre.nextElementSibling.className = "error";
            nombre.nextElementSibling.textContent = "Introduce " + nombre.title + " entre 4 y 15 carácteres alfanúmericos";
            return false;
        }
        return true;
    }

    function validarContra(contra) {
        contra.nextElementSibling.textContent = "";
        contra.nextElementSibling.className = "ok";
        if (contra.value.trim().match(/^[A-Za-z0-9]{6,15}$/) == null) {
            contra.nextElementSibling.className = "error";
            contra.nextElementSibling.textContent = "Introduce " + contra.title + " entre 6 y 15 carácteres alfanúmericos";
            return false;
        }
        return true;
    }

    function comprobarContra(contra) {
        contra.nextElementSibling.textContent = "";
        contra.nextElementSibling.className = "ok";
        if (contra.value != myForm.password.value) {
            contra.nextElementSibling.className = "error";
            contra.nextElementSibling.textContent = "Las contraseñas no coinciden";
            return false;
        }
        return true;
    }

    function validarNombreApellidos(cadena) {
        cadena.nextElementSibling.textContent = "";
        cadena.nextElementSibling.className = "ok";
        if (cadena.value.trim().match(/^([A-ZÑÁÉÍÓÚa-zñáéíóú]+[\s]?)+$/) == null) {
            cadena.nextElementSibling.className = "error";
            cadena.nextElementSibling.textContent = "Introduce " + cadena.title + ", solo carácteres alfabéticos";
            return false;
        }
        cadena.value = cadena.value.charAt(0).toUpperCase() + cadena.value.slice(1);
        return true;
    }

    function validarEmail(email) {
        email.nextElementSibling.textContent = "";
        email.nextElementSibling.className = "ok";
        if (email.value.trim().match(/^[a-z0-9](\.?[a-z0-9_-]){0,}@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/) == null) {
            email.nextElementSibling.className = "error";
            email.nextElementSibling.textContent = "Introduce " + email.title + " válido, hola@mundo.com";
            return false;
        }
        return true;
    }

    function validarPregunta(pregunta) {
        pregunta.nextElementSibling.textContent = "";
        pregunta.nextElementSibling.className = "ok";
        if (pregunta.selectedIndex == null || pregunta.selectedIndex == 0) {
            pregunta.nextElementSibling.className = "error";
            pregunta.nextElementSibling.textContent = "Selecciona una " + pregunta.title + " para recuperar tu cuenta si olvidas tu contraseña";
            return false;
        }
        return true;
    }

    function validarRespuesta(respuesta) {
        respuesta.nextElementSibling.textContent = "";
        respuesta.nextElementSibling.className = "ok";
        if (respuesta.value.trim().length <= 0 || respuesta.value.trim().length > 20) {
            respuesta.nextElementSibling.className = "error";
            respuesta.nextElementSibling.textContent = "Responde la " + respuesta.title + " seleccionada";
            return false;
        }
        return true;
    }
}