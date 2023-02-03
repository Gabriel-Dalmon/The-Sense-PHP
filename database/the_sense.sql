-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 30 Janvier 2023 à 13:44
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `the_sense`
--
CREATE DATABASE IF NOT EXISTS `the_sense` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `the_sense`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `headline` varchar(1023) NOT NULL,
  `content` varchar(2047) NOT NULL,
  `thumbnail` varchar(1023) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `components`
--

CREATE TABLE `components` (
  `id` int(15) NOT NULL,
  `page_id` int(15) NOT NULL,
  `type` varchar(63) NOT NULL,
  `content` varchar(2047) NOT NULL,
  `name` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `components`
--

INSERT INTO `components` (`id`, `page_id`, `type`, `content`, `name`) VALUES
(1, 1, 'headline', 'Qu\'est-ce que The Sense ?', 'h1'),
(2, 1, 'paragraph', 'Voyagez, explorez, découvrez LIGHT ROOM ! Découvrez des paysages somptueux et des histoires palpipante dans cette salle accessible pour toute la famille. Ici tout n’est qu’affaire d’émotions et de beauté, explorer les décors de nos expériences et partez à l’aventure en famille ou entre amis à partir de 12 ans. Il ne vous reste plus qu’à franchir le seuil de la LIGHT ROOM et à vous laissez transporter dans un voyage époustouflant. Vos émotions n’attendent que vous !', 'room-introduction'),
(3, 1, 'headline', 'PRENEZ PART AU VOYAGE', 'h2-1');

-- --------------------------------------------------------

--
-- Structure de la table `discount`
--

CREATE TABLE `discount` (
  `id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `transaction_id` int(15) NOT NULL,
  `code` varchar(31) NOT NULL,
  `type` int(15) NOT NULL,
  `discount_value` int(15) NOT NULL,
  `available_date` varchar(15) NOT NULL,
  `expiration_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(15) NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(2047) NOT NULL,
  `duration` varchar(15) NOT NULL,
  `player_amount` varchar(7) NOT NULL,
  `banner` varchar(1023) NOT NULL,
  `pegi` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `experiences`
--

INSERT INTO `experiences` (`id`, `page_id`, `name`, `description`, `duration`, `player_amount`, `banner`, `pegi`) VALUES
(1, 1, 'SHANGRI-LA : LA CITÉ PERDUE DE Z', 'Shangri-La la cité mythique, symbole de paix, de prospérité et de magnificence. Personne n\'a apparemment pu se rendre en ce lieu\ndepuis des décennies ou prouver son existence, du moins depuis votre découverte ! Aventurez-vous au plus profond des légendes,\nentrez dans la cité de Z avec votre équipe et explorez les lieux à la recherche de Percy Fawcett.', '60-90 MIN', '2 à 4', 'https://', 'NULL'),
(3, 1, 'NORDRËNN : LA LÉGENDE DE LA GLACE', 'Dans le froid du royaume de Nordrënn, il est une légende qui raconte comment un guerrier obtint la force de l’ours et la clairvoyance du corbeau. Il est dit que pour conquérir la femme qu’il aimait, cet homme parti à la recherche du trône d’Odin, artefact perdu depuis des années, qui offrait, disait-on, le pouvoir du Père de Toute Chose. Le guerrier parti et ne revint jamais ; on raconte qu’il aurait trouvé le trône mais, qu’avide de son pouvoir il ne le quitta plus. Partez à la découverte du royaume glacé de Nordrënn et retrouvez le guerrier de la légende.', '90 - 120 MIN', '2 à 4', 'templates/assets/image_65.svg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(15) NOT NULL,
  `name` varchar(31) NOT NULL,
  `template` varchar(63) NOT NULL,
  `language` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`id`, `name`, `template`, `language`) VALUES
(1, 'lightroom', 'room', 'fr'),
(2, 'darkroom', 'room', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(15) NOT NULL,
  `experience_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `type` varchar(31) NOT NULL,
  `content` varchar(2047) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(15) NOT NULL,
  `experience_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `date` varchar(15) NOT NULL,
  `players_amount` int(2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(15) NOT NULL,
  `reservation_id` int(15) NOT NULL,
  `date` varchar(15) NOT NULL,
  `raw_price` int(15) NOT NULL,
  `payment_method` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `username` varchar(31) NOT NULL,
  `email` varchar(63) NOT NULL,
  `phone_number` int(31) DEFAULT NULL,
  `password` varchar(63) NOT NULL,
  `status` varchar(31) NOT NULL DEFAULT 'default',
  `discount_points` int(2) DEFAULT NULL,
  `newsletter_sub` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone_number`, `password`, `status`, `discount_points`, `newsletter_sub`) VALUES
(1, '2601', 'mail.test@test.com', 10, 'tPass', 'tStatus', 2, 0),
(2, '2601', 'mail.test@test.com', 10, 'tPass', 'tStatus', 2, 0),
(3, '2601', 'mail.test@test.com', 10, 'tPass', 'tStatus', 2, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Index pour la table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`transaction_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experience_id` (`experience_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experience_id` (`experience_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `components_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discount_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

--
-- Contraintes pour la table `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `reactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reactions_ibfk_2` FOREIGN KEY (`experience_id`) REFERENCES `experiences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`experience_id`) REFERENCES `experiences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
