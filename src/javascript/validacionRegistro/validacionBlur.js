document.addEventListener('DOMContentLoaded', main, false);

function main() {

    var myForm = document.getElementById("myForm");

    myForm.userName.addEventListener("blur", validarNombreUsuario, false);
    myForm.password.addEventListener("blur", validarContra, false);
    myForm.userNameReal.addEventListener("blur", validarNombreApellidos, false);
    myForm.firstSurname.addEventListener("blur", validarNombreApellidos, false);
    myForm.secondSurname.addEventListener("blur", validarNombreApellidos, false);
    myForm.mail.addEventListener("blur", validarEmail, false);
    myForm.questions.addEventListener("blur", validarPregunta, false);
    myForm.answer.addEventListener("blur", validarRespuesta, false);

    function validarNombreUsuario(nombre) {
        nombre.target.nextElementSibling.textContent = "";
        if (nombre.target.value.trim().match(/[A-Za-z0-9]{4,15}/) == null) {
            nombre.target.nextElementSibling.textContent = "Introduce " + nombre.target.title + " correcto";
            return false;
        }
        return true;
    }

    function validarContra(contra) {
        contra.target.nextElementSibling.textContent = "";
        if (contra.target.value.trim().match(/^[\w]{6,15}$/) == null) {
            contra.target.nextElementSibling.textContent = "Introduce " + contra.target.title + " correcta";
            return false;
        }
        return true;
    }

    function validarNombreApellidos(cadena) {
        cadena.target.nextElementSibling.textContent = "";
        if (cadena.target.value.trim().match(/^([A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]?)+$/) == null) {
            cadena.target.nextElementSibling.textContent = "Introduce " + cadena.target.title + " correcto";
            return false;
        }
        return true;
    }

    function validarEmail(email) {
        email.target.nextElementSibling.textContent = "";
        if (email.target.value.trim().match(/^[a-z0-9](\.?[a-z0-9_-]){0,}@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/) == null) {
            email.target.nextElementSibling.textContent = "Introduce " + email.target.title + " correcto";
            return false;
        }
        return true;
    }

    function validarPregunta(pregunta) {
        pregunta.target.nextElementSibling.textContent = "";
        if (pregunta.target.selectedIndex == null || pregunta.target.selectedIndex == 0) {
            pregunta.target.nextElementSibling.textContent = "Selecciona una " + pregunta.target.title;
            return false;
        }
        return true;
    }

    function validarRespuesta(respuesta) {
        respuesta.target.nextElementSibling.textContent = "";
        if (respuesta.target.value.trim().length <= 0 || respuesta.target.value.trim().length > 20) {
            respuesta.target.nextElementSibling.textContent = "Introduce " + respuesta.target.title + " correcto";
            return false;
        }
        return true;
    }
}