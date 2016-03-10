<?php 
include '../setting/server.php';
// memulai session
session_start();


if (isset($_SESSION['role']))
{
 // jika level admin
 if ($_SESSION['role'] == "1")
   {   
   echo "Selamat Datang&nbsp".$_SESSION['nama']."</br>";
   echo "<a href='../administrator.php'> Back </a>";
   

   }
   // jika kondisi level user maka akan diarahkan ke halaman lain
   else if ($_SESSION['role'] == "2")
   {
       echo "Selamat Datang &nbsp;".$_SESSION['nama']."<br/>";
       
   }
   elseif ($_SESSION['role']=="3") {
    echo "Selamat Datang&nbsp".$_SESSION['nama']."<br/>";
    $_SESSION['email'];
   }
}
if (!isset($_SESSION['role']))
{
 header('location:../fail.php');
}
if(!isset($_SESSION['email'])){
    $idt = date("YmdHis");
    $_SESSION['email'] = $idt;
}
$idt = $_SESSION['email'];
 
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
	 <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo $host; ?>/img/ico1.jpg" height="65px" class="img-circle" />

                    </a>
                    
                </div>
              <?php //$login =$conn->query("SELECT * FROM login WHERE='".$_SESSION['nama']."'");
//$profile=$login->fetch_array(); ?>
                
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation" align="center">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

Selamat Datang <br><img src="foto/<?php echo $_SESSION['foto']; ?>" alt="" class="image-circle" width="70x"><br></td>
 <?php echo $_SESSION['nama']; ?>
 [ <a href="<?php echo $host; ?>/logout.php" >LOGOUT</a> ]
                    <li class="active-link">
                        <a href="cek_order.php" ><i class="fa fa-desktop "></i>Cek Order <span class="badge"></span></a>
                    </li>


                    <li>
                        <a href="tambah.php"><i class="fa fa-table "></i>Tambah Barang  <span class="badge"></span></a>
                    </li>
                    <li>
                        <a href="produk.php"><i class="fa fa-shopping-cart "></i>Produk  <span class="badge"></span></a>
                    </li>


                    <li>
                        <a href="Admin.html"><i class="fa fa-key "></i>Admin <span class="badge"></span></a>
                    </li>
                    <li>
                        <a href="MailBox.html"><i class="fa fa-envelope-o"></i>Mail Box <span class="badge"></span></a>
                    </li>

                    <li>
                        <a href="RegisterUser.html"><i class="fa fa-user "></i>Register Users <span class="badge"></span></a>
                    </li>
                    <li>
                        <a href="AllDoc.html"><i class="fa fa-clipboard "></i>All Document <span class="badge"></span></a>
                    </li>
                     <li>
                        <a href="Setting.html"><i class="fa fa-gear "></i>Setting <span class="badge"></span></a>
                    </li>
                    
                </ul>
                            </div>

        </nav>
       

                  <!-- /. ROW  -->    
                 <div class="row text-center pad-top">
                 </div>
				                   <!-- /. ROW  -->  
                <div class="row text-center pad-top">
                 </div>
				 
                 <!-- /. ROW  -->   
				  <div class="row">
                    <div class="col-lg-12 ">
					<br/>

                    </div>
                    </div>
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    
      
    
</body>
</html>