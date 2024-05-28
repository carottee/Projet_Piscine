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
    window.location.href = "sign_up.html"; // Remplacez par l'URL de votre page d'inscription
}