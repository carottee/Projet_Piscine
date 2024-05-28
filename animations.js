function validatePassword() {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    var error_message = document.getElementById("error_message");

    if (password !== confirm_password) {
        error_message.style.display = "block";
        return false; // Empêche l'envoi du formulaire
    } else {
        error_message.style.display = "none";
        return true; // Permet l'envoi du formulaire
    }
}


function redirectToSignUp() {
    window.location.href = "sign_up.html";
}

function details_rdv_finis() { //fonction pour afficher le détail du rdv fini
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("detail_rdv_fini").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "rdv_fini_test.html", true);
    xhttp.send();
}