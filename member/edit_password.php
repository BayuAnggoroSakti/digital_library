<?php
session_start();

if (empty($_SESSION['member_id'])) {
header("location:../login_member.php"); 
}
else {
?>
<?php 
include "template_member/header.php";
include "../admin_digilib/config/koneksi.php";
$member_id = $_SESSION['member_id'];
echo $member_id;
$profil = mysql_query("SELECT * from member where member_id = '$member_id'");
while($data = mysql_fetch_array($profil))
 {
  $nama = $data['member_name'];
  $alamat = $data['member_address'];
  $email = $data['member_email'];
  $phone = $data['member_phone'];
 }

?>

<div class="container">

        <!-- Heading Row -->
        <div class="row">
         <div class="col-md-2">
         </div>
          <div class="col-md-8">
        <form class="form-horizontal" method="post" action="">
  <div class="form-group">
  <h3 align="center">Ganti Password</h3>
  <br>
    <label for="inputEmail3" class="col-sm-2 control-label">Password Lama</label>
    <div class="col-sm-10">
      <input type="text" required name="password_lama" class="form-control" id="" placeholder="Masukkan Password Lama Anda">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label"> Password Baru</label>
    <div class="col-sm-10">
      <input type="text" required class="form-control" name="password_baru" placeholder="Masukkan password baru">
    </div>
  </div>
   
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password Baru (Ulangi)</label>
    <div class="col-sm-10">
      <input type="text" required class="form-control" name="password_baru2" id="inputPassword3" placeholder="Masukkan password baru lagi">
    </div>
  </div>
  
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Edit Password</button>
    </div>
  </div>
</form>
            <!-- /.col-md-8 -->
           </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- /.row -->

        <hr>

<?php
error_reporting(E_ALL ^ E_NOTICE);

$password_lama = md5($_POST['password_lama']);
$password_baru = md5($_POST['password_baru']);
$password_baru2 = md5($_POST['password_baru2']);

$hasil = mysql_query("SELECT * from digilib_userlogin where member_id = '$member_id'");
$data  = mysql_fetch_array($hasil);
if ($data['password'] == $password_lama) {
 if ($password_baru == $password_baru2) {
    $update = mysql_query("UPDATE digilib_userlogin set password = '$password_baru' where member_id='$member_id'");
    if ($update) {
    echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><center><strong>Selamat update password anda telah berhasil</strong></center></div>";
    }
 }
 else{
 echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><center><strong>Password baru anda tidak sama</strong></center></div>";
 }
}
else
{
  echo "<div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><center><strong>Silahkan mengisi password lama anda dengan benar</strong></center></div>";

}

?>
<?php 
include "template_member/footer.php";
?>
<?php } ?>