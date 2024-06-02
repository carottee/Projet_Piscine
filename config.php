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

if (!$db_found) {
    die("Database not found");
}

session_start();
?>
