
<?php
include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/tengah_admin.php';
if (isset($_GET['profil'])) {
	$id = $_GET['id'];
}

$query_pelanggan = "SELECT * FROM login WHERE id='".$_SESSION['id']."'LIMIT 1";
	 $hasil = $conn->query($query_pelanggan);
	 if ($hasil->num_rows > 0) {
	 	while ($data = $hasil->fetch_assoc())  {


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	
 <body>
 <div id="page-wrapper" >
 	
 <form class="form-horizontal" action="../lib/update_a.php" method="POST" accept-charset="utf-8">
<fieldset>

<!-- Form Name -->
<legend>Update Profile</legend>

<!-- Text input-->
<table class="table table-bordered">
<div class="form-group">
<input type="hidden" name="id" value="<?php echo $data['id'];?>"></td>
  <label class="col-md-4 control-label" for="xx">Nama</label>  
  <div class="col-md-4">
  <input id="xx" name="nama" type="text" placeholder="" class="form-control input-md" value="<?php echo $data['nama']; ?>" >
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="xx">Email</label>  
  <div class="col-md-4">
  <input id="xx" name="email" type="text" placeholder="" class="form-control input-md" value=<?php echo $data['email'] ?>>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Alamat</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="alamat" name="alamat"><?php echo $data['alamat']; ?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="xx">Nomor Telphon</label>  
  <div class="col-md-4">
  <input id="xx" name="tlp" type="text" placeholder="" class="form-control input-md" value=<?php echo $data['tlp'] ?>>
    
  </div>
</div>
<input type="submit" class="btn btn-primary" name="submit" value="Update">

</fieldset>
</form>

 </body>
 </html>

 <?php 	}
	 }


/*$nama_file=$_FILES['foto']['name'];
	$tmp_file=$_FILES['foto']['tmp_name'];
	move_uploaded_file($tmp_file, 'foto/'.$nama_file);
*/
	 ?>










