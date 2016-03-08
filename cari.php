<?php 
include 'setting/server.php';

include $url.'menu/h.php';
include $url.'menu/head.php';
	
?>

<?php

$search = $_POST['search'];

if ($_POST['search'] <> "") {

		$sql = $conn->query("SELECT * FROM m_produk WHERE  nama_produk LIKE '%$search%'");

	$jumlah = $sql->num_rows;
	?>
	<div class="row-isi">
		<table class="width">
			<?php if ($jumlah > 0): ?>
				<tr>
					<td colspan="3"><center><?php echo "Menampilkan " .$search. " sebanyak " .$jumlah. " unit"; ?></center></td>
				</tr>
				<?php while ($r=$sql->fetch_array()) : ?>
					<tr>
						<td class="padding-left" colspan="3">
							<p><a href="<?php echo $url ?>detailproduk.php?id_produk=<?php echo $r[0] ?>" class="href ref"><?php echo $r["nama_produk"]; ?>&nbsp;<?php echo $r['jenis']; ?></a></p>
						</td>
					</tr>
					<tr>
						<td class="padding-left" width="128px">
							<?php if (!empty($r['gambar'])): ?>
								<a href="<?php echo $url ?>detailproduk.php?id_produk=<?php echo $r[0] ?>">
								<img src="produk/'<?php echo $r['gambar']; ?>" width="120px" height="120px"></a>
							<?php else : ?>
								<a href="<?php echo $url ?>detailproduk.php?id_produk=<?php echo $r[0] ?>">
								<img src="produk/" width="120px" height="120px"></a>
							<?php endif ?>
						</td>
						<td style="vertical-align: top; font-size: 14px;" colspan="2" class="padding-right">
							<?php echo $r["kategori"]; ?><br/>
						</td>
					</tr>
					<tr>
						<td align="right" style="font-size: x-large; color: #00008B;" colspan="2">
							<?php if ($r['stock'] == 0): ?>
								<a class="stock">STOK HABIS</a>			
							<?php endif ?>
							Rp. <?php echo $r['harga']; ?> &nbsp;
						</td>
						<td class="padding-right" width="80px">
							<?php if ($r['stock'] == 0): ?>
								<a>&nbsp;</a>
							<?php else: ?>
								<a href="../aplikasi/aksi.php?act=add&amp;id=<?php echo $r[0]; ?>" id="buy" class="button round">BELI</a>
							<?php endif ?>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<hr>				
						</td>
					</tr>
				<?php endwhile ?>
			<?php else : ?>
				<tr>
					<td><center><h2><font color="#FF1919"><?php echo "Maaf, ".$search." tidak ditemukan"; ?></font></h2></center></td>
				</tr>
			<?php endif ?>
			<tr>
				<td colspan="3">
					
				</td>
			</tr>
		</table>		
	</div>
<?php 
}
?>