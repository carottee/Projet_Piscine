<?php

$database = "projet_piscine";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {



    $mail = $_POST['mail'];
    $mdp = $_POST['password'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $num = $_POST['num'];
    $adresse = $_POST['adresse'];


    $sql = "select * from client where Mail = '$mail'";
    $result_client = mysqli_query($db_handle, $sql);
    $sql = "select * from coach where Mail = '$mail'";
    $result_coach = mysqli_query($db_handle, $sql);


    if (mysqli_num_rows($result_client) == 0 && mysqli_num_rows($result_coach) == 0) {
        $sql = "INSERT INTO `client` (`Mail`, `mdp`, `Nom`, `Prenom`, `ID`, `Adresse`, `carte`) VALUES ('$mail', '$mdp', '$nom', '$prenom', '1', '$adresse', '$num') ";
        $result = mysqli_query($db_handle, $sql);

        if ($result) {

            echo "<script> alert('inscription réussie'); window.location.href = 'Accueil.html'; </script>)";
            exit();
        } else {
            echo "Erreur lors de l'insertion des données : " . mysqli_error($db_handle);
        }
    }else{
        echo "<script> alert('adresse email deja utilisée'); window.location.href='sign_up.html';</script>";
        exit();
    }



} else {
    echo "database not found";
}

mysqli_close($db_handle);


?>


