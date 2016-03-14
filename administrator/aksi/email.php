<?php 
define('ROOT', 'http://127.0.0.1/rest/');

		$to 	= $_POST['email'];
		$judul 	= "Konfirmasi Pembelian Anda";
		$dari	= "From: no-replya@bengkel.angkatan31.net \n";
		$dari	.= "Content-type: text/html \r\n";

		$pesan	= "";
		$pesan	.= "";
		$kirim	= mail($to, $judul, $pesan, $dari);
		
		if($kirim){
			echo  "<script language='JavaScript'>alert('Sebuah Email Telah dikirim Ke Akun Anda Cek Sekarang');

			window.location='login.php';
 		</script>"
 		;
		}else{
			echo "Gagal Mengirim";
		}


 		

 	

 ?>