<?php 
include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/menu_user.php';
 ?>
 <!DOCTYPE html>
 <html>

 <body>


<form class="form-horizontal" method="POST" action="">
<fieldset>
<div id="page-wrapper" >
<table class="table table-bordered">
	


<!-- Form Name -->
<legend>Update Password <?php echo $_SESSION['nama'];?></legend>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Masukan Password lama</label>
  <div class="col-md-4">
    <input id="passwordinput" name="password0" type="password" placeholder="***" class="form-control input-md">
    
  </div>
</div>
<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>" placeholder="">
<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Masukan Password Baru</label>
  <div class="col-md-4">
    <input id="passwordinput" name="password1" type="password" placeholder="***" class="form-control input-md">
     
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput"> Konfirmasi</label>
  <div class="col-md-4">
    <input id="passwordinput" name="password2" type="password" placeholder="***" class="form-control input-md">
     
  </div>
</div>
<input type="submit" class="btn btn-success" name="submit" value="Simpan">
</table>
</fieldset>
</form>
 </body>
 </html>

 <?php
			if(isset($_POST['submit'])=='Simpan'){
				$id = $_GET['id'];
				$password 	= md5($_POST['password0']);
				$password1 	= $_POST['password1'];
				$password2 	= $_POST['password2'];
				
				$cek = $conn->query("SELECT * FROM login WHERE id='$id' AND password='$password'");
				if($cek->num_rows == 0){
					echo 'Password sekarang tidak tepat.';
				}else{
					if($password1 == $password2){
						if(strlen($password1) >= 5){
							$pass = md5($password1);
							$update = $conn->query("UPDATE login SET password='$pass' WHERE id='".$_SESSION['id']."'");
							
							if($update){
								header('location:profil.php');
								
							}else{
								echo 'Password gagal dirubah';
							}
						}else{
							echo 'Panjang karakter Password minimal 5 karakter.';
						}
					}else{
						echo 'Konfirmasi Password tidak tepat.';
					}
				}
			}
			?>

