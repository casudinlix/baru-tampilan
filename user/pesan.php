<?php
include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/menu_user.php';

//$idt = $_SESSION['nama'];
//$id=$_GET['id'];
/*$query = $conn->query("SELECT * FROM order_user WHERE username ='$idt' AND id_order='$id'");
if ($query->num_rows == 0) {
	echo "<script>window.alert('Keranjang Belanja Anda Masih Kosong');</script>";
	echo "<script>window.location = '../user.php';</script>";
}
*/

 //$detail = "SELECT * FROM order_user WHERE username='$idt'";
//$query = $conn->query($detail);

$query = $conn->query("SELECT * FROM order_user, m_produk WHERE username='$idt'AND order_user.id_produk=m_produk.id_produk ");
//$query = $conn->query("SELECT * FORM order_user ot INNER JOIN m_produk p ON ot.id_produk=p.id_produk WHERE username='$idt'");
$numRow = $query->num_rows;
if ($numRow == 0) {
	echo "<script>window.alert('Daftar Belanja Kosong');</script>";
	echo "<script>window.location = 'user.php';</script>";
}
?>
 <form class="form-horizontal" action="aksi/save_pesan.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

<div id="page-wrapper">
	
		<table class="table table-bordered" rowspan="2">
			<tr class="warning">
				<td rowspan="" colspan="8"><h5>Pembelian :&nbsp;<?php echo $_SESSION['nama'];?> </h5></td>
			</tr>
			<tr class="inverse">
				<td colspan="8">
					<a href="user.php"><input type="button" class="btn btn-success" value="Beli Lagi" ></a>
				</td>
			</tr>
		

		
			<tr class="danger">
				<th width="">No</th>
				
				
				<th width="">Nama produk</th>
				<th width="">Jumlah</th>
				<th width="">Harga</th>
				<th width="">Sub Total</th>
				<th width="">Gambar</th>
				<th width="">Aksi</th>

			</tr>
			<tbody>
			<?php
$no = 0;

	$total =0;


				while ($row=$query->fetch_array()) {
					
					$no++;
	$subtotal = $row['qty'] * $row['harga'];
       $total = $total + $subtotal;
		
					?>
					<input type="hidden" name="id[]" value="<?php echo $row['id_produk'] ?>" >
					<input type="hidden" name="email" value="<?php echo $idt; ?>"
					<tr class="info"><td colspan="" rowspan="" headers=""><?php echo $no; ?></td>
					
					<td colspan="" rowspan="" headers=""><?php echo $row['nama_produk']; ?></td>

					<td align="center">
					<?php if ($row['qty'] > 1): ?>
						
					<?php else: ?>
					<?php endif ?>
					<input name="qty[]" readonly type="text" size="1" style="text-align:center; width:38px; padding-left:0;" value="<?php echo $row['qty']; ?>"/>
					<?php if ($row['qty'] < $row['stock']): ?>
					<?php else: ?>
					<?php endif ?>
				</td><input type="hidden" name="harga[]" value="<?php echo $row['harga'] ?>" >
				
					<td>Rp-,<?php echo $row['harga'];?></td>

						<td colspan="" rowspan="" headers="">Rp-,<?php echo $subtotal; ?></td>
						<td colspan="" rowspan="" headers=""><img src="../produk/<?php echo $row['gambar']; ?>" width="250px"alt=""></td>
							<td><i class="glyphicon glyphicon-remove"></i><a href="aksi/hapus_pesan.php?id=<?php echo $row['id_produk']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
						</td>


					</tr>


<?php }

?>
		<td align="right" colspan="4"><b style="margin-right: 3px;">Total Belanja</b></td>

<td align="right" colspan="1" class="warning"><b>Rp.</b> <?php echo $total;?></td>
<td><input type="submit" name="simpan" value="Lanjut Ke Pembayaran"class="btn btn-warning"></a>
</td>
</tbody>
			</table>
			
</form>
