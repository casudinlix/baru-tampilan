<?php 
//error_reporting(0);
include_once '../../setting/server.php';

	$kode =$_POST['kode'];
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis'];
	$kategori = $_POST['kategori'];
	$merk = $_POST['merk'];
	$deskripsi = $_POST['deskripsi'];
	$qtymin = $_POST['qtymin'];
	$qtymax = $_POST['qtymax'];
	$stock = $_POST['stock'];
	$berat = $_POST['berat'];

	$foto= $_FILES['gambar']['name'];

$acak = $kode."-".rand(1,99);
$unic = $acak.$foto;
$u=$conn->query("SELECT * FROM m_produk WHERE id_produk='$kode'");
$us=$u->fetch_array();
if(file_exists("../../produk/".$us['gambar'])){
	unlink("../../produk/".$us['gambar']);
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../../produk/".$acak.$_FILES['gambar']['name']);

	$query = "UPDATE m_produk SET nama_produk='$nama', jenis='$jenis', kategori='$kategori', merk='$merk', deskripsi='$deskripsi' , berat='$berat' , qty_min='$qtymin', qty_max='$qtymax',stock='$stock', gambar='$unic' WHERE id_produk='$kode'";
	$hasil = $conn->query($query);
	$query2=$conn->query("UPDATE stock SET  stock='$stock' WHERE id_produk='$kode'");
}if ($hasil) {
	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	echo "<script>window.location = '../produk.php';</script>";
}else {
	echo "GAGAL".$query."<br>".$conn->error;
	//echo "<script>window.alert('Data Gagal Disimpan');</script>";
	//echo "<script>window.location = 'produk.php';</script>";
}






 ?>