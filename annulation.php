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
if ($db_found){

    $user = $_SESSION['user'];
    $mail = $user['mail'];
    $statut = $user['statut'];


    $id = $_POST['ID_rdv'];


    $sql = " select * from rdv where ID = '$id'";
    $result = mysqli_query($db_handle, $sql);


    if ($result){
        if(mysqli_num_rows($result)>0){
            $data = mysqli_fetch_assoc($result);
            $mail_coach = $data['mail_coach'];
            $mail_client = $data['mail_client'];
            $creneau = $data['creneau'];


            $sql = " delete from rdv where ID =  '$id'";
            $result = mysqli_query($db_handle, $sql);


            $sql = "select ID from coach where Mail = '$mail_coach'";
            $result = mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_assoc($result);
            $id_coach = $data['ID'];





            $sql = "update edt set $creneau = '0' where id_coach = '$id_coach'  and $creneau = '1'";
            $result = mysqli_query($db_handle, $sql);
        }
    }





}


?>
