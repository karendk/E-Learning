<?php
session_start();
require_once('conf/config.php');
require_once('conf/data.php');

if ($_SESSION['login']==false) { // Cek Jika Belum Login
	header('Location:login.php');
}

$logquery=mysql_query("SELECT * FROM log_bab WHERE akun_id='".$_SESSION['userid']."' ORDER BY log_id ASC");

if (mysql_num_rows($logquery) != 6) { // Cek Jika Materi lengkap
	echo "<script>alert('Anda belum menyelesaikan semua materi');</script>";
	echo "<script>document.location='user.php';</script>";
	//header('Location:logkursus.php');
}

$sql="SELECT * FROM akun WHERE akun_id='".$_SESSION['userid']."'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);

//mengubah sertifikat menjadi 1
if($data['sertifikat']==0){
 $sertifikat=1;
 $sql_sertifikat="update akun set sertifikat=$sertifikat where akun_id='".$_SESSION['userid']."' ";
}

?>
<html>
<head>
	<title>Serfitikat</title>
    <link href="lib/css/sertifikat.css" rel="stylesheet">
    <link href="lib/css/style1.css" rel="stylesheet">
    <script src="lib/js/jquery.js" type="text/javascript" ></script>
    <script src="lib/js/bootstrap.js" type="text/javascript" ></script>
    <script src="lib/js/bootstrap.min.js" type="text/javascript" ></script>
</head>
<body onLoad="window.print()">
<!--<body>-->
<!--<POSISI GAMBAR DIBELAKANG>-->
	<img src="media/sertifikat.jpg" style="position:absolute">
<!--<POSISI TABEL DIDEPAN>-->
	<div style="position:relative">
		<table border="0px" class="sertifikat">
				<tr>
					<td style="vertical-align:bottom" class="ukuran-atas"><p class="tulisan-atas">SERTIFIKAT</p></td>
				</tr>
				<tr>
					<td style="vertical-align:top" class="ukuran-atas2"><p class="tulisan-atas2">E-KITAB KUNING: BELAJAR KITAB KUNING ONLINE</p></td>
				</tr>
				<tr>
					<td class="ukuran-nama"><p class="tulisan-nama"><strong><u><?= strtoupper($data['nama_lengkap']); ?></u></strong></p></td>
				</tr>
				<tr>
					<td style="vertical-align:top"><p class="tulisan-atas2">
						Alhamdullilahirobil'alamin, puji syukur kehadirat Allah SWT yang telah melimpahkan rahmat dan karunia-Nya.<br>
						Lembaran ini sebagai bukti otentik bahwa nama di atas telah memahami bahasa arab, sebagai dasar untuk menafsirkan kitab kuning.<br>
						Sertifikat ini diberikan karena telah menyelesaikan semua materi di E-Kitab Kuning.
						<table width="1366px" height="210px" border="0px">
							<tr>
								<td><img src="media/tanda-tangan.png" height="120px" width="200px" style="padding-left:270px; padding-top:10px; position:absolute"></td>
								<td></td>
							</tr>
							<tr>
								<td style="vertical-align:bottom; color:grey;"><p class="tulisan-atas2">Tanda Tangan Pengesah</p></td>
								<td style="vertical-align:bottom; color:grey;"><p class="tulisan-atas2">Tanda Tangan Pemilik</p></td>
							</tr>
						</table>
					</p></td>
				</tr>
		</table>
	</div>
</body>
</html>