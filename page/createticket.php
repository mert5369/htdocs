<?php 

include 'page/config.php';
if(isset($_POST['TicketGonder'])){

$Subjectt = $_POST['Subjectt'];
$Detail = $_POST['Detail'];

$sql = "INSERT INTO ticket (Subjectt, Detail)
VALUES ('$Subjectt', '$Detail')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}

 ?>