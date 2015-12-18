
<?php
include "../config/koneksi.php";
$sesi_username      = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;

if ($sesi_username != NULL || !empty($sesi_username)   ) 

{
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];

?>

<html>
  <head>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
var awal = '<?php echo $awal ?>';
var akhir = '<?php echo $akhir ?>';
if (awal != "" && akhir !="") {
  var sampai = ' sampai ';
}
else
{
  var sampai = '';
}

  var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Statistik Download Ebook Berdasarkan useragent'+' '+awal+sampai+akhir
         },
         xAxis: {
            categories: ['Useragent']
         },
     plotOptions: {
bar: {
dataLabels: {
enabled: true
}
}
},
credits: {
enabled: true
},
tooltip: {
valueSuffix: ' '
},
         yAxis: {
            title: {
               text: 'Jumlah Download'
            }
         },
              series:           
            [
            <?php 
           
           $sql   = "SELECT distinct useragent FROM digilib_statistikdownload ";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
              $merek=$ret['useragent'];  
                if ( $awal != '' && $akhir != '') {
                      $sql_jumlah   = "SELECT count(id_statistikdownload) as jum FROM digilib_statistikdownload where useragent = '$merek' and datetime BETWEEN '$awal' and '$akhir'";

                }
                else{
                   $sql_jumlah   = "SELECT count(id_statistikdownload) as jum FROM digilib_statistikdownload where useragent = '$merek'"; 
                }
              
                               
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jum'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $merek; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });  
</script>
  </head>
  <body>  
    <div id='container' class="alert alert-block alert-danger"></div>   
   
  </body>
</html>
<?php
}else{
    echo "<script>alert('Mohon Maaf anda tidak bisa akses halaman ini'); window.location = '../index.php'</script>";
}
?>  