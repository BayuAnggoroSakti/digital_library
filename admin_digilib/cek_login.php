
<?php
error_reporting(0);
include "config/koneksi.php";
function anti_injection($data){
$filter=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
return $filter;
}
$user = anti_injection($_POST['username']);
$pass = anti_injection(md5($_POST['password']));

if (!ctype_alnum($user) OR !ctype_alnum($pass)){
echo "<div id='gagal' class='alert alert-danger'>Maaf anda bukan Administrator</div>";

}


// pastikan username dan password adalah berupa huruf atau angka.

$login=sprintf("SELECT * FROM digilib_admin WHERE username='$user' AND password='$pass'", mysql_real_escape_string($user), mysql_real_escape_string($pass));
$cek_lagi=mysql_query($login);
$ketemu=mysql_num_rows($cek_lagi);
$r=mysql_fetch_array($cek_lagi);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION['id_admin']     = $r['id_admin'];
    $_SESSION['nama']     = $r['nama'];
      $_SESSION['username']     = $r['username'];
  $_SESSION['password']     = $r['password'];
  $_SESSION['telphp']     = $r['telphp'];
  $_SESSION['delete']    = $r['delete'];
  
  
  
  
  if($_SESSION['username']!==''){
	echo "<div id='sukses' class='alert alert-info'><strong>BERHASIL...</strong><button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div><script>window.location ='media.php?home'</script>";

  } 
}
else{

  echo "<div id='gagal' class='alert alert-danger'>Mohon maaf username & password anda salah<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";
}

?>
