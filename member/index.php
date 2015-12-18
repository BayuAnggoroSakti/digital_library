<?php
session_start();
if (empty($_SESSION['member_id'])) {
header("location:../login_member.php"); 
}
else {
?>
<?php 
include "template_member/header.php";
?>
<div class="container">
  <div class="row">
         <div class="col-md-2">
         </div>
          <div class="col-md-8">
         <h2 align="center">Search Ebook</h2>
          <form class="form-horizontal" method="get" action="index.php">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Kata Kunci Ebook</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="q" required placeholder="Masukkan Pencarian judul atau penulis atau penerbit">
                </div>
                 <div  align="center">
                  <input type="submit" value="GO" class="btn btn-primary" name="cari">
                </div>
              </div>
              
            </form>
            <!-- /.col-md-8 -->
           </div>
            <div class="col-md-2">
            </div>
        </div>
<?php
include "../admin_digilib/config/koneksi.php";
//membentuk klausa where pencarian
$where = '';
if(isset($_GET['q']) && $_GET['q']){
  $q = $_GET['q'];
   $where .= " where status = 0 and (judul like '%$q%' or penulis like '%$q%' or penerbit like '%$q%')";
   $sqlCount = "select count(id_ebook) from digilib_ebook".$where;
  
  $rsCount = mysql_fetch_array(mysql_query($sqlCount));
  $banyakData = $rsCount[0];
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $limit = 3;
  $mulai_dari = $limit * ($page - 1);
  $sql_limit = "select * from digilib_ebook {$where} order by datetime desc limit $mulai_dari, $limit";
  $hasil = mysql_query($sql_limit);
   echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><center>Pencarian dengan kata kunci <strong>$q</strong> </center></div>";
  if ($banyakData > 0) {
    echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong>Ditemukan $banyakData Ebook yang sesuai</strong></div>";
  }
  include "download.php";
  while ($row = mysql_fetch_array($hasil)) 

  {
    $judul = $row['judul'];
          $id_ebook = $row['id_ebook'];
          $penulis = $row['penulis'];
          $penerbit = $row['penerbit'];
          $abstraksi = $row['abstraksi'];
          $file = $row['file'];
          $pecah_abstraksi = substr($abstraksi, 0, 250);
          $filesize = filesize($path.$file);
          $filesizex = formatSizeUnits($filesize);
 ?>
  <div class="list-group-item">
       
          <a href="detail_ebook.php?id_ebook=<?php echo $id_ebook; ?>"><h4 class="list-group-item-heading"> <span class="glyphicon glyphicon-book" aria-hidden="true"></span><?php echo " ".$judul ?></h4></a>
          <hr style="size:2;">
          <b class="list-group-item-text">Penulis : </b><?php echo " ".$penulis ?><br>
          <b class="list-group-item-text">Penerbit : </b><?php echo " ".$penerbit ?><br>
           <b class="list-group-item-text">Abstraksi : </b><br><?php echo " ".$pecah_abstraksi.". . ." ?><br>
          <a href="detail_ebook.php?id_ebook=<?php echo $id_ebook; ?>"><b class="list-group-item-heading"> Detail Abstraksi. . .</b></a>
          <hr>
            <b class="list-group-item-text"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download Ebook : </b><a href="download.php?file=<?php echo "../admin_digilib/files/".$file; ?>&nama_file=<?php echo $file;?>&id_ebook=<?php echo $id_ebook;?>"><?php echo $file." (".$filesizex.")"; ?></a>
          
      </div>
      <br>
 <?php
}
echo "<nav><ul class='pagination'>";
if ($banyakData != 0) {
 $banyakHalaman = ceil($banyakData / $limit);

for ($i = 1; $i <= $banyakHalaman; $i++) {
 if ($page != $i) {
  
 echo '<li class=""><a href="index.php?page=' . $i .($where ? '&q='.$_GET['q'] : ''). '">'.$i. '<span class="sr-only">(current)</span></a></li>';
 } else {
 echo " <li class='active'><a href='#'>$i <span class='sr-only'>(current)</span></a></li>";
 }
}
echo " </ul></nav>";

}
else
{
  echo "<div class='alert alert-danger'><center><button type='button' class='close' data-dismiss='alert'><i class='icon-remove'></i></button><strong>Maaf, tidak ditemukan data ebook yang sesuai</strong></center></div>";
}

?>
                
<?php
}

?>

<?php 
include "template_member/footer.php";
?>
<?php } ?>