<?php 
include_once '../setting/server.php';

include '../menu/head_admin.php';
include '../menu/tengah_admin.php';
include 'jumlah_order.php';
$data = $conn->query("SELECT distinct id_order FROM transaksi ");
$row12 =$data->num_rows;
//$queryOrd = $conn->query("SELECT * FROM transaksi ");

	//echo "<script>window.alert('Tidak Ada Order Masuk Hari Ini ');</script>";
	//echo "<script>window.location = '../administrator.php';</script>";


	

?>


<!DOCTYPE html>
 <html>
 <div id="page-wrapper" >
<table class="table table-bordered">
<div class="container">
   
        

            Jumlah Order :<b><?php echo $row12; ?></b>
                <div class="row">
                  <div class="col col-xs-6">

                  </div>
                  <div class="col col-xs-6 text-right">

                  </div>
                </div>
              </div>
              <form action="" method="get">
  <div class="input-group col-md-5 col-md-offset-7">
    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-filter"></span></span>
    <select type="submit" name="status" class="form-control" onchange="this.form.submit()">
      <option>By Status</option>
      <?php 
      $pil=$conn->query("SELECT distinct status from transaksi");
      while($p=$pil->fetch_array()){
        ?>
        <option><?php echo $p['status'] ?></option>
        <?php
      }
      ?>
    </select>
    </div>
    <?php 
if(isset($_GET['tanggal'])){
  echo "<h4>Menampilkan Data By Tanggal:  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>
              <div class="panel-body">
                  <thead class="warning">
                    <tr>
                        <th><em class="glyphicon glyphicon-cog"></em></th>
                        
                        <th colspan="" rowspan="" headers="" scope="">Nomor Order</th>
                        <th>Name</th>
                        <th>Tanggal</th>

                        <th>Status</th>

                    </tr> 
                  </thead>
                  <tbody>
                  <?php

if(isset($_GET['status'])){
    $status=$_GET['status'];
    $status1=$conn->query("SELECT * FROM transaksi WHERE status LIKE '$status'");
  }else{
  $status1= $conn->query("SELECT * FROM transaksi   ORDER BY $order $pos LIMIT $posisi,$batas");
  }
  $no=1;
  while($b=$status1->fetch_array()){

    ?>
             <tr class="info">


                            <td align="center">
                              
                              <a class="btn btn-danger" href="aksi/aksi_order.php?act=hapus&amp;id=<?php echo $b['id_order'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"title="">Hapus<em class="glyphicon glyphicon-trash"></em></a>
                            </td>

                            
                            <td><a href="order.php?id=<?php echo $b['id_order']; ?>"><?php echo $b['id_order']; ?></a></td>
                            <td><?php echo $b['username']; ?></td>
                            <td><?php echo $b['tanggal']; ?></td>

                            <td class="warning"><?php echo $b['status']; ?></td>
                          </tr>
                        </tbody>
                        <?php

	}


	?>
	<tr>
      <td align="center" colspan="6">
        <nav>
          <ul class="pagination">
            <?php
              $tampil2="SELECT * FROM transaksi order by status ASC";
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
<?php include $host.'/menu/bawah_admin.php'; ?>
                </table>
            
              </div>
              
      
 </body>

 </html>
