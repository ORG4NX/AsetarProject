SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ASETAR08`
--
CREATE DATABASE IF NOT EXISTS `ASETAR08` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ASETAR08`;

-- --------------------------------------------------------

--
-- Structure de la table `Articles`
--

CREATE TABLE `Articles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Articles`
--

INSERT INTO `Articles` (`id`, `name`, `description`, `price`, `image`, `category`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'T-Shirt AEM', 'Arborez ce magnifique t-shirt aux couleurs de l\'association!', '15.00', 'm1.png', 3, 100, '2024-11-03 19:45:20', '2024-11-03 19:45:20'),
(2, 'Sweat AEM', 'Arborez ce magnifique sweat aux couleurs de l\'association!', '30.00', 'm2.png', 3, 50, '2024-11-03 19:45:20', '2024-11-03 19:45:20'),
(3, 'Porte-clé AEM', 'Arborez ce magnifique porte-clé aux couleurs de l\'association!', '7.50', 'm3.png', 3, 200, '2024-11-03 19:45:20', '2024-11-03 19:45:20'),
(4, 'Tournoi Futsal', 'Vous pouvez inscrire votre équipe de 5 personnes + 2 de remplacent optionnels au tournoi de futsal qui à lieu mercredi 3 avril 2019 de 15h à 18h à l\'air couverte de la Warenne', '5.00', 'e1.png', 1, 50, '2024-11-03 19:45:20', '2024-11-03 19:45:20'),
(5, 'Bubble Foot', 'Vous pouvez vous inscrire au tournoi de Bubble Foot qui ï¿½ lieu 23 mars 2019 de 13h ï¿½ 19h au gymnase Rouget de Lisle.', '5.00', 'e2.png', 1, 30, '2024-11-03 19:45:20', '2024-11-03 19:59:01');

-- --------------------------------------------------------

--
-- Structure de la table `Membre`
--

CREATE TABLE `Membre` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type_acces` tinyint(1) NOT NULL DEFAULT 3,
  `date_last_conn` datetime DEFAULT NULL,
  `date_register` datetime NOT NULL DEFAULT current_timestamp(),
  `date_error_log` datetime DEFAULT NULL,
  `date_modif` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Membre`
--

INSERT INTO `Membre` (`id`, `login`, `pw`, `nom`, `prenom`, `email`, `type_acces`, `date_last_conn`, `date_register`, `date_error_log`, `date_modif`) VALUES
(1, 'Admin', '$2y$10$BZ3fU3Ece.G8tjEk7kzUh.jf.tjyipZwP851/b1OHOjojBCMSEyh6', 'Lagaffe', 'Gaston', 'admin@asetar08.fr', 1, NULL, '2024-11-03 11:51:00', NULL, '2024-11-03 11:55:29'),
(2, 'Mimi', '$2y$10$CA.bO5HNnh7woU43ZUMOwer5ejx46zKbfTF0NY8DVf898l1bcN0N6', 'Mimi', 'Momo', 'miaou@gmail.com', 2, NULL, '2024-11-03 11:51:38', NULL, '2024-11-03 11:55:32');

-- --------------------------------------------------------

--
-- Structure de la table `Services`
--

CREATE TABLE `Services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Services`
--

INSERT INTO `Services` (`id`, `name`) VALUES
(1, 'Événements'),
(2, 'Tournois'),
(3, 'Goodies');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `Membre`
--
ALTER TABLE `Membre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_type_acces` (`type_acces`);

--
-- Index pour la table `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Membre`
--
ALTER TABLE `Membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Services`
--
ALTER TABLE `Services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `fk_article_category` FOREIGN KEY (`category`) REFERENCES `Services` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
