-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 30 mai 2024 à 00:02
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cytrip`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `sender` varchar(128) NOT NULL,
  `country` varchar(128) NOT NULL,
  `likes` int(255) NOT NULL DEFAULT 0,
  `category` varchar(128) NOT NULL,
  `content` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `sender`, `country`, `likes`, `category`, `content`) VALUES
(32, 'Abdl95j', 'morocco', 1, 'spots', 'It was really incredible to go to Quemado beach in Al Hoceïma with my family. The place is simply stunning, with its fine sand and spectacular setting at the foot of the cliff of the same name. Spending time there was an unforgettable experience, and I\'m grateful to have been able to experience these precious moments with my loved ones.\r\n'),
(34, 'Adam', 'france', 2, 'spots', 'I recently visited the stunning village of Annecy in the French Alps, and I can\'t recommend it enough! The picturesque canals and vibrant flowers lining the streets make it feel like a real-life fairy tale. The view of Lake Annecy, with its crystal-clear waters surrounded by majestic mountains, is simply breathtaking. Strolling through the old town, enjoying the local cuisine, and exploring the charming boutiques were some of the highlights of my trip. If you’re looking for a perfect blend of na'),
(36, 'Abdl95j', 'france', 1, 'restaurants', 'I went with my friends to Cédric Grolet\'s new boutique near the Opéra. We had the opportunity to taste his famous trompe-l\'œil, and it was really delicious. The only downside is that it\'s rather expensive.'),
(39, 'Abdl95j', 'france', 1, 'activities', 'I spent an extraordinary day at Disneyland Paris with my family, staying at the Hotel Montbriand in Antony. The magic of the park is incomparable, and we created wonderful memories thank you for this activity tip! My favorite attraction is definitely Space Mountain, an incredible experience!'),
(41, 'Adam', 'spain', 1, 'spots', 'During my trip to Barcelona, I had the chance to explore Park Güell, and it was absolutely stunning! The colorful mosaics, whimsical architecture by Gaudí, and panoramic views of the city make it a must-see. Every corner of the park is filled with artistic details and vibrant energy. If you’re in Barcelona, don’t miss out on this enchanting spot!'),
(43, 'Abdl95j', 'spain', 1, 'activities', 'Thanks to this tip, I was able to attend a flamenco show at Tablao El Arenal in Seville. The experience was absolutely spellbinding, and the intensity of the dancing touched me deeply. Since my return from Spain, I\'ve started practicing flamenco myself, inspired by the passion and mastery of the artists I saw. An unforgettable evening that changed my life!'),
(44, 'Adam', 'france', 1, 'restaurants', 'Last week, I dined at Le Petit Bistro in Paris, and it was an unforgettable experience! The cozy atmosphere, warm service, and menu of classic French dishes with a modern twist were delightful. I highly recommend the duck confit and crème brûlée. For an authentic and memorable Parisian dining experience, Le Petit Bistro is a must-visit!'),
(46, 'Adam', 'france', 2, 'activities', 'While in France, I took a hot air balloon ride over the Loire Valley, and it was magical! Floating over stunning chateaux, vineyards, and lush countryside was like a dream. The early morning mist and sunrise views were unforgettable. If you’re looking for a unique way to see the Loire Valley, I highly recommend this experience. It was the highlight of my trip!'),
(47, 'Adam', 'spain', 1, 'restaurants', 'I recently dined at El Celler de Can Roca in Girona, and it was extraordinary! The innovative Catalan dishes, impeccable wine pairings, and elegant atmosphere made for a perfect evening. Each course was a delightful blend of tradition and creativity. If you\'re in Spain, don\'t miss this unforgettable dining experience!'),
(48, 'Adam', 'spain', 1, 'activities', 'During my visit to Granada, I experienced the breathtaking Alhambra Palace, and it was truly mesmerizing! The intricate Moorish architecture, lush gardens, and panoramic views of the city created an unforgettable atmosphere. Exploring the palace grounds and learning about its rich history was a highlight of my trip to Spain. If you\'re in Granada, don\'t miss the chance to visit this iconic UNESCO World Heritage site. It\'s a must-see!'),
(49, 'Abdl95j', 'morocco', 0, 'activities', 'I easily booked my private desert tour in Morocco thanks to cy-trip. The experience was truly magical, an Aladdin-like blue dream. The dunes of Erg Chigaga were breathtaking, and exploring the Dades and Todra gorges was simply incredible. An unforgettable adventure in the Sahara!'),
(50, 'Adam', 'morocco', 0, 'spots', 'Chefchaouen in Morocco is a mesmerizing city with its blue-washed buildings nestled in the Rif Mountains. Its serene beauty and charming atmosphere make it a must-visit spot.'),
(51, 'Adam', 'morocco', 1, 'restaurants', 'Le Jardin in Marrakech offers a tranquil oasis in the heart of the medina. The lush garden setting and delectable Moroccan dishes make it a perfect dining experience in the bustling city.'),
(52, 'Adam', 'morocco', 1, 'activities', 'Exploring the Sahara Desert was a highlight of my trip to Morocco. From camel treks to camping under the starlit sky, it offers an unforgettable adventure amidst the breathtaking desert landscape.'),
(54, 'Abdl95j', 'spain', 0, 'restaurants', 'During my trip to Bilbao, I had the opportunity to dine at the MINA restaurant. Nestled in the heart of the city, this gourmet restaurant offers a breathtaking view of La Ribera market and the church and bridge of San Antón from its large windows. With only 25 guests per service, every detail is meticulously attended to, creating an exceptional culinary experience.');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`user_id`, `comment_id`) VALUES
(14, 0),
(15, 0),
(14, 34),
(15, 36),
(15, 34),
(14, 38),
(15, 39),
(14, 41),
(15, 45),
(15, 43),
(14, 47),
(14, 48),
(14, 44),
(14, 46),
(15, 51),
(15, 32),
(15, 52),
(15, 46);

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `liker_id` int(11) NOT NULL,
  `country` varchar(128) NOT NULL,
  `grade` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`liker_id`, `country`, `grade`) VALUES
(15, 'france', 4),
(14, 'spain', 4),
(14, 'france', 5),
(14, 'morocco', 4),
(15, 'spain', 3),
(15, 'morocco', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `isroot` tinyint(1) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `isroot`, `user_name`, `user_email`, `user_password`) VALUES
(14, 1, 'Abdl95j', 'layee@gmail.com', 'yee95'),
(15, 1, 'Adam', 'adamterrak@gmail.com', 'mdp');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
