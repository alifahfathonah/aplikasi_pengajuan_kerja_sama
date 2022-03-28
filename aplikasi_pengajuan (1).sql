-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 01:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_pengajuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bentuk_perjanjian`
--

CREATE TABLE `bentuk_perjanjian` (
  `id_bentuk_perjanjian` int(11) NOT NULL,
  `bentuk_perjanjian` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bentuk_perjanjian`
--

INSERT INTO `bentuk_perjanjian` (`id_bentuk_perjanjian`, `bentuk_perjanjian`) VALUES
(1, 'MOU'),
(2, 'PKS');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengajuan`
--

CREATE TABLE `data_pengajuan` (
  `id_data_pengajuan` int(11) NOT NULL,
  `no_pengajuan` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_bentuk_perjanjian` int(11) NOT NULL,
  `id_jenis_pengajuan` int(11) NOT NULL,
  `file_data_pengajuan` varchar(250) NOT NULL,
  `id_negara_asal_pengajuan` int(11) NOT NULL,
  `id_status_pengajuan` int(11) NOT NULL,
  `id_kategori_kerjasama` int(11) NOT NULL,
  `id_user_pengirim` int(11) NOT NULL,
  `id_user_penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pengajuan`
--

INSERT INTO `data_pengajuan` (`id_data_pengajuan`, `no_pengajuan`, `keterangan`, `id_bentuk_perjanjian`, `id_jenis_pengajuan`, `file_data_pengajuan`, `id_negara_asal_pengajuan`, `id_status_pengajuan`, `id_kategori_kerjasama`, `id_user_pengirim`, `id_user_penerima`) VALUES
(5, '127812', 'Bagus', 1, 1, '5505741d3820aff8e4dda623519af069.pdf', 1, 4, 3, 4, 3),
(6, '162712', 'Bagus', 2, 2, 'f9f6b6c3f8aabc51944fcf30c785a7d9.pdf', 1, 2, 2, 4, 3),
(8, '72187182', 'Bagus', 1, 1, '4e3f0d23f1be9c80377f6773881be78c.pdf', 1, 1, 1, 3, 5),
(9, '781718271', 'Bagus', 1, 1, '2d6f05069db9e62c6e6e4936a0e847cf.pdf', 1, 2, 1, 4, 3),
(10, '1827187281', 'bagus', 1, 1, '84f40ca1642fa1070001eda2077b07c7.pdf', 1, 1, 1, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `evaluasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluasi`
--

INSERT INTO `evaluasi` (`id_evaluasi`, `evaluasi`) VALUES
(1, 'Perpanjang'),
(2, 'Tidak Perpanjang');

-- --------------------------------------------------------

--
-- Table structure for table `implementasi_kerja_sama`
--

CREATE TABLE `implementasi_kerja_sama` (
  `id_implementasi_kerja_sama` int(11) NOT NULL,
  `tanggal_dimulai` date DEFAULT NULL,
  `tanggal_berakhir` date NOT NULL,
  `id_lembaga_mitra` int(100) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_bentuk_perjanjian` int(11) NOT NULL,
  `file_implementasi_kerja_sama` varchar(250) NOT NULL,
  `id_kategori_kerja_sama` int(11) NOT NULL,
  `id_masa_berlaku` int(11) NOT NULL,
  `id_evaluasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `implementasi_kerja_sama`
--

INSERT INTO `implementasi_kerja_sama` (`id_implementasi_kerja_sama`, `tanggal_dimulai`, `tanggal_berakhir`, `id_lembaga_mitra`, `keterangan`, `id_bentuk_perjanjian`, `file_implementasi_kerja_sama`, `id_kategori_kerja_sama`, `id_masa_berlaku`, `id_evaluasi`) VALUES
(3, '2022-01-04', '2022-01-23', 3, 'Bagus', 1, '5462929db201a15aaf6d2d3400b66773.pdf', 1, 1, 1),
(4, '2022-03-01', '2022-03-23', 5, 'bagus', 1, '2841c0e2bd3a8a09d016cfa90c4e88611.pdf', 1, 1, 1),
(5, '2022-03-16', '2022-03-31', 3, 'bagus', 1, '17b38fc02fd7e92f3edeb6318e3066d8.pdf', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengajuan`
--

CREATE TABLE `jenis_pengajuan` (
  `id_jenis_pengajuan` int(11) NOT NULL,
  `jenis_pengajuan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pengajuan`
--

INSERT INTO `jenis_pengajuan` (`id_jenis_pengajuan`, `jenis_pengajuan`) VALUES
(1, 'Nasional'),
(2, 'Internasional');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kerja_sama`
--

CREATE TABLE `kategori_kerja_sama` (
  `id_kategori_kerja_sama` int(11) NOT NULL,
  `nama_kategori_kerja_sama` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_kerja_sama`
--

INSERT INTO `kategori_kerja_sama` (`id_kategori_kerja_sama`, `nama_kategori_kerja_sama`) VALUES
(1, 'Pendidikan'),
(2, 'Penelitian'),
(3, 'Pengabdian');

-- --------------------------------------------------------

--
-- Table structure for table `kerja_sama_eksternal`
--

CREATE TABLE `kerja_sama_eksternal` (
  `id_kerja_sama_eksternal` int(100) NOT NULL,
  `no_usulan` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_lembaga_mitra` varchar(250) NOT NULL,
  `id_pengusul` int(11) NOT NULL,
  `id_status_kerja_sama` int(11) NOT NULL,
  `file_kerja_sama_eksternal` varchar(250) NOT NULL,
  `id_kategori_kerja_sama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kerja_sama_eksternal`
--

INSERT INTO `kerja_sama_eksternal` (`id_kerja_sama_eksternal`, `no_usulan`, `keterangan`, `id_lembaga_mitra`, `id_pengusul`, `id_status_kerja_sama`, `file_kerja_sama_eksternal`, `id_kategori_kerja_sama`) VALUES
(17, '192182', 'Bagus', '3', 4, 2, '0b959fb78f0fb7ec3a31d6bf13db00e8.pdf', 1),
(18, '128178', 'Bagus', '3', 3, 1, 'e825ceea3b59c56d0fcaddb62cc139e91.pdf', 3),
(19, '172817', 'Bagus', '3', 3, 1, 'a29ef4510b284567b939e2cb137f0f23.pdf', 1),
(20, '123', 'Bagus', '3', 5, 1, '4cdc245acfc28747b389cf14b02a0b61.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kerja_sama_internal`
--

CREATE TABLE `kerja_sama_internal` (
  `id_kerja_sama_internal` int(100) NOT NULL,
  `no_usulan` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_lembaga_mitra` int(11) NOT NULL,
  `id_pengusul` int(11) NOT NULL,
  `id_status_kerja_sama` int(11) NOT NULL,
  `file_kerja_sama_internal` varchar(250) NOT NULL,
  `id_kategori_kerja_sama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kerja_sama_internal`
--

INSERT INTO `kerja_sama_internal` (`id_kerja_sama_internal`, `no_usulan`, `keterangan`, `id_lembaga_mitra`, `id_pengusul`, `id_status_kerja_sama`, `file_kerja_sama_internal`, `id_kategori_kerja_sama`) VALUES
(6, '1982881', 'Bagus', 3, 3, 2, '5ab9b5c20555bd80c05e15275514aec8.pdf', 1),
(7, '12781728', 'Bagus', 3, 3, 1, 'aa6da11ea8a67431b36eacf529a32707.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `masa_berlaku`
--

CREATE TABLE `masa_berlaku` (
  `id_masa_berlaku` int(11) NOT NULL,
  `masa_berlaku` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masa_berlaku`
--

INSERT INTO `masa_berlaku` (`id_masa_berlaku`, `masa_berlaku`) VALUES
(1, 'Belum Diverifikasi'),
(2, 'Sedang Berlangsung'),
(3, 'Telah Berakhir');

-- --------------------------------------------------------

--
-- Table structure for table `negara_asal_pengajuan`
--

CREATE TABLE `negara_asal_pengajuan` (
  `id_negara_pengajuan` int(11) NOT NULL,
  `negara_pengajuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `negara_asal_pengajuan`
--

INSERT INTO `negara_asal_pengajuan` (`id_negara_pengajuan`, `negara_pengajuan`) VALUES
(1, 'Indonesia'),
(2, 'Malaysia'),
(3, 'Singapura'),
(4, 'Thailand');

-- --------------------------------------------------------

--
-- Table structure for table `status_kerja_sama`
--

CREATE TABLE `status_kerja_sama` (
  `id_status_kerja_sama` int(11) NOT NULL,
  `status_kerja_sama` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_kerja_sama`
--

INSERT INTO `status_kerja_sama` (`id_status_kerja_sama`, `status_kerja_sama`) VALUES
(1, 'Sedang Berlangsung'),
(2, 'Sudah Berakhir'),
(3, 'Akan Berakhir');

-- --------------------------------------------------------

--
-- Table structure for table `status_pengajuan`
--

CREATE TABLE `status_pengajuan` (
  `id_status_pengajuan` int(11) NOT NULL,
  `status_pengajuan` varchar(250) NOT NULL,
  `keterangan_pengajuan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pengajuan`
--

INSERT INTO `status_pengajuan` (`id_status_pengajuan`, `status_pengajuan`, `keterangan_pengajuan`) VALUES
(1, 'Diterima Oleh Admin', NULL),
(2, 'Belum Dibaca Oleh Admin', NULL),
(4, 'Diterima Kepala Biro', NULL),
(5, 'Diterima Wakil Rektor', NULL),
(6, 'Disetujui Rektor', NULL),
(7, 'Tidak Diterima(Revisi)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `nama_mitra` varchar(250) NOT NULL,
  `no_hp` varchar(250) NOT NULL,
  `alamat_mitra` varchar(250) NOT NULL,
  `id_user_level` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `nama_mitra`, `no_hp`, `alamat_mitra`, `id_user_level`) VALUES
(3, 'admin', 'admin', 'taufiiqulhakim23@gmail.com', 'UIGM', '0812781728', '', 1),
(4, 'mitra', 'mitra', 'wahyu@gmail.com', 'Universitas Bina Darma', '0816271627', '', 2),
(5, 'mitra unsri', '123', 'mitra_unsri@gmail.com', 'Universitas Sriwijaya', '0821762716266', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(100) NOT NULL,
  `user_level` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bentuk_perjanjian`
--
ALTER TABLE `bentuk_perjanjian`
  ADD PRIMARY KEY (`id_bentuk_perjanjian`);

--
-- Indexes for table `data_pengajuan`
--
ALTER TABLE `data_pengajuan`
  ADD PRIMARY KEY (`id_data_pengajuan`);

--
-- Indexes for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`);

--
-- Indexes for table `implementasi_kerja_sama`
--
ALTER TABLE `implementasi_kerja_sama`
  ADD PRIMARY KEY (`id_implementasi_kerja_sama`);

--
-- Indexes for table `jenis_pengajuan`
--
ALTER TABLE `jenis_pengajuan`
  ADD PRIMARY KEY (`id_jenis_pengajuan`);

--
-- Indexes for table `kategori_kerja_sama`
--
ALTER TABLE `kategori_kerja_sama`
  ADD PRIMARY KEY (`id_kategori_kerja_sama`);

--
-- Indexes for table `kerja_sama_eksternal`
--
ALTER TABLE `kerja_sama_eksternal`
  ADD PRIMARY KEY (`id_kerja_sama_eksternal`);

--
-- Indexes for table `kerja_sama_internal`
--
ALTER TABLE `kerja_sama_internal`
  ADD PRIMARY KEY (`id_kerja_sama_internal`);

--
-- Indexes for table `masa_berlaku`
--
ALTER TABLE `masa_berlaku`
  ADD PRIMARY KEY (`id_masa_berlaku`);

--
-- Indexes for table `negara_asal_pengajuan`
--
ALTER TABLE `negara_asal_pengajuan`
  ADD PRIMARY KEY (`id_negara_pengajuan`);

--
-- Indexes for table `status_kerja_sama`
--
ALTER TABLE `status_kerja_sama`
  ADD PRIMARY KEY (`id_status_kerja_sama`);

--
-- Indexes for table `status_pengajuan`
--
ALTER TABLE `status_pengajuan`
  ADD PRIMARY KEY (`id_status_pengajuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bentuk_perjanjian`
--
ALTER TABLE `bentuk_perjanjian`
  MODIFY `id_bentuk_perjanjian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_pengajuan`
--
ALTER TABLE `data_pengajuan`
  MODIFY `id_data_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `implementasi_kerja_sama`
--
ALTER TABLE `implementasi_kerja_sama`
  MODIFY `id_implementasi_kerja_sama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_pengajuan`
--
ALTER TABLE `jenis_pengajuan`
  MODIFY `id_jenis_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_kerja_sama`
--
ALTER TABLE `kategori_kerja_sama`
  MODIFY `id_kategori_kerja_sama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kerja_sama_eksternal`
--
ALTER TABLE `kerja_sama_eksternal`
  MODIFY `id_kerja_sama_eksternal` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kerja_sama_internal`
--
ALTER TABLE `kerja_sama_internal`
  MODIFY `id_kerja_sama_internal` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `masa_berlaku`
--
ALTER TABLE `masa_berlaku`
  MODIFY `id_masa_berlaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `negara_asal_pengajuan`
--
ALTER TABLE `negara_asal_pengajuan`
  MODIFY `id_negara_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_kerja_sama`
--
ALTER TABLE `status_kerja_sama`
  MODIFY `id_status_kerja_sama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_pengajuan`
--
ALTER TABLE `status_pengajuan`
  MODIFY `id_status_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
