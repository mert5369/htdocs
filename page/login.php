<?php
$Hata = false;
if(isset($_POST['GirisYap'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  if($username=='' or $password=='') {
    $Hata = true;
    $HataMesaj= 'Kullanıcı Adı ve Şifresi Boş girdiniz.';
  }
  else {
    $password = md5($password);
    $LoginSQL = mysqli_query($conn,"SELECT * FROM user WHERE Username = '$username' and  Password = '$password'");
 
    if(mysqli_num_rows($LoginSQL)>0){
      $Login_KNT = (mysqli_fetch_assoc($LoginSQL));
      $_SESSION['user']=$Login_KNT['Id'];
      $_SESSION['RolId']=$Login_KNT['RolId'];
      $_SESSION['NameSurname']=$Login_KNT['Name'].' '.$Login_KNT['Surname'];
      header('Location:?');
    }
    else{ 
      $Hata=true; 
      $HataMesaj= 'Kullanıcı veya Şifre Hatalı';
    }
 
}
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
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
         <?php if($Hata){
           echo $HataMesaj;
         }
         ?>
          <section class="login_content">
            <form method="post" action="?">
              <h1>Giriş Yap</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" name="GirisYap" value="Giriş Yap">
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ticket Oluşturmak İçin
                  <a href="#signup" class="to_register"> Buraya Basınız </a>
                </p>
                <p class="change_link">Ticket Yanıtlamak İçin
                  <a href="page/ticketanswer.php" class="to_register"> Buraya Basınız </a>
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

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="post" action="page/createticket.php">
              <h1>Create Ticket</h1>
              <div>
                <input type="text" name="Subjectt" class="form-control" placeholder="Subjectt" required="" />
              </div>
              <div>
                <input type="text" name="Detail" class="form-control" placeholder="Detail" required="" />
              </div>
             
              <div>
              <button type="submit" name="TicketGonder">Gönder</button>
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
    </div>
  </body>
</html>
