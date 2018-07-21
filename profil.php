<?php  
session_start();
require_once('conf/config.php');
require_once('conf/data.php');
if ($_SESSION['login']==false) { // Cek Jika Belum Login
	header('Location:login.php');
}

//memilih data
$sql="SELECT * FROM akun WHERE akun_id='".$_SESSION['userid']."'";
$query=mysql_query($sql);
$profil=mysql_fetch_array($query);
$data=$profil;

 $username=$data['username'];
 $password=$data['password'];
 $nama_lengkap=$data['nama_lengkap'];
 $email=$data['email'];
 $tanggal_lahir=$data['tanggal_lahir'];
 $jenis_kelamin=$data['jenis_kelamin'];
 $alamat=$data['alamat'];
 $keterangan=$data['keterangan'];
 
 if($data['keterangan']==NULL){
 	$keterangan="(Disini anda bisa mengisi kata kata bijak. untuk mengisinya, klik saya.)";
 }


 if($data['jenis_kelamin']=='Laki-Laki'){
	 $cekp="checked";
	 $cekw="";
	 $foto="media/avatar_laki.png";
 }
 else if($data['jenis_kelamin']=='Perempuan'){
	 $cekp="";
	 $cekw="checked";
	 $foto="media/avatar_perempuan.png";
 }
 else{
	 $cekp="";
	 $cekw="";
	 $foto="media/avatar.png";
 }

?>
<!DOCTYPE html>
<html lang="en">
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

    .user {
        position: relative;
        width: 240px;
        height: 240px;
        
    }

    .link {
        display: block;
        width: 100%;
        height: 100%;
        text-decoration: none;
    }

    .user-info {
        position: absolute;
        bottom: 0;
    }

    .h2 {
        background: rgba(0,0,0,0.7);
        color: #fff;
        padding: 8px;
        margin: 0;
    }

    .bio-reveal {
        overflow: hidden;
        max-height: 0;
        background: rgba(183, 191, 185, 0.95);
        -webkit-transition: all 0.7s linear;
        -moz-transition: all 0.7s linear;
        -o-transition: all 0.7s linear;
        -ms-transition: all 0.7s linear;
        transition: all 0.7s linear;
    }

    .paragraf {
    	width:240px;
        color: #333;
        padding: 8px;
        margin: 0;
    }

    .link:hover .bio-reveal, a:focus .bio-reveal {
        max-height: 240px;
    }
	</style>
  </head>
  <body>
<?php include 'layout/navbar_utama.php';?>
<?php 
	if($profil['status']==0){
		include 'layout/navbar_admin.php';
	}
	else{
		include 'layout/navbar.php';
	}
?>
<!--
    <div class="jumbotron" align="center">
        <h2>Selamat Datang! <a href=''><?php  echo $profil['nama_lengkap'] ?></a>...</h2>
    </div>
    -->

<!-- Small modal isi -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" align="center">
      <?php  echo $data['password'] ?>
    </div>
  </div>
</div>

<div class="col-sm-12 jumbotron" align="middle">
	<div class="user">
	    <a class="link smoothScroll" href="#katabijak" >
	    	<img src="<?php echo $foto ?>" width=240px height=240px>
	        <div class="user-info">
	            <h2 class="h2"><?php  echo $data['username'] ?></h2>
	            <div class="bio-reveal">
	                <p class="paragraf">
	                 <?php  echo $keterangan ?>
	                </p>
	            </div>
	        </div>
	    </a>
	</div>
</div>

