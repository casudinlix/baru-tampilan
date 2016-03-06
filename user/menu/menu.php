<?php 


if (isset($_GET['profil'])) {
	$id = $_GET['id'];
}


	 $query_pelanggan = "SELECT * FROM login WHERE id='".$_SESSION['id']."' LIMIT 1";
	 $hasil = $conn->query($query_pelanggan);
	 if ($hasil->num_rows > 0) {
	 	while ($data = $hasil->fetch_assoc()) {
	 		echo "<a href=profil.php?id=".$data['id']."=".$_SESSION['nama'].">Profil</a>"; 
	 		echo "&nbsp &nbsp &nbsp||&nbsp ";
	 		echo "<a href=pass.php?id=".$data['id']."=".$_SESSION['nama'].">Rubah Password</a>";
	 	}
	 }
	 //lihat transaksi
$query = $conn->query("SELECT username FROM order_user WHERE username = '$idt'");

 ?>

 ||<a href="http://127.0.0.1/rest/user/produk/transaksi.php" title="">Transaksi</a> ||
 ||<a href="http://127.0.0.1/rest/user/produk/pesan.php" title="">Keranjang Belanja</a> ||
 <a href="../logout.php">Keluar</a>

