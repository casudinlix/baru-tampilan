<?php 
include_once '../setting/server.php';
include '../menu/head_admin.php';
include '../menu/tengah_admin.php';
error_reporting(0);
$id = $_GET['id'];
//$query = $conn->query("SELECT * FROM order_user, m_produk WHERE username='$idt'AND order_user.id_produk=m_produk.id_produk ");

$query =$conn->query("SELECT * FROM transaksi WHERE id_order='$id'");
$data = $query->fetch_array();


$queryOrd = $conn->query("SELECT * FROM order_detail WHERE id_order='$id' ");
$dataOrd =$queryOrd->fetch_array();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

<div id="page-wrapper" >

<table class="table table-bordered">
                      <tr class="success">
<font color="black">

<td colspan="8" rowspan="" headers=""></td>
<b>Data pelanggan <pre><?php echo $data['username']; ?></b>
<br><b>Nomor Order :<?php echo $id = $_GET['id']; ?>
						<td></td>

					</tr>
					</td>

</b></pre>

<tr>
			<th width="25px">No</th>
			<th width="305px">Barang</th>
			<th width="190px">Harga Satuan</th>
			<th width="95px">Jumlah</th>
			<th width="95px">Total Berat</th>
			<th width="95px">Biaya Kirim</th>
			<th width="190px">Sub Total</th>
			<th width="190px">Bukti</th>
			<th width="190px">Status</th>
		</tr>
		<tbody>
			<?php
			$no = 1;
			$total = 0;
			$berat =0;
			$queryTrs = $conn->query("SELECT * FROM transaksi WHERE id_order='$dataOrd[id_order]'");
			while($dataTrs = $queryTrs->fetch_array()){

				$queryPro = $conn->query("SELECT * FROM m_produk WHERE id_produk='$dataTrs[id_produk]'");
				$dataPro = $queryPro->fetch_array();
				$subtotal = $dataPro['harga'] * $dataTrs['qty'];
				$biaya =$dataTrs['biaya'] + $dataTrs['qty'] ;
				
				$total = $total + $subtotal;
				
		?>

				
			<td align="center"><?php echo $no; ?></td>
			<td><?php echo $dataPro['nama_produk']; ?></td>
			<td align="center">Rp. <?php echo number_format($dataPro['harga']); ?></td>
			<td align="center"><?php echo $dataTrs['qty']; ?></td>
			<td align="center"><?php echo $dataPro['berat'] ?>/Kg</td>
			<td align="center">Rp,-<?php echo number_format($dataTrs['biaya']) ?>/Kg</td>
			<td align="center">Rp. <?php echo $subtotal+$biaya; ?></td>
			<td colspan="" rowspan="" headers=""><a href="../user/bukti/<?php echo $dataTrs['bukti_transfer']; ?>"  target='_blank' title="">Attacment</td></a>
			<td colspan="" rowspan="" headers=""><?php echo $dataTrs['status']; ?></td>
		</tr>
		<?php
			$no++;
		 	}
		?>
		
		<tr style="height:50px;">
			<td colspan="8" align="right"><b style="margin-right: 3px;">Total Biaya</b></td>
			<td align="center" rowspan="7" ><b>Rp. <?php echo number_format($total+$biaya); ?></b></td>
			
		</tr>
	
	</table>
	<?php 
$query = $conn->query("SELECT * FROM transaksi WHERE id_order='$id'");
$data  = $query->fetch_array();
$status = $data['status'];

	if ($data['status']=="Belum Dibayar"){
echo '<strong style="color: red;">Transaksi Belum di bayar</strong>';
echo "<i class='btn btn-success glyphicon glyphicon-chevron-left' ><a href='cek_order.php'>Kembali</a></i>";

?>
<td>&nbsp;<i class="btn btn-danger glyphicon glyphicon-remove-circle" ><a href="aksi/aksi_order.php?act=reject&amp;id=<?php echo $id; ?>"onclick="return confirm('Apakah anda yakin Reject Order Ini?')">Reject</a></i></td>

<?php
 }else{
 	if ($data['status']=="Barang sudah dikirim") {
 		echo '<strong style="color: red;">Sudah Dibayar</strong>&nbsp;';
 		echo "<i class='btn btn-success glyphicon glyphicon-chevron-left' ><a href='cek_order.php'>Kembali</a></i>";

 	}else{
 		if ($data['status']=='Transaksi Ditolak') {
			echo '<strong style="color: red;">Transaksi Sudah Di Reject </strong>';
			echo "<i class='btn btn-success glyphicon glyphicon-chevron-left' ><a href='cek_order.php'>Kembali</a></i>";
 			
 		}else{
 			if ($data['status']=="Barang Sudah Diterima") {
 				echo '<strong style="color: Blue;">Transaksi Done</strong>';
 				echo "<i class='btn btn-success glyphicon glyphicon-chevron-left' ><a href='cek_order.php'>Kembali</a></i>";
 				

 			}else{
 				if ($data['status']=="Lunas") {
 		echo "<strong style='color: red;'>Sudah Dibayar Kasir</strong>&nbsp;";
 		echo "<i class='btn btn-success glyphicon glyphicon-chevron-left' ><a href='cek_order.php'>Kembali</a></i>";
}else{
?>

<td><i class="btn btn-warning glyphicon glyphicon-check" ><a href="aksi/aksi_order.php?act=approve&amp;id=<?php echo $id; ?>" onclick="return confirm('Apakah anda yakin Approve Order ini?')">Approve</a></i></td>
<i class="btn btn-success glyphicon glyphicon-chevron-left" ><a href='cek_order.php'>Kembali</a></i>

<td>
<i class="btn btn-info glyphicon glyphicon-print"><a href="<?php echo $host; ?>/print.php?id_order=<?php echo $id; ?>&amp;username=<?php echo $data['username'] ?>">Print</a></i></td>

<?php
}
}
	}
}
	}
	?>

</div>
		</tbody>
</div>
<tr>
			<td align="center" colspan="4">
				<nav>
					<ul class="pagination">

					</ul>
					</nav>
					</td></tr></td></tbody></b></font></tr></table></div>

<?php include $host.'/menu/bawah_admin.php'; ?>
</body>
</html>

