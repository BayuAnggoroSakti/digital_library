



<?php
error_reporting(0); 		
$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
$admin = mysql_query("SELECT id_admin from digilib_admin where username = '$sesi_username'");
while($row = mysql_fetch_array($admin, MYSQL_ASSOC))
{
   $id_admin = $row['id_admin'];
} 

if ($sesi_username != NULL || !empty($sesi_username)  ) 

{

$id_user=$_SESSION['kode'];	

$nipmax=mysql_fetch_array(mysql_query("SELECT max(id_ebook) FROM digilib_ebook"));
$nomor_nip=$nipmax[0];


$mode_form	= isset($_GET['mod']) ? $_GET['mod'] : "";
$id_daftar	= isset($_GET['id_n']) ? $_GET['id_n'] : "";
$p_tombol	= isset($_POST['kirim_daftar']) ? $_POST['kirim_daftar'] : "";
$p_id_daftar = isset($_POST['id_daftar']) ? $_POST['id_daftar'] : "";

$id_ebook		= isset($_POST['id_ebook']) ? $_POST['id_ebook'] : "";	
$id_ebookjenis 	= isset($_POST['id_ebookjenis']) ? $_POST['id_ebookjenis'] : "";
$id_ebookkategori	= isset($_POST['id_ebookkategori']) ? strtoupper($_POST['id_ebookkategori']) : "";	
$judul	= isset($_POST['judul']) ? strtoupper($_POST['judul']) : "";
$penulis	= isset($_POST['penulis']) ? $_POST['penulis'] : "";
$penerbit	= isset($_POST['penerbit']) ? $_POST['penerbit'] : "";
$tahun	= isset($_POST['tahun']) ? $_POST['tahun'] : "";	
$abstraksi	= isset($_POST['abstraksi']) ? $_POST['abstraksi'] : "";
$file	= isset($_POST['file']) ? $_POST['file'] : "";	
$lisensi	= isset($_POST['lisensi']) ? $_POST['lisensi'] : "";
$copyright	= isset($_POST['copyright']) ? $_POST['copyright'] : "";	



$p_submit		= "DAFTAR";

if ($mode_form == "add") {
} else if ($mode_form == "edit") {
$q_data_edit	= mysql_query("SELECT * FROM digilib_ebook WHERE id_ebook= '$id_daftar'");
$a_data_edit	= mysql_fetch_array($q_data_edit);
$id_ebook		= $a_data_edit[0];
$id_ebookjenis		= $a_data_edit[1];
$id_ebookkategori		= $a_data_edit[2];
$judul			= $a_data_edit[3];	
$penulis			= $a_data_edit[4];		
$penerbit 	= $a_data_edit[5];
$tahun 	= $a_data_edit[6]; 
$abstraksi 	= $a_data_edit[7]; 	
$file 	= $a_data_edit[8];		
$lisensi 	= $a_data_edit[9]; 	
$copyright 	= $a_data_edit[10]; 	


$p_submit	= "EDIT";	

}

if ($p_tombol == "DAFTAR") {
	if ($judul == "")
	{
		
		echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Form Isian NO kosong<br/></div>";
		
	} else {  
	
			$q_cek_ganda = mysql_query("SELECT * FROM digilib_ebook WHERE id_daftar = '$id_daftar'");
			$j_cek_ganda = mysql_fetch_array($q_cek_ganda);
			
			if ($j_cek_ganda > 0) {
				echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> No. VM sudah ada<br/></div>";
			} else {   
				$date = date("Y-m-d h:i:s");
				$allowed_ext	= array('pdf');
				$file_name		= $_FILES['file']['name'];
				$file_ext		= strtolower(end(explode('.', $file_name)));
				$file_size		= $_FILES['file']['size'];
				$file_tmp		= $_FILES['file']['tmp_name'];
				
				if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 5044070){
						$lokasi = 'files/'.$judul.'.'.$file_ext;
						$nama_file = $judul.'.'.$file_ext;
						move_uploaded_file($file_tmp, $lokasi);
						$in	= mysql_query("INSERT INTO digilib_ebook VALUES ('','$id_ebookjenis','$id_ebookkategori','$judul','$penulis', '$penerbit','$tahun','$abstraksi','$nama_file','$lisensi','$copyright','$date','$id_admin','0')");	
					
						if($in){
							echo "<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class=''></i></button><strong><i class='ace-icon fa fa-check'></i> BERHASIL</strong> Data Ebook Berhasil di simpan<br/></div><script>window.location ='media.php?id=list_ebook'</script>";
							header('location:?id=list_ebook');
						}else{
							echo '<div class="error">ERROR: Gagal upload file!</div>';
						}
					}else{
						echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 10 Mb!</div>';
					}
				}else{
					echo "<div class='alert alert-block alert-danger'><button type='button' class='close' data-dismiss='alert'><i class=''></i></button><strong><i class='ace-icon fa fa-check'></i> Maaf ! </strong>File tidak di upload dengan benar, file harus berupa <strong>PDF</strong><br/></div>";
				}
			}
		}
			
} else if ($p_tombol == "EDIT") {
	if ($judul == "") 
		{
		echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='ace-icon fa fa-times'></i> MAAF! </strong> Form Isian No_VM kosong<br/></div>";
		} 

		else {
		
		
		$query=mysql_query("SELECT file from digilib_ebook where id_ebook='$id_daftar'");
		$pdf = mysql_fetch_assoc($query);
		$filehapus = $pdf['file'];
		
				
		$date = date("Y-m-d h:i:s");
				$allowed_ext	= array('pdf');
				$file_name		= $_FILES['file']['name'];
				$file_ext		= strtolower(end(explode('.', $file_name)));
				$file_size		= $_FILES['file']['size'];
				$file_tmp		= $_FILES['file']['tmp_name'];
		
		if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 10044070){
						$judul = $_POST['judul'];
						$penulis = $_POST['penulis'];
						$penerbit = $_POST['penerbit'];
						$tahun = $_POST['tahun'];
						$id_daftar = $_POST['id_daftar'];
						$id_ebookjenis = $_POST['id_ebookjenis'];
						$id_ebookkategori = $_POST['id_ebookkategori'];
						$lisensi = $_POST['lisensi'];
						$abstraksi = $_POST['abstraksi'];
						$copyright = $_POST['copyright'];
						$lokasi = 'files/'.$judul.'.'.$file_ext;
						$nama_file = $judul.'.'.$file_ext;
						move_uploaded_file($file_tmp, $lokasi);
					unlink("files/".$filehapus);
		$q_edit	= mysql_query("UPDATE digilib_ebook SET judul='$judul', penulis='$penulis', penerbit='$penerbit', 
			tahun = '$tahun', id_ebookjenis= '$id_ebookjenis', id_ebookkategori = '$id_ebookkategori', abstraksi = '$abstraksi', 
			lisensi='$lisensi', copyright = '$copyright', datetime = '$date', id_admin = '$id_admin', file = '$nama_file' where id_ebook='$id_daftar'");
				
					
						if($q_edit){
							
							//unlink("files/".$nama_file);
							echo "<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class=''></i></button><strong><i class='ace-icon fa fa-check'></i> BERHASIL</strong> Data Ebook Berhasil di simpan<br/></div><script>window.location ='media.php?id=list_ebook'</script>";
							header('location:?id=list_ebook');
						}else{
							echo '<div class="error">ERROR: Gagal upload file!</div>';
						}
					}else{
						echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 10 Mb!</div>';
					}
				}else{
					$judul = $_POST['judul'];
					$date = date("Y-m-d h:i:s");
						$penulis = $_POST['penulis'];
						$penerbit = $_POST['penerbit'];
						$tahun = $_POST['tahun'];
						$id_daftar = $_POST['id_daftar'];
						$id_ebookjenis = $_POST['id_ebookjenis'];
						$id_ebookkategori = $_POST['id_ebookkategori'];
						$lisensi = $_POST['lisensi'];
						$abstraksi = $_POST['abstraksi'];
						$copyright = $_POST['copyright'];
						$q_edit	= mysql_query("UPDATE digilib_ebook SET judul='$judul', penulis='$penulis', penerbit='$penerbit', 
						tahun = '$tahun', id_ebookjenis= '$id_ebookjenis', id_ebookkategori = '$id_ebookkategori', abstraksi = '$abstraksi', 
						lisensi='$lisensi', copyright = '$copyright', datetime = '$date', id_admin = '$id_admin' where id_ebook='$id_daftar'");
							
					
						if($q_edit){
							
							//unlink("files/".$nama_file);
							echo "<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class=''></i></button><strong><i class='ace-icon fa fa-check'></i> BERHASIL</strong> Data Ebook Berhasil di simpan<br/></div><script>window.location ='media.php?id=list_ebook'</script>";
							
						}else{
							echo '<div class="error">Gagal Edit</div>';
						}
				}			
		}

}

	


