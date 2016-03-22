<?php 
include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/tengah_admin.php';
include '../halaman.php';
$tampil2="SELECT * FROM m_produk";
							$hasil2=$conn->query($tampil2);
							$jmldata=$hasil2->num_rows;
							$x1=$conn->query("SELECT sum(stock) as sisa from m_produk");	
			$xx1=$x1->fetch_array();
 ?>
 <div id="page-wrapper" >

      	

</form>
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-filter"></span></span>
		<select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
			<option>By tanggal</option>
			<?php 
			$pil=$conn->query("SELECT distinct tgl_masuk from m_produk order by tgl_masuk desc");
			while($p=$pil->fetch_array()){
				?>
				<option><?php echo $p['tgl_masuk'] ?></option>
				<?php
			}
			?>
		</select>
		</div>
<a style="margin-bottom:10px" href="print_barang_masuk.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak ALL Data</a>
Jumlah Barang : <b><?php echo $jmldata; ?></b><br>
Jumlah QTY :<b><?php echo $xx1['sisa']; ?></b>
<?php 
if(isset($_GET['tanggal'])){
	$tanggal=htmlspecialchars($_GET['tanggal']);
	$tg="print_laporan_barang_masuk_BY.php?tanggal='$tanggal'";
	?><a style="margin-bottom:10px" href="<?php echo $tg; ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak By tanggal</a><?php
}else{
	$tg="print_laporan_barang_masuk_BY.php";
}
?>

<br/>
<?php 
if(isset($_GET['tanggal'])){
	echo "<h4>Menampilkan Data By Tanggal:  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>
<table class="table table-bordered">
<div class="container">
	<tr class="wrapper warning">
	<th colspan="" rowspan="" headers="" scope="">No</th>
	<th colspan="" rowspan="" headers="" scope="">Kode</th>
<th colspan="" rowspan="" headers="" scope="">Nama Produk</th>
<th colspan="" rowspan="" headers="" scope="">Qty</th>
<th colspan="" rowspan="" headers="" scope="">Jenis</th>
<th colspan="" rowspan="" headers="" scope="">Harga</th>
<th colspan="" rowspan="" headers="" scope="">Tanggal Masuk</th>

	</tr>

<?php

if(isset($_GET['tanggal'])){
		$tanggal=$_GET['tanggal'];
		$tgl=$conn->query("SELECT * FROM m_produk WHERE tgl_masuk LIKE '$tanggal'");
	}else{
		$tgl=$conn->query("SELECT * FROM m_produk LIMIT $posisi,$batas");
	}
	$no=1;
	while($b= $tgl->fetch_array()){

		?>

<tr class="success">

	<tbody>
		<tr class="danger">
<td colspan="" rowspan="" headers=""><?php echo $no; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $b['id_produk']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $b['nama_produk']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $b['stock']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $b['jenis']; ?></td>
<td colspan="" rowspan="" headers="">Rp-,<?php echo number_format($b['harga']); ?>,-</td>
<td colspan="" rowspan="" headers="" class="success"><?php echo $b['tgl_masuk']; ?></td>


		</tr>
	</tbody>


</tr>

</div>
</div>
<?php 
$no++;
}

 ?>
 <tr>
		<td colspan="5"><b>Total Value</b></td>
		<td>			
		<?php 
		
			$x=$conn->query("SELECT sum(harga) as total from m_produk");	
			$xx=$x->fetch_array();
			$x1=$conn->query("SELECT sum(stock) as sisa from m_produk");	
			$xx1=$x1->fetch_array();
			?>
			<b> Rp.<?php echo number_format($xx['total'])?>-,</b>		
		
		</td>

	</tr>
 <tr>
			<td align="center" colspan="7">
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