-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 09 avr. 2025 à 09:02
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BusinessCare`
--

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nom de l''activité',
  `description` text COMMENT 'Description de l''activité',
  `date` date NOT NULL COMMENT 'Date de l''activité',
  `location` varchar(255) DEFAULT NULL COMMENT 'Lieu',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activities`
--

INSERT INTO `activities` (`id`, `name`, `description`, `date`, `location`, `created_at`, `archived`) VALUES
(1, 'Yoga', 'Exericie intensif', '2025-04-01', 'P', '2025-03-18 21:49:22', 1),
(2, 'Yoga', 'Faire des exercices sont importants pour une bonne santé', '2025-06-15', 'Lésigny', '2025-03-18 22:21:30', 0),
(3, 'Handball', 'Faire un sport d\'équipe permet une meilleure entente entre collègue', '2025-06-19', 'Paris 12ème', '2025-03-18 23:29:43', 0),
(4, 'samksw', 'fr', '1990-09-17', 'Paris', '2025-03-19 21:02:44', 0),
(5, 'FOOTBALL', 'Jouer au football avec des amis', '2025-03-30', 'Paris', '2025-03-26 05:07:48', 1);

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nom de la société cliente',
  `address` varchar(255) DEFAULT NULL COMMENT 'Adresse de la société',
  `phone_number` varchar(20) DEFAULT NULL COMMENT 'Numéro de téléphone',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email de contact',
  `subscription_plan` enum('Starter','Basic','Premium') NOT NULL COMMENT 'Plan d''abonnement',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `phone_number`, `email`, `subscription_plan`, `created_at`, `archived`) VALUES
(1, 'TechCorp', '123 Rue de Paris', '0123456789', 'contact@techcorp.com', 'Premium', '2025-03-18 09:55:36', 0),
(2, 'HealthPlus', '45 Avenue de Lyon', '0145789632', 'info@healthplus.com', 'Basic', '2025-03-18 09:55:36', 0),
(3, 'SAMUEL KAKISWA', '1 Rue de la Forêt de Binel', '0682561491', 'samuelkakiswa19@gmail.com', 'Premium', '2025-03-26 05:09:21', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL COMMENT 'Référence à la société cliente',
  `start_date` date NOT NULL COMMENT 'Date de début du contrat',
  `end_date` date DEFAULT NULL COMMENT 'Date de fin du contrat',
  `total_price` decimal(10,2) NOT NULL COMMENT 'Prix total du contrat',
  `payment_status` enum('Pending','Paid','Cancelled') DEFAULT 'Pending' COMMENT 'Statut du paiement',
  `archived` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contracts`
--

INSERT INTO `contracts` (`id`, `company_id`, `start_date`, `end_date`, `total_price`, `payment_status`, `archived`, `created_at`) VALUES
(1, 1, '2025-01-01', '2025-12-31', '5000.00', 'Paid', 0, '2025-04-08 23:51:06'),
(2, 2, '2025-01-01', '2025-06-30', '2500.00', 'Pending', 0, '2025-04-08 23:51:06');

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL COMMENT 'Prénom du salarié',
  `last_name` varchar(50) NOT NULL COMMENT 'Nom du salarié',
  `email` varchar(100) NOT NULL COMMENT 'Email du salarié',
  `company_id` int(11) NOT NULL COMMENT 'Référence à la société cliente',
  `archived` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `company_id`, `archived`) VALUES
(1, 'John', 'Doe', 'john.doe@techcorp.com', 1, 0),
(2, 'Jane', 'Smith', 'jane.smith@healthplus.com', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL COMMENT 'Référence au prestataire',
  `rating` int(11) NOT NULL COMMENT 'Note sur 5',
  `feedback` text COMMENT 'Commentaire',
  `evaluated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de l''évaluation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`id`, `provider_id`, `rating`, `feedback`, `evaluated_at`) VALUES
(1, 1, 5, 'Excellent session!', '2025-03-18 09:55:36'),
(2, 2, 4, 'Very helpful training.', '2025-03-18 09:55:36');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nom de l''événement',
  `description` text COMMENT 'Description de l''événement',
  `date` date NOT NULL COMMENT 'Date de l''événement',
  `location` varchar(255) DEFAULT NULL COMMENT 'Lieu de l''événement',
  `created_by` int(11) NOT NULL COMMENT 'Créateur de l''événement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `date`, `location`, `created_by`) VALUES
