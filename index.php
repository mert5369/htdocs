<?php
session_start();
if(isset($_REQUEST['page'])){ $page = $_REQUEST['page']; }
include 'system/config.php';
include 'system/authcontroller.php';
include 'system/head.php';

?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       
<?php 
include 'system/left.php'; 
include 'system/top.php';
if(!isset($page)){ 
  include 'page/dashboard/dashboard.php';
}
else{ 
  if($page=='tickets'){
    include 'page/tickets.php';
  }
  if($page=='logout'){
    include 'system/logout.php';
  }
  if($page=='ticketStart' or $page=='ticketEnd'){
    include 'system/post.php';
  }
  
}


include 'system/footer.php';
?>

     



  
  </body>
</html>
