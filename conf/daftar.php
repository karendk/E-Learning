<?php
session_start(); // Memulai Session Untuk Login
error_reporting(1); // Menghapus Error
require_once('config.php');
require_once('data.php');
/*$koneksi=mysql_connect("localhost","root", "")
or die ("gagal konek server".mysql_error());

if($koneksi){
 mysql_select_db("kbp",$koneksi)
 or die();
 */
 
 $username=$_POST['username'];
 $password=$_POST['password'];
 $nama_lengkap=$_POST['nama_lengkap'];
 $email=$_POST['email'];

 $sql="SELECT username FROM akun";
 $query=mysql_query($sql);
 $data=mysql_fetch_array($query);
 
 $sql="insert into akun
 (username,password,nama_lengkap,email)
 values
 ('$username','$password','$nama_lengkap','$email')";
 
 mysql_query($sql, $koneksi)
 or die (header('Location:../index.php#daftar').$_SESSION['warn']="username sudah ada, silahkan pilih yang lain.");
 //header('Location:../login.php');
 
 if ($_SESSION['login']==true) { // Ngecek Apakah Sudah Login atau Belum ?
				header('location:user.php');
			}
			
				$sql="SELECT * FROM akun WHERE username='$username' AND password='$password' AND status='1'";
				$query=mysql_query($sql);
				if (mysql_num_rows($query) == 1) { //Membuat Sesi Untuk Login dan Merubah Status Login Jadi True
					$data=mysql_fetch_array($query);
					$_SESSION['login']=true;
					$_SESSION['username']=$data['username'];
					$_SESSION['userid']=$data['akun_id'];
					header('location:../user.php');
				}else{
					header('Location:../index.php.php');
				}

 /*
 while ($row=mysql_fetch_array($query)) {
	 if($username==$row['username']){
	 	$_SESSION['warn']="username sudah ada, silahkan pilih yang lain.";
	 	header('Location:../index.php#daftar');	
	 }
	 else{
	 	$_SESSION['warn']=NULL;
	 	mysql_query($sql, $koneksi)
	 	 or die ("Gagal Simpan: ".mysql_error());
	 	header('Location:../login.php');
	 }
}*/


 




/* Jika mendaftar + login
			session_start(); // Memulai Session Untuk Login
			error_reporting(1); // Menghapus Error
			
			if ($_SESSION['login']==true) { // Ngecek Apakah Sudah Login atau Belum ?
				header('location:user.php');
			}
			
				$sql="SELECT * FROM akun WHERE username='$username' AND password='$password' AND status='1'";
				$query=mysql_query($sql);
				if (mysql_num_rows($query) == 1) { //Membuat Sesi Untuk Login dan Merubah Status Login Jadi True
					$data=mysql_fetch_array($query);
					$_SESSION['login']=true;
					$_SESSION['username']=$data['username'];
					$_SESSION['userid']=$data['akun_id'];
					header('location:../user.php');
				}else{
					header('Location:../login.php');
				}
*/
			