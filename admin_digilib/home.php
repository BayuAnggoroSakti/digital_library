


<?php
// memanggil berkas koneksi.php


error_reporting(0);
$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
$nip			= isset($_SESSION['nip']) ? $_SESSION['nip'] : NULL;


if ($sesi_username != NULL || !empty($sesi_username)  )

{

//total ebook
$total_ebook = mysql_query("SELECT * from digilib_ebook where status=0");
$total_ebook2 = mysql_num_rows($total_ebook);

//total member
$total_member = mysql_query("SELECT * from member");
$total_member2 = mysql_num_rows($total_member);

//total jenis
$total_jenis = mysql_query("SELECT * from digilib_ebookjenis where status=0");
$total_jenis2 = mysql_num_rows($total_jenis);

//total kategori
$total_kategori = mysql_query("SELECT * from digilib_ebookkategori where status=0");
$total_kategori2 = mysql_num_rows($total_kategori);






?>


<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
             <table border="0" width="100%"> 
							<tr style="background-color:#f8f8f8;"> 
								<td align="center" colspan="3"><b style="color:#f26635;">TOTAL EBOOK</b></td> 
							</tr> 
							<tr style="background-color:#f26635;"> 
								<td align="center" colspan="3" height="50px"><h2><?php echo $total_ebook2; ?></h2></td> 
							</tr> 
				
							<tr style="background-color:#f8f8f8;"> 
								<td style="width:50%;background-color:#f8f8f8" align="center">
									<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</td> 
							</tr>
						</table>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
            <table border="0" width="100%"> 
							<tr style="background-color:#f8f8f8;"> 
								<td align="center" colspan="3"><b style="color:#a86daf;">TOTAL MEMBER</b></td> 
							</tr> 
							<tr style="background-color:#a86daf;"> 
								<td align="center" colspan="3" height="50px"><h2><?php echo $total_member2; ?></h2></td> 
							</tr> 
							<tr style="background-color:#f8f8f8;"> 
								<td style="width:50%;background-color:#f8f8f8" align="center">
									<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</td> 
							</tr>
						</table>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
               <table border="0" width="100%"> 
							<tr style="background-color:#f8f8f8;"> 
								<td align="center" colspan="3"><b style="color:#9bf254;">JENIS EBOOK</b></td> 
							</tr> 
							<tr style="background-color:#75c25a;"> 
								<td align="center" colspan="3" height="50px"><h2><?php echo $total_jenis2; ?></h2></td> 
							</tr> 
							<tr style="background-color:#f8f8f8;"> 
								<td style="width:50%;background-color:#f8f8f8" align="center">
									<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</td> 
							</tr>
						</table>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <table border="0" width="100%"> 
							<tr style="background-color:#f8f8f8;"> 
								<td align="center" colspan="3"><b style="color:#7d8dc8;">KATEGORI EBOOK</b></td> 
							</tr> 
							<tr style="background-color:#7d8dc8;"> 
								<td align="center" colspan="3" height="50px"><h2><?php echo $total_kategori2; ?></h2></td> 
							</tr> 
							<tr style="background-color:#f8f8f8;"> 
								<td style="width:50%;background-color:#f8f8f8" align="center">
									<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
								</td> 
							</tr>
						</table>
            </div><!-- ./col -->
          </div><!-- /.row -->
	
 


<?php
}else{
    echo "<script>alert('Mohon Maaf anda tidak bisa akses halaman ini'); window.location = '../index.php'</script>";
}
?>