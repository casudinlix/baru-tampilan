<?php
include '../setting/server.php';
$batas = 10;
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

$order = "id_order";
$type = "type_order";
$pos = "asc";
if ($by == "az") {
	
	$type = "type_order";
	$pos = "asc";
} elseif ($by == "za") {
	$type = "type_order";
	$pos = "desc";
}
$transaksi = $conn->query("SELECT * FROM transaksi  ORDER BY $order $pos,$type $pos LIMIT $posisi,$batas ");


?>