-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 25, 2021 at 04:57 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `email_admin` varchar(255) NOT NULL,
  `sifra_admin` varchar(255) NOT NULL,
  `ime_admin` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`email_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`email_admin`, `sifra_admin`, `ime_admin`) VALUES
('a@a', '1', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `fajl`
--

DROP TABLE IF EXISTS `fajl`;
CREATE TABLE IF NOT EXISTS `fajl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) NOT NULL,
  `lokacija` varchar(255) NOT NULL,
  `tip_fajla` varchar(50) NOT NULL,
  `sifra_kursa` char(6) NOT NULL,
  `id_sekcije` int(11) NOT NULL,
  `redni_broj` int(11) NOT NULL,
  `vidljivost` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fajl`
--

INSERT INTO `fajl` (`id`, `naziv`, `lokacija`, `tip_fajla`, `sifra_kursa`, `id_sekcije`, `redni_broj`, `vidljivost`) VALUES
(49, 'Angular.docx', 'fajlovi/60be0cd31b4dc5.12138782.docx', 'docx', 'e1', 0, 0, 0),
(50, 'glava_4_arh_organizacija_procesora_04_dec_2011.pdf', 'fajlovi/611159d139d384.08931253.pdf', 'pdf', 'primer', 0, 0, 1),
(51, 'Read Me.txt', 'fajlovi/61115a56b1d173.53457522.txt', 'txt', 'primer', 1, 0, 1),
(52, '4. CLI Deep Dive _ Troubleshooting.html', 'fajlovi/6112aa4e877583.70197242.html', 'html', 'a1', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kurs`
--

