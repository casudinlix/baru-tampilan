<?php 
include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/tengah_admin.php';
include 'halaman_transaksi.php';
$tampil2="SELECT id_order, count(id_order) AS jumlah FROM transaksi GROUP BY id_order HAVING(COUNT(id_order)> 1)";
							$hasil2=$conn->query($tampil2);
							$jmldata=$hasil2->fetch_array();
							

//$query = $conn->query("SELECT * FROM transaksi, m_produk transaksi.id_produk=m_produk.id_produk ");
//$jual=$query->fetch_array();
//

  
  ?>

 <div id="page-wrapper" >
Jumlah Order Valid : <?php echo $jmldata['jumlah']; ?>

<a style="margin-bottom:10px" href="print_laporan_penjualan.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
<table class="table table-bordered">
<div class="container">
	<tr class="wrapper warning">
	<th colspan="" rowspan="" headers="" scope="">No</th>
<th colspan="" rowspan="" headers="" scope="">Nomor Order</th>
<th colspan="" rowspan="" headers="" scope="">Kode Produk</th>
<th colspan="" rowspan="" headers="" scope="">Qty</th>
<th colspan="" rowspan="" headers="" scope="">Harga</th>
<th colspan="" rowspan="" headers="" scope="">Type Order</th>
<th colspan="" rowspan="" headers="" scope="">Biaya Kirim</th>
<th colspan="" rowspan="" headers="" scope="">Tanggal Order</th>
<th colspan="" rowspan="" headers="" scope="">status</th>
	</tr>


<tr class="success">
<?php
//$query = $conn->query("SELECT * FROM m_produk, transaksi ORDER BY id_produk ASC");
$queryTrs = $conn->query("SELECT * FROM transaksi, m_produk WHERE status='Barang sudah dikirim' AND transaksi.id_produk=m_produk.id_produk");

//$queryTrs = $conn->query("SELECT * FROM transaksi WHERE status='Barang sudah dikirim'");
$no=0;


				//$queryPro = $conn->query("SELECT * FROM m_produk");
				//$dataPro = $queryPro->fetch_array();
				
	while ($data= $queryTrs->fetch_array()) {
		# code...
	$no++;
?>
	<tbody>
		<tr class="danger">
				<td colspan="" rowspan="" headers=""><?php echo $no; ?></td>
		<td colspan="" rowspan="" headers=""><?php echo $data['id_order']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['id_produk']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['qty']; ?></td>
<td colspan="" rowspan="" headers="">Rp-,<?php echo number_format($data['harga']) ; ?>-,</td>
<td colspan="" rowspan="" headers=""><?php echo $data['type_order']; ?></td>
<td colspan="" rowspan="" headers="" class="success">Rp,-<?php echo number_format($data['biaya']) ; ?>,-/Kg</td>
<td colspan="" rowspan="" headers=""><?php echo $data['tanggal'] ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['status']; ?></td>

		</tr>
	</tbody>


</tr>
<?php 
error_reporting(0);

$subtotal = $data['harga'] * $data['qty'];
				$biaya =$data['biaya'] + $data['qty'] ;
				$total = $total + $subtotal;

} ?>
</div>
</div>
<?php 




		?>
 
 <tr class="info">
		<td colspan="8">Total Pendapatan: <i class="glyphicon glyphicon-thumbs-up"></i> <b> Rp.<?php echo number_format($total);?>-,</b>
</td>

		<td>			
		
		</td>

	</tr>
 <tr>
			<td align="center" colspan="9" class="warning">
				<nav>
					<ul class="pagination">
						<?php
							$tampil2="SELECT * FROM transaksi WHERE status='Barang sudah dikirim'";
							$hasil2=$conn->query($tampil2);
							$jmldata=$hasil2->num_rows;
							$jmlhalaman=ceil($jmldata/$batas);
						?>

						<?php if($halaman > 1): ?>
							<?php $previous = $halaman-1; ?>
							<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$previous" ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						<?php else: ?>
							<li class="disabled"><a href="" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						<?php endif ?>

						<?php for($i=1;$i<=$jmlhalaman;$i++): ?>
							<?php if($i>=($halaman-3) && $i <= ($halaman+3)): ?>
								<?php if ($i != $halaman): ?>
									<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$i" ?>"><?php echo $i; ?></a></li>
								<?php else: ?>
									<li class="active"><a><?php echo $i; ?></a></li>
								<?php endif ?>
							<?php endif ?>
						<?php endfor ?>

						<?php if($halaman < $jmlhalaman): ?>
							<?php $next = $halaman+1; ?>
							<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$next" ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						<?php else: ?>
							<li class="disabled"><a href="" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						<?php endif ?>

					</ul>
			   	</nav>
			</td>
		</tr>
</tr>
</tr>

</table>