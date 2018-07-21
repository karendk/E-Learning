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
  	<title>Log Kursus <?php echo $namaaplikasi ?></title>
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
<?php include 'layout/navbar_utama.php'; ?>
<?php 
    if($profil['status']==0){
        include 'layout/navbar_admin.php';
    }
    else{
        include 'layout/navbar.php';
    }
?>

<!-- Progress Log-->
<?php $logquery=mysql_query("SELECT * FROM log_bab WHERE akun_id='".$_SESSION['userid']."' ORDER BY log_id DESC"); ?>
    <div class="container">
        <br>
        <div align="center" class="col-sm-4" style="top:30px; padding-bottom:30px;">
            <br>
            <div class="alert alert-info">
            <img src="media/signin.png" class="img-circle" style="background-color:#3276b1;" width=50% height=50%>
             
                <h2>1. Mendaftar</h2>
                <h2 class='glyphicon glyphicon-ok'></h2>
                    <p class="bg-info">
                    </p>
             </div>
        </div>
        <div align="center" class="col-sm-4" style="top:30px; padding-bottom:30px;">
            <br>
            <div class="alert alert-info">
            <img src="media/learn.png" class="img-circle" style="background-color:#3276b1;" width=50% height=50%>
            <h2>2. Materi</h2>
            <p class="bg-info" >
                <?php  
                    if (mysql_num_rows($logquery) == 6) { ?>
                        <h2 class='glyphicon glyphicon-ok'></h2>
                <?php } 
                    else if (mysql_num_rows($logquery) == 5) { ?>
                        <h2 class='glyphicon'>5/6</h2>
                <?php } 
                    else if (mysql_num_rows($logquery) == 4) { ?>
                        <h2 class='glyphicon'>4/6</h2>
                <?php } 
                    else if (mysql_num_rows($logquery) == 3) { ?>
                        <h2 class='glyphicon'>3/6</h2>
                        <!--<h2 class='glyphicon glyphicon-pencil'></h2>-->
                <?php }
                    else if (mysql_num_rows($logquery) == 2) { ?>
                         <h2 class='glyphicon'>2/6</h2>
                <?php }
                    else if (mysql_num_rows($logquery) == 1) { ?>
                        <h2 class='glyphicon'>1/6</h2>
                <?php }
                    else { ?>
                        <h2 class='glyphicon glyphicon-remove'></h2>
                <?php } ?>
            </p>
            </div>
        </div>
        <div align="center" class="col-sm-4" style="top:30px; padding-bottom:30px;">
            <br>
            <div class="alert alert-info">
            <img src="media/sertifikat.png" class="img-circle" style="background-color:#3276b1;" width=50% height=50%>
            <h2>3. Sertifikat</h2>
            <p class="bg-info">
                <?php  
                    if (mysql_num_rows($logquery) == 6) { ?>
                        <h2 class='glyphicon glyphicon-ok'></h2>
                <?php } 
                    else{ ?>
                         <h2 class='glyphicon glyphicon-remove'></h2>
                <?php } ?>
            </p>
            </div>
        </div>


        <?php  
        if (mysql_num_rows($logquery) == 6) { ?>
            <div class="alert alert-success"> 
                <p style="text-align:center">SELAMAT, ANDA TELAH MENYELESAIKAN SEMUA MATERI, SILAHKAN DAPATKAN SERTIFIKAT <a target="_blank" href="sertifikat.php">DISINI</a></p>
            </div>
        <?php } ?>
    <br>
    </div>
    <div class="jumbotron">
        <h3 align="center">Daftar Log Kursus Anda</h3>
    </div>
    <hr>
    <div class="container">
    <div class="col-md-12 well">
    	<?php  
    	$logquery=mysql_query("SELECT * FROM log_bab WHERE akun_id='".$_SESSION['userid']."' ORDER BY log_id DESC"); ?>    
    	<?php
        while ($row=mysql_fetch_array($logquery)) {
    		$materiq=mysql_query("SELECT * FROM materi WHERE materi_id='".$row['materi_id']."'");
    		$materi=mysql_fetch_array($materiq);
    	?>
    	<div class="alert alert-info">
    		<p>
    		<i class='glyphicon glyphicon-ok'></i> Anda Telah Menyelesaikan Materi <?php echo "<b>".$materi['judul_materi']."</b>"; ?>  
    		<span class='pull-right'><i class='glyphicon glyphicon-time'></i> <?php echo $row['tgl'] ?></span>
    		</p>
    	</div>
    	<?php
    	}
    	?>
    </div>
    </div>
    <br><br><br><br>
    <?php include 'layout/footer.php';?>
  </body>
</html>
