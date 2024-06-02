<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <script src="animations.js" type="text/javascript"></script>
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
</div>
<br> <br> <br>
<div id="votre-compte">
    <!-- zone de connexion -->

    <form action="deconnexion.php" method="POST">
        <h2>Déconnexion</h2>
        <h4>Assurons nous de votre identité</h4>
        <br>
        <h4><b>Email</b></h4>
        <input type="text" placeholder="Entrer l'adresse email" name="mail" id="mail" required>

        <br><br>

        <h4><b>Mot de passe</b></h4>
        <input type="password" placeholder="Entrer le mot de passe" name="password" id="password" required>

        <br><br>


        <input type="submit" id='submit' value='SE DECONNECTER'>



    </form>




</div>
</body>
</html>