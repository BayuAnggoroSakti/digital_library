<?php 
include "template/header.php";

?>
<?php
session_start();
if (empty($_SESSION['member_id'])) {
?>
<?php
include "admin_digilib/config/koneksi.php";
$member_id = $_GET['member_id'];
$hasil = mysql_query("SELECT member_id FROM digilib_userlogin WHERE member_id = '$member_id'");
$cek = mysql_fetch_array($hasil);

$belum = mysql_query("SELECT member_id FROM member WHERE member_id = '$member_id'");
$ceklg = mysql_num_rows($belum);

if ($member_id == "") {
 header("location:registrasi.php");
}
elseif ($cek) {
  header("location:registrasi.php");
  ?>
   
<?php  
include "template/footer.php";
}
elseif ($ceklg) {
  ?>
   <div class="container">

        <!-- Heading Row -->
        <div class="row">
     <div class="col-md-3">
     </div>
      <div class="col-md-6">
          <H3 align="center">Masukkan Password yang Anda Inginkan</h3>
          <br>
    <form class="form-horizontal" action="" method="POST">
  
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Member ID</label>
            <div class="col-sm-8">
              <input type="text" name="member_id" disabled class="form-control" id="username" placeholder="Member ID" value="<?php echo $member_id; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
              <input type="type" class="form-control" required name="password" id="inputPassword3" placeholder="Masukkan Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="buat" value="buat" class="btn btn-default">Buat</button>
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
<?php
include "admin_digilib/config/koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$member_id = $_GET['member_id'];
$password = md5($_POST['password']);
$date = date("Y-m-d h:i:s");
if ($_POST['buat'] != "") {
$buatPassword = mysql_query("INSERT INTO digilib_userlogin values ('','$member_id','$password','$date','0')");
/*echo "<h3 align'center'>Selamat anda Sudah berhasil membuat password</h3>
      silahkan <a href='login_member.php'>Login</a>";*/
      echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><center><strong>Selamat </strong>password anda sudah di buat, Silahkan Login</center></div>";
        echo "<center><a href='login_member.php'><button type='button' class='btn btn-primary'>Login</button></a></center>";
}
else
{
  echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><center><strong>Silahkan memasukkan password anda</strong></center></div>";
}

/*if ($buatPassword) {
  echo "berhasil";
}
else {
  echo "Gagal".mysql_error();
}
*/

?>
      
<?php
 include "template/footer.php";
}
else {
   header("location:registrasi.php"); 
?>
    <!-- Page Content -->
   
        <!-- /.row -->

        <!-- Content Row -->
      
        <!-- /.row -->

        <!-- Footer -->
<?php 
include "template/footer.php";
}
}
else {
    header("location:member/index.php"); 
}
?>