(1, 'Yoga Session', 'A relaxing yoga session for employees', '2025-02-01', 'Paris', 1),
(2, 'Team Building', 'Fun activities to boost team spirit', '2025-03-01', 'Lyon', 1);

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` enum('Pending','Paid','Cancelled') DEFAULT 'Pending',
  `payment_date` date DEFAULT NULL,
  `notes` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `role` enum('user','bot') NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nom du prestataire',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email du prestataire',
  `phone_number` varchar(20) DEFAULT NULL COMMENT 'Numéro de téléphone',
  `service_type` varchar(100) NOT NULL COMMENT 'Type de prestation (yoga, coaching, etc.)',
  `hourly_rate` decimal(10,2) NOT NULL COMMENT 'Tarif horaire',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `providers`
--

INSERT INTO `providers` (`id`, `name`, `email`, `phone_number`, `service_type`, `hourly_rate`, `created_at`, `archived`) VALUES
(1, 'YogaMaster', 'contact@yogamaster.com', '0654321987', 'Yoga', '50.00', '2025-03-18 09:55:36', 0),
(2, 'CoachX', 'info@coachx.com', '0621345678', 'Coaching', '75.00', '2025-03-18 09:55:36', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'Référence au salarié',
  `event_id` int(11) NOT NULL COMMENT 'Référence à l''événement',
  `reserved_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de réservation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `employee_id`, `event_id`, `reserved_at`) VALUES
(1, 1, 1, '2025-03-18 09:55:36'),
(2, 2, 2, '2025-03-18 09:55:36');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Nom du role (admin, client, prestataire, etc.)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Client'),
(3, 'Prestataire');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nom du service',
  `description` text COMMENT 'Description du service',
  `price` decimal(10,2) NOT NULL COMMENT 'Prix du service',
  `provider_id` int(11) NOT NULL COMMENT 'Référence au prestataire'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `provider_id`) VALUES
(1, 'Morning Yoga', 'Relaxing yoga session', '100.00', 1),
(2, 'Leadership Training', 'Boost leadership skills', '200.00', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT 'Role de l''utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `genre` enum('homme','femme','autre') NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(20) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `archived` tinyint(1) DEFAULT '0',
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `last_name`, `first_name`, `date_naissance`, `genre`, `lieu_naissance`, `adresse`, `code_postal`, `ville`, `telephone`, `email`, `password`, `niveau`, `created_at`, `archived`, `photo`) VALUES
(1, 'Kakiswa', 'Samuel', '2000-05-05', 'homme', 'Créteil Soleil', '1 rue de la forêt de binel', '77150', 'Lésigny', '07 68 16 39 48', 'samuelkakiswa19@gmail.com', '$2y$10$z2ADxD8zHQMvD/42nusp.euBomkkYUPA6hMJFdkgwLUBaty2wEzgW', 'CLIENT', '2025-04-08 07:21:14', 0, NULL),
(2, 'Ksw', 'SamKsw', '2000-06-06', 'homme', 'Reims', '1 rue de Paris', '77150', 'Lésigny', '0787193456', 'kakiswas@gmail.com', '$2y$10$XaXLhUSB34PyUIf7wwOIU.mhkYX.ALFT6nzi7tio1Q5CFgZ5tG.yS', 'EMPLOYÉ', '2025-04-08 10:13:19', 0, NULL),
(3, 'Kakiswa', 'Sephora', '2006-06-12', 'femme', 'Créteil Soleil', '1 rue de la forêt de binel', '77150', 'Lésigny', '07 68 35 67 20', 'sephora@sephora.com', '$2y$10$OEysXx7yxqAMmiZM3OSwkubMcFEEwc6LJrrh..BQMsafE604AGHpy', 'ADMINISTRATEUR', '2025-04-08 10:31:27', 0, NULL),
(4, 'Big', 'Sam', '2004-08-15', 'homme', 'Nantes', '1 rue de Joseph', '77150', 'Lésigny', '01 62 48 80 61', 'samuelkakiswa1@gmail.com', '$2y$10$bTuzsvOnOaYYEetDhpoP.OZDrKIQ3EO00rkodfWyBTyLSgfvFV1OC', 'CLIENT', '2025-04-09 06:40:31', 0, 'SK.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `unique_company_email` (`email`);

--
-- Index pour la table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `company_id` (`company_id`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_event_name_date` (`name`,`date`),
  ADD KEY `created_by` (`created_by`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_service_name` (`name`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
