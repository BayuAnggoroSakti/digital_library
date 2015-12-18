<?php
session_start(); // memulai session
unset($_SESSION['member_id']);
header("location:login_member.php"); // mengambalikan ke form_login.php
?>