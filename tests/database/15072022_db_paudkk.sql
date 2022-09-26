-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2022 at 07:13 AM
-- Server version: 5.7.33
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_paudkk`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(21, '2022-05-14-150925', 'App\\Database\\Migrations\\TbPengguna', 'default', 'App', 1654398084, 1),
(22, '2022-05-15-042921', 'App\\Database\\Migrations\\TbBerita', 'default', 'App', 1654398084, 1),
(23, '2022-05-21-003234', 'App\\Database\\Migrations\\TbOrtu', 'default', 'App', 1654398084, 1),
(24, '2022-05-21-152333', 'App\\Database\\Migrations\\TbMurid', 'default', 'App', 1654398084, 1),
(25, '2022-05-21-162518', 'App\\Database\\Migrations\\TbDokumen', 'default', 'App', 1654398084, 1),
(26, '2022-05-21-164547', 'App\\Database\\Migrations\\TbRiwayatMurid', 'default', 'App', 1654398084, 1),
(27, '2022-05-22-053029', 'App\\Database\\Migrations\\TbPembayaran', 'default', 'App', 1654398084, 1),
(28, '2022-06-02-210102', 'App\\Database\\Migrations\\KodePengguna', 'default', 'App', 1654398084, 1),
(29, '2022-06-02-210903', 'App\\Database\\Migrations\\KodeOrtu', 'default', 'App', 1654398085, 1),
(30, '2022-06-02-211027', 'App\\Database\\Migrations\\KodeDokumen', 'default', 'App', 1654398085, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) UNSIGNED NOT NULL,
  `id_pengguna` int(11) UNSIGNED DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `id_pengguna`, `judul`, `deskripsi`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Juara 1 Lomba Membaca Buku Cerita tingkat Kecamatan Cibinong', '<p>Alhamdulillah Paud Kangguru Kecil berhasil menjadi Juara 1&nbsp; Lomba Membaca Buku Cerita dalam rangka Gernasbaku tingkat Kecamatan Cibinong.&nbsp;<span style=\"font-size: 1rem;\">Hari ini kembali syuting utk maju ke tingkat Kabupaten Bogor. Syuting bersama Shanum dan bundanya jadi pengalaman yg seru.&nbsp;</span></p><p><span style=\"font-size: 1rem;\"><br></span><span style=\"font-size: 1rem;\">Terimakasih ya Shanum dan bunda yg sudah all out menunjukkan kemampuan terbaik. Mohon doanya teman-teman</span></p>', '20220605/1654418285_f8a76d11873ebbb82793.jpg', '2022-05-30 10:38:05', '2022-06-09 10:13:40', NULL),
(2, 1, 'Kegiatan 2', '<p>Halo ini adalah tempat untuk share kegiatan paud</p>', '20220609/1654745176_f72d651b4e03d1aaa670.jpg', '2022-05-30 11:02:05', '2022-06-09 10:37:44', '2022-06-09 10:37:44'),
(3, 1, 'Teman-teman Paud Kangguru Kecil belajar berbagi', '<p>Hari ini belajar berbagi, belajar menghargai sesama, serta belajar sabar tidak mudah mengeluh. Dengan tangannya sendiri mereka membagikan bingkisan Ramadhan kepada tetangga sekitar sekolah. Lelah memang karena mereka harus jalan kaki keluar masuk gang. Tapi insyaAllah hati mereka bahagia bisa berbagi kepada sesama.</p><p><span style=\"font-size: 1rem;\">Terimakasih kepada para donatur. Semoga Allah mengganti harta yang telah dikeluarkan dan memberkahi yang tersimpan ', '20220609/1654744024_c1db74055ef9521a9be5.jpg', '2022-06-05 15:38:05', '2022-06-09 10:07:04', NULL),
(4, 1, 'asdasd', '<p>lorem ipsum</p>', '20220611/1654921088_91e0254426b06e5a89f9.png', '2022-06-11 11:18:08', '2022-06-11 11:54:49', '2022-06-11 11:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dokumen` int(11) UNSIGNED NOT NULL,
  `kode_dokumen` varchar(11) DEFAULT NULL,
  `id_pengguna` int(11) UNSIGNED DEFAULT NULL,
  `foto_murid` varchar(255) DEFAULT NULL,
  `foto_murid_tipe` varchar(50) DEFAULT NULL,
  `akta_lahir` varchar(255) DEFAULT NULL,
  `akta_lahir_tipe` varchar(50) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `kk_tipe` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id_dokumen`, `kode_dokumen`, `id_pengguna`, `foto_murid`, `foto_murid_tipe`, `akta_lahir`, `akta_lahir_tipe`, `kk`, `kk_tipe`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '001', 3, '20220608/1654667902_18cda6667b3f6653964e.jpg', 'image/jpeg', '20220608/1654667902_ea48774a0169f33cb818.jpg', 'image/jpeg', '20220608/1654667902_b3215cf088b4ddae5a21.jpg', 'image/jpeg', '2022-06-05 11:09:35', '2022-06-08 12:58:22', NULL),
(3, '003', 5, '20220605/1654417575_b44d55b1c05d4b1d1e29.jpg', 'image/jpeg', '20220605/1654417575_838be521dcec14ae665e.jpg', 'image/jpeg', '20220605/1654417575_63634c64e9a89711863d.jpg', 'image/jpeg', '2022-06-05 14:03:09', '2022-06-05 15:26:15', NULL),
(4, '004', 8, '20220614/1655181765_3a2ace70a0c249ba5a96.jpg', 'image/jpeg', '20220614/1655181765_c6abeb98bf68be989fbd.jpg', 'image/jpeg', '20220614/1655181765_c83fda31bc3c7bc34ffc.jpg', 'image/jpeg', '2022-06-06 07:13:51', '2022-06-14 11:42:45', NULL),
(5, '005', 9, '20220620/1655693163_f45c532fedbc5b9493bf.jpg', 'image/jpeg', '20220620/1655693163_5c465156df4af86f8d08.jpg', 'image/jpeg', '20220620/1655693163_a5d5dc2c78d6f145fc23.jpg', 'image/jpeg', '2022-06-06 07:45:49', '2022-06-20 09:46:03', NULL),
(6, '006', 10, '20220607/1654579697_3a81cce985f8618649a6.jpg', 'image/jpeg', '20220607/1654579697_b35d3aac91f3c4db62ef.jpg', 'image/jpeg', '20220607/1654579697_1a0538b789e4ac1ca1fe.jpg', 'image/jpeg', '2022-06-07 12:15:55', '2022-06-07 12:28:17', NULL),
(25, '007', 29, '20220624/1656037555_a6add261abf3d51dd47f.jpg', 'image/jpeg', '20220624/1656037555_68c5a55a441a97d91e11.jpg', 'image/jpeg', '20220624/1656037555_68d6a715194c06704f6c.jpg', 'image/jpeg', '2022-06-24 09:22:11', '2022-06-24 09:25:55', NULL),
(26, '008', 30, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-24 09:38:13', '2022-06-28 15:46:25', '2022-06-28 15:46:25'),
(27, '009', 31, '20220628/1656407209_f87c8c672fe44e88518a.jpg', 'image/jpeg', '20220628/1656407209_799ce07cf95fbb63d465.jpg', 'image/jpeg', '20220628/1656407209_bc17465a49b103bcdea9.jpg', 'image/jpeg', '2022-06-24 09:43:36', '2022-06-28 16:06:49', NULL),
(28, '009', 32, '20220630/1656564744_c927f87c3de9a55415d0.jpg', 'image/jpeg', '20220630/1656564744_ea541a6946d717908199.jpg', 'image/jpeg', '20220630/1656564744_4bda681b0097333598e0.jpg', 'image/jpeg', '2022-06-26 09:57:01', '2022-06-30 11:52:24', NULL),
(29, '010', 33, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-26 09:58:06', '2022-06-26 09:58:06', NULL),
(30, '011', 34, '20220707/1657168233_d354eb6d7251908903cf.jpg', 'image/jpeg', '20220707/1657168233_cc293d6ac6ddaccc9ad5.jpg', 'image/jpeg', '20220707/1657168233_eda68d8cef5eaa7416cc.jpg', 'image/jpeg', '2022-06-26 10:00:20', '2022-07-07 11:30:33', NULL),
(31, '012', 35, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-27 07:35:56', '2022-06-27 07:35:56', NULL),
(32, '013', 36, '20220627/1656290925_567b07f735f32d511d7a.jpg', 'image/jpeg', '20220627/1656290925_e9fb4d8d6ac6ab348fdb.jpg', 'image/jpeg', '20220627/1656290925_d132676047a4a71fc168.jpg', 'image/jpeg', '2022-06-27 07:36:20', '2022-06-27 07:48:45', NULL),
(33, '014', 37, '20220627/1656320419_47826d8c9ed6000a59cb.png', 'image/png', '20220627/1656320419_126f91e557382ec200e6.pdf', 'application/pdf', '20220627/1656320419_daeddc9a58ba7d7ff065.pdf', 'application/pdf', '2022-06-27 15:54:13', '2022-06-27 16:00:19', NULL),
(34, '015', 38, '20220714/1657766919_3777af48e2f5f77f1a9a.jpg', 'image/jpeg', '20220714/1657766919_329ac9d3ac296ce6a114.jpg', 'image/jpeg', '20220714/1657766919_3e8c8a7e58ac38bb9b02.jpg', 'image/jpeg', '2022-06-28 16:45:07', '2022-07-14 09:48:39', NULL),
(35, '016', 39, '20220705/1656986401_515425e0b11d192d44cf.jpg', 'image/jpeg', '20220705/1656986401_66c6e43641c37092daa3.jpg', 'image/jpeg', '20220705/1656986401_dc42ae960c7d3c706320.jpg', 'image/jpeg', '2022-07-05 08:16:04', '2022-07-05 09:00:01', NULL),
(36, '017', 40, '20220706/1657115146_796a439dd7a803b4d32d.jpg', 'image/jpeg', '20220706/1657115146_b6439e984e06ed639b57.jpg', 'image/jpeg', '20220706/1657115146_469335828301d4a48b93.jpg', 'image/jpeg', '2022-07-06 11:36:41', '2022-07-06 20:45:46', NULL),
(37, '018', 41, '20220707/1657170695_38756f61ed109f94141b.jpg', 'image/jpeg', '20220707/1657170695_c0c75273d7ca13ea911e.jpg', 'image/jpeg', '20220707/1657170695_1e4358fbe83c9546ebdf.jpg', 'image/jpeg', '2022-07-07 12:04:51', '2022-07-07 12:11:35', NULL),
(38, '019', 43, '20220715/1657855017_51bb3ad6572195c181ed.jpg', 'image/jpeg', '20220715/1657855017_da49d028866642bf1997.jpg', 'image/jpeg', '20220715/1657855017_03276fc443064e321352.jpg', 'image/jpeg', '2022-07-15 09:46:04', '2022-07-15 10:16:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_murid`
--

