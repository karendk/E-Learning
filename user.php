<?php  
session_start();
require_once('conf/config.php');
require_once('conf/data.php');
if ($_SESSION['login']==false) { // Cek Jika Belum Login
	header('Location:login.php');
}
$sql="SELECT * FROM akun WHERE akun_id='".$_SESSION['userid']."'";
$query=mysql_query($sql);
$profil=mysql_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    	<title>User <?php echo $namaaplikasi ?></title>
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
<?php include 'layout/navbar_utama.php';?>
<?php 
	if($profil['status']==0){
		include 'layout/navbar_admin.php';
	}
	else{
		include 'layout/navbar.php';
	}
?>
    <div class="jumbotron">
    	<h2 align="center">Materi Kitab Kuning</h2>
        <!--<h1><?php  echo $namaaplikasi ?></h1>-->
        <!--<h2 align="center">Apa itu Kitab Kuning?</h2>-->
		<!--<p><?php  echo $keteranganaplikasi ?></p>-->
    </div>
    <div class="container">
      <?php 
      $sql2="SELECT * FROM materi ORDER BY materi_id ASC";
      $query2=mysql_query($sql2);
      while ($row=mysql_fetch_array($query2)) { ?>
      <div class="col-sm-4">
	      <div class="panel panel-info">
	        <div class="panel-heading">
	          <h3 class="panel-title"><?php echo $row['judul_materi'] ?></h3>
	        </div>
	        <div class="panel-body">
	          <?php  echo $row['keterangan'] ?>
	        </div>
	        <div class="panel-footer">
	        		<div class="row">
	        	<div class="col-sm-12">
		        	<span class="">
		        		Penulis: 
			        	<?php  
			        	$penulis=mysql_query("SELECT * FROM akun WHERE akun_id='".$row['akun_id']."'");
			        	$datapenulis=mysql_fetch_array($penulis);
			        	echo $datapenulis['nama_lengkap'];
			        	?>
		        	</span>
		        	<a href="kursus.php?id=<?php echo $row['materi_id'] ?>&nomor=1" class="btn btn-info pull-right"><i class="glyphicon glyphicon-book"></i> Baca</a>
	        	</div>
	        	</div>
	        </div>
	      </div>
	    </div>
      <?php } ?>
    </div>
    <br><br><br>
    <?php include 'layout/footer.php';?>
  </body>
</html>
