

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nom de l''activité',
  `description` text COMMENT 'Description de l''activité',
  `date` date NOT NULL COMMENT 'Date de l''activité',
  `location` varchar(255) DEFAULT NULL COMMENT 'Lieu',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archived` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `activities` (`id`, `name`, `description`, `date`, `location`, `created_at`, `archived`) VALUES
(1, 'Yoga', 'Exericie intensif', '2025-04-01', 'P', '2025-03-18 21:49:22', 1),
(2, 'Yoga', 'Faire des exercices sont importants pour une bonne santé', '2025-06-15', 'Lésigny', '2025-03-18 22:21:30', 0);



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



INSERT INTO `companies` (`id`, `name`, `address`, `phone_number`, `email`, `subscription_plan`, `created_at`, `archived`) VALUES
(1, 'TechCorp', '123 Rue de Paris', '0123456789', 'contact@techcorp.com', 'Premium', '2025-03-18 09:55:36', 0),
(2, 'HealthPlus', '45 Avenue de Lyon', '0145789632', 'info@healthplus.com', 'Basic', '2025-03-18 09:55:36', 0);



CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL COMMENT 'Référence à la société cliente',
  `start_date` date NOT NULL COMMENT 'Date de début du contrat',
  `end_date` date DEFAULT NULL COMMENT 'Date de fin du contrat',
  `total_price` decimal(10,2) NOT NULL COMMENT 'Prix total du contrat',
  `payment_status` enum('Pending','Paid','Cancelled') DEFAULT 'Pending' COMMENT 'Statut du paiement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `contracts` (`id`, `company_id`, `start_date`, `end_date`, `total_price`, `payment_status`) VALUES
(1, 1, '2025-01-01', '2025-12-31', '5000.00', 'Paid'),
(2, 2, '2025-01-01', '2025-06-30', '2500.00', 'Pending');



CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL COMMENT 'Prénom du salarié',
  `last_name` varchar(50) NOT NULL COMMENT 'Nom du salarié',
  `email` varchar(100) NOT NULL COMMENT 'Email du salarié',
  `company_id` int(11) NOT NULL COMMENT 'Référence à la société cliente',
  `archived` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `company_id`, `archived`) VALUES
(1, 'John', 'Doe', 'john.doe@techcorp.com', 1, 0),
(2, 'Jane', 'Smith', 'jane.smith@healthplus.com', 2, 0);



CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL COMMENT 'Référence au prestataire',
  `rating` int(11) NOT NULL COMMENT 'Note sur 5',
  `feedback` text COMMENT 'Commentaire',
  `evaluated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de l''évaluation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `evaluations` (`id`, `provider_id`, `rating`, `feedback`, `evaluated_at`) VALUES
(1, 1, 5, 'Excellent session!', '2025-03-18 09:55:36'),
(2, 2, 4, 'Very helpful training.', '2025-03-18 09:55:36');


CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nom de l''événement',
  `description` text COMMENT 'Description de l''événement',
  `date` date NOT NULL COMMENT 'Date de l''événement',
  `location` varchar(255) DEFAULT NULL COMMENT 'Lieu de l''événement',
  `created_by` int(11) NOT NULL COMMENT 'Créateur de l''événement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `events` (`id`, `name`, `description`, `date`, `location`, `created_by`) VALUES
(1, 'Yoga Session', 'A relaxing yoga session for employees', '2025-02-01', 'Paris', 1),
(2, 'Team Building', 'Fun activities to boost team spirit', '2025-03-01', 'Lyon', 1);


CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL COMMENT 'Référence au contrat',
  `amount` decimal(10,2) NOT NULL COMMENT 'Montant de la facture',
  `issued_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date d''émission'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nom du prestataire',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email du prestataire',
  `phone_number` varchar(20) DEFAULT NULL COMMENT 'Numéro de téléphone',
  `service_type` varchar(100) NOT NULL COMMENT 'Type de prestation (yoga, coaching, etc.)',
  `hourly_rate` decimal(10,2) NOT NULL COMMENT 'Tarif horaire',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `providers` (`id`, `name`, `email`, `phone_number`, `service_type`, `hourly_rate`, `created_at`) VALUES
(1, 'YogaMaster', 'contact@yogamaster.com', '0654321987', 'Yoga', '50.00', '2025-03-18 09:55:36'),
(2, 'CoachX', 'info@coachx.com', '0621345678', 'Coaching', '75.00', '2025-03-18 09:55:36');


CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'Référence au salarié',
  `event_id` int(11) NOT NULL COMMENT 'Référence à l''événement',
  `reserved_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de réservation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `reservations` (`id`, `employee_id`, `event_id`, `reserved_at`) VALUES
(1, 1, 1, '2025-03-18 09:55:36'),
(2, 2, 2, '2025-03-18 09:55:36');


CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Nom du role (admin, client, prestataire, etc.)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Client'),
(3, 'Prestataire');


CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nom du service',
  `description` text COMMENT 'Description du service',
  `price` decimal(10,2) NOT NULL COMMENT 'Prix du service',
  `provider_id` int(11) NOT NULL COMMENT 'Référence au prestataire'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `services` (`id`, `name`, `description`, `price`, `provider_id`) VALUES
(1, 'Morning Yoga', 'Relaxing yoga session', '100.00', 1),
(2, 'Leadership Training', 'Boost leadership skills', '200.00', 2);


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'Nom d''utilisateur',
  `password` varchar(255) NOT NULL COMMENT 'Mot de passe hashé',
  `email` varchar(100) NOT NULL COMMENT 'Email de l''utilisateur',
  `role_id` int(11) NOT NULL COMMENT 'Role de l''utilisateur',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `users` (`id`, `username`, `password`, `email`, `role_id`, `created_at`) VALUES
(1, 'admin', 'hashed_password', 'admin@businesscare.com', 1, '2025-03-18 09:55:36'),
(2, 'client1', 'hashed_password', 'client1@techcorp.com', 2, '2025-03-18 09:55:36'),
(3, 'client2', 'hashed_password', 'client2@healthplus.com', 2, '2025-03-18 09:55:36');


CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` enum('Client','Employé','Fournisseurs','Administrateur') NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `genre` enum('Homme','Femme','Autre') NOT NULL,
  `lieu_naissance` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `unique_company_email` (`email`);


ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);


ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `company_id` (`company_id`);


ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_id` (`provider_id`);


ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_event_name_date` (`name`,`date`),
  ADD KEY `created_by` (`created_by`);


ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`);


ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `event_id` (`event_id`);


ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);


ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_service_name` (`name`),
  ADD KEY `provider_id` (`provider_id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);


ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;


ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;


ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;


ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`) ON DELETE CASCADE;


ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;


ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;


ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