DROP TABLE IF EXISTS `kurs`;
CREATE TABLE IF NOT EXISTS `kurs` (
  `sifra_kursa` char(6) NOT NULL,
  `email_nastavnik` varchar(255) DEFAULT NULL,
  `naziv` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `godina` int(11) NOT NULL,
  PRIMARY KEY (`sifra_kursa`),
  KEY `nastavnik_fk_idx` (`email_nastavnik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurs`
--

INSERT INTO `kurs` (`sifra_kursa`, `email_nastavnik`, `naziv`, `godina`) VALUES
('a1', 'v@i', 'Softverski inzinjering', 4),
('a21', 'i@m', 'Upravljanje softverskim projektima', 4),
('e1', 'v@i', 'Elektronika', 2),
('m1', 'v@d', 'Mehanika', 1),
('pmi1', 'v@d', 'Prigramiranje web aplikacija', 3),
('primer', 'v@i', 'Softverski inženjering 2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nastavnik`
--

DROP TABLE IF EXISTS `nastavnik`;
CREATE TABLE IF NOT EXISTS `nastavnik` (
  `email_nastavnik` varchar(255) NOT NULL,
  `sifra_nastavnik` varchar(255) NOT NULL,
  `fotografija` varchar(255) NOT NULL DEFAULT '',
  `ime_nastavnik` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime_nastavnik` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`email_nastavnik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nastavnik`
--

INSERT INTO `nastavnik` (`email_nastavnik`, `sifra_nastavnik`, `fotografija`, `ime_nastavnik`, `prezime_nastavnik`) VALUES
('i@m', '1', '', 'Ivan', 'Macuzic'),
('p@p', '1', '', 'Petar', 'Petrovic'),
('v@d', '1', '', 'Vladimir', 'Dunic'),
('v@i', '1', '', 'Velibor', 'Isailovic');

-- --------------------------------------------------------

--
-- Table structure for table `objava`
--

DROP TABLE IF EXISTS `objava`;
CREATE TABLE IF NOT EXISTS `objava` (
  `sifra_kursa` char(6) NOT NULL,
  `nedelja` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) NOT NULL,
  `tip_objave` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`,`sifra_kursa`,`nedelja`),
  KEY `objava_fk_idx` (`sifra_kursa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `odgovor`
--

DROP TABLE IF EXISTS `odgovor`;
CREATE TABLE IF NOT EXISTS `odgovor` (
  `sifra_kursa` char(6) NOT NULL,
  `broj_testa` int(11) NOT NULL,
  `broj_pitanja` int(11) NOT NULL,
  `broj_odgovora` int(11) NOT NULL AUTO_INCREMENT,
  `tekst_odgovora` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `tacan` tinyint(4) NOT NULL,
  PRIMARY KEY (`broj_odgovora`,`broj_pitanja`,`broj_testa`,`sifra_kursa`),
  KEY `pitanje_fk_idx` (`sifra_kursa`,`broj_testa`,`broj_pitanja`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `odgovor`
--

INSERT INTO `odgovor` (`sifra_kursa`, `broj_testa`, `broj_pitanja`, `broj_odgovora`, `tekst_odgovora`, `tacan`) VALUES
('a1', 1, 1, 1, 'da', 1),
('a1', 1, 1, 2, 'ne', 0),
('a1', 2, 2, 3, 'da', 1),
('a1', 2, 2, 4, 'ne', 0),
('a1', 2, 3, 5, 'da', 1),
('a1', 2, 3, 6, 'ne', 0),
('e1', 1, 4, 7, 'da', 1),
('e1', 1, 4, 8, 'ne', 0),
('primer', 1, 5, 9, 'da', 1),
('primer', 1, 5, 10, 'ne', 0),
('primer', 2, 6, 11, 'asd', 1),
('primer', 2, 6, 12, 'asd', 0),
('primer', 3, 7, 13, 'asfas', 1),
('primer', 3, 7, 14, 'asd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pitanje`
--

DROP TABLE IF EXISTS `pitanje`;
CREATE TABLE IF NOT EXISTS `pitanje` (
  `sifra_kursa` char(6) NOT NULL,
  `broj_testa` int(11) NOT NULL,
  `broj_pitanja` int(11) NOT NULL AUTO_INCREMENT,
  `tekst_pitanja` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `poeni` double NOT NULL,
  PRIMARY KEY (`broj_pitanja`,`sifra_kursa`,`broj_testa`),
  KEY `test_fk_idx` (`sifra_kursa`,`broj_testa`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pitanje`
--

INSERT INTO `pitanje` (`sifra_kursa`, `broj_testa`, `broj_pitanja`, `tekst_pitanja`, `poeni`) VALUES
('a1', 1, 1, 'Ko sam ja?', 2),
('a1', 2, 2, '????', 1),
('a1', 2, 3, '????', 0.01),
('e1', 1, 4, '????', 1),
('primer', 1, 5, '????', 1),
('primer', 2, 6, 'lska', 0.01),
('primer', 3, 7, 'asd', 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `prati`
--

DROP TABLE IF EXISTS `prati`;
CREATE TABLE IF NOT EXISTS `prati` (
  `email_student` varchar(255) NOT NULL,
  `sifra_kursa` char(6) NOT NULL,
  PRIMARY KEY (`email_student`,`sifra_kursa`),
  KEY `fk_student_has_kurs_kurs1_idx` (`sifra_kursa`),
  KEY `fk_student_has_kurs_student1_idx` (`email_student`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prati`
--

INSERT INTO `prati` (`email_student`, `sifra_kursa`) VALUES
('d@s', 'a1'),
('djordje@gmail.com', 'a1'),
('d@d', 'm1'),
('d@d', 'primer'),
('j.jovanovic@gmail.com', 'primer'),
('p.petrovic@gmail.com', 'primer');

-- --------------------------------------------------------

--
-- Table structure for table `predaje`
--

DROP TABLE IF EXISTS `predaje`;
CREATE TABLE IF NOT EXISTS `predaje` (
  `email_nastavnik` varchar(255) NOT NULL,
  `sifra_kursa` char(6) NOT NULL,
  PRIMARY KEY (`email_nastavnik`,`sifra_kursa`),
  KEY `fk_nastavnik_has_kurs_kurs1_idx` (`sifra_kursa`),
  KEY `fk_nastavnik_has_kurs_nastavnik1_idx` (`email_nastavnik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predaje`
--

INSERT INTO `predaje` (`email_nastavnik`, `sifra_kursa`) VALUES
('v@i', 'a1'),
('v@i', 'primer');

-- --------------------------------------------------------

--
-- Table structure for table `radio`
--

DROP TABLE IF EXISTS `radio`;
CREATE TABLE IF NOT EXISTS `radio` (
  `email_student` varchar(255) NOT NULL,
  `broj_testa` int(11) NOT NULL,
  `sifra_kursa` char(6) NOT NULL,
  `bodovi` double NOT NULL DEFAULT '-1',
  PRIMARY KEY (`email_student`,`broj_testa`,`sifra_kursa`),
  KEY `fk_student_has_test_test1_idx` (`broj_testa`,`sifra_kursa`),
  KEY `fk_student_has_test_student1_idx` (`email_student`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radio`
--

INSERT INTO `radio` (`email_student`, `broj_testa`, `sifra_kursa`, `bodovi`) VALUES
('d@d', 1, 'a1', 2),
('d@d', 1, 'primer', 1),
('d@d', 2, 'primer', 0.01),
('d@d', 3, 'primer', 0.01),
('d@s', 1, 'a1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `email_student` varchar(255) NOT NULL,
  `sifra_student` varchar(255) NOT NULL,
  `indeks` int(11) NOT NULL,
  `upis` int(11) NOT NULL,
  `fotografija` varchar(255) NOT NULL,
  `ime_student` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime_student` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `godina` int(11) NOT NULL,
  PRIMARY KEY (`email_student`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email_student`, `sifra_student`, `indeks`, `upis`, `fotografija`, `ime_student`, `prezime_student`, `godina`) VALUES
('asd@a', '1', 699, 2017, '', 'Petar', 'Popov', 3),
('d@d', '1', 601, 2017, 'logo_moodle2.png', 'Dimitrije', 'Drobnjak', 4),
('d@s', '1', 602, 2017, '', 'Dejan', 'Stankovic', 4),
('da@da', '1', 606, 2017, '', 'Nemanja', 'Nakic', 4),
('djordje@gmail.com', '1', 646, 2017, 'logo.jpg', 'Djordje', 'Maric', 4),
('j.jovanovic@gmail.com', '1', 604, 2017, '', 'Jovan', 'Jovanović', 4),
('p.petrovic@gmail.com', '1', 602, 2017, '', 'Petar', 'Petrović', 4),
('p@p', '1', 699, 2017, '', 'Petar', 'Petrovic', 4);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `sifra_kursa` char(6) NOT NULL,
  `broj_testa` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL,
  `poeni_svi` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`broj_testa`,`sifra_kursa`),
  KEY `kurs_fk_idx` (`sifra_kursa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`sifra_kursa`, `broj_testa`, `status`, `poeni_svi`) VALUES
('a1', 1, 'onemogucen', 2),
('e1', 1, 'omogucen', 1),
('primer', 1, 'onemogucen', 1),
('a1', 2, 'onemogucen', 1.01),
('primer', 2, 'onemogucen', 0.01),
('a1', 3, 'kreiran', 0),
('primer', 3, 'omogucen', 0.01);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `nastavnik_fk` FOREIGN KEY (`email_nastavnik`) REFERENCES `nastavnik` (`email_nastavnik`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `objava`
--
ALTER TABLE `objava`
  ADD CONSTRAINT `objava_fk` FOREIGN KEY (`sifra_kursa`) REFERENCES `kurs` (`sifra_kursa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `odgovor`
--
ALTER TABLE `odgovor`
  ADD CONSTRAINT `pitanje_fk` FOREIGN KEY (`sifra_kursa`,`broj_testa`,`broj_pitanja`) REFERENCES `pitanje` (`sifra_kursa`, `broj_testa`, `broj_pitanja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pitanje`
--
ALTER TABLE `pitanje`
  ADD CONSTRAINT `test_fk` FOREIGN KEY (`sifra_kursa`,`broj_testa`) REFERENCES `test` (`sifra_kursa`, `broj_testa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prati`
--
ALTER TABLE `prati`
  ADD CONSTRAINT `fk_student_has_kurs_kurs1` FOREIGN KEY (`sifra_kursa`) REFERENCES `kurs` (`sifra_kursa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_kurs_student1` FOREIGN KEY (`email_student`) REFERENCES `student` (`email_student`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `predaje`
--
ALTER TABLE `predaje`
  ADD CONSTRAINT `fk_nastavnik_has_kurs_kurs1` FOREIGN KEY (`sifra_kursa`) REFERENCES `kurs` (`sifra_kursa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nastavnik_has_kurs_nastavnik1` FOREIGN KEY (`email_nastavnik`) REFERENCES `nastavnik` (`email_nastavnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `radio`
--
ALTER TABLE `radio`
  ADD CONSTRAINT `fk_student_has_test_student1` FOREIGN KEY (`email_student`) REFERENCES `student` (`email_student`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_test_test1` FOREIGN KEY (`broj_testa`,`sifra_kursa`) REFERENCES `test` (`broj_testa`, `sifra_kursa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `kurs_fk` FOREIGN KEY (`sifra_kursa`) REFERENCES `kurs` (`sifra_kursa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
