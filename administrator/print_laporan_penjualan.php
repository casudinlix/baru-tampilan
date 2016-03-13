
<?php 
include "../setting/server.php";
require ("../pdf/fpdf.php");

$pdf = new FPDF("L","cm","A3");

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
$pdf->Cell(40,0.3,"Laporan Penjualan",0,30,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','i',10);
$pdf->Cell(5,0.19,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'nomor Order', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Kode Produk', 1, 0, 'C');
$pdf->Cell(1, 0.8, 'Qty', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Harga', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Type Order', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Biaya Kirim', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Tanggal Order', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Status', 1, 2, 'C');
$pdf->SetFont('Arial','',10);
$pdf->ln(0);
$rp="Rp.-";
//$rp=number_format($dataPro['harga']);

$queryTrs = $conn->query("SELECT * FROM transaksi WHERE status='Barang sudah dikirim'");
$no=1;

			while($dataTrs = $queryTrs->fetch_array()){
				$queryPro = $conn->query("SELECT * FROM m_produk");
				$dataPro = $queryPro->fetch_array();

	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $dataTrs['id_order'] , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $dataPro['id_produk'] , 1, 0, 'C');		
	$pdf->Cell(1, 0.8, $dataTrs['qty'] , 1, 0, 'C');
	$pdf->Cell(4.5, 0.8, $rp.$dataPro['harga'] , 1, 0, 'C');
	$pdf->Cell(4.5, 0.8, $dataTrs['type_order'] , 1, 0, 'C');
	$pdf->Cell(4.5, 0.8,$rp. $dataTrs['biaya'] , 1, 0, 'C');
	$pdf->Cell(6, 0.8, $dataTrs['tanggal'] , 1, 0, 'C');
	$pdf->Cell(6, 0.8, $dataTrs['status'] , 1, 0, 'C');



		$no++;
		$pdf->SetFont("Times","B",15);
		$pdf->ln(1);
		$pdf->Cell(6, 0.8,'Total Pendapatan' , 0, 0, 'C');
$pdf->ln(1);
		//$pdf->Cell(6, 0.8,$rp , 0, 0, 'C');
$pdf->Cell(6, 0.8,'Rp-,' , 0, 0, 'C');
$pdf->ln(0.5);
			$pdf->Cell(6, 0.8, number_format($dataTrs['biaya']+$dataPro['harga']+$dataTrs['qty']) , 0, 0, 'C');

}

$pdf->Output("laporan_penjualan(cas).pdf","I");

?>

 ?>
