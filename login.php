<?php  
session_start(); // Memulai Session Untuk Login
error_reporting(1); // Menghapus Error
require_once('conf/config.php');
require_once('conf/data.php');
if ($_SESSION['login']==true) { // Ngecek Apakah Sudah Login atau Belum ?
	header('location:user.php');
}
if ($_SERVER['REQUEST_METHOD']=='POST') { // Ngecek Apakah Sudah Klik Login
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT * FROM akun WHERE username='$username' AND password='$password' AND status='1'";
	$query=mysql_query($sql);
	$sql2="SELECT * FROM akun WHERE username='$username' AND password='$password' AND status='0'";
	$query2=mysql_query($sql2);

	if (mysql_num_rows($query) == 1) { //Membuat Sesi Untuk Login dan Merubah Status Login Jadi True
		$data=mysql_fetch_array($query);
		$_SESSION['login']=true;
		$_SESSION['username']=$data['username'];
		$_SESSION['userid']=$data['akun_id'];
		$_SESSION['status']=$data['status'];
		header('location:user.php');
	}
	else if (mysql_num_rows($query2) == 1) { //Membuat Sesi Untuk Login dan Merubah Status Login Jadi True
		$data=mysql_fetch_array($query2);
		$_SESSION['login']=true;
		$_SESSION['username']=$data['username'];
		$_SESSION['userid']=$data['akun_id'];
		$_SESSION['status']=$data['status'];
		header('location:admin.php');
	}
	else{
		header('Location:login.php');
	}
} 
?>
<!DOCTYPE html>
<html>
<head>	
	<title>Login <?php echo $namaaplikasi ?></title>
	<meta charset='utf-8'>
   	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="lib/css/bootstrap.css" rel="stylesheet">
	<link href="lib/css/style.css" rel="stylesheet">
	<link href="lib/css/style1.css" rel="stylesheet">
	<link rel="icon" href="media/Logo.png" type="image/x-icon">
	<script src="lib/js/jquery.js" type="text/javascript" ></script>
	<script src="lib/js/bootstrap.js" type="text/javascript" ></script>
    	<script src="lib/js/smoothscroll.js" type="text/javascript" ></script>
	<style>
		body{
			margin: 0; padding: 0; outline: 0; font-size: 12pt;
		}
	</style>
</head>
<body>
<font face="verdana">
<?php  include 'layout\navbar_utama.php';?>
<div id="tengah">
	<!--
	<div class="panel panel-warning"><h3 class="form-signin-heading" align="center">Untuk memvalidasikan akun anda</h3></div>
    -->
	<div class="panel panel-danger"><h3 class="form-signin-heading" align="center">Pastikan anda memasukan password atau username dengan benar</h3></div>
	<div class="container">
      <form class="form-signin" role="form" action="#" method="post">
        <h2 class="form-signin-heading" align="center">Silahkan Login</h2>
        <input name="username" type="text" class="form-control" placeholder="Username" required autofocus>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <h5 align="center" class="form-signin-heading"><br>Belum punya akun?<br>Daftar
					        	<a href="index.php#daftar">disini
					        	</a>
					         </h5>
      </form>
    </div>
</div>
    <div style="position: fixed;
	padding-top:25px;
	padding-bottom:25px;
	background-color: black;
	color:white;
	width:100%;
	bottom:0px;" align=center> Copyright by MAKUS CORP</div>

</font>
</body>
</html>