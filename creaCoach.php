<?php


$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$mail = $_POST['Mail'];
$mdp = $_POST['mdp'];
$nom = $_POST['Nom'];
$prenom = $_POST['Prenom'];
$photo = $_POST['photo'];
$video = $_POST['video'];
$num = $_POST['num'];
$cv = $_POST['CV'];
$sport = $_POST['discipline'];


if ($db_found){
    $sql = "INSERT INTO coach(Mail, mdp, Nom, Prenom, photo, video, discipline, CV, num) VALUES ('$mail','$mdp','$nom','$prenom','$photo','$video','$sport','$cv','$num')";
    $result = mysqli_query($db_handle, $sql);


    echo "<script>window.location.href='superPouvoir.html';</script> ";
}


?>