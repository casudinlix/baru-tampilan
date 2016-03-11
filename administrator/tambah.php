<?php 
include_once '../setting/server.php';

include '../menu/head_admin.php';
include '../menu/tengah_admin.php';
include 'aksi/fungsi.php';
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
$tanggal1 = date('d/m/Y H:i:s');
 ?>

<head>

</head>
<body>
<div id="page-wrapper" >


                        <h2><font color="black">Input Barang</h2>
                  
                <hr />

                <div class="row">
                <form method="POST" class="form-horizontal" action="aksi/action_tambah.php" enctype="multipart/form-data">
                	<div class="form-group">
  <label class="col-md-4 control-label" for="text">Kode</label>  
  <div class="col-md-4">
  <input id="text" name="username" type="text" class="form-control input-md" value="<?php echo $kd;?>" readonly>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Gambar</label>
  <div class="col-md-4">
    <input id="gambar" name="gambar" class="input-file " type="file">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="nama">Nama</label>  
  <div class="col-md-4">
  <input id="text" name="nama" type="text" class="form-control input-md"   placeholder="Nama Barang" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="jenis">Jenis</label>
  <div class="col-md-4">
    <select id="jenis" name="jenis" class="form-control">
      <option value="">Pilih</option>
      <?php
		$ambil = $conn->query("SELECT * FROM m_jenis ORDER BY nama_jenis ASC LIMIT 2");
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

<div class="form-group">
  <label class="col-md-4 control-label" for="kategori">Kategori</label>
  <div class="col-md-4">
    <select id="kategori" name="kategori" class="form-control">
      <option value="">Pilih</option>
      <?php
		$ambil = $conn->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {?>

				<option value="<?php echo $data['nama_kategori'];?>"><?php echo $data['nama_kategori'] ?></option>';
			<?php
			}
		}
			?>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="merk">Merk</label>
  <div class="col-md-4">
    <select id="merk" name="merk" class="form-control">
      <option value="1">Pilih</option>
      <?php
		$ambil = $conn->query("SELECT * FROM m_merk ORDER BY nama_merk ASC");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {?>

				<option value="<?php echo $data['nama_merk'];?>"><?php echo $data['nama_merk'] ?></option>';
			<?php
			}
		}
			?>
      
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="deskripsi">Deskripsi</label>
  <div class="col-md-4">
    <textarea class="form-control" id="deskripsi" name="deskripsi" required=""></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="text">Berat Barang</label>  
  <div class="col-md-4">
  <input id="text" name="berat" type="text" class="form-control input-md"   placeholder="KG" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="text">QTY Minimum</label>  
  <div class="col-md-4">
  <input id="text" name="qtymin" type="text" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="text">QTY Max</label>  
  <div class="col-md-4">
  <input id="text" name="qtymax" type="text" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="text">Stock</label>  
  <div class="col-md-4">
  <input id="text" name="stock" type="text" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="text">Tanggal Masuk</label>  
  <div class="col-md-4">
  <input id="text" name="tgl" type="date" class="form-control input-md" value="<?php echo $tglsekarang;?>" readonly>
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="text">Harga</label>  
  <div class="col-md-4">
  <input id="text" name="harga" type="text" class="form-control input-md" placeholder="Rp" required="">
    
  </div>
</div>

<div class="form-group">
  <div class="col-md-4" align="center">
    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
 <input type="reset" name="reset" value="Reset" class="btn btn-info">
 
  </div>
</div>

</form>

</body>

</html>
