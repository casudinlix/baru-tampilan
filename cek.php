<?php
// memulai session
include 'setting/server.php';
session_start();

if (isset($_POST['submit'])=='login') {
  $username=$_POST['username'];
  $pass=md5($_POST['pass']);

  $cari = $conn->query("SELECT * FROM login WHERE username='$username' AND password='$pass'");
  $row = $cari->fetch_array();
  if ($cari->num_rows > 0) {

    $_SESSION['id']=$row['id'];
    $_SESSION['nama']=$row['nama'];
    $_SESSION['username']=$row['username'];
    $_SESSION['email']=$row['email'];
    $_SESSION['confirm']=$row['confirm'];
    $_SESSION['role']=$row['role'];
    $_SESSION['foto']=$row['foto'];



}
}
if (isset($_SESSION['confirm'])){

	if ($_SESSION['confirm']=="N") {
		die("Akun Anda Belum AKTIF<a href='login.php' >LOGIN</a>");

	}
}
if (isset($_SESSION['role']))
{
 // jika level administrator
 if ($_SESSION['role'] == "1"){

   	echo "<script>window.location.assign('administrator/administrator.php')</script>";
   }
   // jika kondisi level user maka akan diarahkan ke halaman user 
   if ($_SESSION['role'] == "2")
   {
       echo "<script>window.location.assign('user/user.php')</script>";
   }

}
if ($_SESSION['role'] == "3") {
	echo "<script>window.location.assign('admin/admin.php')</script>";
}
if (!isset($_SESSION['role']))
{
 echo "<script>window.alert('User Dan Password Anda Kurang Tepat');</script>";
 echo "<script>window.location ='index.php';</script>";

 //echo "<script>window.location.assign('index.php')</script>";
}
 ?>