<?php
// memulai session
session_start();


if (isset($_SESSION['role']))
{
 // jika level admin
 if ($_SESSION['role'] == "1")
   {   
   echo "Selamat Datang&nbsp".$_SESSION['nama']."</br>";
   echo "<a href='../administrator.php'> Back </a>";
   include_once 'atas_admin.php';

   }
   // jika kondisi level user maka akan diarahkan ke halaman lain
   else if ($_SESSION['role'] == "2")
   {
       echo "Selamat Datang &nbsp;".$_SESSION['nama']."<br/>";
       
   }
   elseif ($_SESSION['role']=="3") {
   	echo "Selamat Datang&nbsp".$_SESSION['nama']."<br/>";
    $_SESSION['email'];
   }
}
if (!isset($_SESSION['role']))
{
 header('location:../fail.php');
}
if(!isset($_SESSION['email'])){
    $idt = date("YmdHis");
    $_SESSION['email'] = $idt;
}
$idt = $_SESSION['email'];
 ?>