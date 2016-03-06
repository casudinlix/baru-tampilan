<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 	<div class="container" id="Katalog" name="Katalog">
		<br>
			
				<br>
				<h1 class="centered">KATALOG</h1>
				<hr>
				<br><div class="btn-group navbar-right">
				 <form class="navbar-form navbar-right" role="search">
  <div class="form-group">

  
  
  
</div>
	</div>
			<!-- /row -->
			<div class="container">
			

			<div class="row">
	                <?php
                    include 'halaman.php';
				while ($data=$katalog->fetch_array()) {
					$harga=$data['harga'];
					$stock =$data['stock'];
				
                    ?>
        		<div class="span4">
          			<div class="icons-box">
                        <div class="title"><h3><?php echo $data['nama_produk']; ?></h3></div>
                        <img src="produk/<?php echo $data['gambar']; ?>" />
						<div><h3>Rp.<?php echo $harga;?></h3></div>
					<!--	<p>
						
						</p> -->
						<div class="clear"><a href="detailproduk.php?id=<?php echo $data['id_produk'];?>" class="btn btn-lg btn-danger">Detail</a> <a href="detailproduk.php?id=<?php echo $data['id_produk'];?>" class="btn btn-lg btn-success">Beli &raquo;</a></div>
					
                    </div>
        		</div>
                <?php   
              }
              
              
              ?>
              <tr>
			<td align="right" colspan="3">
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

<hr>
				  </form>
 </body>
 </html>