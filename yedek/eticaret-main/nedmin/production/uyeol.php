


<?php 

include 'baglan.php';

$email = $_POST['email'];
$pass = $_POST['pass'];



$ekle = $link->prepare("INSERT INTO user SET email = :email, pass =:pass");

$Kaydet = $ekle->execute(array(

	"email" => $email,
	"pass" => $pass

));

if ($Kaydet > 0) {
	echo "Kullanıcı eklendi";
}else {
	echo "Hata! Kullanıcı eklenemedi.";
}


 ?>