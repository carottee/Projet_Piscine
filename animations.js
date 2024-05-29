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



document.addEventListener('DOMContentLoaded', () => {
    const cells = document.querySelectorAll('.availability-cell');

    cells.forEach(cell => {
        cell.addEventListener('click', () => {
            if (cell.classList.contains('selected')) {
                cell.classList.remove('selected');
                cell.style.backgroundColor = 'white';
            } else {
                cell.classList.add('selected');
                cell.style.backgroundColor = 'black';
            }
        });

        cell.addEventListener('mouseover', () => {
            if (!cell.classList.contains('selected')) {
                cell.style.border = '4px solid orange';
            }
        });

        cell.addEventListener('mouseout', () => {
            if (!cell.classList.contains('selected')) {
                cell.style.border = '1px solid #ccc';
            }
        });
    });
});
