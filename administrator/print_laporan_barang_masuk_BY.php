
<?php 
include "../setting/server.php";
require ("../pdf/fpdf.php");

$pdf = new FPDF("L","cm","A3");
$tanggal=$_GET['tanggal'];
$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
	$pdf->SetFont("Arial","B",20);
	$pdf->Image("../img/ico.jpg",2,1,2,2);
$pdf->SetX(4);
$pdf->Cell(6);
$pdf->MultiCell(10.5,0.5,'Wijaya Motor',0,'L');
$pdf->SetFont("Times","B",10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 021-221222',0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Cikarang - Bekasi Tambun No 12 Tambun Selatan Kab. Bekasi 17690 ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.bengkel.angkatan31.net @email : bengkel@angkatan31.net',0,'L');
$pdf->Line(1,3.1,40.5,3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1,3.2,40.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',30);
$pdf->Cell(40,0.3,"Laporan Barang Masuk by Tanggal",0,30,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','u',10);
$pdf->Cell(5,0.19,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(0.5);
$pdf->ln(1);
$pdf->Cell(6,0.7,"Laporan Status Penjualan : ".$_GET['tanggal'],0,0,'C');
$pdf->ln(1);
$q=$conn->query("SELECT sum(harga) as total from m_produk WHERE tgl_masuk=".$tanggal );

while($total=$q->fetch_array()){
	$pdf->Cell(4, 0.8, "Total Value:", 0, 0,'L');
	$pdf->Cell(2, 0.8, "Rp-. ".number_format($total['total'])." ,-", 0, 0,'L');	
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'ID Produk', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'Nama Barang', 1, 0, 'C');
//$pdf->Cell(4.5, 0.8, 'Nama Pembeli', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'Harga', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'STOCK', 1, 0, 'C');
//$pdf->Cell(4.5, 0.8, 'Status', 1, 0, 'C');
$pdf->SetFont('Arial','',10);
//$pdf->ln(0);
$rp="Rp.";
//$rp=number_format($dataPro['harga']);


$queryTrs = $conn->query("SELECT * FROM m_produk WHERE tgl_masuk=".$tanggal);
$no=1;
$pdf->ln(0.8);

			while($dataTrs = $queryTrs->fetch_array()){
				
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(8, 0.8, $dataTrs['tgl_masuk'] , 1, 0, 'l');
	$pdf->Cell(8, 0.8, $dataTrs['nama_produk'] , 1, 0, 'l');		
	$pdf->Cell(8, 0.8, $dataTrs['id_produk'] , 1, 0, 'l');
	//$pdf->Cell(4.5, 0.8, $dataTrs['username'] , 1, 0, 'C');
	$pdf->Cell(8, 0.8, $rp.number_format($dataTrs['harga']) , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $dataTrs['stock'] , 1, 0, 'C');
	//$pdf->Cell(4.5, 0.8, $dataTrs['status'] , 1, 0, 'C');
	
	
$pdf->ln(0.8);
$no++;

}

$pdf->Output("laporan_barangasukByTanggal(cas).pdf","I");

?>

 ?>
