<?php 
include_once '../setting/server.php';
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
$tanggal1 = date('d/m/Y H:i:s');
include '../menu/head_admin.php';
include '../menu/tengah_admin.php';
 ?>


</head>
<body>
<?php
$kode =$_GET['id'];
$sql=$conn->query("SELECT * FROM m_produk WHERE id_produk='$kode'");
$row = $sql->fetch_array();
?>


<form class="form-horizontal" method="POST" action="aksi/action_edit.php" enctype="multipart/form-data">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="kode">Kode</label>  
  <div class="col-md-4">
  <input id="kode" name="kode" type="text" placeholder="" class="form-control input-md" value="<?php echo $kode;?>" readonly>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nama">Nama Produk</label>  
  <div class="col-md-4">
  <input id="nama" name="nama" type="text" placeholder="" class="form-control input-md" value="<?php echo $row['nama_produk']; ?>">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Deskripsi</label>
  <div class="col-md-4">
    <textarea class="form-control" id="textarea" name="deskripsi"><?php echo $row['deskripsi'] ?></textarea>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="jenis">Jenis</label>
  <div class="col-md-4">
    <select id="jenis" name="jenis" class="form-control">
    <option value="<?php echo $row['jenis']; ?>"><?php echo $row['jenis']; ?></option>
	<?php
		$ambil = $conn->query("SELECT * FROM m_jenis ORDER BY nama_jenis");
		if($ambil->num_rows > 0){
	while ( $data =$ambil->fetch_array()) {
				?>
				<option value="<?php echo $data['nama_jenis']; ?>"><?php echo $data['nama_jenis']; ?></option>';

				<?php
			}
		}
			?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="kategori">Kategori</label>
  <div class="col-md-4">
    <select id="kategori" name="kategori" class="form-control">
    <option value="<?php echo $row['kategori']; ?>"><?php echo $row['kategori']; ?></option>
	<?php
		$ambil = $conn->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {?>

				<option value="<?php echo $data['nama_kategori'];?>"><?php echo $data['nama_kategori']; ?></option>';
			<?php
			}
		}
			?>
      
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="merk">Merk</label>
  <div class="col-md-4">
    <select id="merk" name="merk" class="form-control">
    <option value="<?php echo $row['merk']; ?>"><?php echo $row['merk']; ?></option>
	<?php
		$ambil = $conn->query("SELECT * FROM m_merk ORDER BY nama_merk ASC");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {?>

				<option value="<?php echo $data['nama_merk'];?>"><?php echo $data['nama_merk']; ?></option>';
			<?php
			}
		}
			?>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="qtymin">Qty Min</label>  
  <div class="col-md-4">
  <input id="qtymin" name="qtymin" type="text" placeholder="" class="form-control input-md" value="<?php echo $row['qty_min'] ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="berat">Berat</label>  
  <div class="col-md-4">
  <input id="berat" name="berat" type="text" placeholder="" class="form-control input-md" value="<?php echo $row['berat']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="qtymax">Qty max</label>  
  <div class="col-md-4">
  <input id="qtymax" name="qtymax" type="text" placeholder=" " class="form-control input-md" value="<?php echo $row['qty_max'] ?>">
  <span class="help-block"> </span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="stock">Stock</label>  
  <div class="col-md-4">
  <input id="stock" name="stock" type="text" placeholder="" class="form-control input-md" value="<?php echo $row['stock']; ?>">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Update</button>
  </div>
</div>


</form>

<?php include '../menu/bawah_admin.php'; ?>
</body>
</html>