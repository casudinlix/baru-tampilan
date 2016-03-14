<?php 
include "../../setting/server.php";
include "../../setting/session.php";
$id = $_POST['id'];
$isi = $_POST['feedback'];
$idt=$_SESSION['nama'];
$simpan = $conn->query("INSERT INTO komentar(username,id_order,isi) VALUES('$idt','$id','$isi')");

$update= $conn->query("UPDATE transaksi SET status='Barang Sudah Diterima' WHERE id_order='$id'");
if ($simpan) {
	echo "<script>window.alert('Terimakasih , Atas Feedback Anda');</script>";
	echo "<script>window.location = '../transaksi.php';</script>";
}else{
	echo $conn->error;
}

 ?>