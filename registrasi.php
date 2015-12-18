<?php 
include "template/header.php";

?>
<?php
session_start();
if (empty($_SESSION['member_id'])) {
?>
    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
     <div class="col-md-3">
     </div>
      <div class="col-md-6">
          <H3 align="center">Masukkan Member ID dan Nama anda</h3>
          <br>
    <form class="form-horizontal" action="" method="POST">
  
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Member ID</label>
            <div class="col-sm-8">
              <input type="text" name="member_id" class="form-control" id="username" required placeholder="Member ID">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Member Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="member_name" required placeholder="Nama Anda">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" value="cari" class="btn btn-default">Cari</button>
            </div>
          </div>
        </form>
            <!-- /.col-md-8 -->
           </div>
            <div class="col-md-3">
      </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
       

<?php

include "admin_digilib/config/koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$member_id = $_POST['member_id'];
$member_name = $_POST['member_name'];
if ($member_id == '' && $member_name == '') {
  $result=mysql_query("SELECT m.member_id as member_id, member_name from member m, digilib_userlogin du where m.member_id = du.member_id and m.member_id like '%$member_id%' and member_name = '$member_name' limit 0");
}
else{
$result=mysql_query("SELECT m.member_id as member_id, member_name from member m, digilib_userlogin du where m.member_id = du.member_id and m.member_id = '$member_id' and member_name = '$member_name'");
}
  $get_pages=mysql_num_rows($result);
if ($get_pages) {
?>  


  <?php
   echo "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><center><strong>Anda sudah terdaftar menjadi member</strong></center></div>";
  } else{
    if ($_POST['member_name'] == "" && $_POST['member_id'] == "") {
      
    }
    else{
      $result=mysql_query("SELECT member_id , member_name, member_address, member_phone from member where member_id = '$member_id' and member_name = '$member_name'");
       $get_pagess=mysql_num_rows($result);
       if ($get_pagess) {
?>  


  
<?php
$offset = 0;
  while ($row=mysql_fetch_array($result)){
    $member_id = $row['member_id'];
    $member_name = $row['member_name'];
    $member_phone = $row['member_phone'];
    $member_address = $row['member_address'];
   echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><center><strong>Data ditemukan, silahkan membuat password anda</strong></center></div>";
    ?>

    <div class="list-group-item">
       
          <h4 class="list-group-item-heading"> <span class="glyphicon glyphicon-book" aria-hidden="true"></span><?php echo " ".$member_name ?></h4>
          <hr style="size:2;">
          <b class="list-group-item-text">Member ID : </b><?php echo " ".$member_id ?><br>
          <b class="list-group-item-text">Nomer HP : </b><?php echo " ".$member_phone ?><br>
          <b class="list-group-item-text">Alamat : </b><?php echo " ".$member_address ?>
          
          <hr>
          <a href="buat_password.php?member_id=<?php echo $member_id; ?>"><button type="button" class="btn btn-info">Buat Password</button></a>
      </div>
     
  <?php 
   
  } 
  ?>
  </table>
  <?php
  }
       else {
           echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><center><strong>Data Member tidak ditemukan</strong></center></div>";
            
          }
  }
  }
  ?>
<?php 
include "template/footer.php";
}
else {
    header("location:member/index.php"); 
}
?>

