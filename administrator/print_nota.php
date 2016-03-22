
<?php 
include "../setting/server.php";
require ("../pdf/fpdf.php");

$pdf = new FPDF("P","cm","A5");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Arial","B",10);
$pdf->Image("../img/ico.jpg",2,1,2,2);
$pdf->SetX(3);
$pdf->Cell(6);
$pdf->MultiCell(10.4,0.5,'Wijaya Motor',0,'L');
$pdf->SetFont("Times","B",10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 021-221222',0,'L');
$pdf->SetFont('Arial','B',8);
$pdf->SetX(4);
$pdf->MultiCell(19.4,0.4,'Jl. Cikarang - Bekasi Tambun No 12 Tambun Selatan Kab. Bekasi 17690 ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.4,0.4,'website : www.bengkel.angkatan31.net @email : bengkel@angkatan31.net',0,'L');
$pdf->Line(1,3.1,14.5,3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1,3.2,14.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',30);
$pdf->Cell(15,0.3,"Nota Kasir",0,30,'L');
$pdf->ln(1);
$pdf->SetFont('Arial','i',10);
$pdf->Cell(5,0.19,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(0.5);

$pdf->SetFont('Arial','B',10);
//$pdf->ln(0);
$rp="Rp-.";
//$rp=number_format($dataPro['harga']);
$id_order=$_GET['id_order'];
$queryTrs = $conn->query("SELECT * FROM transaksi, m_produk WHERE id_order='$id_order' AND transaksi.id_produk=m_produk.id_produk");
$no=1;
$pdf->ln(0.8);
			while($dataTrs = $queryTrs->fetch_array()){
	$pdf->Cell(1, 0.8, 'NO :', 0, 0, 'L'); 
	$pdf->Cell(1, 0.8, $no , 0, 2, 'C');
	$pdf->ln(1);
	$pdf->Cell(5, 0.8, 'Tanggal', 0, 0, 'L');
	$pdf->Cell(1, 0.8, $dataTrs['tanggal'] , 0, 0, 'L');
	$pdf->ln(1);
$pdf->Cell(5, 0.8, 'Nomor Order', 0, 0, 'L');
	$pdf->Cell(1, 0.8, $dataTrs['id_order'] , 0, 0, 'L');
	$pdf->ln(1);
	$pdf->Cell(5, 0.8, 'Nama Barang', 0, 0, 'L');

	$pdf->Cell(1, 0.8, $dataTrs['nama_produk'] , 0, 0, 'L');
	$pdf->ln(1);
	$pdf->Cell(5, 0.8, 'Nama Pembeli', 0, 0, 'L');
	$pdf->Cell(4.5, 0.8, $dataTrs['username'] , 0, 0, 'L');
	$pdf->ln(1);
	$pdf->Cell(5, 0.8, 'Harga', 0, 0, 'L');
	$pdf->Cell(4.5, 0.8, $rp.number_format($dataTrs['harga']) , 0, 0, 'L');
	$pdf->ln(1);
	$pdf->Cell(5, 0.8, 'Qty', 0, 0, 'L');
	$pdf->Cell(4.5, 0.8, $dataTrs['qty'] , 0, 0, 'L');
	$pdf->ln(1);

$no++;

}

$pdf->Output("laporan_penjualan(cas).pdf","I");

?>

 ?>
