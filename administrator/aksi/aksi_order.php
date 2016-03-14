<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';

	if(isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = "";
}


//
//
if (isset($_GET['act'])) {
	$act=$_GET['act'];
}
if ($act=='hapus') {
$u=$conn->query("SELECT * FROM transaksi WHERE id_order='$id'");
$us=$u->fetch_array();
$foto= $_FILES['bukti_transfer']['name'];
if(file_exists("../../user/bukti/".$us['bukti_transfer'])){
	unlink("../../user/bukti/".$us['bukti_transfer']);
	$delete = $conn->query("DELETE FROM transaksi WHERE id_order='$id'");
	$hapus = $conn->query("DELETE FROM order_detail WHERE id_order='$id'");
}
	if (!$delete) {
		echo $conn->error;
	}else{
		echo "<script>window.alert('Data Berhasil Di Hapus');</script>";
	echo "<script>window.location = '../cek_order.php';</script>";
	}

}elseif ($act=='approve') {

$queryOrd = $conn->query("SELECT * FROM order_detail WHERE id_order='$id'");
	$dataOrd = $queryOrd->fetch_array();
	$queryTrs = $conn->query("SELECT * FROM transaksi WHERE id_order='$dataOrd[id_order]'");
	while($dataTrs = $queryTrs->fetch_array()){
		$queryPro = $conn->query("SELECT * FROM m_produk WHERE id_produk='$dataTrs[id_produk]'");
		$dataPro = $queryPro->fetch_array();
		
		$updateStok = $conn->query("UPDATE m_produk SET stock='$dataPro[stock]'-'$dataTrs[qty]' WHERE id_produk='$dataTrs[id_produk]'");
		$selectSale = $conn->query("SELECT * FROM stock WHERE id_produk='$dataPro[id_produk]'");
		$dataSale = $selectSale->fetch_array();

		$updateSale = $conn->query("UPDATE stock SET terjual='$dataSale[terjual]'+'$dataTrs[qty]' WHERE id_produk='$dataPro[id_produk]'");
		$upstock = $conn->query("UPDATE stock SET stock='$dataSale[stock]'-'$dataTrs[qty]' WHERE id_produk='$dataPro[id_produk]'");




}
$status = $conn->query("UPDATE transaksi SET status='Barang sudah dikirim' WHERE id_order='$id'");
	echo "<script>window.alert('SELAMAT Transaksi Sudah di proses');</script>";
	echo "<script>window.location = '../order.php?id=$id';</script>";
}
if ($act=='reject') {
	$ubah =$conn->query("UPDATE  transaksi SET status='Transaksi Ditolak' WHERE id_order='$id'");
	echo "<script>window.alert('Transaksi Sudah di Reject');</script>";
	echo "<script>window.location = '../order.php?id=$id';</script>";
}
?>