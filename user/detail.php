<?php include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/menu_user.php';
$id = $_GET['id'];
 $detail = "SELECT * FROM m_produk WHERE id_produk='$id'";
$query = $conn->query($detail);
$row=$query->fetch_assoc();
	
 $id = $_GET['id'];
 $detail = "SELECT * FROM m_produk WHERE id_produk='$id'";
$query = $conn->query($detail);
$row=$query->fetch_assoc();

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

                     <center>
<strong style="color: black;">
                      <td rowspan="7"><img src="<?php echo $host ?>/produk/<?php echo $row['gambar']; ?>" /></td>
                        </tr>
                        <tr>
                        <td colspan="4"><div class="title"><strong style="color:black;"><h3><?php echo $row['nama_produk']; ?></strong></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td size="200"><h3><font color="black">Harga</h3></td>
                        <td><h3>:</h3></td>
						<td><div><h3><font color="black"><b>Rp.<?php echo number_format($row['harga']);?></b></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3><font color="black">Stock</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php if ($row['stock'] >= 1){
	                           echo '<strong style="color: blue;">Stock Tersedia</strong>';	
                                } else {
	                           echo '<strong style="color: red;">Stock Habis</strong>';	
                                }; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3><font color="black">Keterangan</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><font color="black"><?php echo $row['deskripsi']; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        
                        </tr>

						</center>
                      
                       	
</div>

</table>

<a class="btn btn-info" href="<?php echo $host; ?>/user/user.php" title="">Kembali</a>
<?php if ($row['stock'] <= 1){
                               echo '<strong style="color: red;">Stock hasbis</strong>'; 
                                } else {
                                    ?>
                                    <a class="btn btn-success" href="aksi.php?act=add&amp;id=<?php echo $row['id_produk'];?>" title="">Beli</a>

                                    <?php
                                }; ?></h3></div></td>
 </body>
 <?php include '../menu/bawah_admin.php'; ?>
 </strong>
 </html>