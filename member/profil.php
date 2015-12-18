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
include "../admin_digilib/config/fungsi_indotgl.php";
$member_id = $_SESSION['member_id'];
$profil = mysql_query("SELECT * from member where member_id = '$member_id'");
while($data = mysql_fetch_array($profil))
 {
  $nama = $data['member_name'];
  $alamat = $data['member_address'];
  $email = $data['member_email'];
  $phone = $data['member_phone'];
  $tanggal_lahir = $data['birth_date'];
  $nama_instansi = $data['inst_name'];
 }
?>

<div class="container">

        <!-- Heading Row -->
        <div class="row">
         <div class="col-md-2">
         </div>
          <div class="col-md-8">
        <form class="form-horizontal" method="POST" action="edit_password.php">
  <div class="form-group">
  <h3 align="center">Profil Saya</h3>
  <br>
    <label for="inputEmail3" class="col-sm-2 control-label">Member ID</label>
    <div class="col-sm-10">
      <input type="text" disabled name="member_id" class="form-control" id="inputEmail3" placeholder="" value="<?php echo $member_id;?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label"> Nama Lengkap</label>
    <div class="col-sm-10">
      <input type="text" disabled class="form-control" id="inputPassword3" placeholder="" value="<?php echo $nama;?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label"> Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="text" disabled class="form-control" id="inputPassword3" placeholder="" value="<?php echo tgl_indo($tanggal_lahir);?>">
    </div>
  </div>
   
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" disabled class="form-control" id="inputPassword3" placeholder="" value="<?php echo $alamat;?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Nama Instansi</label>
    <div class="col-sm-10">
      <input type="text" disabled class="form-control" id="inputPassword3" placeholder="" value="<?php echo $nama_instansi;?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">EMAIL</label>
    <div class="col-sm-10">
      <input type="text" disabled class="form-control" id="inputPassword3" placeholder="" value="<?php echo $email;?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Telepon / HP</label>
    <div class="col-sm-10">
      <input type="text" disabled class="form-control" id="inputPassword3" placeholder="" value="<?php echo $phone;?>">
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Edit Password</button>
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

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                   <div id="pencarian"></div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
<?php 
include "template_member/footer.php";
?>
<?php } ?>