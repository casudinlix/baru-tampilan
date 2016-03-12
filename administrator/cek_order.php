<?php 
include_once '../setting/server.php';

include '../menu/head_admin.php';
include '../menu/tengah_admin.php';
include 'jumlah_order.php';
$data = $conn->query("SELECT * FROM order_detail");
$row12 =$data->num_rows;
$queryOrd = $conn->query("SELECT * FROM transaksi ");

	//echo "<script>window.alert('Tidak Ada Order Masuk Hari Ini ');</script>";
	//echo "<script>window.location = '../administrator.php';</script>";
	
$no =0;


	

?>


<!DOCTYPE html>
 <html>
 <div id="page-wrapper" >
<table class="table table-bordered">
<div class="container">
   
        

            
                <div class="row">
                  <div class="col col-xs-6">

                  </div>
                  <div class="col col-xs-6 text-right">

                  </div>
                </div>
              </div>
              <div class="panel-body">
                  <thead class="warning">
                    <tr>
                        <th><em class="glyphicon glyphicon-cog"></em></th>
                        <th class="hidden-xs">Nomor</th>
                        <th colspan="" rowspan="" headers="" scope="">Nomor Order</th>
                        <th>Name</th>
                        <th>Tanggal</th>

                        <th>Status</th>

                    </tr> 
                  </thead>
                  <tbody>
                  <?php while ( $row = $queryOrd->fetch_array()) {

				$no++;
			?>
                          <tr class="info">


                            <td align="center">
                              
                              <a class="btn btn-danger" href="aksi/aksi_order.php?act=hapus&amp;id=<?php echo $row['id_order'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"title="">Hapus<em class="glyphicon glyphicon-trash"></em></a>
                            </td>

                            <td class="hidden-xs"><?php echo $no; ?></td>
                            <td><a href="order.php?id=<?php echo $row['id_order']; ?>"><?php echo $row['id_order']; ?></a></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['tanggal']; ?></td>

                            <td class="warning"><?php echo $row['status']; ?></td>
                          </tr>
                        </tbody>
                        <?php

	}


	?>
	<div class="panel-footer">
                <div class="row">
                <?php
							$tampil2="SELECT * FROM transaksi";
							$hasil2=$conn->query($tampil2);
							$jmldata=$hasil2->num_rows;
							$jmlhalaman=ceil($jmldata/$batas);
						?>
                  <div class="col col-xs-4"><font color="black">Jumlah Order :&nbsp;<?php echo $row12; ?>
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
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
                </table>
            
              </div>
              
      
 </body>

 </html>
