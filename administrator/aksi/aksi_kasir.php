<?php 
include "../../setting/server.php";
include "fungsi_order.php";
$tgl=$_POST['tgl'];
$id_order=$_POST['id_order'];
$id_produk=$_POST['id_produk'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$type=$_POST['type'];
$pembeli=$_POST['pembeli'];

$dt=$conn->query("SELECT * FROM m_produk WHERE id_produk='$id_produk'");
$data=$dt->fetch_array();
$jual = $conn->query("SELECT * FROM stock WHERE id_produk='$id_produk'");
$terjual = $jual->fetch_array();

$sisa=$data['stock']-$jumlah;
$terjual1=$terjual['terjual']+$jumlah;
$conn->query("UPDATE m_produk SET stock='$sisa' WHERE id_produk='$id_produk'");
$conn->query("UPDATE stock SET stock='$sisa' WHERE id_produk='$id_produk'");
$conn->query("UPDATE stock SET terjual='$terjual1' WHERE id_produk='$id_produk'");

$insert = $conn->query("INSERT INTO transaksi (id_order,id_produk,qty,username,tanggal,type_order,status) VALUES(
	'$kd','$id_produk','$jumlah','$pembeli','$tgl','$type','Lunas')");
if (!$insert) {
	echo $conn->error;
}else{
	echo "<script>window.alert('Oke');</script>";
	echo "<script>window.location ='../penjualan.php';</script>";
}
 ?>

