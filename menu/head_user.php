<head>
<?php 
include '../setting/server.php';
$profile =$conn->query("SELECT * FROM profile ");
$p=$profile->fetch_array(); 

?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Wijaya Motor">
    <meta name="author" content="Wijaya Motor">
    <link rel="shortcut icon" href="<?php echo $host ?>/img/ico.jpg">
    <link rel="icon" class="img-circle" href="<?php echo $host;?>/img/ico.jpg">
    <title> <?php echo $p['nama']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $host ?>/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $host ?>/assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $host ?>/assets/css/icomoon.css">
    <link href="<?php echo $host ?>/assets/css/animate-custom.css" rel="stylesheet">


    
   <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>-->
    <!--<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>-->
    
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $host ?>/assets/js/modernizr.custom.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
