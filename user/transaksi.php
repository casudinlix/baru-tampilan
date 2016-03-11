<?php 
include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/menu_user.php';

$query = $conn->query("SELECT * FROM m_produk");
//$query = $conn->query("SELECT * FORM order_user ot INNER JOIN m_produk p ON ot.id_produk=p.id_produk WHERE username='$idt'");
$dataPro =$query->fetch_array();
?>

<?php
$queryOrd = $conn->query("SELECT * FROM order_detail WHERE username='$idt' ");
$data =$queryOrd->fetch_array();
if ($numRow = $queryOrd->num_rows == 0) {
		echo "<script>window.alert('Anda Belum melakukan Transakasi');</script>";
		echo "<script>window.location = 'user.php';</script>";

}
$queryOrd = $conn->query("SELECT * FROM order_detail WHERE username='$idt' ");
$dataOrd =$queryOrd->fetch_array();

$queryTrs = $conn->query("SELECT id_order FROM transaksi WHERE username='$idt'");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	
 	<link rel="stylesheet" href="">
 </head>
 <body>


 <div id="page-wrapper" >
 	<table class="table table-bordered">
 	Transakasi Anda
 	<?php while ($row = $queryTrs->fetch_array()) {
 		?>
 		<td>
 	
 	<a href="transaksi_detail.php?id_order=<?php echo $row['id_order']; ?>" title=""><?php echo $row['id_order']; ?></a><br>
 	
</td>
 	<?php } ?>

 	</table>
 </body>
 </html>
