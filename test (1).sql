-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : mar. 28 sep. 2021 à 09:58
-- Version du serveur : 8.0.26
-- Version de PHP : 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210918192213', '2021-09-18 19:22:30', 537);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `status`, `create_at`, `updated_at`) VALUES
(4, 'panier', '2021-09-22 09:08:45', '2021-09-22 15:06:06'),
(5, 'panier', '2021-09-23 07:48:18', '2021-09-23 07:48:32'),
(6, 'panier', '2021-09-24 07:56:32', '2021-09-24 13:42:45'),
(7, 'panier', '2021-09-24 13:45:38', '2021-09-24 14:22:23'),
(8, 'panier', '2021-09-27 09:05:33', '2021-09-27 09:07:57'),
(9, 'panier', '2021-09-27 13:32:16', '2021-09-27 13:32:16');

-- --------------------------------------------------------

--
-- Structure de la table `order_item`
--

CREATE TABLE `order_item` (
  `id` int NOT NULL,
  `pizza_id` int NOT NULL,
  `order_ref_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_item`
--

INSERT INTO `order_item` (`id`, `pizza_id`, `order_ref_id`, `quantity`) VALUES
(4, 2, 4, 5),
(5, 1, 4, 4),
(6, 1, 5, 2),
(7, 2, 5, 2),
(8, 1, 6, 7),
(9, 2, 6, 16),
(10, 1, 7, 7),
(11, 2, 7, 3),
(12, 2, 8, 2),
(13, 1, 8, 3),
(14, 2, 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

CREATE TABLE `pizza` (
  `id` int NOT NULL,
  `couleur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taille` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pizza`
--

INSERT INTO `pizza` (`id`, `couleur`, `taille`, `details`, `prix`, `nom`, `image`) VALUES
(1, 'blanche', 'grande', 'Tomate, Fromage, Camembert, Chèvre, Mozzarella', 10.99, '4 Fromages', '../assets/min_produits/4_fromages.jpg'),
(2, 'rouge', 'petite', 'Pêche, Chocolat Kinder, Compote, Saucisse', 1900, 'Lolaza', '../assets/min_produits/Lolaza.jpg'),
(3, 'rouge', 'grande', 'Tomate, Fromage, Crème fraîche, Mozzarella', 12.99, 'Norvegienne', '../assets/min_produits/Norvegienne.jpg'),
(4, 'blanche', 'petite', 'Fromage, Chèvre, Crème fraîche, Miel, Noix', 12, 'Chèvre-miel', '../assets/min_produits/chevre_miel.jpg'),
(5, 'rouge', 'grande', 'Tomate, Fromages, Olives, Anchois, Mozzarella', 11, 'Margherita', '../assets/min_produits/Margherita.jpg'),
(6, 'rouge', 'grande', 'Pesto, Mozzarella, Poulet, Pignons, Miel', 14, 'Pesto-poulet', '../assets/min_produits/pesto_poulet.jpg'),
(7, 'rouge', 'grande', 'Tomate, Fromages, Lardons, Oignons, Poivron rouge', 15.5, 'Royale', '../assets/min_produits/Royale.jpg'),
(8, 'rouge', 'petite', 'Tomate, Fromage, Poivron rouge, Aubergines grillée', 13, 'Spéciale', '../assets/min_produits/Speciale.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `tel`, `rue`, `cp`, `ville`) VALUES
(2, 'jeanpascal@lagitateur.com', '[]', '$2y$13$ynWm0ZsQiEgpx5BSYSxjUuBqCMrwOhTKpvXfD1IywijwdB9ReOIba', 'lagitateur', 'jeanpascal', '0605040102', 'eaezaea', 34851, 'Montpellier'),
(3, 'seb@seb', '[]', '$2y$13$c6CGXal9SMbeMuDCqW00/.yrvo.GWhg5MwpdOVYWo.lCLCeRl/KV.', 'seb', 'seb', '0661554477', 'chez moi', 34800, 'encore chez moi'),
(4, 'prout@prout.com', '[]', '$2y$13$PgzxN4JxiXUBnRhb6jd7aer7dsVhg0nEvBbfs6Akrl22nlYszOvny', 'fart', 'fort', '0661554477', 'chez moi', 68452, 'Montpellier');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_52EA1F094584665A` (`pizza_id`),
  ADD KEY `IDX_52EA1F09E238517C` (`order_ref_id`);

--
-- Index pour la table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `FK_52EA1F094584665A` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id`),
  ADD CONSTRAINT `FK_52EA1F09E238517C` FOREIGN KEY (`order_ref_id`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
