<?php 
include 'setting/server.php';

include 'menu/head.php';

include 'menu/h.php';
$id= $_GET['id'];
?>

   <?php
$query = $conn->query("SELECT * FROM m_produk WHERE id_produk='$id'");
$data  = $query->fetch_array();
$harga = $data['harga'];
$stock = $data['stock'];

?>
        		<!--<div class="span4">-->
          			<!--<div class="icons-box">-->
          			<div class="row">
          			<div class="col-sm-10" align="center">
                    <div class="hero-unit" style="margin-left: 50px;">
                    <table>
                    <tr>
                    <br>
                    <br>
                        <td rowspan="7"><img src="produk/<?php echo $data['gambar']; ?>" /></td>
                        </tr>
                        <tr>
                        <td colspan="4"><div class="title"><strong style="color:silver;"><h3><?php echo $data['nama_produk']; ?></strong></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td size="200"><h3>Harga</h3></td>
                        <td><h3>:</h3></td>
						<td><div><h3>Rp.<?php echo $harga;?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3>Stock</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php if ($data['stock'] >= 1){
	                           echo '<strong style="color: blue;">Stock Tersedia</strong>';	
                                } else {
	                           echo '<strong style="color: red;">Stock Habis</strong>';	
                                }; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3>Satuan</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php echo $data['jenis']; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        
                        </tr>
					<!--	<p>
						
						</p> -->
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
						<td><div class="clear"> <a href="cart.php?act=add&amp;barang_id=<?php echo $data['br_id']; ?>&amp;ref=detailproduk.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-danger">Beli &raquo;</a></div></td>
                        </tr>
     
                    </table>
</div>
</div>
</div>
