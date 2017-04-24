document.addEventListener('DOMContentLoaded', main, false);

function main() {

    var myForm = document.getElementById("myForm");

    myForm.userName.addEventListener("blur", validarNombreUsuario, false);
    myForm.password.addEventListener("blur", validarContra, false);

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
}