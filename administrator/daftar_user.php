<?php 
include_once '../setting/server.php';
include '../menu/head_admin.php'; 
include '../menu/tengah_admin.php';

$no = 1;
$user = $conn->query("SELECT * FROM login WHERE role='2' ");

	  ?>


<div id="page-wrapper" >
<table class="table table-bordered">
<tr class="info">
	
	<th colspan="" rowspan="" headers="" scope="" class="info">No</th>
	<th colspan="" rowspan="" headers="" scope="" class="info">User Name</th>
	<th colspan="" rowspan="" headers="" scope="" class="info">Email</th>
	<th colspan="" rowspan="" headers="" scope="" class="info">Nama</th>
	
	<th colspan="" rowspan="" headers="" scope="" class="info">Alamat</th>
	<th colspan="" rowspan="" headers="" scope="" class="info">No. Telepon</th>
	<th colspan="" rowspan="" headers="" scope="" class="info">Aktif</th>
	<th colspan="" rowspan="" headers="" scope="" class="info">Foto</th>
	<th colspan="" rowspan="" headers="" scope="" class="info">Aksi</th>
</tr>
<tbody>
<?php while ($data=$user->fetch_array()) {
	# code...
?>
	<tr class="warning" >
		<td colspan="" rowspan="" headers=""><?php echo $no; ?></td>
		<td colspan="" rowspan="" headers=""><?php echo $data['username']; ?></td>
		<td colspan="" rowspan="" headers=""><?php echo $data['email']; ?></td>
		<td colspan="" rowspan="" headers=""><?php echo $data['nama']; ?></td>
		<td colspan="" rowspan="" headers=""><?php echo $data['alamat'] ?></td>
		<td colspan="" rowspan="" headers=""><?php echo $data['tlp']; ?></td>
		<td colspan="" rowspan="" headers=""><?php echo $data['confirm']; ?></td>
		<td colspan="" rowspan="" headers=""><img src="<?php echo $host?>/user/foto/<?php echo $data['foto']; ?>" width="50px" class="img-circle"></td>
		<td align="center">
                              
                              <a class="btn btn-danger" href="aksi/action_hapus_user.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"title="">Hapus<em class="glyphicon glyphicon-trash"></em></a>
                            </td>
	</tr>
</tbody>
<?php
$no++;
 }
?>
</table>