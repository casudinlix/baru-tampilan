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
			$pil=$conn->query("SELECT distinct tanggal from transaksi WHERE status='Lunas' order by tanggal desc");
			while($p=$pil->fetch_array()){
				?>
				<option><?php echo $p['tanggal'] ?></option>
				<?php
			}
			?>
		</select>
	</div>

</form>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Entry Penjualan</button>

<br/>
<?php 
if(isset($_GET['tanggal'])){
	$tanggal=$_GET['tanggal'];
	$tg="print_penjualan_kasir.php?tanggal='$tanggal'";
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
		<th class="success">No</th>
		<th class="success">Tanggal</th>
		<th class="success">Nomor Order</th>
		<th class="success">Nama Barang</th>
		<th class="success">Nama Pembeli</th>
		<th class="success">Harga Terjual /pc</th>

		<th class="success">Jumlah</th>
		
		
	</tr>
<?php 
if(isset($_GET['tanggal'])){
		$tanggal=$_GET['tanggal'];
		$brg=$conn->query("SELECT * FROM transaksi, m_produk WHERE  status='Lunas' AND transaksi.id_produk=m_produk.id_produk ORDER BY tanggal desc");
	}else{
		$brg=$conn->query("SELECT * FROM transaksi, m_produk WHERE  status='Lunas' AND transaksi.id_produk=m_produk.id_produk ORDER BY tanggal desc");
	}
	$no=1;
	while($b= $brg->fetch_array()){

		?>
		<tr>
			<td class="warning"><?php echo $no++ ?></td>
			<td class="info"><?php echo $b['tanggal'] ?></td>
			<td><a href="print_nota.php?id_order=<?php echo $b['id_order']; ?>" target="_blank"><?php echo $b['id_order'] ?></a></td>

			<td><?php echo $b['nama_produk'] ?></td>
			<td><?php echo $b['username']?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>

			<td><?php echo $b['qty'] ?></td>
		</tr>

		<?php
	}
	include "aksi/fungsi_order.php";
	?>
</table>
<!-- modal input -->

<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Penjualan</h4>
				</div>
				<div class="modal-body">
					<form action="aksi/aksi_kasir.php" method="POST">
					<div class="form-group">
							<label>Nomor Order</label>
							<input name="id_order" type="text" class="form-control" value="<?php echo $kd; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama Pembeli</label>
							<input name="pembeli" type="text" class="form-control" placeholder="Pembeli" autocomplete="off" required="">
						</div>

					
						<div class="form-group">
							<label>Tanggal</label>
							<input name="tgl" type="date" class="form-control"  autocomplete="OFF" required="">
						</div>
						<div class="form-group">
							<label>Produk</label>
							<select class="form-control" name="id_produk">
							<option value="">Pilih</option>
							
								<?php
								$brg=$conn->query("SELECT * FROM m_produk");
								while($b=$brg->fetch_array()){
									?>
									<option value="<?php echo $b['id_produk'];?>"><?php echo $b['id_produk']."&nbsp;".$b['nama_produk']."&nbsp;"."Rp.". number_format($b['harga'])?></option>
									<?php
								}
								?>
							</select>

						</div>
						<div class="form-group">
							<label>Harga Jual / unit</label>
							<input type="hidden" name="type" value="Pembelian langsung Lewat Kasir" placeholder="" >
							<input name="harga" type="text" class="form-control" placeholder="Harga" autocomplete="off" required="">
						</div>
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off" required="">
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="reset" class="btn btn-danger" value="Reset">
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	
</div>