CREATE TABLE `tb_murid` (
  `id_murid` int(11) UNSIGNED NOT NULL,
  `id_pengguna` int(11) UNSIGNED DEFAULT NULL,
  `nomor_pendaftaran` varchar(8) DEFAULT NULL,
  `kelompok` varchar(25) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `nama_panggilan` varchar(25) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(35) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL,
  `gol_darah` varchar(3) DEFAULT NULL,
  `berat_badan` decimal(5,2) DEFAULT NULL,
  `tinggi_badan` int(3) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `status_pendaftar` varchar(60) DEFAULT NULL,
  `nama_ayah` varchar(30) DEFAULT NULL,
  `nik_ayah` varchar(20) DEFAULT NULL,
  `pendidikan_ayah` varchar(8) DEFAULT NULL,
  `pekerjaan_ayah` varchar(35) DEFAULT NULL,
  `telepon_ayah` varchar(25) DEFAULT NULL,
  `nama_ibu` varchar(30) DEFAULT NULL,
  `nik_ibu` varchar(20) DEFAULT NULL,
  `pendidikan_ibu` varchar(8) DEFAULT NULL,
  `pekerjaan_ibu` varchar(35) DEFAULT NULL,
  `telepon_ibu` varchar(25) DEFAULT NULL,
  `penghasilan_ortu` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_murid`
--

INSERT INTO `tb_murid` (`id_murid`, `id_pengguna`, `nomor_pendaftaran`, `kelompok`, `nama_lengkap`, `nama_panggilan`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `anak_ke`, `jumlah_saudara`, `gol_darah`, `berat_badan`, `tinggi_badan`, `agama`, `alamat`, `status_pendaftar`, `nama_ayah`, `nik_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `telepon_ayah`, `nama_ibu`, `nik_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `telepon_ibu`, `penghasilan_ortu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '2022001', 'Playgroup', 'Hanif Rabbani Zubair', 'hanif', '112233456276', 'Laki-laki', 'bogor', '2019-05-01', 1, 2, 'B', '33.00', 111, 'islam', 'jl.asri 1 no20', 'Sudah melengkapi data dan pembayaran', 'Rakhmat', '7287381723', 'S1', 'Polisi', '08127837289', 'Ningsih', '7382718272', 'd3', 'Ibu rumah tangga', '08521783278', '6850000', '2022-05-27 11:09:35', '2022-07-15 10:08:42', NULL),
(3, 5, '2022003', 'Playgroup', 'Ami Nabila', 'Nabila', '92873981293', 'Perempuan', 'bogor', '2019-03-07', 1, 2, 'B', '15.00', 111, 'islam', 'jl. cucurak', 'Menunggu konfirmasi pembayaran', 'Saiful', '92873981293', 'S1', 'Pegawai', '089602470709', 'ningsih', '32123872', 'd3', 'PNS', '0812882288', '80000000', '2022-05-27 14:03:09', '2022-07-15 08:57:54', NULL),
(4, 8, '2022004', 'Playgroup', 'Gifari Akbar', 'Gifari', '12345672316', 'Laki-laki', 'Jakarta', '2019-02-07', 1, 1, 'B', '15.00', 112, 'islam', 'jl.mawar no10', 'Sudah melengkapi data dan pembayaran', 'Gunardi', '37287128', 'S1', 'Pegawai Swasta', '089283298192', 'Asri Cinta', '81273981237', 'S1', 'Ibu rumah tangga', '0812983928938', '7250000', '2022-06-06 07:13:51', '2022-07-15 08:57:38', NULL),
(5, 9, '2022005', 'TK A', 'Agung', 'gung', '32020212382', 'Laki-laki', 'jogja', '2018-06-29', 1, 2, 'AB', '22.00', 123, 'islam', 'jl.joglo 12', 'Menunggu konfirmasi pembayaran', 'Joko Tingkir', '19283981289', 'S1', 'Pegawai', '089602470709', 'Sularni', '28392819837', 'S1', 'ibu rumah tangga', '0812993028198', '8800000', '2022-06-06 07:45:49', '2022-07-15 09:35:50', NULL),
(6, 10, '2022006', 'Playgroup', 'Febrian Adi', 'Adi', '123871283728', 'Laki-laki', 'Jakarta', '2019-01-16', 1, 1, 'A', '15.00', 112, 'islam', 'Perum Kencana Jl.Pandan no.14', 'Sudah melengkapi data dan pembayaran', 'Agus Tri', '98928319832', 'S1', 'TNI', '081288977713', 'Sri Yuni', '32998123987', 'S1', 'Guru PAUD', '082277566213', '7850000', '2022-06-07 12:15:55', '2022-07-13 08:06:54', NULL),
(24, 29, '2022007', 'Playgroup', 'Huda Alman', 'Huda', '898928398', 'Laki-laki', 'Depok', '2019-06-13', 1, 2, 'A', '11.00', 111, 'islam', 'jl.kangguru no10', 'Sudah melengkapi data dan pembayaran', 'Joko', '37287382', 'S1', 'Pegawai', '089672637267', 'Lilis', '738278132', 'S1', 'Guru', '085238273829', '6000000', '2022-06-24 09:22:11', '2022-07-15 09:22:18', NULL),
(25, 30, '2022007', NULL, 'aslan', NULL, '91823819823', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Menunggu kelengkapan data', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-24 09:38:13', '2022-06-28 15:46:25', '2022-06-28 15:46:25'),
(26, 31, '2022008', 'Playgroup', 'Fauzan Ahmad', 'Ahmad', '198239821', 'Laki-laki', 'Bogor', '2018-12-13', 1, 1, 'AB', '11.00', 111, 'islam', 'jl.mawar no10', 'Sudah melengkapi data dan pembayaran', 'Syams', '19283981289', 'S1', 'ASN', '08927327871', 'Endah', '817287387', 'S1', 'ibu rumah tangga', '081211938928', '80000000', '2022-06-24 09:43:36', '2022-07-04 12:57:56', NULL),
(27, 32, '2022009', 'TK A', 'Ahmad Zain', 'Zain', '328738172', 'Laki-laki', 'Solo', '2018-01-22', 3, 3, 'B', '12.00', 112, 'Islam', 'Jl.Gudeg no 21', 'Menunggu pembayaran', 'Sutrino', '81239819', 'S1', 'ASN', '081234567892', 'Rahayu', '98329898', 'S1', 'Guru SMA', '081234567893', '7800000', '2022-06-26 09:57:01', '2022-07-15 09:22:59', NULL),
(28, 33, '2022010', 'TK B', 'Zaid Maulana', 'Zaid', '128378172', 'Laki-laki', 'Bogor', '2017-05-10', 1, 3, 'A', '11.00', 111, 'islam', 'jl.asri pelangi no10', 'Menunggu kelengkapan data', 'Ferdi', '182391729', 'S1', 'Pegawai', '08123783728', 'Ami', '01982309182', 'S1', 'Guru', '0812882288', '8000000', '2022-06-26 09:58:06', '2022-07-07 12:22:40', NULL),
(29, 34, '2022011', 'Playgroup', 'Arya Prakoso', 'Arya', '782738287', 'Laki-laki', 'Bogor', '2019-03-09', 1, 1, 'O', '12.00', 111, 'Islam', 'Jl.Kopassus No.45', 'Menunggu pembayaran', 'Yusri', '812391273', 'S1', 'ASN', '081234567892', 'Sri ', '198239182', 'S1', 'Pegawai', '081234567893', '8800000', '2022-06-26 10:00:20', '2022-07-07 11:30:33', NULL),
(30, 35, '2022012', 'Playgroup', 'Mandala Putra', 'Dala', '1982391', 'Laki-laki', 'Depok', '2022-06-08', 1, 2, 'AB', '11.00', 111, 'Islam', 'Jl.Asri 5 No15', 'Menunggu kelengkapan data', 'Wira', '1829381', 'S1', 'TNI', '08123783728', 'Eni Wahyuni', '81928391', 'S1', 'POLRI', '082178327889', '7800000', '2022-06-27 07:35:56', '2022-06-27 07:52:28', NULL),
(31, 36, '2022013', 'TK A', 'Putri Rahayu', 'Putri', '18723871', 'Perempuan', 'Bogor', '2019-12-01', 1, 1, 'A', '11.00', 111, 'Islam', 'JL.Hj Naim No19', 'Menunggu pembayaran', 'Syams', '19283981289', 'S1', 'Pegawai', '08927327871', 'Lilis', '283928198378', 'S1', 'Guru', '085238273829', '6800000', '2022-06-27 07:36:20', '2022-06-27 07:48:45', NULL),
(32, 37, '2022014', 'Playgroup', 'Rafael', 'Rafael', '9182938', 'Laki-laki', 'bogor', '2018-01-01', 2, 1, 'A', '11.00', 111, 'Islam', 'jl.asri 1', 'Sudah melengkapi data dan pembayaran', 'Saiful', '98192839', 'S1', 'ASN', '981209380', 'Lilis', '91829389', 'S1', 'ASN', '081298391823', '8600000', '2022-06-27 15:54:13', '2022-06-27 16:02:30', NULL),
(33, 38, '2022015', 'Playgroup', 'Fatimah', 'Fatimah', '01239812', 'Perempuan', 'Jakarta', '2020-01-30', 2, 2, 'A', '15.00', 111, 'Islam', 'Jl,Kenari no1', 'Menunggu konfirmasi pembayaran', 'Gunawan', '28939189381', 'S1', 'ASN', '08129839898', 'Ning', '3210101', 'S1', 'ASN', '08123892898', '8000000', '2022-06-28 16:45:07', '2022-07-14 09:49:18', NULL),
(34, 39, '2022016', 'TK B', 'Safiya Husna', 'Husna', '3209823918', 'Perempuan', 'Depok', '2018-02-06', 1, 2, 'A', '13.00', 111, 'Islam', 'Perum Melati Jl.Asri 1 No.11', 'Menunggu konfirmasi pembayaran', 'Yudi', '327823781', 'S1', 'ASN', '08127382787', 'Salimah', '329819239', 'D3', 'Guru', '081273827828', '8000000', '2022-07-05 08:16:04', '2022-07-15 08:52:34', NULL),
(35, 40, '2022017', 'Playgroup', 'Adzikra', 'Zikra', '19382923', 'Laki-laki', 'Depok', '2018-01-30', 3, 3, 'A', '11.00', 111, 'Islam', 'Jl.Angsa No.15', 'Menunggu konfirmasi pembayaran', 'Widodo', '3289182', 'S1', 'ASN', '0812938298', 'Bunga', '918239892', 'S1', 'Guru', '08123892898', '8700000', '2022-07-06 11:36:41', '2022-07-06 20:49:42', NULL),
(36, 41, '2022018', 'Playgroup', 'Rabbani Zubair', 'Hanif', '3298928', 'Laki-laki', 'Bogor', '2019-01-05', 1, 2, 'A', '15.00', 123, 'Islam', 'Jl.Asri 5 No.14', 'Sudah melengkapi data dan pembayaran', 'Suharto', '30293209', 'S1', 'ASN', '081288531845', 'Wahyuni', '320912093', 'S1', 'Guru', '0812983928938', '5500000', '2022-07-07 12:04:51', '2022-07-07 12:24:56', NULL),
(37, 43, '2022019', 'Playgroup', 'Azriel', 'Riell', '893821', 'Laki-laki', 'Medan', '2019-02-05', 3, 3, 'A', '11.00', 121, 'Islam', 'jl.melati no.5', 'Menunggu konfirmasi pembayaran', 'Andre', '73827871', 'S1', 'Wirausaha', '08127382787', 'Gita Mey', '32837287', 'S1', 'Guru', '08123892898', '8000000', '2022-07-15 09:46:04', '2022-07-15 10:17:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) UNSIGNED NOT NULL,
  `id_pengguna` int(11) UNSIGNED DEFAULT NULL,
  `kode_pembayaran` varchar(6) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `nama_pengirim` varchar(50) DEFAULT NULL,
  `bukti_transfer` varchar(100) DEFAULT NULL,
  `bukti_transfer_tipe` varchar(10) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Belum bayar',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pengguna`, `kode_pembayaran`, `nama_bank`, `nama_pengirim`, `bukti_transfer`, `bukti_transfer_tipe`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'P00001', 'BRI', 'Rakhmat', '20220620/1655692963_41e296036142986d7d6f.jpg', 'image/jpeg', 'Sudah bayar', '2022-06-05 11:09:35', '2022-06-20 09:47:30', NULL),
(3, 5, 'P00003', 'BCA', 'Jono', '20220620/1655693239_e78c20ac2aa4f9f6b682.jpg', 'image/jpeg', 'Lapor bayar', '2022-06-05 14:03:09', '2022-06-20 09:47:19', NULL),
(4, 8, 'P00004', 'BCA', 'Gunardi', '20220614/1655181801_801d1cb62f393f42c941.jpg', 'image/jpeg', 'Sudah bayar', '2022-06-06 07:13:51', '2022-06-14 13:55:02', NULL),
(5, 9, 'P00005', 'BCA', 'Elka', '20220620/1655693182_da905166a08fdd3a57ca.jpg', 'image/jpeg', 'Lapor bayar', '2022-06-06 07:45:49', '2022-06-20 09:46:22', NULL),
(6, 10, 'P00006', 'mandiri', 'Agus Tri', '20220607/1654580785_5d709ad6f5dee3dc9ba4.jpg', 'image/jpeg', 'Sudah bayar', '2022-06-07 12:15:55', '2022-06-07 12:47:16', NULL),
(25, 29, 'P00007', 'Mandiri', 'Joko', '20220624/1656037567_588d31abe4d93ff51b88.jpg', 'image/jpeg', 'Sudah bayar', '2022-06-24 09:22:11', '2022-06-24 09:26:31', NULL),
(26, 30, 'P00008', NULL, NULL, NULL, NULL, 'Belum bayar', '2022-06-24 09:38:13', '2022-06-28 15:46:25', '2022-06-28 15:46:25'),
(27, 31, 'P00009', 'BNI', 'Syamsul', '20220628/1656407387_b385f519d66acce590a6.jpg', 'image/jpeg', 'Sudah bayar', '2022-06-24 09:43:36', '2022-07-04 12:57:56', NULL),
(28, 32, 'P00009', NULL, NULL, NULL, NULL, 'Belum bayar', '2022-06-26 09:57:01', '2022-06-26 09:57:01', NULL),
(29, 33, 'P00010', NULL, NULL, NULL, NULL, 'Belum bayar', '2022-06-26 09:58:06', '2022-06-26 09:58:06', NULL),
(30, 34, 'P00011', NULL, NULL, NULL, NULL, 'Belum bayar', '2022-06-26 10:00:20', '2022-06-26 10:00:20', NULL),
(31, 35, 'P00012', NULL, NULL, NULL, NULL, 'Belum bayar', '2022-06-27 07:35:56', '2022-06-27 07:35:56', NULL),
(32, 36, 'P00013', NULL, NULL, NULL, NULL, 'Belum bayar', '2022-06-27 07:36:20', '2022-06-27 07:36:20', NULL),
(33, 37, 'P00014', 'BCA', 'Martinus', '20220627/1656320513_41360277410f9c108dcd.pdf', 'applicatio', 'Sudah bayar', '2022-06-27 15:54:13', '2022-06-27 16:02:30', NULL),
(34, 38, 'P00015', 'BRI', 'Mulyandi', '20220714/1657766958_7c58269667ad73c330fa.jpg', 'image/jpeg', 'Lapor bayar', '2022-06-28 16:45:07', '2022-07-14 09:49:18', NULL),
(35, 39, 'P00016', 'BRI', 'Yudi', '20220705/1656986436_763c4fcb8553059acc01.jpg', 'image/jpeg', 'Lapor bayar', '2022-07-05 08:16:04', '2022-07-05 09:00:36', NULL),
(36, 40, 'P00017', NULL, NULL, NULL, NULL, 'Belum bayar', '2022-07-06 11:36:41', '2022-07-07 12:26:08', NULL),
(37, 41, 'P00018', 'BNI', 'suharto', '20220707/1657170740_0d08ff18f18a1fa7f3ce.jpg', 'image/jpeg', 'Sudah bayar', '2022-07-07 12:04:51', '2022-07-07 12:24:56', NULL),
(38, 43, 'P00019', NULL, NULL, NULL, NULL, 'Belum bayar', '2022-07-15 09:46:04', '2022-07-15 14:05:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) UNSIGNED NOT NULL,
  `kode_pengguna` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `kode_pengguna`, `email`, `password`, `nik`, `nama`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'admin@gmail.com', '$2y$10$LGjZZ1yMiY6i0hdC6FOIAesMwkCGjRyMvHIjItRu13UcahI6J8foO', NULL, 'Admin', 'admin', '2022-05-23 10:01:32', '2022-05-26 10:11:00', NULL),
(2, NULL, 'kepsek@gmail.com', '$2y$10$2izs9bZb1IrCkBe3oaSUruCv7HPA7zbmxmkztgGzZvHbWd96nFnkq', NULL, 'Kepala Sekolah', 'kepsek', '2022-06-05 10:01:32', '2022-06-05 00:00:00', NULL),
(3, '20220605003', 'hanif@gmail.com', '$2y$10$zks7C6WFliOA25o1Zbk3/up9AtJfWkCXE2kO07LFWj9YWjfbVuei.', NULL, NULL, 'ortu', '2022-06-05 11:09:35', '2022-06-05 00:00:00', NULL),
(5, '20220605005', 'ami@gmail.com', '$2y$10$lVCLsNz1uRXlrKEi.7V9DeuNVs5p6Ootar0F/aZ2CnYB1O1GiMhWS', NULL, NULL, 'ortu', '2022-06-05 14:03:09', '2022-06-05 00:00:00', NULL),
(6, NULL, 'anna@gmail.com', '$2y$10$DnjruzkPN1n0akWrTQN6yu9P2ZNrZPSEkkGuLthqlX6GsjhnmoEFu', NULL, 'bu anna', 'kepsek', '2022-06-05 15:33:29', '2022-06-05 00:00:00', NULL),
(7, NULL, 'desna@gmail.com', '$2y$10$OLeT2fT01exwFjUxHfipR.sGfaxbX1WvFtXJyd97hYiUw38mtwsS2', NULL, 'Bu Desna', 'admin', '2022-06-01 15:34:58', '2022-06-02 10:54:22', NULL),
(8, '20220606008', 'gifari@gmail.com', '$2y$10$sPAFL4KBPLQmN9pTaErA0eoaOd7.kZLsBMeDR38J46AeHoasICWSa', NULL, NULL, 'ortu', '2022-06-06 07:13:51', '2022-06-06 00:00:00', NULL),
(9, '20220606009', 'agung@gmail.com', '$2y$10$t3MjYY.4/BnB7B.gdtrVW.E2JWg0eoec9W9hQGMtD0NOSQdJV7Sfu', NULL, NULL, 'ortu', '2022-06-06 07:45:49', '2022-06-06 00:00:00', NULL),
(10, '20220607010', 'febrian@gmail.com', '$2y$10$eZ/ikZhLz./BlA6IBYOBTOQO.tJ2oB3upQP0TSLbyPNgEiWS0S/jS', NULL, NULL, 'ortu', '2022-06-07 12:15:55', '2022-06-07 00:00:00', NULL),
(29, '20220624011', 'huda@gmail.com', '$2y$10$TlZJHDj9IxRGKKn/pDFIvOr/ZCTdjKasjCMYzAnAuPdZBkBWSvvsu', '898928398', 'Huda Alman', 'ortu', '2022-06-24 09:22:11', '2022-06-24 09:22:11', NULL),
(30, '20220624012', 'aslan@gmail.com', '$2y$10$T2WSJxEemeWVwSR3nqbtkOTE/lSmX9.ra0TGWf14vivW0tLZIj7Ju', '91823819823', 'aslan', 'ortu', '2022-06-24 09:38:13', '2022-06-28 15:46:25', '2022-06-28 15:46:25'),
(31, '20220624013', 'fauzan@gmail.com', '$2y$10$NasiKjREHAP58cOG9zsSueo1PmrcOTt6NMpcmnOPQeA7ry3FtYdue', '198239821', 'fauzan', 'ortu', '2022-06-24 09:43:36', '2022-06-24 09:43:36', NULL),
(32, '20220626013', 'zain@gmail.com', '$2y$10$6rWIVDOey/VDp6kWgHpobeub12ha3fSUFCevCRcHjQlce2J8pVbgq', '328738172', 'Ahmad Zain', 'ortu', '2022-06-26 09:57:01', '2022-06-26 09:57:01', NULL),
(33, '20220626014', 'maulana@gmail.com', '$2y$10$Lbg0O0NWd2ZbhLn7/4SReuUbKXYpWH2oBoRXHxX/5oA9r15ZW1W1m', '128378172', 'Maulana', 'ortu', '2022-06-26 09:58:06', '2022-06-26 09:58:06', NULL),
(34, '20220626015', 'arya@gmail.com', '$2y$10$QGF.Ff0QEzYSwxynV.dk3OTmFJXLiHhCbOyaEnXKXiowaVphrlKym', '782738287', 'Arya Prakoso', 'ortu', '2022-06-26 10:00:20', '2022-06-26 10:00:20', NULL),
(35, '20220627016', 'mandala@gmail.com', '$2y$10$MPKcB1sEm3RQjWZ8dmamiul8oqLUxpbAzQptigvUvUyDLo3XmwbGW', '1982391', 'Mandala Putra', 'ortu', '2022-06-27 07:35:56', '2022-06-27 07:35:56', NULL),
(36, '20220627017', 'putri@gmail.com', '$2y$10$fOatLh67dvF78ybaGet.0u30Du68fbDoDqAq5JKAbLeww4wFUlahe', '18723871', 'Putri Rahayu', 'ortu', '2022-06-27 07:36:20', '2022-06-27 07:36:20', NULL),
(37, '20220627018', 'rafael@gmail.com', '$2y$10$ezmxLBYdcxpD2KswpxLiD.6teXoBDm8AtF2WuZHLpPRmjTO4/50gW', '9182938', 'Rafael', 'ortu', '2022-06-27 15:54:13', '2022-06-27 15:54:13', NULL),
(38, '20220628019', 'fatimah@gmail.com', '$2y$10$ZpROxPD1nzsCPI37Un3ex.cUdA5votRBv6zO60.2QsYr3KJ4N2FM6', '01239812', 'Fatimah', 'ortu', '2022-06-28 16:45:07', '2022-06-28 16:45:07', NULL),
(39, '20220705020', 'safiya@gmail.com', '$2y$10$jNT8UdzEPit5yLU3XFGdkuirtq0RcSkxfUPrsNpJc68wr3.rdzlke', '3209823918', 'Safiya Husna', 'ortu', '2022-07-05 08:16:04', '2022-07-05 08:16:04', NULL),
(40, '20220706021', 'adzikra@gmail.com', '$2y$10$alfvhm8A08axNqDToJXdz.KiRX8QCRHxQPrjo/jQ8AjIIks.7BUM.', '9382923', 'Adzikra', 'ortu', '2022-07-06 11:36:41', '2022-07-06 11:36:41', NULL),
(41, '20220707022', 'zubair123@gmail.com', '$2y$10$lgZYocg.E99D7XzKUxwARuIOqEBPtQJXxth9kB4/jnWTyqXGgNINe', '3298928', 'Rabbani Zubair', 'ortu', '2022-07-07 12:04:51', '2022-07-07 12:04:51', NULL),
(42, NULL, 'arkana@gmail.com', '$2y$10$nTTmDo6NWeCrItMrrHs6NuFt1fLKnVGrPXHh3Xit3n63dpdnOZfby', NULL, 'arkan', 'admin', '2022-07-12 10:27:56', '2022-07-12 10:28:06', '2022-07-12 10:28:06'),
(43, '20220715024', 'azriel@gmail.com', '$2y$10$RTWbURXZo4SxqIIHUTq5kOjN/QAAl6FH7VfIL2z6R4AEZcgByyvfu', '893821', 'Azriel', 'ortu', '2022-07-15 09:46:04', '2022-07-15 09:46:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_murid`
--

CREATE TABLE `tb_riwayat_murid` (
  `id_riwayat_murid` int(11) UNSIGNED NOT NULL,
  `id_murid` int(11) UNSIGNED DEFAULT NULL,
  `lama_kandungan` varchar(30) DEFAULT NULL,
  `jenis_kelahiran` varchar(15) DEFAULT NULL,
  `berat_lahir` decimal(5,2) DEFAULT NULL,
  `tinggi_lahir` int(3) DEFAULT NULL,
  `panas_tinggi` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `pingsan` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `kejang` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `infeksi_telinga` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `alergi` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `kecelakaan` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `hal_penglihatan` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `hal_pendengaran` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `hal_bicara` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `hal_kemandirian` varchar(100) DEFAULT NULL,
  `hal_sifat` varchar(100) DEFAULT NULL,
  `hal_disukai` varchar(100) DEFAULT NULL,
  `hal_tidak_disukai` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_riwayat_murid`
--

INSERT INTO `tb_riwayat_murid` (`id_riwayat_murid`, `id_murid`, `lama_kandungan`, `jenis_kelahiran`, `berat_lahir`, `tinggi_lahir`, `panas_tinggi`, `pingsan`, `kejang`, `infeksi_telinga`, `alergi`, `kecelakaan`, `hal_penglihatan`, `hal_pendengaran`, `hal_bicara`, `hal_kemandirian`, `hal_sifat`, `hal_disukai`, `hal_tidak_disukai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '9 bulan', 'normal ', '20.00', 54, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'sudah', 'pendiam', 'membaca buku cerita', 'hantu', '2022-06-05 11:09:35', '2022-07-15 10:08:42', NULL),
(3, 3, '9 bulan', 'normal ', '20.00', 56, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'sudah', 'pendiam', 'membaca buku cerita', 'hantu', '2022-06-05 14:03:09', '2022-07-15 08:57:54', NULL),
(4, 4, '9 bulan', 'normal ', '20.00', 111, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'sudah', 'pendiam', 'membaca buku cerita', '-', '2022-06-06 07:13:51', '2022-07-15 08:57:38', NULL),
(5, 5, '9 bulan', 'sesar', '32.00', 55, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'belum', '-', '-', '-', '2022-06-06 07:45:49', '2022-07-15 09:35:50', NULL),
(6, 6, '9 bulan', 'normal ', '20.00', 52, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'membaca buku cerita', 'hantu', '2022-06-07 12:15:55', '2022-07-13 08:06:54', NULL),
(7, 6, '9 bulan', 'normal ', '20.00', 52, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'membaca buku cerita', 'hantu', '2022-06-14 13:28:19', '2022-07-13 08:06:54', NULL),
(24, 24, '9 bulan', 'Normal', '3.00', 51, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'bermain', '-', '2022-06-24 09:22:11', '2022-07-15 09:22:18', NULL),
(25, 25, NULL, NULL, NULL, NULL, 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', NULL, NULL, NULL, NULL, '2022-06-24 09:38:13', '2022-06-24 09:38:13', NULL),
(26, 26, '9 bulan', 'sesar', '3.00', 51, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', '-', 'bermain', '-', '2022-06-24 09:43:36', '2022-06-24 09:52:13', NULL),
(27, 27, '9 bulan', 'Normal', '3.00', 46, 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'bermain', '-', '2022-06-26 09:57:01', '2022-07-15 09:22:59', NULL),
(28, 28, '9 bulan', 'sesar', '3.00', 47, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'bermain', '-', '2022-06-26 09:58:06', '2022-07-07 12:22:40', NULL),
(29, 29, '9 Bulan', 'Normal', '3.00', 48, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '-', '-', 'main dan membaca buku', 'hantu', '2022-06-26 10:00:20', '2022-06-30 11:41:32', NULL),
(30, 30, '9 bulan', 'sesar', '3.00', 49, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'bermain', '-', '2022-06-27 07:35:56', '2022-06-27 07:52:29', NULL),
(31, 31, '9 bulan', 'sesar', '3.00', 47, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'bermain', '-', '2022-06-27 07:36:20', '2022-06-27 07:43:37', NULL),
(32, 32, '9 bulan', 'Normal', '3.00', 48, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'bermain', '-', '2022-06-27 15:54:13', '2022-06-27 15:57:36', NULL),
(33, 33, '9 Bulan', 'Normal', '3.00', 45, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'membaca', 'mewarnai', '2022-06-28 16:45:07', '2022-07-06 11:24:15', NULL),
(34, 34, '9 bulan', 'Normal', '32.00', 45, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'bermain', '-', '2022-07-05 08:16:04', '2022-07-15 08:52:34', NULL),
(35, 35, '9 Bulan', 'Normal', '3.00', 45, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'Pendiam', 'membaca', 'bermain', '2022-07-06 11:36:41', '2022-07-06 20:44:51', NULL),
(36, 36, '9 Bulan', 'Normal', '3.00', 46, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'membaca', 'menyanyi', '2022-07-07 12:04:51', '2022-07-07 12:10:55', NULL),
(37, 37, '9 bulan', 'Normal', '3.00', 47, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'belum', 'pendiam', 'bermain', 'bermain', '2022-07-15 09:46:04', '2022-07-15 10:16:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ta`
--

CREATE TABLE `tb_ta` (
  `id_ta` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `ta` varchar(255) DEFAULT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ta`
--

INSERT INTO `tb_ta` (`id_ta`, `tahun`, `ta`, `status`) VALUES
(1, 2021, '2021/2022', '0'),
(2, 2022, '2022/2023', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `tb_berita_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `tb_dokumen_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `tb_murid`
--
ALTER TABLE `tb_murid`
  ADD PRIMARY KEY (`id_murid`),
  ADD KEY `tb_murid_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `tb_pembayaran_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_riwayat_murid`
--
ALTER TABLE `tb_riwayat_murid`
  ADD PRIMARY KEY (`id_riwayat_murid`),
  ADD KEY `tb_riwayat_murid_id_murid_foreign` (`id_murid`);

--
-- Indexes for table `tb_ta`
--
ALTER TABLE `tb_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `id_dokumen` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_murid`
--
ALTER TABLE `tb_murid`
  MODIFY `id_murid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tb_riwayat_murid`
--
ALTER TABLE `tb_riwayat_murid`
  MODIFY `id_riwayat_murid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_ta`
--
ALTER TABLE `tb_ta`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD CONSTRAINT `tb_dokumen_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_murid`
--
ALTER TABLE `tb_murid`
  ADD CONSTRAINT `tb_murid_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_riwayat_murid`
--
ALTER TABLE `tb_riwayat_murid`
  ADD CONSTRAINT `tb_riwayat_murid_id_murid_foreign` FOREIGN KEY (`id_murid`) REFERENCES `tb_murid` (`id_murid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
