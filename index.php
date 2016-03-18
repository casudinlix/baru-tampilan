<?php
include 'setting/server.php';
$profile =$conn->query("SELECT * FROM profile ");
$p=$profile->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
  <?php include 'menu/head.php'; ?>
  	<?php include 'menu/h.php'; ?>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
	<!-- ==== HEADERWRAP ==== -->
	    <div id="headerwrap" id="home" name="home">
			<header class="clearfix">
	  		 		<h1><span class=""></span></h1>
	  		 		<p>Selamat Datang</p>
	  		 		<p>Di Bengkel Wijaya Motor Bekasi</p>
					<a data-toggle="modal" href="#myLogin" class="btn btn-primary btn-lg">Masuk</a>
					</p> 
					<div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">LOGIN</h4>
      </div>
      <div class="modal-body">
      <!--login-->
        <form action="cek.php" method="POST">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <input type="password" class="form-control" placeholder="Passowrd" name="pass">
          <input type="submit" class="btn btn-primary" value="Login" name="submit">
          <?php
          
           ?>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
	  		</header>	    
	    </div><!-- /headerwrap -->

		
		
		<!-- ==== ABOUT ==== -->
		<div class="container" id="Info" name="Info">
			<div class="row white">
			<br>
				<h1 class="centered">BENGKEL WIJAYA MOTOR BEKASI</h1>
				<hr>
				
				<div class="col-lg-6">
				<div style="text-align: center">
				<font size="6px">
					<p><strong>VISI</strong></p>
					</font>
					</div>
					<font size="5px">
					<p><?php echo $p['visi']; ?></p>
					</font>
				</div><!-- col-lg-6 -->
				
				<div class="col-lg-6">
				<div style="text-align: center">
				<font size="6px">
					<p><strong>MISI</strong></p>
					</font>
					</div>
					<font size="5px">
					<p><?php echo $p['misi']; ?></p>
					</font>
				</div><!-- col-lg-6 -->
			</div><!-- row -->
		</div><!-- container -->
		
		<!-- ==== SECTION DIVIDER1 -->
		<section class="section-divider textdivider divider1">
			<div class="container">
				<h1>KEPUASAN PELANGGAN MENJADI HAK PATEN UNTUK KAMI</h1>
				<hr>
			</div><!-- container -->
		</section><!-- section -->
		
		
		<!-- ==== SERVICES ==== -->
		<div class="container" id="Cara Pembelian" name="Cara Pembelian">
			<br>
			<br>
			<div class="row">
				<h2 class="centered">CARA PEMESANAN BARANG</h2>
				
				<div class="col-lg-offset-2 col-lg-8">
				
				</div><!-- col-lg -->
			</div><!-- row -->
			
			
				<div class="col-lg-offset-2 col-lg-8">
					<img  class="img-responsive" src="img/cara-belanja.jpg" alt="" width="1000px">
				</div><!-- col -->
			</div><!-- row -->
		</div><!-- container -->
  		

		<!-- ==== SECTION DIVIDER2 -->
		<section class="section-divider textdivider divider2">
			<div class="container">
				<h1>KEPUASAN PELANGGAN MENJADI HAK PATEN UNTUK KAMI</h1>
				<hr>
			</div><!-- container -->
		</section><!-- section -->

		<!-- ==== TEAM MEMBERS ==== -->
		
		<!-- ==== GREYWRAP ==== -->
		
		
		<!-- ==== SECTION DIVIDER3 -->
		<!-- section -->
		
		<!-- ==== PORTFOLIO ==== -->
		<?php include "katalog.php"; ?>
						 

		<!-- ==== SECTION DIVIDER4 ==== -->
		<section class="section-divider textdivider divider4">
			<div class="container">
				<h1>KEPUASAN PELANGGAN MENJADI HAK PATEN UNTUK KAMI</h1>
				<hr>
			</div><!-- container -->
		</section><!-- section -->
		
		<!-- ==== BLOG ==== -->
		<div class="container" id="blog" name="blog">
		<br>
			<div class="row">
				<br>
				<h1 class="centered">KOMENTAR</h1>
				<hr>
				<br>
				<br>
			</div><!-- /row -->
			
			<div class="row">
				<div class="col-lg-6 blog-bg">
				<?php 
				$komentar = $conn->query("SELECT * FROM login,komentar WHERE login.username=komentar.username");
				while ( $kom =$komentar->fetch_array()) {
				
				 ?>
					<div class="col-lg-4 centered">
					<br>
						<p><img class="img img-circle" src="user/foto/<?php echo $kom['foto']; ?>" width="60px" height="60px"></p>
						<h4><?php echo $kom['username']; ?></h4>
						<h5>Nomor Order :.</h5>
						
						<h5><?php echo $kom['id_order']; ?></h5>
					</div>
					<div class="col-lg-8 blog-content">
						<h2>Feedback</h2>
						<p><?php echo $kom['isi']; ?></p>
						<p><a href="#" class="icon icon-link"></a></p>
						<br>
					</div>
				</div><!-- /col -->
				
				<div class="col-lg-6 blog-bg">
				<?php } ?>
					</div>
		
		<!-- ==== SECTION DIVIDER6 ==== -->
		<section class="section-divider textdivider divider6">
			<div class="container">
				<h1>Bekasi - Jawa Barat, Indonesia.</h1>
				<hr>
				<p>+62</p>
				<p><a class="icon icon-twitter" href="#"></a> | <a class="icon icon-facebook" href="#"></a></p>
			</div><!-- container -->
		</section><!-- section -->
		
		<div class="container" id="contact" name="contact">
			<div class="row">
			<br>
				<h1 class="centered">THANKS FOR VISITING US</h1>
				<hr>
				<br>
				<br>		
				
				
				<div class="col-lg-4">
					<h3>Contact Information</h3>
					<p><span class="icon icon-home"></span> <?php echo $p['alamat']; ?><br/>
						
						<span class="icon icon-mobile"></span> +62 8120 0000 1111 <br/>
						<span class="icon icon-envelop"></span> <a href="#"> WijayaMotor_bks@blacktie.co</a> <br/>
						<span class="icon icon-twitter"></span> <a href="#"> @WijayaMotor_Bks </a> <br/>
						<span class="icon icon-facebook"></span> <a href="#"> Wijaya Motor Bekasi </a> <br/>
					</p>
				</div><!-- col -->
				
				<div class="col-lg-4">
					<h3>Support Us</h3>
					<p><?php echo $p['visi']; ?>.</p>
				</div><!-- col -->

			</div><!-- row -->
		
		</div><!-- container -->

		<div id="footerwrap">
			<div class="container">
				<h4>Created by <a href="#">WM.Bekasi</a> - Copyright 2016</h4>
			</div>
		</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		

	
  </body>
</html>