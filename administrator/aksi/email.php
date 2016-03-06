<?php 
define('ROOT', 'http://127.0.0.1/rest/');
		
		
		
		$kode	= md5(uniqid(rand(),TRUE));
		$konfirmasi = "INSERT INTO login (username,email,nama,password,confirm,kode,role,foto) VALUES('$username','$email','$nama','$pass1','N','$kode','2','avatar.png')";
			if ($conn->query($konfirmasi)===TRUE) {
				
			}else{
				die("ERROR".$konfirmasi."<br>".$conn->error);
			}


		$to 	= $_POST['email'];
		$judul 	= "Aktivasi Akun Anda";
		$dari	= "From: admin@bengkel.com \n";
		$dari	.= "Content-type: text/html \r\n";

		$pesan	= "Klik link berikut untuk mengaktifkan akun Anda: <br/>";
		$pesan	.= "<a href='".ROOT."confirm.php?email=".$_POST['email']."&kode=$kode&username=".$_POST['username']."'>".ROOT."confirm.php?email=".$_POST['email']."&kode=$kode</a>";

		$kirim	= mail($to, $judul, $pesan, $dari);
		
		if($kirim){
			echo  "<script language='JavaScript'>alert('Sebuah Email Telah dikirim Ke Akun Anda Cek Sekarang');

			window.location='login.php';
 		</script>"
 		;
		}else{
			echo "Gagal Mengirim";
		}


 		}

 	}

 ?>