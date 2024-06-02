
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to login page if the user is not logged in
    echo "<script>alert(`vous n'êtes pas connecté`); window.location.href = 'sign_in_up.php' </script>";
    exit();
}

$mail_rec = isset($_GET['mail_client']) ? filter_var($_GET['mail_client'], FILTER_SANITIZE_EMAIL) : 0;

$user = $_SESSION['user'];
$mail_env = $user['mail'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatroom</title>
    <link href="styles.css" rel="stylesheet" type="text/css"/>

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
<br>
<br> <br>

<div class="breadcrumb">
    <a href="Les_salles_de_sport_OMNES.html">Les sports de compétitions</a> > <a href="Nos_services.html">Nos services</a>
</div>



<div id="conv">

    <?php

    $database = "projet_piscine";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);



    if ($db_found) {
        // Requête pour obtenir le nombre de conversations distinctes et les adresses e-mail des interlocuteurs
        $sql = "SELECT user1, user2
            FROM (
                SELECT DISTINCT LEAST(mail_env, mail_dest) AS user1, GREATEST(mail_env, mail_dest) AS user2
                FROM messages
                WHERE mail_env = '$mail_env' OR mail_dest = '$mail_env'
            ) AS conv_unique";

        $result = mysqli_query($db_handle, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            // Initialiser un compteur pour les conversations
            $nb_conv = 0;

            // Initialiser un tableau pour stocker les interlocuteurs
            $interlocutors = [];

            // Parcourir les résultats
            while ($data = mysqli_fetch_assoc($result)) {
                $nb_conv++;
                if ($data['user1'] == $mail_env) {
                    $interlocutors[] = $data['user2'];
                } else {
                    $interlocutors[] = $data['user1'];
                }
            }

            // Afficher le nombre de conversations distinctes


            // Afficher les adresses e-mail des interlocuteurs
            echo "Interlocuteurs :<br>";
            foreach ($interlocutors as $interlocutor) {
                $sql = "select * from client where Mail = '$interlocutor'";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $nom = $data['Nom'];
                $prenom = $data['Prenom'];
                echo "    <a href='conversations.php?mail_client=".$interlocutor."'><button>  ".$prenom." " .$nom."  </button></a>";
                echo "<br>";
            }
        }else {
            echo " Vous n'avez pas de conversation pour le moment.";
        }
    }


    ?>




</div>







<?php
if ($mail_rec != 0) {?>
<center>


    <div class="menu-deroulant">
        <div id="affichage_conv">
            <?php



            if ($db_found) {



                    $sql = "select * from messages where mail_dest = '$mail_rec' and mail_env = '$mail_env' or  mail_dest = '$mail_env' and mail_env = '$mail_rec'";
                    $result = mysqli_query($db_handle, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($data = mysqli_fetch_assoc($result)) {
                            $contenu = $data['message'];
                            $time = $data['timestamp'];
                            $dest = $data['mail_dest'];
                            $env = $data['mail_env'];
                            if ($env == $mail_env) {
                                echo "  <div class='message message-envoye'>
                                    <div class='contenu-message'>
                                        <p>" . $contenu . "</p>
                                        <img class='profil' src='coatch-basket.jpg' alt='Photo de profil utilisateur 1' style='margin-left: 10px'>
                                    </div>
                                </div>";
                            } else {

                                echo " <div class='message message-recu'>
                                <div class='contenu-message'>
                                    <img class='profil' src='coatch-musculation.jpg' alt='Photo de profil utilisateur 1' style='margin-right: 10px'>
                                    <p>" . $contenu . "</p>
                                </div>
                                
                            </div>";
                            }
                        }
                    }

            }


            ?>
        </div>
    </div>

</center>




<center>
    <div id="chat">
        <div id="messages"></div>
        <form id="message-form" method="post" action="envoie_message.php">
            <input type="text" id="message-input"  name="contenu" placeholder="Entrez votre message...">
            <input type="hidden" id="expediteur-id" name="mail_env" value="<?php echo "$mail_env";?>"> <!-- ID de l'utilisateur connecté -->
            <input type="hidden" id="destinataire-id" name="mail_rec" value="<?php echo "$mail_rec";?>"> <!-- ID du coach -->
            <input type="hidden" name="sens" value="1"> <!-- ID du coach -->
            <input type="submit" value="Envoyer">
        </form>
    </div>
</center>
<?php } ?>
</body>
</html>
