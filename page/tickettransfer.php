<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$ticketId = $_GET['ticketId'];
$RolId = $_GET['RolId'];


$rol_guncelle = mysqli_query($conn,"UPDATE ticket SET RolId = '$RolId'  WHERE Id = '$ticketId'");

if ($rol_guncelle) {
  echo "Rol Güncellendi.";
}else{
  echo "Bir hata oluştu.";
}

?>