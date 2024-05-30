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

if ($db_found) {

    $user = $_SESSION['user'];
    $mail = $user['mail'];

    $sql = "select ID from coach where Mail = '$mail'";
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result)>0){
        $data = mysqli_fetch_assoc($result);
        $id = $data['ID'];
    }


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prendre RDV basket</title>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <script>
        // Fonction pour modifier la valeur des cases à cocher avant la soumission du formulaire
        function valeur_check(checkbox) {
            if (!checkbox.checked) {
                checkbox.value = "0"; // Si la case n'est pas cochée, la valeur est 0
            } else {
                checkbox.value = "1"; // Si la case est cochée, la valeur est 1
            }
        }
    </script>
</head>

<body>
<div id="header">
    <img src="logo_sportify.png" alt="voici le logo sportify" height="120" width="1350">
    <div class="right">
        <a href="sign_in_up.php">
            <img src="account_circle_white.png" alt="voici le logo se connecter" height="60" width="60">
        </a>
    </div>
</div>
<div id="navigation">
    <table class="t-nav"> <!--tableau onglets + cf CSS .t-nav-->
        <tr> <!--nouvelle ligne-->
            <td> <!--nouvelle colonne-->
                <a href="Accueil.html">
                    <button class="bouton" id="accueil" type="button"> Accueil</button>
                </a>
            </td>
            <td>
                <a href="Tout_parcourir.html">
                    <button class="bouton" id="parcourir" type="button"> Tout parcourir</button>
                </a>
            </td>
            <td>
                <a href="Recherche.html">
                    <button class="bouton" id="recherche" type="button"> Recherche</button>
                </a>
            </td>
            <td>
                <a href="RDV.php">
                    <button class="bouton" id="rdv" type="button"> RDV</button>
                </a>
            </td>
            <td>
                <a href="Compte.php">
                    <button class="bouton" id="compte" type="button"> Votre compte</button>
                </a>
            </td>
        </tr>
    </table>
    <br> <br>
</div>

<br>


<!-- Contenu principal -->
<div class="availability-container">


    <!-- Availability Table -->
    <div class="availability-table">
        <h2>Mon planning</h2>
        <p>selectionner les créneau sur lesquels vous n'étes pas libre</p>
        <form action="backEdition.php" method="post">
            <table class="availability">
                <thead>
                <tr>
                    <th></th>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                    <th>Samedi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Matin</td>
                    <td class="availability-cell"><input type="checkbox" id="l" name="l" onchange="valeur_check(this)"></td>
                    <td class="availability-cell"><input type="checkbox" id="ma"  name="ma" onchange="valeur_check(this)"</td>
                    <td class="availability-cell"><input type="checkbox" id="me" name="me"  onchange="valeur_check(this)"></td>
                    <td class="availability-cell"><input type="checkbox" id="j"  name="j"  onchange="valeur_check(this)"></td>
                    <td class="availability-cell"><input type="checkbox" id="v"  name="v"  onchange="valeur_check(this)"></td>
                    <td class="availability-cell"><input type="checkbox" id="s"  name="s"  onchange="valeur_check(this)"></td>
                </tr>
                <tr>
                    <td>Après-midi</td>
                    <td class="availability-cell"><input type="checkbox" id="ld" name="ld"   onchange="valeur_check(this)"></td>
                    <td class="availability-cell"><input type="checkbox" id="mad"  name="mad"  onchange="valeur_check(this)"></td>
                    <td class="availability-cell"><input type="checkbox" id="med" name="med"   onchange="valeur_check(this)" ></td>
                    <td class="availability-cell"><input type="checkbox" id="jd"  name="jd"   onchange="valeur_check(this)"></td>
                    <td class="availability-cell"><input type="checkbox" id="vd"  name="vd"   onchange="valeur_check(this)"></td>
                    <td class="availability-cell"><input type="checkbox" id="sd"  name="sd"  onchange="valeur_check(this)"></td>
                </tr>
                </tbody>
            </table>
            <button class="bouton" type="submit">Valider modification</button>
        </form>


    </div>


</div>






</body>
</html>
