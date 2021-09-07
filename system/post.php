<?php

/* İŞE BAŞLANDIĞINDA */
if($page=='ticketStart'){
 $TicketId = $_REQUEST['ticketId'];
 $UserId = $_SESSION['user'];

 if($TicketStartSQL = mysqli_query($conn,"UPDATE ticket set StartedUserId = $UserId, Status = 1 WHERE Id = $TicketId ")){ 
   echo 'Talep güncellendi';
   echo '<meta http-equiv="refresh" content="1;URL=http://localhost/tickets" />';   
 }

}


/* İŞ SONLANDIRILDIĞINDA */

if($page=='ticketEnd'){
  $TicketId = $_REQUEST['ticketId'];
  $UserId = $_SESSION['user'];
  $CloseDate = Date('Y-m-d H:i:s');
  if($TicketStartSQL = mysqli_query($conn,"UPDATE ticket set CloseDate = '$CloseDate', ClosedUserId = $UserId, Status = 1 WHERE Id = $TicketId ")){ 
    echo 'Talep güncellendi';
    echo '<meta http-equiv="refresh" content="1;URL=http://localhost/tickets" />';   
  }
 
 }