-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 jan. 2026 à 13:29
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
  `listen_click` bigint DEFAULT '0',
  `track_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tracks_album_id_foreign` (`album_id`),
  KEY `tracks_artist_id_foreign` (`artist_id`),
  KEY `tracks_id_user_foreign` (`id_user`),
  KEY `tracks_genre_id_foreign` (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `artist_id`, `album_id`, `genre_id`, `img_path_small`, `img_path_large`, `id_user`, `created_at`, `updated_at`, `listen_click`, `track_path`) VALUES
(1, 'Meltdown', 1, 1, 1, 'assets/covers/acdc-sitff-upper-lip-128.webp', 'assets/covers/acdc-sitff-upper-lip-600.webp', 1, '2026-01-16 15:13:21', '2026-01-16 15:13:21', 12, 'assets/tracks/ACDC-MELTDOWN.mp3'),
(2, 'Smooth criminal', 2, 2, 2, 'assets/covers/alien-and-farm-anthology-128.webp', 'assets/covers/alien-and-farm-anthology-600.webp', 1, '2026-01-16 15:17:15', '2026-01-16 15:17:15', 23, 'assets/tracks/ALIEN-AND-FARM-SMOOTH-CRIMINAL.mp3'),
(3, 'All over again ', 3, 3, 3, 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:21:42', '2026-01-16 15:21:42', 31, 'assets/tracks/B.B-KING-ALL-OVER-AGAIN-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(4, 'B.B Jams with guests ', 3, 3, 3, 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:27:12', '2026-01-16 15:27:12', 8, 'assets/tracks/B.B-KING-B.B.-JAMS-WITH-GUESTS-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(5, 'Guess who ', 3, 3, 3, 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:27:12', '2026-01-16 15:27:12', 8, 'assets/tracks/B.B-KING-GUESS-WHO-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(6, 'I need you so', 3, 3, 3, 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:27:12', '2026-01-16 15:27:12', 5, 'assets/tracks/B.B-KING-I-NEED-YOU-SO-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(7, 'Key to the highway', 3, 3, 3, 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:33:24', '2026-01-16 15:33:24', 6, 'assets/tracks/B.B-KING-KEY-TO-THE-HIGHWAY-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(8, 'Rock me baby', 3, 3, 3, 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:33:24', '2026-01-16 15:33:24', 3, 'assets/tracks/B.B-KING-ROCK-ME-BABY-(LIVE-AT-THE-ROYA-ALBERT-HALL).mp3'),
(9, 'See that my grave is kept clean', 3, 3, 3, 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:33:24', '2026-01-16 15:33:24', 6, 'assets/tracks/B.B-KING-SEE-THAT-MY-GRAVE-IS-KEPT-CLEAN-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(10, 'The thrill is gone', 3, 3, 3, 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:33:24', '2026-01-16 15:33:24', 6, 'assets/tracks/B.B-KING-THE-THRILL-IS-GONE-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(11, '3 O\'clock blues', 3, 4, 3, 'assets/covers/B.B-King-singin\'-the-blues-128.webp', 'assets/covers/B.B-King-singin\'-the-blues-600.webp', 1, '2026-01-16 15:42:21', '2026-01-16 15:42:21', 13, 'assets/tracks/B.B-KING-THREE-O\'CLOCK-BLUES.mp3'),
(12, 'When the saints go marching in', 3, 3, 3, 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:44:16', '2026-01-16 15:44:16', 2, 'assets/tracks/B.B-KING-WHEN-THE-SAINTS-GO-MARCHING-IN-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(13, 'You are my sunshine', 3, 3, 3, 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-128.webp', 'assets/covers/b.b-king-Live-at-the-royal-albert-hall-2011-600.webp', 1, '2026-01-16 15:45:35', '2026-01-16 15:45:35', 7, 'assets/tracks/B.B-KING-YOU-ARE-MY-SUNSHINE-(LIVE-AT-THE-ROYAL-ALBERT-HALL).mp3'),
(14, 'You upset me baby', 3, 4, 3, 'assets/covers/b.b-king-you-upset-me-baby-128.webp', 'assets/covers/b.b-king-you-upset-me-baby-600.webp', 1, '2026-01-16 15:49:28', '2026-01-16 15:49:28', 2, 'assets/tracks/B.B-KING-YOU-UPSET-ME-BABY.mp3'),
(15, 'Baby please don\'t go', 4, 10, 3, 'assets/covers/big-joe-williams-baby-please-don\'t-go-128.webp', 'assets/covers/big-joe-williams-baby-please-don\'t-go-300.jpg', 1, '2026-01-28 09:36:45', '2026-01-28 09:36:45', 10, 'assets/tracks/BIG-JOE-WILLIAMS--BABY-PLEASE-DON\'T-GO.mp3'),
(16, 'Rebel yell', 5, 6, 2, 'assets/covers/billy-idol-rebel-yell-128.webp', 'assets/covers/billy-idol-rebel-yell-600.webp', 1, '2026-01-16 15:58:09', '2026-01-16 15:58:09', 1, 'assets/tracks/BILLY IDOL-REBEL YELL.mp3'),
(17, 'Reelin\' and Rockin\'', 6, 8, 5, 'assets/covers/chuck-berry-qweet-little-sixteen-128.webp', 'assets/covers/chuck-berry-qweet-little-sixteen-600.webp.webp', 1, '2026-01-28 09:10:05', '2026-01-28 09:10:05', 0, 'assets/tracks/CHUCK BERRY-REELIN\'-AND-ROCKIN\'.mp3'),
(18, 'School days', 6, 7, 5, 'assets/covers/chuck-bberry-after-school-session-128.webp', 'assets/covers/chuck-bberry-after-school-session-600.webp', 1, '2026-01-28 09:02:20', '2026-01-28 09:02:20', 0, 'assets/tracks/CHUCK BERRY-SCHOOL-DAYS.mp3'),
(19, 'You never can tell', 6, 9, 5, 'assets/covers/chuck-berry-St.-Louis-to-Liverpool-128.webp', 'assets/covers/chuck-berry-St.-Louis-to-Liverpool-600.webp', 1, '2026-01-28 09:17:12', '2026-01-28 09:17:12', 5, 'assets/tracks/CHUCKBERRY-YOU-NEVER-CAN-TELL.mp3'),
(20, 'Nightmare', 7, 11, 1, 'assets/covers/crooked-x-nightmare-128.webp', 'assets/covers/crooked-x-nightmare-600.webp', 1, '2026-01-28 10:16:08', '2026-01-28 10:16:08', 0, 'assets/tracks/CROOKED X-NIGHTMARE.mp3'),
(21, 'Asylum', 8, 12, 6, 'assets/covers/distubred-asylum-128.webp', 'assets/covers/distubred-asylum-600.webp', 1, '2026-01-28 12:15:19', '2026-01-28 12:15:19', 4, 'assets/tracks/DISTURBED-ASYLUM.mp3'),
(22, 'Bullet with your name', 9, 13, 7, 'assets/covers/scares-of-life-what-we-reflect-128.webp', 'assets/covers/scares-of-life-what-we-reflect-600.webp', 1, '2026-01-28 12:20:13', '2026-01-28 12:20:13', 7, 'assets/tracks/DISTURBED-BULLET-WITH-YOUR-NAME-(FEAT.-LINKIN-PARK-&-GODSMACK-&-PANTERA-&-LIMP-BIZKIT-&-TOOL-&-STAIND-&-KORN).mp3'),
(23, 'Decadence', 8, 14, 7, 'assets/covers/disturbed-ten-thousand-fists-128.webp', 'assets/covers/disturbed-ten-thousand-fists-600.webp', 1, '2026-01-28 12:23:33', '2026-01-28 12:23:33', 0, 'assets/tracks/DISTURBED-DECADENCE.mp3'),
(24, 'Down with the sickness', 8, 15, 7, 'assets/covers/disturbed-the-sickness-128.webp', 'assets/covers/disturbed-the-sickness-600.webp', 1, '2026-01-28 12:25:28', '2026-01-28 12:25:28', 0, 'assets/tracks/DISTURBED-DOWN-WITH-THE-SICKNESS.mp3'),
(25, 'Fear', 8, 15, 7, 'assets/covers/disturbed-the-sickness-128.webp', 'assets/covers/disturbed-the-sickness-600.webp', 8, '2026-01-28 12:28:40', '2026-01-28 12:28:40', 0, 'assets/tracks/DISTURBED-FEAR.mp3'),
(51, 'Blues Boogie Jam Live legends(feat John Lee HOOKER & Etta JAMES)', 14, NULL, 13, NULL, NULL, 1, '2026-01-30 07:09:57', '2026-01-30 07:09:57', 1, 'assets/tracks/SANTANA-BLUES-BOOGIE-JAM-LIVE-LEGENDS-(FEAT-JOHN-LEE HOOKER-&-ETTA-JAMES).mp3'),
(27, 'Glass shatters stone Cold Steve austin\'s theme', 8, 17, 7, 'assets/covers/DISTURBED-GLASS-SHATTERS-STONE-COLD-STEVE-AUSTIN\'S-THEME-(THE ORIGINAL-WWE-SOUNDTRACK)-128.webp', 'assets/covers/DISTURBED-GLASS-SHATTERS-STONE-COLD-STEVE-AUSTIN\'S-THEME-(THE ORIGINAL-WWE-SOUNDTRACK)-600.webp', 1, '2026-01-28 12:39:29', '2026-01-28 12:39:29', 0, 'assets/tracks/DISTURBED-GLASS-SHATTERS-STONE-COLD-STEVE-AUSTIN\'S-THEME-(THE ORIGINAL-WWE-SOUNDTRACK).mp3'),
(28, 'I\'m alive', 8, 14, 7, 'assets/covers/disturbed-ten-thousand-fists-128.webp', 'assets/covers/disturbed-ten-thousand-fists-600.webp', 1, '2026-01-28 12:53:30', '2026-01-28 12:53:30', 0, 'assets/tracks/DISTURBED-I\'M-ALIVE.mp3'),
(29, 'Indestructible', 8, 18, 7, 'assets/covers/distubed-indestructible-128.webp', 'assets/covers/distubed-indestructible-600.webp', 1, '2026-01-28 12:57:42', '2026-01-28 12:57:42', 0, 'assets/tracks/DISTURBED-INDESTRUCTIBLE.mp3'),
(30, 'Inside the fire', 8, 18, 7, 'assets/covers/distubed-indestructible-128.webp', 'assets/covers/distubed-indestructible-600.webp', 1, '2026-01-28 12:57:42', '2026-01-28 12:57:42', 0, 'assets/tracks/DISTURBED-INSIDE-THE-FIRE.mp3'),
(31, 'Make you feel like a gangster', 9, NULL, 3, NULL, NULL, 1, '2026-01-28 15:53:31', '2026-01-28 15:53:31', 0, 'assets/tracks/GENTLEMAN -PLAYLIST-MAKE-YOU-FEEL-LIKE-A-GANGSTER-(BLOWED-&-REVERB).mp3'),
(32, 'That make you feel like a warrior', 9, NULL, 3, NULL, NULL, 1, '2026-01-28 15:53:31', '2026-01-28 15:53:31', 6, 'assets/tracks/GENTLEMAN-SONGS-THAT-MAKE YOU-FEEL-LIKE-A-WARRIOR.mp3'),
(33, 'For men who move in silence', 10, NULL, 3, NULL, NULL, 1, '2026-01-28 15:55:30', '2026-01-28 15:55:30', 0, 'assets/tracks/GENTLEMAN-DARK-FOR-MEN-WHO-MOVE-IN-SILENCE.mp3'),
(34, 'Battlefiled 6 main theme', 11, 19, 8, 'assets/covers/henry-jackman-battlefield-6-main-theme-128.webp', 'assets/covers/henry-jackman-battlefield-6-main-theme-600.webp', 1, '2026-01-29 07:24:04', '2026-01-29 07:24:04', 2, 'assets/tracks/HENRY-JACKMAN-BATTLEFIELD 6-MAIN-THEME-(ORIGINAL-VIDEO-GAME-SOUNDTRACK).mp3'),
(35, 'Breaking The Habit', 12, 20, 7, 'assets/covers/linkin-park-meteora-128.webp', 'assets/covers/linkin-park-meteora-600.webp', 1, '2026-01-29 07:50:53', '2026-01-29 07:50:53', 1, 'assets/tracks/LINKIN PARK-BREAKING-THE-HABIT.mp3'),
(36, 'Figure.09', 12, 20, 7, 'assets/covers/linkin-park-meteora-128.webp', 'assets/covers/linkin-park-meteora-600.webp', 1, '2026-01-29 07:50:53', '2026-01-29 07:50:53', 0, 'assets/tracks/LINKIN-PARK-FIGURE.09.mp3'),
(37, 'Blackout', 12, 21, 9, 'assets/covers/linkin-park-a-thousand-suns-128.webp', 'assets/covers/linkin-park-a-thousand-suns-600.webp', 1, '2026-01-29 07:50:53', '2026-01-29 07:50:53', 0, 'assets/tracks/LINKIN-PARK-BLACKOUT.mp3'),
(38, 'Burning In The Skies', 12, 21, 9, 'assets/covers/linkin-park-a-thousand-suns-128.webp', 'assets/covers/linkin-park-a-thousand-suns-600.webp', 1, '2026-01-29 07:50:53', '2026-01-29 07:50:53', 2, 'assets/tracks/LINKIN-PARK-BURNING-IN-THE-SKYES.mp3'),
(39, 'Empty Spaces', 12, 21, 9, 'assets/covers/linkin-park-a-thousand-suns-128.webp', 'assets/covers/linkin-park-a-thousand-suns-600.webp', 1, '2026-01-29 07:50:53', '2026-01-29 07:50:53', 0, 'assets/tracks/LINKIN-PARK-EMPTY-SPACES.mp3'),
(40, 'Burning It Down', 12, 22, 9, 'assets/covers/linkin-park-living-things-128.webp', 'assets/covers/linkin-park-living-things-600.webp', 1, '2026-01-29 07:50:53', '2026-01-29 07:50:53', 2, 'assets/tracks/LINKIN-PARK-BURN-IT-DOWN.mp3'),
(41, 'Castle Of Glass', 12, 22, 9, 'assets/covers/linkin-park-living-things-128.webp', 'assets/covers/linkin-park-living-things-600.webp', 1, '2026-01-29 07:50:53', '2026-01-29 07:50:53', 0, 'assets/tracks/LINKIN-PARK-CASTLE OF GLASS.mp3'),
(42, 'Crawling (piano instrumental)', 12, 0, 10, '', '', 1, '2026-01-29 07:50:53', '2026-01-29 07:50:53', 0, 'assets/tracks/LINKIN-PARK-CRAWLING-(PIANO -INSTRUMENTALS).mp3'),
(43, 'Crawling', 12, 23, 7, 'assets/covers/linkin-park-hybrid-theory-128.webp', 'assets/covers/linkin-park-hybrid-theory-600.webp', 1, '2026-01-29 07:56:42', '2026-01-29 07:56:42', 0, 'assets/tracks/LINKIN-PARK-CRAWLING.mp3'),
(44, 'Faint', 12, 20, 7, 'assets/covers/linkin-park-meteora-128.webp', 'assets/covers/linkin-park-meteora-600.webp', 1, '2026-01-29 07:56:42', '2026-01-29 07:56:42', 0, 'assets/tracks/LINKIN-PARK-FAINT.mp3'),
(45, 'Fallout', 12, 21, 9, 'assets/covers/linkin-park-a-thousand-suns-128.webp', 'assets/covers/linkin-park-a-thousand-suns-600.webp', 1, '2026-01-29 07:56:42', '2026-01-29 07:56:42', 0, 'assets/tracks/LINKIN-PARK-FALLOUT.mp3'),
(46, 'From The Inside', 12, 24, 7, 'assets/covers/linkin-park-live-in-texas-128.webp', 'assets/covers/linkin-park-live-in-texas-600.webp', 1, '2026-01-29 07:56:42', '2026-01-29 07:56:42', 0, 'assets/tracks/LINKIN-PARK-FROM-THE-INSIDE-(LIVE-IN-TEXAS).mp3'),
(47, 'Club Techno Mix (Octobre 2010)', 13, NULL, 11, 'assets/covers/MT-128.webp', 'assets/covers/MT-600.webp', 1, '2026-01-29 08:09:20', '2026-01-29 08:09:20', 2, 'assets/tracks/MT-CLUB-TECHNO-MIX-(OCTOBER-2010).mp3'),
(48, 'Sensation Mix', 13, NULL, 12, 'assets/covers/MT-128.webp', 'assets/covers/MT-600.webp', 1, '2026-01-29 08:09:20', '2026-01-29 08:09:20', 4, 'assets/tracks/MT-SENSATION-MIX.wav'),
(49, 'Spring Island', 13, NULL, 12, 'assets/covers/MT-128.webp', 'assets/covers/MT-600.webp', 1, '2026-01-29 08:09:20', '2026-01-29 08:09:20', 3, 'assets/tracks/MT-SPRING-ISLAND-MIX.wav'),
(50, 'Under The Sun', 13, NULL, 12, 'assets/covers/MT-128.webp', 'assets/covers/MT-600.webp', 1, '2026-01-29 08:09:20', '2026-01-29 08:09:20', 2, 'assets/tracks/MT-UNDER-THE-SUN-MIX.wav'),
(52, 'Amplifire', 15, NULL, 14, NULL, NULL, 1, '2026-01-30 07:43:11', '2026-01-30 07:43:11', 1, 'assets/tracks/SKRILLEX-AMPLIFIRE.mp3'),
(53, 'Bangarang (feat. Sirah)', 15, 25, 14, 'assets/covers/skrillex-bangarang-129.webp', 'assets/covers/skrillex-bangarang-600.webp', 1, '2026-01-30 07:43:11', '2026-01-30 07:43:11', 9, 'assets/tracks/SKRILLEX-BANGARANG-(FEAT.-SIRAH).mp3'),
(54, 'Cinema (feat Gary GO)', 16, 26, 15, 'assets/covers/benny-benassi-cinema-128.webp', 'assets/covers/benny-benassi-cinema-600.webp', 1, '2026-01-30 07:43:11', '2026-01-30 07:43:11', 0, 'assets/tracks/benny-benassi-CINEMA-(FEAT-GARY-GO)-(Skrillex-remix).mp3'),
(55, 'First Of The Year (Equinox)', 15, 27, 14, 'assets/covers/skrillex-some-monsters-and-sprites-128.webp', 'assets/covers/skrillex-some-monsters-and-sprites-600.webp', 1, '2026-01-30 07:43:11', '2026-01-30 07:43:11', 0, 'assets/tracks/SKRILLEX-FIRST-OF-THE-YEAR-(equinov).mp3'),
(56, 'I Am Skrillex', 15, NULL, 14, NULL, NULL, 1, '2026-01-30 07:43:11', '2026-01-30 07:43:11', 0, 'assets/tracks/SKRILLEX-I-AM-SKRILLEX.mp3'),
(57, 'Kyoto (feat Sirah)', 15, 25, 14, 'assets/covers/skrillex-bangarang-129.webp', 'assets/covers/skrillex-bangarang-600.webp', 1, '2026-01-30 07:43:11', '2026-01-30 07:43:11', 0, 'assets/tracks/SKRILLEX-KYOTO (FEAT-SIRAH).mp3'),
(58, 'Levels (Skrillex remix)', 17, 28, 16, 'assets/covers/avicci-levels-128.webp', 'assets/covers/avicci-levels-600.webp', 1, '2026-01-30 07:43:11', '2026-01-30 07:43:11', 3, 'assets/tracks/avicii-levels-(skrillex-remix).mp3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
