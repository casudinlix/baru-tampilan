
<?php 
include "../setting/server.php";
require ("../pdf/fpdf.php");

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Arial","B",20);
$pdf->Image("../img/ico.jpg",2,1,2,2);

$pdf->MultiCell(19.5,0.5,'Wijaya Motor',0,'R');
$pdf->SetFont("Times","B",10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 021-221222',0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Cikarang - Bekasi Tambun No 12 Tambun Selatan Kab. Bekasi 17690 ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.bengkel.angkatan31.net @email : bengkel@angkatan31.net',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data ALL Barang Masuk",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$q=$conn->query("SELECT sum(harga) as total from m_produk ");

while($total=$q->fetch_array()){
	$pdf->Cell(5, 0.8, "Total Modal", 0, 0,'L');		
	$pdf->Cell(4.5, 0.8, "Rp. ".number_format($total['total'])." ,-", 0, 0,'C');	
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Kode', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jenis', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'modal', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Tanggal Masuk', 1, 0, 'C');
$rp="Rp-,";
$pdf->Cell(2, 0.8, 'Qty', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=$conn->query("SELECT * FROM m_produk");
while($lihat=$query->fetch_array()){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['id_produk'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['nama_produk'], 1, 0,'L');
	$pdf->Cell(4, 0.8, $lihat['kategori'],1, 0, 'L');
	
	$pdf->Cell(4.5, 0.8,$rp.number_format($lihat['harga']),1, 0, 'L');
	$pdf->Cell(4.5, 0.8, $lihat['tgl_masuk'],1, 0, 'C');	
	$pdf->Cell(2, 0.8, $lihat['stock'], 1, 1,'C');

	$no++;
}

$pdf->Output("laporan_barangMasuk(cas).pdf","I");

?>

 ?>
