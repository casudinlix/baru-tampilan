<?php 
require '../../setting/server.php';

$id =$_POST['id'];

$foto= $_FILES['foto']['name'];

$u=$conn->query("SELECT * FROM login WHERE id='$id'");

$us=$u->fetch_array();
if(file_exists("foto/".$us['foto'])){
	unlink("foto/".$us['foto']);
	move_uploaded_file($_FILES['foto']['tmp_name'], "../foto/".$_FILES['foto']['name']);
	$conn->query("UPDATE login set foto='$foto' where id='$id'");
	echo "<script>window.alert('Sukses!!);</script>";
	echo "<script>window.location = '../profil.php';</script>";
}else{
	move_uploaded_file($_FILES['foto']['tmp_name'], "../foto/".$_FILES['foto']['name']);
	$conn->query("UPDATE login set foto='$foto' where id='$id'");
	echo "<script>window.alert('Sukses!!);</script>";
	echo "<script>window.location = '../profil.php';</script>";

}

 ?>