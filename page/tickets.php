 <!-- page content -->
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Destek Talep Sayfası</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>


                    



            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tüm Destek Talepler</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Talep Konusu</th>
                          <th>Oluşturma Tarihi</th>
                          <th>İşe Başlayan</th>
                          <th>İşi Sonlandıran</th>
                          <th>Sonlandırma Tarihi</th>
                          <th>İlgili Birim</th>
                          <th>Durum</th>
                          <th>işlem</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                     // $RolControlSQL = mysqli_query($conn, "SELECT * FROM rol where Id = $RolId");
                      if($TicketsSQL = mysqli_query($conn, "SELECT * FROM ticket ")){ 
                      if(mysqli_num_rows($TicketsSQL) > 0){ 
                        while($TicketsList = mysqli_fetch_array($TicketsSQL)){ 
                           
                          $StartUserName = UserFind($conn,$TicketsList['StartedUserId']);
                          
                          $CloseUserName = UserFind($conn,$TicketsList['ClosedUserId']);

                          if($TicketsList['Status']==0){
                            $Status = 'Yeni Talep';
                          }
                          if($TicketsList['Status']==1){
                            $Status = 'İşleme Alındı';
                          }
                          if($TicketsList['Status']==2){
                            $Status = 'Sonlandırıldı';
                          }
                          if($TicketsList['Status']==3){
                            $Status = 'İptal Edildi';
                          }
                          ?>
            
                        <tr>
                          <td><?=$TicketsList['Id']?></td>
                          <td><?=$TicketsList['Subject']?></td>
                          <td><?=$TicketsList['CreateDate']?></td>
                          <td><?=$StartUserName?></td>
                          <td><?=$CloseUserName?></td>
                          <td><?=$TicketsList['CloseDate']?></td>
                          <td><?=$TicketsList['RolId']?></td>
                          <td><?=$Status?></td>
                          <td>
                        <a href="ticketStart?ticketId=<?=$TicketsList['Id']?>" class="fa-hover col-md-3 col-sm-4 col-xs-12">
                          <span class="fa fa-play-circle-o"></span>
                        </a>
                        <a href="ticketEnd?ticketId=<?=$TicketsList['Id']?>" class="fa-hover col-md-3 col-sm-4 col-xs-12">
                          <span class="fa fa-stop"></span>
                        </a>
                       
                        <!-- Split button -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-danger">Aktar</button>
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">

                       <?php
 

 if($ROLSQL = mysqli_query($conn, "SELECT * FROM rol ")){ 
  if(mysqli_num_rows($ROLSQL) > 0){ 
    while($RolList = mysqli_fetch_array($ROLSQL)){ 
?>
<li><a href="page/tickettransfer.php?ticketId=<?=$TicketsList['Id']?>&RolId=<?=$RolList['Id']?>"><?=$RolList['Name']?></a></li>
<?php
  }
}
}

?>
                      <!-- <li><a href="page/tickettransfer.php?ticketId=<?=$TicketsList['Id']?>&RolId=2">Admin</a></li> -->
                      </ul>
                    </div>

                      </td>
                        </tr>
                         <?php }  } } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Bitiyor -->
 
             
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php
        function UserFind($conn,$UserID){ 
        if($IseBaslayanSQL = mysqli_query($conn,"SELECT * from user where Id = $UserID") ){
          if(mysqli_num_rows($IseBaslayanSQL)>0){
            $IseBaslayanList = mysqli_fetch_assoc($IseBaslayanSQL);
            Return  $IseBaslayanList['Name'].' '.$IseBaslayanList['Surname'];

          }
        }
        }
        ?>
