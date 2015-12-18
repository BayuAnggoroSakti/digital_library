


<?php
error_reporting(0); 		
$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ) 

{

$nipmax=mysql_fetch_array(mysql_query("SELECT max(member_id) FROM digilib_userlogin"));
$id_ebookjenis=$nipmax[0];




$mode_form	= isset($_GET['mod']) ? $_GET['mod'] : "";
$id_daftar	= isset($_GET['id_n']) ? $_GET['id_n'] : "";
$p_tombol	= isset($_POST['kirim_daftar']) ? $_POST['kirim_daftar'] : "";
$p_id_daftar = isset($_POST['id_daftar']) ? $_POST['id_daftar'] : "";

$p_id_userlogin = isset($_POST['id_userlogin']) ? $_POST['id_userlogin'] : "";	
$p_member_id 		= isset($_POST['member_id']) ? strtoupper($_POST['member_id']) : "";
$p_password	= isset($_POST['password']) ? $_POST['password'] : "";	


$md = md5($p_password);



$p_submit		= "DAFTAR";

if ($mode_form == "add") {
} else if ($mode_form == "edit") {
$q_data_edit	= mysql_query("SELECT * FROM digilib_userlogin WHERE member_id= '$id_daftar'");
$a_data_edit	= mysql_fetch_array($q_data_edit);
$p_id_userlogin		= $a_data_edit[0];
$p_member_id			= $a_data_edit[1];	
$p_password			= $a_data_edit[2];		
$p_delet	= $a_data_edit[3];





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
		$p_password = md5($_POST['password']);
		$md=$p_password ;
	if ($md == "") 
		{
			$id_daftar = $_POST['id_daftar'];
		
		echo "haloo";
		echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Form Isian Masih Belum lengkap mohon di lengkapi<br/></div>";
		} else {
		
		
		$q_edit	= mysql_query("UPDATE digilib_userlogin SET password='$md'
									where member_id='$id_daftar'");
				
									
		if ($q_edit) {
		
		echo "<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class=''></i></button><strong><i class='ace-icon fa fa-check'></i> BERHASIL</strong> Pasword Berhasil di Ubah<br/><a href='?id=list_member'> KEMBALI</a></div>";
		
				} else {
				
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong>" .mysql_error()."<br/></div>";
				}
		}

}

	


?>




			
						

					<div class="widget-box">
<div class="widget-header widget-header-blue widget-header-flat">
	<h4 class="widget-title lighter">Data Edit Member</h4>
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

						<form class="form-horizontal" action="?id=editPassword&mod=edit&id_n=<?php echo $id_daftar;?>" method="post"  role="form">
						<input type="hidden" name="id_daftar" value="<?php echo $id_daftar; ?>">	
							
		
						<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Member ID :</label> 

									<div class="col-sm-9">
										<input type="text" disabled required name="nama" id="penerima" class="col-xs-10 col-sm-5" placeholder="Nama kategori Ebook" value="<?php echo $p_member_id;?>"/>
									</div>
					
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Password Baru :</label> 

									<div class="col-sm-9">
										<input type="text" required name="password" id="penerima" class="col-xs-10 col-sm-5" placeholder="Masukkan Password Baru" />
									
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