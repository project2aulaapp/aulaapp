document.addEventListener('DOMContentLoaded', main, false);

function main() {

    var myForm = document.getElementById("myForm");
    myForm.addEventListener("submit", comprobarForm, false);
    myForm.addEventListener("reset", limpiarSpans, false);

    function comprobarForm(e) {

        var valido = true;

        valido = validarNombreUsuario(myForm.userName);
        valido &= validarContra(myForm.password);

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
}