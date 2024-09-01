
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 01 sep. 2024 à 19:49
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cosmos_x_doc`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `icon_color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `firstName`, `lastName`, `Content`, `icon_color`) VALUES
(1, 'cheikh', 'ndiaye', 'bonjours et merci', ''),
(2, 'Sali', 'Kane', 'Je suis ravie de ce progré maintenant je ne vais plus courrire dérriere mes ennée pour des documment de leur année. merci et bon courage', '');

-- --------------------------------------------------------

--
-- Structure de la table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `download_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `nameFile` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `level` enum('licence1','licence2','licence3','master1','master2') NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `nameFile`, `description`, `level`, `file_path`, `uploaded_date`) VALUES
(35, 'poo td', 'sdf', 'licence1', '/docs/Epreuve POO1 S4 (2).pdf', '2024-08-20 22:11:22'),
(36, 'fichier test', 'dqs\r\n', 'licence1', 'C:\\xampp\\htdocs\\file\\src../../docs/Capture d’écran 2024-08-03 201753.png', '2024-08-30 00:04:38'),
(37, 'fichier test1', 'sdqf', 'licence2', 'C:\\xampp\\htdocs\\file\\src../../docs/1f.png', '2024-08-30 00:08:14');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `studyPath` varchar(100) DEFAULT NULL,
  `level` enum('licence1','licence2','licence3','master1','master2') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `email`, `studyPath`, `level`, `password`, `created_at`, `is_admin`, `updated_at`) VALUES
(1, 'Jean', 'Dupont', 'jean.dupont@example.com', 'Informatique', 'licence1', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', '2024-06-08 04:04:39', 0, '2024-08-16 00:43:06'),
(2, 'Marie', 'Curie', 'marie.curie@example.com', 'Physique Chimie', 'master2', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', '2024-06-08 04:04:39', 0, '2024-08-16 00:43:06'),
(9, 'Hawa', 'Sambe', 'sambe123@hotmail.com', 'Physique Chimie', 'master1', '$2y$10$xmvVyIzP091IfUYUAnSso.x8nakNVES5fPkauPEdyjW25YaqN2V2i', '2024-08-18 23:44:04', 0, '2024-08-19 00:44:04'),
(10, 'Issa', 'Cissé', 'cissa@hotmail.fr', 'Physique Chimie', 'licence1', '$2y$10$bcDH0aqUuFjOH5Htqg8O9O.V01A.MJ/V.rjqrbrqOmgWWAZ//xRhW', '2024-08-18 23:46:48', 0, '2024-08-19 00:46:48'),
(11, 'Habiba', 'Camara', 'hhs@h.com', 'Informatique', 'licence1', '$2y$10$aEPCxu3FP74ORz17taG2YuJvRFZ/8nSMfgdzhoagW4ySOiuohJsY2', '2024-08-18 23:49:01', 0, '2024-08-19 00:49:01'),
(12, 'Sofia', 'Mbaye', 'mbaye105@gmail.us', 'Maths Informatique', 'licence3', '$2y$10$HWQfJnNEe7JriucoufxjjOlXiEC2pEiplbA9lclOLCRZrOvDNpnnK', '2024-08-18 23:52:46', 0, '2024-08-19 00:52:46'),
(13, 'Lisa', 'Diop Lô', 'diopmd@5gmail.com', 'Maths Informatique', 'licence2', '$2y$10$oTT6NPmZWhR3aFztRWIBaOPC27oLy0OxONe3LvFNth63Lfy2VUbTW', '2024-08-19 02:02:29', 0, '2024-08-19 03:02:29'),
(14, 'Sali', 'Kane', 'dada14@gmail.com', 'Informatique', 'licence3', '$2y$10$4H0fWUQ5whDr3zOVqbYntOq0PYqg1m4M7ZriKOWpECG4qTdjfD2HS', '2024-08-19 18:46:15', 0, '2024-08-19 19:46:15'),
(15, 'Salie', 'Kanes', 'dadda14@gmail.com', 'Informatique', 'licence3', '$2y$10$AMyLSPWACx8CndRny6LId.qT/oVAAw6ygoQsJN0lCz09CYbhsgP8O', '2024-08-19 19:29:13', 0, '2024-08-19 20:29:13'),
(16, 'Sofia', 'ba', 'ba@hotmail.sn', 'Maths Informatique', 'licence1', '$2y$10$tnIaXhkhUMWXmdXq.cyaMe0lXWIE8Vnze6AbFOqoMMi7EJTRt8z2i', '2024-08-19 20:11:04', 0, '2024-08-19 21:11:04'),
(17, 'Sofia', 'ba', 'sba@hotmail.sn', 'Informatique', 'licence2', '$2y$10$sPTXODLB7ENTP..5oAy.I.s9ejqk11DMwNQfKoQauU6tAisxyAiNK', '2024-08-19 20:14:25', 0, '2024-08-19 21:14:25'),
(19, 'Cheikh', 'Ndiaye', 'cn72dh@gmail.com', 'Informatique', 'licence3', '$2y$10$cSqmg02/YGOD4dMn43lhbuz6A3s32BI3pJlWOuJVCtOp4cJK9ML9i', '2024-08-21 00:59:01', 0, '2024-08-21 01:59:01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
