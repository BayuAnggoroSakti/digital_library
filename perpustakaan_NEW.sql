-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 05:05 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `digilib_admin`
--

CREATE TABLE IF NOT EXISTS `digilib_admin` (
`id_admin` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `telphp` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `digilib_admin`
--

INSERT INTO `digilib_admin` (`id_admin`, `username`, `password`, `nama`, `jabatan`, `telphp`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Bayu anggoro saktii', 'admin', '085712645956', '0');

-- --------------------------------------------------------

--
-- Table structure for table `digilib_ebook`
--

CREATE TABLE IF NOT EXISTS `digilib_ebook` (
`id_ebook` bigint(20) NOT NULL,
  `id_ebookjenis` bigint(20) NOT NULL,
  `id_ebookkategori` bigint(20) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `abstraksi` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `lisensi` varchar(200) NOT NULL,
  `copyright` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL,
  `id_admin` bigint(20) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `digilib_ebook`
--

INSERT INTO `digilib_ebook` (`id_ebook`, `id_ebookjenis`, `id_ebookkategori`, `judul`, `penulis`, `penerbit`, `tahun`, `abstraksi`, `file`, `lisensi`, `copyright`, `datetime`, `id_admin`, `status`) VALUES
(28, 9, 3, 'ILMU PENGETAHUAN ALAM', 'Lutvi Havifazrin', 'Unnes', '2001', '<p>Dalam dunia industri alat ukur selalu dibutuhkan untuk menjalankan segala aktifitas pekerjaan, salah satunya alat ukur berat. Dengan adanya alat ukur berat ini maka berat beban dari bahan atau material yang nantinya diproses bisa diketahui beratnya. Namun selama ini alat ukur berat yang telah ada dan digunakan harganya relatif mahal. Sehingga dalam penelitian ini dibuat rancang bangun alat ukur berat menggunakan load cell kapasitas 300 kg, yang mempunyai nilai ekonomis lebih rendah.</p>\r\n\r\n<p>Untuk pemakaian alat ini harus dipasang pada crane, yang prinsip kerjanya memanfaatkan gaya-gaya yang bekerja pada wire rope akibat dibebani muatan, sehingga terjadi ketegangan pada wire rope tersebut. Hal ini mengakibatkan terjadi tarikan pada load cell melalui pulley aktif. Dan dari gaya tarik inilah akan diolah oleh load cell menjadi suatu sinyal elektrik, yang nantinya akan diteruskan lagi ke display untuk dibaca sebagai suatu besaran berat.</p>\r\n\r\n<p>Dari hasil pengujian didapatkan data bahwa kemampuan maksimum akibat modifkasi load cell mencapai 670 kg melebihi kapasitas sebelumnya yakni 300 kg. Kemudian display yang digunakan memiliki keterbatasan pada pembacaan. Beban yang bisa dibaca hanya memiliki range sebesar 10 kg, sehingga pada beban yang tidak berkelipatan 10 kg hasilnya akan dibulatkan. Dan pengukuran besar perubahan defleksi &nbsp;yang terjadi pada load cell tidak bisa terlihat karena bersifat mikron.</p>\r\n\r\n<p>Kata kunci &nbsp; &nbsp;: &nbsp; &nbsp;range, beban, sudut, load cell, wire rope</p>\r\n', 'ILMU PENGETAHUAN ALAM.pdf', 'free', 'reserved', '2015-12-06 03:49:56', 1, '0'),
(27, 0, 0, 'BELAJAR PHP DASAR', 'Bayu Anggoro Saktii', 'Wilujeng', '2010', '<p>Technological developments in industrial process control systems today is toward the application of electro-pneumatic technology, ie pneumatic component control via electrical signals. Pressure control trainer 38-714 is a teaching module on the electro-pneumatic technology which the pressure. Changes in load variations and disturbances in the electro-pneumatic technology can effect the system response does not match the expected criteria.</p>\r\n\r\n<p>Effect of disturbance in process systems can be reduced with a cascade controller. The cascade method is used to increase system response speed. With the fuzzy approach, the controller problem can be solved easily without complicated mathematical calculations.</p>\r\n\r\n<p>Cascade fuzzy controller is consist of two fuzzy controllers in a cascade. On the primary side of a fuzzy controller of pressure, the secondary side of a fuzzy controller of flow. Based on the results of implementation, the cascade fuzzy controllers were able to reduce the maximum overshoot, the steady state and steady state error. If the cascade fuzzy controller compared with a single fuzzy controller.</p>\r\n', 'BELAJAR PHP DASAR.pdf', 'free', 'reserved', '2015-12-06 03:50:40', 1, '0'),
(26, 1, 5, 'BAHASA INDONESIA KELAS XII', 'Burhanuddin Hakim', 'Bintang Pura', '2001', '<p>Penelitian Deskriptif Mengenai Psikologi Sosial Masyarakat Kudus Terhadap Fatwa Rokok MUI.&nbsp;Penelitian tentang &ldquo;Dampak Fatwa Rokok Bagi Psikologi Sosial Masyarakat Kudus&rdquo; bertujuan untuk memberi manfaat psikologi sosial masyarakat Kudus dalam permasalahan fatwa rokok.</p>\r\n\r\n<p>Penelitian ini dilakukan dengan cara pembagian angket kepada masyarakat yang mempunyai rutinitas merokok serta studi pustaka. Sejumlah 54 angket yang kembali diperoleh hasil bahwa alasan merokok terbanyak adalah merokok untuk menghilangkan lelah yang ditunjukkan dengan presentase 33,33%.</p>\r\n\r\n<p>Sedangkan responden yang merokok mengetahui bahwa rokok tersebut berbahaya bagi kesehatan tubuh adalah sebanyak 88,89%. Namun, dalam kenyataannya mereka tetap merokok untuk alasan-alasan yang tercantum pada tabel 1, ini terbukti bahwa perokok menerapkan teori pertentangan sebagai salah satu upaya untuk melakukan aktifitas merokok.</p>\r\n\r\n<p>Tetapi, tidak selamanya teori pertentangan berlaku pada 54 orang responden. Hal itu terbukti dengan adanya kesadaran untuk berhenti merokok yang terdapat dalam tabel 2 sebanyak 66,67%.</p>\r\n\r\n<p>Berdasarkan kenyataan yang diperoleh dari hasil tersebut, maka psikologi sosial bermanfaat dalam permasalahan fatwa rokok, berupa adanya kesadaran masyarakat untuk berhenti merokok. Sedangkan dampak fatwa rokok pada psikologi sosial masyarakat Kudus, berupa adanya penolakan terhadap fatwa rokok MUI. Kemudian bentuk dari psikologi sosial rokok dalam masyarakat adalah adanya teori pertentangan yang secara langsung dilakukan masyarakat sebagai upaya untuk melakukan aktivitas merokok.</p>\r\n', 'BAHASA INDONESIA KELAS XII.pdf', 'free', 'reserved', '2015-12-06 03:53:03', 1, '0'),
(25, 2, 2, 'MATEMATIKA KELAS XII IPA', 'Hesti Kukuh Windarko', 'Cahaya Pura', '2000', '<p>Perkembangan teknologi sistem pengaturan proses di industri dewasa ini menuju penerapan teknologi elektro-pneumatik, yaitu pengaturan komponen pneumatik melalui sinyal listrik. Pressure control trainer 38-714 adalah modul ajar teknologi elektro-pneumatik yang membahas pengaturan tekanan. Perubahan variasi beban dan gangguan pada teknologi elektro-pneumatik dapat menyebabkan respon sistem tidak sesuai dengan kriteria yang diharapkan.</p>\r\n\r\n<p>Pengaruh gangguan yang terdapat pada sistem proses dapat direduksi dengan kontroler kaskade. Selain itu, metode kaskade digunakan untuk meningkatkan kecepatan respon sistem. Dengan pendekatan fuzzy, masalah kontroler dapat diselesaikan dengan mudah tanpa perhitungan matematis yang rumit.</p>\r\n\r\n<p>Kontroler kaskade fuzzy adalah dua kontroler fuzzy yang disusun secara kaskade. Pada sisi primer berupa kontroler fuzzy untuk pengaturan tekanan, sedangkan pada sisi sekunder berupa kontroler fuzzy untuk pengaturan aliran.</p>\r\n\r\n<p>Berdasarkan hasil implementasi, kontroler kaskade fuzzy dalam penelitian ini mampu mengurangi nilai maksimum overshoot, waktu steady state dan error steady state. Jika kontroler kaskade fuzzy dibandingkan dengan kontroler fuzzy tunggal.</p>\r\n', 'MATEMATIKA KELAS XII IPA.pdf', 'free', 'manulife', '2015-12-06 03:42:01', 1, '0'),
(22, 0, 0, 'Bersemi di bulan purnama', 'Bayu Dinginn', 'Monalisa', '1995', '<p>Ini abstraksi Lohh</p>\r\n', 'Bersemi di bulan purnama.pdf', 'free', 'baryu', '2015-12-05 03:25:43', 1, '1'),
(24, 1, 2, 'BELAJAR BAHASA INGGRIS', 'Drs Sutowo', 'Bintang Kencana', '1995', '<p>&nbsp; &nbsp; &nbsp; Penelitian ini merupakan penelitian korelasi, menggunakan &nbsp;metode survei dengan teknik tes dan pengukuran Populasi dalam penelitian ini adalah siswa putra SMA Negeri I Baturetno berjumlah 20 Orang. Sedangkan instrument yang digunakan untuk akselerasi adalah tes 20 meter ssatuannya detik, tes kelincahan diukur dengan shuttle run selama 60 detik satuannya frekuensi, daya tahan diukur dengan tes lari 2400 meter satuannya menit. Keterampilan bermain bulutangkis diukur dengan sistem setengah kompetisi satuannya angka. Data dianalisis dengan rumus korelasi product moment. Sebelumnya data dianalisis perlu diadakan pengujian persyaratan analisis data yaitu uji normalitas, uji linieritas dan uji hipotesis. Uji normalitas data menggunakan chi kuadrat (X2), menggunakan program SPS adisi Sutrissno Hadi. Untuk menguji linieritas data, digunakan teknik analisis variansi terhadap gari regresi dan uji hipotesis menggunakan analisis regresi. Setelah uji normalitas menghasilkan normal dan uji linieritas menghasilkan data yang linier.&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;Maka hasil penelitian yang diperoleh adalah hubungan antara akselerasi dengan keterampilan bulutangkis dengan r = -0.515 dan p = 0.019 berarti signifikan. Ada hubungan antara kelincahan dengan keterampilan bermain bulutangkis dengan r = 0.883 dan p = 0.000 berarti signifikan. Ada hubungan antara daya tahan dengan keterampilan &nbsp;bermain bulutangkis dengan r = -0.628 dan p = 0.003 berarti signifikan. SSelenjutnya hasil analisis regresi ganda dengan tiga prediktor menunjukkan korelasi yang signifikan dengan R = 0.897 antara akelerasi, kelincahan dan daya tahan dengan keterampilan bermain bulutangkis. Besarnya koefisien determinan R2(kuadrat) = 0.805 sumbangan efektif (SE) yang diberikan ketiga variabel ssecara kesesluruhan sebessar 80.470%.</p>\r\n', 'BELAJAR BAHASA INGGRIS.pdf', 'free', 'zen-site.com', '2015-12-06 03:54:12', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `digilib_ebookjenis`
--

CREATE TABLE IF NOT EXISTS `digilib_ebookjenis` (
`id_ebookjenis` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `digilib_ebookjenis`
--

INSERT INTO `digilib_ebookjenis` (`id_ebookjenis`, `nama`, `deskripsi`, `status`) VALUES
(1, 'LITERATUR', '																								Jawa dan Sunda																																																																																																									', '0'),
(2, 'MATEMATIKA', 'apik poll									', '0'),
(3, 's', ' ', '1'),
(4, 'dd', ' ', '1'),
(5, 'BISMILLAH', 'meskipun																', '1'),
(6, 'LAGI', '		lagi																				', '1'),
(7, 'HALO', 'sing apik to																													', '1'),
(8, 'COBA ', '			coba																			', '1'),
(9, 'PUSTAKA', 'Muhajab																			', '0');

-- --------------------------------------------------------

--
-- Table structure for table `digilib_ebookkategori`
--

CREATE TABLE IF NOT EXISTS `digilib_ebookkategori` (
`id_ebookkategori` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `digilib_ebookkategori`
--

INSERT INTO `digilib_ebookkategori` (`id_ebookkategori`, `nama`, `deskripsi`, `status`) VALUES
(1, 'bayu anggoro sakti', '', '1'),
(2, 'MATEMATIKA', '																								Ilmu pengetahuan Alam																																																						', '0'),
(3, 'IPA', ' CINTAKU\r\n																						', '0'),
(4, 'ipaa', ' \r\n												 \r\n												$HALO																				', '1'),
(5, 'BAHASA', '												FEWFWEFWEF																														', '0'),
(6, 'Tutorial', 'BAHASA INDONESIA																						', '1'),
(7, 'bahasaa', '																								FEWFWEFWEF																																								', '1'),
(8, 'Matematikaa', '																								 WEFWFWE																				', '1'),
(9, 'AGAMA', 'Bismillah								', '0'),
(10, 'BARU', 'baru																						', '1');

-- --------------------------------------------------------

--
-- Table structure for table `digilib_statistikdownload`
--

CREATE TABLE IF NOT EXISTS `digilib_statistikdownload` (
`id_statistikdownload` bigint(20) NOT NULL,
  `datetime` datetime NOT NULL,
  `id_userlogin` bigint(20) NOT NULL,
  `id_ebook` bigint(20) NOT NULL,
  `ipakses` varchar(20) NOT NULL,
  `useragent` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `digilib_statistikdownload`
--

INSERT INTO `digilib_statistikdownload` (`id_statistikdownload`, `datetime`, `id_userlogin`, `id_ebook`, `ipakses`, `useragent`) VALUES
(2, '2015-11-04 06:32:59', 2, 2, '192.168.9.1.', 'Android'),
(109, '2015-12-05 01:17:53', 2, 22, '::1', 'browser'),
(110, '2015-12-05 01:18:22', 2, 25, '::1', 'browser'),
(124, '2015-12-06 04:01:46', 2, 24, '::1', 'browser'),
(125, '2015-12-06 04:06:47', 2, 27, '::1', 'browser'),
(126, '2015-12-06 04:06:54', 2, 26, '::1', 'browser'),
(127, '2015-12-06 04:39:38', 2, 27, '::1', 'browser'),
(122, '2015-12-05 04:24:47', 0, 25, '::1', 'browser'),
(123, '2015-12-06 03:56:44', 2, 27, '::1', 'browser'),
(112, '2015-12-05 01:19:27', 2, 24, '::1', 'browser'),
(114, '2015-12-05 02:43:47', 2, 0, '::1', 'browser'),
(115, '2015-12-05 02:45:00', 2, 0, '::1', 'browser'),
(116, '2015-12-05 04:20:39', 3, 0, '::1', 'browser'),
(117, '2015-12-05 04:21:23', 3, 0, '::1', 'browser'),
(118, '2015-12-05 04:23:12', 3, 0, '::1', 'browser'),
(119, '2015-12-05 04:23:34', 3, 25, '::1', 'browser'),
(120, '2015-12-05 04:23:48', 3, 25, '::1', 'browser'),
(121, '2015-12-05 04:24:08', 3, 24, '::1', 'browser'),
(111, '2015-12-05 01:19:10', 2, 25, '::1', 'browser'),
(43, '2015-11-27 02:54:22', 1, 2, '11', 'browser'),
(44, '2015-11-27 02:59:46', 1, 2, '11', 'browser'),
(45, '2015-11-27 03:00:05', 1, 2, '11', 'browser'),
(46, '2015-11-27 03:00:38', 1, 2, '11', 'browser'),
(47, '2015-11-27 03:00:40', 1, 2, '11', 'browser'),
(48, '2015-11-27 03:01:37', 1, 2, '11', 'browser'),
(49, '2015-11-27 03:09:19', 1, 2, '11', 'browser'),
(50, '2015-11-27 03:10:36', 1, 2, '11', 'browser'),
(51, '2015-11-27 03:10:44', 1, 2, '11', 'browser'),
(52, '2015-11-27 03:15:01', 1, 2, '11', 'browser'),
(53, '2015-11-27 03:15:25', 1, 2, '11', 'browser'),
(54, '2015-11-27 03:15:40', 1, 2, '11', 'browser'),
(55, '2015-11-27 03:17:18', 1, 2, '11', 'browser'),
(56, '2015-11-27 03:17:46', 1, 2, '11', 'browser'),
(57, '2015-11-27 03:18:08', 1, 2, '11', 'browser'),
(58, '2015-11-27 03:18:15', 1, 2, '11', 'browser'),
(59, '2015-11-27 03:18:51', 1, 2, '11', 'browser'),
(60, '2015-11-27 03:21:52', 3, 2, '11', 'browser'),
(61, '2015-11-27 03:23:03', 3, 21, '::1', 'browser'),
(62, '2015-11-27 03:28:11', 3, 18, '::1', 'browser'),
(63, '2015-11-27 03:38:07', 3, 18, '::1', 'browser'),
(64, '2015-11-27 03:39:57', 3, 18, '::1', 'browser'),
(65, '2015-11-27 03:42:56', 16, 19, '::1', 'browser'),
(66, '2015-11-27 03:58:56', 16, 22, '::1', 'browser'),
(67, '2015-11-27 03:59:34', 16, 22, '::1', 'browser'),
(68, '2015-11-27 04:00:13', 16, 0, '::1', 'browser'),
(69, '2015-11-27 04:04:41', 16, 0, '::1', 'browser'),
(108, '2015-12-05 01:07:23', 3, 25, '::1', 'browser'),
(107, '2015-12-05 01:07:00', 3, 25, '::1', 'browser'),
(70, '2015-11-29 09:48:42', 3, 0, '::1', 'browser'),
(71, '2015-11-29 09:51:22', 3, 0, '::1', 'browser'),
(72, '2015-11-29 09:51:38', 3, 0, '::1', 'browser'),
(73, '2015-11-29 09:54:34', 3, 0, '::1', 'browser'),
(74, '2015-11-29 09:56:02', 3, 0, '::1', 'browser'),
(75, '2015-11-29 09:57:30', 3, 0, '::1', 'browser'),
(76, '2015-11-29 10:06:14', 3, 22, '::1', 'browser'),
(77, '2015-11-29 10:06:32', 3, 22, '::1', 'browser'),
(78, '2015-11-29 10:07:40', 3, 22, '::1', 'browser'),
(79, '2015-11-29 10:09:11', 3, 0, '::1', 'browser'),
(80, '2015-11-29 10:09:12', 3, 0, '::1', 'browser'),
(81, '2015-11-29 10:10:52', 3, 0, '::1', 'browser'),
(82, '2015-11-29 10:14:21', 3, 23, '::1', 'browser'),
(83, '2015-11-29 10:35:56', 3, 23, '::1', 'browser'),
(84, '2015-11-29 10:35:58', 3, 22, '::1', 'browser'),
(85, '2015-11-29 10:35:58', 3, 23, '::1', 'browser'),
(86, '2015-11-29 10:36:44', 3, 22, '::1', 'browser'),
(87, '2015-11-30 01:55:33', 3, 22, '::1', 'browser'),
(88, '2015-12-04 07:36:00', 3, 26, '::1', 'browser'),
(89, '2015-12-04 07:38:50', 3, 27, '::1', 'browser'),
(90, '2015-12-04 09:14:25', 2, 0, '::1', 'browser'),
(91, '2015-12-04 09:15:47', 2, 27, '::1', 'browser'),
(92, '2015-12-04 09:58:06', 0, 27, '::1', 'browser'),
(93, '2015-12-04 09:58:27', 0, 27, '::1', 'browser'),
(94, '2015-12-04 09:58:29', 0, 25, '::1', 'browser'),
(95, '2015-12-04 09:58:30', 0, 25, '::1', 'browser'),
(96, '2015-12-04 09:58:52', 0, 25, '::1', 'browser'),
(97, '2015-12-04 09:58:53', 0, 25, '::1', 'browser'),
(98, '2015-12-04 09:58:55', 0, 25, '::1', 'browser'),
(99, '2015-12-04 09:59:34', 0, 27, '::1', 'browser'),
(100, '2015-12-04 10:00:02', 0, 27, '::1', 'browser'),
(101, '2015-12-04 10:00:04', 0, 27, '::1', 'browser'),
(102, '2015-12-04 10:00:15', 3, 27, '::1', 'browser'),
(103, '2015-12-04 10:00:32', 3, 27, '::1', 'browser'),
(104, '2015-12-04 10:01:47', 3, 27, '::1', 'browser'),
(105, '2015-12-04 10:02:20', 3, 27, '::1', 'browser'),
(113, '2015-12-05 02:40:10', 2, 0, '::1', 'browser');

-- --------------------------------------------------------

--
-- Table structure for table `digilib_statistiklogin`
--

CREATE TABLE IF NOT EXISTS `digilib_statistiklogin` (
`id_statistiklogin` bigint(20) NOT NULL,
  `datetime` datetime NOT NULL,
  `id_userlogin` bigint(20) NOT NULL,
  `ipakses` varchar(20) NOT NULL,
  `useragent` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `digilib_statistiklogin`
--

INSERT INTO `digilib_statistiklogin` (`id_statistiklogin`, `datetime`, `id_userlogin`, `ipakses`, `useragent`) VALUES
(2, '2015-11-04 04:16:23', 2, '192.168.1.1', 'Android'),
(52, '2015-12-05 03:18:40', 3, '::1', 'browser'),
(5, '2015-11-23 07:57:53', 3, '192.11.1.1', 'browser'),
(6, '2015-11-23 07:59:41', 3, '::1', 'browser'),
(7, '2015-11-23 08:01:39', 3, '::1', 'browser'),
(8, '2015-11-23 08:15:06', 3, '::1', 'browser'),
(9, '2015-11-23 08:26:17', 3, '::1', 'browser'),
(10, '2015-11-23 08:28:15', 2, '::1', 'browser'),
(11, '2015-11-23 08:59:39', 3, '::1', 'browser'),
(12, '2015-11-23 09:06:49', 2, '::1', 'browser'),
(13, '2015-11-23 09:10:51', 3, '::1', 'browser'),
(14, '2015-11-23 09:11:31', 3, '::1', 'browser'),
(15, '2015-11-23 09:13:42', 3, '::1', 'browser'),
(16, '2015-11-23 09:16:24', 3, '::1', 'browser'),
(17, '2015-11-23 09:17:56', 2, '::1', 'browser'),
(18, '2015-11-23 09:34:21', 2, '::1', 'browser'),
(19, '2015-11-23 09:49:39', 3, '::1', 'browser'),
(20, '2015-11-24 08:19:04', 2, '::1', 'browser'),
(21, '2015-11-24 08:25:25', 2, '::1', 'browser'),
(22, '2015-11-24 03:55:17', 2, '::1', 'browser'),
(23, '2015-11-24 05:45:18', 14, '::1', 'browser'),
(24, '2015-11-24 06:00:04', 15, '::1', 'browser'),
(25, '2015-11-25 01:36:44', 2, '::1', 'browser'),
(26, '2015-11-25 02:22:36', 2, '::1', 'browser'),
(27, '2015-11-25 02:22:49', 2, '::1', 'browser'),
(28, '2015-11-26 02:39:46', 3, '::1', 'browser'),
(29, '2015-11-26 02:15:45', 3, '::1', 'browser'),
(30, '2015-11-27 06:38:41', 3, '::1', 'browser'),
(31, '2015-11-27 01:36:49', 3, '::1', 'browser'),
(32, '2015-11-27 02:25:23', 3, '::1', 'browser'),
(33, '2015-11-27 02:35:50', 3, '::1', 'browser'),
(34, '2015-11-27 03:39:46', 3, '::1', 'browser'),
(35, '2015-11-27 03:42:49', 16, '::1', 'browser'),
(36, '2015-11-29 09:48:25', 3, '::1', 'browser'),
(37, '2015-11-30 01:42:52', 3, '::1', 'browser'),
(38, '2015-11-30 01:50:00', 3, '::1', 'browser'),
(39, '2015-11-30 01:57:38', 3, '::1', 'browser'),
(40, '2015-11-30 02:03:36', 3, '::1', 'browser'),
(41, '2015-12-04 07:35:55', 3, '::1', 'browser'),
(42, '2015-12-04 09:11:44', 2, '::1', 'browser'),
(43, '2015-12-04 09:20:50', 2, '::1', 'browser'),
(44, '2015-12-04 09:34:08', 2, '::1', 'browser'),
(45, '2015-12-04 09:46:58', 3, '::1', 'browser'),
(50, '2015-12-05 02:32:59', 2, '::1', 'browser'),
(51, '2015-12-05 02:37:14', 2, '::1', 'browser'),
(48, '2015-12-05 01:10:12', 2, '::1', 'browser'),
(49, '2015-12-05 01:11:54', 2, '::1', 'browser'),
(53, '2015-12-05 03:21:28', 3, '::1', 'browser'),
(54, '2015-12-05 04:11:37', 2, '::1', 'browser'),
(55, '2015-12-05 04:12:22', 2, '::1', 'browser'),
(56, '2015-12-05 04:14:27', 3, '::1', 'browser'),
(57, '2015-12-06 03:56:18', 2, '::1', 'browser'),
(58, '2015-12-06 04:21:58', 2, '::1', 'browser'),
(59, '2015-12-06 04:23:12', 2, '::1', 'browser'),
(60, '2015-12-06 05:01:59', 2, '::1', 'browser');

-- --------------------------------------------------------

--
-- Table structure for table `digilib_userlogin`
--

CREATE TABLE IF NOT EXISTS `digilib_userlogin` (
`id_userlogin` bigint(20) NOT NULL,
  `member_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `digilib_userlogin`
--

INSERT INTO `digilib_userlogin` (`id_userlogin`, `member_id`, `password`, `datetime`, `status`) VALUES
(2, '2', 'a430e06de5ce438d499c2e4063d60fd6', '2015-11-11 00:00:00', '0'),
(3, '3', '7e96f0a92e84e79e04c4da1c83b64755', '2015-11-11 00:00:00', '0'),
(17, '04100', '3a26ef684e193f2621934e4423b26567', '2015-12-05 04:34:47', '0'),
(16, '03160', 'a430e06de5ce438d499c2e4063d60fd6', '2015-11-27 03:42:41', '0'),
(15, '11', 'e691fe545314b7b56c5d82702f2be359', '2015-11-24 05:59:14', '0'),
(14, '15', 'd2f9dbffa7b9a979f9bc4d81e769497e', '2015-11-24 05:45:06', '0'),
(13, '6', 'd41d8cd98f00b204e9800998ecf8427e', '2015-11-24 05:38:03', '0'),
(12, '4', 'd41d8cd98f00b204e9800998ecf8427e', '2015-11-24 05:25:23', '0'),
(18, '4040', 'cd21cbf1821248c06b61630753401c08', '2015-12-05 04:54:30', '0'),
(19, '4444', 'd2f9dbffa7b9a979f9bc4d81e769497e', '2015-12-05 04:59:52', '0'),
(20, '3333', '6a17faad3b1275fd2558d5435c58440e', '2015-12-05 05:02:02', '0'),
(21, '2222', '19a02ca47d39bf836b9d8f6c7d387aba', '2015-12-05 05:05:02', '0'),
(22, '1111', '070550d8ed8790c0ef4848c86404e1b1', '2015-12-05 05:06:29', '0');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `member_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(1) NOT NULL,
  `birth_date` date NOT NULL,
  `member_type_id` int(6) DEFAULT NULL,
  `member_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inst_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_new` int(1) DEFAULT NULL,
  `member_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_since_date` date DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `expire_date` date NOT NULL,
  `member_notes` text COLLATE utf8_unicode_ci,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `gender`, `birth_date`, `member_type_id`, `member_address`, `member_email`, `postal_code`, `inst_name`, `is_new`, `member_image`, `pin`, `member_phone`, `member_fax`, `member_since_date`, `register_date`, `expire_date`, `member_notes`, `input_date`, `last_update`) VALUES
('2', 'bayu anggoro sakti', 1, '2015-12-11', NULL, 'Pati', 'bayu.anggoro.s@mail.ugm.ac.id', NULL, 'Universitas Gadjah Mada', NULL, NULL, NULL, '085712645956', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('3', 'Lutvi Havifazrin', 2, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('4', 'Hesti Kukuh Windarko', 1, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('5', 'cobalagi\r\n', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('6', 'matematika', 1, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('7', 'bayu sakti', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('15', 'pinto', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('14', 'sukita\r\n', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('11', 'bayu anggara', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('12', 'lagi', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('03160', 'bayu', 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('04100', 'dhanar wijaya', 1, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('4040', 'shinta', 2, '0000-00-00', NULL, 'Kalianyar, Solo, Jawa Tengah', NULL, NULL, NULL, NULL, NULL, NULL, '085712645956', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('4444', 'Pinto Anugrah', 0, '0000-00-00', NULL, 'Palembang', NULL, NULL, NULL, NULL, NULL, NULL, '089909098111', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('3333', 'danang pradana', 0, '0000-00-00', NULL, 'desa prambanan KM 01 PATI', NULL, NULL, NULL, NULL, NULL, NULL, '085712645956', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('2222', 'Desmon Venska', 0, '0000-00-00', NULL, 'Desa dengkek Pati', NULL, NULL, NULL, NULL, NULL, NULL, '085712645956', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL),
('1111', 'hesti kukuh', 0, '0000-00-00', NULL, 'Desa kayen kidul', NULL, NULL, NULL, NULL, NULL, NULL, '085712645956', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `digilib_admin`
--
ALTER TABLE `digilib_admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `digilib_ebook`
--
ALTER TABLE `digilib_ebook`
 ADD PRIMARY KEY (`id_ebook`);

--
-- Indexes for table `digilib_ebookjenis`
--
ALTER TABLE `digilib_ebookjenis`
 ADD PRIMARY KEY (`id_ebookjenis`);

--
-- Indexes for table `digilib_ebookkategori`
--
ALTER TABLE `digilib_ebookkategori`
 ADD PRIMARY KEY (`id_ebookkategori`);

--
-- Indexes for table `digilib_statistikdownload`
--
ALTER TABLE `digilib_statistikdownload`
 ADD PRIMARY KEY (`id_statistikdownload`);

--
-- Indexes for table `digilib_statistiklogin`
--
ALTER TABLE `digilib_statistiklogin`
 ADD PRIMARY KEY (`id_statistiklogin`);

--
-- Indexes for table `digilib_userlogin`
--
ALTER TABLE `digilib_userlogin`
 ADD PRIMARY KEY (`id_userlogin`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`member_id`), ADD KEY `member_name` (`member_name`), ADD KEY `member_type_id` (`member_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `digilib_admin`
--
ALTER TABLE `digilib_admin`
MODIFY `id_admin` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `digilib_ebook`
--
ALTER TABLE `digilib_ebook`
MODIFY `id_ebook` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `digilib_ebookjenis`
--
ALTER TABLE `digilib_ebookjenis`
MODIFY `id_ebookjenis` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `digilib_ebookkategori`
--
ALTER TABLE `digilib_ebookkategori`
MODIFY `id_ebookkategori` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `digilib_statistikdownload`
--
ALTER TABLE `digilib_statistikdownload`
MODIFY `id_statistikdownload` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `digilib_statistiklogin`
--
ALTER TABLE `digilib_statistiklogin`
MODIFY `id_statistiklogin` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `digilib_userlogin`
--
ALTER TABLE `digilib_userlogin`
MODIFY `id_userlogin` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
