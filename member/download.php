<?php
$path = "../admin_digilib/files/";
$filesize = filesize($path);
$filesizex = formatSizeUnits($filesize);
include "../admin_digilib/config/koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$member_id = $_SESSION['member_id'];
if (empty($_SESSION['member_id'])) {
header('location:../login_member.php');
}


$result = mysql_query("SELECT * from digilib_ebook");

 

function formatSizeUnits($bytes){
  if ($bytes >= 1073741824){
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
  }elseif ($bytes >= 1048576){
    $bytes = number_format($bytes / 1048576, 2) . ' MB';
  }elseif ($bytes >= 1024){
    $bytes = number_format($bytes / 1024, 2) . ' KB';
  }elseif ($bytes > 1){
    $bytes = $bytes . ' B';
  }elseif ($bytes == 1){
    $bytes = $bytes . ' B';
  }else{
    $bytes = '0 B';
  }
  return $bytes;
}
?>

<?php
function ambil_ip() {
foreach (array('HTTP_CLIENT_IP', 'HTTP_X_REAL_IP', 'REMOTE_ADDR', 'HTTP_FORWARDED_FOR', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED') as $key) {
    if (array_key_exists($key, $_SERVER) === true) {
      foreach (explode(',', $_SERVER[$key]) as $ip) {
        if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
          return $ip;
        }
      }
    }
  }
}
if(isset($_GET['file'])){
  $file = $_GET['file'];
  $id_ebook = $_GET['id_ebook'];
include "../admin_digilib/config/koneksi.php";
  $file_download = substr($file, 17);
  //menampilkan id_userlogin
  $select_id = mysql_query("SELECT * from digilib_userlogin where member_id='$member_id'");
  $row = mysql_fetch_assoc($select_id);
  $id= $row['id_userlogin'];
 
 //menampilkan id_ebook


  
  echo $file_download;
    $ip = ambil_ip();
    $date = date("Y-m-d h:i:s");
    $member_id = $_SESSION['member_id'];
  mysql_query("INSERT INTO digilib_statistikdownload values ('','$date','$id','$id_ebook','$ip','browser')");

  download_file($file);
}

function download_file( $fullPath ){

  if( headers_sent() )
    die('Headers Sent');

  if(ini_get('zlib.output_compression'))
    ini_set('zlib.output_compression', 'Off');

  if( file_exists($fullPath) ){

    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);

    switch ($ext) {
      case "pdf": $ctype="application/pdf"; break;
      case "exe": $ctype="application/octet-stream"; break;
      case "zip": $ctype="application/zip"; break;
      case "doc": $ctype="application/msword"; break;
      case "xls": $ctype="application/vnd.ms-excel"; break;
      case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
      case "gif": $ctype="image/gif"; break;
      case "png": $ctype="image/png"; break;
      case "jpeg":
      case "jpg": $ctype="image/jpg"; break;
      default: $ctype="application/force-download";
    }

    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);
    ob_clean();
    flush();
    readfile( $fullPath );

  } else {
    echo "<p>File tidak ada</p>";
  }
}

?>