<div class="container"  class="alert alert-success" >
<h2 align="center"></h2>



	<div class="col-sm-6">
		<br>
		<ul class="list-group">
		  <li class="list-group-item list-group-item-info">Nama</li>
		  <li class="list-group-item list-group-item-info">password</li>
		  <li class="list-group-item list-group-item-info">Nama Lengkap</li>
		  <li class="list-group-item list-group-item-info">E-mail</li>
		  <li class="list-group-item list-group-item-info">Tanggal Lahir</li>
		  <li class="list-group-item list-group-item-info">Jenis Kelamin</li>
		  <li class="list-group-item list-group-item-info">Alamat</li>
		</ul>
	</div>
	<div class="col-sm-6">
		<br>
	<ul class="list-group">
	  <li class="list-group-item list-group-item-info">: <?php  echo $data['username'] ?></li>
	  <li class="list-group-item list-group-item-info" >: ******** 
		  		  	<!-- Small modal tombol -->
		  		  	<button type="button" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true">
						</span>
					</button>
	  </li>
	  <li class="list-group-item list-group-item-info">: <?php  echo $data['nama_lengkap'] ?></li>
	  <li class="list-group-item list-group-item-info">: <?php  echo $data['email'] ?></li>
	  <li class="list-group-item list-group-item-info">: <?php  echo $data['tanggal_lahir'] ?></li>
	  <li class="list-group-item list-group-item-info">: <?php  echo $data['jenis_kelamin'] ?></li>
	  <li class="list-group-item list-group-item-info">: <?php  echo $data['alamat'] ?></li>
	</ul>
	</div>
</div>
<br><br>
<div class="jumbotron">
<h2 align="center">Edit Profil</h2>
</div>
<div class="container">
	      <form class="form-horizontal" role="form" action="conf/ubah-profil.php" method="post">
	        <h2 class="form-signin-heading"></h2>
	  <div class="form-group">
	    <h4  class="col-sm-2 control-label">Nama </h4>
	    <div class="col-sm-10">
	        <input name="username" type="text" class="form-control" value="<?php echo "$username"?>" placeholder="Username" disabled>
	    </div>
	  </div>
	  <div class="form-group">  
	    <h4 class="col-sm-2 control-label">Password </h4>
		<div class="col-sm-10">
	        <input name="password" type="password" class="form-control" value="<?php echo "$password"?>" placeholder="Password" required >
	    </div>
	  </div>
	  <div class="form-group">  
	    <h4 class="col-sm-2 control-label">E-mail </h4>
	    <div class="col-sm-10">
	        <input name="email" type="email" class="form-control" value="<?php echo "$email"?>" placeholder="E-mail"required>
	    </div>
	  </div>
	  <div class="form-group">  
	    <h4 class="col-sm-2 control-label">Nama Lengkap </h4>
		<div class="col-sm-10">
	        <input name="nama_lengkap" type="text" class="form-control" value="<?php echo "$nama_lengkap"?>" placeholder="Nama Lengkap" required>
	    </div>
	  </div>
	  <div class="form-group">  
	    <h4 class="col-sm-2 control-label">Tanggal Lahir </h4>
		    <div class="col-sm-10">
		    	<input name="tanggal_lahir" type="date" value="<?= $data['tanggal_lahir']; ?>" placeholder="YYYY-MM-DD" title="MM-DD-YYYY" class="form-control"> 
		    </div>
	  </div>
	  <div class="form-group">  
	    <h4 class="col-sm-2 control-label">Jenis Kelamin </h4>
	    <div class="col-sm-10">
			<input name="jenis_kelamin" type="radio" value="Laki-Laki" <?php echo "$cekp"?> > Laki-Laki
			<input name="jenis_kelamin" type="radio" value="Perempuan" <?php echo "$cekw"?> > Perempuan
	    </div>
	  </div>
	  <div class="form-group"> 
	    <h4 class="col-sm-2 control-label">Alamat </h4>
	    <div class="col-sm-10">
	        <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="<?php echo "$alamat"?>" required>
	    </div>
	  </div><h4 class="form-signin-heading"> </h4>
	  <div class="form-group"> 
	  <a name="katabijak"></a> 
		<h4 class="col-sm-2 control-label">Kata Bijak</h4>
		<div class="col-sm-10">
		  <input name="keterangan" type="text" class="form-control" value="<?php echo "$keterangan"?>" placeholder="Kata-Kata Mutiara" required>
		</div>
	  </div>
	        <br><br>
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Ubah Data</button>
	      </form>
	      
	  
</div>
    <br><br><br>
    <?php include 'layout/footer.php';?>
  </body>
</html>
