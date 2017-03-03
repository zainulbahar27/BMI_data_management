/*
Navicat MySQL Data Transfer

Source Server         : Xampp
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : griyagaya

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2016-08-07 18:10:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admins`
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `username` varchar(50) collate latin1_general_ci NOT NULL,
  `password` varchar(50) collate latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  `no_telp` varchar(20) collate latin1_general_ci NOT NULL,
  `level` varchar(20) collate latin1_general_ci NOT NULL default 'user',
  `blokir` enum('Y','N') collate latin1_general_ci NOT NULL default 'N',
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'redaksi@bukulokomedia.com', '08238923848', 'admin', 'N');

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id_banner` int(5) NOT NULL auto_increment,
  `judul` varchar(100) collate latin1_general_ci NOT NULL,
  `url` varchar(100) collate latin1_general_ci NOT NULL,
  `gambar` varchar(100) collate latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY  (`id_banner`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of banner
-- ----------------------------

-- ----------------------------
-- Table structure for `download`
-- ----------------------------
DROP TABLE IF EXISTS `download`;
CREATE TABLE `download` (
  `id_download` int(5) NOT NULL auto_increment,
  `judul` varchar(100) collate latin1_general_ci NOT NULL,
  `nama_file` varchar(100) collate latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL,
  PRIMARY KEY  (`id_download`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of download
-- ----------------------------
INSERT INTO `download` VALUES ('10', 'Katalog 001', 'test.jpg', '2011-01-31', '3');

-- ----------------------------
-- Table structure for `halamanstatis`
-- ----------------------------
DROP TABLE IF EXISTS `halamanstatis`;
CREATE TABLE `halamanstatis` (
  `id_halaman` int(5) NOT NULL auto_increment,
  `judul` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_halaman`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of halamanstatis
-- ----------------------------
INSERT INTO `halamanstatis` VALUES ('2', 'Latar Belakang', '<p>Visi :</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Misi :</p>\r\n<p>&nbsp;</p>', '2010-05-31', '');
INSERT INTO `halamanstatis` VALUES ('3', 'Badan Hukum', '<p>Isikan badan hukum</p>', '2010-05-31', '');
INSERT INTO `halamanstatis` VALUES ('7', 'tolong kami', '', '2016-07-26', '');
INSERT INTO `halamanstatis` VALUES ('8', 'Material Group', 'fhrjrjrdsfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffbbbbbfsdfffffffffffffffffffffdsgsddddddddddddd\r\n', '2016-07-30', '');

-- ----------------------------
-- Table structure for `header`
-- ----------------------------
DROP TABLE IF EXISTS `header`;
CREATE TABLE `header` (
  `id_header` int(5) NOT NULL auto_increment,
  `judul` varchar(100) collate latin1_general_ci NOT NULL,
  `url` varchar(100) collate latin1_general_ci NOT NULL,
  `gambar` varchar(100) collate latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY  (`id_header`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of header
-- ----------------------------
INSERT INTO `header` VALUES ('21', 'Header1', '', '1.jpg', '2011-03-29');
INSERT INTO `header` VALUES ('22', 'Header2', '', '2.jpg', '2011-03-29');
INSERT INTO `header` VALUES ('23', 'Header3', '', '3.jpg', '2011-03-29');
INSERT INTO `header` VALUES ('24', 'Header4', '', '4.jpg', '2011-03-29');

-- ----------------------------
-- Table structure for `hubungi`
-- ----------------------------
DROP TABLE IF EXISTS `hubungi`;
CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL auto_increment,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  `subjek` varchar(100) collate latin1_general_ci NOT NULL,
  `pesan` text collate latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY  (`id_hubungi`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of hubungi
-- ----------------------------
INSERT INTO `hubungi` VALUES ('35', 'admin', 'lutfi97zakaria@gmail.com', 'hhhghgh', 'jhjkhkjh', '2016-07-31');

-- ----------------------------
-- Table structure for `kategori`
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL auto_increment,
  `kd_kategori` varchar(10) collate latin1_general_ci NOT NULL default '',
  `nama_kategori` varchar(100) collate latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_kategori`,`kd_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('24', 'CAI0', 'Cairan Ingredient ', 'cairan-ingredient-');
INSERT INTO `kategori` VALUES ('25', 'TEB0', 'Tepung /breadcrumb /Predust/Buttermix', 'tepung-breadcrumb-predustbuttermix');
INSERT INTO `kategori` VALUES ('26', 'TEO0', 'Telor Dan Olahannya', 'telor-dan-olahannya');
INSERT INTO `kategori` VALUES ('27', 'KIT0', 'Kimia Tambahan ', 'kimia-tambahan-');
INSERT INTO `kategori` VALUES ('28', 'TML', 'Tidak Menggunakan Listrik', 'tidak-menggunakan-listrik');
INSERT INTO `kategori` VALUES ('29', 'BOK0', 'Body Kaleng', 'body-kaleng');
INSERT INTO `kategori` VALUES ('30', 'TUK0', 'Tutup Kaleng ', 'tutup-kaleng-');
INSERT INTO `kategori` VALUES ('31', 'BOC0', 'Body Cup 8 0z', 'body-cup-8-0z');
INSERT INTO `kategori` VALUES ('32', 'TUC1', 'Tutup Cup 16 Oz', 'tutup-cup-16-oz');
INSERT INTO `kategori` VALUES ('14', 'MEM0', 'Mentega, Margarin Dan Minyak', 'mentega-margarin-dan-minyak');
INSERT INTO `kategori` VALUES ('15', 'SUT0', 'Susu Dan Turunannya', 'susu-dan-turunannya');
INSERT INTO `kategori` VALUES ('16', 'FRI0', 'Fresh Ingredient', 'fresh-ingredient');
INSERT INTO `kategori` VALUES ('33', 'INC0', 'Inner Carton', 'inner-carton');
INSERT INTO `kategori` VALUES ('34', 'MAC0', 'Master Carton Kraft', 'master-carton-kraft');
INSERT INTO `kategori` VALUES ('35', 'MAC1', 'Master Carton White kraft', 'master-carton-white-kraft');
INSERT INTO `kategori` VALUES ('36', 'PLV0', 'Plastik Vaccum', 'plastik-vaccum');
INSERT INTO `kategori` VALUES ('37', 'PLK0', 'Plastik kantong', 'plastik-kantong');
INSERT INTO `kategori` VALUES ('38', 'STK0', 'Sticker Kertas', 'sticker-kertas');
INSERT INTO `kategori` VALUES ('39', 'STV0', 'Sticker Vynil', 'sticker-vynil');
INSERT INTO `kategori` VALUES ('40', 'STL0', 'Sticker Lain', 'sticker-lain');
INSERT INTO `kategori` VALUES ('41', 'TRA0', 'Tray', 'tray');
INSERT INTO `kategori` VALUES ('42', 'KLK0', 'Klingrit Kawat', 'klingrit-kawat');
INSERT INTO `kategori` VALUES ('43', 'KAH0', 'Karet Hitam', 'karet-hitam');
INSERT INTO `kategori` VALUES ('44', 'ASP0', 'Asbes Pita', 'asbes-pita');
INSERT INTO `kategori` VALUES ('47', 'RAT0', 'Rames Teflon', 'rames-teflon');
INSERT INTO `kategori` VALUES ('46', 'AST0', 'Asbes tali', 'asbes-tali');
INSERT INTO `kategori` VALUES ('48', 'SOA0', 'Soap', 'soap');
INSERT INTO `kategori` VALUES ('49', 'PEL0', 'Pembersih Lantai ', 'pembersih-lantai-');
INSERT INTO `kategori` VALUES ('50', 'PEK0', 'Perlengkapan kebersihan', 'perlengkapan-kebersihan');
INSERT INTO `kategori` VALUES ('51', 'PEM0', 'Pembersih Kimia ', 'pembersih-kimia-');
INSERT INTO `kategori` VALUES ('52', 'PAN', 'Pengharum atau Anti Nyamuk', 'pengharum-atau-anti-nyamuk');
INSERT INTO `kategori` VALUES ('53', 'VFC0', 'Vaccum and Floor care', 'vaccum-and-floor-care');
INSERT INTO `kategori` VALUES ('54', 'MEP0', 'Mesin produksi', 'mesin-produksi');
INSERT INTO `kategori` VALUES ('55', 'MEP1', 'Mesin Packing ', 'mesin-packing-');
INSERT INTO `kategori` VALUES ('56', 'MEM0', 'Mesin metal detector', 'mesin-metal-detector');
INSERT INTO `kategori` VALUES ('57', 'MES0', 'Mesin steamer', 'mesin-steamer');
INSERT INTO `kategori` VALUES ('58', 'MEP2', 'Mesin Pendingin', 'mesin-pendingin');
INSERT INTO `kategori` VALUES ('59', 'MEB0', 'Mesin bubut', 'mesin-bubut');
INSERT INTO `kategori` VALUES ('61', 'ALK0', 'Peralatan Kebersihan', 'peralatan-kebersihan');
INSERT INTO `kategori` VALUES ('62', 'TUC0', 'Tutup Cup 8 oz', 'tutup-cup-8-oz');
INSERT INTO `kategori` VALUES ('63', 'BOC1', 'Body Cup 16 Oz', 'body-cup-16-oz');
INSERT INTO `kategori` VALUES ('64', 'HAT0', 'Hand Tools', 'hand-tools');
INSERT INTO `kategori` VALUES ('65', 'CUT0', 'Cutting Tools', 'cutting-tools');
INSERT INTO `kategori` VALUES ('66', 'AIT0', 'Air Tools', 'air-tools');
INSERT INTO `kategori` VALUES ('67', 'FIT0', 'Fitting ', 'fitting-');
INSERT INTO `kategori` VALUES ('68', 'POT0', 'Power Tools', 'power-tools');
INSERT INTO `kategori` VALUES ('69', 'MEA0', 'Measure ', 'measure-');
INSERT INTO `kategori` VALUES ('70', 'ACS0', 'Acsesories', 'acsesories');
INSERT INTO `kategori` VALUES ('71', 'TAS0', 'Tap and Snay ', 'tap-and-snay-');
INSERT INTO `kategori` VALUES ('72', 'WEL0', 'Welding', 'welding');
INSERT INTO `kategori` VALUES ('73', 'APK0', 'Alat Potong Keramik', 'alat-potong-keramik');
INSERT INTO `kategori` VALUES ('74', 'APP0', 'Alat Potong Pipa', 'alat-potong-pipa');
INSERT INTO `kategori` VALUES ('75', 'APP1', 'Alat Press Plastik', 'alat-press-plastik');
INSERT INTO `kategori` VALUES ('76', 'ATL0', 'Alat Tembak Lem', 'alat-tembak-lem');
INSERT INTO `kategori` VALUES ('77', 'CAT0', 'Catok ', 'catok-');
INSERT INTO `kategori` VALUES ('78', 'ALI0', 'Alat isolasi', 'alat-isolasi');
INSERT INTO `kategori` VALUES ('79', 'DOB0', 'Dongkrak botol', 'dongkrak-botol');
INSERT INTO `kategori` VALUES ('80', 'DOP0', 'Dongkrak penyangga', 'dongkrak-penyangga');
INSERT INTO `kategori` VALUES ('81', 'DOB1', 'Dongkrak buaya', 'dongkrak-buaya');
INSERT INTO `kategori` VALUES ('82', 'EIM0', 'Einheill mechanic', 'einheill-mechanic');
INSERT INTO `kategori` VALUES ('83', 'EIM1', 'Einheill manual', 'einheill-manual');
INSERT INTO `kategori` VALUES ('84', 'SAE', 'Saftey Equipment ', 'saftey-equipment-');
INSERT INTO `kategori` VALUES ('85', 'APR', 'Apron', 'apron');
INSERT INTO `kategori` VALUES ('86', 'KER', 'Kerudung', 'kerudung');
INSERT INTO `kategori` VALUES ('87', 'CLT', 'Celana training', 'celana-training');
INSERT INTO `kategori` VALUES ('88', 'MSK', 'Masker', 'masker');
INSERT INTO `kategori` VALUES ('89', 'SLJ', 'Sandal Jepit', 'sandal-jepit');
INSERT INTO `kategori` VALUES ('90', 'SRT', 'Sarung tangan ', 'sarung-tangan-');
INSERT INTO `kategori` VALUES ('91', 'SPB', 'Sepatu booth', 'sepatu-booth');
INSERT INTO `kategori` VALUES ('92', 'TOP', 'Topi', 'topi');
INSERT INTO `kategori` VALUES ('93', 'JAS', 'Jas Lab', 'jas-lab');
INSERT INTO `kategori` VALUES ('94', 'JKT', 'Jaket ', 'jaket-');
INSERT INTO `kategori` VALUES ('95', 'KAO', 'Kaos ', 'kaos-');
INSERT INTO `kategori` VALUES ('96', 'JHJ', 'Jas Hujan', 'jas-hujan');
INSERT INTO `kategori` VALUES ('97', 'ROM', 'Rompi', 'rompi');
INSERT INTO `kategori` VALUES ('98', 'KKI', 'Kaos Kaki', 'kaos-kaki');
INSERT INTO `kategori` VALUES ('99', 'ATK0', 'Alat Tulis Kantor (tidak habis)', 'alat-tulis-kantor-tidak-habis');
INSERT INTO `kategori` VALUES ('100', 'ATK1', 'Alat tulis kantor (habis)', 'alat-tulis-kantor-habis');
INSERT INTO `kategori` VALUES ('101', 'MEK0', 'Meja Kantor', 'meja-kantor');
INSERT INTO `kategori` VALUES ('102', 'KUK0', 'Kursi Kantor', 'kursi-kantor');
INSERT INTO `kategori` VALUES ('103', 'KON0', 'Kontainer ', 'kontainer-');
INSERT INTO `kategori` VALUES ('104', '', 'Locker', 'locker');
INSERT INTO `kategori` VALUES ('105', 'OBM0', 'Obat Minum', 'obat-minum');
INSERT INTO `kategori` VALUES ('106', 'OBL0', 'Obat Luar ', 'obat-luar-');
INSERT INTO `kategori` VALUES ('107', 'PEM0', 'Peralatan Medis', 'peralatan-medis');
INSERT INTO `kategori` VALUES ('108', 'PEM1', 'Perlengkapan Medis', 'perlengkapan-medis');
INSERT INTO `kategori` VALUES ('109', 'SOF0', 'Software', 'software');
INSERT INTO `kategori` VALUES ('110', 'KOP0', 'Komputer dan pirantinya ', 'komputer-dan-pirantinya-');
INSERT INTO `kategori` VALUES ('111', 'AUV0', 'Audio Video', 'audio-video');
INSERT INTO `kategori` VALUES ('112', 'DII0', 'Digital Imaging', 'digital-imaging');
INSERT INTO `kategori` VALUES ('113', 'SPT0', 'Smart phone & telephone', 'smart-phone--telephone');
INSERT INTO `kategori` VALUES ('114', 'BMM0', 'Bahan Makanan Mentah ', 'bahan-makanan-mentah-');
INSERT INTO `kategori` VALUES ('115', 'SNA0', 'Snack ', 'snack-');
INSERT INTO `kategori` VALUES ('116', 'BDM0', 'Bahan dasar Minuman ', 'bahan-dasar-minuman-');
INSERT INTO `kategori` VALUES ('117', 'MIJ0', 'Minuman jadi', 'minuman-jadi');
INSERT INTO `kategori` VALUES ('118', 'AIC0', 'Air Cooling ', 'air-cooling-');
INSERT INTO `kategori` VALUES ('119', 'AIQ0', 'Air Quality', 'air-quality');
INSERT INTO `kategori` VALUES ('120', 'LIDO', 'Lighting Device', 'lighting-device');
INSERT INTO `kategori` VALUES ('121', 'GAC0', 'Garment Care', 'garment-care');
INSERT INTO `kategori` VALUES ('122', 'WAD0', 'Water dispenser ', 'water-dispenser-');
INSERT INTO `kategori` VALUES ('123', 'WAH0', 'Water Heater', 'water-heater');
INSERT INTO `kategori` VALUES ('124', 'WAP0', 'Water pump', 'water-pump');
INSERT INTO `kategori` VALUES ('125', 'AIC1', 'Air Conditioner', 'air-conditioner');
INSERT INTO `kategori` VALUES ('126', 'REF', 'Refrigetaror', 'refrigetaror');
INSERT INTO `kategori` VALUES ('127', 'WAS0', 'Washer', 'washer');
INSERT INTO `kategori` VALUES ('128', 'DIC0', 'Display cooler', 'display-cooler');
INSERT INTO `kategori` VALUES ('129', 'FRE0', 'Freezer', 'freezer');
INSERT INTO `kategori` VALUES ('130', 'ACS0', 'Acsesoris ', 'acsesoris-');
INSERT INTO `kategori` VALUES ('131', 'PEB0', 'Peralatan Besar ', 'peralatan-besar-');
INSERT INTO `kategori` VALUES ('132', 'PEK0', 'Peralatan Kecil', 'peralatan-kecil');
INSERT INTO `kategori` VALUES ('133', 'DRI0', 'Dry Ingerdient', '');

-- ----------------------------
-- Table structure for `komentar`
-- ----------------------------
DROP TABLE IF EXISTS `komentar`;
CREATE TABLE `komentar` (
  `id_komentar` int(5) NOT NULL auto_increment,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) collate latin1_general_ci NOT NULL,
  `url` varchar(100) collate latin1_general_ci NOT NULL,
  `isi_komentar` text collate latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') collate latin1_general_ci NOT NULL default 'Y',
  PRIMARY KEY  (`id_komentar`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of komentar
-- ----------------------------
INSERT INTO `komentar` VALUES ('74', '124', 'Rizal Faizal', '', ' terima  kasih  atas  perhatiannya   ', '2011-02-22', '20:38:30', 'Y');
INSERT INTO `komentar` VALUES ('76', '54', 'Rizal Faizal', '', ' gawatttttttttt   ', '2011-02-23', '23:36:53', 'Y');
INSERT INTO `komentar` VALUES ('77', '54', 'Rizal Faizal', '', ' fewfg   ', '2011-02-23', '23:39:46', 'Y');
INSERT INTO `komentar` VALUES ('78', '54', 'fff', '', ' ffffffffffff   ', '2011-02-23', '23:41:36', 'Y');

-- ----------------------------
-- Table structure for `kota`
-- ----------------------------
DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota` (
  `id_kota` int(3) NOT NULL auto_increment,
  `id_perusahaan` int(10) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `ongkos_kirim` int(10) NOT NULL,
  PRIMARY KEY  (`id_kota`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kota
-- ----------------------------
INSERT INTO `kota` VALUES ('5', '5', 'Jakarta', '15000');
INSERT INTO `kota` VALUES ('6', '6', 'Bandung', '15000');
INSERT INTO `kota` VALUES ('7', '5', 'Surabaya', '13000');
INSERT INTO `kota` VALUES ('8', '5', 'Semarang', '17500');
INSERT INTO `kota` VALUES ('9', '6', 'Medan', '20000');
INSERT INTO `kota` VALUES ('10', '6', 'Aceh', '25000');
INSERT INTO `kota` VALUES ('11', '6', 'Banjarmasin', '17500');

-- ----------------------------
-- Table structure for `mainmenu`
-- ----------------------------
DROP TABLE IF EXISTS `mainmenu`;
CREATE TABLE `mainmenu` (
  `id_main` int(5) NOT NULL auto_increment,
  `nama_menu` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `link` varchar(100) character set latin1 collate latin1_general_ci default NULL,
  `aktif` enum('Y','N') NOT NULL default 'Y',
  `adminmenu` enum('Y','N') NOT NULL,
  PRIMARY KEY  (`id_main`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mainmenu
-- ----------------------------
INSERT INTO `mainmenu` VALUES ('1', 'Beranda', 'beranda', 'Y', 'N');
INSERT INTO `mainmenu` VALUES ('2', 'Profil', 'profil-kami.html', 'Y', 'N');
INSERT INTO `mainmenu` VALUES ('3', 'Material Group', 'statis-8-materialgroup.html', 'Y', 'N');
INSERT INTO `mainmenu` VALUES ('4', 'Hubungi Kami', 'hubungi-kami.html', 'Y', 'N');

-- ----------------------------
-- Table structure for `modul`
-- ----------------------------
DROP TABLE IF EXISTS `modul`;
CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL auto_increment,
  `nama_modul` varchar(50) collate latin1_general_ci NOT NULL,
  `link` varchar(100) collate latin1_general_ci NOT NULL,
  `static_content` text collate latin1_general_ci NOT NULL,
  `gambar` varchar(100) collate latin1_general_ci NOT NULL,
  `status` enum('user','admin') collate latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') collate latin1_general_ci NOT NULL,
  `urutan` int(5) NOT NULL,
  PRIMARY KEY  (`id_modul`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of modul
-- ----------------------------
INSERT INTO `modul` VALUES ('18', 'Tambah Produk', '?module=produk', '', '', 'admin', 'Y', '5');
INSERT INTO `modul` VALUES ('42', 'Lihat Order Masuk', '?module=order', '', '', 'admin', 'Y', '8');
INSERT INTO `modul` VALUES ('10', 'Manajemen Modul', '?module=modul', '', '', 'admin', 'Y', '19');
INSERT INTO `modul` VALUES ('31', 'Tambah Kategori Produk', '?module=kategori', '', '', 'admin', 'Y', '4');
INSERT INTO `modul` VALUES ('43', 'Edit Profil', '?module=profil', '<p class=\"MsoNormal\">\r\n<font size=\"2\">Pt BMI</font>\r\n</p>\r\n', '12sfhijau.jpg', 'admin', 'Y', '7');
INSERT INTO `modul` VALUES ('44', 'Lihat Pesan Masuk', '?module=hubungi', '', '', 'admin', 'Y', '9');
INSERT INTO `modul` VALUES ('47', 'Edit Link Terkait', '?module=banner', '', '', 'user', 'Y', '13');
INSERT INTO `modul` VALUES ('48', 'Edit Ongkos Kirim', '?module=ongkoskirim', '', '', 'user', 'Y', '11');
INSERT INTO `modul` VALUES ('49', 'Ganti Password', '?module=password', '', '', 'user', 'Y', '1');
INSERT INTO `modul` VALUES ('53', 'User Yahoo Messenger', '?module=ym', '', '', 'user', 'Y', '15');
INSERT INTO `modul` VALUES ('52', 'Lihat Laporan Transaksi', '?module=laporan', '', '', 'user', 'Y', '14');
INSERT INTO `modul` VALUES ('56', 'Edit Jasa Pengiriman', '?module=jasapengiriman', '<span class=\"center_content2\"><font size=\"2\"><span class=\"center_content\">\r\n<div class=\"profil\">\r\n<div>\r\n<span class=\"center_content\">\r\n<div>\r\n<strong>PT BMI</strong>\r\n</div>\r\n<div>\r\n</div>\r\n</span>\r\n</div>\r\n</div>\r\n</span></font></span>\r\n', 'hai.jpg', 'user', 'Y', '12');
INSERT INTO `modul` VALUES ('57', 'Edit Rekening Bank', '?module=bank', '', '', 'user', 'Y', '16');
INSERT INTO `modul` VALUES ('58', 'Edit Selamat Datang', '?module=welcome', '<strong>mobilestore.com</strong> merupakan website resmi dari Toko HP Lokomedia \r\nyang bermarkas di Jl. Arwana No.24 Minomartani Yogyakarta 55581. \r\nDirintis pertama kali oleh Lukmanul Hakim pada tanggal 14 Maret 2008.<br />\r\n<br />\r\nProduk\r\nunggulan dari Toko HP Lokomedia adalah produk-produk serta aksesoris \r\nbertema Nokia yang merupakan merk produk handphone paling terdepan saat \r\nini.\r\n', 'gedung.jpg', 'user', 'Y', '6');
INSERT INTO `modul` VALUES ('59', 'Ganti Header', '?module=header', '', '', 'user', 'Y', '18');
INSERT INTO `modul` VALUES ('61', 'Edit Menu Utama', '?module=menuutama', '', '', 'user', 'Y', '2');
INSERT INTO `modul` VALUES ('62', 'Edit Sub Menu', '?module=submenu', '', '', 'user', 'Y', '3');
INSERT INTO `modul` VALUES ('63', 'Edit Download Katalog', '?module=download', '', '', 'user', 'Y', '17');

-- ----------------------------
-- Table structure for `mod_bank`
-- ----------------------------
DROP TABLE IF EXISTS `mod_bank`;
CREATE TABLE `mod_bank` (
  `id_bank` int(5) NOT NULL auto_increment,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_bank`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mod_bank
-- ----------------------------

-- ----------------------------
-- Table structure for `mod_ym`
-- ----------------------------
DROP TABLE IF EXISTS `mod_ym`;
CREATE TABLE `mod_ym` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(255) collate latin1_general_ci NOT NULL,
  `username` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of mod_ym
-- ----------------------------

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id_orders` int(5) NOT NULL auto_increment,
  `nama_kustomer` varchar(100) collate latin1_general_ci NOT NULL,
  `alamat` text collate latin1_general_ci NOT NULL,
  `telpon` varchar(20) collate latin1_general_ci NOT NULL,
  `email` varchar(50) collate latin1_general_ci NOT NULL,
  `status_order` varchar(50) collate latin1_general_ci NOT NULL default 'Baru',
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `id_kota` int(3) NOT NULL,
  PRIMARY KEY  (`id_orders`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('45', 'Lutfi Zakaria', 'malang', '0898922128', 'lutfi97zakaria@gmail.com', 'Lunas/Terkirim', '2015-02-24', '10:04:12', '10');
INSERT INTO `orders` VALUES ('46', 'Lutfi Zakaria', 'malang', '0898922128', 'lutfi97zakaria@gmail.com', 'Lunas/Terkirim', '2015-02-24', '14:16:58', '10');

-- ----------------------------
-- Table structure for `orders_detail`
-- ----------------------------
DROP TABLE IF EXISTS `orders_detail`;
CREATE TABLE `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of orders_detail
-- ----------------------------
INSERT INTO `orders_detail` VALUES ('2', '16', '1');
INSERT INTO `orders_detail` VALUES ('3', '17', '1');
INSERT INTO `orders_detail` VALUES ('0', '56', '1');
INSERT INTO `orders_detail` VALUES ('0', '58', '1');
INSERT INTO `orders_detail` VALUES ('0', '60', '1');
INSERT INTO `orders_detail` VALUES ('0', '50', '1');
INSERT INTO `orders_detail` VALUES ('0', '51', '1');
INSERT INTO `orders_detail` VALUES ('0', '55', '1');
INSERT INTO `orders_detail` VALUES ('0', '61', '1');
INSERT INTO `orders_detail` VALUES ('0', '58', '1');
INSERT INTO `orders_detail` VALUES ('0', '60', '1');
INSERT INTO `orders_detail` VALUES ('0', '56', '1');
INSERT INTO `orders_detail` VALUES ('4', '44', '1');
INSERT INTO `orders_detail` VALUES ('5', '53', '1');
INSERT INTO `orders_detail` VALUES ('0', '58', '1');
INSERT INTO `orders_detail` VALUES ('0', '47', '1');
INSERT INTO `orders_detail` VALUES ('0', '58', '1');
INSERT INTO `orders_detail` VALUES ('0', '61', '1');
INSERT INTO `orders_detail` VALUES ('0', '58', '1');
INSERT INTO `orders_detail` VALUES ('6', '61', '1');
INSERT INTO `orders_detail` VALUES ('7', '58', '1');
INSERT INTO `orders_detail` VALUES ('8', '43', '1');
INSERT INTO `orders_detail` VALUES ('9', '58', '1');
INSERT INTO `orders_detail` VALUES ('11', '43', '1');
INSERT INTO `orders_detail` VALUES ('12', '44', '1');
INSERT INTO `orders_detail` VALUES ('13', '43', '1');
INSERT INTO `orders_detail` VALUES ('13', '58', '1');
INSERT INTO `orders_detail` VALUES ('16', '58', '1');
INSERT INTO `orders_detail` VALUES ('17', '50', '1');
INSERT INTO `orders_detail` VALUES ('18', '45', '1');
INSERT INTO `orders_detail` VALUES ('19', '41', '1');
INSERT INTO `orders_detail` VALUES ('20', '59', '1');
INSERT INTO `orders_detail` VALUES ('31', '58', '1');
INSERT INTO `orders_detail` VALUES ('31', '42', '2');
INSERT INTO `orders_detail` VALUES ('35', '59', '1');
INSERT INTO `orders_detail` VALUES ('35', '54', '1');
INSERT INTO `orders_detail` VALUES ('35', '61', '2');
INSERT INTO `orders_detail` VALUES ('0', '54', '1');
INSERT INTO `orders_detail` VALUES ('0', '59', '1');
INSERT INTO `orders_detail` VALUES ('38', '54', '1');
INSERT INTO `orders_detail` VALUES ('39', '59', '1');
INSERT INTO `orders_detail` VALUES ('40', '61', '1');
INSERT INTO `orders_detail` VALUES ('41', '54', '1');
INSERT INTO `orders_detail` VALUES ('42', '54', '1');
INSERT INTO `orders_detail` VALUES ('42', '55', '1');
INSERT INTO `orders_detail` VALUES ('43', '61', '1');
INSERT INTO `orders_detail` VALUES ('43', '58', '1');
INSERT INTO `orders_detail` VALUES ('45', '85', '1');
INSERT INTO `orders_detail` VALUES ('46', '95', '10');

-- ----------------------------
-- Table structure for `orders_temp`
-- ----------------------------
DROP TABLE IF EXISTS `orders_temp`;
CREATE TABLE `orders_temp` (
  `id_orders_temp` int(5) NOT NULL auto_increment,
  `id_produk` int(5) NOT NULL,
  `id_session` varchar(100) collate latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  `stok_temp` int(5) NOT NULL,
  PRIMARY KEY  (`id_orders_temp`)
) ENGINE=MyISAM AUTO_INCREMENT=232 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of orders_temp
-- ----------------------------
INSERT INTO `orders_temp` VALUES ('231', '94', 'cc9ef619ce2acd17238806a44e5b9071', '1', '2015-03-05', '17:10:53', '10');

-- ----------------------------
-- Table structure for `poling`
-- ----------------------------
DROP TABLE IF EXISTS `poling`;
CREATE TABLE `poling` (
  `id_poling` int(5) NOT NULL auto_increment,
  `pilihan` varchar(100) collate latin1_general_ci NOT NULL,
  `status` varchar(20) collate latin1_general_ci NOT NULL,
  `rating` int(5) NOT NULL default '0',
  `aktif` enum('Y','N') collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_poling`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of poling
-- ----------------------------
INSERT INTO `poling` VALUES ('1', 'Bagus', 'Jawaban', '27', 'Y');
INSERT INTO `poling` VALUES ('2', 'Lumayan', 'Jawaban', '80', 'Y');
INSERT INTO `poling` VALUES ('3', 'Tidak', 'Jawaban', '21', 'Y');
INSERT INTO `poling` VALUES ('8', 'Bagaimana tampilan web ini?', 'Pertanyaan', '0', 'Y');

-- ----------------------------
-- Table structure for `produk`
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id_produk` varchar(50) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `produk_seo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `packingan_kemasan` varchar(100) NOT NULL,
  `moq` varchar(100) NOT NULL,
  `lead_time` varchar(100) NOT NULL,
  `price_index` int(20) NOT NULL,
  `rijek_index` varchar(100) NOT NULL,
  `nama_supllier` varchar(100) NOT NULL default '0.00',
  `price_terakhir` int(11) NOT NULL,
  `top` varchar(100) NOT NULL,
  `sertifikat` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_produk`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES ('6', '16', 'Sayur', 'sayur', '<p>\r\n<img src=\"http://localhost./griyagaya/tinymcpuk/gambar/Image/19windows7.jpg\" alt=\" \" width=\"50\" height=\"38\" />AASSS\r\n</p>\r\n<p>\r\nTampak Depan :\r\n</p>\r\n<p>\r\n<img src=\"http://localhost./griyagaya/tinymcpuk/gambar/Image/32angrybird.jpg\" alt=\" \" width=\"390\" height=\"280\" />Â \r\n</p>\r\n<p>\r\nTampak Samping Kanan :\r\n</p>\r\n<p>\r\n<img src=\"http://localhost./griyagaya/tinymcpuk/gambar/Image/25chrome.jpg\" alt=\" \" width=\"200\" height=\"150\" />\r\n</p>\r\n<p>\r\nTampak Samping Kiri :\r\n</p>\r\n<p>\r\n<img src=\"http://localhost./griyagaya/tinymcpuk/gambar/Image/dara.jpg\" alt=\" \" width=\"224\" height=\"150\" />Â \r\n</p>\r\n<p>\r\nTampak Belakang :\r\n</p>\r\n<p>\r\n<img src=\"http://localhost./griyagaya/tinymcpuk/gambar/Image/13Arema-U-21-Juara-Grup.jpg\" alt=\" \" width=\"227\" height=\"150\" />Â \r\n</p>\r\n', '', '', '', '0', '0', '0.00', '20167', '', '', '641bachdim.jpg');
INSERT INTO `produk` VALUES ('2', '24', 'Gula', 'gula', 'jshadjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkjgsjaddsadada\r\n', '', '', '', '0', '0', '0.00', '2016', '', '', '1217mark_zuckerberg.jpg');
INSERT INTO `produk` VALUES ('3', '24', 'Buah', 'buah', 'hgggjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjhfhj\r\n', '', '', '', '5000', '0', '0.00', '2016', '', '', '1518safari.jpg');
INSERT INTO `produk` VALUES ('4', '16', 'Bumbu', 'bumbu', '', '', '', '', '0', '', '', '0', '', '', '8716rogerfederer.jpg');

-- ----------------------------
-- Table structure for `sekilasinfo`
-- ----------------------------
DROP TABLE IF EXISTS `sekilasinfo`;
CREATE TABLE `sekilasinfo` (
  `id_sekilas` int(5) NOT NULL auto_increment,
  `info` varchar(100) collate latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_sekilas`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of sekilasinfo
-- ----------------------------
INSERT INTO `sekilasinfo` VALUES ('1', 'Anak yang mengalami gangguan tidur, cenderung memakai obat2an dan alkohol berlebih saat dewasa.', '2010-04-11', 'news5.jpg');
INSERT INTO `sekilasinfo` VALUES ('2', 'WHO merilis, 30 persen anak-anak di dunia kecanduan menonton televisi dan bermain komputer.', '2010-04-11', 'news4.jpg');
INSERT INTO `sekilasinfo` VALUES ('3', 'Menurut peneliti di Detroit, orang yang selalu tersenyum lebar cenderung hidup lebih lama.', '2010-04-11', 'news3.jpg');
INSERT INTO `sekilasinfo` VALUES ('4', 'Menurut United Stated Trade Representatives, 25% obat yang beredar di Indonesia adalah palsu.', '2010-04-11', 'news2.jpg');
INSERT INTO `sekilasinfo` VALUES ('5', 'Presiden AS Barack Obama memesan Nasi Goreng di restoran Bali langsung dari Amerika', '2010-04-11', 'news1.jpg');

-- ----------------------------
-- Table structure for `shop_pengiriman`
-- ----------------------------
DROP TABLE IF EXISTS `shop_pengiriman`;
CREATE TABLE `shop_pengiriman` (
  `id_perusahaan` int(10) NOT NULL auto_increment,
  `nama_perusahaan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_perusahaan`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shop_pengiriman
-- ----------------------------
INSERT INTO `shop_pengiriman` VALUES ('6', 'JNE', '');
INSERT INTO `shop_pengiriman` VALUES ('5', 'TIKI', '');
INSERT INTO `shop_pengiriman` VALUES ('7', 'POS EKSPRESS', '');

-- ----------------------------
-- Table structure for `statistik`
-- ----------------------------
DROP TABLE IF EXISTS `statistik`;
CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL default '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL default '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of statistik
-- ----------------------------
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-23', '406', '1295797934');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-22', '199', '1295712739');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-20', '18', '1295484485');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-19', '10', '1295452438');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-25', '2', '1295961873');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-26', '4', '1296050267');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-27', '7', '1296110326');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-28', '7', '1296233314');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-29', '574', '1296320383');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-30', '290', '1296393287');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-01-31', '133', '1296493024');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-01', '79', '1296521132');
INSERT INTO `statistik` VALUES ('110.138.43.143', '2011-02-01', '31', '1296540211');
INSERT INTO `statistik` VALUES ('66.249.71.118', '2011-02-01', '1', '1296528448');
INSERT INTO `statistik` VALUES ('67.195.115.24', '2011-02-01', '6', '1296538036');
INSERT INTO `statistik` VALUES ('125.161.211.231', '2011-02-01', '1', '1296529398');
INSERT INTO `statistik` VALUES ('222.124.98.187', '2011-02-01', '3', '1296531520');
INSERT INTO `statistik` VALUES ('66.249.71.77', '2011-02-01', '1', '1296532249');
INSERT INTO `statistik` VALUES ('66.249.71.20', '2011-02-01', '1', '1296534199');
INSERT INTO `statistik` VALUES ('117.20.62.233', '2011-02-01', '13', '1296537677');
INSERT INTO `statistik` VALUES ('110.137.200.121', '2011-02-01', '24', '1296540049');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-16', '179', '1297875502');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-17', '301', '1297961988');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-18', '54', '1297990124');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-22', '118', '1298393910');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-23', '77', '1298479971');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-02-24', '1', '1298510525');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-13', '225', '1300027455');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-14', '44', '1300115678');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-15', '121', '1300195187');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-16', '116', '1300292361');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-17', '4', '1300331607');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-18', '52', '1300422211');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-27', '75', '1301234016');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-28', '16', '1301307056');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2011-03-29', '77', '1301409884');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2015-02-24', '198', '1424782244');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2015-02-25', '1', '1424828564');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2015-02-26', '5', '1424956686');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2015-03-05', '34', '1425550351');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2015-03-17', '1', '1426557102');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-07-23', '114', '1469283351');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-07-24', '37', '1469322680');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-07-25', '75', '1469448592');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-07-26', '63', '1469520719');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-07-27', '5', '1469602238');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-07-28', '5', '1469676166');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-07-29', '48', '1469782059');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-07-30', '188', '1469880257');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-07-31', '33', '1469962944');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-08-01', '37', '1470011192');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-08-02', '1', '1470105234');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-08-04', '1', '1470285568');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-08-05', '66', '1470362522');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-08-06', '97', '1470452687');
INSERT INTO `statistik` VALUES ('127.0.0.1', '2016-08-07', '5', '1470566416');

-- ----------------------------
-- Table structure for `submenu`
-- ----------------------------
DROP TABLE IF EXISTS `submenu`;
CREATE TABLE `submenu` (
  `id_sub` int(5) NOT NULL auto_increment,
  `kd_material_group` varchar(10) default NULL,
  `kd_kategori` varchar(10) NOT NULL default '',
  `isi_kategori` text,
  `nama_sub` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `link_sub` varchar(100) character set latin1 collate latin1_general_ci default NULL,
  `id_main` int(5) NOT NULL,
  `id_submain` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL default 'Y',
  `adminsubmenu` enum('Y','N') NOT NULL,
  PRIMARY KEY  (`id_sub`,`kd_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of submenu
-- ----------------------------
INSERT INTO `submenu` VALUES ('26', null, '', null, 'Ingredient', '', '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('25', null, '', null, 'Peralatan Kerja Produksi', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('23', null, '', null, 'Packaging', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('24', null, '', null, 'Perlengkapan Packing', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('20', null, '', null, 'Sanitizer', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('21', null, '', null, 'Machine', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('27', null, '', null, 'Barang Tehnik ', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('28', null, '', null, 'Peralatan Otomotif', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('32', null, '', null, 'Seragam', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('87', 'SAN', 'PEL0', null, 'Pembersih Lantai ', 'kategori-60-pembersihlantai.html', '3', '20', 'Y', 'N');
INSERT INTO `submenu` VALUES ('34', null, '', null, 'Furniture', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('35', null, '', null, 'Peralatan Dan Perlengkapan Kesehatan', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('36', null, '', null, 'Peralatan Dan Perlengkapan IT Dan Komunikasi', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('37', null, '', null, 'Catering', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('38', null, '', null, 'Peralatan Rumah Tangga', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('39', null, '', null, 'Peralatan Dapur', null, '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('48', 'ING', 'CAI0', '<p>\r\nsadddddddddddddddddddddddddddddddddddddd\r\n</p>\r\n<p>\r\nsadhjjjjjjjjjjjjjjjjjjjjjjjjjjj\r\n</p>\r\n<p>\r\njsadddddddddddddda&nbsp;\r\n</p>\r\n', 'Cairan Ingredient ', 'kategori-24-cairaningredient.html', '3', '26', 'Y', 'N');
INSERT INTO `submenu` VALUES ('45', 'ING', 'FRI0', '<p>\r\nAREMA sdasssssssssssssssssssssssssssssssgfdd uhusahdjhkjhhhhhhhhhhhhhhhhhhhhhhhjhj h\r\n</p>\r\n<p>\r\nsagdjhjajhkdddddddddddddddddkhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhwyiyhjhejdhksd\r\n</p>\r\n<p>\r\ndfgshgjjjjjjjjjjjjjjjjjjjjjjjjjjjjd&nbsp;\r\n</p>\r\n', 'Fresh Ingredient', 'kategori-16-freshingredient.html', '3', '26', 'Y', 'N');
INSERT INTO `submenu` VALUES ('47', 'ING', 'DRI0', null, 'Dry Ingredient', 'kategori-16-ikan.html', '3', '26', 'Y', 'N');
INSERT INTO `submenu` VALUES ('49', 'ING', 'SUT0', null, 'Susu & Turunannya', 'kategori-15-susudanturunannya.html', '3', '26', 'Y', 'N');
INSERT INTO `submenu` VALUES ('50', 'ING', 'MEM0', null, 'Mentega, margarin Dan Minyak', 'kategori-14-mentega,margarindanminyak.html', '3', '26', 'Y', 'N');
INSERT INTO `submenu` VALUES ('51', 'ING', 'TEB0', null, 'Tepung /breadcrumb /Predust/Buttermix', 'kategori-25-tepung/breadcrumb/predust/buttermix.html', '3', '26', 'Y', 'N');
INSERT INTO `submenu` VALUES ('52', 'ING', 'TEO0', null, 'Telor dan Olahannya', 'kategori-26-telordanolahannya.html', '3', '26', 'Y', 'N');
INSERT INTO `submenu` VALUES ('53', 'ING', 'KIT0', null, 'Kimia Tambahan ', 'kategori-27-kimiatambahan.html', '3', '26', 'Y', 'N');
INSERT INTO `submenu` VALUES ('54', 'PKP', 'TML', null, 'Tidak Menggunakan Listrik', 'kategori-28-tidakmenggunakanlistrik.html', '3', '25', 'Y', 'N');
INSERT INTO `submenu` VALUES ('55', 'PAC', 'BOK0', null, 'Body Kaleng', 'kategori-29-bodykaleng.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('56', 'PAC', 'TUK0', null, 'Tutup Kaleng ', 'kategori-30-tutupkaleng.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('57', 'PAC', 'BOC0', null, 'Body Cup 8 0z', 'kategori-31-bodycup80z.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('58', 'PAC', 'TUC1', null, 'Tutup Cup 16 Oz', 'kategori-32-tutupcup16oz.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('59', 'PAC', 'INC0', null, 'Inner Carton', 'kategori-33-innercarton.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('60', 'PAC', 'MAC0', null, 'Master Carton kraft', 'kategori-34-mastercartonkraft.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('61', 'PAC', 'MAC1', null, 'Master Carton White kraft', 'kategori-35-mastercartonwhitekraft.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('62', 'PAC', 'PLV0', null, 'Plastik Vaccum', 'kategori-36-plastikvaccum.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('63', 'PAC', 'PLK0', null, 'Plastik kantong', 'kategori-37-plastikkantong.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('64', 'PAC', 'STK0', null, 'Sticker Kertas', 'kategori-38-stickerkertas.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('65', 'PAC', 'STV0', null, 'Sticker Vynil', 'kategori-39-stickervynil.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('66', 'PAC', 'STL0', null, 'Sticker Lain', 'kategori-40-stickerlain.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('67', 'PAC', 'TRA0', null, 'Tray', 'kategori-41-tray.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('68', '', 'KLK0', null, 'Klingrit Kawat', 'kategori-42-klingritkawat.html', '3', '24', 'Y', 'N');
INSERT INTO `submenu` VALUES ('69', '', 'KAH0', null, 'Karet Hitam', 'kategori-43-karethitam.html', '3', '24', 'Y', 'N');
INSERT INTO `submenu` VALUES ('70', '', 'ASP0', null, 'Asbes Pita', 'kategori-44-asbespita.html', '3', '24', 'Y', 'N');
INSERT INTO `submenu` VALUES ('71', '', 'AST0', null, 'Asbes tali', 'kategori-45-asbestali.html', '3', '24', 'Y', 'N');
INSERT INTO `submenu` VALUES ('72', '', 'RAT0', null, 'Rames Teflon', '	kategori-47-ramesteflon.html', '3', '24', 'Y', 'N');
INSERT INTO `submenu` VALUES ('73', 'SAN', 'SOA0', null, 'Soap', 'kategori-48-soap.html', '3', '20', 'Y', 'N');
INSERT INTO `submenu` VALUES ('91', 'TET', 'HAT0', null, 'Hand Tools', 'kategori-64-handtools.html', '3', '85', 'Y', 'N');
INSERT INTO `submenu` VALUES ('75', 'SAN', 'PEK0', null, 'Perlengkapan kebersihan', 'kategori-50-perlengkapankebersihan.html', '3', '20', 'Y', 'N');
INSERT INTO `submenu` VALUES ('76', 'SAN', 'PEM0', null, 'Pembersih Kimia ', 'kategori-51-pembersihkimia.html', '3', '20', 'Y', 'N');
INSERT INTO `submenu` VALUES ('77', 'SAN', 'PAN', null, 'Pengharum atau Anti Nyamuk', 'kategori-52-pengharumatauantinyamuk.html', '3', '20', 'Y', 'N');
INSERT INTO `submenu` VALUES ('78', 'SAN', 'VFC0', null, 'Vaccum and Floor care', 'kategori-53-vaccumandfloorcare.html', '3', '20', 'Y', 'N');
INSERT INTO `submenu` VALUES ('79', 'MAC', 'MEP0', null, 'Mesin produksi', 'kategori-54-mesinproduksi.html', '3', '21', 'Y', 'N');
INSERT INTO `submenu` VALUES ('80', 'MAC', 'MEP1', null, 'Mesin Packing ', 'kategori-55-mesinpacking.html', '3', '21', 'Y', 'N');
INSERT INTO `submenu` VALUES ('81', 'MAC', 'MEM0', null, 'Mesin metal detector', 'kategori-56-mesinmetaldetector.html', '3', '21', 'Y', 'N');
INSERT INTO `submenu` VALUES ('82', 'MAC', 'MES0', null, 'Mesin steamer', 'kategori-57-mesinsteamer.html', '3', '21', 'Y', 'N');
INSERT INTO `submenu` VALUES ('83', 'MAC', 'MEP2', null, 'Mesin Pendingin', 'kategori-58-mesinpendingin.html', '3', '21', 'Y', 'N');
INSERT INTO `submenu` VALUES ('84', 'MAC', 'MEB0', null, 'Mesin bubut', 'kategori-59-mesinbubut.html', '3', '21', 'Y', 'N');
INSERT INTO `submenu` VALUES ('85', '', '', null, 'Technic Tools', '', '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('88', 'SAN', 'ALK0', null, 'Peralatan Kebersihan', 'kategori-61-peralatankebersihan.html', '3', '20', 'Y', 'N');
INSERT INTO `submenu` VALUES ('89', 'PAC', 'TUC0', null, 'Tutup Cup 8 oz', 'kategori-62-tutupcup8oz.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('90', 'PAC', 'BOC1', null, 'Body Cup 16 Oz', 'kategori-63-bodycup16oz.html', '3', '23', 'Y', 'N');
INSERT INTO `submenu` VALUES ('92', 'TET', 'CUT0', null, 'Cutting Tools', 'kategori-65-cuttingtools.html', '3', '85', 'Y', 'N');
INSERT INTO `submenu` VALUES ('93', 'TET', 'AIT0', null, 'Air Tools', 'kategori-66-airtools.html', '3', '85', 'Y', 'N');
INSERT INTO `submenu` VALUES ('94', 'TET', 'FIT0', null, 'Fitting ', 'kategori-67-fitting.html', '3', '85', 'Y', 'N');
INSERT INTO `submenu` VALUES ('95', 'TET', 'POT0', null, 'Power Tools', 'kategori-68-powertools.html', '3', '85', 'Y', 'N');
INSERT INTO `submenu` VALUES ('96', 'TET', 'MEA0', null, 'Measure ', 'kategori-69-measure.html', '3', '85', 'Y', 'N');
INSERT INTO `submenu` VALUES ('97', 'TET', 'ACS0', null, 'Acsesories', 'kategori-70-acsesories.html', '3', '85', 'Y', 'N');
INSERT INTO `submenu` VALUES ('98', 'TET', 'TAS0', null, 'Tap and Snay ', 'kategori-71-tapandsnay.html', '3', '85', 'Y', 'N');
INSERT INTO `submenu` VALUES ('99', 'TET', 'WEL0', null, 'Welding', 'kategori-72-welding.html', '3', '85', 'Y', 'N');
INSERT INTO `submenu` VALUES ('100', 'APT', 'APK0', null, 'Alat Potong Keramik', 'kategori-73-alatpotongkeramik.html', '3', '27', 'Y', 'N');
INSERT INTO `submenu` VALUES ('101', 'APT', 'APP0', null, 'Alat Potong Pipa', 'kategori-74-alatpotongpipa.html', '3', '27', 'Y', 'N');
INSERT INTO `submenu` VALUES ('102', 'APT', 'APP1', null, 'Alat Press Plastik', 'kategori-75-alatpressplastik.html', '3', '27', 'Y', 'N');
INSERT INTO `submenu` VALUES ('103', 'APT', 'ATL0', null, 'Alat Tembak Lem', 'kategori-76-alattembaklem.html', '3', '27', 'Y', 'N');
INSERT INTO `submenu` VALUES ('104', 'APT', 'CAT0', null, 'Catok ', 'kategori-77-catok.html', '3', '27', 'Y', 'N');
INSERT INTO `submenu` VALUES ('105', 'APT', 'ALI0', null, 'Alat isolasi', 'kategori-78-alatisolasi.html', '3', '27', 'Y', 'N');
INSERT INTO `submenu` VALUES ('106', 'PEO', 'DOB0', null, 'Dongkrak botol', 'kategori-79-dongkrakbotol.html', '3', '28', 'Y', 'N');
INSERT INTO `submenu` VALUES ('107', 'PEO', 'DOP0', null, 'Dongkrak penyangga', 'kategori-80-dongkrakpenyangga.html', '3', '28', 'Y', 'N');
INSERT INTO `submenu` VALUES ('108', 'PEO', 'DOB1', null, 'Dongkrak buaya', 'kategori-81-dongkrakbuaya.html', '3', '28', 'Y', 'N');
INSERT INTO `submenu` VALUES ('109', 'PEO', 'EIM0', null, 'Einheill mechanic', 'kategori-82-einheillmechanic.html', '3', '28', 'Y', 'N');
INSERT INTO `submenu` VALUES ('110', 'PEO', 'EIM1', null, 'Einheill manual', 'kategori-83-einheillmanual.html', '3', '28', 'Y', 'N');
INSERT INTO `submenu` VALUES ('111', 'SER', 'SAE', null, 'Saftey Equipment ', 'kategori-84-safteyequipment.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('112', 'SER', 'APR', null, 'Apron', 'kategori-85-apron.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('113', 'SER', 'KER', null, 'Kerudung', 'kategori-86-kerudung.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('114', 'SER', 'CLT', null, 'Celana training', 'kategori-87-celanatraining.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('115', 'SER', 'MSK', null, 'Masker', 'kategori-88-masker.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('116', 'SER', 'SLJ', null, 'Sandal Jepit', 'kategori-89-sandaljepit.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('117', 'SER', 'SRT', null, 'Sarung tangan ', 'kategori-90-sarungtangan.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('118', 'SER', 'SPB', null, 'Sepatu booth', 'kategori-91-sepatubooth.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('119', 'SER', 'TOP', null, 'Topi', 'kategori-92-topi.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('120', 'SER', 'JAS', null, 'Jas Lab', 'kategori-93-jaslab.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('121', 'SER', 'JKT', null, 'Jaket ', 'kategori-94-jaket.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('122', 'SER', 'KAO', null, 'Kaos ', 'kategori-95-kaos.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('123', 'SER', 'JHJ', null, 'Jas Hujan', 'kategori-96-jashujan.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('124', 'SER', 'ROM', null, 'Rompi', 'kategori-97-rompi.html', '3', '20', 'Y', 'N');
INSERT INTO `submenu` VALUES ('125', 'SER', 'KKI', null, 'Kaos Kaki', 'kategori-98-kaoskaki.html', '3', '32', 'Y', 'N');
INSERT INTO `submenu` VALUES ('126', '', '', null, 'Peralatan Kantor', '', '3', '0', 'Y', 'N');
INSERT INTO `submenu` VALUES ('127', 'PEK', 'ATK0', null, 'Alat Tulis Kantor (tidak habis)', 'kategori-99-alattuliskantor(tidakhabis).html', '3', '126', 'Y', 'N');
INSERT INTO `submenu` VALUES ('128', 'PEK', 'ATK1', null, 'Alat tulis kantor (habis)', 'kategori-100-alattuliskantor(habis).html', '3', '126', 'Y', 'N');
INSERT INTO `submenu` VALUES ('130', 'FUR', 'MEK0', null, 'Meja Kantor', 'kategori-101-mejakantor.html', '3', '34', 'Y', 'N');
INSERT INTO `submenu` VALUES ('131', 'FUR', 'KUK0', null, 'Kursi Kantor', 'kategori-102-kursikantor.html', '1', '34', 'Y', 'N');
INSERT INTO `submenu` VALUES ('132', 'FUR', 'KON0', null, 'Kontainer ', 'kategori-103-kontainer.html', '3', '34', 'Y', 'N');
INSERT INTO `submenu` VALUES ('133', 'FUR', '', null, 'Locker', 'kategori-104-locker.html', '3', '34', 'Y', 'N');
INSERT INTO `submenu` VALUES ('134', 'KES', 'OBM0', null, 'Obat Minum', 'kategori-105-obatminum.html', '3', '35', 'Y', 'N');
INSERT INTO `submenu` VALUES ('135', 'KES', 'OBL0', null, 'Obat Luar ', 'kategori-106-obatluar.html', '3', '35', 'Y', 'N');
INSERT INTO `submenu` VALUES ('136', 'KES', 'PEM0', null, 'Peralatan Medis', 'kategori-107-peralatanmedis.html', '3', '35', 'Y', 'N');
INSERT INTO `submenu` VALUES ('137', 'KES', 'PEM1', null, 'Perlengkapan Medis', 'kategori-108-perlengkapanmedis.html', '3', '35', 'Y', 'N');
INSERT INTO `submenu` VALUES ('138', 'ITC', 'SOF0', null, 'Software', 'kategori-109-software.html', '3', '36', 'Y', 'N');
INSERT INTO `submenu` VALUES ('139', 'ITC', 'KOP0', null, 'Komputer dan pirantinya ', 'kategori-110-komputerdanpirantinya.html', '3', '36', 'Y', 'N');
INSERT INTO `submenu` VALUES ('140', 'ITC', 'AUV0', null, 'Audio Video', 'kategori-111-audiovideo.html', '3', '36', 'Y', 'N');
INSERT INTO `submenu` VALUES ('141', 'ITC', 'DII0', null, 'Digital Imaging', 'kategori-112-digitalimaging.html', '3', '36', 'Y', 'N');
INSERT INTO `submenu` VALUES ('142', 'ITC', 'SPT0', null, 'Smart phone & telephone', 'kategori-113-smartphone&telephone.html', '3', '36', 'Y', 'N');
INSERT INTO `submenu` VALUES ('143', 'CAT', 'BMM0', null, 'Bahan Makanan Mentah ', 'kategori-114-bahanmakananmentah.html', '3', '37', 'Y', 'N');
INSERT INTO `submenu` VALUES ('144', 'CAT', 'SNA0', null, 'Snack ', 'kategori-115-snack.html', '3', '37', 'Y', 'N');
INSERT INTO `submenu` VALUES ('145', 'CAT', 'BDM0', null, 'Bahan dasar Minuman ', 'kategori-116-bahandasarminuman.html', '3', '37', 'Y', 'N');
INSERT INTO `submenu` VALUES ('146', 'CAT', 'MIJ0', null, 'Minuman jadi', 'kategori-117-minumanjadi.html', '3', '37', 'Y', 'N');
INSERT INTO `submenu` VALUES ('147', 'PRT', 'AIC0', null, 'Air Cooling ', 'kategori-118-aircooling.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('148', 'PRT', 'AIQ0', null, 'Air Quality', 'kategori-119-airquality.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('149', 'PRT', 'LID0', null, 'Lighting Device', 'kategori-120-lightingdevice.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('150', 'PRT', 'GAC0', null, 'Garment Care', 'kategori-121-garmentcare.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('151', 'PRT', 'WAD0', null, 'Water dispenser ', 'kategori-122-waterdispenser.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('152', 'PRT', 'WAH0', null, 'Water Heater', 'kategori-123-waterheater.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('153', 'PRT', 'WAP0', null, 'Water pump', 'kategori-124-waterpump.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('154', 'PRT', 'AIC1', null, 'Air Conditioner', 'kategori-125-airconditioner.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('155', 'PRT', 'REF0', null, 'Refrigetaror', 'kategori-126-refrigetaror.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('156', 'PRT', 'WAS0', null, 'Washer', 'kategori-127-washer.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('157', 'PRT', 'DIC0', null, 'Display cooler', 'kategori-128-displaycooler.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('158', 'PRT', 'FRE0', null, 'Freezer', 'kategori-129-freezer.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('159', 'PRT', 'ACS0', null, 'Acsesoris ', 'kategori-130-acsesoris.html', '3', '38', 'Y', 'N');
INSERT INTO `submenu` VALUES ('160', 'PED', 'PEB0', null, 'Peralatan Besar ', 'kategori-131-peralatanbesar.html', '3', '39', 'Y', 'N');
INSERT INTO `submenu` VALUES ('161', 'PED', 'PEK0', null, 'Peralatan Kecil', 'kategori-132-peralatankecil.html', '3', '39', 'Y', 'N');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(50) collate latin1_general_ci NOT NULL,
  `password1` varchar(50) collate latin1_general_ci NOT NULL,
  `password` varchar(50) collate latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  `aktivasi` int(6) NOT NULL default '0',
  `cek_aktivasi` int(6) NOT NULL default '0',
  `no_telp` varchar(20) collate latin1_general_ci NOT NULL,
  `level` varchar(20) collate latin1_general_ci NOT NULL default 'user',
  `blokir` enum('Y','N') collate latin1_general_ci NOT NULL default 'N',
  `id_session` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Function structure for `TRIMLETTERS`
-- ----------------------------
DROP FUNCTION IF EXISTS `TRIMLETTERS`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `TRIMLETTERS`(str VARCHAR(20)) RETURNS varchar(20) CHARSET latin1
    COMMENT 'Fungsi untuk menghilangkan huruf dari sebuah string'
BEGIN
DECLARE iLoop TINYINT DEFAULT 1;
DECLARE number VARCHAR(20) DEFAULT '';
DECLARE strlen INT DEFAULT CHAR_LENGTH(str);
WHILE iLoop < strlen + 1 DO
IF SUBSTRING(str,iLoop,1) BETWEEN '0' AND '9' THEN
SET number = CONCAT(number,SUBSTRING(str,iLoop,1));
END IF;
SET iLoop = iLoop + 1;
END WHILE;
RETURN number;
END
;;
DELIMITER ;
