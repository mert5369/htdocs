<?php
if(!isset($_SESSION['user']) or $_SESSION['user']==''){
  include 'page/login.php';
  exit;
}
else{ 
  $RolId = $_SESSION['RolId'];
  $RolControlSQL = mysqli_query($conn, "SELECT * FROM rol where Id = $RolId");
  if(mysqli_num_rows($RolControlSQL)){
    $RolList = mysqli_fetch_array($RolControlSQL);
    $_SESSION['RolAdi'] = $RolList['Name'];
  }
}