-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2024 pada 08.18
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpbd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `id_administrator` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id_administrator`, `username`, `password`, `foto`) VALUES
('bc07ae8761655d1ae47c32f929082719525c5ce3', 'admin', '$2y$10$ZDcePRG/7En4XkbFTt/HSeEhnVwl94WpeuJH15.eFonGp4rLMotxK', 'man.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bencana`
--

CREATE TABLE `bencana` (
  `id_bencana` varchar(255) NOT NULL,
  `bencana` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bencana`
--

INSERT INTO `bencana` (`id_bencana`, `bencana`) VALUES
('04636378dc6316d1e9a019d150df49a13becd41e', 'Longsor'),
('244115e0364bfecec6064ddb2691810409157c2e', 'Sambaran Petir'),
('2eaa3df6fa9b2451330fa8fdfe526ebfeff6f136', 'Rumah Rusak'),
('66579edf086d2591a7eb0c52bf21d03886086686', 'Gerakan Tanah'),
('7c3c918435514cc17b667367ce36fb131758039d', 'Angin Puting Beliung'),
('7ed675d36b6745a42c65d8c7e7af26372af3e530', 'Banjir'),
('880042806aa2df2bbc220466dbf899d0ff5f1a99', 'Kebakaran'),
('d02e4327b24c25eb7af13927046a85c3205ea5f4', 'Pohon Tumbang'),
('ec5e8a6ba7fd0199115df1b37e709e7fcd6298ef', 'Gempa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `deskripsi`, `tgl`, `gambar`) VALUES
('35fafb81a1fa6d1ba1cdc58cd06ff4d6650b5888', 'Rumah Warga di Kotabaru Tasikmalaya Ludes Terbakar, Diduga Akibat Korsleting Listrik', '<p>Kebakaran rumah warga terjadi di Kampung Elos Kotabaru, Kelurahan Kotabaru, Kecamatan Cibeureum, Kota Tasikmalaya pada Minggu (17/12/2023) malam.</p>\r\n\r\n<p>Peristiwa kebakaran milik salah satu warga rumah di Kampung Elos, Kotabaru, bernama Ahmad Juhana, itu terjadi sekira pukul 22.40 WIB.</p>\r\n\r\n<p>Kepala Pelaksana (Kalak) Badan Penanggulan Bencana Daerah (BPBD) UPTD Pemadam Kebakaran (Damkar) Kota Tasikmalaya, Ucu Anwar, membenarkan peristiwa kebakaran tersebut.</p>\r\n\r\n<p>&quot;Betul, tadi kami menerima laporan adannya kebakaran yang menimpa satu unit rumah di wilayah Purbaratu,&quot; kata Ucu.</p>\r\n\r\n<p>Usai menerima laporan tersebut, dikatakan Ucu, petugas BPBD bersama&nbsp;Damkar Kota Tasikmalaya&nbsp;langsung menerjukan beberapa unit kendaraan untuk memadamkan kobaran api.</p>\r\n\r\n<p>&quot;Kendaraan kita terjuakan dua unit, satu Ranger dan satu tanki,&quot; ungkapnya.</p>\r\n', '2023-12-18', '9ca41_kebakaran.jpg'),
('7cf3f56c49fcb1df476167ca6aa5cd05ece55ea6', 'Pohon Kersen di Kompleks Olahraga Dadaha Kota Tasikmalaya Tumbang Tutupi Jalan', '<p>Hujan deras yang mengguyur wilayah&nbsp;Kota Tasikmalaya&nbsp;dan sekitarnya menyebabkan&nbsp;pohon tumbang&nbsp;di&nbsp;Kompleks Olahraga Dadaha, Kecamatan Cihideung, Senin (4/12/2023).</p>\r\n\r\n<p>Pohon kersen yang berada di depan Taman Kanak-Kanak (TK) Alphabet, Jalan Lingkar Dadaha, Kelurahan Nagarawangi, Kecamatan Cihideung, Kota Tasikmalaya, tumbang memotong badan jalan.&nbsp;</p>\r\n\r\n<p>Ketua RT 03, Kampung Babakan Serang, Edi (56) mengatakan, tumbangnya pohon dengan tinggi sekitar 6 meter dengan berdiameter 30 cm disebabkan hujan deras disertai angin kencang.&nbsp;</p>\r\n\r\n<p>&quot;Kejadiannya sorean kurang lebih sekira pukul 16.00 WIB. Pas kejadian tadi posisi lagi hujan,&quot; ucap Edi.</p>\r\n\r\n<p>Menurutnya, tidak ada korban dalam bencana pohon tumbang tersebut. Hanya saja, batang pohon menghalangi arus lalu lintas.&nbsp;</p>\r\n\r\n<p>&quot;Saat kejadian lagi sepi. Alhamdulillah, tidak ada korban,&quot; ungkapnya.&nbsp;</p>\r\n', '2023-12-04', '97c7f_pohon-tumbang.jpg'),
('837c33ec305716ceac74066332dff371c2ad925d', 'Peringati HKB 2024, BPBD Kota Tasikmalaya Simulasikan Penanganan Korban Bencana di Situ Gede', '<p>BPBD Kota Tasikmalaya&nbsp;menggelar&nbsp;simulasi penanganan bencana&nbsp;di tempat wisata&nbsp;Situ Gede, Kelurahan Linggajaya, Kecamatan Mangkubumi, Rabu (8/5/2024).</p>\r\n\r\n<p>Simulasi penanganan bencana yang dilakukan BPBD Kota Tasikmalaya ini sekaligus memperingati&nbsp;Hari Kesiapsiagaan Bencana&nbsp;(HKB) 2024. Adapun tema HBK 2024 kali ini adalah Siap Untuk Selamat.</p>\r\n\r\n<p>Kegiatan HBK 2024 tingkat Kota Tasikmalaya dibuka langsung Penjabat (Pj) Wali Kota Tasikmalaya Cheka Virgowansyah yang ditandai dengan memukul kentongan bersama-sama Forkopimda Kota Tasikmalaya, termasuk Sekda Kota Tasikmalaya yang juga Kepela BPBD Kota Tasikmalaya, Ivan Dicksan.&nbsp;</p>\r\n\r\n<p>Simulasi penanganan bencana yang dilakukan BPBD Kota Tasikmalaya bersama stakeholder lainnya, di antaranya dari TNI, Polri, Basarnas, BNPB, Dinsos, Dinkes, PMI, Pemadam Kebakaran, Tagana, mahasiswa dari berbagai kampus, warga sekitar serta relawan lainnya.</p>\r\n\r\n<p>&quot;Hari ini kita melakukan latihan bersama antara BPBD, TNI-Polri, Tagana, dan seluruh elemen masyarakat pun hadir,&quot; kata Cheka.</p>\r\n\r\n<p>Menurut Cheka, bahwa banyaknya stakeholder yang terlibat menunjukan kolaborasi yang cukup baik. Ia menyebut, kalau mau sempurna harus sering latihan.</p>\r\n\r\n<p>&quot;Oleh karena itu, kita barus sering-sering latihan. Apabila terjadi bencana, kita sudah siap, apa yang harus kita lakukan oleh setiap sektornya. Sosialisasi terus dilakukan, baik itu di level masyarkat maupun sekolah,&quot; ucapnya.</p>\r\n', '2024-05-08', '4d49c_water-rescue.jpg'),
('bdac52b5b2b3439e1a00c3312b2d8b36072158ab', 'Dampak Cuaca Ekstrem di Tasikmalaya, 4 Atap Rumah Ambruk dan 2 Tembok Penahan Tebing Ambrol', '<p>Cuaca ekstrem&nbsp;yang melanda Kota Tasikmalaya pada Senin (4/12/2023) menyebabkan bencana alam di beberapa wilayah.&nbsp;</p>\r\n\r\n<p>Berdasarkan data dari&nbsp;BPBD Kota Tasikmalaya, terdapat empat kejadian atap&nbsp;rumah ambruk, dua tembok penahan tebing (TPT) ambrol dan satu pohon tumbang.</p>\r\n\r\n<p>Keempat atap rumah yang ambruk berada sejumlah lokasi di Kota Tasikmalaya. Pertama terjadi di Kampung Cibalay, Kelurahan Sirnagalih, Kecamatan Indihiang.&nbsp;</p>\r\n\r\n<p>Kedua, di Kampung Sindangsari, Kelurahan Bantarsari, Kecamatan Bungursari, Kota Tasikmalaya. Ketiga dan keempat terjadi di Kampung Bojong Tritura, Kelurahan Panglayungan, Kecamatan Cipedes.&nbsp;</p>\r\n\r\n<p>Selain itu, 2 rumah warga terdampak banjir di Kampung Sindangsari, Kelurahan Bantasari, Kecamatan Bungursari, Kota Tasikmalaya.&nbsp;</p>\r\n\r\n<p>BPBD Kota Tasikmalaya segera merespons bencana tersebut dengan melakukan evakuasi dan assessment di lokasi terdampak. Langkah ini dilakukan untuk memastikan keselamatan warga dan mengevaluasi kerusakan yang terjadi.</p>\r\n', '2023-12-05', 'fbd82_rumah-ambruk.jpg'),
('c6d03ecff179ddc3d88ca664012ff0930c35b522', 'Polisi Olah TKP Kebakaran Rumah Semi Permanen di Cilendek Tasikmalaya, Ini Penyebabnya', '<p>Unit Inafis Satreskrim Polres Tasikmalaya Kota bersama anggota Polsek Cibeureum melakukan olah tempat kejadian perkara (TKP)&nbsp;kebakaran rumah&nbsp;semi permanen di Kampung Cilendek, Kelurahan Kotabaru, Kecamatan Cibereum, Kota Tasikmalaya, Jumat (22/12/2023).</p>\r\n\r\n<p>Diketahui, kebakaran yang melanda rumah milik almarhum Misbah, terjadi pada Jumat (22/12/2023) sekira pukul 21.00 WIB.</p>\r\n\r\n<p>Saat ini, kobaran api sudah dipadamkan petugas&nbsp;Pemadam Kebakaran&nbsp;(Damkar)&nbsp;BPBD Kota Tasikmalaya.&nbsp;</p>\r\n\r\n<p>&quot;Emang benar ada laporan tadi ke polres, bahwa di Kampung Cilendek terjadi kebakaran rumah,&quot; ucap Perwira Pengawas (Pawas) Polres Tasikmalaya Kita, Iptu Dede Hendi, di lokasi kebakaran.&nbsp;</p>\r\n\r\n<p>Dari hasil olah TKP, Dede menyebut, dugaan penyebab kebakaran adalah adanya korsleting listrik &quot;Diduga dari korsleting listrik, dan alhamdulilah tidak ada korban,&quot; ungkapnya.</p>\r\n\r\n<p>Dede menjelaskan, dengan kondisi bangunan yang kebanyakan terbuat dari kayu dan bilik, api dengan cepat menghanguskan bangunan.</p>\r\n', '2023-12-23', 'b72ba_kebakaran-rumah.jpg'),
('d728dbd33aee6dc15e7c52a4d2fc913bcc603392', 'Dukung Kelancaran Arus Mudik Lebaran 2024, BPBD Kota Tasikmalaya Siapkan 2 Posko Siaga Bencana', '<p>Badan Penanggulangan Bencana Daerah (BPBD)&nbsp;Kota Tasikmalaya&nbsp;mendirikan posko mudik siaga bencana menghadapi&nbsp;arus mudik lebaran 2024.</p>\r\n\r\n<p>&quot;Memang kita sudah ada rapat dengan BNPB dan BPBD tingkat provinsi, bahwa memang BPBD tingkat kabupaten dan kota harus mendirikan posko kolarborasi dalam rangka mensukseskan arus mudik dan balik tahun ini,&quot; kata Penata Penanggulangan Bencana Ahli Muda&nbsp;BPBD Kota Tasikmalaya, &nbsp;Erik Yowanda kepada iNewsTasikmalaya.id di kantornya, Selasa (2/4/2024).</p>\r\n\r\n<p>Erik mengungkapkan, bahwa setelah melakukan rapat koordinasi dengan seluruh unsur terkait, pihaknya sudah menyiapkan dua posko mudik untuk memberikan rasa aman kepada masyarakat.</p>\r\n\r\n<p>&quot;Jadi kita sudah mempeersiapkan, sudah rapat dengan beberapa dinas teknis, dengan PUPR, PMI, dinkes dan semua yang terlibat, untuk sama sama berada di posko mudik.</p>\r\n\r\n<p>Terutama kita menyediakan nanti di posko tersebut standarnya harus ada tempat istirahat bagi pemudik yang melintas ke Kota Tasikmalaya,&quot; ujarnya.</p>\r\n\r\n<p>&quot;Ada dua posko, posko utamanya tetap ada di BPBD, posko kolaborasi ada di Jalan Simpang Mohammad Hatta-Jalan Lingkar utara. Jadi kita mengantisipasi terutama di jalur-jalur mudik agar supaya cepat ditangani apabila ada hambatan dari aktivitas bencana alam,&quot; tambahnya.</p>\r\n', '2024-04-02', '6105e_bpbd-kota-tasikmalaya.jpg'),
('e317c53cf6c36a8a77877143d32ff23d58119f42', 'Satu Rumah di Awipari Kota Tasikmalaya Rusak Terdampak Gempa Garut', '<p>Ketua Tim Reaksi Cepat (TRC) Badan Penanggulangan Bencana Daerah (BPBD)&nbsp;Kota Tasikmalaya, Harisman, menyampaikan, pascagempa bumi yang mengguncang Kabupaten Garut, Jawa Barat, pada Sabtu (27/4/2024) malam, sudah masuk laporan adanya kerusakan rumah terdampak gempa.</p>\r\n\r\n<p>&quot;Sudah masuk 1 laporan ke piket Posko BPBD dari Cibeureum,&quot; ujar Harisman, Minggu (28/4/2024) pagi.</p>\r\n\r\n<p>Dari laporan yang masuk ke BPBD, rumah yang terdampak&nbsp;gempa Garut&nbsp;berada di Awipari Kulon, Kelurahan Awipari, Kecamatan Cibeureum, Kota Tasikmalaya. Dinding rumah ambruk dan retak-retak akibat getaran&nbsp;gempa bumi&nbsp;berkekuatan 6,5 Magnitudo yang mengguncang Kabupaten Garut.&nbsp;</p>\r\n\r\n<p>&quot;Rumah pak Sutisna. Tim BPBD sedang persiapan menuju lokasi sambil patroli,&quot; ucapnya.&nbsp;</p>\r\n\r\n<p>Dampak gempa juga terjadi di Kabupaten Tasikmalaya. Plafon Gedung Kwarcab Pramuka Kabupaten Tasikmalaya ambruk. Selain itu, kaca pintu depan pun pecah.&nbsp;</p>\r\n', '2024-04-28', '6dc33_rumah-rusak.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `nomor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `nomor`) VALUES
('751c32b750a598bce3114afe5981e68f35bc0d22', 'Kepala', 4),
('3bb0b0f5ecf5d721528acc64a35833b26617f7b7', 'Sekretaris', 5),
('ddcfcc6a722e26220b97a870ab2590b7841aedb5', 'Unsur Pengarah', 6),
('7fbf03c2acdbd2eccc87aef2cb872282acd4acb5', 'Kepala Pelaksana', 9),
('cbe2891ae2573b4fbe56c4e4f2f496247c17ee4f', 'Kepala Sub Bagian Tata Usaha', 10),
('b2d7d7bf8daf8910f0f6f3b5c4876aa37811345f', 'Kepala Bidang Penanggulangan Bencana', 11),
('0c9978a140a3a2267cea51fe0bf76575623a79a5', 'Kepala Bidang Kebakaran dan Penyelamatan', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
('f0bb6edcebb7d917eedbb6d7aa28e91f894862c7', 'Simulasi Bencana'),
('d6cfacf3a3a44fe84a7c846ae66c88b259504331', 'Rutinitas'),
('ea82e2e57b1404aef05d5df7ee610921b5502cda', 'Edukasi'),
('071e0086b2c78429545164a9ea7946cd1cf41f2e', 'Evakuasi'),
('88f59e1f5268773cce316588f9bae2613c56f296', 'SAR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebencanaan`
--

CREATE TABLE `kebencanaan` (
  `id_kebencanaan` varchar(255) NOT NULL,
  `id_kecamatan` varchar(255) NOT NULL,
  `id_bencana` varchar(255) NOT NULL,
  `kejadian` varchar(255) NOT NULL,
  `id_tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kebencanaan`
--

INSERT INTO `kebencanaan` (`id_kebencanaan`, `id_kecamatan`, `id_bencana`, `kejadian`, `id_tahun`) VALUES
('005a6889f09cc8051ecf0f2b857e441f9aafa3c7', '5', '7ed675d36b6745a42c65d8c7e7af26372af3e530', '2', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('0060faa3d0b1f571d99a844564587f1976c84d39', '4', '7ed675d36b6745a42c65d8c7e7af26372af3e530', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('1477e9804f979cf631276b26abd3fb95f30dff0b', '6', '04636378dc6316d1e9a019d150df49a13becd41e', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('193b9f32fec58070318578d7a8cea3cb14586a5f', '9', '7ed675d36b6745a42c65d8c7e7af26372af3e530', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('1f32cbfd4c87fd61e0f84a9f01eed293b24b999e', '5', '2eaa3df6fa9b2451330fa8fdfe526ebfeff6f136', '21', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('20732b957496ef419e05bf157d560b1b4fdf4e27', '7', 'd02e4327b24c25eb7af13927046a85c3205ea5f4', '14', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('34bd677dfbf4c48293329a42b124bc3fc816551a', '3', '2eaa3df6fa9b2451330fa8fdfe526ebfeff6f136', '16', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('3c985861dfc3dfdcc4fab9c551c2189acdaa3d18', '4', 'd02e4327b24c25eb7af13927046a85c3205ea5f4', '4', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('3e78275c86696c586ab4e0b2f14ea5d4139e7d76', '1', '04636378dc6316d1e9a019d150df49a13becd41e', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('461c59ce424c80f32939038d5669c630e26b219d', '8', 'd02e4327b24c25eb7af13927046a85c3205ea5f4', '2', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('4fc8aae6bb4dc7e5b4e5aaeb2eeb23291810ecd9', '6', '7ed675d36b6745a42c65d8c7e7af26372af3e530', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('5177cfc50aeaaacc69309bf80a33160e5ff3de9e', '3', '244115e0364bfecec6064ddb2691810409157c2e', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('52f1c17091f7d9689442e58433451b21ecc7940a', '10', '7ed675d36b6745a42c65d8c7e7af26372af3e530', '3', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('5fd938ddc062cf9fea0deb8c66177d614e1ce88d', '8', '04636378dc6316d1e9a019d150df49a13becd41e', '12', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('70d00b604901fbe45bcc27bbbef458416552b672', '2', '244115e0364bfecec6064ddb2691810409157c2e', '3', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('71c6b195f9ed2473dff5f9c97dce58e6a906454b', '1', '7ed675d36b6745a42c65d8c7e7af26372af3e530', '2', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('83939212e69989c355eaddb8e273cefba3f48803', '1', '2eaa3df6fa9b2451330fa8fdfe526ebfeff6f136', '8', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('848faa4ad53e213e8adce2a0035ff0870a7e6df0', '10', '244115e0364bfecec6064ddb2691810409157c2e', '2', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('8f7b6e8932b32eeb39bbf4f90d967f0d9e46a192', '9', 'd02e4327b24c25eb7af13927046a85c3205ea5f4', '5', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('906865cc0f01c07d33d983824f6ec190e4d101d1', '1', 'd02e4327b24c25eb7af13927046a85c3205ea5f4', '4', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('90b74f4df36c941f66af8dabf413a25e95a9a7dd', '8', '7ed675d36b6745a42c65d8c7e7af26372af3e530', '4', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('94b1da3c166e1fb8d294a2705f53334a31e017a7', '8', '66579edf086d2591a7eb0c52bf21d03886086686', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('95233e732e976810ad64c0cf34ab8ff8ac985243', '9', '2eaa3df6fa9b2451330fa8fdfe526ebfeff6f136', '16', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('99571615d3d637366bec1cd5e1985337b220b50a', '3', '04636378dc6316d1e9a019d150df49a13becd41e', '4', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('a0eb44ba5fb9d6b6b4cb3e7ecc181e47f727cde8', '10', 'd02e4327b24c25eb7af13927046a85c3205ea5f4', '6', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('a4b29685c4a2b5ed7b70c6f5dd988e5e78e59375', '8', '2eaa3df6fa9b2451330fa8fdfe526ebfeff6f136', '13', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('a5bdb3f1ea9011cd39d86cccd868f3f724b7beb7', '5', 'd02e4327b24c25eb7af13927046a85c3205ea5f4', '2', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('af55cd4b6b5831b343156840b722506d13d5f5e5', '2', '04636378dc6316d1e9a019d150df49a13becd41e', '4', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('b10d51e1987fafc1187474030e202808ac5f155d', '2', 'd02e4327b24c25eb7af13927046a85c3205ea5f4', '5', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('b4c50254fa27668bfce023bc0018cbd7065ee786', '10', '04636378dc6316d1e9a019d150df49a13becd41e', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('b59dc2101b67747bce89cafafecb663973d416c6', '6', 'd02e4327b24c25eb7af13927046a85c3205ea5f4', '2', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('b7f9d417c6c28bc2f46e89989debbbf55cd823a6', '7', 'ec5e8a6ba7fd0199115df1b37e709e7fcd6298ef', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('ba4a861f5bed0b0f1d264fc3db6fa4439163acdc', '7', '04636378dc6316d1e9a019d150df49a13becd41e', '5', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('bb2e9b5e418ff3a18b465b6abf74dea13fc571d2', '8', 'ec5e8a6ba7fd0199115df1b37e709e7fcd6298ef', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('bccd8feeda0612b844a153f374ba046167d192be', '7', '2eaa3df6fa9b2451330fa8fdfe526ebfeff6f136', '12', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('be2fb4baa16692789a917c77c42dc80145320147', '10', 'ec5e8a6ba7fd0199115df1b37e709e7fcd6298ef', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('c06f8595d9fcb270a0b6ab7ec340bcc3dae20710', '5', '66579edf086d2591a7eb0c52bf21d03886086686', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('c1c39333dfd61f786a9c8d868bf465e2b8c6f55e', '9', '244115e0364bfecec6064ddb2691810409157c2e', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('c554a809eb6b5e598463ed945f92fe36a1ff7628', '7', '7ed675d36b6745a42c65d8c7e7af26372af3e530', '2', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('c83fdc5f55b46d4c37e713f2cfec8ccbbff6bbc0', '8', '7c3c918435514cc17b667367ce36fb131758039d', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('cfe0e47d1499855d75cfcdc542dffe8923fb0118', '7', '66579edf086d2591a7eb0c52bf21d03886086686', '1', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('d65363090be16289a92ccb7512e718fb6e3ea939', '3', 'd02e4327b24c25eb7af13927046a85c3205ea5f4', '9', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('ded684b4194a12089832f0a516384558b330b224', '9', '04636378dc6316d1e9a019d150df49a13becd41e', '5', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('e86e53529fe8c12bbad127b8790394e47e024ec1', '10', '7c3c918435514cc17b667367ce36fb131758039d', '0', 'c473ec0a50d17196a6375a121147835ca6bccdd3'),
('e908eb5f55393a9b0a56209449c916311b2cce73', '2', '2eaa3df6fa9b2451330fa8fdfe526ebfeff6f136', '11', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('eb748a990cc83fb6f5d22aa720eb613b0900d775', '4', '2eaa3df6fa9b2451330fa8fdfe526ebfeff6f136', '4', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('eda7a13876bb2bbab74af917e8ac2157075c3701', '3', '7ed675d36b6745a42c65d8c7e7af26372af3e530', '6', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('ef08c006c18552601d5a7c63e12d902eb3162d6d', '2', '7ed675d36b6745a42c65d8c7e7af26372af3e530', '6', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('f34a799982c098a45467da6f6f0cd4d4e3e2129b', '10', '2eaa3df6fa9b2451330fa8fdfe526ebfeff6f136', '13', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7'),
('f83f0ed37e52bfbad46d3d66c446cb24371a5adb', '6', '2eaa3df6fa9b2451330fa8fdfe526ebfeff6f136', '5', '582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'Tawang'),
(2, 'Mangkubumi'),
(3, 'Purbaratu'),
(4, 'Cihideung'),
(5, 'Cipedes'),
(6, 'Indihiang'),
(7, 'Tamansari'),
(8, 'Kawalu'),
(9, 'Cibeureum'),
(10, 'Bungursari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` varchar(255) NOT NULL,
  `alamat` longtext NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat`, `nomor`, `email`, `lokasi`) VALUES
('15fx38o70ol54af2q3g1v4pel9j1l37h3cqc0z0h', '<h3>Jl. Perintis Kemerdekaan No.279, Karsamenak, Kec. Kawalu, Kab. Tasikmalaya, Jawa Barat 46182</h3>\r\n', '08112101113', 'bpbd@tasikmalayakota.go.id', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.8326014936742!2d108.21089627500086!3d-7.372651592636713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f57ebf45bb543%3A0x13474362769b9046!2sBPBD%20Kota%20Tasikmalaya!5e0!3m2!1sid!2sid!4v17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `id_konten` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `id_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `thumbnail`, `link`, `deskripsi`, `id_kategori`) VALUES
('1b8ff5ba90565dac1a9de41c0372d4f525799b51', 'SIMULASI BENCANA ALAM GEMPA BUMI DAN PEMADAMAN API DI SD NEGERI BABAKAN GOYANG KOTA TASIKMALAYA', 'hqdefault (2).jpg', 'https://www.youtube.com/watch?v=ZkRQTFwb924', '<p>ASSALAMUALAIKUMMMMM</p>\r\n\r\n<p>HALLO SEMUAAAAA~~~</p>\r\n\r\n<p>SALAM TANGGUH! TANGGUH.. TANGGUH &hellip; TANGGUH &hellip;</p>\r\n\r\n<p>KALI INI, BPBD KOTA TASIKMALAYA MENJADI SALAH SATU PELOPOR PROGRAM SATUAN PENDIDIKAN AMAN BENCANA. MERUJUK PADA PERMENDIKBUD NOMOR 33 TAHUN 2019 TENTANG PENYELENGGARAAN SATUAN PENDIDIKAN AMAN BENCANA ATAU SPAB, BPBD BERUPAYA SECARA MAKSIMAL MEMBERIKAN SOSIALISASI, KOMUNIKASI DAN EDUKASI SERTA GLADI ATAU SIMULASI TERKAIT BENCANA.</p>\r\n\r\n<p>HAL TERSEBUT SELARAS DENGAN 3 PILAR SPAB. YAITU</p>\r\n\r\n<p>1. FASILITAS SEKOLAH YANG AMAN</p>\r\n\r\n<p>2. MANAJEMEN BENCANA</p>\r\n\r\n<p>3. PENGURANGAN RISIKO BENCANA.</p>\r\n\r\n<p>NAH&hellip; MAU TAU KEGIATAN SERU YANG KITA LAKUKAN , MARI KITA LIHAT..</p>\r\n\r\n<p>PERTAMA, TEAM BPBD MEMBERIKAN SHARING PENGETAHUAN MENGENAI POTENSI BENCANA DI KOTA TASIKMALAYA SERTA CARA PENYELEMATAN DIRI YANG TEPAT JIKA TERJADI BENCANA.</p>\r\n\r\n<p>MATERI INI KAMI KHUSUSKAN LOHHH, MAKSUDNYAAA.. ADA PEMATERI UNTUK PARA GURU BESERTA KOMITE DAN JUGAAAAA ADA MATERI UNTUK PARA SISWA. SELAIN ITU&hellip; UNTUK KEGIATAN SELANJUTNYA SETELAH DIBERIKAN PEMAHAMAN OLEH PARA NARASUMBER, PIHAK SEKOLAH BESERTA TEAM BPBD MELAKSANAKAN SIMULASI ATAU GLADI BENCANA GEMPA BUMI. HAL INI BERTUJUAN UNTUK MELATIH KEBIASAAN AGAR TIDAK PANIK SERTA MENGENALI ANCAMAN GUNA MENGURANGI RISIKO YANG TIDAK DI INGINKAN.</p>\r\n\r\n<p>NAHH SERU BUKANN KEGIATAN YANG KAMI LAKUKAN???? BELAJAR TIDAK HANYA SOAL TEORITIK TAPI BAGAIMANA KITA MENJADI PPRIBADI APLIKATIF .. YUK JANGAN TUNGGU BENCANA MENGENAI KITA, TAPI KITA WASPADA SELALU TERHADAP BENCANA. KITA SIAP, KITA TANGGUH, KITA SADAR BUDAYA BENCANAAAA SALAM TANGGUHHHHHH TANGGUH TANGGUH TANGGUH TERIMAKASIH WASSALAMUALAIKUM WR.WB</p>\r\n', 'f0bb6edcebb7d917eedbb6d7aa28e91f894862c7'),
('5503129db9e4b9cae4b91fdcd7dd0a24f77eeadd', 'Hari Kesiapsiagaan Bencana HKB Tingkat Kota Tasikmalaya Tahun 2024', 'hqdefault (1).jpg', 'https://www.youtube.com/watch?v=KK-q7XDFqHg&t=2s', '<p>&nbsp;</p>\r\n\r\n<p>Tasikmalaya, Rabu 08 Mei 2024. Kegiatan Hari Kesiapsiagaan Bencana Tingkat Kota Tasikmalaya Tahun 2024 yang dilaksanakan pada hari Rabu, 08 Mei 2024 bertempat di Objek Wisata Situ Gede Kota Tasikmalaya. Kegiatan di hadiri oleh PJ Walikota beserta unsur Forkopimda Kota Tasikmalaya dan sejumlah tamu undangan. Dalam Kegiatan ini dilaksanakan juga Simulasi Penanganan Bencana Banjir yang diikuti oleh sekitar 100 Orang peserta yang terdiri dari unsur TNI POLRI, Basarnas, Tagana, PMI, PSC 119, PLN, Sigap Persis, Kominfo, Satpol PP, Relawan dan Satgas PB BPBD Kota Tasikmalaya.</p>\r\n\r\n<p>BPBD Kota Tasikmalaya</p>\r\n\r\n<p>Call Center Kedaruratan 08112101113</p>\r\n\r\n<p>Jl. Perintis Kemerdekaan KM 6, Kelurahan Kersamenak Kecamatan Kawalu Kota Tasikmalaya</p>\r\n\r\n<p><a href=\"https://www.youtube.com/hashtag/salamtangguh\" target=\"\">#salamtangguh</a> <a href=\"https://www.youtube.com/hashtag/salamkemanusiaan\" target=\"\">#salamkemanusiaan</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.youtube.com/@bpbdjabar\" target=\"\">@bpbdjabar</a> <a href=\"https://www.youtube.com/@tesla1804\" target=\"\">@tesla180</a></p>\r\n', '071e0086b2c78429545164a9ea7946cd1cf41f2e'),
('82ae5f8434df62e8d7361b7ee8000c3c1eefe768', 'BPBD Kota Tasikmalaya Gelar Simulasi Penanganan Bencana di Asia Plaza', 'hqdefault.jpg', 'https://www.youtube.com/watch?v=Sg63_P4bVe8&t=2s', '<p>Dapatkan sajian video-video terkini lainnya di sini: <a href=\"https://www.youtube.com/redirect?event=video_description&amp;redir_token=QUFFLUhqbTVWbnVmbHc5R2pvdXh2bjhxS3Y2NUdsSFVDUXxBQ3Jtc0ttb2ZVSFp4WG84SFpMRW8yc2FOeXQwLU9zaVRIOUJDc3duYTctcThXUE9LMFB2dm9pb1hpNFdYR2xvQXhaVnppbExobk9QSXdUbjY5TVp1RG52SnZLZS1NUG9hOERYTERhS3BwbHlFamNGOG4wbU1Hdw&amp;q=https%3A%2F%2Ftasikmalaya.inews.id%2F&amp;v=Sg63_P4bVe8\" target=\"_blank\">Youtube BPBD Kota Tasikmalaya</a>&nbsp;</p>\r\n\r\n<p>Jangan lewatkan juga berbagai kegiatan kita yang lainnya di channel ini.</p>\r\n', 'f0bb6edcebb7d917eedbb6d7aa28e91f894862c7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejabat`
--

CREATE TABLE `pejabat` (
  `id_pejabat` varchar(255) NOT NULL,
  `nama_pejabat` varchar(255) NOT NULL,
  `id_jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pejabat`
--

INSERT INTO `pejabat` (`id_pejabat`, `nama_pejabat`, `id_jabatan`, `foto`) VALUES
('a333f84c322d2b7206d01b0ad2e49045232b12e9', 'KOMARUDIN, S.T.', '3bb0b0f5ecf5d721528acc64a35833b26617f7b7', 'man.jpg'),
('a804946720c265b3e63c92401e6f5d9cc5199e75', 'YULLI LESTARI, S.IP., M.Si.', 'cbe2891ae2573b4fbe56c4e4f2f496247c17ee4f', 'woman.jpg'),
('b217d1c2f3045bee6f93893dd09a2f57500553ca', 'H. UCU ANWAR SURAHMAN, S.Pd., M.Pd', '751c32b750a598bce3114afe5981e68f35bc0d22', 'man.jpg'),
('e6845367abd0568a0918aacaa9d827e3bbed923e', 'ASEP SUDRAJAT HADIPRAJA, S.Pd., M.Ak.', 'b2d7d7bf8daf8910f0f6f3b5c4876aa37811345f', 'man.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_bpbd`
--

CREATE TABLE `profil_bpbd` (
  `id_bpbd` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `hukum` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_bpbd`
--

INSERT INTO `profil_bpbd` (`id_bpbd`, `deskripsi`, `hukum`) VALUES
('245ba5e67c9fb4fadc303427eef9fa785b3224a4', '<p>Badan Penanggulangan Bencana Daerah (BPBD) merupakan lembaga penanggulangan bencana yang berkedudukan di bawah dan bertanggung jawab kepada Gubernur. BPBD dipimpin oleh seorang kepala, yang dijabat secara ex officio oleh Sekretaris Daerah (Sekda), yang berkedudukan di bawah dan bertanggung jawab kepada Walikota.</p>\r\n', '<ol>\r\n	<li>UU Nomor 24 Tahun 2007 tentang Penanggulangan Bencana;</li>\r\n	<li>Peraturan Pemerintah Nomor 21 Tahun 2008 tentang Penyelenggaraan Penanggulangan Bencana;</li>\r\n	<li>Peraturan Pemerintah Nomor 18 Tahun 2016 tentang Perangkat Daerah;</li>\r\n	<li>Pepres Nomor 8 Tahun 2008 tentang Badan Nasional Penanggulangan Bencana;</li>\r\n	<li>Permendagri Nomor 46 Tahun 2008 tentang Pedoman Organisasi dan Tata Kerja Badan Penanggulangan Bencana Daerah;</li>\r\n	<li>Perka BNPB Nomor 3 Tahun 2008 Pedoman Pembentukan Badan Penanggulangan Bencana Daerah;</li>\r\n</ol>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur`
--

CREATE TABLE `struktur` (
  `id_struktur` varchar(255) NOT NULL,
  `struktur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `struktur`
--

INSERT INTO `struktur` (`id_struktur`, `struktur`) VALUES
('bde24d4029a1a08bdda096170064ed3736a8de19', 'Screenshot 2024-06-08 181701.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` varchar(255) NOT NULL,
  `tahun` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `tahun`) VALUES
('3d578e7e3a004a37cb42a4dc137e5c585aa84c45', 2022),
('582c2b3fb2f45a9b574849fa67cc15a9cba4aaa7', 2023),
('88f7dffdd9b215c97d1c4d9c849c633bfe4019bb', 2021),
('c473ec0a50d17196a6375a121147835ca6bccdd3', 2024);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id_visi_misi` varchar(255) NOT NULL,
  `visi` longtext NOT NULL,
  `misi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`id_visi_misi`, `visi`, `misi`) VALUES
('q5dc32b75oa59abcq321vafel9j1e68f3dbc0x2p', '<p>Ketangguhan bangsa dalam menghadapi bencana.</p>\r\n', '<p>1. Melindungi bangsa dari ancaman bencana melalui pengurangan risiko</p>\r\n\r\n<p>2. Membangun sistem penanggulangan bencana yang handal</p>\r\n\r\n<p>3. Menyelenggarakan penanggulangan bencana secara terencana, terpadu, terkoordinir, dan menyeluruh</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_administrator`);

--
-- Indeks untuk tabel `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`id_bencana`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `kebencanaan`
--
ALTER TABLE `kebencanaan`
  ADD PRIMARY KEY (`id_kebencanaan`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indeks untuk tabel `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id_pejabat`);

--
-- Indeks untuk tabel `profil_bpbd`
--
ALTER TABLE `profil_bpbd`
  ADD PRIMARY KEY (`id_bpbd`);

--
-- Indeks untuk tabel `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id_struktur`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id_visi_misi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
