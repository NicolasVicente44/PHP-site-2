CREATE DATABASE comp_1006_final_movies;
USE comp_1006_final_movies;

CREATE TABLE `directors` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `short_bio` varchar(1000) NULL,
  `email` varchar(250) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `movies` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(300) NOT NULL,
  `description` varchar(5000) NULL,
  `length_in_minutes` int(11) NOT NULL DEFAULT 0,
  `director_id` int NOT NULL,
  UNIQUE (title, director_id),
  FOREIGN KEY (`director_id`) REFERENCES directors(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
