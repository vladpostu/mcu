-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Gen 27, 2022 alle 08:42
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcu`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `featuring`
--

CREATE TABLE `featuring` (
  `id_feature` int(11) NOT NULL,
  `movie` int(11) NOT NULL,
  `superhero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `featuring`
--

INSERT INTO `featuring` (`id_feature`, `movie`, `superhero`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 4, 3),
(5, 5, 4),
(6, 6, 1),
(7, 6, 2),
(8, 6, 3),
(9, 6, 4),
(10, 6, 5),
(12, 1, 1),
(15, 4, 2),
(16, 3, 3),
(17, 3, 3),
(18, 3, 3),
(21, 79, 23),
(22, 13, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `movies`
--

CREATE TABLE `movies` (
  `id_movie` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `running_time` int(11) NOT NULL,
  `release_date` date NOT NULL,
  `director` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `movies`
--

INSERT INTO `movies` (`id_movie`, `title`, `running_time`, `release_date`, `director`) VALUES
(1, 'Iron Man', 126, '2008-05-02', 'Jon Favreau'),
(2, 'The incredible Hulk', 126, '2008-06-13', 'Louis Leterrier'),
(3, 'Iron Man 2', 127, '2010-05-07', 'Jon Favreau'),
(4, 'Thor', 114, '2011-05-06', 'Kenneth Branagh'),
(5, 'Captain Americe the first Avenger', 124, '2011-07-22', 'Joe Johnston'),
(6, 'Marvel\'s The Avengers', 143, '2012-05-04', 'Joss Whedon'),
(8, 'Iron Man 3', 170, '2013-05-03', 'Shane Black'),
(9, 'Thor: The Dark World', 112, '2013-11-20', 'Alan Taylor'),
(10, 'Captain America: The Winter Soldier', 124, '2014-04-04', 'Anthony e Joe Russo'),
(11, 'Guardiani della Galassia', 122, '2014-10-22', 'James Gunn'),
(12, 'Avengers: Age of Ultron', 144, '2015-04-25', 'Joss Whedon'),
(13, 'Ant-Man', 117, '2015-08-12', 'Peyton Reed'),
(75, 'Black Widow', 133, '2021-08-09', 'Cate Shortland'),
(79, 'Spider-Man: Homecoming', 120, '2017-07-07', 'Jon Watts');

-- --------------------------------------------------------

--
-- Struttura della tabella `superheroes`
--

CREATE TABLE `superheroes` (
  `id_superhero` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `powers` varchar(100) NOT NULL,
  `power_ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `superheroes`
--

INSERT INTO `superheroes` (`id_superhero`, `name`, `powers`, `power_ranking`) VALUES
(1, 'Iron Man', 'Armatura, Vola', 8),
(2, 'Hulk', 'Super forza', 10),
(3, 'Thor', 'Dio del tuono', 10),
(4, 'Captain America', 'Super forza, Scudo in vibranio', 8),
(5, 'Black Widow', 'Agente segreta ', 6),
(6, 'Hawk eye', 'Agente segreto, Arco e frecce', 6),
(7, 'Ant-Man', 'Rimpicciolimento, Ingrandimento fino a 30 metri, Comunicazione con le formiche', 6),
(17, 'Occhio di Falco', 'Forza, Velocità', 7),
(23, 'Spiderman', 'Agilità, forza', 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'vlad', '$2y$10$PSSYLA6obJii6gbRXxUPsO3h2jm9Xw6s4EkXkhwryWEoaZ2elEWOS');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `featuring`
--
ALTER TABLE `featuring`
  ADD PRIMARY KEY (`id_feature`),
  ADD KEY `feature` (`superhero`),
  ADD KEY `appearance` (`movie`);

--
-- Indici per le tabelle `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indici per le tabelle `superheroes`
--
ALTER TABLE `superheroes`
  ADD PRIMARY KEY (`id_superhero`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `featuring`
--
ALTER TABLE `featuring`
  MODIFY `id_feature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `movies`
--
ALTER TABLE `movies`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT per la tabella `superheroes`
--
ALTER TABLE `superheroes`
  MODIFY `id_superhero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `featuring`
--
ALTER TABLE `featuring`
  ADD CONSTRAINT `appearance` FOREIGN KEY (`movie`) REFERENCES `movies` (`id_movie`),
  ADD CONSTRAINT `feature` FOREIGN KEY (`superhero`) REFERENCES `superheroes` (`id_superhero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
