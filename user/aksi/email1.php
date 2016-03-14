<?php 


		$to 	= $_POST['email'];
		$judul 	= "Konfirmasi Pembelian Anda ".$kode;
		$dari	= "From: no-reply@bengkel.angkatan31.net \n";
		$dari	.= "Content-type: text/html \r\n";

		$pesan	= "Terimakasih ".$_SESSION['nama']. "
		telah melakukan order di bengkel Kami, untuk pembayaran silahkan transfer ke
		";
		$pesan	.= "Nomor Rekening 021009.23221.43 a/n PT. bengkel angkatn31 tepat 1x24 JAM


		";
		$pesan	.= "KODE Pembelian: ".$kode."



		Bstregd -, Admin";
		
		
		$kirim	= mail($to, $judul, $pesan, $dari);
		
		if($kirim){
			
				

 		
		}else{
			echo "Gagal Mengirim";
		}


 		

 	

 ?>