<?php 
include "../menu/head_admin.php";
include "../setting/server.php";

include '../menu/tengah_admin.php';


 ?>
<div id="page-wrapper" >


<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-filter"></span></span>
		<select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
			<option>Pilih tanggal ..</option>
			<?php 
			$pil=$conn->query("SELECT distinct tanggal from transaksi order by tanggal desc");
			while($p=$pil->fetch_array()){
				?>
				<option><?php echo $p['tanggal'] ?></option>
				<?php
			}
			?>
		</select>
	</div>

</form>
<br/>
<?php 
if(isset($_GET['tanggal'])){
	$tanggal=$_GET['tanggal'];
	$tg="lap_barang_laku.php?tanggal='$tanggal'";
	?><a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
}else{
	$tg="print_penjualan_kasir.php";
}
?>

<br/>
<?php 
if(isset($_GET['tanggal'])){
	echo "<h4>Menampilkan Data Penjualan Tanggal  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>

<table class="table table-bordered">
<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Nama Barang</th>
		<th>Harga Terjual /pc</th>

		<th>Jumlah</th>
		
		
	</tr>
<?php 
if(isset($_GET['tanggal'])){
		$tanggal=($_GET['tanggal']);
		$brg=$conn->query("SELECT * FROM transaksi, m_produk WHERE status='Pembelian langsung Lewat Kasir' AND transaksi.id_produk=m_produk.id_produk LIKE '$tanggal'");
	}else{
		$brg=$conn->query("SELECT * FROM transaksi, m_produk WHERE status='Pembelian langsung Lewat Kasir' AND transaksi.id_produk=m_produk.id_produk ORDER BY tanggal desc");
	}
	$no=1;
	while($b= $brg->fetch_array()){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['tanggal'] ?></td>
			<td><?php echo $b['nama_produk'] ?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			
			<td><?php echo $b['qty'] ?></td>			
		</tr>

		<?php 
	}
	?>
</table>
</div>