-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 01:20 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lingga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggaljam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `tanggaljam`) VALUES
(1, 'admin', '$2y$10$O64AF56MxBLaWsIZS2Lqp.2Hdfw0Rxua5EAt8RkLqn2n1O5h/jS0u', 'ahmadyahya@bookcircle.id', '2019-07-07 17:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `angket`
--

CREATE TABLE `angket` (
  `id_angket` int(11) NOT NULL,
  `soal` text NOT NULL,
  `bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angket`
--

INSERT INTO `angket` (`id_angket`, `soal`, `bidang`) VALUES
(1, 'Saya merasa belum disiplin dalam beribadah pada Tuhan YME', 'pribadi'),
(2, 'Saya kadang-kadang berperilaku dan bertutur kata tidak jujur', 'pribadi'),
(3, 'Saya kadang-kadang masih suka menyontek pada waktu tes', 'pribadi'),
(4, 'Saya merasa belum bisa mengendalikan emosi dengan baik', 'pribadi'),
(5, 'Saya belum paham tentang sikap dan perilaku asertif', 'pribadi'),
(6, 'Saya belum tahu cara mengenal dan memahami diri sendiri', 'pribadi'),
(7, 'Saya belum memahami potensi diri', 'pribadi'),
(8, 'Saya belum tahu perubahan dan permasalahan yang terjadi pada masa remaja', 'pribadi'),
(9, 'Saya belum mengenal tentang macam-macam kepribadian ', 'pribadi'),
(10, 'Saya kurang memiliki rasa percaya diri', 'pribadi'),
(11, 'Saya kadang kurang menjaga kesehatan diri', 'pribadi'),
(12, 'Saya belum tahu ciri-ciri/sifat/prilaku pribadi yang berkarakter', 'pribadi'),
(13, 'Saya merasa kurang memilki tanggung jawab  pada diri sendiri', 'pribadi'),
(14, 'Saya kesulitan mengatur waktu belajar dan bermain  ', 'pribadi'),
(15, 'Kondisi orang tua saya sedang tidak harmonis', 'pribadi'),
(16, 'Saya merasa tidak betah tinggal di rumah sendiri', 'pribadi'),
(17, 'Saya mempunyai masalah dengan anggota keluarga di rumah', 'pribadi'),
(18, 'Saya  belum bisa menjadi pribadi yang mandiri', 'pribadi'),
(19, 'Saya sedang memiliki konflik pribadi', 'pribadi'),
(20, 'Saya belum memahami tentang norma/cara membangun  berkeluarga', 'pribadi'),
(21, 'Saya belum banyak mengenal lingkungan sekolah baru', 'sosial'),
(22, 'Saya belum memahami tentang kenakalan remaja', 'sosial'),
(23, 'Saya masih sedikit mengetahui tentang dampak atau bahaya rokok', 'sosial'),
(24, 'Saya belum banyak mengenal tentang perilaku sosial yang bertanggung jawab', 'sosial'),
(25, 'Saya belum tahu tentang bullying dan cara mensikapinya', 'sosial'),
(26, 'Saya sukar bergaul dengan teman-teman di sekolah', 'sosial'),
(27, 'Sering saya dianggap tidak sopan pada orang lain', 'sosial'),
(28, 'Saya kurang memahami dampak dari media sosial', 'sosial'),
(29, 'Saya jarang bermain/berteman di lingkungan tempat saya tinggal', 'sosial'),
(30, 'Saya belum banyak teman atau sahabat', 'sosial'),
(31, 'Saya kurang suka  berkomunikasi dengan teman lawan jenis', 'sosial'),
(32, 'Saya belum tahu cara belajar yang baik dan benar di SMK/MAK', 'sosial'),
(33, 'Saya belum tahu cara meraih prestasi di sekolah', 'sosial'),
(34, 'Saya belum paham tentang gaya belajar dan strategi yang sesuai dengannya', 'sosial'),
(35, 'Orang tua saya tidak peduli dengan kegiatan belajar saya', 'sosial'),
(36, 'Saya masih sering menunda-nunda tugas sekolah/pekerjaan rumah (PR)  ', 'sosial'),
(37, 'Saya merasa kesulitan dalam memahami pelajaran tertentu', 'sosial'),
(38, 'Saya belum tahu cara memanfaatkan sumber belajar', 'sosial'),
(39, 'Saya belajarnya jika akan ada tes  atau ujian saja', 'sosial'),
(40, 'Saya belum tahu tentang struktur kurikulum yang ada di sekolah', 'sosial'),
(41, 'Saya merasa malas belajar dan kalau belajar sering ngantuk', 'sosial'),
(42, 'Saya belum terbiasa belajar bersama atau belajar kelompok', 'sosial'),
(43, 'Saya belum paham cara memilih lembaga bimbingan belajar yang baik', 'sosial'),
(44, 'Saya belum dapat memanfaatkan teknologi informasi untuk belajar', 'sosial'),
(45, 'Saya belum tahu cara memperoleh bantuan pendidikan (beasiswa)', 'sosial'),
(46, 'Saya terpaksa harus bekerja untuk mencukupi kebutuhan hidup', 'sosial'),
(47, 'Saya merasa bingung memilih kegiatan esktrakurikuler di sekolah', 'sosial'),
(48, 'Saya merasa belum mantap pada pilihan peminatan yang diambil', 'sosial'),
(49, 'Saya merasa belum paham hubungan antara hobi, bakat, minat, kemampuan dan karir', 'sosial'),
(50, 'Saya belum memiliki perencanaan karir masa depan', 'sosial');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `guru` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `guru`, `username`, `password`, `email`, `nohp`) VALUES
(1, 'ahmad yahya asy-syidqie', 'gurubk', '$2y$10$yrL3U3zGBn93QdtPQC9el.XTjIVnzv1wK2TBW9KEiIHLvOlmGFvaa', 'ahmadyahya@bookcircle.id', '0898647688050');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `profil` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `profil`, `visi`, `misi`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'maju, mundur, kanan, kiri, atas, bawah.dgdvsdvsdvsd', '<ol>	<li>ajsvajsoasgnolas</li>	<li>asgjbdogjflgkf</li>	<li>dfhbdfbdf</li>	<li>dfbdfbdbd</li></ol>');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` int(15) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `username`, `password`, `nis`, `ttl`, `alamat`, `email`, `telp`, `kelas`, `jurusan`, `tahun`) VALUES
(7, 'lingga', 'lingga', '$2y$10$lgKBlDeZGXSJm95RN89XnOXWeU2S7sYYyfzRKyS1wZQ', '', '', '', '', 0, '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `angket`
--
ALTER TABLE `angket`
  ADD PRIMARY KEY (`id_angket`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `angket`
--
ALTER TABLE `angket`
  MODIFY `id_angket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
