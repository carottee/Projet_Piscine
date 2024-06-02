<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paiement</title>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .rectangle {
            background-color: #333; /* Fond gris foncé */
            border: 4px solid orange; /* Bordure orange */
            border-radius: 25px; /* Coins arrondis */
            padding: 20px; /* Padding à l'intérieur du rectangle */
            width: 50%; /* Largeur du rectangle */
            margin: 50px auto; /* Centré horizontalement avec marges */
            color: white; /* Couleur du texte */
            font-family: Arial, sans-serif; /* Police de caractères */
            text-align: center; /* Texte centré */
        }

        .rectangle h3 {
            color: orange; /* Couleur du titre */
            text-align: center; /* Titre centré */
        }

        .rectangle label {
            display: block;
            margin: 10px 0 5px;
        }

        .rectangle input[type="text"], .rectangle input[type="email"], .rectangle input[type="number"] {
            width: 80%;
            padding: 10px;
            margin: 5px 0 20px;
            box-sizing: border-box;
            border: 2px solid orange;
            border-radius: 5px;
        }

        .rectangle input[type="submit"] {
            background-color: orange;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 20px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div id="header">
    <img src="logo_sportify.png" alt="voici le logo sportify" height="120" width="1350">
    <div class="right">
        <a href="sign_in_up.html"> <img src="account_circle_white.png" alt="voici le logo se connecter" height="60"
                                        width="60"> </a>
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
                    <button class="bouton-actuel" id="parcourir" type="button"> Tout parcourir</button>
                </a>
            </td>
            <td>
                <a href="Recherche.php">
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

<div class="breadcrumb">
    <a href="Les_salles_de_sport_OMNES.html">Les salles de sport OMNES</a> > <a href="Nos_services.html">Nos services</a> > Paiement
</div>

<!-- Payment rectangle section -->
<div class="rectangle">
    <h3>Page de Paiement</h3>

    <?php
    // Database connection
    $database = "projet_piscine";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        $id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
        $sql = "SELECT * FROM offre WHERE ID = '$id'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            $image = $data['image'];
            $prix = $data['price'];
            $nom = $data['name'];

            echo "<h4><br>$nom - $prix</h4>";
        } else {
            echo "<p>Produit non trouvé</p>";
        }
    } else {
        echo "<p>Base de données non trouvée</p>";
    }
    ?>
<br><br>

    <form action="confirmation.php" method="post">
        <label for="name">Nom Complet :</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="address">Adresse :</label>
        <input type="text" id="address" name="address" required>

        <label for="card">Numéro de Carte :</label>
        <input type="number" id="card" name="card" required>

        <label for="expiry">Date d'Expiration :</label>
        <input type="text" id="expiry" name="expiry" placeholder="MM/AA" required>

        <label for="cryptogramme de sécurité">CVV :</label>
        <input type="number" id="cvv" name="cvv" required>

        <input type="hidden" name="prix" value="<?php echo $prix ?>">
        <input type="hidden" name="id" value="<?php  $id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0; echo $id ?>">
        <button type="submit"> Valider</button>
    </form>
</div>

</body>
</html>
