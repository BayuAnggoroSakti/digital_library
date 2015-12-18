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
          <?php
           include "../admin_digilib/config/koneksi.php";
            $per_hal=3;
            $jumlah_record=mysql_query("SELECT COUNT(*) from digilib_ebook where status = 0");
            $jum=mysql_result($jumlah_record, 0);
            $halaman=ceil($jum / $per_hal);
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $start = ($page - 1) * $per_hal;
          ?>
        <!-- Heading Row -->
        <div class="row">
         <div class="col-md-2">
         </div>
          <div class="col-md-8">
         <h2 align="center">Search Ebook</h2>
          <form class="form-horizontal" method="GET" action="index.php">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Kata Kunci Ebook</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="q" placeholder="Masukkan Pencarian judul atau penulis atau penerbit">
                </div>
                 <div  align="center">
                  <input type="submit" value="cari" class="btn btn-primary" name="GO">
                </div>
              </div>
              
            </form>
            <!-- /.col-md-8 -->
           </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- /.row -->
      <?php

        if (isset($_GET['id_ebook']) ) {
          include "download.php";
          
          $id_ebook = $_GET['id_ebook'];
          $query = mysql_query("SELECT * from digilib_ebook where id_ebook = $id_ebook");
          $cek = mysql_num_rows($query);
          if ($cek == 0) {
             header('location:index.php');
          }
          $row = mysql_fetch_assoc($query);

          $judul = $row['judul'];
          $penulis = $row['penulis'];
          $penerbit = $row['penerbit'];
          $abstraksi = $row['abstraksi'];
          $file = $row['file'];
          $filesize = filesize($path.$file);
          $filesizex = formatSizeUnits($filesize);
      ?>
      <div class="list-group-item">
       
          <h4 class="list-group-item-heading"> <span class="glyphicon glyphicon-book" aria-hidden="true"></span><?php echo " ".$judul ?></h4>
          <hr style="size:2;">
          <b class="list-group-item-text">Penulis : </b><?php echo " ".$penulis ?><br>
          <b class="list-group-item-text">Penerbit : </b><?php echo " ".$penerbit ?><br>
          <b class="list-group-item-text">Abstraksi : </b><br><?php echo " ".$abstraksi ?>
          <b class="list-group-item-text"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download Ebook : </b><a href="download.php?file=<?php echo "../admin_digilib/files/".$file; ?>&nama_file=<?php echo $file;?>&id_ebook=<?php echo $id_ebook;?>"><?php echo $file." (".$filesizex.")"; ?></a>
          <br>
          
      </div>
      <?php
        }
        else
        {
          header('location:index.php');
        }
      ?>
<?php 
include "template_member/footer.php";
?>
<?php } ?>