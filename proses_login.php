<?php
// memanggil file koneksi.php
include "admin_digilib/config/koneksi.php";
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
// membuat variable dengan nilai dari form
$member_id = $_POST['member_id']; // variablenya = username, dan nilainya sesuai yang dimasukkan di input name=”username” tadi
$password = md5($_POST['password']); 

$perintah = "select * from digilib_userlogin WHERE member_id = '$member_id' AND password = '$password'";
$hasil = mysql_query($perintah);
$row = mysql_fetch_array($hasil);
if ($row['member_id'] == $member_id AND $row['password'] == $password) {
	$ip = ambil_ip();
	$userlogin = $row['id_userlogin'];
 // date_default_timezone_set('Asia/Jakara');
	$date = date("Y-m-d h:i:s");
	mysql_query("INSERT INTO digilib_statistiklogin values ('','$date','$userlogin','$ip','browser')" );
session_start(); // memulai fungsi session
$_SESSION['member_id'] = $member_id;
header("location:member/index.php"); // jika berhasil login, maka masuk ke file home.php
}
else {
  header('location:login_member.php');
echo "<div id='gagal' class='alert alert-danger'>Mohon maaf username & password anda salah<button type='button' class='close' data-dismiss='alert'><i class='ace-icon fa fa-times'></i></button></div>";
}
?>


