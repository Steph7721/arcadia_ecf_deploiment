-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 mai 2024 à 10:54
-- Version du serveur : 8.0.36
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arcadia_ecf`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id` int NOT NULL,
  `race_id` int DEFAULT NULL,
  `habitat_id` int DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image_size` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id`, `race_id`, `habitat_id`, `prenom`, `image_name`, `image_size`, `updated_at`) VALUES
(1, 1, 1, 'Paul', 'alligator-6645fc8318d54574745847.jpg', 581170, '2024-05-16 14:30:59'),
(2, 2, 2, 'Henry', 'anaconda-6645fc9263c36560663281.jpg', 148860, '2024-05-16 14:31:14'),
(3, 3, 2, 'Pascal', 'ara-6645fca2325ff020195011.jpg', 339858, '2024-05-16 14:31:30'),
(4, 4, 1, 'Timon', 'crapaud-6645fcc302a8a613142422.jpg', 212392, '2024-05-16 14:32:03'),
(5, 5, 1, 'Jackie', 'crocodile-6645fcd340d56403885510.jpg', 36761, '2024-05-16 14:32:19'),
(6, 6, 3, 'Dumbo', 'elephant-6645fce3ce9c8532474778.jpg', 121150, '2024-05-16 14:32:35'),
(7, 7, 2, 'King', 'gorille-6645fd1071985389547012.jpg', 62537, '2024-05-16 14:33:20'),
(8, 8, 3, 'Jerome', 'guepard-6645fd24e8d80323746090.jpg', 128608, '2024-05-16 14:33:40'),
(9, 9, 3, 'Simba', 'lion-6645fd38943b4488448003.jpg', 105881, '2024-05-16 14:34:00'),
(10, 10, 2, 'Flash', 'paresseux-6645fd5254e7d597578871.jpg', 108229, '2024-05-16 14:34:26'),
(11, 11, 3, 'Albert', 'rhinoceros-6645fd649f2b6310130837.jpg', 430978, '2024-05-16 14:34:44');

-- --------------------------------------------------------

--
-- Structure de la table `arcadia`
--

CREATE TABLE `arcadia` (
  `id` int NOT NULL,
  `description` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `open_horaire` time NOT NULL,
  `close_horaire` time NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `arcadia`
--

INSERT INTO `arcadia` (`id`, `description`, `open_horaire`, `close_horaire`, `email`, `telephone`, `adresse`, `ville`) VALUES
(1, '<div>Bienvenue sur le site du parc zoologique d\'Arcadia.<br>En bretagne depuis 1960, près de la forêt de Brocéliande.</div>', '10:00:00', '19:00:00', 'contact@arcadia.com', '01 07 07 23 23', '3 rue de la forêt', '35380 Paimpont');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int NOT NULL,
  `content` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `rgpd` tinyint(1) NOT NULL,
  `arcadia_id` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `content`, `active`, `email`, `pseudo`, `created_at`, `rgpd`, `arcadia_id`, `parent_id`) VALUES
(1, 'test', 1, 'test@test.com', 'test', '2024-05-15 15:42:58', 1, 1, NULL),
(2, 'test2', 1, 'test@test.com', 'test2', '2024-05-15 15:43:36', 1, 1, NULL),
(3, 'test3', 1, 'test@test.com', 'test', '2024-05-16 14:57:56', 1, 1, NULL),
(4, 'test4', 1, 'test@test.com', 'test', '2024-05-16 14:59:13', 1, 1, NULL),
(5, 'test', 0, 'test@test.com', 'test', '2024-05-17 10:50:13', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `envoye` tinyint(1) NOT NULL,
  `rgpd` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `message`, `created_at`, `envoye`, `rgpd`) VALUES
