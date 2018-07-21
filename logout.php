<?php  
session_start(); // Memulai Sesi
if ($_SESSION['login']==false) { //Cek apabila belum login
	header('Location:index.php');
}else{ //menghapus session
	$_SESSION['login']=false;
	session_destroy();
	header('Location:index.php');
}
?>