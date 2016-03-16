<?php

include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/tengah_admin.php';
if (isset($_GET['profil'])) {
	$id = $_GET['id'];
}

$query_pelanggan = "SELECT * FROM login WHERE id='".$_SESSION['id']."'LIMIT 1";
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
 
 <form action="../lib/update_a.php" method="POST" accept-charset="utf-8">
 <table class="table table-striped">
 	<img src="foto/<?php echo $data['foto'];?>" width="200px" height="200px"/>
 <br>
  <label>Nama: <?php echo $data['nama']; ?></label><br>
  <label>Email: <?php echo $data['email']; ?></label><br>
  <label>Alamat: <?php echo $data['alamat']; ?></label><br>
  <label>Nomor Telphon: <?php echo $data['tlp']; ?></label><br>



 	</table>
 	
 	<li class="active-link">
                        <a href="update_profil.php?id=<?php echo $data['id']; ?>"><i class="glyphicon glyphicon-cog"></i>Edit Profil<span class="badge"></span></a>
                    </li>
                    <li class="active-link">
                        <a href="foto.php"><i class="glyphicon glyphicon-picture"></i>Ganti Foto <span class="badge"></span></a>
                    </li>
                    <li class="active-link">
                        <a href="pass.php?id=<?php echo $data['id']; ?>"><i class="glyphicon glyphicon-leaf "></i>Ganti Password <span class="badge"></span></a>
                    </li>
                   

 </form>
 	
 </body>
 </div>
 
 </html>

 <?php 	}
	 }


/*$nama_file=$_FILES['foto']['name'];
	$tmp_file=$_FILES['foto']['tmp_name'];
	move_uploaded_file($tmp_file, 'foto/'.$nama_file);
*/
	 ?>


