<?php
include 'setting/server.php';
$batas = 4;
// $halaman = $_GET['halaman'];
if(isset($_GET['halaman'])) {
	$halaman = $_GET['halaman'];
} else {
	$halaman = "";
}
// $by = $_GET['by']
if(isset($_GET['by'])) {
	$by = $_GET['by'];
} else {
	$by = "";
}

if(empty($halaman)){
    $posisi=0;
    $halaman=1;
}
else{
    $posisi = ($halaman-1) * $batas;
}

$order = "id_produk";
$type = "kategori";
$pos = "asc";
if ($by == "az") {
	$order = "nama_produk";
	$type = "kategori";
	$pos = "asc";
} elseif ($by == "za") {
	$order = "nama_produk";
	$type = "kategori";
	$pos = "desc";
}
$katalog = $conn->query("SELECT * FROM m_produk  ORDER BY $order $pos,$type $pos LIMIT $posisi,$batas");


?>