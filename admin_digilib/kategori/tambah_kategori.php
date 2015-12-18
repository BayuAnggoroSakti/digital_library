

<?php
error_reporting(0); 		
$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ) 

{

$nipmax=mysql_fetch_array(mysql_query("SELECT max(id_ebookkategori) FROM digilib_ebookkategori"));
$id_ebookjenis=$nipmax[0];




$mode_form	= isset($_GET['mod']) ? $_GET['mod'] : "";
$id_daftar	= isset($_GET['id_n']) ? $_GET['id_n'] : "";
$p_tombol	= isset($_POST['kirim_daftar']) ? $_POST['kirim_daftar'] : "";
$p_id_daftar = isset($_POST['id_daftar']) ? $_POST['id_daftar'] : "";

$p_id_ebookkategori = isset($_POST['id_ebookkategori']) ? $_POST['id_ebookkategori'] : "";	
$p_nama 		= isset($_POST['nama']) ? strtoupper($_POST['nama']) : "";
$p_deskripsi	= isset($_POST['deskripsi']) ? $_POST['deskripsi'] : "";	





$p_submit		= "DAFTAR";

if ($mode_form == "add") {
} else if ($mode_form == "edit") {
$q_data_edit	= mysql_query("SELECT * FROM digilib_ebookkategori WHERE id_ebookkategori= '$id_daftar'");
$a_data_edit	= mysql_fetch_array($q_data_edit);
$id_ebookkategori		= $a_data_edit[0];
$p_nama			= $a_data_edit[1];	
$p_deskripsi			= $a_data_edit[2];		
$p_delet	= $a_data_edit[3];




$p_submit	= "EDIT";	

}

if ($p_tombol == "DAFTAR") {
	if ($p_nama == "" ) {
		
		echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Form Isian Masih Belum lengkap mohon di lengkapi<br/></div>";
		
	} 
	
		else {  
	
			$q_cek_ganda = mysql_query("SELECT * FROM digilib_ebookkategori WHERE nama = '$p_nama'");
			$j_cek_ganda = mysql_fetch_array($q_cek_ganda);
			
			if ($j_cek_ganda > 0) {
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Kategori sudah terdaftar<br/></div>";
			} else {   
					$q_daftar	= mysql_query("INSERT INTO digilib_ebookkategori VALUES ('','$p_nama','$p_deskripsi','0')");	
					if ($q_daftar) {
					echo "<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class=''></i></button><strong><i class='ace-icon fa fa-check'></i> BERHASIL</strong> Data Kategori Ebook Berhasil di simpan<br/></div></div><script>window.location ='media.php?id=list_jenis'</script>";
				} else {
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong>" .mysql_error()."<br/></div>";
				}
			}
		}
			
} else if ($p_tombol == "EDIT") {
	if ($p_nama == "") 
		{
		echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Form Isian Masih Belum lengkap mohon di lengkapi<br/></div>";
		} 

		else {
		
		$id_daftar = $_POST['id_daftar'];

		$q_edit	= mysql_query("UPDATE digilib_ebookkategori SET nama='$p_nama', deskripsi='$p_deskripsi'
									where id_ebookkategori='$id_daftar'");
				
									
		if ($q_edit) {
		
		echo "<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class=''></i></button><strong><i class='ace-icon fa fa-check'></i> BERHASIL</strong> Data Kategori Ebook Berhasil di Ubah<br/></div></div><script>window.location ='media.php?id=list_kategori'</script>";
		header('location:media.php?id=list_kategori');
		
				} else {
				
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong>" .mysql_error()."<br/></div>";
				}
		}

}

	


?>




			
			
										

					<div class="widget-box">
<div class="widget-header widget-header-blue widget-header-flat">
	<h4 class="widget-title lighter">Data Jenis Ebook</h4>
	<small>
	<i class="icon-double-angle-right"></i>
	<span class="label label-info arrowed-in-right arrowed">Mohon isi data jenis dengan langkap</span>
	</small>
	<div class="widget-toolbar">
		
	</div>
</div>
					
					<div class="widget-body">
					<div class="widget-main">
					<div class="row-fluid">
						
							<!--PAGE CONTENT BEGINS-->

						<form class="form-horizontal" action="?id=tambah_kategori" method="post"  role="form">
						<input type="hidden" name="id_daftar" value="<?php echo $id_daftar; ?>">	
							
		
						<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Nama :</label> 

									<div class="col-sm-9">
										<input type="text" required name="nama" id="penerima" class="col-xs-10 col-sm-5" placeholder="Nama kategori Ebook" value="<?php echo $p_nama;?>"/>
									</div>
					
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Deskripsi :</label> 

									<div class="col-sm-9">
										<textarea name="deskripsi" id="alamat" class="col-xs-10 col-sm-10" placeholder="Nama Penulis" value="<?php echo $p_deskripsi;?>" >
												<?php echo $p_deskripsi; ?>
										</textarea>
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