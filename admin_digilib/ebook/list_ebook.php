<a  href="?id=tambah_ebook" class="btn btn-app btn-purple btn-xs">
			<i class="ace-icon fa fa-pencil-square-o bigger-160"></i>
			Tambah
			<span class="badge badge-warning badge-right"></span>
			</a>
			
<?php 
error_reporting(0);

$mod 			= isset($_GET['mod']) ? $_GET['mod'] : NULL;
$id_del 		= isset($_GET['id_n']) ? $_GET['id_n'] : NULL;

if ($mod == "del") {
	$q_del = mysql_query("UPDATE digilib_ebook SET status='1' WHERE id_ebook = '$id_del'");

	if ($q_del) {
		echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong><i class='icon-ok'></i>BERHASIL</strong> Data Ebook Berhasil di hapus<br/></div>";
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
<h3 class="header smaller lighter blue">List Ebook</h3>
<div class="table-header">
	Daftar Semua Ebook
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
	<th>Judul</th>
	<th>Penulis</th>
	<th class="hidden-480">Penerbit</th>

	<th>
		<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
		Abstraksi
	</th>
	<th class="hidden-480">Tahun</th>
	<th>AKSI</th>
</tr>
</thead>

<tbody>
<?php
$view=mysql_query("select * from digilib_ebook where status='0'order by datetime desc");
		
$no=0;
$i=1;

while($row=mysql_fetch_array($view)){
	$pecah_abstraksi = substr($row['7'], 0, 200);
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
		<a href="#"><?php echo $row['3'];?></a>
	</td>
	<td class="hidden-480"><?php echo $row['4'];?></td>
	<td class="hidden-phone"><?php echo $row['5'];?></td>
	<td><?php echo $pecah_abstraksi;?></td>

	<td class="hidden-480">
		<span><?php echo $row['6'];?></span>
	</td>

	<td>
		<div class="hidden-sm hidden-xs action-buttons">

			<a class="green" href="?id=tambah_ebook&mod=edit&id_n=<?php echo $row[0];?>">
				<i class="ace-icon fa fa-pencil bigger-130"></i>
			</a>

			<a class="red" href="?id=list_ebook&mod=del&id_n=<?php echo $row[0];?>" onclick="return confirm('Menghapus Judul Ebook <?php echo $row[3];?>')">
				<i class="ace-icon fa fa-trash-o bigger-130"></i>
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