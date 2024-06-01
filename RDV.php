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

$user = $_SESSION['user'];
$mail = $user['mail'];
$statut = $user['statut'];

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

    <?php



    if($db_found){



        if($statut == 0){
            $sql = "select * from rdv where mail_client = '$mail'";
            $result_rdv_client = mysqli_query($db_handle, $sql);
            $cpt = 1;
            if(mysqli_num_rows($result_rdv_client) > 0) {
                while ($data = mysqli_fetch_assoc($result_rdv_client)){
                    $mail_coach = $data['mail_coach'];
                    $creneau = $data['creneau'];
                    $passe = $data['passe'];
                    $ID_rdv = $data['ID'];


                    // Détermine le jour et l'horaire selon le créneau
                    if($creneau == 'l') {$jour='lundi'; $horraire='matin';}
                    if($creneau == 'ld') {$jour='lundi'; $horraire='après midi';}
                    if($creneau == 'ma') {$jour='mardi'; $horraire='matin';}
                    if($creneau == 'mad') {$jour='mardi'; $horraire='après midi';}
                    if($creneau == 'me') {$jour='mercredi'; $horraire='matin';}
                    if($creneau == 'med') {$jour='mercredi'; $horraire='après midi';}
                    if($creneau == 'j') {$jour='jeudi'; $horraire='matin';}
                    if($creneau == 'jd') {$jour='jeudi'; $horraire='après midi';}
                    if($creneau == 'v') {$jour='vendredi'; $horraire='matin';}
                    if($creneau == 'vd') {$jour='vendredi'; $horraire='après midi';}
                    if($creneau == 's') {$jour='samedi'; $horraire='matin';}
                    if($creneau == 'sd') {$jour='samedi'; $horraire='après midi';}

                    // Requête pour obtenir le prénom et le nom du client
                    $sql_prenom_coach = "select Prenom, Nom from coach where Mail = '$mail_coach'";
                    $result_prenom_coach = mysqli_query($db_handle, $sql_prenom_coach);
                    if ($result_prenom_coach) {
                        // Vérifie s'il y a une ligne de résultat
                        if (mysqli_num_rows($result_prenom_coach) > 0) {
                            // Récupère la ligne de résultat
                            $row = mysqli_fetch_assoc($result_prenom_coach);
                            $prenom_coach = $row['Prenom'];
                            $nom_coach = $row['Nom'];
                        }
                    }

                    // Requête pour obtenir le prénom du coach
                    $sql_prenom = "select Prenom from client where Mail = '$mail'";
                    $result_prenom = mysqli_query($db_handle, $sql_prenom);
                    if ($result_prenom) {
                        // Vérifie s'il y a une ligne de résultat
                        if (mysqli_num_rows($result_prenom) > 0) {
                            // Récupère la ligne de résultat
                            $row = mysqli_fetch_assoc($result_prenom);
                            $prenom = $row['Prenom'];
                        }
                    }

                    if ($passe == 0) {
                        echo "<div class='RDV_venir'>";
                        echo "<h5>RDV $cpt</h5>";
                        echo "<ul>";
                        echo "<li>" . $prenom_coach . " " . $nom_coach . "</li>";
                        echo "<li>" . $jour . " " . $horraire . "</li>";
                        echo "</ul>";
                        echo " <center><form action='annulation.php' method='post'>  <button class='bouton' id='annuler' name='ID_rdv' value='$ID_rdv'>Annuler</button></form></center>";
                        echo "</div>";
                        $cpt++;
                    }

                }
            } else {
                echo "vous n'avez pas encore de rendez-vous";
            }

        }
        else if($statut == 1){
            $sql = "select * from rdv where mail_coach = '$mail'";
            $result_rdv_coach = mysqli_query($db_handle, $sql);
            $cpt = 1;
            if(mysqli_num_rows($result_rdv_coach) > 0) {
                while ($data = mysqli_fetch_assoc($result_rdv_coach)){
                    $mail_client = $data['mail_client'];
                    $creneau = $data['creneau'];
                    $passe = $data['passe'];
                    $ID_rdv = $data['ID'];


                    // Détermine le jour et l'horaire selon le créneau
                    if($creneau == 'l') {$jour='lundi'; $horraire='matin';}
                    if($creneau == 'ld') {$jour='lundi'; $horraire='après midi';}
                    if($creneau == 'ma') {$jour='mardi'; $horraire='matin';}
                    if($creneau == 'mad') {$jour='mardi'; $horraire='après midi';}
                    if($creneau == 'me') {$jour='mercredi'; $horraire='matin';}
                    if($creneau == 'med') {$jour='mercredi'; $horraire='après midi';}
                    if($creneau == 'j') {$jour='jeudi'; $horraire='matin';}
                    if($creneau == 'jd') {$jour='jeudi'; $horraire='après midi';}
                    if($creneau == 'v') {$jour='vendredi'; $horraire='matin';}
                    if($creneau == 'vd') {$jour='vendredi'; $horraire='après midi';}
                    if($creneau == 's') {$jour='samedi'; $horraire='matin';}
                    if($creneau == 'sd') {$jour='samedi'; $horraire='après midi';}

                    // Requête pour obtenir le prénom et le nom du client
                    $sql_prenom_client = "select Prenom, Nom from client where Mail = '$mail_client'";
                    $result_prenom_client = mysqli_query($db_handle, $sql_prenom_client);
                    if ($result_prenom_client) {
                        // Vérifie s'il y a une ligne de résultat
                        if (mysqli_num_rows($result_prenom_client) > 0) {
                            // Récupère la ligne de résultat
                            $row = mysqli_fetch_assoc($result_prenom_client);
                            $prenom_client = $row['Prenom'];
                            $nom_client = $row['Nom'];
                        }
                    }

                    // Requête pour obtenir le prénom du coach
                    $sql_prenom = "select Prenom from coach where Mail = '$mail'";
                    $result_prenom = mysqli_query($db_handle, $sql_prenom);
                    if ($result_prenom) {
                        // Vérifie s'il y a une ligne de résultat
                        if (mysqli_num_rows($result_prenom) > 0) {
                            // Récupère la ligne de résultat
                            $row = mysqli_fetch_assoc($result_prenom);
                            $prenom = $row['Prenom'];
                        }
                    }

                    if ($passe == 0){
                        echo "<div class='RDV_venir'>";
                        echo "<h5>RDV $cpt</h5>";
                        echo "<ul>";
                        echo "<li>" . $prenom_client . " " . $nom_client . "</li>";
                        echo "<li>" . $jour . " " . $horraire . "</li>";
                        echo "</ul>";
                        echo " <center><form action='annulation.php' method='post'>  <button class='bouton' id='annuler' name='ID_rdv' value='$ID_rdv'>Annuler</button></form></center>";
                        echo "</div>";
                        $cpt++;
                    }
                }
            } else {
                echo "vous n'avez pas encore de rendez-vous";
            }
        }




    }
    ?>


