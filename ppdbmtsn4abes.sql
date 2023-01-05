-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 12:11 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdbmtsn4abes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agama`
--

INSERT INTO `tbl_agama` (`id_agama`, `agama`) VALUES
(1, 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasilujian`
--

CREATE TABLE `tbl_hasilujian` (
  `id_hasilujian` int(11) NOT NULL,
  `ujian_id` int(11) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `list_soal` longtext DEFAULT NULL,
  `list_jawaban` longtext DEFAULT NULL,
  `nilai` decimal(10,2) DEFAULT 0.00,
  `nilai_wawancara` decimal(10,2) DEFAULT 0.00,
  `nilai_praktik` decimal(10,2) DEFAULT 0.00,
  `nilai_akhir` decimal(10,2) DEFAULT 0.00,
  `jumlah_benar` int(11) DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `cek_ujian` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasilujian`
--

INSERT INTO `tbl_hasilujian` (`id_hasilujian`, `ujian_id`, `siswa_id`, `list_soal`, `list_jawaban`, `nilai`, `nilai_wawancara`, `nilai_praktik`, `nilai_akhir`, `jumlah_benar`, `tgl_selesai`, `cek_ujian`) VALUES
(52, 5, 122, '67,63,70,72,64', ',,,,', '100.00', '80.00', '90.00', '92.00', 0, '2023-01-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegemaran`
--

CREATE TABLE `tbl_kegemaran` (
  `id_kegemaran` int(11) NOT NULL,
  `kegemaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kegemaran`
--

INSERT INTO `tbl_kegemaran` (`id_kegemaran`, `kegemaran`) VALUES
(3, 'Olahraga'),
(4, 'Kesenian'),
(5, 'Membaca'),
(6, 'Menulis'),
(7, 'Travelling'),
(8, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panitia`
--

CREATE TABLE `tbl_panitia` (
  `id_panitia` int(11) NOT NULL,
  `nama_panitia` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon_panitia` varchar(12) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_panitia`
--

INSERT INTO `tbl_panitia` (`id_panitia`, `nama_panitia`, `email`, `telepon_panitia`, `password`, `foto`, `updated_at`) VALUES
(21, 'Atika Fadhluna', 'a.fadhluna@mhs.unsyiah.ac.id', '081260741115', '$2y$10$ApTzdhcCWaB9DiXnEdGqROo499L3LNySZjvYpbUoJ8mCcA2dafr9S', '1672471223_edcc342a5d5b67ad77dc.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `id_pekerjaan` int(2) NOT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(18, 'Tidak Bekerja'),
(19, 'Pensiunan'),
(20, 'PNS Selain (Guru dan Dokter/Bidan/Perawat)'),
(21, 'PNS'),
(22, 'TNI/POLRI'),
(23, 'Pegawai Swasta'),
(24, 'Wiraswasta'),
(25, 'Pengacara/Hakim/Jaksa/Notaris '),
(26, 'Seniman/Pelukis/Artis/Sejenis'),
(27, 'Dokter/Bidan/Perawat'),
(28, 'Pilot/Pramugara'),
(29, 'Pedagang'),
(30, 'Petani/Peternak'),
(31, 'Nelayan'),
(32, 'Buruh (Tani/Pabrik/Bangunan)'),
(33, 'Sopir/Masinis/Kondektur'),
(34, 'Politikus'),
(35, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(3, 'SD/Sederajat'),
(4, 'SMP/Sederajat'),
(5, 'SMA/Sederajat'),
(6, 'D1'),
(7, 'D2'),
(8, 'D3'),
(9, 'D4/S1'),
(10, 'S2'),
(11, 'S3'),
(12, 'Tidak Berpendidikan Formal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penghasilan`
--

CREATE TABLE `tbl_penghasilan` (
  `id_penghasilan` int(11) NOT NULL,
  `penghasilan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penghasilan`
--

INSERT INTO `tbl_penghasilan` (`id_penghasilan`, `penghasilan`) VALUES
(2, '< 500.000'),
(3, '500.000 - 1.000.000'),
(4, '1.000.000 - 2.000.000'),
(5, '2.000.000 - 3.000.000'),
(6, '3.000.000 - 5.000.000'),
(7, '> 5.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `no_pendaftaran` varchar(12) DEFAULT NULL,
  `tgl_pendaftaran` date DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `nisn` int(10) DEFAULT NULL,
  `telepon_siswa` varchar(12) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat_rumah` varchar(255) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `no_ortu` varchar(12) DEFAULT NULL,
  `sekolah_asal` varchar(255) DEFAULT NULL,
  `pas_photo` varchar(255) DEFAULT NULL,
  `status_pendaftaran` int(1) DEFAULT 0,
  `nilai_ujian` decimal(10,2) DEFAULT 0.00,
  `nilai_wawancara` decimal(10,2) DEFAULT 0.00,
  `nilai_praktik` decimal(10,2) DEFAULT 0.00,
  `nilai_akhir` decimal(10,2) DEFAULT 0.00,
  `status_ppdb` int(1) DEFAULT 0,
  `daftar_ulang` int(1) DEFAULT 0,
  `no_ktp_siswa` varchar(16) DEFAULT NULL,
  `anak_ke` varchar(50) DEFAULT NULL,
  `jml_saudara` varchar(50) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `hub_keluarga` varchar(255) DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `gol_darah` varchar(2) DEFAULT NULL,
  `kegemaran` varchar(50) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `tinggal_dgn` varchar(50) DEFAULT NULL,
  `jarak` varchar(50) DEFAULT NULL,
  `no_sttb` varchar(50) DEFAULT NULL,
  `lama_belajar` varchar(50) DEFAULT NULL,
  `no_un` varchar(50) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(255) DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `pendidikan_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `penghasilan_ayah` varchar(50) DEFAULT NULL,
  `alamat_ayah` varchar(255) DEFAULT NULL,
  `no_kk_ayah` int(16) DEFAULT NULL,
  `no_ktp_ayah` int(16) DEFAULT NULL,
  `no_hp_ayah` varchar(12) DEFAULT NULL,
  `status_ayah` varchar(50) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(255) DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `pendidikan_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` varchar(255) DEFAULT NULL,
  `alamat_ibu` varchar(255) DEFAULT NULL,
  `no_kk_ibu` int(16) DEFAULT NULL,
  `no_ktp_ibu` int(16) DEFAULT NULL,
  `no_hp_ibu` varchar(12) DEFAULT NULL,
  `status_ibu` varchar(25) DEFAULT NULL,
  `kartu_sosial` varchar(255) DEFAULT NULL,
  `no_kartu_sosial` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `tahun`, `no_pendaftaran`, `tgl_pendaftaran`, `nama_siswa`, `nisn`, `telepon_siswa`, `password`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat_rumah`, `nama_ayah`, `nama_ibu`, `no_ortu`, `sekolah_asal`, `pas_photo`, `status_pendaftaran`, `nilai_ujian`, `nilai_wawancara`, `nilai_praktik`, `nilai_akhir`, `status_ppdb`, `daftar_ulang`, `no_ktp_siswa`, `anak_ke`, `jml_saudara`, `status`, `kelas`, `hub_keluarga`, `agama`, `gol_darah`, `kegemaran`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `tinggal_dgn`, `jarak`, `no_sttb`, `lama_belajar`, `no_un`, `tempat_lahir_ayah`, `tgl_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `alamat_ayah`, `no_kk_ayah`, `no_ktp_ayah`, `no_hp_ayah`, `status_ayah`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `alamat_ibu`, `no_kk_ibu`, `no_ktp_ibu`, `no_hp_ibu`, `status_ibu`, `kartu_sosial`, `no_kartu_sosial`) VALUES
(117, 2020, '202212120001', '2022-12-12', 'Riski Hidayatullah', 1708107041, '081260741116', '$2y$10$jTyYaLIq4LRG0z6vygoPPulZ6Wpr/cutmS/NbqM8FJHrI9/LniymO', 'laki-laki', 'aceh besar', '2008-02-15', 'bukloh', 'saifuddinn', 'roslinawati', '081260741115', 'min bukloh', '1670900605_9d5485196ee41efa4f85.png', 1, '90.00', '90.00', '90.00', '90.00', 0, 1, '1254678908765645', '2', '1', 'Yatim', 'VII (Tujuh)', 'Anak Angkat', 'Islam', 'AB', 'Kesenian', 'Bukloh', 'Suka Makmur', 'Aceh Besar', 'Aceh', 'Orang Tua', '20 km', '12345', '3 tahun', '123456', 'suka makmur', '2011-06-15', 'SMP/Sederajat', 'Buruh (Tani/Pabrik/Bangunan)', '2.000.000 - 3.000.000', 'bUKLOH', 2147483647, 2147483647, '081260741115', 'Masih Hidup', 'Aceh Timur', '2016-07-04', 'SD/Sederajat', 'Pilot/Pramugara', '< 500.000', 'bukloh', 2147483647, 2147483647, '081256876655', 'Masih Hidup', '12345', '123'),
(121, 2021, '202212230001', '2022-12-23', 'Atika Fadhluna', 1708107046, '081260741115', '$2y$10$jIhNyCl9wcQL5tRskA9tsOx27tqSx/XUTiiAWsGjPxlGskx7c6izK', 'perempuan', 'aceh besar', '2008-04-07', 'Aceh', 'saifuddinn', 'roslinawati', '081260741115', 'min bukloh', '1671781421_6c42caee0cddd9f17217.jpeg', 1, '0.00', '0.00', '0.00', '0.00', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 2023, '202301030001', '2023-01-03', 'Andre Fitra', 1708107040, '081260743322', '$2y$10$pCaOqIHZQTiK1BFUO8i62ey1sLER9eC0YiSTIlMvreDilfIW9AZvS', 'laki-laki', 'Aceh Besar', '2008-01-01', 'Sibreh Keumude', 'Afrizal', 'Arnita', '081260732218', 'Min 34 Aceh Besar', '1672735747_bc654ce3021542f2f663.png', 1, '0.00', '0.00', '0.00', '0.00', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id_soal` int(5) NOT NULL,
  `tgl_dibuat` date DEFAULT NULL,
  `text_soal` text DEFAULT NULL,
  `opsi_a` text DEFAULT NULL,
  `opsi_b` text DEFAULT NULL,
  `opsi_c` text DEFAULT NULL,
  `opsi_d` text DEFAULT NULL,
  `kunci_jawaban` varchar(255) DEFAULT NULL,
  `bobot` int(3) NOT NULL DEFAULT 10,
  `tgl_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_soal`
--

INSERT INTO `tbl_soal` (`id_soal`, `tgl_dibuat`, `text_soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `kunci_jawaban`, `bobot`, `tgl_edit`) VALUES
(63, '2023-01-03', 'Sebuah pengembangan dari menggambar, biasanya memiliki keunikan atau ciri khas tersendiri merupakan pengertian dari ....', 'Seni Lukis', 'Seni Patung', 'Seni Kriya', 'Seni Rupa', 'A', 10, NULL),
(64, '2023-01-03', 'Kegiatan mengolah medium dua dimensi atau permukaan datar dari objek tiga dimensi untuk mendapat kesan tertentu adalah....', 'Lukisa', 'Gambar', 'Melukis', 'Menggambar', 'C', 10, NULL),
(65, '2023-01-03', 'Lukisan pemandangan memiliki tema hubungan manusia dengan ....', 'Alam Khayal', 'Aktivitasnya', 'Manusia Lain', 'Alam Sekitarnya', 'D', 10, NULL),
(66, '2023-01-03', 'Perwujudan gaya seni rupa menggunakan keadaan nyata pada kehidupan masyarakat dan gaya alam, adalah aliran ....', 'Aliran Seni Lukis', 'Aliran Representatif', 'Aliran Lukisan', 'Aliran Nonrepresentatif', 'B', 10, NULL),
(67, '2023-01-03', 'Patung adalah jenis karya seni rupa ....', '1 Dimensi', '2 Dimensi', '3 Dimensi', '4 Dimensi', 'C', 10, NULL),
(68, '2023-01-03', 'Menurut Mikke Susanto seni patung adalah ....', 'Semua karya dalam bentuk meruang', 'Benda tiruan , bentuk manusia dan hewan yang cara pembuatannya dengan dipahat', 'Karya tiga dimensi yang tidak terikat pada latar belakang apa pun atau bidang manapun pada suatu bangunan.', 'sebuah tipe karya tiga dimensi yang bentuknya dibuat dengan metode subtraktif (mengurangi bahan seperti memotong, menatah) atau adiktif (membuat model lebih dulu seperti mengecor dan mencetak)', 'D', 10, NULL),
(69, '2023-01-03', 'Patung diciptakan untuk memperingati suatu peristiwa yang bersejarah atau mengenang jasa seorang pahlawan besar dalam sebuah bangsa atau kelompok, fungsi patung sebagai ....', 'Fungsi dekorasi', 'Fungsi kesenian', 'Fungsi sosial', 'Fungsi religi', 'C', 10, NULL),
(70, '2023-01-03', 'Media dalam berkarya seni patung yang merupakan bahan lunak adalah ....', 'Kayu', 'Tanah Liat', 'Batu', 'Logam', 'B', 10, NULL),
(71, '2023-01-03', 'Berkarya seni patung dengan media kayu atau batu menggunakan alat palu merupakan teknik ....', 'Cetak', 'Butsir', 'Las', 'Pahat', 'D', 10, NULL),
(72, '2023-01-03', 'Pengucapan kata-kata pada lirik lagu harus dilakukan dengan benar dan jelas. Hal ini merupakan salah satu teknik vocal yaitu ....', 'Phrasering', 'Artikulasi', 'Resonansi', 'Intonasi', 'B', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ta`
--

CREATE TABLE `tbl_ta` (
  `id_ta` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `ta` varchar(25) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `kuota` varchar(3) DEFAULT NULL,
  `tanggal_mulai_pendaftaran` date DEFAULT NULL,
  `tanggal_selesai_pendaftaran` date DEFAULT NULL,
  `tanggal_pengumuman` date DEFAULT NULL,
  `tanggal_mulai_daftar_ulang` date DEFAULT NULL,
  `tanggal_selesai_daftar_ulang` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `kkm_kelulusan` int(3) DEFAULT 60
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ta`
--

INSERT INTO `tbl_ta` (`id_ta`, `tahun`, `ta`, `status`, `kuota`, `tanggal_mulai_pendaftaran`, `tanggal_selesai_pendaftaran`, `tanggal_pengumuman`, `tanggal_mulai_daftar_ulang`, `tanggal_selesai_daftar_ulang`, `time`, `kkm_kelulusan`) VALUES
(16, 2022, '2022/2023', 1, '150', '2022-12-25', '2023-01-06', '2023-01-02', '2023-01-03', '2023-01-07', NULL, 60),
(17, 2021, '2021/2022', 0, '200', '2022-11-14', '2022-11-15', '2022-11-16', '2022-11-17', '2022-11-18', NULL, 60);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ujian`
--

CREATE TABLE `tbl_ujian` (
  `id_ujian` int(11) NOT NULL,
  `nama_ujian` varchar(255) DEFAULT NULL,
  `jumlah_soal` int(11) DEFAULT NULL,
  `waktu_ujian` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `acak_soal` enum('acak','urut') DEFAULT NULL,
  `status` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ujian`
--

INSERT INTO `tbl_ujian` (`id_ujian`, `nama_ujian`, `jumlah_soal`, `waktu_ujian`, `tgl_mulai`, `tgl_selesai`, `acak_soal`, `status`) VALUES
(5, 'SOAL ACAK', 5, 5, '2023-01-02', '2023-01-07', 'acak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(12) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `telepon`, `password`, `foto`, `update_at`) VALUES
(22, 'Admin', 'atikaafadhluna@gmail.com', '081260741115', '$2y$10$wsh5x1cV2uLpVpLyUfz1te8X6IKeY1gVIva1a2crGvgOQiiERB2S2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web`
--

CREATE TABLE `tbl_web` (
  `id_setting` int(11) NOT NULL,
  `status_ujian` int(11) NOT NULL DEFAULT 0,
  `status_dformulir` int(11) NOT NULL DEFAULT 0,
  `nsm` varchar(255) DEFAULT NULL,
  `npsn` varchar(255) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `telepon_sekolah` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `nama_kepsek` varchar(255) DEFAULT NULL,
  `nip_kepsek` text DEFAULT NULL,
  `foto_kepsek` varchar(255) DEFAULT NULL,
  `logo_sekolah` varchar(255) DEFAULT NULL,
  `nama_ketua` varchar(255) DEFAULT NULL,
  `nip_ketua` text DEFAULT NULL,
  `ttd_ketua` varchar(255) DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `syarat_daftar` text DEFAULT NULL,
  `syarat_daftar_ulang` text DEFAULT NULL,
  `brosur` varchar(255) DEFAULT NULL,
  `keterangan_print` text DEFAULT NULL,
  `desc_daftar` text DEFAULT NULL,
  `gambar_daftar` varchar(255) DEFAULT NULL,
  `desc_login` text DEFAULT NULL,
  `gambar_login` varchar(255) DEFAULT NULL,
  `desc_formulir` text DEFAULT NULL,
  `gambar_formulir` varchar(255) DEFAULT NULL,
  `desc_download` text DEFAULT NULL,
  `gambar_download` varchar(255) DEFAULT NULL,
  `desc_ujian` text DEFAULT NULL,
  `gambar_ujian` varchar(255) DEFAULT NULL,
  `desc_pengumuman` text DEFAULT NULL,
  `gambar_pengumuman` varchar(255) DEFAULT NULL,
  `desc_daftar_ulang` text DEFAULT NULL,
  `gambar_daftar_ulang` varchar(255) DEFAULT NULL,
  `desc_berkas` text DEFAULT NULL,
  `gambar_berkas` varchar(255) DEFAULT NULL,
  `j_pengisian_formulir` text DEFAULT NULL,
  `j_ujian_ppdb` text DEFAULT NULL,
  `j_pengumuman_kelulusan` text DEFAULT NULL,
  `j_pendaftaran_ulang` text DEFAULT NULL,
  `j_mos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web`
--

INSERT INTO `tbl_web` (`id_setting`, `status_ujian`, `status_dformulir`, `nsm`, `npsn`, `nama_sekolah`, `alamat_lengkap`, `provinsi`, `kabupaten`, `kecamatan`, `telepon_sekolah`, `email`, `website`, `nama_kepsek`, `nip_kepsek`, `foto_kepsek`, `logo_sekolah`, `nama_ketua`, `nip_ketua`, `ttd_ketua`, `tahun_ajaran`, `syarat_daftar`, `syarat_daftar_ulang`, `brosur`, `keterangan_print`, `desc_daftar`, `gambar_daftar`, `desc_login`, `gambar_login`, `desc_formulir`, `gambar_formulir`, `desc_download`, `gambar_download`, `desc_ujian`, `gambar_ujian`, `desc_pengumuman`, `gambar_pengumuman`, `desc_daftar_ulang`, `gambar_daftar_ulang`, `desc_berkas`, `gambar_berkas`, `j_pengisian_formulir`, `j_ujian_ppdb`, `j_pengumuman_kelulusan`, `j_pendaftaran_ulang`, `j_mos`) VALUES
(1, 1, 1, '1234567', '000000', 'MTsN 4 Aceh Besar', 'Jl. Banda Aceh Medan KM 15 Lambaro Sibreh, Kec.Suka Makmur Aceh Besar - 23361, Indonesia', 'Aceh', 'Aceh Besar', 'Suka Makmur', '081260741115', 'mtsn4acehbesar@gmail.com', 'http://www.mtsn4acehbesar.sch.id', 'Maimun', '160912345785', '1669365895_fc7dc1289c53020e94bc.jpg', '1666700135_5ab71c4ec44865048157.png', 'Atika Fadhluna', '1233444444', '1656638812_b8d82ade847519003b45.png', '2022/2023', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <p><span style=\"font-family: Poppins;\">1. Mengisi Formulir Pendaftaran (pada website PPDB MTsN 4 Aceh Besar)</span><br><p>2. Scan Foto Akte Kelahiran (upload pada saat pengisian formulir)<br>3. Pas Photo 3x4 layar biru (upload pada saat pengisian formulir)</p></p><h5 style=\"margin-top:0cm\"><span lang=\"IN\"><blockquote><pre><p><span style=\"font-family: Poppins;\">﻿</span></p><p></p></pre><p></p></blockquote></span><o:p></o:p></h5>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', '                                                                                                                                                                                                                                                            <blockquote><p></p><p><span style=\"font-family: Poppins;\"><span style=\"font-family: Poppins;\"><span style=\"font-family: Poppins;\">1. Mengisi Form Daftar Ulang (pada website ppdb MTsN 4 Aceh Besar)     </span><br></span></span><span style=\"font-family: Poppins;\">2. Mempersiapkan Berkas-berkas berikut :<font color=\"#9c9c94\"> </font><font color=\"#000000\">(berkas diberikan kepada panitia)</font></span></p><p></p><p></p><p></p><p></p><ul><li><span style=\"font-family: Poppins;\">Foto copy raport sem. ganjil kelas VI <b>(1 lbr)</b></span></li><li><span style=\"font-family: Poppins;\">Foto copy NISN <b>(1 lbr)</b></span></li><li><span style=\"font-family: Poppins;\">Foto copy kartu keluarga <b>(1 lbr)</b></span></li><li><span style=\"font-family: Poppins;\">Foto copy KTP (Bapak/Ibu) <b>(1 lbr)</b></span></li><li><span style=\"font-family: Poppins;\">Foto copy kartu sosial <b>(1 lbr)</b></span></li><li><span style=\"font-family: Poppins;\">Pas photo 3 X 4 hitam putih <b>(5 lbr)</b></span></li></ul></blockquote>                                                                                                                                                                                                                                ', '1669365668_b2c5f35c95a0e55972b3.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <p>                                                                                                                                                                                                                                                                                                                                    <b style=\"color: rgb(0, 0, 0); font-family: Calibri; font-size: medium;\"><u>Catatan :</u></b></p><p><span style=\"font-family: Calibri; font-size: medium;\"><font color=\"#000000\" style=\"\">1. Ujian PPDB dilakukan pada tanggal 30 Maret 2023, Pukul 08.00 wib. s.d Selesai.</font></span></p><p><span style=\"font-family: Calibri; font-size: medium;\"><font color=\"#000000\" style=\"\">2. Peserta harus sudah hadir ditempat tes (MTsN 4 Aceh Besar) Pukul 07.30 wib.</font></span></p><p><span style=\"font-family: Calibri; font-size: medium;\"><font color=\"#000000\" style=\"\">3. Formulir pendaftaran harus dibawa pada waktu mengikuti ujian PPDB</font></span></p><p><span style=\"font-family: Calibri; font-size: medium;\"><font color=\"#000000\" style=\"\">4. Menggunakan baju seragam MI/SD</font></span></p><pre><span style=\"font-family: Calibri; font-size: medium;\"><font color=\"#636363\">*formulir pendaftaran dapat didownload pada website PPDB MTsN 4 Aceh Besar</font></span></pre>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', '<strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '1670577129_d80341a8939ad97553e5.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1669475455_0fd75dda78654149d855.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1669475461_9329e4049f7f906b239f.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1669475467_d38c3d9e14f00fbbb588.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1669475475_4431baec2c71628812a8.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1669475480_306c8d9fd310c5ac25e5.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1669475487_9322296d02cffbf937c9.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1669475492_5f6b60355796a778f009.png', '                                                                                                            <p>Tanggal :  07 Maret s/d 28 Maret 2022</p><p>Tempat : Website PPDB MTsN 4 Aceh Besar</p>                                                                                                ', '                                                                        <p>Tanggal :  30 Maret 2022<br></p><p>Tempat : Website PPDB MTsN 4 Aceh Besar<br></p>                                                                ', '                                                                        <p>Tanggal :  01 April 2022</p><p>Tempat : Website PPDB MTsN 4 Aceh Besar<br></p>                                                                ', '                                    <p>                                    Tanggal :  11 s/d 14 April 2022</p><p>Tempat : Website PPDB MTsN 4 Aceh Besar<br></p><p>                                </p>                                ', '                                    <p>                                    Tanggal : 11 Mei 2022</p><p>Tempat :  MTsN 4 Aceh Besar<br></p><p>                                                                                                                                                                        </p>                                ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tbl_hasilujian`
--
ALTER TABLE `tbl_hasilujian`
  ADD PRIMARY KEY (`id_hasilujian`);

--
-- Indexes for table `tbl_kegemaran`
--
ALTER TABLE `tbl_kegemaran`
  ADD PRIMARY KEY (`id_kegemaran`);

--
-- Indexes for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  ADD PRIMARY KEY (`id_panitia`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tbl_penghasilan`
--
ALTER TABLE `tbl_penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tbl_ta`
--
ALTER TABLE `tbl_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_web`
--
ALTER TABLE `tbl_web`
  ADD PRIMARY KEY (`id_setting`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_hasilujian`
--
ALTER TABLE `tbl_hasilujian`
  MODIFY `id_hasilujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_kegemaran`
--
ALTER TABLE `tbl_kegemaran`
  MODIFY `id_kegemaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  MODIFY `id_panitia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `id_pekerjaan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_penghasilan`
--
ALTER TABLE `tbl_penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_ta`
--
ALTER TABLE `tbl_ta`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_web`
--
ALTER TABLE `tbl_web`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
