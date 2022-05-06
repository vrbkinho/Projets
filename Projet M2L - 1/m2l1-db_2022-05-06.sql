-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 06 mai 2022 à 10:07
-- Version du serveur :  8.0.18
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `m2l1`
--

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id` int(11) NOT NULL,
  `Libelle` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Etat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'Non assignee',
  `Raison` varchar(255) DEFAULT NULL,
  `Priorite` int(11) DEFAULT NULL,
  `idemploye` int(11) DEFAULT '111'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id`, `Libelle`, `Description`, `Etat`, `Raison`, `Priorite`, `idemploye`) VALUES
(1, 'Première tache', 'voili voilou', 'En cours', 'nous rompichâmes', 2, 5),
(2, 'deuxieme tache', 'ceci est la description', 'En cours de réalisation', '', NULL, 9),
(3, 'Première tâche', 'wow stylé', NULL, NULL, NULL, NULL),
(4, 'encore une tache', 'ok ?', NULL, NULL, 2, 4),
(5, 'Il faut faire cela', 'ceci est la description', NULL, NULL, NULL, 111),
(6, 'manger', 'tarte a la fraise', NULL, NULL, NULL, 111),
(7, 'manger', 'tare a la framboise', 'Non assignee', '', 2, 8),
(8, 'Essai tâche', 'Essai Description', 'Non assignee', NULL, 2, 5),
(9, 'Essai tache respo', 'essai description respo', 'Non assignee', NULL, NULL, 111),
(10, 'Première tâche', 'ceci est la description', 'Non assignee', NULL, NULL, 111);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `type`, `password`) VALUES
(1, 'Antoine', 'antoineverbeke59@gmail.com', 'admin', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
(4, 'Antonio', 'antonio@mail.fr', 'employe', 'b4be076ba8db9abb89a9a903ed36e8fbf3e2be9e30547afae9b24bf0b9efe83a'),
(5, 'AntoineVerbeke', 'av@mail.fr', 'employe', '0ca6fbc6875a785b3b1e541cebfc61a69e73b2b98c347515f3228b37a639bc45'),
(6, 'utilisateur', 'osef', 'user', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(7, 'restrespo', '1', 'respo', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(8, 'antonioo', 'abc', 'employe', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(9, 'employetest', 'emploi', 'employe', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(10, 'Antoine', 'a', 'user', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(111, 'à assigner', '0', 'user', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(112, 'Marich84', 'marielefevre@hotmail.com', 'respo', 'ba64eb8b058be189e48d4a3c1ab731a06b5ed0988352a9df8fd6ea27c6b43edd'),
(113, 'AntoineVerbeke', 'a', 'user', 'b4be076ba8db9abb89a9a903ed36e8fbf3e2be9e30547afae9b24bf0b9efe83a');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idemploye` (`idemploye`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_ibfk_1` FOREIGN KEY (`idemploye`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