</div>







<div>
    <h3>RDV passés : </h3>

        <?php

        if($db_found){





            if($statut == 0){
                $sql = "select * from rdv where mail_client = '$mail'";
                $result_rdv_client = mysqli_query($db_handle, $sql);
                $cpt = 1;
                if(mysqli_num_rows($result_rdv_client) > 0) {
                    while ($data = mysqli_fetch_assoc($result_rdv_client)){
                        $mail_coach = $data['mail_coach'];
                        $creneau = $data['creneau'];
                        $passe = $data['passe'];


                        // Détermine le jour et l'horaire selon le créneau
                        if($creneau == 'l') {$jour='lundi'; $horraire='matin';}
                        if($creneau == 'ld') {$jour='lundi'; $horraire='après midi';}
                        if($creneau == 'ma') {$jour='mardi'; $horraire='matin';}
                        if($creneau == 'mad') {$jour='mardi'; $horraire='après midi';}
                        if($creneau == 'me') {$jour='mercredi'; $horraire='matin';}
                        if($creneau == 'med') {$jour='mercredi'; $horraire='après midi';}
                        if($creneau == 'j') {$jour='jeudi'; $horraire='matin';}
                        if($creneau == 'jd') {$jour='jeudi'; $horraire='après midi';}
                        if($creneau == 'v') {$jour='vendredi'; $horraire='matin';}
                        if($creneau == 'vd') {$jour='vendredi'; $horraire='après midi';}
                        if($creneau == 's') {$jour='samedi'; $horraire='matin';}
                        if($creneau == 'sd') {$jour='samedi'; $horraire='après midi';}

                        // Requête pour obtenir le prénom et le nom du client
                        $sql_prenom_coach = "select Prenom, Nom from coach where Mail = '$mail_coach'";
                        $result_prenom_coach = mysqli_query($db_handle, $sql_prenom_coach);
                        if ($result_prenom_coach) {
                            // Vérifie s'il y a une ligne de résultat
                            if (mysqli_num_rows($result_prenom_coach) > 0) {
                                // Récupère la ligne de résultat
                                $row = mysqli_fetch_assoc($result_prenom_coach);
                                $prenom_coach = $row['Prenom'];
                                $nom_coach = $row['Nom'];
                            }
                        }

                        // Requête pour obtenir le prénom du coach
                        $sql_prenom = "select Prenom from client where Mail = '$mail'";
                        $result_prenom = mysqli_query($db_handle, $sql_prenom);
                        if ($result_prenom) {
                            // Vérifie s'il y a une ligne de résultat
                            if (mysqli_num_rows($result_prenom) > 0) {
                                // Récupère la ligne de résultat
                                $row = mysqli_fetch_assoc($result_prenom);
                                $prenom = $row['Prenom'];
                            }
                        }

                        if ($passe == 1) {
                            echo "<div type='button' class='RDV_passes''>";
                            echo "<h5>RDV passé $cpt</h5>";
                            echo "<ul>";
                            echo "<li>" . $prenom_coach . " " . $nom_coach . "</li>";
                            echo "<li>" . $jour . " " . $horraire . "</li>";
                            echo "</ul>";
                            echo " <button>Annuler</button>";
                            echo "</div> <br> <br> <br>";
                            $cpt++;
                        }

                    }
                } else {
                    echo "vous n'avez pas encore de rendez-vous";
                }

            }
            else if($statut == 1){
                $sql = "select * from rdv where mail_coach = '$mail'";
                $result_rdv_coach = mysqli_query($db_handle, $sql);
                $cpt = 1;
                if(mysqli_num_rows($result_rdv_coach) > 0) {
                    while ($data = mysqli_fetch_assoc($result_rdv_coach)){
                        $mail_client = $data['mail_client'];
                        $creneau = $data['creneau'];
                        $passe = $data['passe'];


                        // Détermine le jour et l'horaire selon le créneau
                        if($creneau == 'l') {$jour='lundi'; $horraire='matin';}
                        if($creneau == 'ld') {$jour='lundi'; $horraire='après midi';}
                        if($creneau == 'ma') {$jour='mardi'; $horraire='matin';}
                        if($creneau == 'mad') {$jour='mardi'; $horraire='après midi';}
                        if($creneau == 'me') {$jour='mercredi'; $horraire='matin';}
                        if($creneau == 'med') {$jour='mercredi'; $horraire='après midi';}
                        if($creneau == 'j') {$jour='jeudi'; $horraire='matin';}
                        if($creneau == 'jd') {$jour='jeudi'; $horraire='après midi';}
                        if($creneau == 'v') {$jour='vendredi'; $horraire='matin';}
                        if($creneau == 'vd') {$jour='vendredi'; $horraire='après midi';}
                        if($creneau == 's') {$jour='samedi'; $horraire='matin';}
                        if($creneau == 'sd') {$jour='samedi'; $horraire='après midi';}

                        // Requête pour obtenir le prénom et le nom du client
                        $sql_prenom_client = "select Prenom, Nom from client where Mail = '$mail_client'";
                        $result_prenom_client = mysqli_query($db_handle, $sql_prenom_client);
                        if ($result_prenom_client) {
                            // Vérifie s'il y a une ligne de résultat
                            if (mysqli_num_rows($result_prenom_client) > 0) {
                                // Récupère la ligne de résultat
                                $row = mysqli_fetch_assoc($result_prenom_client);
                                $prenom_client = $row['Prenom'];
                                $nom_client = $row['Nom'];
                            }
                        }

                        // Requête pour obtenir le prénom du coach
                        $sql_prenom = "select Prenom from coach where Mail = '$mail'";
                        $result_prenom = mysqli_query($db_handle, $sql_prenom);
                        if ($result_prenom) {
                            // Vérifie s'il y a une ligne de résultat
                            if (mysqli_num_rows($result_prenom) > 0) {
                                // Récupère la ligne de résultat
                                $row = mysqli_fetch_assoc($result_prenom);
                                $prenom = $row['Prenom'];
                            }
                        }

                        if ($passe == 1) {
                            echo "<div type='button' class='RDV_passes''>";
                            echo "<h5>RDV passé $cpt</h5>";
                            echo "<li>" . $prenom_client . " " . $nom_client . "</li>";
                            echo "<li>" . $jour . " " . $horraire . "</li>";
                            echo "</ul>";
                            echo " <button>annuler</button>  ";
                            echo "</div> <br> <br> <br>";
                            $cpt++;
                        }

                    }
                } else {
                    echo "vous n'avez pas encore de rendez-vous";
                }
            }

        }
        ?>



   <!-- <button type="button" class="RDV_passes" onclick="details_rdv_finis()">
        RDV 4
        <div id="detail_rdv_fini4"> Cliquez pour voir le détail </div> <br>
    </button> <br> <br> <br>-->


</div>


</body>
</html>