<?php
session_start();
session_destroy();
echo "<script>window.alert('Terimakasih');</script>";
	echo "<script>window.location = 'index.php';</script>";
?>