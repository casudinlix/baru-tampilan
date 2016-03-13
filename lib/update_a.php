<?php
require '../setting/server.php';
require'../setting/session.php';

if (isset($_GET['profil'])) {
	$id = $_GET['id'];
}

	$nama = htmlentities($_POST['nama']);
	$email = htmlentities($_POST['email']);
	$alamat = htmlentities($_POST['alamat']);
	$tlp = htmlentities($_POST['tlp']);

	$sql = "UPDATE login SET nama='$nama', email='$email',alamat='$alamat',tlp='$tlp' WHERE id='".$_SESSION['id']."'";

	if ($conn->query($sql)===TRUE) {
		echo "<script>window.alert('Data Berhasil Update');</script>";
	echo "<script>window.location = '../administrator/profil.php';</script>";
	}else{
		echo "ERROR<br/>".$conn->error;
	}

	


$conn->close();



	
?>