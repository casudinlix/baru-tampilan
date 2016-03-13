<?php 
error_reporting(0);
include_once '../../setting/server.php';
$id = $_GET['id'];
$foto= $_FILES['foto']['name'];
$u=$conn->query("SELECT * FROM login WHERE id='$id'");

$us=$u->fetch_array();
if(file_exists("../../user/foto/".$us['foto'])){
	unlink("../../user/foto/".$us['gambar']);
	$query = "DELETE FROM login WHERE id='$id'";
$conn->query($query);
	echo "<script>window.alert('Data Berhasil Di Hapus');</script>";
	echo "<script>window.location ='../daftar_user.php';</script>";
}

 ?>