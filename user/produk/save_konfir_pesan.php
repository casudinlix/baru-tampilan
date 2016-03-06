<?php 
include "../../setting/server.php";
include "../../setting/session.php";



//$id=$_GET['id_order'];
$kode =$_POST['kode'];
$biaya =$_POST['ongkos'];
//$select =$conn->query("SELECT * FROM transaksi WHERE id_order='$id'");
//$data =$select->fetch_assoc();


$foto= $_FILES['bukti']['name'];
$acak = $kode."-".rand(1,99);
$unic = $acak.$foto;




	$sql = $conn->query("UPDATE transaksi SET bukti_transfer='$unic', status='Sedang Verifikasi Data',biaya='$biaya' WHERE id_order='$kode'");

	//$sql1 = $conn->query("UPDATE transaksi SET bukti_transfer='$unic', status='Menunggu Konfirmasi',biaya='$biaya' WHERE id_order='$kode'");
if ($sql) {
	move_uploaded_file($_FILES['bukti']['tmp_name'],"../bukti/".$acak.$_FILES['bukti']['name']);
	$deleteOt = $conn->query("DELETE FROM order_user WHERE username='$idt'");
	echo "<script>window.location = 'sumari.php?id=$kode';</script>";

}else{
	die($sql1.$conn->error);
}
	 ?>