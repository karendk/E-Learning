<?php  
session_start(); // Memulai Session Untuk Login
error_reporting(1); // Menghapus Error
require_once('conf/config.php');
require_once('conf/data.php');
if ($_SESSION['login']==true) { // Ngecek Apakah Sudah Login atau Belum ?
	header('location:user.php');
}
//proses login
if ($_SERVER['REQUEST_METHOD']=='POST') { // Ngecek Apakah Sudah Klik Login
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT * FROM akun WHERE username='$username' AND password='$password' AND status='1'";
	$query=mysql_query($sql);
	//login admin
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
	<title><?php echo $namaaplikasi ?></title>
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
	<?php include 'layout/navbar_utama.php';?>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">LOGIN</h4>
	      </div>
      	    <div class="modal-body">
					      <form class="form-signin" role="form" action="#" method="post">
					        <h2 class="form-signin-heading">Silahkan Login</h2>
					        <input name="username" type="text" class="form-control" placeholder="Username" required autofocus>
					        <input name="password" type="password" class="form-control" placeholder="Password" required>
					        <label class="checkbox">
					          <input type="checkbox" value="remember-me"> Remember me
					        </label>
					        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign-in</button>
					         <h5 align="center" class="form-signin-heading"><br>Belum punya akun?<br>Daftar
					        	<a href="#daftar">disini
					        	</a>
					         </h5>
					      </form>
      		      	    </div>
			      	  <div class="modal-footer">
        			Pastikan anda telah mendaftar
				      </div>
				    </div>
				  </div>
				</div>
			<!-- Modal -->
<div class="navbar navbar-inverse navbar-static-top">
	<div class="container">		
		<!-- login biasa
		 <a href='login.php' class="navbar-right">
		 	<button type="button" class="btn navbar-btn">Login</button>
		 </a>-->
		  <a href='#' class="navbar-right">
		  			<!-- Button trigger modal -->
			<button  type="button" class="btn navbar-btn btn-primary" data-toggle="modal" data-target="#myModal">Login</button>
			<!-- Button trigger modal -->
		  </a>

			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
		   		<span class="icon-bar"></span>
		   		<span class="icon-bar"></span>
		   		<span class="icon-bar"></span>
		   </button>

		   <div class="collapse navbar-collapse navHeaderCollapse">
   				<ul class="nav navbar-nav navbar-justified">
   					<li class="active"><a href='index.php' class="smoothScroll">Home</a></li>
            		<li><a href='#detail' class="smoothScroll">Detail</a></li>
            		<li><a href='#cara' class="smoothScroll">How to?</a></li>
                	<li><a href='#daftar' class="smoothScroll">Sign-in</a></li>
                </ul>
           </div>
       </div>
</div>


<a name="detail"></a>
<!--Slide Gambar-->

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="media/a1.jpg" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="media/a2.jpg" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="media/a3.jpg" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="media/a4.jpg" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="jumbotron">
	<a name="cara"></a>
  <a href="#cara" class="smoothScroll"><h3 align="center">Langkah-Langkah</h3></a>
</div>
<div class="container">
	<div align="center" class="col-sm-4" style="top:30px; padding-bottom:30px;">
		<div class="alert alert-info">
		<img src="media/signin.png" class="img-circle" style="background-color:#3276b1;" width=50% height=50%>
		 
			<h2>1. Mendaftar</h2>
			<p class="bg-info">
				Untuk memulai belajar online, anda harus mendaftar di menu Pendaftaran terlebih dahulu. Dengan mendaftar, anda dapat mengakses semua materi.
			</p>
	     </div>
    </div>
	<div align="center" class="col-sm-4" style="top:30px; padding-bottom:30px;">
		<div class="alert alert-info">
		<img src="media/learn.png" class="img-circle" style="background-color:#3276b1;" width=50% height=50%>
		<h2>2. Baca Materi</h2>
		<p class="bg-info" >
				Kita dapat belajar lebih banyak dari yang anda bayangkan. belajar online dapat dilakukan dimana pun, kapan pun, dan siapa pun.
		</p>
		</div>
	</div>
	<div align="center" class="col-sm-4" style="top:30px; padding-bottom:30px;">
		<div class="alert alert-info">
		<img src="media/sertifikat.png" class="img-circle" style="background-color:#3276b1;" width=50% height=50%>
		<h2>3. Dapatkan Sertifikat</h2>
		<p class="bg-info">
				Ayo dapatkan sertifikat setelah anda membaca semua materi! sertifikat hanyalah sebagai tanda bahwa anda telah menyelesaikan belajar online.
		</p>
		</div>
		<br><br><br><br>
	</div>
</div>

<a name="daftar"></a>
	<div class="jumbotron">
	  <a href="#daftar" class="smoothScroll" ><h3 align="center">Pendaftaran</h3></a>
	</div>

	<div class="container">
	      <form class="form-signin" role="form" action="conf/daftar.php" method="post">
	        <h2 class="form-signin-heading"></h2>
	        <h4 class="form-signin-heading">Nama :</h4>
	        <input name="username" type="text" class="form-control" placeholder="Username" maxlength="20" required>
	        <span style="color:red; "><h5><i><?php echo $_SESSION['warn']?></i></h5></span>
	        <h4 class="form-signin-heading">Password: </h4>
	        <input name="password" type="password" class="form-control" placeholder="Password" maxlength="18" required>
	        <h4 class="form-signin-heading">E-mail: </h4>
	        <input name="email" type="email" class="form-control" placeholder="E-mail" maxlength="25" required>
	        <h4 class="form-signin-heading">Nama Lengkap :</h4>
	        <input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" maxlength="30"required>
	        <h4 class="form-signin-heading"> </h4>
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar Sekarang</button>
	      </form>
	      <br><br><br><br><br>
	</div>
<?php include 'layout/footer.php';?>
</font>
</body>
</html>