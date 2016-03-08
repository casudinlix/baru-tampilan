<?php 
include_once '../setting/server.php';
include_once '../setting/session.php';
include $host.'/menu/head_admin.php';
include $host.'/menu/tengah_admin.php';
include 'aksi/fungsi.php';
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
$tanggal1 = date('d/m/Y H:i:s');
 ?>

<head>

</head>
<body>
<?php


?>
<div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2><font color="black">Input Barang</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                <form method="POST" action="aksi/action_tambah.php" enctype="multipart/form-data">
                	
                
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<table class="table-center">
						<tr>
						<td colspan rowspan header>Kode</td>
						<td>
  <input type="text" name="kode" placeholder="kode" value="<?php echo $kd;?>" />
  </td>
</tr>
<p>
<tr>
						<td colspan rowspan header>Nama Produk</td>
						<td>
  <input type="text" name="nama" placeholder="Nama Barang" />
  </td>
</tr>
<p>
<tr>
						<td colspan rowspan header>Jenis</td>
						<td>
  <select name="jenis" >
<option value="">---</option>}
option
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
  </td>
</tr>
<p>
<tr>
						<td colspan rowspan header>Kategori</td>
						<td>
  <select name="kategori" >
  <option value="">---</option>
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
  </td>
</tr>
<p>
<tr>
						<td colspan rowspan header>Merk</td>
						<td>
  <select name="merk" >
  <option value="">---</option>
	<?php
		$ambil = $conn->query("SELECT * FROM m_merk ORDER BY nama_merk ASC");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {?>

				<option value="<?php echo $data['nama_merk'];?>"><?php echo $data['nama_merk'] ?></option>';
			<?php
			}
		}
			?>
  </td>
</tr>
<p>
<tr>
						<td colspan rowspan header>Deskripsi</td>
						<td>
  <textarea name="deskripsi" placeholder="Deskripsi" ></textarea>
  </td>
</tr>
<p>
<tr>
						<td colspan rowspan header>Berat Barang</td>
						<td>
  <input type="text" name="berat" placeholder="> 1Kg" />
  </td>
</tr>
<p>
<tr>
						<td colspan rowspan header>Qty Minimum</td>
						<td>
  <input type="text" name="qtymin" />
  </td>
</tr>
<p>
<tr>
						<td colspan rowspan header>Qty Max</td>
						<td>
  <input type="text" name="qtymax">
  </td>
</tr>
<p>
<tr>
						<td colspan rowspan header>Stock</td>
						<td>
  <input type="text" name="stock">
  </td>
</tr>
<p>
<tr>
						<td colspan rowspan header>Tanggal Masuk</td>
						<td>
  <input type="date" name="tgl" value="<?php echo $tglsekarang; ?>" readonly>
  </td>
</tr>
<p>
<tr>
						<td colspan rowspan header>Gambar</td>
						<td>
	<input type="file" name="gambar">
  </td>
</tr>
<p>
                       <tr>
<td colspan rowspan header>Harga</td>
<td>
  <input type="text" name="harga">
  </td>
</tr>
<p>
    </div>
</table>
<p/>
 <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
 <input type="reset" name="reset" value="Reset" class="btn btn-info">
  </div>
</form>
<?php include $host.'/menu/bawah_admin.php'; ?>
</body>

</html>