(1, 'stephen', 'stephen.test@mail.com', 'test', '2024-05-16 14:59:30', 0, 1),
(2, 'stephen', 'stephen.test@mail.com', 'test2', '2024-05-16 15:02:30', 0, 1),
(3, 'stephen', 'stephen.test@mail.com', 'test2', '2024-05-16 15:02:30', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240515111651', '2024-05-15 13:16:58', 36),
('DoctrineMigrations\\Version20240515111936', '2024-05-15 13:19:48', 18),
('DoctrineMigrations\\Version20240515122436', '2024-05-15 14:24:44', 18),
('DoctrineMigrations\\Version20240515125719', '2024-05-15 14:57:26', 17),
('DoctrineMigrations\\Version20240515131549', '2024-05-15 15:15:53', 116),
('DoctrineMigrations\\Version20240515142217', '2024-05-15 16:22:22', 96),
('DoctrineMigrations\\Version20240515142417', '2024-05-15 16:24:20', 24),
('DoctrineMigrations\\Version20240515142505', '2024-05-15 16:25:08', 90),
('DoctrineMigrations\\Version20240516103614', '2024-05-16 12:36:59', 25),
('DoctrineMigrations\\Version20240516115431', '2024-05-16 13:54:39', 16),
('DoctrineMigrations\\Version20240516120314', '2024-05-16 14:03:19', 33),
('DoctrineMigrations\\Version20240516121427', '2024-05-16 14:14:34', 122),
('DoctrineMigrations\\Version20240516124009', '2024-05-16 14:40:16', 17),
('DoctrineMigrations\\Version20240516125013', '2024-05-16 14:50:21', 15),
('DoctrineMigrations\\Version20240516133951', '2024-05-16 15:40:00', 270);

-- --------------------------------------------------------

--
-- Structure de la table `habitat`
--

CREATE TABLE `habitat` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `commentaire_habitat` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image_size` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `habitat`
--

INSERT INTO `habitat` (`id`, `nom`, `description`, `commentaire_habitat`, `image_name`, `image_size`, `updated_at`) VALUES
(1, 'Marais', '<div>Dans un atmosphère humide, marécageuse et avec une végétation dense, découvrez les différentes espèces qui peuplent les marais</div>', NULL, 'marais-6645f60b7e7a5249745387.jpg', 463105, '2024-05-16 14:03:23'),
(2, 'Jungle', '<div>Qui dit jungle, dit forêt!&nbsp;<br>Tentez d\'apercevoir un paresseux, un ara, ou bien un anaconda se prélasser sur une branche.</div>', NULL, 'jungle-6645fc5940db3102694612.jpg', 546324, '2024-05-16 14:30:17'),
(3, 'Savane', '<div>Dans ce coté aride du parc vous pourrez observer des félins indomptables, des rhinocéros et leur cornes majestueuses ou des éléphants manger grâce a leur trompes</div>', NULL, 'savane-6645f66bb9ff1943993251.jpg', 104010, '2024-05-16 14:04:59');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `race`
--

INSERT INTO `race` (`id`, `nom`) VALUES
(1, 'Alligator'),
(2, 'Anaconda'),
(3, 'Ara'),
(4, 'Crapaud'),
(5, 'Crocodile'),
(6, 'Elephant'),
(7, 'Gorille'),
(8, 'Guepard'),
(9, 'Lion'),
(10, 'Paresseux'),
(11, 'Rhinoceros');

-- --------------------------------------------------------

--
-- Structure de la table `rapport_employe`
--

CREATE TABLE `rapport_employe` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `animal_id` int DEFAULT NULL,
  `date` datetime NOT NULL,
  `repas_donne` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `grammage_donne` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `rapport_employe`
--

INSERT INTO `rapport_employe` (`id`, `user_id`, `animal_id`, `date`, `repas_donne`, `grammage_donne`) VALUES
(1, 1, 1, '2024-05-16 17:10:00', 'viande crue', 1500),
(2, 14, 4, '2024-05-16 21:18:00', 'viande crue', 150);

-- --------------------------------------------------------

--
-- Structure de la table `rapport_veterinaire`
--

CREATE TABLE `rapport_veterinaire` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `animal_id` int DEFAULT NULL,
  `animaletat_id` int DEFAULT NULL,
  `date` date NOT NULL,
  `detail` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `repas_conseille` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `grammage_conseille` int NOT NULL,
  `etat` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `rapport_veterinaire`
--

INSERT INTO `rapport_veterinaire` (`id`, `user_id`, `animal_id`, `animaletat_id`, `date`, `detail`, `repas_conseille`, `grammage_conseille`, `etat`) VALUES
(1, 1, 1, NULL, '2024-05-16', 'test', 'test', 9000, 'test'),
(2, 1, 1, NULL, '2024-05-16', 'test2', 'test2', 10, 'test2'),
(3, 1, 1, NULL, '2024-05-16', 'test2', 'test2', 10, 'test2'),
(4, 1, 1, NULL, '2024-05-16', 'test', 'test2', 41, 'test2');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `role_nom` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `nom`, `role_nom`, `status`) VALUES
(2, 'Employé', 'ROLE_USER', 1),
(3, 'Vétérinaire', 'ROLE_VETERINAIRE', 1),
(4, 'Admin', 'ROLE_ADMIN', 1);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image_size` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `nom`, `description`, `image_name`, `image_size`, `updated_at`) VALUES
(1, 'Guides', '<div>Pensez a demander l\'accompagnement de l\'un nos guides et profitez de leur expériences<br>pour récolter un maximum d’information sur nos espèces.<br>Avec la possibilité de nourrir des animaux si le moment le permet!</div>', 'guides-6645fffd80cf3825311380.jpg', 104574, '2024-05-16 14:45:49'),
(2, 'Garden restaurant', '<div>Vous n’avez pas fini votre tour mais une petite pause s’impose ?<br>Venez vous ressourcer dans notre bar restaurant. Et manger en étant entouré par les animaux!</div>', 'garden-restaurant-66460014196cf792891986.jpg', 166953, '2024-05-16 14:46:12'),
(3, 'Safari train', '<div>Faites la visite du parc avec notre train,&nbsp;<br>vous verrez le parc sous un nouvel angle et pourrez faire des photos d’un autre panorama.</div>', 'safari-train-6646002daa13d652956429.jpg', 155882, '2024-05-16 14:46:37');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb3_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom`, `prenom`) VALUES
(1, 'admin@test.com', '[\"ROLE_ADMIN\"]', '$2y$13$EeeiVxGL.yvkwwZ0rfMb6uWgM/1pI1CmQXqKV/CKHxBNmk0GgR2GG', 'Laforêt', 'José'),
(5, 'user@test.com', '[]', '$2y$13$WP63mj0AAdg5iFzn5WxBgOGvbx3FSZYwcoEC.OHgFbb/IvX7prD0K', 'Larue', 'Pedro'),
(14, 'veterinaire@test.com', '[]', '$2y$13$j005reBloLhkoMox6AuzHOPEPg8Jj5QBsvefKTT6tc7hYAB47dNNO', 'Henry', 'Richard');

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(1, 4),
(5, 2),
(14, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6AAB231F6E59D40D` (`race_id`),
  ADD KEY `IDX_6AAB231FAFFE2D26` (`habitat_id`);

