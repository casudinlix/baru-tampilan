<?php 
error_reporting(0);
include_once '../../setting/server.php';
include 'fungsi.php';

$id =$_GET['id'];
	
	$nama = htmlspecialchars($_POST['nama']);
	$jenis = htmlspecialchars($_POST['jenis']);
	$kategori = $_POST['kategori'];
	$merk = $_POST['merk'];
	$deskripsi = htmlspecialchars($_POST['deskripsi']);
	$qtymin = htmlspecialchars($_POST['qtymin']);
	$qtymax = htmlspecialchars($_POST['qtymax']);
	$berat = htmlspecialchars($_POST['berat']);
	$tgl_masuk = $_POST['tgl'];
	$harga =htmlspecialchars($_POST['harga']);
	$stock = htmlspecialchars($_POST['stock']);
	//$diskon =$_POST['diskon'];
$foto= $_FILES['gambar']['name'];
$acak = rand(1,99);

$unic = $acak.$foto;
$u=$conn->query("SELECT * FROM m_produk WHERE id_produk='$id'");

$us=$u->fetch_array();
if(file_exists("../../produk/".$us['gambar'])){
	unlink("../../produk/".$us['gambar']);
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../../produk/".$acak.$_FILES['gambar']['name']);
	$query = "INSERT INTO m_produk(id_produk, nama_produk, jenis, kategori,merk,deskripsi, berat, qty_min, qty_max,stock,tgl_masuk, harga,gambar)
	VALUES('$kd','$nama','$jenis','$kategori','$merk','$deskripsi','$berat','$qtymin','$qtymax','$stock',NOW(),'$harga','$unic')";
$query2 = $conn->query("INSERT INTO stock VALUES('$kd','$stock',0,NOW())");
	$hasil = $conn->query($query);

}else{
	move_uploaded_file($_FILES['gambar']['tmp_name'], "../../produk/".$acak.$_FILES['gambar']['name']);
	$query = "INSERT INTO m_produk(id_produk, nama_produk, jenis, kategori,merk,deskripsi, berat, qty_min, qty_max,tgl_masuk,harga, gambar)
	VALUES('$kd','$nama','$jenis','$kategori','$merk','$deskripsi','$berat','$qtymin','qtymax',NOW(),'$harga','$unic')";
	$hasil = $conn->query($query);
$query2 = $conn->query("INSERT INTO stock VALUES('$kd','$stock',0,NOW())");
	$hasil = $conn->query($query);
}

	if ($hasil) {

	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	echo "<script>window.location = '../produk.php';</script>";
} else {
	echo "GAGAL".$query."<br>".$conn->error;
	//echo "<script>window.alert('Data Gagal Disimpan');</script>";
	//echo "<script>window.location = 'produk.php';</script>";
}






 ?>