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
    <br> <br>
</div>
<div id="votre-compte">
    <!-- zone de connexion -->
    <br><br><br><br><br>
    <br><br><br><br><br>


    <?php
    $database = "projet_piscine";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {

        $user = $_SESSION['user'];

        // Accédez aux propriétés spécifiques de l'utilisateur
        $statut = $user['statut'];
        $mail = $user['mail'];

        if($statut == 0){
            $sql = "select * from client where Mail = '$mail'";
        }
        else if($statut == 1){
            $sql = "select * from coach where Mail = '$mail'";
        }
        else if($statut == 2){
            $sql = "select * from admin where Mail = '$mail'";
        }

        $result = mysqli_query($db_handle, $sql);

        if($statut == 0){
            while ($data = mysqli_fetch_assoc($result)){
                echo " <h1>ID: " . $data['Mail']. "</h1>" . "<br>";
                echo "mot de passe: " . $data['mdp'] . "<br>";
                echo "Nom: " . $data['Nom'] . "<br>";
                echo "Prenom: " . $data['Prenom'] . "<br>";
                echo "ID: " . $data['ID'] . "<br>";
                echo "Adresse: " . $data['Adresse'] . "<br>";
                echo "numéro de carte étudiante: " . $data['carte'] . "<br>";

                echo "<br>";
                echo "<br>";
                echo "<br>";
            }
        }
        else if($statut == 1){
            while ($data = mysqli_fetch_assoc($result)){
                echo " <h1>ID: " . $data['Mail']. "</h1>" . "<br>";
                echo "mot de passe: " . $data['mdp'] . "<br>";
                echo "Nom: " . $data['Nom'] . "<br>";
                echo "Prénom: " . $data['Prenom'] . "<br>";
                echo "photo: " . $data['photo'] . "<br>";
                echo "ID: " . $data['ID'] . "<br>";
                echo "discipline: " . $data['discipline'] . "<br>";
                echo "CV: <embed src='" . $data['CV'] . "' type='application/pdf' width='100%' height='600px'><br>";    //    <embed src="chemin/vers/votre/fichier.pdf" type="application/pdf" width="100%" height="600px" />
                echo "numéro: " . $data['num'] . "<br>";

                echo "<br>";
                echo "<br>";
                echo "<br>";
            }
        }
        else if($statut == 2){
            while ($data = mysqli_fetch_assoc($result)) {
                echo " <h1>ID: " . $data['Mail']. "</h1>" . "<br>";
                echo "mot de passe: " . $data['mdp'] . "<br>";
                echo "Nom: " . $data['Nom'] . "<br>";


                echo "<br>";
                echo "<br>";
                echo "<br>";
            }
        }

    } else {
        echo "Database not found";
    }

    mysqli_close($db_handle);
    ?>



    <br><br><br><br><br>
    <button onclick="window.location.href='deconnexion.html'">se deconnecter</button>
    <br><br><br><br><br>
</div>


</body>
</html>
