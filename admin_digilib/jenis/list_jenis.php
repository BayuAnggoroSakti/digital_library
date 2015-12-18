
<?php 
error_reporting(0);

$mod 			= isset($_GET['mod']) ? $_GET['mod'] : NULL;
$id_del 		= isset($_GET['id_n']) ? $_GET['id_n'] : NULL;

if ($mod == "del") {
	$q_del = mysql_query("UPDATE digilib_ebookjenis SET status='1' WHERE id_ebookjenis = '$id_del'");

	if ($q_del) {
		echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='icon-ok'></i>BERHASIL</strong> Data Jenis Ebook Berhasil di hapus<br/></div>";
	} else {
		echo "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='icon-remove'></i>MAAF!</strong>".mysql_error()."<br/></div>";
	}
}


$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;

if ($sesi_username != NULL || !empty($sesi_username)   ) 

{




?>

<div class="row">
<div class="col-xs-12">
<div class="alert alert-block alert-warning">
		<form action="?id=list_jenis" method="post" onsubmit="return validasi_input(this)">
	<td>
		<select name="jenis">
			<option value="" selected>- Nama Jenis -</option>
			<?php
	
			$q = mysql_query("select * from digilib_ebookjenis where status='0'"); //choose the city from indonesia only

			while ($row1 = mysql_fetch_array($q)){
			  echo "<option value=$row1[nama]>$row1[nama]</option>";
			}
			?>
		</select>

		
		<button class="btn btn-success">Cari</button>
	</td>
	</form>
			
	</div>
<h3 class="header smaller lighter blue">List Jenis Ebook</h3>
<a  href="?id=tambah_jenis" class="btn btn-app btn-purple btn-xs">
			<i class="ace-icon fa fa-pencil-square-o bigger-160"></i>
			Tambah
			<span class="badge badge-warning badge-right"></span>
			</a>
			
<div class="table-header">
	Daftar Jenis Ebook
</div>

<!-- <div class="table-responsive"> -->

<!-- <div class="dataTables_borderWrap"> -->
<div>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
<tr>
	<!-- <th class="center">
		<label class="position-relative">
			<input type="checkbox" class="ace" />
			<span class="lbl"></span>
		</label>
	</th> -->
	<th>No</th>
	<th>Nama Jenis</th>
	<th>Deskripsi</th>
	<th>AKSI</th>
</tr>
</thead>

<tbody>
<?php
$jenis = $_POST['jenis'];
if ($jenis != '') {
	$view=mysql_query("select * from digilib_ebookjenis where status = '0' and nama like '$jenis'");
}
else {
	$view=mysql_query("select * from digilib_ebookjenis where status = '0'");
}

		
$no=0;
$i=1;
while($row=mysql_fetch_array($view)){
?>	
<tr>
	<!-- <td class="center">
		<label class="position-relative">
			<input type="checkbox" class="ace" />
			<span class="lbl"></span>
		</label>
	</td> -->
	<td>
		<a href="#"><?php echo $i;?></a>
	</td>
	<td>
		<a href="#"><?php echo $row['1'];?></a>
	</td>
	<td class="hidden-480"><?php echo $row['2'];?></td>
	

	<td>
		<div class="hidden-sm hidden-xs action-buttons">
		
			<a class="green" href="?id=tambah_jenis&mod=edit&id_n=<?php echo $row[0];?>">
				EDIT<i class="ace-icon fa fa-pencil bigger-130"></i>
			</a>
				<a class="red" href="?id=list_jenis&mod=del&id_n=<?php echo $row[0];?>" onclick="return confirm('Menghapus Jenis Ebook <?php echo $row[1];?>')">
				Hapus <i class="ace-icon fa fa-trash-o bigger-130"></i>
			</a>

			
		</div>

		<div class="hidden-md hidden-lg">
			<div class="inline position-relative">
				<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
					<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
				</button>

				<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
					<li>
						<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
						</a>
					</li>

					<li>
						<a href="" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
						</a>
					</li>

					<li>
						<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</td>
</tr>
	<?php
	$i++;
	}
	?>

</tbody>
</table>
</div>
</div>

<?php
}else{
	  echo "<script>alert('Mohon Maaf anda tidak bisa akses halaman ini'); window.location = '../index.php'</script>";
}
?>	