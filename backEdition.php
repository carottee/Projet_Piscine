<?php
session_start();
$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {

    $user = $_SESSION['user'];
    $mail = $user['mail'];

    $post_variables = ['l', 'ld', 'ma', 'mad', 'me', 'med', 'j', 'jd', 'v', 'vd', 's', 'sd'];


    $sql_id = "select ID from coach where Mail = '$mail'";
    $result_id = mysqli_query($db_handle, $sql_id);
    if ($result_id) {
        // Vérifie si y a une ligne de resultat
        if (mysqli_num_rows($result_id) > 0) {
            // Récupère la ligne de résultat
            $row = mysqli_fetch_assoc($result_id);
            $id = $row['ID'];

        }
    }


    $flag = 0;
    foreach ($post_variables as $var_name) {
        if (isset($_POST[$var_name])) {
            ${$var_name} = $_POST[$var_name];


            $sql = "SELECT * FROM rdv WHERE mail_coach = '$mail' AND creneau = '$var_name'";
            $result = mysqli_query($db_handle, $sql);

            // Vérifier si la requête a renvoyé des résultats. si c est le cas, le créneau est pris
            if (mysqli_num_rows($result) > 0) {

                echo " <script> alert('vous avez un rendez vous sur le créneau $var_name'); window.location.href='frontEdition.php'</script>  ";
                exit();
            }

            else{

                $sql = " UPDATE `edt` SET `$var_name` = '2' WHERE `edt`.`id_coach` = '$id' ";
                $result = mysqli_query($db_handle, $sql);

                if (!$result){$flag = 1;}
            }
        }
    }


    if ($flag == 0){
        echo " <script>alert('modification enregistrées'); window.location.href='Compte.php'</script> ";
        exit();
    }
    else{
        echo " <script>alert('something went wrong, try again'); window.location.href='frontEdition.php'</script> ";
        exit();
    }


} else {
    echo "Database not found";
}

mysqli_close($db_handle);
?>