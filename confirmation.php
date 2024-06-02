<?php





$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if ($db_found) {

$mail = $_POST['email'];
$carte = $_POST['card'];
$date = $_POST['expiry'];
$crypto = $_POST['cvv'];
$id = $_POST['id'];
$prix = $_POST['prix'];

$sql = "select * from compte where mail = '$mail'";
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result)>0){
    $data = mysqli_fetch_assoc($result);
    $MAIL = $data['mail'];
    $CARTE = $data['numero'];
    $CVV = $data['cvv'];
    $DATE = $data['dateExpi'];
    $SOLDE = $data['Solde'];



    if($CARTE == $carte && $CVV == $crypto && $DATE == $date){

        if ($SOLDE >= $prix){

            $SOLDE = $SOLDE - $prix;
            $sql = "UPDATE compte SET Solde='$SOLDE' WHERE mail = '$MAIL'";
            $result = mysqli_query($db_handle, $sql);

            echo "<script>
                alert('achat effectué');
                window.location.href='Nos_services.html';
              </script>";

        }
        else{
            echo "<script>
                alert('la transaction a échoué, vous n`avez pas été débité);
                window.location.href='paiement.php?product_id=".$id . "';
              </script>";}
    }else{

        echo "<script>
                alert('informations incorretes');
                window.location.href='paiement.php?product_id=".$id . "';
              </script>";}







}else{
        echo "<script>
                alert('email erroné');
                window.location.href='paiement.php?product_id=".$id . "';
              </script>";}



}

?>