<?php

@$keywords = $_GET['keywords'];
@$valider  = $_GET['valider'];


if (isset($valider) && trim($keywords) !== '') {
    $words = explode(" ", trim($keywords));
    for ($i=0; $i<count($words); $i++){
        $kw[$i] = "discipline like '%".$words[$i]."%' or Nom like '%".$words[$i]."%' or Prenom like '%".$words[$i]."%' or Mail like '%".$words[$i]."%'";
    }

$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if ($db_found) {

    $sql = "select * from coach where ".implode(" or ",$kw);
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result)>0) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $afficher = 1;
    }


}

}else {
    $afficher = 0;
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Recherche</title>
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
  <br> <br>
</div>
<br> <br> <br>


<form action="" method="get" name="fo">
<div class="recherche" style="display: flex; justify-content: center;">
  <input type="text" class="search-bar" name="keywords" value="<?php echo $keywords ?>" placeholder="Rechercher...">
  <button type="submit" name="valider" class="loupe">🔍</button>
</div>
</form>

<?php if (@$afficher == 1){ ?>
<div id="resultat">
<div id="nbr"><?=count($data)." ".(count($data)>1? "résultats trouvés" : "résultat trouvé") ?> </div>

    <ol>
        <?php foreach ($data as $row) { ?>
            <li><?php echo htmlspecialchars($row['Nom']) . " " . htmlspecialchars($row['Prenom']) . " - " . htmlspecialchars($row['discipline']) . " - " . htmlspecialchars($row['Mail']); ?></li>
        <?php } ?>
    </ol>

</div>

<?php } ?>


<?php if (@$afficher == 0){ ?>
    <div id="resultat">

        <p> aucun résultat trouvé</p>

    </div>

<?php } ?>


<br> <br> <br> <br> <br> <br>

<div id="footer" style="display: flex; justify-content: space-between;">


  <ul>
    <h3>Nous contacter </h3>
    <li> Téléphone : <u> (+33) 06 05 04 03 02 </u> </li>
    <li> Email : <a href = "mailto.sportify@gmail.com"> sportify@gmail.com </a> </li>
    <li> Sur place : <address> 43 Quai de Grenelle, 75015 Paris </address> </li>
  </ul>

  <div class="right">
    <!--carte google maps insérée--> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5250.725751806412!2d2.2838522762051072!3d48.85129037133122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670049543178d%3A0xcda73a49149d471f!2sOMNES%20Education!5e0!3m2!1sfr!2sfr!4v1716841516349!5m2!1sfr!2sfr" width="800" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

</div>

</body>
</html>
