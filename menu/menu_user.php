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
   //echo "<a href='../administrator.php'> Back </a>";
   

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
                    <a class="navbar-brand" href="user.php">
                        <img src="<?php echo $host; ?>/img/ico1.jpg" height="65px" class="img-circle" />

                    </a>
                    
                </div>
              <?php //$login =$conn->query("SELECT * FROM login WHERE='".$_SESSION['nama']."'");
//$profile=$login->fetch_array(); ?>
                
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

Selamat Datang <br><img src="foto/<?php echo $_SESSION['foto']; ?>" alt="" class="image-circle" width="70x"><br></td>
 <?php echo $_SESSION['nama']; ?>
 [ <a href="<?php echo $host; ?>/logout.php" onclick="return confirm('Apakah anda yakin Keluar?')"><i class="glyphicon glyphicon-off"></i>Logout</a> ]
 <li class="active-link">
                        <a href="user.php" ><i class="glyphicon glyphicon-home "></i>Home <span class="badge"></span></a>


                    <li>
                    <li class="active-link">
                        <a href="transaksi.php" ><i class="glyphicon glyphicon-check "></i>Transaksi <span class="badge"></span></a>
                    </li>

                    </li>
                    <li class="active-link">
                        <a href="pesan.php"><i class="glyphicon glyphicon-shopping-cart "></i>Keranjang Belanja <span class="badge"></span></a>
                    </li>
                    <li class="active-link">
                        <a href="profil.php"><i class="glyphicon glyphicon-user"></i>Profile <span class="badge"></span></a>
                    </li>
                  <li class="active-link">
                        <a href="about.php"><i class="glyphicon glyphicon-certificate"></i>About <span class="badge"></span></a>
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
    
      
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo $host; ?>/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo $host; ?>/assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo $host; ?>/assets/js/custom.js"></script>
    
   
    </div>
    
    </div>
    
    
</body>
</html>