<?php

$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);



if  ($db_found){


    $sport = $_POST['sport'];

    $sql = "select * from coach where discipline = '$sport'";
    $result = mysqli_query($db_handle, $sql);


if($result){
    if (mysqli_num_rows($result) > 0){

        $data = mysqli_fetch_assoc($result);
        $mail_coach = $data['Mail'];
        $nom = $data['Nom'];
        $prenom = $data['Prenom'];
        $photo = $data['photo'];
        $cv = $data['CV'];
        $num = $data['num'];
        $id = $data['ID'];



        $sql ="select * from edt where id_coach = '$id'";
        $result = mysqli_query($db_handle, $sql);

        $data = mysqli_fetch_assoc($result);
        $l = $data['l']; $ld = $data['ld'];
        $ma = $data['ma']; $mad = $data['mad'];
        $me = $data['me']; $med = $data['med'];
        $j = $data['j']; $jd = $data['jd'];
        $v = $data['v']; $vd = $data['vd'];
        $s = $data['s']; $sd = $data['sd'];

    }

}




    function edt($variable){

        if($variable == '0'){
            return "white";
        }else if($variable == '1') {
            return "orange";
        }else{
            return "rouge";
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
    <title>Fitness</title>
    <link href="styles.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<div id="header">
    <img src="logo_sportify.png" alt="voici le logo sportify" height="120" width="1350">
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
    <br><br>
</div>

<br>


<div class="breadcrumb">
    <a href="<?php

    if (@$sport == 'musculation' || @$sport == 'step' || @$sport == 'cardio' || $sport == 'courscollectifs' || @$sport == 'biking' || @$sport == 'fitness'){
        echo "activites_sportives.html";
    }else{echo "Les_sports_de_competitions.html";}
    ?>
"><?php

        if (@$sport == 'musculation' || @$sport == 'step' || @$sport == 'cardio' || @$sport == 'courscollectifs' || @$sport == 'biking' || @$sport == 'fitness'){
            echo "activites sportives";
        }else{echo "Les sports de competition";}
        ?></a> >  <?php echo "@$sport" ?>
</div>


<div class="coach-info-container">
    <div class="coach-info">
        <div class="coach-photo">
            <img src="<?php echo "@$photo" ?>" alt="Photo du coach">
        </div>
        <div class="coach-details">
            <p><span class="label"><?php echo "@$prenom  @$nom" ?></span></p>
            <p>Coach - <?php echo "@$sport" ?></p>
            <p>Tél : <?php echo "@$num" ?></p>
            <p>Email : <?php echo "@$mail_coach" ?></p>
        </div>
    </div>

    <div class="availability-table">
        <table class="availability">
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
                <td class=" <?= edt($l)?> "></td>
                <td class="<?= edt($ma)?>"></td>
                <td class="<?= edt($me)?>"></td>
                <td class="<?= edt($j)?>"></td>
                <td class="<?= edt($v)?>"></td>
                <td class="<?= edt($s)?>"></td>
            </tr>
            <tr>
                <td>Après-midi</td>
                <td class="<?= edt($ld)?>"></td>
                <td class="<?= edt($mad)?>"></td>
                <td class="<?= edt($med)?>"></td>
                <td class="<?= edt($jd)?>"></td>
                <td class="<?= edt($vd)?>"></td>
                <td class="<?= edt($sd)?>"></td>
            </tr>
        </table>
    </div>



    <!-- Boutons -->
    <div class="button-container">
        <table class="t-RDV">
            <tr>
                <td>
                    <form action="prendre_RDV.php" method="post"> <button class="bouton" type="submit" name="mail_coach" value="<?php echo "@$mail_coach";?>">Prendre RDV</button></form>

                </td>
                <td>
                    <form action="messages.php" method="post" > <button name="mail_coach" value="<?php echo "@$mail_coach";?>" class="bouton"> Chatroom </button> </form>
                </td>
                <td>
                    <a href="SDC/coatch-basket.jpg" target="_blank"> <button class="bouton">CV</button> </a>
                </td>
            </tr>
        </table>
    </div>

</div>
</body>
</html>

