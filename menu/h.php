<?php 
include 'setting/server.php';
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
<div id="navbar-main">
      <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
	
      <div class="container">
	  
	  <form class="navbar-form navbar-right" role="search" method="POST" action="cari.php">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search" name="search">
  </div>
  <button type="submit" class="btn btn-default">Cari</button>
  </form>
  
  

        <div class="navbar-header">
        
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <span><a class="navbar-brand hidden-xs hidden-sm" href="index.php"><img src="<?php echo $host ?>/img/ico1.jpg" alt="" class="img-circle" width="40px" ></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php" class="smoothScroll">Home</a></li>
			<li> <a href="#Info" class="smoothScroll"> Tentang Kami</a></li>
			<li> <a href="#Cara Pembelian" class="smoothScroll"> Panduan Pemesanan</a></li>
			
			<li> <a href="#Katalog" class="smoothScroll"> Katalog</a></li>
			<li> <a href="#blog" class="smoothScroll"> Komentar</a></li>
			<li> <a href="#contact" class="smoothScroll"> Contact</a></li>
      <li> <a href="daftar.php" class="smoothScroll"> Daftar</a></li>
			
			</div>
			
	  </div>
    </div>
    </div>
<script type="text/javascript" src="<?php echo $host ?>/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo $host ?>/assets/js/retina.js"></script>
  <script type="text/javascript" src="<?php echo $host ?>/assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo $host ?>/assets/js/smoothscroll.js"></script>
  <script type="text/javascript" src="<?php echo $host ?>/assets/js/jquery-func.js"></script>
</body>
</html>