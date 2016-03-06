<?php 
include "../../setting/server.php";
include "../../setting/session.php";


$queryOrd = $conn->query("SELECT * FROM order_detail WHERE username='$idt' ");
$data =$queryOrd->fetch_array();
if ($numRow = $queryOrd->num_rows == 0) {
		echo "<script>window.alert('Anda Belum melakukan Transakasi');</script>";
		echo "<script>window.location = '../user.php';</script>";

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
 	<title>Riwayat transaksi Anda</title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 <center>
 	<table>
 	<?php while ($row = $queryTrs->fetch_array()) {
 		?>
 	<tr>
 	<td colspan="" rowspan="" headers=""><a href="transaksi_detail.php?id=<?php echo $row['id_order']; ?>" title=""><?php echo $row['id_order']; ?></td></a>


 	</tr>
<?php } ?>

 	</table></center>
 </body>
 </html>