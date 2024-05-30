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
<html lang="en" xmlns:display="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Mes RDV</title>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <script src="animations.js" type="text/javascript"></script>
</head>

<body>

<div id="header">
    <img src="logo_sportify.png" alt = "voici le logo sportify" height = "120" width="1350">
    <div class="right">
        <a href="sign_in_up.php"> <img src="account_circle_white.png" alt="voici le logo se connecter" height="60" width="60"> </a>
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
                <a href="RDV.php"><button class="bouton" id="rdv" type="button">  RDV </button></a>
            </td>
            <td>
                <a href="Compte.php"><button class="bouton" id="compte" type="button">  Votre compte  </button></a>
            </td>
        </tr>
    </table>
    <br> <br>
</div>
<br> <br> <br>

<div>
    <h3>RDV à venir : </h3>

    <div class="RDV_venir">
        <h5>RDV 1</h5>
        <ul>
            <li>Coach</li>
            <li>Date/Heure</li>
            <li>Adresse</li>
            <li>Documents ajoutés</li>
            <li>Infos supp</li>
        </ul>
    </div>

    <div class="RDV_venir">
        <h5>RDV 2</h5>
        <ul>
            <li>Coach</li>
            <li>Date/Heure</li>
            <li>Adresse</li>
            <li>Documents ajoutés</li>
            <li>Infos supp</li>
        </ul>
    </div>

    <div class="RDV_venir">
        <h5>RDV 3</h5>
        <ul>
            <li>Coach</li>
            <li>Date/Heure</li>
            <li>Adresse</li>
            <li>Documents ajoutés</li>
            <li>Infos supp</li>
        </ul>
    </div>

    <div class="RDV_venir">
        <h5>RDV 4</h5>
        <ul>
            <li>Coach</li>
            <li>Date/Heure</li>
            <li>Adresse</li>
            <li>Documents ajoutés</li>
            <li>Infos supp</li>
        </ul>
    </div>

    <div class="RDV_venir">
        <h5>RDV 5</h5>
        <ul>
            <li>Coach</li>
            <li>Date/Heure</li>
            <li>Adresse</li>
            <li>Documents ajoutés</li>
            <li>Infos supp</li>
        </ul>
    </div>

</div>


<div>
    <h3>RDV passés : </h3>

    <center>

    <button type="button" class="RDV_passes" onclick="details_rdv_finis()">
        RDV 1
        <div id="detail_rdv_fini"> Cliquez pour voir le détail </div> <br>
    </button> <br> <br> <br>


    <button type="button" class="RDV_passes" onclick="details_rdv_finis()">
        RDV 2
        <div id="detail_rdv_fini2"> Cliquez pour voir le détail </div> <br>
    </button> <br> <br> <br>


    <button type="button" class="RDV_passes" onclick="details_rdv_finis()">
        RDV 3
        <div id="detail_rdv_fini3"> Cliquez pour voir le détail </div> <br>
    </button> <br> <br> <br>


    <button type="button" class="RDV_passes" onclick="details_rdv_finis()">
        RDV 4
        <div id="detail_rdv_fini4"> Cliquez pour voir le détail </div> <br>
    </button> <br> <br> <br>

    </center>

</div>


</body>
</html>