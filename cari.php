<?php 
include 'setting/server.php';


include 'menu/head.php';
include 'menu/h1.php';
include "halaman.php";
?>
<br>
<br>
<br>
<table class="table table-bordered">

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

					<a  class="btn btn-warning" href="detailproduk.php?id=<?php echo $data['id_produk']; ?>"><span class="glyphicon glyphicon-check"></span>Detail</i></a></td>



					<td></td>
					<td ></td>

                       <tr class="danger">
                      <td> <img src="<?php echo $host;?>/produk/<?php echo $data['gambar'] ?>" class="img-circle" alt="" width="80Px">
						<td colspan="" rowspan="" headers=""><b>Stock </b>: &nbsp;<?php echo $data['stock']; ?>
							<br><b>Berat :&nbsp;</b><?php echo $data['berat']; ?>/Kg
						</td>
						<td colspan="" rowspan="" headers=""><b>Deskripsi</b> : &nbsp;<?php echo $data['deskripsi']; ?></td>
						<td colspan="" rowspan="" headers=""><b>Harga</b> :&nbsp;<?php echo $data['harga']; ?><br>
						<i class="glyphicon glyphicon-ok-sign"></i><?php if ($data['stock'] >= 1){
	                           echo '<strong style="color: blue;">Stock Tersedia</strong>';	
                                } else {
	                           echo '<strong style="color: red;">Stock Habis</strong>';	
                                }; ?></h3></td>
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