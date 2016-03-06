<?php
$conn =new mysqli("localhost","cas","bintang","TA");
if (mysql_errno()) {
	die("ERROR!!".connect_error);
}

$host='http://'.$_SERVER['SERVER_NAME'].'/1';

?>