?>




			
<script src="assets/ckeditor/ckeditor.js"></script>
										

					<div class="widget-box">
<div class="widget-header widget-header-blue widget-header-flat">
	<h4 class="widget-title lighter">Ebook</h4>
	<small>
	<i class="icon-double-angle-right"></i>
	<span class="label label-info arrowed-in-right arrowed">Isikan Data Ebook dengan benar</span>
	</small>
	<div class="widget-toolbar">
		
	</div>
</div>
					
					<div class="widget-body">
					<div class="widget-main">
					<div class="row-fluid">
						
							<!--PAGE CONTENT BEGINS-->

						<form class="form-horizontal" action="?id=tambah_ebook" method="post"  role="form" enctype="multipart/form-data">
								
								<input type="hidden" name="id_daftar" value="<?php echo $id_daftar; ?>">
		
						
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Judul :</label> 

									<div class="col-sm-9">
										<input type="text" name="judul" id="penerima" class="col-xs-10 col-sm-5" placeholder="Judul Ebook" required value="<?php echo $judul;?>"/>
									</div>
					
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Penulis :</label> 

									<div class="col-sm-9">
										<input type="text" name="penulis" id="alamat" class="col-xs-10 col-sm-5" placeholder="Nama Penulis" required value="<?php echo $penulis;?>"/>
									</div>
					
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Penerbit :</label> 

									<div class="col-sm-9">
										<input type="text" name="penerbit" id="penerbit" class="col-xs-10 col-sm-5" placeholder="Nama Penerbit" required value="<?php echo $penerbit;?>"/>
									</div>
					
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Tahun :</label> 

									<div class="col-sm-9">
										<input type="number" name="tahun" id="penerbit" class="col-xs-10 col-sm-5" placeholder="Tahun Terbit" required value="<?php echo $tahun;?>"/>
									</div>
					
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Jenis Ebook :</label> 

									<div class="col-sm-9">
										<select name="id_ebookjenis">
											<option value="" selected>- Nama Jenis -</option>
											<?php
									
											$q = mysql_query("select * from digilib_ebookjenis where status='0'"); //choose the city from indonesia only

											while ($row1 = mysql_fetch_assoc($q)){
											?>
										  <option value="<?php echo $row1['id_ebookjenis'] ?>" <?php if ($row1['id_ebookjenis'] == $id_ebookjenis ) {
										  	echo "selected";
										  }else
										  {
										  	echo "";
										  	}?> ><?php echo $row1['nama'] ?></option>
										<?php
										}
										?>
										</select>

									</div>
								</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Kategori Ebook :</label> 

									<div class="col-sm-9">
									<select name="id_ebookkategori">
										<option value="">- Nama Kategori -</option>
										<?php
								
										$q = mysql_query("select * from digilib_ebookkategori where status = '0'"); //choose the city from indonesia only
										
										while ($row1 = mysql_fetch_assoc($q)){
											?>
										  <option value="<?php echo $row1['id_ebookkategori'] ?>" <?php if ($row1['id_ebookkategori'] == $id_ebookkategori ) {
										  	echo "selected";
										  }else
										  {
										  	echo "";
										  	}?> ><?php echo $row1['nama'] ?></option>
										<?php
										}
										?>
									</select>
									</div>
								</div>
		
								
							<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Abstraksi:</label> 

									<div class="col-sm-9">
							<textarea id="editor1" name="abstraksi" rows="10" cols="80" value="<?php echo $abstraksi;?>" required>
                               <?php echo $abstraksi;?>
                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1' );
                            </script>
									</div>
					
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Lisensi :</label> 

									<div class="col-sm-9">
										<input type="text" name="lisensi" id="jumlah" required class="col-xs-10 col-sm-5" placeholder="" value="<?php echo $lisensi;?>"/>
									</div>
					
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="nama">Copyright :</label> 

									<div class="col-sm-9">
										<input type="text" name="copyright" id="jumlah" required class="col-xs-10 col-sm-5" placeholder="" value="<?php echo $copyright;?>"/>
									</div>
					
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="file">Upload PDF :</label> 

									<div class="col-sm-9">
										
											<input type="file" name="file" id="jumlah"  class="col-xs-10 col-sm-5" placeholder=""/>
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