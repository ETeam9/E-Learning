-- ovo su neki test podaci koje sam koristio

--
-- Dumping data for table `nastavnik`
--

INSERT INTO `nastavnik` (`email_nastavnik`, `sifra_nastavnik`, `forografija`, `ime_nastavnik`, `prezime_nastavnik`) VALUES
('i@m', '1', '', 'Ivan', 'Macuzic'),
('p@p', '1', '', 'Petar', 'Petrovic'),
('v@d', '1', '', 'Vladimir', 'Dunic'),
('v@i', '1', '', 'Velibor', 'Isailovic');

-- --------------------------------------------------------

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email_student`, `sifra_student`, `indeks`, `upis`, `fotografija`, `ime_student`, `prezime_student`, `godina`) VALUES
('d@d', '1', 601, 2017, 'download.png', 'Dimitrije', 'Drobnjak', 4),
('d@s', '1', 602, 2017, '', 'Dejan', 'Stankovic', 4),
('da@da', '1', 606, 2017, '', 'Nemanja', 'Nakic', 4),
('j.jovanovic@gmail.com', '1', 604, 2017, '', 'Jovan', 'Jovanović', 4),
('p.petrovic@gmail.com', '1', 602, 2017, '', 'Petar', 'Petrović', 4),
('ps@p', '1', 699, 2017, '', 'Petar', 'Petrovic', 4);

-- --------------------------------------------------------
--
-- Dumping data for table `kurs`
--

INSERT INTO `kurs` (`sifra_kursa`, `email_nastavnik`, `naziv`, `godina`) VALUES
('a1', NULL, 'Softverski inzinjering', 4),
('a21', 'i@m', 'Upravljanje softverskim projektima', 4),
('e1', 'v@i', 'Elektronika', 2),
('m1', 'v@d', 'Mehanika', 1),
('pmi1', 'v@d', 'Prigramiranje web aplikacija', 3),
('primer', 'v@d', 'Softverski inženjering 2', 4);

-- --------------------------------------------------------

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`email_admin`, `sifra_admin`, `ime_admin`) VALUES
('a@a', '1', 'Admin');

--

INSERT INTO `fajl` (`id`, `naziv`, `lokacija`, `tip_fajla`, `sifra_kursa`, `id_sekcije`, `redni_broj`, `vidljivost`) VALUES
(32, 'mn-1.txt', 'fajlovi/60b685f1581705.43042938.txt', 'txt', 'primer', 0, 0, 0),
(33, 'mn2-1.txt', 'fajlovi/60b6861db404b1.06473321.txt', 'txt', 'primer', 1, 0, 0),
(34, 'mn2-2.txt', 'fajlovi/60b6861dccec06.97360461.txt', 'txt', 'primer', 1, 1, 0),
(39, 'mn9-1.txt', 'fajlovi/60b687ce3f7fd0.95245803.txt', 'txt', 'primer', 8, 0, 0),
(40, 'mn10-1.txt', 'fajlovi/60b687ce58a5b7.50437130.txt', 'txt', 'primer', 9, 0, 0),
(41, 'mn10-2.txt', 'fajlovi/60b687ce8b2ff1.80547642.txt', 'txt', 'primer', 9, 1, 0),
(42, 'mn10-3.txt', 'fajlovi/60b687ce9bca33.40341027.txt', 'txt', 'primer', 9, 2, 0);
