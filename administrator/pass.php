<?php 
include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/tengah_admin.php';
$id=$_SESSION['id'];
 ?>
 <!DOCTYPE html>
 <html>

 <body>


<form class="form-horizontal" method="POST" action="../lib/update_pass_a.php">
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
<input type="hidden" name="id" value="<?php echo $id?>" placeholder="">
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

</table>
<input type="submit" class="btn btn-success" name="submit" value="Simpan">
</fieldset>
</form>
 </body>
 </html>



