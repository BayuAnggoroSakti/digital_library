


<?php
error_reporting(0); 		
$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
$admin = mysql_query("SELECT id_admin from digilib_admin where username = '$sesi_username'");
while($row = mysql_fetch_array($admin, MYSQL_ASSOC))
{
   $id_admin = $row['id_admin'];
} 
if ($sesi_username != NULL || !empty($sesi_username) ) 

{

$nipmax=mysql_fetch_array(mysql_query("SELECT max(id_admin) FROM digilib_admin"));
$id_ebookjenis=$nipmax[0];




$mode_form	= isset($_GET['mod']) ? $_GET['mod'] : "";
$id_daftar	= isset($_GET['id_n']) ? $_GET['id_n'] : "";
$p_tombol	= isset($_POST['kirim_daftar']) ? $_POST['kirim_daftar'] : "";
$p_id_daftar = isset($_POST['id_daftar']) ? $_POST['id_daftar'] : "";

$p_id_admin = isset($_POST['id_admin']) ? $_POST['id_admin'] : "";	
$p_username 		= isset($_POST['username']) ? strtoupper($_POST['username']) : "";
$p_password	= isset($_POST['password']) ? $_POST['password'] : "";	
$p_nama 		= isset($_POST['nama']) ? ($_POST['nama']) : "";
$p_jabatan	= isset($_POST['jabatan']) ? $_POST['jabatan'] : "";	
$p_telphp	= isset($_POST['telphp']) ? $_POST['telphp'] : "";






$p_submit		= "DAFTAR";

if ($mode_form == "add") {
} else if ($mode_form == "edit") {
$q_data_edit	= mysql_query("SELECT * FROM digilib_admin WHERE id_admin= '$id_daftar'");
$a_data_edit	= mysql_fetch_array($q_data_edit);
$id_admin		= $a_data_edit[0];
$p_username			= $a_data_edit[1];	
$p_password			= $a_data_edit[2];		
$p_nama	= $a_data_edit[3];
$p_jabatan	= $a_data_edit[4];
$p_telphp	= $a_data_edit[5];






$p_submit	= "EDIT";	

}

if ($p_tombol == "DAFTAR") {
	if ($p_nama == "" 
	
	) {
		
		echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Form Isian Masih Belum lengkap mohon di lengkapi<br/></div>";
		
	} else {  
	
			$q_cek_ganda = mysql_query("SELECT * FROM digilib_ebookkategori WHERE nama = '$p_nama'");
			$j_cek_ganda = mysql_fetch_array($q_cek_ganda);
			
			if ($j_cek_ganda > 0) {
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Kategori sudah terdaftar<br/></div>";
			} else {   
					$q_daftar	= mysql_query("INSERT INTO digilib_ebookkategori VALUES ('','$p_nama','$p_deskripsi','0')");	
					if ($q_daftar) {
					echo "<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class=''></i></button><strong><i class='ace-icon fa fa-check'></i> BERHASIL</strong> Data Kategori Ebook Berhasil di simpan<br/></div>";
				} else {
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong>" .mysql_error()."<br/></div>";
				}
			}
		}
			
} else if ($p_tombol == "EDIT") {
	if ($p_nama == "") 
		{
		echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Form Isian Masih Belum lengkap mohon di lengkapi<br/></div>";
		} else {
		
		$password_lama = md5($_POST['password_lama']);
		$password_baru = md5($_POST['password_baru']);
		$password_baru2 = md5($_POST['password_baru2']);
		$pas = mysql_query("SELECT * FROM digilib_admin where password = '$password_lama'");
		$cek = mysql_num_rows($pas);
		if ($cek > 0) {
			if ($password_baru == $password_baru2) {
				$q_edit	= mysql_query("UPDATE `digilib_admin` SET `password`='$password_baru2' WHERE id_admin = '$id_admin'");
				echo "<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class=''></i></button><strong><i class='ace-icon fa fa-check'></i> BERHASIL</strong> Berhasil mengubah password<br/></div>";
			}
			else{
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Kombinasi Password salah<br/></div>";
			}
		}
		else
		{
			echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Password lama salah<br/></div>";
		}
								
		}

}

	


?>




			
			
										

					<div class="widget-box">
<div class="widget-header widget-header-blue widget-header-flat">
	<h4 class="widget-title lighter">Profil Admin</h4>
	<small>
	<i class="icon-double-angle-right"></i>
	
	</small>
	<div class="widget-toolbar">
		
	</div>
</div>
					
					<div class="widget-body">
					<div class="widget-main">
					<div class="row-fluid">
						
							<!--PAGE CONTENT BEGINS-->

						<form class="form-horizontal" action="?id=change_password&mod=edit&id_n=<?php echo $id_admin ?>" method="post"  role="form">
						<input type="hidden" name="id_daftar" value="<?php echo $id_daftar; ?>">	
							
		
						<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Password Lama :</label> 

									<div class="col-sm-9">
										<input type="password" required name="password_lama"  id="penerima" class="col-xs-10 col-sm-5" placeholder="Password Lama" />
									</div>
					
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Password Baru :</label> 

									<div class="col-sm-9">
										<input type="password" required name="password_baru" id="penerima" class="col-xs-10 col-sm-5" placeholder="Passsword Baru"/>
									</div>
					
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Password Baru (Ulangi) :</label> 

									<div class="col-sm-9">
										<input type="password" required name="password_baru2" id="penerima" class="col-xs-10 col-sm-5" placeholder="Password Baru (Ulangi)" />
									</div>
					
								</div>
								
								
								
								
										
								
												
								<div class="form-actions">
									
									<input class="btn btn-success btn-big btn-next" type="submit" name="kirim_daftar" value="<?php echo $p_submit; ?>">
								

									
									
								</div>
		</form>		
									
									
								
								
								</div>
								</div>
								</div>
								</div>
								</div>
				
<?php
}else{
	  header('Location:../index.php?status=Silahkan Login');
}
?>	