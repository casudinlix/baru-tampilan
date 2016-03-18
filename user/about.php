<?php

include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/menu_user.php';
if (isset($_GET['profil'])) {
	$id = $_GET['id'];
}

$query_pelanggan = "SELECT * FROM profile";
	 $hasil = $conn->query($query_pelanggan);
	 if ($hasil->num_rows > 0) {
	 	while ($data = $hasil->fetch_assoc())  {


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	
 	
 </head>
 <body>
 <div id="page-wrapper" align="center">
 
 <table class="table table-striped">
 	<img src="../img/ico.jpg" class="img-circle" width="300px" height="300px"/>
 <br>
  <label><h1>MISI</h1></label><p> <?php echo $data['misi']; ?></p><br>
  <label><h1>VISI:</h1></label> <p><?php echo $data['visi']; ?></p><br>
  <label><h1>Alamat:</h1></label> <p><?php echo $data['alamat']; ?></p><br>



 	</table>

 </body>
 </html>

 <?php 	}
	 }


/*$nama_file=$_FILES['foto']['name'];
	$tmp_file=$_FILES['foto']['tmp_name'];
	move_uploaded_file($tmp_file, 'foto/'.$nama_file);
*/
	 ?>


