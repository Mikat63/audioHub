-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 22 jan. 2026 à 15:53
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `audiohub`
--

-- --------------------------------------------------------

--
-- Structure de la table `tracks`
--

DROP TABLE IF EXISTS `tracks`;
CREATE TABLE IF NOT EXISTS `tracks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `artist_id` bigint NOT NULL,
  `album_id` bigint DEFAULT NULL,
  `genre_id` bigint NOT NULL,
  `img_path_small` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img_path_large` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_user` bigint NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `listen_click` bigint DEFAULT NULL,
  `track_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tracks_album_id_foreign` (`album_id`),
  KEY `tracks_artist_id_foreign` (`artist_id`),
  KEY `tracks_id_user_foreign` (`id_user`),
  KEY `tracks_genre_id_foreign` (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `artist_id`, `album_id`, `genre_id`, `img_path_small`, `img_path_large`, `id_user`, `created_at`, `updated_at`, `listen_click`, `track_path`) VALUES
(1, 'Meltdown', 1, 1, 1, 'assets/covers\\acdc-sitff-upper-lip-128.webp', 'assets/covers\\acdc-sitff-upper-lip-600.webp', 1, '2026-01-16 15:13:21', '2026-01-16 15:13:21', 10, 'assets/tracks\\ACDC-MELTDOWN.mp3'),
(2, 'Smooth criminal', 2, 2, 2, 'assets/covers\\alien-and-farm-anthology-128.webp', 'assets/covers\\alien-and-farm-anthology-600.webp', 1, '2026-01-16 15:17:15', '2026-01-16 15:17:15', 8, 'assets/tracks\\ALIEN-AND-FARM-SMOOTH-CRIMINAL.mp3'),
(3, 'All over again ', 3, 3, 3, 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:21:42', '2026-01-16 15:21:42', 9, 'assets/tracks\\B.B-KING-ALL-OVER-AGAIN-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(4, 'B.B Jams with guests ', 3, 3, 3, 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:27:12', '2026-01-16 15:27:12', 6, 'assets/tracks\\B.B-KING-B.B.-JAMS-WITH-GUESTS-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(5, 'Guess who ', 3, 3, 3, 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:27:12', '2026-01-16 15:27:12', 7, 'assets/tracks\\B.B-KING-GUESS-WHO-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(6, 'I need you so', 3, 3, 3, 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:27:12', '2026-01-16 15:27:12', 5, 'assets/tracks\\B.B-KING-I-NEED-YOU-SO-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(7, 'Key to the highway', 3, 3, 3, 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:33:24', '2026-01-16 15:33:24', 4, 'assets/tracks\\B.B-KING-KEY-TO-THE-HIGHWAY-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(8, 'Rock me baby', 3, 3, 3, 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:33:24', '2026-01-16 15:33:24', 3, 'assets/tracks\\B.B-KING-ROCK-ME-BABY-(LIVE-AT-THE-ROYA-ALBERT-HALL).mp3'),
(9, 'See that my grave is kept clean', 3, 3, 3, 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:33:24', '2026-01-16 15:33:24', 2, 'assets/tracks\\B.B-KING-SEE-THAT-MY-GRAVE-IS-KEPT-CLEAN-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(10, 'The thrill is gone', 3, 3, 3, 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:33:24', '2026-01-16 15:33:24', 1, 'assets/tracks\\B.B-KING-THE-THRILL-IS-GONE-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(11, '3 O\'clock blues', 3, 4, 3, 'assets/covers\\B.B-King-singin\'-the-blues-128.webp', 'assets/covers\\B.B-King-singin\'-the-blues-600.webp', 1, '2026-01-16 15:42:21', '2026-01-16 15:42:21', 0, 'assets/tracks\\B.B-KING-THREE-O\'CLOCK-BLUES.mp3'),
(12, 'When the saints go marching in', 3, 3, 3, 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:44:16', '2026-01-16 15:44:16', NULL, 'assets/tracks\\B.B-KING-WHEN-THE-SAINTS-GO-MARCHING-IN-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(13, 'You are my sunshine', 3, 3, 3, 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers\\b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:45:35', '2026-01-16 15:45:35', NULL, 'assets/tracks\\B.B-KING-YOU-ARE-MY-SUNSHINE-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(14, 'You upset me baby', 3, 4, 3, 'assets/covers\\b.b-king-you-upset-me-baby-128.webp', 'assets/covers\\b.b-king-you-upset-me-baby-600.webp', 1, '2026-01-16 15:49:28', '2026-01-16 15:49:28', NULL, 'assets/tracks\\B.B-KING-YOU-UPSET-ME-BABY.mp3'),
(15, 'Baby please don\'t go', 4, NULL, 3, NULL, NULL, 1, '2026-01-16 15:55:07', '2026-01-16 15:55:07', NULL, 'assets/tracks\\BIG-JOE-WILLIAMS--BABY-PLEASE-DON\'T-GO.mp3'),
(16, 'Rebel yell', 5, 6, 2, 'assets/covers\\billy-idol-rebel-yell-128.webp', 'assets/covers\\billy-idol-rebel-yell-600.webp', 1, '2026-01-16 15:58:09', '2026-01-16 15:58:09', NULL, 'assets/tracks\\BILLY IDOL-REBEL YELL.mp3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
