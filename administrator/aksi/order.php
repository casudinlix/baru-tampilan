<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';

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
 	<title>Order masuk</title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
<center>
	<style type="text/css">
	.info{
		border: 2px dashed;
		height: 70px;
		padding-top: 18px;
		padding-left: 7px;
	}
</style>
<div class="row-isi">
	<table width="95%" align="center">
		<tr>
			
		</tr>
	</table>
	<table class="border" width="95%" align="center" border="1" style="margin-top:-50px">
		<tr>
			<td colspan="8" style="padding-bottom:25px;" rowspan="" >
				<table>
					<tr>
						<td colspan="" rowspan="" headers=""><b>Email Pelanggan</b></td>
						<td>:</td>
						<td colspan="" rowspan="" headers=""><?php echo $data['username']; ?></td>
					<tr>
						<td><b>Nomor Order:</b></td>
						<td>:</td>
						<td><?php echo $id = $_GET['id']; ?></td>
					</tr>
					
				</table>
			</td>
		</tr><br/><br/><br/>
		<tr>
			<th width="25px">No</th>
			<th width="305px">Barang</th>
			<th width="190px">Harga Satuan</th>
			<th width="95px">Jumlah</th>
			<th width="95px">Total Berat</th>
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

				<tr style="height:50px;">
			<td align="center"><?php echo $no; ?></td>
			<td><?php echo $dataPro['nama_produk']; ?></td>
			<td align="center">Rp. <?php echo $dataPro['harga']; ?></td>
			<td align="center"><?php echo $dataTrs['qty']; ?></td>
			<td align="center"><?php echo $dataTrs['biaya'] ?>/Kg</td>

			<td align="center">Rp. <?php echo $subtotal+$biaya; ?></td>
			<td colspan="" rowspan="" headers=""><a href="../../user/bukti/<?php echo $dataTrs['bukti_transfer']; ?>"  target='_blank' title="">Attacment</td></a>
			<td colspan="" rowspan="" headers=""><?php echo $dataTrs['status']; ?></td>
		</tr>
		<?php
			$no++;
		 	}
		?>
		<tr style="height:50px;">
			<td colspan="5" align="right"><b style="margin-right: 3px;">Total Biaya</b></td>
			<td align="center" rowspan="3" ><b>Rp. <?php echo $total+$biaya; ?></b></td>
		</tr>
	</table>
<td><a href="aksi_order.php?act=approve&amp;id=<?php echo $id; ?>">Approve</a></td>
</div>
		</tbody>
		</table>
		<table></table>
	</form>


</center>
 </body>
 </html>

 <?php 

  ?>