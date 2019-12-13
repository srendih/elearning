# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-10-27 03:21:01
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "kuis"
#

DROP TABLE IF EXISTS `kuis`;
CREATE TABLE `kuis` (
  `id_kuis` varchar(20) NOT NULL DEFAULT '',
  `id_pelajaran` varchar(20) DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  `jawaban` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `hasil` varchar(11) DEFAULT NULL,
  `nisn` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kuis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "kuis"
#

INSERT INTO `kuis` VALUES ('hdquPqyHGbDk6ftqwrGA','MTK',67,'2','2019-10-26','B',211),('M8jNZyHwNzpdsG7UU58f','MTK',60,'6','2019-10-26','B',33322);

#
# Structure for table "m_guru"
#

DROP TABLE IF EXISTS `m_guru`;
CREATE TABLE `m_guru` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `nm_guru` varchar(25) DEFAULT NULL,
  `id_pelajaran` varchar(20) DEFAULT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `id_kelas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_guru"
#

INSERT INTO `m_guru` VALUES ('je1ScVEOjYdQNIvzQdRh','Guru teladan','MTK','YZhHKSD8ENsajYnNH6GG','Rmkqu38CMTokebKPGylM'),('x9fAsF1DrDsr3RJQEu3h','Guru PPKN','PPKN','vu4X9KZC5CA1wfZtJcOk','Rmkqu38CMTokebKPGylM');

#
# Structure for table "m_kelas"
#

DROP TABLE IF EXISTS `m_kelas`;
CREATE TABLE `m_kelas` (
  `id` varchar(40) NOT NULL DEFAULT '',
  `nama_kelas` varchar(40) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_kelas"
#

INSERT INTO `m_kelas` VALUES ('mGS4pMJBZpxl2G8qrOth','XI','IPA'),('Rmkqu38CMTokebKPGylM','XII','IPA'),('rRjiFwCcxzjUi2aGe2Uo','X','IIS');

#
# Structure for table "m_pelajaran"
#

DROP TABLE IF EXISTS `m_pelajaran`;
CREATE TABLE `m_pelajaran` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `mata_pelajaran` varchar(50) DEFAULT NULL,
  `materi` varchar(255) DEFAULT NULL,
  `id_kelas` varchar(20) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `a` varchar(100) DEFAULT NULL,
  `b` varchar(100) DEFAULT NULL,
  `c` varchar(100) DEFAULT NULL,
  `d` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_pelajaran"
#

INSERT INTO `m_pelajaran` VALUES ('236jNFxOIPbR6sFMGWkM','MTK','2x2 =','Rmkqu38CMTokebKPGylM','d','1','2','3','4'),('B13510006','MTK','8*9 =','Rmkqu38CMTokebKPGylM','b','16','17','18','19'),('B13510007','MTK','9 + 10 =','Rmkqu38CMTokebKPGylM','c','17','18','19','20'),('B13510008','MTK','22 + 1 = ','Rmkqu38CMTokebKPGylM','a','23','24','25','26'),('B13510009','MTK','12 + 11 =','Rmkqu38CMTokebKPGylM','a','23','22','25','24'),('B13510010','MTK','6 + 6 =','Rmkqu38CMTokebKPGylM','a','12','13','14','15'),('B13510011','MTK','20 -  2 =','Rmkqu38CMTokebKPGylM','c','22','21','18','20'),('bHrSYZfOznNg8MUrTcAB','MTK','1+2 =','Rmkqu38CMTokebKPGylM','c','1','2','3','4'),('bXxM85hNn5qsQoRH24WF','MTK','9+9=','Rmkqu38CMTokebKPGylM','a','18','17','16','15'),('DUKiPbBSjisgSAiFCY31','PPKN','siapa nama ibu negara','Rmkqu38CMTokebKPGylM','negara ibu','dad','saf','asdas','fsfa'),('ntOjk6ctXOR5pIJCPRpY','MTK','7+9 =','Rmkqu38CMTokebKPGylM','b','23','16','33','12');

#
# Structure for table "m_siswa"
#

DROP TABLE IF EXISTS `m_siswa`;
CREATE TABLE `m_siswa` (
  `id` varchar(20) NOT NULL DEFAULT '0',
  `nm_siswa` varchar(30) NOT NULL DEFAULT '',
  `jenkel` varchar(20) NOT NULL DEFAULT '0',
  `nisn` int(11) NOT NULL DEFAULT '0',
  `id_kelas` varchar(50) NOT NULL DEFAULT '',
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_siswa"
#

INSERT INTO `m_siswa` VALUES ('2D99M9SwUXmfzTkig3LT','yanto','Laki-Laki',211,'Rmkqu38CMTokebKPGylM','jakarta','2016-03-04','kpzXeaUssKNqBOUSif6k'),('vvflemJFrKbtAx2J1CCv','uniayanti','Perempuan',33322,'Rmkqu38CMTokebKPGylM','bogor','2011-03-04','vu4X9KZC5CA1wfZtJcOk');

#
# Structure for table "materi"
#

DROP TABLE IF EXISTS `materi`;
CREATE TABLE `materi` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `mata_pelajaran` varchar(100) DEFAULT NULL,
  `materi_file` varchar(100) DEFAULT NULL,
  `id_guru` varchar(20) DEFAULT NULL,
  `id_kelas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "materi"
#

INSERT INTO `materi` VALUES ('39gLG6n1JKu6VxycUqgt','AGAMA','AGAMA-izin ambulans.pdf','je1ScVEOjYdQNIvzQdRh','Rmkqu38CMTokebKPGylM'),('aNbp62YVCCjQ8xeDD4F9','TES AJA','TES-Price List.pdf','je1ScVEOjYdQNIvzQdRh','rRjiFwCcxzjUi2aGe2Uo');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

INSERT INTO `user` VALUES ('admin','admin','admin','admin'),('YZhHKSD8ENsajYnNH6GG','guruteladan','123','guru'),('kpzXeaUssKNqBOUSif6k','siswayanto','123','siswa'),('vu4X9KZC5CA1wfZtJcOk','uniayanti','123','siswa');
