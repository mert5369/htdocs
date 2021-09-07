<?php

include 'config.php';

if($_POST){
 
    $answer = $_POST['answer'];
    $rolId = $_POST['rol'];
    $ticketId = $_POST['ticket'];
    $date = date('Y-m-d H:i:s');


$sql = "INSERT INTO ticketanswer (TicketId, UserId, Answer, AnswerDateTime)
VALUES ('$ticketId', '$rolId', '$answer', '$date' )";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("location:tickets.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    

}
?>



<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mert Ticket Login! | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">

        <div class="animate form registration_form">
          <section class="login_content">
            <form method="post" action="">
              <h1>Create Ticket</h1>

              <div>
                <input type="text" name="answer" class="form-control" placeholder="Detail" required="" />
              </div>
              <div>
               <select name="ticket" id="">
                   <?php 
                   $sql = "SELECT * FROM ticket";
                   $query = $conn->query($sql);                   
                   ?>
                   <?php foreach($query as $row){ ?>
                    <option value="<?= $row['Id'] ?>"><?= $row['Subjectt']; ?></option>
                   <?php } ?>
               </select>
              </div>
              <div>
               <select name="rol" id="">
                   <?php 
                   $sql = "SELECT * FROM rol";
                   $query = $conn->query($sql);                   
                   ?>
                   <?php foreach($query as $row){ ?>
                    <option value="<?= $row['Id'] ?>"><?= $row['Name']; ?></option>
                   <?php } ?>
               </select>
              </div>
              <div>
              <button type="submit">Gönder</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="#signin" class="to_register"> Admin Girişi </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
  </body>
</html>
