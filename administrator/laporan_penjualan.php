<?php 
include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/tengah_admin.php';
include 'halaman_transaksi.php';
//$query = $conn->query("SELECT * FROM transaksi, m_produk transaksi.id_produk=m_produk.id_produk ");
//$jual=$query->fetch_array();
//

  
  ?>

 <div id="page-wrapper" >


<a style="margin-bottom:10px" href="print_laporan_penjualan.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak ALL Data</a>

<table class="table table-bordered">
<div class="container">
<nav>
					<ul class="pagination">
						<?php
							$tampil2="SELECT * FROM transaksi";
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

	<tr class="wrapper warning">
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-filter"></span></span>
		<select type="submit" name="status" class="form-control" onchange="this.form.submit()">
			<option>Pilih By Status ..</option>
			<?php 
			$pil=$conn->query("SELECT distinct status from transaksi order by tanggal desc");
			while($p=$pil->fetch_array()){
				?>
				<option><?php echo $p['status'] ?></option>
				<?php
			}
			?>
		</select>
	</div>

</form>

<?php 
if(isset($_GET['status'])){
	$status=htmlspecialchars($_GET['status']);
	$tg="print_penjualan_filter.php?status='$status'";
	?><a style="margin-bottom:10px" href="<?php echo $tg; ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
}else{
	$tg="print_penjualan_filter.php";
}
?>

<br/>
<?php 
if(isset($_GET['status'])){
	echo "<h4>Menampilkan Status:  <a style='color:blue'> ". $_GET['status']."</a></h4>";
}
?>

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
if(isset($_GET['status'])){
		$status=$_GET['status'];
		$brg=$conn->query("SELECT * FROM transaksi, m_produk WHERE transaksi.id_produk=m_produk.id_produk AND status='$status'");
	}else{
		$brg=$conn->query("SELECT * FROM transaksi, m_produk WHERE  transaksi.id_produk=m_produk.id_produk LIMIT $posisi,$batas");
	}
	$no=0;
	while($b= $brg->fetch_array()){
		?>

<?php
//$query = $conn->query("SELECT * FROM m_produk, transaksi ORDER BY id_produk ASC");
//$queryTrs = $conn->query("SELECT * FROM transaksi, m_produk WHERE status='Barang sudah dikirim' OR status='Barang Sudah Diterima' AND transaksi.id_produk=m_produk.id_produk LIMIT $posisi,$batas");

//$queryTrs = $conn->query("SELECT * FROM transaksi WHERE status='Barang sudah dikirim'");
//$no=0;


				//$queryPro = $conn->query("SELECT * FROM m_produk");
				//$dataPro = $queryPro->fetch_array();
				
	// 	while ($data= $queryTrs->fetch_array()) {
		# code...
	$no++;
?>
	<tbody>
		<tr class="danger">
				<td colspan="" rowspan="" headers=""><?php echo $no; ?></td>
		<td colspan="" rowspan="" headers=""><?php echo $b['id_order']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $b['id_produk']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $b['qty']; ?></td>
<td colspan="" rowspan="" headers="">Rp-,<?php echo number_format($b['harga']) ; ?>-,</td>
<td colspan="" rowspan="" headers=""><?php echo $b['type_order']; ?></td>
<td colspan="" rowspan="" headers="" class="success">Rp,-<?php echo number_format($b['biaya']) ; ?>,-/Kg</td>
<td colspan="" rowspan="" headers=""><?php echo $b['tanggal'] ?></td>
<td colspan="" rowspan="" headers=""><?php echo $b['status']; ?></td>

		</tr>
	</tbody>


</tr>
<?php 
error_reporting(0);

$subtotal = $b['harga'] * $b['qty'];
				$biaya =$b['biaya'] + $b['qty'] ;
				$total = $total + $subtotal;


} ?>
<td align="center" colspan="9" class="warning">
<?php
$pendapatan =$conn->query("SELECT sum(harga) AS total FROM m_produk,transaksi WHERE transaksi.id_produk=m_produk.id_produk");
				$data=$pendapatan->fetch_array();
 ?>
				<tr class="info">
		<td colspan="8">Total Value: <i class="glyphicon glyphicon-thumbs-up"></i> <b> Rp.<?php echo number_format($data['total']);?>-,</b>
</div>
</div>

<?php 




		?>
 
 
</td>

		<td>			
		
		</td>

	</tr>
 <tr>
			
			   	</table>
			</td>
		</tr>
</tr>
</tr>

