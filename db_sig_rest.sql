-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 04:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sig_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_nama` varchar(255) DEFAULT NULL,
  `admin_alamat` varchar(255) DEFAULT NULL,
  `admin_bidang` varchar(255) DEFAULT NULL,
  `admin_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_nama`, `admin_alamat`, `admin_bidang`, `admin_foto`) VALUES
(2, 'username', 'username', 'nama pengguna', 'ab', '1', 'download1.jpeg'),
(24, 'user1', 'user1', 'nama', 'alamat', '2', 'GKT_Jemaat_Ampenan.jpeg'),
(25, 'user2', 'user2', 'nama', 'alamat', '1', 'foto.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `bidang_id` int(3) NOT NULL,
  `bidang_nama` varchar(20) DEFAULT NULL,
  `bidang_role` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`bidang_id`, `bidang_nama`, `bidang_role`) VALUES
(1, 'Inmas', 1),
(2, 'Bimas islam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `jenis_id` int(10) NOT NULL,
  `jenis_nama` varchar(20) DEFAULT NULL,
  `mapicon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`jenis_id`, `jenis_nama`, `mapicon`) VALUES
(1, 'Masjid', 'masjid.png'),
(2, 'Pura', 'pura.png'),
(3, 'Gereja', 'gereja.png'),
(4, 'Vihara', 'vihara.png'),
(5, 'Klenteng', 'klenteng.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `kab_id` int(3) NOT NULL,
  `kab_nama` varchar(20) DEFAULT NULL,
  `kab_latitude` varchar(255) DEFAULT NULL,
  `kab_longitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`kab_id`, `kab_nama`, `kab_latitude`, `kab_longitude`) VALUES
(1, 'Bima', '-8.464077', '118.745660'),
(2, 'Dompu', '-8.516701', '118.270444'),
(3, 'Lombok Barat', '-8.655397', '116.136263'),
(4, 'Lombok Tengah', '-8.725635', '116.295111'),
(5, 'Lombok Timur', '-8.569771', '116.539796'),
(6, 'Lombok Utara', '-8.312794', '116.266500'),
(7, 'Sumbawa', '-8.769387', '117.519818'),
(8, 'Sumbawa Barat', '-8.746402', '116.855213'),
(9, 'Kota Bima', '-8.464841', '118.745402'),
(10, 'Kota Mataram', '-8.577669', '116.100659');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `kec_id` int(3) NOT NULL,
  `kec_nama` varchar(20) NOT NULL,
  `id_kab` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`kec_id`, `kec_nama`, `id_kab`) VALUES
(1, 'Ampenan', 10),
(2, 'Cakranegara', 10),
(3, 'Mataram', 10),
(4, 'Sandubaya', 10),
(5, 'Sekarbela', 10),
(6, 'Selaparang', 10),
(7, 'Asakota', 9),
(8, 'Mpunda', 9),
(9, 'Raba', 9),
(10, 'Rasanae Barat', 9),
(11, 'Rasanae Timur', 9),
(12, 'Jereweh', 8),
(13, 'Taliwang', 8),
(14, 'Seteluk', 8),
(15, 'Sekongkang', 8),
(16, 'Brang Rea', 8),
(17, 'Poto Tano', 8),
(18, 'Brang Ene', 8),
(19, 'Maluk', 8),
(20, 'Alas', 7),
(21, 'Alas Barat', 7),
(22, 'Batu Lanteh', 7),
(23, 'Buer', 7),
(24, 'Empang', 7),
(25, 'Labangka', 7),
(26, 'Labuhan Badas', 7),
(27, 'Luntung', 7),
(28, 'Lape', 7),
(29, 'Lenangguar', 7),
(30, 'Lunyuk', 7),
(31, 'Lopok', 7),
(32, 'Maronge', 7),
(33, 'Moyo Hilir', 7),
(34, 'Moyo Hulu', 7),
(35, 'Moyo Utara', 7),
(36, 'Orong Telu', 7),
(37, 'Plampang', 7),
(38, 'Rhee', 7),
(39, 'Ropang', 7),
(40, 'Sumbawa', 7),
(41, 'Unter Iwes', 7),
(42, 'Utan', 7),
(43, 'Tarano', 7),
(44, 'Bayan', 6),
(45, 'Gangga', 6),
(46, 'Kayangan', 6),
(47, 'Pemenang', 6),
(48, 'Tanjung', 6),
(49, 'Aikmel', 5),
(50, 'Jerowaru', 5),
(51, 'Keruak', 5),
(52, 'Labuhan Haji', 5),
(53, 'Masbagik', 5),
(54, 'Montong Gading', 5),
(55, 'Pringgabaya', 5),
(56, 'Pringgasela', 5),
(57, 'Sakra Barat', 5),
(58, 'Sakra Timur', 5),
(59, 'Sakra', 5),
(60, 'Sambelia', 5),
(61, 'Selong', 5),
(62, 'Sembalun', 5),
(63, 'Sikur', 5),
(64, 'Suela', 5),
(65, 'Sukamulia', 5),
(66, 'Suralaga', 5),
(67, 'Terara', 5),
(68, 'Wanasaba', 5),
(69, 'Batukliang', 4),
(70, 'Batukliang Utara', 4),
(71, 'Janapria', 4),
(72, 'Jonggat', 4),
(73, 'Kopang', 4),
(74, 'Praya', 4),
(75, 'Praya Barat', 4),
(76, 'Praya Barat Daya', 4),
(77, 'Praya Tengah', 4),
(78, 'Praya Timur', 4),
(79, 'Pringgarata', 4),
(80, 'Pujut', 4),
(81, 'Batu Layar', 3),
(82, 'Gerung', 3),
(83, 'Gunung Sari', 3),
(84, 'Kediri', 3),
(85, 'Kuripan', 3),
(86, 'Labu Api', 3),
(87, 'Lembar', 3),
(88, 'Lingsar', 3),
(89, 'Narmada', 3),
(90, 'Sekotong', 3),
(91, 'Dompu', 2),
(92, 'Huu', 2),
(93, 'Kempo', 2),
(94, 'Kilo', 2),
(95, 'Manggelewa', 2),
(96, 'Pajo', 2),
(97, 'Pekat', 2),
(98, 'Woja', 2),
(99, 'Ambalawi', 1),
(100, 'Belo', 1),
(101, 'Bolo', 1),
(102, 'Donggo', 1),
(103, 'Lambitu', 1),
(104, 'Lambu', 1),
(105, 'Langgudu', 1),
(106, 'Mada Pangga', 1),
(107, 'Monta', 1),
(108, 'Palibelo', 1),
(109, 'Parado', 1),
(110, 'Sanggar', 1),
(111, 'Sape', 1),
(112, 'Soromandi', 1),
(113, 'Tambora', 1),
(114, 'Wawo', 1),
(115, 'Wera', 1),
(116, 'Woha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ti`
--

CREATE TABLE `tb_ti` (
  `ti_id` int(15) NOT NULL,
  `ti_jenis` varchar(255) DEFAULT NULL,
  `ti_tipologi` varchar(255) DEFAULT NULL,
  `ti_nama` varchar(255) DEFAULT NULL,
  `ti_alamat` varchar(255) DEFAULT NULL,
  `ti_kabupaten` varchar(255) DEFAULT NULL,
  `ti_kecamatan` varchar(255) DEFAULT NULL,
  `ti_luas_tanah` varchar(255) DEFAULT NULL,
  `ti_status_tanah` varchar(255) DEFAULT NULL,
  `ti_luas_bangunan` varchar(255) DEFAULT NULL,
  `ti_tahun_berdiri` varchar(255) DEFAULT NULL,
  `ti_jamaah` varchar(255) DEFAULT NULL,
  `ti_imam` int(10) DEFAULT NULL,
  `ti_khatib` int(10) DEFAULT NULL,
  `ti_remaja` int(10) DEFAULT NULL,
  `ti_ketua` varchar(255) DEFAULT NULL,
  `ti_keterangan` varchar(100) DEFAULT NULL,
  `ti_binaan_majelis` varchar(255) DEFAULT NULL,
  `ti_kondisi` varchar(255) DEFAULT NULL,
  `ti_telepon` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `ti_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ti`
--

INSERT INTO `tb_ti` (`ti_id`, `ti_jenis`, `ti_tipologi`, `ti_nama`, `ti_alamat`, `ti_kabupaten`, `ti_kecamatan`, `ti_luas_tanah`, `ti_status_tanah`, `ti_luas_bangunan`, `ti_tahun_berdiri`, `ti_jamaah`, `ti_imam`, `ti_khatib`, `ti_remaja`, `ti_ketua`, `ti_keterangan`, `ti_binaan_majelis`, `ti_kondisi`, `ti_telepon`, `latitude`, `longitude`, `ti_foto`) VALUES
(372, '1', 'Masjid Raya', 'Hubbul Wathan Islamic Centre', 'Jln. Udayana No. 1 Kota Mataram', '10', '6', '10.000 m2', 'Wakaf', '1.500 m2', '2014', '150 - 200', 4, 10, 0, NULL, NULL, '', NULL, '', '-8.580181', '116.100741', 'islamic_center.jpg'),
(373, '1', 'Masjid Jami', 'Masjid Baiturrahman', 'Kapitan Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1992', '50 - 100', 4, 4, 25, NULL, NULL, NULL, NULL, '', '-8.569207', '116.094195', 'Masjid_Baiturrahman.jpeg'),
(374, '1', 'Masjid Jami', 'Masjid Al-Falah', 'Gatep Permai Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1992', '50 - 100', 3, 3, 20, NULL, NULL, NULL, NULL, '', '-8.584436', '116.080499', 'Masjid_Al-Falah.jpg'),
(375, '1', 'Masjid Jami', 'Masjid Al-Furqon', 'Taman Sari Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1952', '50 - 100', 3, 4, 25, NULL, NULL, NULL, NULL, '', '-8.582908', '116.083887', 'Masjid_Al-Furqon.jpg'),
(376, '1', 'Masjid Jami', 'Masjid Khairul Huda', 'Irigasi Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1979', '50 - 100', 4, 4, 20, NULL, NULL, NULL, NULL, NULL, '-8.587559', '116.0827', 'masjid.png'),
(377, '1', 'Masjid Jami', 'Masjid Baitul Salam', 'Taman Gajah Mada Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1966', '50 - 100', 3, 3, 25, NULL, NULL, NULL, NULL, '', '-8.578163', '116.084588', 'Masjid_Baitul_Salam.jpeg'),
(378, '1', 'Masjid Jami', 'Masjid Baitul Hikmah', 'Taman Gajah Mada Ampenan', '10', '1', '-', 'Wakaf', '40 m2', '1966', '50 - 100', 4, 4, 20, NULL, NULL, NULL, NULL, NULL, '-8.7171717', '116.001010', 'masjid.png'),
(379, '1', 'Masjid Jami', 'Masjid Hayatul Abyan', 'Pejeruk Abyan Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1986', '50 - 100', 3, 4, 20, NULL, NULL, NULL, NULL, '', '-8.575451189626099', ' 116.08529557490071', 'masjid_hayatul_abiyan.jpg'),
(380, '1', 'Masjid Jami', 'Masjid Nurul Ikhlas', 'Pejeruk Bangket Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1961', '50 - 100', 4, 4, 20, NULL, NULL, NULL, NULL, '', '-8.572563', '116.089749', 'Masjid_Nurul_Ikhlas.jpg'),
(381, '2', '', 'Pura Prajapati', 'Mataram Selatan', '10', '3', '89', NULL, '13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '-8.587643', '116.107421', 'prajapati.jpg'),
(382, '2', '', 'Pura Pancaka', 'Jalan Pramuka', '10', '3', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '-8.584885', '116.10158', 'Pura_Pancaka.jpg'),
(383, '2', '', 'Pura Dalem Siwa Pranata', 'Kr. Medain Selatan', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pura.jpg'),
(384, '2', '', 'Pura Muter Majeluk', 'Majeluk Mataram', '10', '3', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '-8.580774', '116.117715', 'Pura_Muter_Majeluk.jpeg'),
(385, '2', '', 'Pura Menataran Kr. Monjok', 'Kr. Monjok Mataram', '10', '3', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '-8.584688', '116.114016', 'Pura_Menataran.jpeg'),
(386, '2', '', 'Pura Lingkuk Buni', 'Gomong Mataram', '10', '3', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '-8.58692', '116.098158', 'Pura_Lingkuk_Buni.jpg'),
(387, '2', '', 'Pura Penataran', 'Seraya Pagesangan', '10', '3', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '-8.595009', '116.101198', 'Pura_Penataran.png'),
(388, '2', '', 'Pura Pemaksan', 'Kr. Timbal Mataram', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pura.jpg'),
(389, '2', '', 'Pura Penataran Mumbul', 'Mumbul Pagesangan', '10', '3', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '-8.594995', '116.101163', 'Pura_Penataran_Mumbul.jpeg'),
(390, '2', '', 'Pura Pemaksan Pajang', 'Pajang Mataram', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'pura.jpg'),
(391, '3', '', 'GBI Glow Mataram', 'Jl. Sriwijaya No. 83 Mataram', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Wayan Pasek', 'PGLII', NULL, NULL, NULL, '-8.593997', '116.123841', 'gereja.jpg'),
(392, '3', '', 'GBI Rock Ministry Mataram', 'Jl. IGK Jelantik Gosa 23 Gebang Mataram-NTB', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Yosua Gunawan', 'PGI/PGLII', NULL, NULL, NULL, '-8.597439', '116.124517', 'GBI_Rock_Ministry_Mataram.jpg'),
(393, '3', '', 'GKII Bethel Cakranegara', 'Jl. Tumpang Sari 43 Cakranegara', '10', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Idris, S. Th', 'PGI/PGLII', NULL, NULL, NULL, '-8.59035', '116.138978', 'GKII_Bethel_Cakranegara.jpg'),
(394, '3', '', 'GKII Kalvari Ampenan', 'Jl. Panjitilar No. 211 Ampenan', '10', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Marga', 'PGI/PGLII', NULL, NULL, NULL, '-8.598188', '116.085642', 'gereja.jpg'),
(395, '3', '', 'GKII Rhema Cakranegara', 'Jl. Tumpang Sari No. 43a Cakranegara', '10', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Jafar Silasko', 'PGI/PGLII', NULL, NULL, NULL, '-8.590227', '116.13891', 'GKII_Rhema_Cakranegara.jpeg'),
(396, '3', '', 'GKPB \'Masa Depan Cerah\' Mataram', 'Jl. Brawijaya No. 111 Sweta', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Yohanes Sugiartha', 'PGLII', NULL, NULL, NULL, NULL, NULL, 'gereja.jpg'),
(397, '3', '', 'GKT Gloria Cakranegara', 'Jl. Subak II No. 15 Cakranegara', '10', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Linus', 'PGI ', NULL, NULL, NULL, '-8.589002', '116.124757', 'GKT_Gloria_Cakranegara.jpeg'),
(398, '3', '', 'GKT Jemaat Ampenan', 'JL Majapahit No.47', '10', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Suhartoyo', 'PGI', NULL, NULL, NULL, '-8.581645', '116.084545', 'GKT_Jemaat_Ampenan.jpeg'),
(399, '3', '', 'GMAHK \'Isa Almasih\' Ampenan', 'Jl. Yos Sudarso No. 16 Ampenan', '10', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rudolf Tambunan', 'GMAHK', NULL, NULL, NULL, '-8.574941', '116.079789', 'gereja.jpg'),
(400, '3', '', 'GP Anugerah Ampenan', 'Jl. Yos Sudarso No. 139 Ampenan', '10', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Joner S. Simanjuntak', 'PGLII', NULL, NULL, NULL, '-8.57074', '116.076372', 'gereja.jpg'),
(440, '4', NULL, 'DHAMMA SUSENA', 'JL. AMERTAPURA NO.12 CAKRANEGARA, MATARAM', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HENDI KANG PABOWO', NULL, 'MBI', NULL, NULL, '-8.589219', '116.134982', '1_DHAMMA_SUSENA.jpg'),
(441, '4', NULL, 'AVALOKITESVARA', 'JL. A.YANI NO.9 SWETA, CAKRANEGARA, MATARAM', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RONNY ABDIKESUMA, SE', NULL, 'MBI', NULL, NULL, '-8.587989', '116.147509', '2_AVALOKITESVARA.jpg'),
(442, '4', NULL, 'PRAJNA DHARMA MAITREYA', 'JL. YOS SUDARSO AMPENAN, MATARAM', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WIDI WINARTO', NULL, 'MAPANBUMI', NULL, NULL, '-8.570685', '116.075927', '3_PRAJNA_DHARMA_MAITREYA.jpg'),
(443, '4', NULL, 'SANATHA DHARMA MAITREYA', 'JL. RAJAWALI II/16 TELP.0370-632941, MATARAM', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PDT. SELAMET', NULL, 'MAPANBUMI', NULL, NULL, '-8.583574', '116.127997', '4_SANATHA_DHARMA_MAITREYA.jpg'),
(444, '4', NULL, 'VIMALA KIRTI', 'JL. LALU MESIR CAKRANEGARA, MATARAM', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I WAYAN SIANTO', NULL, 'BDI', NULL, NULL, '-8.601601', '116.132168', '5_VIMALA_KIRTI.jpg'),
(445, '4', NULL, 'BODHI DHARMA', 'JL. YOS SUDARSO AMPENAN, MATARAM', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S. WIDJANARKO', NULL, 'TRIDHARMA', NULL, NULL, '-8.570527', '116.073507', '6_BODHI_DHARMA.jpg'),
(446, '4', NULL, 'KONG TEK', 'Jl. KENARI CAKRANEGARA, MATARAM', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GO PING SIOE', NULL, 'MABIKTI', NULL, NULL, '-8.59888483080517', '116.14774079687500', '7_KONG_TEK.jpg'),
(447, '4', NULL, 'WISMA STI MATARAM', 'JL. TUMPANG SARI CAKRANEGARA', '10', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'VICTOR WIBOWO L.', NULL, 'MAGABUDHI', NULL, NULL, '-8.592419', '116.135038', '8_WISMA_STI_MATARAM.jpg'),
(448, '4', NULL, 'CETYA DHARMA CAKRA', 'JL. TUMPANG SARI CAKRANEGARA', '10', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EDI DHARMA', NULL, 'MAGABUDHI', NULL, NULL, '', '', 'vihara.png'),
(449, '1', 'Masjid Jami', 'Masjid Al-Ikhsan', 'Kebon Bawak Barat Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1969', '100 - 150', 3, 3, 20, NULL, NULL, NULL, NULL, NULL, '-8.575614070970240', '116.09001567143700', '1_al_ikhsan.jpg'),
(450, '1', 'Masjid Jami', 'Masjid Raudatul Sakinah', 'Bina Sejahtera Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1995', '50 - 100', 3, 3, 20, NULL, NULL, NULL, NULL, NULL, '-8.568748067706120', '116.08945679687500', '2_raudatul_sakinah.jpg'),
(451, '1', 'Masjid Jami', 'Masjid Baitul Amin', 'Pejeruk Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1949', '50 - 100', 4, 5, 25, NULL, NULL, NULL, NULL, NULL, '-8.574566910128340', '116.08749347635400', '3_Masjid_Baitul_Amin.jpg'),
(452, '1', 'Masjid Jami', 'Masjid Zulfa', 'Telaga Mas Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1948', '50 - 100', 4, 4, 20, NULL, NULL, NULL, NULL, NULL, '-8.569051036933120', '116.07524452944700', '4_Masjid_Zulfa.jpg'),
(453, '1', 'Masjid Jami', 'Masjid At-Taqwa', 'Kampung Arab Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1948', '50 - 100', 4, 4, 25, NULL, NULL, NULL, NULL, NULL, '-8.56744367218464', '116.07450109449500', '5_Masjid_At_Taqwa.jpg'),
(454, '1', 'Masjid Jami', 'Masjid Nurul Bahar', 'Bugis Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1981', '50 - 100', 5, 5, 25, NULL, NULL, NULL, NULL, NULL, '-8.565088562688990', '116.07356239980600', '6_Masjid_Nurul_Bahar.jpg'),
(455, '1', 'Masjid Jami', 'Masjid Baitul Iman', 'Pondok Perasi Ampenan', '10', '1', '-', 'Wakaf', '40 m2', '1980', '150 - 200', 6, 6, 30, NULL, NULL, NULL, NULL, NULL, '-8.563358254309370', '116.07388865668300', '7_Masjid_Baitul_Iman.jpg'),
(456, '1', 'Masjid Jami', 'Masjid Al-Mujahidin', 'Bintaro Jaya Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1995', '50 - 100', 4, 4, 30, NULL, NULL, NULL, NULL, NULL, '-8.556505464669920', '116.07164118060900', '8_Masjid_Al_Mujahidin_bintaro_jaya.jpg'),
(457, '1', 'Masjid Jami', 'Masjid An-Nur', 'Karang Buyuk Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1983', '100 - 150', 3, 4, 20, NULL, NULL, NULL, NULL, NULL, '-8.578339646101840', '116.07356135182500', '9_Masjid_An_Nur.png'),
(458, '3', NULL, 'GPdI Maranatha Cakranegara', 'Jl. Purbasari No. 4 Mataram', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Kawi Ardika', 'PGPI', NULL, NULL, NULL, '-8.58609526303712', '116.13201632944700', '3_GPdI_Maranatha_Cakranegara.jpg'),
(459, '3', NULL, 'GPdI Mataram', 'Jl. Pariwisata No. 4 Mataram', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Yoyong Kristanto', 'PGPI', NULL, NULL, NULL, '-8.580274827852490', '116.1077530638060', '4_GPdI_Mataram.jpg'),
(460, '3', NULL, 'GPIB Imanuel Bung Karno Mataram', 'Jl. Bung Karno Mataram', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt.Victor Hutauruk', 'PGI', NULL, NULL, NULL, '-8.591389930797330', '116.1139921968750', '6_GPIB_Immanuel_Bung_Karno_Mataram.jpg'),
(461, '3', NULL, 'GPPS Betlehem Mataram', 'Jl. Pemuda No. 71 Mataram', '10', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Legi Fujiyanti, S. Th ', 'PGI', NULL, NULL, NULL, '-8.580465330785780', '116.08731866742700', '8_GPPS_Betlehem_Mataram.jpg'),
(462, '3', NULL, 'GYKT Abbalove Ministries Mataram', 'Jl. Selaparang 67/A Cakranegara NTB', '10', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Bambang Rahmadi', 'PGLII', NULL, NULL, NULL, '-8.587847330793560', '116.13631465577000', '10_GYKT_Abbalove_Ministries_Mataram.jpg'),
(463, '3', NULL, 'HKBP Mataram', 'Jl. Parta Gg Kamboja II Abian Tubuh', '10', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdt. Pardamean Doloksaribu', 'PGI', NULL, NULL, NULL, '-8.598138730804380', '116.1314330968750', '11_HKBP_Mataram.jpg'),
(464, '1', 'Masjid Jami', 'Masjid Al-Istiqomah', 'Gatep Ampenan', '10', '1', '-', 'Wakaf', '30 m2', '1963', '50 - 100', 4, 4, 25, NULL, NULL, NULL, NULL, NULL, '-8.582064803371030', '116.0762365466230', '12_Masjid_Al_Istiqomah.jpg'),
(465, '1', 'Masjid Jami', 'Masjid Nurul Anwar', 'Kebon Talo Ampenan', '10', '1', '-', 'Wakaf', '35 m2', '1987', '150 - 200', 2, 3, 20, NULL, NULL, NULL, NULL, NULL, '-8.559272835684260', '116.08757801322500', '13_Masjid_Nurul_Anwar.jpg'),
(466, '1', 'Masjid Jami', 'Masjid As-Syifa', 'RSUP PROVINSI NTB', '10', '4', '-', 'SHM', '30 m2', '2018', '100 - 150', 10, 8, 10, NULL, NULL, NULL, NULL, NULL, '-8.606812035829390', '116.1328226938650', '16_Masjid_As_Syifa.jpg'),
(467, '1', 'Masjid Jami', 'Masjid Uswatun Hasanah', 'Kekalik Jaya Barat', '10', '5', '5 m2', 'Wakaf', '25 m2', '2015', '50 - 100', 5, 10, 25, NULL, NULL, NULL, NULL, NULL, '-8.58994203079576', '116.08558372632300', '17_Masjid_Uswatun_Hasanah.jpg'),
(468, '1', 'Masjid Jami', 'Masjid Al-Asbath', 'BTN Elit skarbela', '10', '5', '10 m2', 'Wakaf', '40 m2', '2017', '50 - 100', 5, 10, 30, NULL, NULL, NULL, NULL, NULL, '-8.617715337018230', '116.08336132944700', '18_Masjid_Al_Asbath.png'),
(469, '1', 'Masjid Jami', 'PONPES ABU HURAIRAH', 'PONPES ABU HURAIRAH PUNIA', '10', '3', '-', 'SHM', '40 m2', '2018', '> 200', 25, 25, 100, NULL, NULL, NULL, NULL, NULL, '-8.5896854924677', '116.09509605535500', '19.jpg'),
(470, '1', 'Masjid Jami', 'Masjid AL-ACHWAN', 'PERUM GRIYA PAGUTAN INDAH', '10', '3', '12 m2', 'Wakaf', '30 m2', '1998', '> 200', 16, 16, 30, NULL, NULL, NULL, NULL, '370645431', '-8.610971096541350', '116.10520841065400', '20Masjid_AL_ACHWAN.jpg'),
(471, '1', 'Masjid Jami', 'Masjid ATTAQWA', 'LOMBOK EPICENTRUM MAAL PUNIA', '10', '3', '-', 'SHM', '19 m2', '2018', '50 - 100', 3, 20, 30, NULL, NULL, NULL, NULL, NULL, '-8.59275259382413', '116.10521482632300', '21Masjid_ATTAQWA.jpg'),
(472, '1', 'Masjid Jami', 'Masjid asy-syuhada', 'jln. majapahit punia', '10', '3', '10 m2', 'SHM', '25 m2', '1982', '100 - 150', 3, 25, 30, NULL, NULL, NULL, NULL, NULL, '-8.59339373825237', '116.09912963286700', '23Masjidasy_syuhada.jpg'),
(473, '1', 'Masjid Jami', 'Masjid AT-TAUBAH', 'LINGK. TINGGAR KEL. AMPENAN UTARA', '10', '1', '130 m2', 'Wakaf', '324 m2', '1978', '> 200', 6, 6, 250, NULL, NULL, NULL, NULL, NULL, '-8.562221407421230', '116.08428888022800', '26Masjid_AT_TAUBAH.jpg'),
(474, '1', 'Masjid Jami', 'Masjid RAUDATUL JANNAH', 'Lingk. Kebun Bawak Tengah Kel. Kebun Sari', '10', '1', '200 m2', 'Wakaf', '160 m2', '1986', '> 200', 5, 7, 250, NULL, NULL, NULL, NULL, NULL, '-8.575410984730390', '116.09170131521700', '28Masjid_Raudatul_Jannah.jpg'),
(475, '1', 'Masjid Jami', 'Masjid Al-Ikhwan', 'Jl. Pelikan, Pejanggik, Kec. Mataram,', '10', '3', '-', 'SHM', '-', '2000', '> 200', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '-8.582484010869710', '116.11775532944700', '29Masjid_Al_Ikhwan.jpg'),
(476, '1', 'Masjid Jami', 'Masjid BAITUL GHAFUR', 'KOMPLEK LUMBA-LUMBA LING.GATEP INDAH ', '10', '5', '360 m2', 'Wakaf', '-', '2009', '150 - 200', 0, 0, 0, NULL, NULL, NULL, NULL, '87851876626', '-8.587203704722530', '116.07792696742700', '30Masjid_BAITUL_GHAFUR.jpg'),
(477, '1', 'Masjid Jami', 'Masjid Nurul Huda', 'Repok Jangkuk', '10', '2', '-', 'Wakaf', '-', '1873', '> 200', 3, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.570387783659200', '116.1280899780910', '33Masjid_Nurul_Huda.jpg'),
(478, '1', 'Masjid Jami', 'Masjid Nurul Yaqin', 'Sayang-Sayang', '10', '2', '-', 'Wakaf', '-', '1850', '> 200', 5, 5, 0, NULL, NULL, NULL, NULL, '-', '-8.569250671474690', '116.13229636053800', '34MasjidNurulYaqin.jpg'),
(479, '1', 'Masjid Jami', 'Masjid Al-Mujahidin', 'Geluk', '10', '2', '-', 'Wakaf', '-', '1976', '> 200', 3, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.569426660109460', '116.14358062274000', '35MasjidAlMujahidin.jpg'),
(480, '1', 'Masjid Jami', 'Masjid Qubbatul Islam', 'Karang Taliwang', '10', '2', '-', 'Wakaf', '-', '1960', '> 200', 6, 6, 0, NULL, NULL, NULL, NULL, '-', '-8.577703067731148', '116.12824135577084', '37_Masjid_Qubbatul_Islam.jpg'),
(481, '1', 'Masjid Jami', 'Masjid Nurul Yaqin', 'Kel. Mayura Cakranegara Sakah Utara', '10', '2', '400 m2', 'Wakaf', '220 m2', '1965', '> 200', 5, 5, 0, NULL, NULL, NULL, NULL, '87865951333', '-8.58787865686162', '116.13999599687556', '39_Masjid_Nurul_Yaqin.jpg'),
(482, '1', 'Masjid Jami', 'Masjid Nurul Huda', 'Jl.Ismail Marzuki Karang Tapen', '10', '2', '-', 'Wakaf', '-', '1984', '> 200', 7, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.591319693825179', '116.11957549687543', '40_Masjid_Nurul_Huda.jpg'),
(483, '1', 'Masjid Jami', 'Masjid Nurul Hidayah', 'Jl. Candi Pawon Getap', '10', '2', '-', 'Wakaf', '-', '1965', '> 200', 3, 3, 0, NULL, NULL, NULL, NULL, '-', '-8.597812330804047', '116.13451299687563', '42_Masjid_Nurul_Hidayah.jpg'),
(484, '1', 'Masjid Jami', 'Masjid Baiturrahim', 'Jl. Candi Pawon Getap', '10', '2', '-', 'Wakaf', '-', '1960', '> 200', 2, 2, 0, NULL, NULL, NULL, NULL, '-', '-8.59803605094552', '116.13588636122503', '43_Masjid_Baiturrahim.jpg'),
(485, '1', 'Masjid Jami', 'Masjid Qubbatul Islam', 'Jl. Brawijaya No.70A', '10', '2', '-', 'Wakaf', '-', '1939', '> 200', 4, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.593398730799422', '116.13902036742792', '45_Masjid_Qubbatul_Islam.jpg'),
(486, '1', 'Masjid Jami', 'Masjid Nurul Falah', 'Kampung Keludan Cakranegara', '10', '2', '-', 'Wakaf', '-', '1962', '> 200', 6, 6, 0, NULL, NULL, NULL, NULL, '-', '-8.58822381751158', '116.1309057163863', '47_Masjid_Nurul_Falah.jpg'),
(487, '1', 'Masjid Jami', 'Masjid At-Taqwa', 'Jl.Tumpang Sari No.19 Karang Bedil', '10', '2', '-', 'Wakaf', '-', '1913', '> 200', 5, 5, 0, NULL, NULL, NULL, NULL, '-', '-8.58991903079572', '116.1320246968755', '48_Masjid_At_Taqwa.jpg'),
(488, '1', 'Masjid Jami', 'Masjid Riyadussholihin', 'Gubuk Panaraga', '10', '2', '-', 'Wakaf', '-', '1955', '> 200', 3, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.583269644880794', '116.12158243652993', '51_Masjid_Riyadussholihin.jpg'),
(489, '1', 'Masjid Jami', 'Masjid Nurul Iman', 'Karang Jangkong', '10', '2', '-', 'Wakaf', '-', '1956', '> 200', 7, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.585832230791437', '116.12003199687535', '52_Masjid_Nurul_Iman.jpg'),
(490, '1', 'Masjid Jami', 'Masjid Babussalam', 'Marong Jamak Selatan', '10', '2', '-', 'Wakaf', '-', '2007', '> 200', 2, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.572390393838404', '116.1090576263231', '53_Masjid_Babussalam.jpg'),
(491, '1', 'Masjid Jami', 'Masjid Al-Istiqomah', 'Taman Karang Baru', '10', '2', '-', 'Wakaf', '-', '1960', '> 200', 2, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.572426281013165', '116.10615629445965', '54_Masjid_Al_Istiqomah.jpg'),
(492, '1', 'Masjid Jami', 'Masjid Nurul Iman', 'Ling. Marong Jamaq Utara Kel. Kr. Baru', '10', '2', '-', 'Wakaf', '-', '1957', '> 200', 4, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.56724467385994', '116.108322', '55_Nurul_Iman.jpg'),
(493, '1', 'Masjid Jami', 'Masjid Nurul Yaqin', 'Karang Baru Selatan', '10', '2', '-', 'Wakaf', '-', '1930', '> 200', 3, 5, 0, NULL, NULL, NULL, NULL, '-', '-8.566805267700737', '116.1078651557708', '60_Masjid_Nurul_Yaqin.jpg'),
(494, '1', 'Masjid Jami', 'Masjid Al-Furqon', 'Gegutu Barat', '10', '2', '-', 'Wakaf', '-', '1954', '> 200', 7, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.560637593846634', '116.11813672632293', '62_Masjid_Al_Furqon.jpg'),
(495, '1', 'Masjid Jami', 'Masjid Al-I\'anah', 'Komplek Asrama AURI', '10', '2', '-', 'Wakaf', '-', '1970', '> 200', 7, 6, 0, NULL, NULL, NULL, NULL, '-', '-8.557524467674849', '116.10939029687525', '64_Masjid_Al_Ianah.jpg'),
(496, '1', 'Masjid Jami', 'Masjid Al-Ikhlas', 'Komplek BTN Rembiga', '10', '2', '-', 'Wakaf', '-', '1997', '> 200', 11, 15, 0, NULL, NULL, NULL, NULL, '-', '-8.557597850354083', '116.1129001527613', '65_Masjid_Al_Ikhlas.jpg'),
(497, '1', 'Masjid Jami', 'Masjid Raya At-Taqwa', 'Jln.Langko Ni.18', '10', '2', '-', 'Wakaf', '-', '1966', '> 200', 7, 9, 0, NULL, NULL, NULL, NULL, '-', '-8.581208514898732', '116.09907988472585', '101_Masjid_Raya_At_Taqwa.jpg'),
(498, '1', 'Masjid Jami', 'Masjid At-Taubah', 'Majeluk', '10', '3', '-', 'Wakaf', '-', '1960', '> 200', 7, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.580019767737593', '116.11959069687535', '184_Masjid_At_Taubah.jpg'),
(499, '1', 'Masjid Jami', 'Masjid Al-Ikhwani', 'Pajang Timur', '10', '3', '-', 'Wakaf', '-', '1985', '> 200', 6, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.582485842337444', '116.11775573533724', '185_Masjid_Al_Ikhwani.jpg'),
(500, '1', 'Masjid Jami', 'Masjid Pusaka', 'Lingkungan Pusaka', '10', '3', '-', 'Wakaf', '-', '1999', '> 200', 2, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.584678029250492', '116.11123940361783', '188_masjid_pusaka.jpg'),
(501, '1', 'Masjid Jami', 'Masjid Baitul Gafur', 'Lingkungan Gebang Barat, Gg. Cangkrung', '10', '3', '-', 'SHM', '-', '1970', '> 200', 3, 3, 0, NULL, NULL, NULL, NULL, '-', '-8.595968530802132', '116.11409296742785', '190_Masjid_Baitul_Gafur.jpg'),
(502, '1', 'Masjid Jami', 'Masjid Al-Mubarok', 'Lingkungan Kekalik', '10', '3', '-', 'Wakaf', '-', '1979', '> 200', 3, 5, 0, NULL, NULL, NULL, NULL, '-', '-8.596115087529839', '116.09659063743466', '192_Masjid_Al_Mubarok.jpg'),
(503, '1', 'Masjid Jami', 'Masjid Al-Istiqlal', 'Pagesangan Indah', '10', '3', '-', 'Wakaf', '-', '2001', '> 200', 3, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.604511567806195', '116.10578632632328', '196_Masjid_Al_Istiqlal.jpg'),
(504, '1', 'Masjid Jami', 'Masjid Nurul Falah', 'Bebidas Pagesangan', '10', '3', '-', 'Wakaf', '-', '1990', '> 200', 4, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.601570130807994', '116.10384919687561', '197_Nurul_Falah.jpg'),
(505, '1', 'Masjid Jami', 'Masjid Nurullah', 'Punia Saba', '10', '3', '-', 'Wakaf', '-', '1978', '> 200', 4, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.590367030796205', '116.10126559687544', '201_Masjid_Nurullah.jpg'),
(506, '1', 'Masjid Jami', 'Masjid Hidayatullah', 'Jl.Arif Rahman Hakim Punia', '10', '3', '-', 'Wakaf', '-', '1971', '> 200', 6, 6, 0, NULL, NULL, NULL, NULL, '-', '-8.58909043079485', '116.10732002632317', '202_Masjid_Hidayatullah.jpg'),
(507, '1', 'Masjid Jami', 'Masjid At-Taubah', 'Karang Bedil Mataram', '10', '3', '-', 'Wakaf', '-', '1985', '> 200', 5, 2, 0, NULL, NULL, NULL, NULL, '-', '-8.592635208414178', '116.11010408957098', '203_At_Taubah.jpg'),
(508, '1', 'Masjid Jami', 'Masjid Al-Muttaqin', 'Lingkungan Banjar', '10', '1', '-', 'Wakaf', '-', '1989', '> 200', 6, 6, 0, NULL, NULL, NULL, NULL, '-', '-8.575646230780778', '116.07550062632318', '223_al_muttaqin.jpg'),
(509, '1', 'Masjid Jami', 'Masjid Nurul Huda', 'Lingkungan Sintung', '10', '1', '-', 'Wakaf', '-', '1958', '> 200', 7, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.573418593837616', '116.07531232632307', '225_Masjid_Nurul_Huda.jpg'),
(510, '1', 'Masjid Jami', 'Masjid Baiturrahman', 'Moncok Karya', '10', '1', '-', 'Wakaf', '-', '1976', '> 200', 6, 6, 0, NULL, NULL, NULL, NULL, '-', '-8.569199571950461', '116.09419505157157', '230_Baiturrahman.jpg'),
(511, '1', 'Masjid Jami', 'Masjid Al-Islah', 'Jln.Garuda No.9 Monjok', '10', '', '-', 'Wakaf', '-', '1997', '> 200', 7, 10, 0, NULL, NULL, NULL, NULL, '-', '-8.578381615530699', '116.11787985577088', '69MasjidAlIslah.jpg'),
(512, '1', 'Masjid Jami', 'Masjid Al-Falah', 'Jl.Ade Irma Suryani', '10', '', '-', 'Wakaf', '-', '1990', '> 200', 2, 5, 0, NULL, NULL, NULL, NULL, '-', '-8.577829673511541', '116.12371365870199', '70MasjidAlFalah.jpg'),
(513, '1', 'Masjid Jami', 'Masjid Al-Ikhlas', 'BTN Alamanda', '10', '5', '-', 'SHM', '-', '2012', '> 200', 4, 3, 0, NULL, NULL, NULL, NULL, '-', '-8.59415399382321', '116.08454199687549', '103MasjidAlIkhlas.jpg'),
(514, '1', 'Masjid Jami', 'Masjid Nurul A\'la', 'Karang Pule', '10', '5', '-', 'Wakaf', '-', '2005', '> 200', 4, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.600436399999998', '116.09080562944776', '107MasjidNurulAla.jpg'),
(515, '1', 'Masjid Jami', 'Masjid Nurul Islam', 'Karang Seme', '10', '5', '-', 'Wakaf', '-', '2013', '> 200', 3, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.60078404177289', '116.09598679687554', '108MasjidNurulIslam.jpg'),
(516, '1', 'Masjid Jami', 'Masjid Baiturrahman', 'Sekarbela Mas Mutiara', '10', '5', '-', 'Wakaf', '-', '1998', '> 200', 7, 6, 0, NULL, NULL, NULL, NULL, '--', '-8.601344030807764', '116.09280185577111', '110Baiturrahman.jpg'),
(517, '1', 'Masjid Jami', 'Masjid Darul Arqom', 'Batu Ringgit Selatan', '10', '5', '-', 'Wakaf', '-', '2012', '> 200', 7, 9, 0, NULL, NULL, NULL, NULL, '-', '-8.604600066029239', '116.08494162034137', '112MasjidDarulArqom.jpg'),
(518, '1', 'Masjid Jami', 'Masjid Darul Islam', 'Jempong Timur', '10', '5', '-', 'Wakaf', '-', '1975', '> 200', 4, 3, 0, NULL, NULL, NULL, NULL, '-', '-8.613201011030936', '116.10122322944774', '132MasjidDarulIslam.jpg'),
(519, '1', 'Masjid Jami', 'Masjid Al-Ijtihad', 'Jempong Barat', '10', '5', '-', 'Wakaf', '-', '1990', '> 200', 4, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.613028750259746', '116.09866253718272', '134MasjidAlIjtihad.jpg'),
(520, '1', 'Masjid Jami', 'Masjid Al-Furqon', 'Kekalik Timur', '10', '5', '-', 'Wakaf', '-', '2003', '> 200', 3, 3, 0, NULL, NULL, NULL, NULL, '-', '-8.59227527815793', '116.08948659327197', '136MasjidAlFurqon.jpg'),
(521, '1', 'Masjid Jami', 'Masjid Al-Faqi', 'Kekalik Gerisak', '10', '5', '-', 'Wakaf', '-', '2006', '> 200', 3, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.594443699999996', '116.07868039999998', '137MasjidAlFaqi.jpg'),
(522, '1', 'Masjid Jami', 'Masjid Darul Mukhlisin', 'Kekalik Gerisak', '10', '5', '-', 'Wakaf', '-', '1980', '> 200', 3, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.589737818620913', '116.0837518431457', '139MasjidDarulMukhlisin.jpg'),
(523, '1', 'Masjid Jami', 'Masjid Al-Jihad', 'Kekalik Indah', '10', '5', '-', 'Wakaf', '-', '1991', '> 200', 3, 3, 0, NULL, NULL, NULL, NULL, '-', '-8.59461399382288', '116.08779265577094', '140MasjidAlJihad.jpg'),
(524, '1', 'Masjid Jami', 'Masjid Al-Istiqoman', 'Kekalik Kijang', '10', '5', '-', 'Wakaf', '-', '2006', '> 200', 4, 5, 0, NULL, NULL, NULL, NULL, '-', '-8.589495493826469', '116.08757662632321', '143MasjidAlIstiqomah.jpg'),
(525, '1', 'Masjid Jami', 'Masjid Al-Mabrur', 'Kekalik Timur', '10', '5', '-', 'Wakaf', '-', '2008', '> 200', 3, 5, 0, NULL, NULL, NULL, NULL, '-', '-8.590031906198623', '116.08824575890438', '144MasjidAlMabrur.jpg'),
(526, '1', 'Masjid Jami', 'Masjid Al-Ihsan', 'Karang Bata', '10', '4', '-', 'Wakaf', '-', '1996', '> 200', 4, 4, 0, NULL, NULL, NULL, NULL, '--', '-8.603888673988001', '116.12608232944775', '147MasjidAlIhsan.jpg'),
(527, '1', 'Masjid Jami', 'Masjid Subulassalam', 'Karang Bata, Abian Tubuh Baru, Sandubaya', '10', '4', '-', 'Wakaf', '-', '1996', '> 200', 3, 3, 0, NULL, NULL, NULL, NULL, '-', '-8.601429899999994', '116.1262993', '148MasjidSubulassalam.jpg'),
(528, '1', 'Masjid Jami', 'Masjid Raudhatul Jannah', 'Kebon Duren', '10', '4', '-', 'Wakaf', '-', '1930', '> 200', 3, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.586930502855973', '116.14157788067998', '153MasjidRaudhatulJannah.jpg'),
(529, '1', 'Masjid Jami', 'Masjid Al-Ikhlas', 'Selagalas', '10', '4', '-', 'Wakaf', '-', '1925', '> 200', 1, 6, 0, NULL, NULL, NULL, NULL, '-', '-8.583894936958933', '116.14329350000891', '155MasjidAlIkhlas.jpg'),
(530, '1', 'Masjid Jami', 'Masjid Haqqul Yaqin', 'Gerung Butun Barat', '10', '4', '-', 'Wakaf', '-', '1991', '> 200', 4, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.593827728025575', '116.1446851351278', '156MasjidHaqqulYaqin.jpg'),
(531, '1', 'Masjid Jami', 'Masjid Nurul Hidayah', 'Lendang Lekong', '10', '4', '-', 'Wakaf', '-', '1996', '> 200', 3, 5, 0, NULL, NULL, NULL, NULL, '-', '-8.599728267792761', '116.15171172632336', '159MasjidNurulHidayah.jpg'),
(532, '1', 'Masjid Jami', 'Masjid Nurul Huda', 'Jl.Izuddin Bukhori Montong Are', '10', '4', '-', 'Wakaf', '-', '1950', '> 200', 4, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.605231896824282', '116.1536032185148', '161MasjidNurulHuda.jpg'),
(533, '1', 'Masjid Jami', 'Masjid Dawa\'il Qulub', 'Tembelok', '10', '4', '-', 'Wakaf', '-', '2956', '> 200', 4, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.60848777106571', '116.1514062257963', '162MasjidDawailQulub.jpg'),
(534, '1', 'Masjid Jami', 'Masjid Nurul Hidayah', 'Butun Indah', '10', '4', '-', 'Wakaf', '-', '1979', '> 200', 3, 5, 0, NULL, NULL, NULL, NULL, '-', '-8.589805793990598', '116.15079585759437', '164MasjidNurulHidayah.jpg'),
(535, '1', 'Masjid Jami', 'Masjid Darul Hidayah', 'Dasan Cermen', '10', '4', '-', 'Wakaf', '-', '2006', '> 200', 2, 5, 0, NULL, NULL, NULL, NULL, '-', '-8.612969737009907', '116.1273692', '170MasjidDarulHidayah.jpg'),
(536, '1', 'Masjid Jami', 'Masjid Al-Mujahidin', 'Lingkungan Gegerung Indah Kelurahan Turida', '10', '4', '-', 'Wakaf', '-', '1985', '> 200', 2, 3, 0, NULL, NULL, NULL, NULL, '-', '-8.60063667359027', '116.14648132925421', '171MasjidAlMujahidin.jpg'),
(537, '1', 'Masjid Jami', 'Masjid Al-Falah', 'Sayo Baru', '10', '4', '-', 'Wakaf', '-', '2011', '> 200', 2, 2, 0, NULL, NULL, NULL, NULL, '-', '-8.602930631103924', '116.14355175558552', '172MasjidAlFalah.jpg'),
(538, '1', 'Masjid Jami', 'Masjid Nurul Magfiroh', 'Turida Timur', '10', '4', '-', 'Wakaf', '-', '1996', '> 200', 2, 3, 0, NULL, NULL, NULL, NULL, '-', '-8.606224382717969', '116.14534078002605', '174MasjidNurulMagfiroh.jpg'),
(539, '1', 'Masjid Jami', 'Masjid Mamba\'ul Hasanah', 'Turida Barat', '10', '4', '-', 'Wakaf', '-', '1975', '> 200', 2, 2, 0, NULL, NULL, NULL, NULL, '-', '-8.609222894708811', '116.14241972320535', '175MasjidMambaulHasanah.jpg'),
(540, '1', 'Masjid Jami', 'Masjid Istiqlal', 'Jl.Ali Napiah Babakan Timur Selatan', '10', '4', '-', 'Wakaf', '-', '1999', '> 200', 2, 3, 0, NULL, NULL, NULL, NULL, '-', '-8.605813404807217', '116.13721249687553', '176MasjidIstiqlal.jpg'),
(541, '1', 'Masjid Jami', 'Masjid Samsul Huda', 'Jl.Ali Napiah Babakan Barat', '10', '4', '-', 'Wakaf', '-', '1941', '> 200', 5, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.607500656813611', '116.13647299687565', '178MasjidSamsulHuda.jpg'),
(542, '1', 'Masjid Jami', 'Masjid Raudhatul Jannah', 'Lingkungan Taman Indah', '10', '3', '-', 'Wakaf', '-', '1986', '> 200', 6, 3, 0, NULL, NULL, NULL, NULL, '-', '-8.596307073962555', '116.10462910007416', '181MasjidRaudhatulJannah.jpg'),
(543, '1', 'Masjid Jami', 'Masjid Iman Salam', 'Jl.Koperasi Ampenan', '10', '1', '500 m2', 'Wakaf', '500 m2', '1960', '> 200', 4, 5, 0, NULL, NULL, NULL, NULL, '-', '-8.567929327169914', '116.08581396285577', '233MasjidImanSalam.jpg'),
(544, '1', 'Masjid Jami', 'Masjid Al-Ikhlas', 'Jl. Adi Sucipto Ampenan', '10', '1', '-', 'Wakaf', '-', '1994', '> 200', 3, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.56750945672559', '116.0810454269708', '234MasjidAlIkhlas.jpg'),
(545, '1', 'Masjid Jami', 'Masjid Al-Haq', 'Jl. Koprasi Ampenan', '10', '1', '-', 'Wakaf', '-', '1965', '> 200', 6, 6, 0, NULL, NULL, NULL, NULL, '-', '-8.569333195769435', '116.0817713479819', '235MasjidAlHaq.jpg'),
(546, '1', 'Masjid Jami', 'Masjid Lebai Sandar', 'Jl. Saleh Sungkar Ampenan', '10', '1', '-', 'Wakaf', '-', '1934', '> 200', 7, 7, 0, NULL, NULL, NULL, NULL, '-', '-8.569590663065929', '116.077422', '236MasjidLebaiSandar.jpg'),
(547, '1', 'Masjid Jami', 'Masjid Babussalam', 'Ampenan Tengah', '10', '1', '-', 'Wakaf', '-', '1875', '> 200', 4, 4, 0, NULL, NULL, NULL, NULL, NULL, '-8.571639332229514', '116.07558455485118', '242MasjidBabussalam.jpg'),
(548, '1', 'Masjid Jami', 'Masjid Awwalul Hidayah', 'Tempit', '10', '1', '-', 'Wakaf', '-', '1775', '> 200', 4, 4, 0, NULL, NULL, NULL, NULL, '-', '-8.571845655181663', '116.08329762328418', '243MasjidAwwalulHidayah.jpg'),
(549, '1', 'Masjid Jami', 'Masjid Al-Hidayah', 'Sukaraja Timur', '10', '1', '-', 'Wakaf', '-', '1815', '> 200', 7, 6, 0, NULL, NULL, NULL, NULL, '-', '-8.57070522302495', '116.08141308241814', '246MasjidAlHidayah.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`bidang_id`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`kab_id`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`kec_id`);

--
-- Indexes for table `tb_ti`
--
ALTER TABLE `tb_ti`
  ADD PRIMARY KEY (`ti_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `bidang_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `kec_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tb_ti`
--
ALTER TABLE `tb_ti`
  MODIFY `ti_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
