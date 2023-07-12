-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 fév. 2023 à 15:34
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbname`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `cin` text NOT NULL,
  `telephone` text NOT NULL,
  `date_naissance` date NOT NULL,
  `photo` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `cin`, `telephone`, `date_naissance`, `photo`, `id_user`) VALUES
(1, 'meryem', 'youssfi', 'gd556', '0216562', '2022-04-13', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `cin` text NOT NULL,
  `telephone` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `date_naissance` date NOT NULL,
  `compteur` int(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `nom`, `prenom`, `cin`, `telephone`, `id_user`, `adresse`, `date_naissance`, `compteur`, `photo`) VALUES
(1, 'Touireh', 'Hiba', 'CD76447', '0617802519', 1, 'FES', '2022-09-13', 0, 'undraw_Profile_pic_re_upir.png'),
(3, 'Touireh', 'Fatima', '34578', '0617802519', 5, 'FES', '2022-09-13', 0, 'profile.svg'),
(10, 'Benmoussa', 'youssef', 'bw20201', '0645709033', 18, 'eljadida', '1991-09-28', 1, 'messages-3.jpg'),
(12, 'Benani', 'Amine', 'ugbh5', '0653351793', 20, 'Rabat', '2000-11-11', 0, 'profile.svg');

-- --------------------------------------------------------

--
-- Structure de la table `rendez-vous`
--

CREATE TABLE `rendez-vous` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `medecin` text DEFAULT NULL,
  `patient` int(11) NOT NULL,
  `service` int(11) DEFAULT NULL,
  `specialite` int(11) DEFAULT NULL,
  `fiche` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rendez-vous`
--

INSERT INTO `rendez-vous` (`id`, `date`, `time`, `medecin`, `patient`, `service`, `specialite`, `fiche`) VALUES
(25, '2023-12-12', '12:03:00', 'Dr.Draoui', 1, 2, 11, 0x706870383436462e746d702e646f6378),
(26, '2024-04-12', '11:03:00', 'Dr.Raoui', 3, 2, 11, 0x706870463442322e746d702e747874),
(27, '2023-03-25', '15:00:00', 'Dr.Mabchour', 12, 5, 13, 0x706870354537302e746d702e747874),
(28, '2023-01-24', '14:00:00', 'Dr.Rochdi', 10, 1, 14, 0x706870334344412e746d702e747874);

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

CREATE TABLE `secretaire` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `cin` text NOT NULL,
  `date_naissance` text NOT NULL,
  `telephone` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `secretaire`
--

INSERT INTO `secretaire` (`id`, `nom`, `prenom`, `cin`, `date_naissance`, `telephone`, `id_user`, `photo`) VALUES
(1, 'Alami', 'Rime', 'G78674', '19-04-1989', '063456789', 4, 'messages-2.jpg'),
(8, 'Ait Youssef ', 'Khadija', 'C23656', '2000-01-02', '07598632', 12, '');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `libelle`, `code`) VALUES
(1, 'Hôpital d\'Oncologie et de Médecine Nucléaire\r\n', '11'),
(2, 'Hôpital Mère et Enfant  \r\n', '22'),
(3, 'Hôpital IBN AL HASSAN\r\n', '33'),
(4, 'Hôpital OMAR DRISSI\r\n\r\n', '44'),
(5, 'Hôpital des Spécialités\r\n', '55');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `service` int(11) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `libelle`, `service`, `code`) VALUES
(11, 'Pediatrie', 2, '12'),
(13, 'Cardiologie', 5, 'Card1'),
(14, 'Nerologie', 5, 'Ner1'),
(15, 'Ophtalmologie', 1, 'Oph1');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
(1, 'touirehhiba@gmail.com', 'hiba', 'patient'),
(3, 'meryem@gmail.com', 'meryem', 'admin'),
(4, 'rime@gmail.com', 'rime', 'secretaire'),
(5, 'fatima@gmail.com', 'fatima', 'patient'),
(12, 'khadija@gmail.com', '765c2a897faa3bfc4a37544cef748c17', 'secretaire'),
(18, 'youssef@gmail.com', 'youssef', 'patient'),
(20, 'amine@gmail.com', 'amine', 'patient');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con2` (`id_user`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con4` (`id_user`);

--
-- Index pour la table `rendez-vous`
--
ALTER TABLE `rendez-vous`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pat` (`patient`),
  ADD KEY `con5` (`service`),
  ADD KEY `con6` (`specialite`);

--
-- Index pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con3` (`id_user`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con1` (`service`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `rendez-vous`
--
ALTER TABLE `rendez-vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `secretaire`
--
ALTER TABLE `secretaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `con4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rendez-vous`
--
ALTER TABLE `rendez-vous`
  ADD CONSTRAINT `con5` FOREIGN KEY (`service`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con6` FOREIGN KEY (`specialite`) REFERENCES `specialite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pat` FOREIGN KEY (`patient`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD CONSTRAINT `con3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD CONSTRAINT `con1` FOREIGN KEY (`service`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
