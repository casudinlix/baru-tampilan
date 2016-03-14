<?php 
include "../menu/head_admin.php";
include "../setting/server.php";
include '../menu/menu_user.php';

$nama = $_SESSION['nama'];

$sql = $conn->query("SELECT * FROM login WHERE nama='$nama' ");
$data =$sql->fetch_assoc();


$query = $conn->query("SELECT * FROM login WHERE nama='$nama'");
$datacus = $query->fetch_array();

 ?>
 <!DOCTYPE html>
 <html>

 <form class="form-horizontal" action="aksi/save_konfir_pesan.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nama">Nama</label>  
  <div class="col-md-4">
  <input id="nama" name="id_cus" type="text" value="<?php echo $datacus['nama']; ?>" class="form-control input-md" readonly>
    <input type="hidden" name="kode" value="<?php echo $_GET['id_order']; ?>" placeholder="">
    <input type="hidden" name="id_cus" value="">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="alamat">Alamat</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="alamat" name="alamat" readonly=""><?php echo $data['alamat']; ?></textarea>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ongkos">Ongkos Kirim</label>
  <div class="col-md-4">
    <select id="ongkos" name="ongkos" class="form-control" >
    <option value="" class="required" >Pilih</option>
    <?php
		$ambil = $conn->query("SELECT * FROM tarif ");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {
				?>
				<option value="<?php echo $data['reg']; ?>"><?php echo $data['kota']."&nbsp;Rp-,".$data['reg']; ?></option>';
				<?php
			}
		}
			?>
      
    
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" readonly value="<?php echo $datacus['email'];?>">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="bukti">Bukti transfer</label>
  <div class="col-md-4">
    <input id="bukti" name="bukti" class="input-file" type="file" required="">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="simpan"></label>
  <div class="col-md-4">
    <button id="simpan" name="simpan" class="btn btn-primary">Simpan</button>
  </div>
</div>
</form>
