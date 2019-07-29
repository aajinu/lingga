-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 10:27 PM
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
(32, 'Saya belum tahu cara belajar yang baik dan benar di SMK/MAK', 'belajar'),
(33, 'Saya belum tahu cara meraih prestasi di sekolah', 'belajar'),
(34, 'Saya belum paham tentang gaya belajar dan strategi yang sesuai dengannya', 'belajar'),
(35, 'Orang tua saya tidak peduli dengan kegiatan belajar saya', 'belajar'),
(36, 'Saya masih sering menunda-nunda tugas sekolah/pekerjaan rumah (PR)  ', 'belajar'),
(37, 'Saya merasa kesulitan dalam memahami pelajaran tertentu', 'belajar'),
(38, 'Saya belum tahu cara memanfaatkan sumber belajar', 'belajar'),
(39, 'Saya belajarnya jika akan ada tes  atau ujian saja', 'belajar'),
(40, 'Saya belum tahu tentang struktur kurikulum yang ada di sekolah', 'belajar'),
(41, 'Saya merasa malas belajar dan kalau belajar sering ngantuk', 'belajar'),
(42, 'Saya belum terbiasa belajar bersama atau belajar kelompok', 'belajar'),
(43, 'Saya belum paham cara memilih lembaga bimbingan belajar yang baik', 'belajar'),
(44, 'Saya belum dapat memanfaatkan teknologi informasi untuk belajar', 'belajar'),
(45, 'Saya belum tahu cara memperoleh bantuan pendidikan (beasiswa)', 'karir'),
(46, 'Saya terpaksa harus bekerja untuk mencukupi kebutuhan hidup', 'karir'),
(47, 'Saya merasa bingung memilih kegiatan esktrakurikuler di sekolah', 'karir'),
(48, 'Saya merasa belum mantap pada pilihan peminatan yang diambil', 'karir'),
(49, 'Saya merasa belum paham hubungan antara hobi, bakat, minat, kemampuan dan karir', 'karir'),
(50, 'Saya belum memiliki perencanaan karir masa depan', 'karir');

-- --------------------------------------------------------

--
-- Table structure for table `angket_pilihan`
--

