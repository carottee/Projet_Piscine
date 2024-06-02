<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to login page if the user is not logged in
    echo "<script>alert(`vous n'êtes pas connecté`); window.location.href = 'sign_in_up.php' </script>";
    exit();
}

$mail_coach = $_POST['mail_coach'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natation</title>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <style>
        .rectangle {
            background-color: #333; /* Dark gray background */
            border-radius: 25px; /* Rounded corners */
            padding: 20px; /* Padding inside the rectangle */
            display: flex; /* Flexbox for alignment */
            justify-content: space-around; /* Space around items */
            align-items: center; /* Center items vertically */
            width: 750px; /* Fixed width */
            margin: 50px auto; /* Center horizontally and margin with buttons */
            height: 150px;
        }

        .circle-container {
            text-align: center; /* Center text and image */
            color: white; /* Text color */
        }

        .circle-container img {
            border-radius: 50%; /* Make images round */
            width: 80px; /* Fixed width */
            height: 80px; /* Fixed height */
        }

        .circle-container img:hover{
            border: 4px solid orange; /* Modification de la taille de la bordure */

        }

        .circle-container p {
            margin-top: 10px; /* Space between image and text */
        }
    </style>
</head>
<body>

<div id="header">
    <img src="logo_sportify.png" alt="voici le logo sportify" height="120" width="1350">
    <div class="right">
        <a href="sign_in_up.html"> <img src="account_circle_white.png" alt="voici le logo se connecter" height="60" width="60"> </a>
    </div>
</div>

<div id="navigation">
    <table class="t-nav"> <!--tableau onglets + cf CSS .t-nav-->
        <tr> <!--nouvelle ligne-->
            <td> <!--nouvelle colonne-->
                <a href="Accueil.html"><button class="bouton" id="accueil" type="button">  Accueil  </button></a>
            </td>
            <td>
                <a href="Tout_parcourir.html"><button class="bouton-actuel" id="parcourir" type="button">  Tout parcourir </button> </a>
            </td>
            <td>
                <a href="Recherche.php"><button class="bouton" id="recherche" type="button">  Recherche  </button></a>
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

<div class="breadcrumb">
    <a href="Les_salles_dae_sport_OMNES.html">Les sports de compétitions</a> > <a href="Nos_services.html">Nos services</a>
</div>

<h2> Chatroom </h2>
<div class="rectangle">
    <div class="circle-container">
        <a href="messages.php?mail_coach=<?php echo urlencode($mail_coach); ?>">
            <img src="message.png" alt="Image 1">
            <p>Message</p>
        </a>
    </div>
    <div class="circle-container">
        <a href="appel.html">
            <img src="appel.png" alt="Image 2">
            <p>Téléphone</p>
        </a>
    </div>
    <div class="circle-container">
        <a href="video.html">
            <img src="video.png" alt="Image 3">
            <p>Visio</p>
        </a>
    </div>
    <div class="circle-container">
        <a href ="email.html">
            <img src="email.png" alt="Image 4">
            <p>Mail</p>
        </a>
    </div>
    <div class="circle-container">
        <a href="vocal.html">
            <img src="vocal.png" alt="Image 5">
            <p>Vocal</p>
        </a>
    </div>
</div>


<br><br><br><br>
<div id="footer" style="display: flex; justify-content: space-between;">


    <ul>
        <h3>Nous contacter </h3>
        <li> Téléphone : <u> (+33) 06 05 04 03 02 </u> </li>
        <li> Email : <a href = "mailto.sportify@gmail.com"> sportify@gmail.com </a> </li>
        <li> Sur place : <address> 43 Quai de Grenelle, 75015 Paris </address> </li>
    </ul>

    <div class="right">
        <!--carte google maps insérée--> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5250.725751806412!2d2.2838522762051072!3d48.85129037133122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670049543178d%3A0xcda73a49149d471f!2sOMNES%20Education!5e0!3m2!1sfr!2sfr!4v1716841516349!5m2!1sfr!2sfr" width="800" height="300" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</div>

</body>
</html>