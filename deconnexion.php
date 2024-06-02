<?php

session_start();

$database = "projet_piscine";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {


    $mail = $_POST['mail'];
    $verif = "select * from session where mail = '$mail'";
    $res_verif = mysqli_query($db_handle, $verif);

    if (mysqli_num_rows($res_verif) != 0) {

        $_SESSION = [];
        session_unset();
        session_destroy();

        $sql = "delete from session where mail = '$mail'";
        $result = mysqli_query($db_handle, $sql);

    }else {echo " <script> alert('vous n`êtes pas connecté') </script> ";}


    echo " <script> window.location.href = 'sign_in_up.php' </script> ";


} else {
    echo "database not found";
}

mysqli_close($db_handle);

?>

