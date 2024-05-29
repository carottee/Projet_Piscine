<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to login page if the user is not logged in
    echo "<script>alert(`vous n'êtes pas connecté`); window.location.href = 'sign_in_up.php' </script>";
exit();
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
    <br>
</div>

<br> <br>

<div id="votre-compte">
    <!-- zone de connexion -->
    <br>

    <?php
    $database = "projet_piscine";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {

        $user = $_SESSION['user'];

        // Accédez aux propriétés spécifiques de l'utilisateur
        $statut = $user['statut'];
        $mail = $user['mail'];

        if($statut == 0){ //client
            $sql = "select * from client where Mail = '$mail'";
        }
        else if($statut == 1){ //coach
            $sql = "select * from coach where Mail = '$mail'";
        }
        else if($statut == 2){ //admin
            $sql = "select * from admin where Mail = '$mail'";
        }

        $result = mysqli_query($db_handle, $sql);

        if($statut == 0){ //client
            while ($data = mysqli_fetch_assoc($result)){
                echo " <h1> <u> Mes informations</u> : </h1>";
                echo " <h5> ID (mail) : " . $data['Mail'] . "</h5>";
                echo " <h5> Mot de passe : " . $data['mdp'] . "</h5>";
                echo " <h5> Nom : ". $data['Nom'] . "</h5>";
                echo " <h5> Prénom : " . $data['Prenom'] . "</h5>";
                echo " <h5> ID : " . $data['ID'] . "</h5>";
                echo " <h5> Adresse : " . $data['Adresse'] . "</h5>";
                echo " <h5> Numéro de carte étudiante : " . $data['carte'] . "</h5>";
            }
        }
        else if($statut == 1){ //coach
            while ($data = mysqli_fetch_assoc($result)){
                echo " <h2>Mes informations : </h2>";
                echo " <h5> ID (mail) : " . $data['Mail'] . "</h5>" . "</h5>";
                echo " <h5> Mot de passe : " . $data['mdp'] . "</h5>";
                echo " <h5> Nom : " . $data['Nom'] . "<br>" . "</h5>";
                echo " <h5> Prénom : " . $data['Prenom'] . "</h5>";
                echo " <h5> Photo : " . $data['photo'] . "</h5>";
                echo " <h5> ID : " . $data['ID'] . "</h5>";
                echo " <h5> Discipline : " . $data['discipline'] . "</h5>";
                echo " <h5> CV : <embed src='" . $data['CV'] . "' type='application/pdf' width='100%' height='600px'><br>";    //    <embed src="chemin/vers/votre/fichier.pdf" type="application/pdf" width="100%" height="600px" />
                echo " <h5> Numéro : " . $data['num'] . "</h5>";
            }
        }
        else if($statut == 2){ //admin
            while ($data = mysqli_fetch_assoc($result)) {
                echo " <h2>Mes informations : </h2>";
                echo " <h5>ID (mail) : " . $data['Mail'] . "</h5>";
                echo " <h5> Mot de passe : " . $data['mdp'] . "</h5>";
                echo " <h5> Nom : " . $data['Nom'] . "</h5>";
            }
        }

    } else {
        echo "Database not found";
    }

    mysqli_close($db_handle);
    ?>

    <br><br>
    <button class="bouton" onclick="window.location.href='deconnexion.html'">Se déconnecter</button>
    <br><br><br>
</div>


</body>
</html>
