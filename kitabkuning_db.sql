-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2016 at 06:45 PM
-- Server version: 5.5.52-cll
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kitabkuning_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `akun_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(18) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `keterangan` text,
  `sertifikat` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`akun_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`akun_id`, `username`, `password`, `email`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `status`, `keterangan`, `sertifikat`) VALUES
(1, 'karen', 'karendk_upil', 'karen@makus.com', 'Karen Dharmakusuma', 'Laki-Laki', '2015-12-22', 'Cilacap', '0', 'Bismillahirrohmanirrohim', 1),
(2, 'admin', 'k@t@r@k_0gel', 'admin@admin.com', 'Prof. M. Zakir Naik', 'Laki-Laki', '1996-03-04', 'Bumi', '0', 'Keindahan hanya milik Allah..', 0),
(3, 'sulaiman', 'sulaiman_upil', 'sulaiman@mustofa.com', 'Sulaiman Musthofa Saliim', 'Laki-Laki', '1996-02-13', 'Kota Gede Yogyakarta', '1', 'Hakikat cinta adalah melepaskan', 0),
(5, 'husnun', 'husnun_upil', 'husnun@koh.com', 'Husnun Karimah', NULL, NULL, NULL, '1', NULL, 0),
(6, 'ika', 'ika_upil', 'ika@ika.com', 'Ika Ika', NULL, NULL, NULL, '1', NULL, 0),
(7, 'adrian', 'adrian_upil', 'adrian@gmail', 'Sandrian Rahmawati', 'Laki-Laki', '2015-02-19', 'Klaten', '1', 'sayang kamu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_bab`
--

CREATE TABLE IF NOT EXISTS `log_bab` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `akun_id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `materi_id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_materi` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `akun_id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`materi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`materi_id`, `judul_materi`, `keterangan`, `akun_id`, `tanggal`) VALUES
(1, 'BAB I - Kata dan Kalimat', 'Sebagai dasar untuk bisa membedakan kata dan kalimat dalam Bahasa Arab.', 3, '2015-11-23 17:06:29'),
(2, 'BAB II - Pembagian Isim', 'Dasar untuk Mengetahui isim dari segi jenis dan jumlahnya serta penyesuaian isim.', 3, '2015-11-23 17:06:29'),
(3, 'BAB III - Jama'' Taksir', 'Sebagai dasar untuk mengetahui salah satu pembagian isim dari segi jumlahnya.', 3, '2015-11-23 17:06:29'),
(4, 'BAB IV - Na''at, Ma''rifat, dan Nakiroh', 'Mengetahui na''at, ma''rifat'', dan nakiroh serta Membandingkan jumlah ismiyyah dan na''at man''ut.', 3, '2015-11-23 17:06:29'),
(5, 'BAB V - Jumlah Ismiyyah diberi Na''at', 'Sebagai dasar untuk mengetahui contoh-contoh na''at yang diletakkan pada jumlah ismiyyah.', 3, '2015-11-23 17:06:29'),
(6, 'BAB VI - I''rabnya Isim: Rafa'' dan Nashab', 'Sebagai dasar untuk dapat mengetahui  i''rob rofa'' dan nashob yang terdapat di dalam isim .', 3, '2015-11-23 17:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_bab`
--

CREATE TABLE IF NOT EXISTS `sub_bab` (
  `id_sb` int(11) NOT NULL AUTO_INCREMENT,
  `materi_id` int(11) NOT NULL,
  `judul_sub` varchar(225) DEFAULT NULL,
  `keterangan_sub` text CHARACTER SET ucs2 COLLATE ucs2_persian_ci NOT NULL,
  `link_video` varchar(225) NOT NULL,
  `nomor` int(11) NOT NULL,
  PRIMARY KEY (`id_sb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sub_bab`
--

INSERT INTO `sub_bab` (`id_sb`, `materi_id`, `judul_sub`, `keterangan_sub`, `link_video`, `nomor`) VALUES
(1, 1, NULL, '<p>\r\nKAIDAH:<br>\r\n	<ol>\r\n	<li>Kata dalam bahasa Arab ada tiga yaitu:</li>\r\n		<ol type="a">\r\n			<li>Isim. Contoh: كِتَابٌ  (buku)</li>\r\n	    	<li>Fi’il. Contoh:  كَتَبَ   –   يَكْتُبُ   (menulis)</li>\r\n			<li>Huruf. Contoh:  من – في – عن – على – الى - ب.</li>\r\n		</ol>\r\n		<br>\r\n	Di antara tanda-tanda  isim  yaitu tanwin  di akhir kata,  atau kata sandang alif  dan lam  (  ال) yang ditambahkan di awal kata.\r\n	Di dalam bahasa Indonesia,  isim  biasa diterjemahkan dengan “kata benda”.  Sedang  fi’il  adalah “kata kerja”. Sementara huruf adalah kata tegas yang berfungsi sebagai kata penguhubung.\r\n	Catatan:\r\n	Cara membaca kata sandang alif dan lam (  ( ال jika masuk pada isim ada dua, yaitu:\r\n	<ol type="a">\r\n		<li>Lam yang disukun tetap dibaca sebagaimana adanya, yaitu jika huruf sesudah lam             berupa:  ا , ب ، ج ، ح ، خ ، ع ، غ ، ف ، ق ، ك ، م ، و ، ه ، ي . Alif dan lam ini disebut ال قمرية  (al-qamariyyah). Contoh: الحمد</li>\r\n		<li>Lam tidak dibaca lam akan tetapi bacaannya dilebur seperti huruf sesudahnya, yaitu jika huruf sesudah lam berupa: ت , ث , د , ذ , ر , ز , س , ش , ص , ض , ط , ظ , ل , ن  . Alif dan lam ini disebut  ال شمسية  (al- syamsiyyah). Contoh: الرحيم</li>\r\n	</ol>\r\n	Semua isim yang diberi kata sandang alif dan lam (ال) tidak boleh ditanwin.\r\n	<br><br>\r\n	<li>Di dalam bahasa Arab kalimat (jumlah) ada dua, yaitu:</li>\r\n		<ol type="a">\r\n			<li>Jumlah Ismiyyah. Contoh: الله اكبر (Allah itu maha besar)</li>\r\n			<li>Jumlah fi’liyyah. Contoh:   قرا محمد القران(Muhammad membaca al-Qur’an)</li>\r\n		</ol>\r\n	Untuk mengetahui apakah  jumlah  itu  jumlah ismiyyah  atau  jumlah fi’liyyah  antara lain dengan melihat kata yang pertama pada kalimat itu.  Jika kata pertama pada kalimat itu berupa  isim maka kalimat itu disebut jumlah ismiyyah,  dan jika kata pertama dalam kalimat itu berupa  fi’il maka kalimat itu disebut jumlah fi’liyyah.\r\n	</ol>\r\n</p>', 'http://localhost/kbp-kitabkuning/media/BAB1.mp4', 1),
(2, 2, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesett', 'http://localhost/kbp-kitabkuning/media/BAB2.mp4', 1),
(3, 3, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesett', 'http://localhost/kbp-kitabkuning/media/BAB3.mp4', 1),
(4, 4, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesett', 'http://localhost/kbp-kitabkuning/media/BAB4.mp4', 1),
(5, 5, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesett', 'http://localhost/kbp-kitabkuning/media/BAB5.mp4', 1),
(6, 6, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesett', 'http://localhost/kbp-kitabkuning/media/BAB6.mp4', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
