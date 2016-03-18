<?php
session_start();
error_reporting(0);



include 'setting/server.php';

if (isset($_POST['submit'])) {
	$username =htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$nama = htmlspecialchars($_POST['nama']);
	$pass1= md5 (trim($_POST['pass1']));
	$pass2= md5 (trim($_POST['pass2']));
	

 		
 	if (trim($pass1) != trim($pass2)) {
 		echo "<script>window.alert('Password Harus sama');</script>";
		echo "<script>window.location ='daftar.php';</script>";
 		//echo "Sepertinya Password Anda Tidak Sama";
 		//include_once 'daftar.php';
 		//die("Silahkan Coba Lagi");

 		
 		
 	}elseif (trim($username)=="") {
 		echo "<script>window.alert('Data Berhasil Di Hapus');</script>";
		echo "<script>window.location ='../produk.php';</script>";
 		echo "Username Jangan Sampai Kosong";
 		//include_once 'daftar.php';
 		//die("Silahkan Coba Lagi");

 	}elseif (trim($email)=="") {
 		echo "Email Masih Kosong";
 		include_once 'daftar.php';
 		die("Silahkan Coba Lagi");
 		
 		
 	}else{
 		$username = strtolower($username);
 		$cek_user = $conn->query("SELECT * FROM login WHERE username='$username'");
 		if ($cek_user->num_rows > 0) {
 			echo "Username<br/>".$username."<br/>Sudah Ada";
 			include_once 'daftar.php';
 			$conn->close();
 		}else{

define('ROOT', 'http://127.0.0.1/1/');
		
		
		
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
		$pesan	.= "<a href='".ROOT."confirm.php?email=".$_POST['email']."&kode=$kode&username=".$_POST['username']."'>".ROOT."confirm.php?email=".$_POST['email']."&kode=$kode</a>

		Salam<br/>
		Bengkel Online";

		$kirim	= mail($to, $judul, $pesan, $dari);
		
		if($kirim){
			echo  "<script language='JavaScript'>alert('Sebuah Email Telah dikirim Ke Akun Anda Cek Sekarang');

		window.location='index.php';
 		</script>"
 		;
		}else{
			echo "Gagal Mengirim";
		}


 		}

 	}


		



	

}

?>