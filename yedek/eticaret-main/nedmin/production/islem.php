<?php 

include 'baglan.php';


$email = $_POST['username'];
$pass  = $_POST['pass'];

$sor = $link->prepare("SELECT * FROM user WHERE email = ? AND pass = ? AND status = ?");
$sor->execute(array($email, $pass, 1));

$kayit_sayisi = $sor->rowCount();

if ($kayit_sayisi > 0) {


	session_start();

	$_SESSION['login']= true;
	$_SESSION['email']= $email;

	header("Location: index.php");
}else{
	echo "Admin bulunamadı.";
}



$sor = $link->prepare("SELECT * FROM user WHERE email = ? AND pass = ? AND status = ?");
$sor->execute(array($email, $pass, 0));

$kayit_sayisi = $sor->rowCount();

if ($kayit_sayisi > 0) {


	session_start();

	$_SESSION['login']= true;
	$_SESSION['email']= $email;

	header("Location: kullanicianasayfa.php");
}else{
	echo "Kullanıcı bulunamadı.";
}


?>