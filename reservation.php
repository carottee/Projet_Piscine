<?php
session_start();
$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {

    $user = $_SESSION['user'];
    $statut = $user['statut'];
    $mail = $user['mail'];

    $post_variables = ['l', 'ld', 'ma', 'mad', 'me', 'med', 'j', 'jd', 'v', 'vd', 's', 'sd'];
    $mail_coach = $_POST['mail_coach'];

    $sql_id = "select ID from coach where Mail = '$mail_coach'";
    $result_id = mysqli_query($db_handle, $sql_id);
    if ($result_id) {
        // Vérifie si y a une ligne de resultat
        if (mysqli_num_rows($result_id) > 0) {
            // Récupère la ligne de résultat
            $row = mysqli_fetch_assoc($result_id);
            $id = $row['ID'];

        }
    }



    foreach ($post_variables as $var_name) {
        if (isset($_POST[$var_name])) {
            ${$var_name} = $_POST[$var_name];


            $escaped_value = mysqli_real_escape_string($db_handle, ${$var_name});

            $sql = "SELECT $var_name FROM edt WHERE id_coach = '$id' AND $var_name = '1'";
            $result = mysqli_query($db_handle, $sql);

            // Vérifier si la requête a renvoyé des résultats. si c est le cas, le créneau est pris
            if (mysqli_num_rows($result) > 0) {

                echo " <script> alert('ce créneau est invalide'); window.location.href='Prendre_RDV_basket.php'</script>  ";
                exit();
            }

            else{

                $sql = "UPDATE edt SET $var_name = 1 WHERE id_coach = '$id';";
                $result = mysqli_query($db_handle, $sql);

                $sql = "INSERT INTO rdv (mail_coach, mail_client, passe, creneau) VALUES ('$mail_coach', '$mail', '0', '$var_name')";
                $result=mysqli_query($db_handle, $sql);

                echo " <script> alert('rendez vous fixé'); window.location.href='RDV.php'</script> ";
                exit();



            }
        }
    }

    echo " <script> alert('stop fucking around please'); window.location.href='Tout_parcourir.html'</script> ";
    exit();









} else {
    echo "Database not found";
}

mysqli_close($db_handle);
?>