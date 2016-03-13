 <?php
 include "../setting/server.php";
 include "../setting/session.php";
			
				$id=$_SESSION['id'];
				$password 	= md5($_POST['password0']);
				$password1 	= $_POST['password1'];
				$password2 	= $_POST['password2'];
				
				$cek = $conn->query("SELECT * FROM login WHERE id='$id' AND password='$password'");
				if($cek->num_rows == 0){
					 echo "<script>window.alert('User Dan Password Anda Kurang Tepat');</script>";
 echo "<script>window.location ='../administrator/pass.php?id=$id';</script>";
				}else{
					if($password1 == $password2){
						if(strlen($password1) >= 5){
							$pass = md5($password1);
							$update = $conn->query("UPDATE login SET password='$pass' WHERE id='$id'");
							
							if($update){
								echo "<script>window.alert('Password telah diperbaharui');</script>";
 echo "<script>window.location ='../administrator/profil.php';</script>";
								
							}else{
								echo "<script>window.alert('GAGAL');</script>";
 echo "<script>window.location ='../administrator/pass.php?id=$id';</script>";
								
							}
						}else{
							echo "<script>window.alert('Minimal 5 Karakter');</script>";
 echo "<script>window.location ='../administrator/pass.php?id=$id';</script>";
						}
					}else{
								echo "<script>window.alert('Konfirmasi Tidak Tepat');</script>";
 echo "<script>window.location ='../administrator/pass.php?id=$id';</script>";
								
					}
				}
			
			?>