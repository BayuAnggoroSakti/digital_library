
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
            text: 'Statistik Login Member'+' '+awal+sampai+akhir
         },
         xAxis: {
            categories: ['Member']
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
               text: 'Jumlah Berkunjung'
            }
         },
              series:           
            [
            <?php 
           
           $sql   = "SELECT distinct member_name FROM digilib_statistiklogin ds, digilib_userlogin du, member m where ds.id_userlogin = du.id_userlogin and du.member_id = m.member_id";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
              $merek=$ret['member_name'];  
                if ( $awal != '' && $akhir != '') {
                      $sql_jumlah   = "SELECT count(id_statistiklogin) as jum FROM digilib_statistiklogin ds, digilib_userlogin du, member m 
                     where ds.id_userlogin = du.id_userlogin and du.member_id = m.member_id and ds.datetime BETWEEN '$awal' and '$akhir' and member_name ='$merek' ";

                }
                else{
                   $sql_jumlah   = "SELECT count(id_statistiklogin) as jum FROM digilib_statistiklogin ds, digilib_userlogin du, member m 
                     where ds.id_userlogin = du.id_userlogin and du.member_id = m.member_id and member_name ='$merek'"; 
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