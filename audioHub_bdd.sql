CREATE TABLE `users`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(35) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `role` VARCHAR(5) NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL,
    `deleted_at` TIMESTAMP NOT NULL
);
CREATE TABLE `tracks`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(150) NOT NULL,
    `artist_id` BIGINT NOT NULL,
    `album_id` BIGINT NULL,
    `genre_id` BIGINT NOT NULL,
    `img_path_small` VARCHAR(255) NOT NULL,
    `img_path_large` VARCHAR(255) NOT NULL,
    `id_user` BIGINT NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL,
    `listen-counter` BIGINT NULL,
    `track_path` VARCHAR(255) NOT NULL
);
CREATE TABLE `playlists`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `id_user` BIGINT NOT NULL,
    `id_track` BIGINT NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL
);
CREATE TABLE `albums`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(150) NOT NULL,
    `id_artist` BIGINT NOT NULL
);
CREATE TABLE `artists`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(150) NOT NULL
);
CREATE TABLE `genres`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL
);
CREATE TABLE `playlists_tracks`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_playlist` BIGINT NOT NULL,
    `id_track` BIGINT NOT NULL
);
ALTER TABLE
    `albums` ADD CONSTRAINT `albums_id_artist_foreign` FOREIGN KEY(`id_artist`) REFERENCES `artists`(`id`);
ALTER TABLE
    `tracks` ADD CONSTRAINT `tracks_album_id_foreign` FOREIGN KEY(`album_id`) REFERENCES `albums`(`id`);
ALTER TABLE
    `tracks` ADD CONSTRAINT `tracks_artist_id_foreign` FOREIGN KEY(`artist_id`) REFERENCES `artists`(`id`);
ALTER TABLE
    `playlists` ADD CONSTRAINT `playlists_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `users`(`id`);
ALTER TABLE
    `playlists_tracks` ADD CONSTRAINT `playlists_tracks_id_track_foreign` FOREIGN KEY(`id_track`) REFERENCES `tracks`(`id`);
ALTER TABLE
    `tracks` ADD CONSTRAINT `tracks_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `users`(`id`);
ALTER TABLE
    `playlists_tracks` ADD CONSTRAINT `playlists_tracks_id_playlist_foreign` FOREIGN KEY(`id_playlist`) REFERENCES `playlists`(`id`);
ALTER TABLE
    `tracks` ADD CONSTRAINT `tracks_genre_id_foreign` FOREIGN KEY(`genre_id`) REFERENCES `genres`(`id`);