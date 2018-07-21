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

 $password=$_POST['password'];
 $nama_lengkap=$_POST['nama_lengkap'];
 $email=$_POST['email'];
 $jenis_kelamin=$_POST['jenis_kelamin'];
 $alamat=$_POST['alamat'];
 $keterangan=$_POST['keterangan'];
 $tanggal_lahir=$_POST['tanggal_lahir'];

 $sql="update akun set password='$password',
 nama_lengkap='$nama_lengkap',
 email='$email', tanggal_lahir='$tanggal_lahir',
 jenis_kelamin='$jenis_kelamin',
 alamat='$alamat', keterangan='$keterangan' where akun_id='".$_SESSION['userid']."' ";

 mysql_query($sql, $koneksi)
 or die ("Gagal Simpan: ".mysql_error());
 header('Location:../profil.php');



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
			