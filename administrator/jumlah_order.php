<?php

$batas = 5;
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

$pos = "asc";
if ($by == "az") {
	$order = "id_order";
	
	$pos = "asc";
} elseif ($by == "za") {
	$order = "id_order";
	
	$pos = "desc";
}
$order = $conn->query("SELECT * FROM transaksi  ORDER BY $order, $pos,$pos LIMIT $posisi,$batas");


?>