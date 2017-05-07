document.addEventListener('DOMContentLoaded', main, false);

function main() {

    var modal = document.getElementById('myModal');
    var accept = document.getElementById('accept');

    var timeId = setTimeout(function() {
        modal.style.display = "none";
    }, 1*60*1000);

    var user = getCookie("username");
    if (user != "") {
        console.log("Recent cookie " + document.cookie);
    } else {
        user = "currentUser";
        if (user != "" && user != null) {
            setCookie("username", user, 30);
        }
        modal.style.display = "flex";
        accept.addEventListener('click', function () {
            modal.style.display = "none";
            console.log("New cookie " + document.cookie);
        }, false);
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
}

