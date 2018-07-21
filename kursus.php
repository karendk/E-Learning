<?php  
session_start();
require_once('conf/config.php');
require_once('conf/data.php');
if ($_SESSION['login']==false) { // Cek Jika Belum Login
	header('Location:login.php');
}

$id=$_GET['id'];
$nomor=$_GET['nomor'];
//Mendapatkan Akun
$sql="SELECT * FROM akun WHERE akun_id='".$_SESSION['userid']."'";
$query=mysql_query($sql);
$profil=mysql_fetch_array($query);

//Mendapatkan Detail Materi
$detmateri=mysql_query("SELECT * FROM materi WHERE materi_id='$id'");
$materi=mysql_fetch_array($detmateri);

//Mendapatkan Penulis Materi
$penmateri=mysql_query("SELECT * FROM akun WHERE akun_id='".$materi['akun_id']."'");
$penulis=mysql_fetch_array($penmateri);

//Mendapatkan Putar Sekarang Sub Kursus
$putarsub=mysql_query("SELECT * FROM sub_bab WHERE materi_id='$id' AND nomor='$nomor' ORDER BY nomor ASC");
$putar=mysql_fetch_array($putarsub);

//Cek apakah pernah nonton
$ceknonton=mysql_query("SELECT * FROM log_bab WHERE akun_id='".$_SESSION['userid']."' AND materi_id='$id'");
if (mysql_num_rows($ceknonton)==0) {
	mysql_query("INSERT INTO log_bab(akun_id,materi_id) VALUES('".$_SESSION['userid']."','$id')");
}
/*
$ceknonton=mysql_query("SELECT * FROM log_bab WHERE akun_id='".$_SESSION['userid']."' AND materi_id='$id'");
if (mysql_num_rows($ceknonton)==0) {
	mysql_query("INSERT INTO log_bab(akun_id,materi_id) VALUES('".$_SESSION['userid']."','$id',)");
}
*/

//Mendapatkan Daftar Putar
$dafputar=mysql_query("SELECT * FROM sub_bab WHERE materi_id='$id' ORDER BY nomor ASC");

//Mendapatkan Semua Materi
$dafmateri=mysql_query("SELECT * FROM materi ORDER BY materi_id ASC");
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
    <div class="container">
    <div class="col-md-12">
<!--=============================VIDEO-->
      <video controls width="100%" height="">
      	<source src="<?php echo $putar['link_video']?>">
      </video>
<!--=============================VIDEO-->
      <h2>
      <i class="glyphicon glyphicon-book"></i> <?php echo $materi['judul_materi']." "/*.$putar['judul_sub']*/ ?>
      </h2>
    </div>
    <div class="col-lg-12">
		<div class="col-sm-8 alert alert-info">
			<h5 class="b">
				Penulis Materi : <?php echo $penulis['nama_lengkap'] ?> | Pada : <?php echo $materi['tanggal'] ?>
				<span class="badge badge-success pull-right">
					<?php if (mysql_num_rows($ceknonton)==1){ ?>
						Pernah Dibaca
					<?php }else{ ?>
						Belum Pernah Dibaca
					<?php } ?>
				</span>
			</h5>
			<hr>
			Keterangan
			<div class="well">
				<?php
					if($id=='1'){
						include 'materi/BAB I.php';
					}
					else if($id=='2'){
						include 'materi/BAB II.php';
					}
					else if($id=='3'){
						include 'materi/BAB III.php';
					}
					else if($id=='4'){
						include 'materi/BAB IV.php';
					}
					else if($id=='5'){
						include 'materi/BAB V.php';
					}
					else{
						include 'materi/BAB VI.php';
					}
				?>
				<!--<?php echo $putar['keterangan_sub'] ?>-->
			</div>
			<hr>
			<div class="well"> <!--Untuk Komentar Pakai Disqus-->
				<div id="disqus_thread"></div>
				<script>
				/**
				* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
				* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
				*/
				/*
				var disqus_config = function () {
				this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
				this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
				};
				*/
				(function() { // DON'T EDIT BELOW THIS LINE
				var d = document, s = d.createElement('script');

				s.src = '//zeeto.disqus.com/embed.js';

				s.setAttribute('data-timestamp', +new Date());
				(d.head || d.body).appendChild(s);
				})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
			</div>
		</div>

		<div class="col-sm-4" style="background-color:">
			<h4>Daftar Putar</h4>
			<table class="table col-sm-12 table-bordered table-stripped">
			<?php while ($row=mysql_fetch_array($dafmateri)) { ?>
			<tr>
				<td>
<!-- ============================================================DAFTAR PUTAR-->
				<i class="glyphicon glyphicon-book"></i> 
				<?php echo "<a href='kursus.php?id=".$row['materi_id']."&nomor=".$nomor."'>".$row['judul_materi']."</a>";
				$ceknonton2=mysql_query("SELECT * FROM log_bab WHERE akun_id='".$_SESSION['userid']."' AND materi_id='".$row['materi_id']."'");
				if (mysql_num_rows($ceknonton2)==0) {
					echo "<span class='badge pull-right' title='Belum Dibaca'><i class='glyphicon'></i></span>";
				}else{
					echo "<span class='badge pull-right' title='Sudah Dibaca'><i class='glyphicon glyphicon-ok'></i></span>";
				}
				?>
				</td>
			</tr>
			<?php } ?>
			</table>
			<!--
			<?php while ($row=mysql_fetch_array($dafputar)) { ?>
			<tr>
				<td>
				<i class="glyphicon glyphicon-step-forward"></i> 
				<?php echo "<a href='kursus.php?id=".$id."&nomor=".$row['nomor']."'>".$row['judul_sub']."</a>";
				
				$ceknonton2=mysql_query("SELECT * FROM log_bab WHERE akun_id='".$_SESSION['userid']."' AND materi_id='$id'");
				if (mysql_num_rows($ceknonton2)==0) {
					echo "<span class='badge pull-right' title='Belum Dibaca'><i class='glyphicon glyphicon-eye-close'></i></span>";
				}else{
					echo "<span class='badge pull-right' title='Sudah Dibaca'><i class='glyphicon glyphicon-eye-open'></i></span>";
				}
				?>
				</td>
			</tr>
			<?php } ?>
			</table>
		    -->
		</div>
    </div>
    <br><br><br><br><br>
    </div>
    <?php include 'layout/footer.php';?>
  </body>
</html>