--
-- Index pour la table `arcadia`
--
ALTER TABLE `arcadia`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8F91ABF06D82D856` (`arcadia_id`),
  ADD KEY `IDX_8F91ABF0727ACA70` (`parent_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rapport_employe`
--
ALTER TABLE `rapport_employe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_83D4B3DAA76ED395` (`user_id`),
  ADD KEY `IDX_83D4B3DA8E962C16` (`animal_id`);

--
-- Index pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CE729CDEA76ED395` (`user_id`),
  ADD KEY `IDX_CE729CDE8E962C16` (`animal_id`),
  ADD KEY `IDX_CE729CDE4E9CA4A0` (`animaletat_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- Index pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `IDX_2DE8C6A3A76ED395` (`user_id`),
  ADD KEY `IDX_2DE8C6A3D60322AC` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `arcadia`
--
ALTER TABLE `arcadia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `habitat`
--
ALTER TABLE `habitat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `rapport_employe`
--
ALTER TABLE `rapport_employe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `FK_6AAB231F6E59D40D` FOREIGN KEY (`race_id`) REFERENCES `race` (`id`),
  ADD CONSTRAINT `FK_6AAB231FAFFE2D26` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`id`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `FK_8F91ABF06D82D856` FOREIGN KEY (`arcadia_id`) REFERENCES `arcadia` (`id`),
  ADD CONSTRAINT `FK_8F91ABF0727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `avis` (`id`);

--
-- Contraintes pour la table `rapport_employe`
--
ALTER TABLE `rapport_employe`
  ADD CONSTRAINT `FK_83D4B3DA8E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `FK_83D4B3DAA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  ADD CONSTRAINT `FK_CE729CDE4E9CA4A0` FOREIGN KEY (`animaletat_id`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `FK_CE729CDE8E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `FK_CE729CDEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `FK_2DE8C6A3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2DE8C6A3D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
