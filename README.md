# april-water
a web-based application project for April Water.

----
## Installation
### Database setup.
* Create the databse.
```sql
create database april;
 ```
* use the database, then create tables.
 ```sql
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `comment` (
  `id_kritik` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pesan` varchar(2000) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomer` text NOT NULL,
  `job` varchar(20) NOT NULL,
  `ijazah` varchar(50) NOT NULL,
  `cv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `keuangan` (
  `timestamp` date NOT NULL,
  `pendapatan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `keuangan` (`timestamp`, `pendapatan`, `pengeluaran`, `profit`) VALUES
('2019-05-11', 0, 0, 0),
('2019-05-12', 100000, 100000, 0);

CREATE TABLE `pengiriman` (
  `id` int(10) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` text NOT NULL,
  `pemesan` varchar(30) NOT NULL,
  `pemesanan` varchar(30) NOT NULL,
  `kurir` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pengiriman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pengiriman` (`id`, `penerima`, `alamat`, `telepon`, `pemesan`, `pemesanan`, `kurir`, `status`, `pengiriman`) VALUES
(1, 'Rizki', 'Jl Sukabirus', '081218623841', 'Mbak pelanggan', 'April Gelas', 'JNE', 'Terkirim', '2019-05-12 05:55:31'),
(2, 'Abang', 'Jl Sukapura', '08112227211', 'Mbak pelanggan', 'April Botol', 'JNE', 'Terkirim', '2019-05-12 05:55:07');


CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(130) NOT NULL,
  `spesifikasi` varchar(150) NOT NULL,
  `gambar` varchar(130) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `modal` int(11) NOT NULL,
  `author` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `resi` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pelanggan` int(11) NOT NULL,
  `distributor` int(11) DEFAULT NULL,
  `produk` int(11) DEFAULT NULL,
  `total` int(10) NOT NULL,
  `harga` int(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(100) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(120) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `password` varchar(30) NOT NULL,
  `privilege` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `email`, `nama`, `password`, `privilege`) VALUES
(4, 'distributor', 'distributor@gmail.com', 'Distributor', '1234', 'Distri'),
(11, 'pelanggan', 'pelanggan@gmail.com', 'Mbak pelanggan', '1234', 'Pelanggan'),
(12, 'admin', 'admin@gmail.com', 'Bang admin', '1234', 'Admin'),
(13, 'kasir', 'kasir@gmail.com', 'Mas Kasir', '1234', 'Kasir');

ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_kritik`);

ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`timestamp`);

ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

ALTER TABLE `resi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan`),
  ADD KEY `kasir_id` (`distributor`),
  ADD KEY `pakaian_id` (`produk`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `comment`
  MODIFY `id_kritik` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pengiriman`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `resi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `resi`
  ADD CONSTRAINT `resi_ibfk_1` FOREIGN KEY (`pelanggan`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resi_ibfk_2` FOREIGN KEY (`distributor`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resi_ibfk_3` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
 ```
 ----
## Troubleshoot
In case of '500 internal server error' message, please enable mod_rewrite by following the steps below:
* open `apache/conf/`
* open `httpd.conf`
* find the following line: 
```
#LoadModule rewrite_module modules/mod_rewrite.so
```
* uncomment it, then restart your apache.
----
