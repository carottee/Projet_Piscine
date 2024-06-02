<?php
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



if  ($db_found){

    $user = $_SESSION['user'];

    // Accédez aux propriétés spécifiques de l'utilisateur
    $statut = $user['statut'];
    $mail = $user['mail'];


if ($statut == 1) {

    $sql = "select * from coach where Mail = '$mail'";
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);
    $id = $data['ID'];


    $sql = "select * from edt where id_coach = '$id'";
    $result = mysqli_query($db_handle, $sql);

    $data = mysqli_fetch_assoc($result);
    $l = $data['l'];
    $ld = $data['ld'];
    $ma = $data['ma'];
    $mad = $data['mad'];
    $me = $data['me'];
    $med = $data['med'];
    $j = $data['j'];
    $jd = $data['jd'];
    $v = $data['v'];
    $vd = $data['vd'];
    $s = $data['s'];
    $sd = $data['sd'];


    function edt($variable)
    {

        if ($variable == '0') {
            return "white";
        } else if ($variable == '1') {
            return "orange";
        } else if ($variable == '2') {
            return "rouge";
        }
    }
}


}else {
    echo "Database not found";
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Votre Compte</title>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="header">
    <img src="logo_sportify.png" alt="voici le logo sportify" height="120" width="1350">
    <div class="right">
        <a href="sign_in_up.php"> <img src="account_circle_white.png" alt="voici le logo se connecter" height="60"
                                       width="60"> </a>
    </div>
</div>

<div id="navigation">
    <table class="t-nav"> <!--tableau onglets + cf CSS .t-nav-->
        <tr> <!--nouvelle ligne-->
            <td> <!--nouvelle colonne-->
                <a href="Accueil.html"><button class="bouton" id="accueil" type="button">  Accueil  </button></a>
            </td>
            <td>
                <a href="Tout_parcourir.html"><button class="bouton" id="parcourir" type="button">  Tout parcourir </button> </a>
            </td>
            <td>
                <a href="Recherche.html"><button class="bouton" id="recherche" type="button">  Recherche  </button></a>
            </td>
            <td>
                <a href="RDV.html"><button class="bouton" id="rdv" type="button">  RDV </button></a>
            </td>
            <td>
                <a href="Compte.php"><button class="bouton" id="compte" type="button">  Votre compte  </button></a>
            </td>
        </tr>
    </table>
    <br> <br>
</div>

<br> <br>

<div id="votre-compte">
    <!-- zone de connexion -->
    <br><br><br><br><br>
    <br><br><br><br><br>


    <?php


    if ($db_found) {

        $user = $_SESSION['user'];

        if ($statut == 0) { //client
            $sql = "select * from client where Mail = '$mail'";
        } else if ($statut == 1) { //coach
            $sql = "select * from coach where Mail = '$mail'";
        } else if ($statut == 2) { //admin
            $sql = "select * from admin where Mail = '$mail'";
        }

        $result = mysqli_query($db_handle, $sql);

        if ($statut == 0) { //client
            while ($data = mysqli_fetch_assoc($result)) {
                echo " <h1> <u> Mes informations</u> : </h1>";
                echo " <h5> ID (mail) : " . $data['Mail'] . "</h5>";
                echo " <h5> Mot de passe : " . $data['mdp'] . "</h5>";
                echo " <h5> Nom : " . $data['Nom'] . "</h5>";
                echo " <h5> Prénom : " . $data['Prenom'] . "</h5>";
                echo " <h5> Adresse : " . $data['Adresse'] . "</h5>";
                echo " <h5> Numéro de carte étudiante : " . $data['carte'] . "</h5>";
            }
        } else if ($statut == 1) { //coach

            echo "<h5>Mon planning :</h5>";

            echo "<div class='availability-table'>
        <table class='availability'>
            <tr>
                <th></th> <!-- Cellule vide pour l'alignement -->
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
                <th>Samedi</th>
            </tr>
            <tr>
                <td>Matin</td>
                <td class='" . edt($l) . " '></td>
                <td class='" . edt($ma) . "'></td>
                <td class='" . edt($me) . "'></td>
                <td class='" . edt($j) . "'></td>
                <td class='" . edt($v) . "'></td>
                <td class='" . edt($s) . "'></td>
            </tr>
            <tr>
                <td>Après-midi</td>
                <td class='" . edt($ld) . "'></td>
                <td class='" . edt($mad) . "'></td>
                <td class='" . edt($med) . "'></td>
                <td class='" . edt($jd) . "'></td>
                <td class='" . edt($vd) . "'></td>
                <td class='" . edt($sd) . "'></td>
            </tr>
            </table>
        </div>";
            echo "<br>";

            echo "<button class='bouton' id='valider' onclick='window.location.href=`frontEdition.php`'>Editer mon planning</button>";

            echo "<br>";echo "<br>";

            echo "<button class='bouton' onclick='window.location.href=`conversations.php`'>Mes chats</button>";


            while ($data = mysqli_fetch_assoc($result)) {

                echo " <h2>Mes informations : </h2>";
                echo " <h5> ID (mail) : " . $data['Mail'] . "</h5>" . "</h5>";
                echo " <h5> Mot de passe : " . $data['mdp'] . "</h5>";
                echo " <h5> Nom : " . $data['Nom'] . "<br>" . "</h5>";
                echo " <h5> Prénom : " . $data['Prenom'] . "</h5>";
                echo " <h5> Photo : " . $data['photo'] . "</h5>";
                echo " <h5> ID : " . $data['ID'] . "</h5>";
                echo " <h5> Discipline : " . $data['discipline'] . "</h5>";
                echo " <h5> Numéro : " . $data['num'] . "</h5>";
                echo " <h5> CV : <br> <br> <embed src='" . $data['CV'] . "' type='application/pdf' width='700' height='1010px'><br>";    //    <embed src="chemin/vers/votre/fichier.pdf" type="application/pdf" width="100%" height="600px" />
            }
        } else if ($statut == 2) { //admin
            while ($data = mysqli_fetch_assoc($result)) {
                echo " <h2>Mes informations : </h2>";
                echo " <h5>ID (mail) : " . $data['Mail'] . "</h5>";
                echo " <h5> Mot de passe : " . $data['mdp'] . "</h5>";
                echo " <h5> Nom : " . $data['Nom'] . "</h5>";
            }
        }
    }
    else {
        echo "Database not found";
    }

    mysqli_close($db_handle);
    ?>

    <br>
    <button class="bouton" id="valider" onclick="window.location.href='deconnexion.html'">Se déconnecter</button>
    <br>
</div>


</body>
</html>
