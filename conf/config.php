<?php  
	$host="localhost";
	$userdb="root";
	$passdb="";

	$koneksi=mysql_connect($host,$userdb,$passdb);
	$db=mysql_select_db("kitabkuning_db");

	if ($db) {
	}
	else{
		echo "Tidak Terkoneksi";
	}
?>