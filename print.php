<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wijaya Motor Bekasi</title>
	 <link rel="shortcut icon" class="img-circle"  href="<?php echo $host; ?>/img/ico.jpg">
	<link rel="icon" class="img-circle" href="img/ico.jpg">
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
	<link rel="shortcut icon" class="img-circle"  href="img/ico.jpg">
	<link rel="icon" class="img-circle" href="<?php echo $host; ?>/img/ico.jpg">
	
<style type="text/css">
	.align {
		vertical-align: 6px;
		/*padding-bottom: 10px;*/
	}

	@media print{
		input[type=submit],
		input[type=reset],
		input[type=button] {
			display: none;
		}

		a.button.round.warning { display: none; }
	}
</style>

<?php
include "setting/server.php";


// $query = mysql_query("SELECT id_session FROM orders_temp WHERE id_session = '$idt'");
// $numRow = mysql_num_rows($query);
// if ($numRow == 0) {
// 	echo "<script>window.alert('Keranjang Belanja Anda Masih Kosong');</script>";
// 	echo "<script>window.location = '../index.php';</script>";
// }

$id = $_GET['id_order'];
$idt =$_GET['username'];
$profil = $conn->query("SELECT * FROM profile");
$aku =$profil->fetch_array();

$query = $conn->query("SELECT * FROM login WHERE email='$idt'");
$data = $query->fetch_array();
$queryOrd = $conn->query("SELECT * FROM order_detail WHERE username='$idt'");
$dataOrd = $queryOrd->fetch_array();
?>
<table width="90%" align="left" class="">
<p>
	<tr class="">
		<td width="10%" align="left">
			<a href="#"><img class="img-polaroid" src="<?php echo $host?>/img/ico.jpg" width="70%"></a>
		</td>
		<td width="30%">
			<a href="#" class="href headerName print" align="left"><h3>Wijaya Motor</h3></a>
			
			
			<?php echo $aku['alamat']; ?></p>
			
		</td>
	</tr>
</table>
<table style="border-collapse: collapse;" width="100%" align="center"  border="1" class="table">
	<tr>
		<td colspan="8" style="padding-bottom:25px;">
			<table class=" ">
				<tr>
					<td width="118px"><b>Nama Lengkap</b></td>
					<td width="10px">:</td>
					<td><?php echo $data['nama']; ?></td>
				</tr>
				<tr>
					<td style="vertical-align:top;"><b>Alamat</b></td>
					<td style="vertical-align:top;">:</td>
					<td><?php echo $data['alamat']; ?></td>
				</tr>
				<tr>
					<td><b>Nomor Telepon</b></td>
					<td>:</td>
					<td><?php echo $data['tlp']; ?></td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td>:</td>
					<td><?php echo $data['email']; ?></td>
				</tr>
				<tr>
					<td><b>Nomor Order</b></td>
					<td>:</td>
					<td><?php echo $id ;?></td>
				</tr>
			</table>
		</td>
	</tr>
	<table class="table table-bordered" border="1">
	<tr>
		<th width="25px">No</th>
		<th width="305px">Barang</th>
		<th width="190px">Harga Satuan</th>
		<th width="95px">Jumlah</th>
		<th width="190px">Berat</th>
		<th width="190px">Sub Total</th>
		
	</tr>
	<?php
		$no = 1;
		$total = 0;
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
			<td align="center">Rp. <?php echo $dataPro['harga']; ?></td>
			<td align="center"><?php echo $dataTrs['qty']; ?></td>
			<td align="center"><?php echo $dataTrs['biaya'] ?>/Kg</td>

			<td align="center">Rp. <?php echo $subtotal+$biaya; ?></td>
			
		</tr>
		<?php 
			$no++;
		 	}
		?>
		
		<tr style="height:50px;">
			<td colspan="5" align="right"><b style="margin-right: 3px;"><h3>Total Biaya</h3></b></td>
			<td align="center" rowspan="6" ><b>Rp. <?php echo $total+$biaya; ?></b></td>

		</tr>
		</table>


<div style="padding:10px 0 0 23px;">
	<input type="button" class="btn btn-success" onclick="window.print();" value="Cetak Bukti Transaksi" >
	
	<a href="administrator/order.php?id=<?php echo $id ;?>" class="button round warning btn btn-warning">Kembali</a>
</div>
