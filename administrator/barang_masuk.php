<?php 
include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/tengah_admin.php';
include '../halaman.php';
$tampil2="SELECT * FROM m_produk";
							$hasil2=$conn->query($tampil2);
							$jmldata=$hasil2->num_rows;
 ?>
 <div id="page-wrapper" >

      	
<form action="cari_barang.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<a style="margin-bottom:10px" href="print_barang_masuk.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
Jumlah Barang : <?php echo $jmldata; ?>

<table class="table table-bordered">
<div class="container">
	<tr class="wrapper warning">
	<th colspan="" rowspan="" headers="" scope="">Kode</th>
<th colspan="" rowspan="" headers="" scope="">Nama Produk</th>
<th colspan="" rowspan="" headers="" scope="">Qty</th>
<th colspan="" rowspan="" headers="" scope="">Jenis</th>
<th colspan="" rowspan="" headers="" scope="">Harga</th>
<th colspan="" rowspan="" headers="" scope="">Tanggal Masuk</th>

	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=$_GET['cari'];
		$brg=$conn->query("SELECT * FROM m_produk WHERE nama_produk LIKE '%$cari%' OR kategori LIKE '%$cari%'");
	}else{
$brg = $conn->query("SELECT * FROM m_produk LIMIT $posisi,$batas");

	}

	?>

<tr class="success">
<?php while ($data=$brg->fetch_array()) {

 ?>
	<tbody>
		<tr class="danger"><td colspan="" rowspan="" headers=""><?php echo $data['0']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['1']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['9']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['3']; ?></td>
<td colspan="" rowspan="" headers="">Rp-,<?php echo number_format($data['12']); ?>,-</td>
<td colspan="" rowspan="" headers="" class="success"><?php echo $data['10']; ?></td>


		</tr>
	</tbody>


</tr>

</div>
</div>
<?php 

}
 ?>
 <tr>
		<td colspan="4">Total Modal</td>
		<td>			
		<?php 
		
			$x=$conn->query("SELECT sum(harga) as total from m_produk");	
			$xx=$x->fetch_array();
			?>
			<b> Rp.<?php echo number_format($xx['total'])?>-,</b>		
		
		</td>

	</tr>
 <tr>
			<td align="center" colspan="6">
				<nav>
					<ul class="pagination">
						<?php
							$tampil2="SELECT * FROM m_produk";
							$hasil2=$conn->query($tampil2);
							$jmldata=$hasil2->num_rows;
							$jmlhalaman=ceil($jmldata/$batas);
						?>

						<?php if($halaman > 1): ?>
							<?php $previous = $halaman-1; ?>
							<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$previous&by=$by" ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
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