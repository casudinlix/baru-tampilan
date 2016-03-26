<?php 
include_once '../setting/server.php';
include '../menu/head_admin.php';
include '../menu/tengah_admin.php';
include_once 'aksi/fungsi.php';
include '../halaman.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<div id="page-wrapper" >
<?php
$tampil2="SELECT * FROM m_produk";
							$hasil2=$conn->query($tampil2);
							$jmldata=$hasil2->num_rows;
?>
<form action="cari_produk.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<table class="table table-bordered">
Jumlah Barang : <?php echo $jmldata; ?>

                        <?php


	if(isset($_GET['cari'])){
		$cari=htmlspecialchars($_GET['cari']);
		$brg=$conn->query("SELECT * FROM m_produk WHERE nama_produk LIKE '%$cari%' OR kategori LIKE '%$cari%'");
	}else{
$brg = $conn->query("SELECT * FROM m_produk LIMIT $posisi,$batas");

	}
while ($data=$brg->fetch_array()) { ?>
                      <tr class="success">
<font color="black">

                       <td colspan="" rowspan="" headers="" ><b><?php echo $data['nama_produk'] ?><br>
                        <?php echo $data['id_produk']; ?></b>
                       </td>

					<td colspan="" rowspan="" headers="">

					<a  class="btn btn-warning" href="detail.php?id=<?php echo $data['id_produk']; ?>"><span class="glyphicon glyphicon-check"></span>Detail</i></a></td>



					<td><a class="btn btn-success" href="edit.php?id=<?php echo $data['id_produk']; ?>" title=""><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
					<td ></td>

                       <tr class="danger">
                      <td> <img src="<?php echo $host;?>/produk/<?php echo $data['gambar'] ?>" class="img-circle" alt="" width="65px">
						<td colspan="" rowspan="" headers=""><b>Stock </b>: &nbsp;<?php echo $data['stock']; ?>
							<br><b>Berat :&nbsp;</b><?php echo $data['berat']; ?>/Kg
						</td>
						<td colspan="" rowspan="" headers=""><b>Deskripsi</b> : &nbsp;<?php echo $data['deskripsi']; ?></td>
						<td colspan="" rowspan="" headers=""><b>Harga</b> :&nbsp;<?php echo number_format($data['harga']); ?><br>
						<i class="glyphicon glyphicon-ok-sign"></i><b>Stock</b>&nbsp;<?php echo $data['stock']; ?></td>
                      </tr>
                      </td>
                       	<?php } ?>
</div>
<tr>
			<td align="center" colspan="4">
				<nav>
					<ul class="pagination pagination-centered">
						<?php
							$tampil2="SELECT * FROM m_produk";
							$hasil2=$conn->query($tampil2);
							$jmldata=$hasil2->num_rows;
							$jmlhalaman=ceil($jmldata/$batas);
						?>

						<?php if($halaman > 1): ?>
							<?php $previous = $halaman-1; ?>
							<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$previous&by=$by" ?>" aria-label="Previous"><span aria-hidden="true">Previous</span></a></li>
						<?php else: ?>
							<li class="disabled"><a href="" aria-label="Previous"><span aria-hidden="true">Previous</span></a></li>
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
							<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$next" ?>" aria-label="Next"><span aria-hidden="true">Next</span></a></li>
						<?php else: ?>
							<li class="disabled"><a href="" aria-label="Next"><span aria-hidden="true">Next</span></a></li>
						<?php endif ?>

					</ul>
			   	</nav>
			</td>
		</tr>
</tr>
</tr>


</table>
<?php include $host.'/menu/bawah_admin.php'; ?>
</body>
</html>

