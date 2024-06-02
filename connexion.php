
<?php

session_start();

$database = "projet_piscine";

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {


    $mail = $_POST['mail'];
    $mdp = $_POST['password'];


    $sql_client = "select * from client where Mail = '$mail' and mdp = '$mdp'";
    $sql_coach = "select * from coach where Mail = '$mail' and mdp = '$mdp'";
    $sql_admin = "select * from admin where Mail = '$mail' and mdp = '$mdp'";

    $result_client = mysqli_query($db_handle, $sql_client);
    $result_coach = mysqli_query($db_handle, $sql_coach);
    $result_admin = mysqli_query($db_handle, $sql_admin);

    // statut 0: client, 1: coach, 2: admin
    if(mysqli_num_rows($result_client) != 0){
        $sql = "insert into session (`statut`, `mail`) values ('0', '$mail')";
        $result = mysqli_query($db_handle, $sql);

        $_SESSION['user'] = [
            'statut' => '0',
            'mail' => $mail
        ];
        echo "<script> window.location.href = 'Accueil.html' </script>";

    }else if(mysqli_num_rows($result_coach) != 0){
        $sql = "insert into session (`statut`, `mail`) values ('1', '$mail')";
        $result = mysqli_query($db_handle, $sql);

        $_SESSION['user'] = [
            'statut' => '1',
            'mail' => $mail
        ];
        echo "<script> window.location.href = 'Accueil.html' </script>";

    }else if(mysqli_num_rows($result_admin) != 0){
        $sql = "insert into session (`statut`, `mail`) values ('2', '$mail')";
        $result = mysqli_query($db_handle, $sql);

        $_SESSION['user'] = [
            'statut' => '2',
            'mail' => $mail
        ];
        echo "<script> window.location.href = 'Accueil.html' </script>";

    }else{
        echo "  <script>alert('email ou mot de passe invalide'); window.location.href = 'sign_in_up.php'</script> ";

    }




} else {
    echo "database not found";
}

mysqli_close($db_handle);

?>

