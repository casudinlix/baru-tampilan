<?php 
include_once '../setting/server.php';
include_once '../setting/session.php';
include $host.'/menu/head_admin.php';
include $host.'/menu/tengah_admin.php';
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
<table class="table table-bordered">


                        <?php 


while ($data=$katalog->fetch_array()) { ?>
                      <tr class="success">

                       <td colspan="" rowspan="" headers=""><?php echo $data['nama_produk'] ?></td>
					<td colspan="" rowspan="" headers=""><a href="xx" title=""><i  class="on-file">Detail</i></a></td>
					<td colspan="" rowspan="" headers=""><a href="" title="">edit</a></td>
					<td colspan="" rowspan="" headers=""><i class="">&nbsp;<a href="xx" title="">Hapus</a></i></td>

                       <tr class="danger">
                      <td> <img src="<?php echo $host;?>/produk/<?php echo $data['gambar'] ?>" class="img-circle" alt="" width="50px">
						<td colspan="" rowspan="" headers=""><b>Stock </b>: &nbsp;<?php echo $data['stock']; ?>

						</td>
						<td colspan="" rowspan="" headers=""><b>Deskripsi</b> : &nbsp;<?php echo $data['deskripsi']; ?></td>
						<td colspan="" rowspan="" headers="">Harga :&nbsp;<?php echo $data['harga']; ?></td>
                      </tr>
                      </td>
                       	<?php } ?>
</div>
<tr>
			<td align="center" colspan="4">
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
									<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$i&by=$by" ?>"><?php echo $i; ?></a></li>
								<?php else: ?>
									<li class="active"><a><?php echo $i; ?></a></li>
								<?php endif ?>
							<?php endif ?>
						<?php endfor ?>

						<?php if($halaman < $jmlhalaman): ?>
							<?php $next = $halaman+1; ?>
							<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$next&by=$by" ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
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
<?php include $host.'/menu/bawah_admin.php'; ?>
</body>
</html>

