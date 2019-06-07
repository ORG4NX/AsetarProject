-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 07, 2019 at 02:51 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ASETAR08`
--

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE `Articles` (
                            `id` int(11) NOT NULL,
                            `name` varchar(100) NOT NULL,
                            `description` varchar(250) NOT NULL,
                            `price` float NOT NULL,
                            `image` text NOT NULL,
                            `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(1, 'T-Shirt AEM', 'Arborez ce magnifique t-shirt aux couleurs de l\'association!', 15, 'm1.png', 3),
(2, 'Sweat AEM', 'Arborez ce magnifique sweat aux couleurs de l\'association!', 30, 'm2.png', 3),
(3, 'Porte-clé AEM', 'Arborez ce magnifique porte-clé aux couleurs de l\'association!', 7.5, 'm3.png', 3),
(4, 'Tournoi Futsal', 'Vous pouvez inscrire votre équipe de 5 personnes + 2 de remplacent optionnels au tournoi de futsal qui à lieu mercredi 3 avril 2019 de 15h à 18h à l\'air couverte de la Warenne', 5, 'e1.png', 1),
(5, 'Bubble Foot', 'Vous pouvez vous inscrire au tournoi de Bubble Foot qui à lieu 23 mars 2019 de 13h à 19h au gymnase Rouget de Lisle.', 5, 'e2.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Membre`
--

CREATE TABLE `Membre` (
                          `id` int(100) NOT NULL,
                          `login` varchar(30) NOT NULL,
                          `pw` text NOT NULL,
                          `nom` varchar(30) NOT NULL,
                          `prenom` varchar(30) NOT NULL,
                          `email` varchar(30) NOT NULL,
                          `type_acces` int(2) NOT NULL,
                          `date_error_log` datetime DEFAULT NULL,
                          `date_modif` datetime DEFAULT NULL,
                          `date_connec` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Membre`
--

INSERT INTO `Membre` (`id`, `login`, `pw`, `nom`, `prenom`, `email`, `type_acces`, `date_error_log`, `date_modif`, `date_connec`) VALUES
(75, 'Admin', 'secret', 'ASETAR08', 'Administrateur', 'admin@asetar08.fr', 1, NULL, '2019-05-31 15:02:00', NULL),
(76, 'achtal', 'achtal', 'Talon', 'Achille', 'achtal@gmail.com', 3, NULL, '2019-06-07 13:42:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Services`
--

CREATE TABLE `Services` (
                            `id` int(11) NOT NULL,
                            `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Services`
--

INSERT INTO `Services` (`id`, `name`) VALUES
(1, 'Evenements'),
(2, 'Tournois'),
(3, 'Goodies');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Articles`
--
ALTER TABLE `Articles`
    ADD PRIMARY KEY (`id`),
    ADD KEY `category` (`category`);

--
-- Indexes for table `Membre`
--
ALTER TABLE `Membre`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Services`
--
ALTER TABLE `Services`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Articles`
--
ALTER TABLE `Articles`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Membre`
--
ALTER TABLE `Membre`
    MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `Services`
--
ALTER TABLE `Services`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Articles`
--
ALTER TABLE `Articles`
    ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category`) REFERENCES `Services` (`id`);