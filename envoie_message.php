<?php
// Connexion à la base de données

// Gestion de l'envoi des messages
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to login page if the user is not logged in
    echo "<script>alert(`vous n'êtes pas connecté`); window.location.href = 'sign_in_up.php' </script>";
    exit();
}


$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if ($db_found) {
    $mail_env = $_POST["mail_env"];
    $mail_dest = $_POST["mail_rec"];
    $contenu = $_POST["contenu"];
    $sens = $_POST['sens'];

    // Insérer le message dans la base de données
    // Vous devrez remplacer les placeholders avec les valeurs réelles des variables


    $sql = "INSERT INTO messages (mail_env, mail_dest, message) VALUES ('$mail_env','$mail_dest', '$contenu')";
    $result = mysqli_query($db_handle, $sql);
    if ($sens == 0){
        echo " <script> window.location.href = 'messages.php?mail_coach=".$mail_dest."'; </script>  ";
    }
    else {
        echo " <script> window.location.href = 'conversations.php?mail_client=".$mail_dest."'; </script>  ";

    }


}
?>