CREATE TABLE `angket_pilihan` (
  `id_pilihan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_angket` int(11) NOT NULL,
  `pilihan` int(1) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `tanggaljam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angket_pilihan`
--

INSERT INTO `angket_pilihan` (`id_pilihan`, `id_siswa`, `id_angket`, `pilihan`, `bidang`, `tanggaljam`) VALUES
(1, 12, 1, 0, 'pribadi', '2019-07-29 22:11:29'),
(2, 12, 2, 0, 'pribadi', '2019-07-29 22:11:29'),
(3, 12, 3, 0, 'pribadi', '2019-07-29 22:11:29'),
(4, 12, 4, 1, 'pribadi', '2019-07-29 22:11:29'),
(5, 12, 5, 0, 'pribadi', '2019-07-29 22:11:29'),
(6, 12, 6, 0, 'pribadi', '2019-07-29 22:11:29'),
(7, 12, 7, 0, 'pribadi', '2019-07-29 22:11:29'),
(8, 12, 8, 1, 'pribadi', '2019-07-29 22:11:29'),
(9, 12, 9, 0, 'pribadi', '2019-07-29 22:11:29'),
(10, 12, 10, 0, 'pribadi', '2019-07-29 22:11:29'),
(11, 12, 11, 1, 'pribadi', '2019-07-29 22:11:29'),
(12, 12, 12, 0, 'pribadi', '2019-07-29 22:11:29'),
(13, 12, 13, 0, 'pribadi', '2019-07-29 22:11:29'),
(14, 12, 14, 1, 'pribadi', '2019-07-29 22:11:29'),
(15, 12, 15, 0, 'pribadi', '2019-07-29 22:11:29'),
(16, 12, 16, 0, 'pribadi', '2019-07-29 22:11:29'),
(17, 12, 17, 0, 'pribadi', '2019-07-29 22:11:29'),
(18, 12, 18, 0, 'pribadi', '2019-07-29 22:11:29'),
(19, 12, 19, 0, 'pribadi', '2019-07-29 22:11:29'),
(20, 12, 20, 0, 'pribadi', '2019-07-29 22:11:29'),
(21, 12, 21, 0, 'sosial', '2019-07-29 22:11:40'),
(22, 12, 22, 0, 'sosial', '2019-07-29 22:11:40'),
(23, 12, 23, 1, 'sosial', '2019-07-29 22:11:40'),
(24, 12, 24, 0, 'sosial', '2019-07-29 22:11:40'),
(25, 12, 25, 0, 'sosial', '2019-07-29 22:11:40'),
(26, 12, 26, 1, 'sosial', '2019-07-29 22:11:40'),
(27, 12, 27, 0, 'sosial', '2019-07-29 22:11:40'),
(28, 12, 28, 0, 'sosial', '2019-07-29 22:11:40'),
(29, 12, 29, 0, 'sosial', '2019-07-29 22:11:40'),
(30, 12, 30, 0, 'sosial', '2019-07-29 22:11:40'),
(31, 12, 31, 0, 'sosial', '2019-07-29 22:11:40'),
(32, 12, 32, 0, 'belajar', '2019-07-29 22:11:50'),
(33, 12, 33, 0, 'belajar', '2019-07-29 22:11:50'),
(34, 12, 34, 0, 'belajar', '2019-07-29 22:11:50'),
(35, 12, 35, 1, 'belajar', '2019-07-29 22:11:50'),
(36, 12, 36, 0, 'belajar', '2019-07-29 22:11:50'),
(37, 12, 37, 0, 'belajar', '2019-07-29 22:11:50'),
(38, 12, 38, 0, 'belajar', '2019-07-29 22:11:50'),
(39, 12, 39, 0, 'belajar', '2019-07-29 22:11:50'),
(40, 12, 40, 0, 'belajar', '2019-07-29 22:11:50'),
(41, 12, 41, 0, 'belajar', '2019-07-29 22:11:50'),
(42, 12, 42, 0, 'belajar', '2019-07-29 22:11:50'),
(43, 12, 43, 0, 'belajar', '2019-07-29 22:11:50'),
(44, 12, 44, 0, 'belajar', '2019-07-29 22:11:50'),
(45, 12, 45, 0, 'karir', '2019-07-29 22:11:59'),
(46, 12, 46, 0, 'karir', '2019-07-29 22:11:59'),
(47, 12, 47, 0, 'karir', '2019-07-29 22:11:59'),
(48, 12, 48, 0, 'karir', '2019-07-29 22:11:59'),
(49, 12, 49, 0, 'karir', '2019-07-29 22:11:59'),
(50, 12, 50, 0, 'karir', '2019-07-29 22:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` int(50) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `ttl` text NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `nip`, `jk`, `ttl`, `alamat`, `agama`, `username`, `password`, `email`, `telp`) VALUES
(3, 'Romlah', 19610108, 'p', 'Cilacap, 4 Mei 1997', 'Jl. Abimanyu', 'islam', 'aa', '$2y$10$yVlNNR8VjUp/CK4ZnskhwOBQzybRTr2ohBpngJRj/z/dptA2W5to6', 'zuffahf@gmail.com', '6345342'),
(4, 'yaqie', 918203, 'l', 'banyumas, 4 juli 1997', 'purwokerto', 'islam', 'yaqie', '$2y$10$l4alRcwpaj6MM2f0DXGM5eQ06o74GHMCxFY.Sgm7zTM9UAmdr/w2u', 'ahmadyahyay@gmail.com', '0895357948031');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `jurusan`) VALUES
(1, '17GB1', 'Teknik Gambar Bangunan');

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
  `password` varchar(100) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `ttl` text NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` int(15) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `nilai1` varchar(10) NOT NULL,
  `nilai2` varchar(10) NOT NULL,
  `nilai3` varchar(10) NOT NULL,
  `nilai4` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `username`, `password`, `nis`, `ttl`, `alamat`, `email`, `telp`, `kelas`, `jurusan`, `jk`, `agama`, `tahun`, `nilai1`, `nilai2`, `nilai3`, `nilai4`) VALUES
(11, 'zako', 'zaki', '$2y$10$hyJwAyhcsL1Gg8aU1btxwOXmRkK7gTW3CMWAd3aDs/TaIWAl7WB0W', '124134', 'Cilacap, 4 Mei 1997', 'JL. adbakjs', 'zaki@gmail.com', 6345342, '1TGB1', 'Teknik Gambar Bangunan', 'p', 'kristen', '2019', '', '', '', ''),
(12, 'yahya', 'yaqie', '$2y$10$1AujiDtLzYrdGTMVRMdrz.rk4ufNp4rb.Jj/LkuOpKtDrKv.WF3F.', '8172937912', 'jaks dkjnwaksdkasd', 'purwokerto', 'ahmadyahyay@gmail.com', 2147483647, '17GB1', 'Teknik Gambar Bangunan', 'l', 'islam', '2019', '0.5904', '0.36', '0.2', '0'),
(13, 'lingga yaqie', 'lingga', '$2y$10$mcH/0KF.v.FN63JsdUyQEOxg27RajKGQ.QclkE9M6bcVU0f.5ZGRy', '1234', 'banyumas, 4 juli 1997', 'purwokertoo', 'lingga@gmail.com', 2147483647, '', '', 'p', 'katolik', '', '', '', '', '');

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
-- Indexes for table `angket_pilihan`
--
ALTER TABLE `angket_pilihan`
  ADD PRIMARY KEY (`id_pilihan`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

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
-- AUTO_INCREMENT for table `angket_pilihan`
--
ALTER TABLE `angket_pilihan`
  MODIFY `id_pilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
