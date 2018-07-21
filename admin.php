<?php  
session_start();
require_once('conf/config.php');
require_once('conf/data.php');

if ($_SESSION['login']==false) { // Cek Jika Belum Login
	header('Location:login.php');
}
if($_SESSION['status']=='1'){
	header('Location:user.php');
} 

$sql="SELECT * FROM akun WHERE akun_id='".$_SESSION['userid']."'";
$query=mysql_query($sql);
$profil=mysql_fetch_array($query);

if($profil['status']==1){
	header('Location:user.php');
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
	</style>
  </head>
  <body>
<?php include 'layout/navbar_utama.php';?>
<?php include 'layout/navbar_admin.php';?>

  <!-- Nav tabs -->
   <div style="color:white; background-color:black;">
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#akun" aria-controls="akun" role="tab" data-toggle="tab" >Tabel Akun</a></li>
	    <li role="presentation"><a href="#materi" aria-controls="materi" role="tab" data-toggle="tab">Tabel Materi</a></li>
	    <li role="presentation"><a href="#sertifikat" aria-controls="sertifikat" role="tab" data-toggle="tab">Daftar Lulusan</a></li>
	  </ul>
  </div>
  <br><br>
    <div class="container">
<!--============================TAB Panel===========================================================================================-->
<div>



  <!-- Tab panes -->
	<div class="tab-content">
	  <div role="tabpanel" class="tab-pane fade in active" id="akun">
	<!-- TABEL AKUN=========================================================================================== -->
	      <table width="100%" border="0" class="table table-hover table-bordered">
				<tr class="info" align="middle"   style="background-color:#e6e6e6; ">
					<td ><b>ID</b></td>
					<td><b>Nama Pengguna</b></td>
					<td><b>Password</b></td>
					<td><b>E-mail</b></td>
					<td><b>Nama Lengkap</b></td>
					<td><b>Jenis Kelamin</b></td>
					<td><b>Tanggal Lahir</b></td>
					<td><b>Alamat</b></td>
					<td colspan="2" align="center"><b>Aksi</b></td>
				</tr>
				<?php
				 $sql_akun="select * from akun";
				 $qry_akun=mysql_query($sql_akun);
				 
				 while($data=mysql_fetch_array($qry_akun)){
				?>
				<tr bgcolor="white">
					<td><?php echo $data['akun_id'];?></td>
					<td><?php echo $data['username'];?></td>
					<td><?php echo $data['password'];?></td>
					<td><?php echo $data['email'];?></td>
					<td><?php echo $data['nama_lengkap'];?></td>
					<td><?php if($data['jenis_kelamin']=='Laki-Laki'){echo "Laki-Laki";} else if($data['jenis_kelamin']=='Perempuan'){echo "Perempuan";}else {echo "-";}?></td>
					<td><?php echo $data['tanggal_lahir'];?></td>
					<td><?php echo $data['alamat'];?></td>
					<td align="center">
						<a class="glyphicon glyphicon-trash" title="hapus"></a>
						<!--<a href="hapus.php?ID=<?php echo $data['id_anggota'];?>" >Hapus</a> | <a href="ubahform.php?ID=<?php echo $data['id_anggota'];?>">Ubah</a>
						-->
					</td>
					<td align="center">
						<a class="glyphicon glyphicon-pencil" title="edit"></a>
						<!--<a href="hapus.php?ID=<?php echo $data['id_anggota'];?>" >Hapus</a> | <a href="ubahform.php?ID=<?php echo $data['id_anggota'];?>">Ubah</a>
						-->
					</td>
				</tr>
				<?php
				}
				?>
				<tr bgcolor="white">
					<td colspan="8"></td>
					<td  colspan="2" align="center"><a class="glyphicon glyphicon-plus" title="tambah"></a><!--<a href="tambah.php" >Tambah</a>--></td>
				</tr>
		  </table>
	<!-- TABEL AKUN=========================================================================================== -->
	  </div>
	  <div role="tabpanel" class="tab-pane fade" id="materi">
	<!-- TABEL MATERI=========================================================================================== -->
	      <table width="100%" border="0" class="table table-hover table-bordered">
				<tr class="info" align="middle" style="background-color:#e6e6e6; ">
					<td ><b>ID</b></td>
					<td><b>Judul Materi</b></td>
					<td><b>Keterangan</b></td>
					<td><b>Akun ID</b></td>
					<td><b>Tanggal</b></td>
					<td colspan="2" align="center"><b>Aksi</b></td>
				</tr>
				<?php
				 $sql_materi="select * from materi";
				 $qry_materi=mysql_query($sql_materi);
				 
				 while($data=mysql_fetch_array($qry_materi)){
				?>
				<tr bgcolor="white">
					<td><?php echo $data['materi_id'];?></td>
					<td><?php echo $data['judul_materi'];?></td>
					<td><?php echo $data['keterangan'];?></td>
					<td><?php echo $data['akun_id'];?></td>
					<td><?php echo $data['tanggal'];?></td>
					<td align="center">
						<a class="glyphicon glyphicon-trash" title="hapus"></a>
						<!--<a href="hapus.php?ID=<?php echo $data['id_anggota'];?>" >Hapus</a> | <a href="ubahform.php?ID=<?php echo $data['id_anggota'];?>">Ubah</a>
						-->
					</td>
					<td align="center">
						<a class="glyphicon glyphicon-pencil" title="edit"></a>
					</td>
				</tr>
				<?php
				}
				?>
				<tr bgcolor="white">
					<td colspan="4"></td>
					<td  colspan="2"  align="center"><a class="glyphicon glyphicon-plus" title="tambah"></a><!--<a href="tambah.php" >Tambah</a>--></td>
				</tr>
		  </table>
	<!-- TABEL MATERI=========================================================================================== -->
	  </div>
	   <div role="tabpanel" class="tab-pane fade" id="sertifikat">
	<!-- TABEL SERTIFIKAT=========================================================================================== -->
	      <table width="100%" border="0" class="table table-hover table-bordered">
				<tr class="info" align="middle" style="background-color:#e6e6e6; ">
					<td ><b>Akun ID</b></td>
					<td><b>Nama</b></td>
					<td><b>Nama Lengkap</b></td>
					<td colspan="2" align="center"><b>Aksi</b></td>
				</tr>
				<?php
				 $sql_sertifikat="select * from akun where sertifikat=1";
				 $qry_sertifikat=mysql_query($sql_sertifikat);
				 
				 while($data=mysql_fetch_array($qry_sertifikat)){
				?>
				<tr bgcolor="white">
					<td><?php echo $data['akun_id'];?></td>
					<td><?php echo $data['username'];?></td>
					<td><?php echo $data['nama_lengkap'];?></td>
					<td align="center">
						<a class="glyphicon glyphicon-trash" title="hapus"></a>
						<!--<a href="hapus.php?ID=<?php echo $data['id_anggota'];?>" >Hapus</a> | <a href="ubahform.php?ID=<?php echo $data['id_anggota'];?>">Ubah</a>
						-->
					</td>
					<td align="center">
						<a class="glyphicon glyphicon-pencil" title="edit"></a>
					</td>
				</tr>
				<?php
				}
				?>
				<tr bgcolor="white">
					<td colspan="3"></td>
					<td  colspan="2"  align="center"><a class="glyphicon glyphicon-plus" title="tambah"></a><!--<a href="tambah.php" >Tambah</a>--></td>
				</tr>
		  </table>
	<!-- TABEL SERTIFIKAT=========================================================================================== -->
	  </div>
	</div>
</div>
<!--============================TAB Panel===========================================================================================-->



<!-- ==================== Accordion Tab ====================
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne"  style="color:white; background-color:black;">
      <h4 class="panel-title" align="center">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <strong>TABEL AKUN</strong>
        </a>
      </h4>
    </div>      	 
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      		isi tabel akun
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo"  style="color:white; background-color:black;">
      <h4 class="panel-title" align="center">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <strong>TABEL MATERI</strong>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
      		isi tabel materi
      </div>
    </div>
  </div>
 </div>
-->





    </div>
    <br><br><br>
    <?php include 'layout/footer.php';?>
  </body>
</html>
