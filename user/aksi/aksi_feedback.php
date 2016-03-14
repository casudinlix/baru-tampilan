<?php 
include "../../setting/server.php";
include "../../setting/session.php";
$id = $_POST['id'];
$isi = $_POST['feedback'];

$simpan = $conn->query("INSERT INTO komentar (username,id_order,isi)VALUES('$idt','$id','$isi')");
$update= $conn->query("UPDATE transaksi SET status='Barang Sudah Diterima' WHERE id_order='$id'");
echo "<script>window.alert('Terimakasih , Atas Feedback Anda');</script>";
	echo "<script>window.location = '../transaksi.php';</script>";
 ?>