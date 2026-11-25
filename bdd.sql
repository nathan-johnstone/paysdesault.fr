CREATE DATABASE IF NOT EXISTS paysdesault CHARSET utf8mb4;
USE paysdesault;

CREATE TABLE IF NOT EXISTS `role`(
	id INT PRIMARY KEY AUTO_INCREMENT,
	`role` VARCHAR(20) NOT NULL UNIQUE
)ENGINE=innoDB;

INSERT INTO `role`(`role`) VALUES ('Administrateur'),('Utilisateur');

CREATE TABLE IF NOT EXISTS `user`(
	id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL UNIQUE,
	email VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT NOW(),
    role_id INT NOT NULL DEFAULT 2,
	CONSTRAINT fk_user_role FOREIGN KEY (role_id) REFERENCES `role`(id)
)ENGINE=innoDB;

INSERT INTO `user`(email, `name`, `password`, role_id) VALUES ('nathan@bricarosa.fr', 'Nathan', '$2y$10$cSbX3nSYSH74Dj.UsYME7uogNu/4c1WxcYM5vNfpSmOoOCO1qk5C6', 1);

CREATE TABLE IF NOT EXISTS category(
	id INT PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(100) UNIQUE NOT NULL,
    icon VARCHAR(20) NOT NULL,
    `image` VARCHAR(255)
)ENGINE=innoDB;

INSERT INTO category(`name`, icon, `image`) VALUES ('Formation', 'school', './assets/media/img/formation.png'), ('Fête locale', 'celebration', './assets/media/img/fete.png');

CREATE TABLE IF NOT EXISTS `event`(
	id INT PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(100) NOT NULL,
    village VARCHAR(50) NOT NULL,
    address VARCHAR(255) NOT NULL,
    `description` TEXT,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    start_time VARCHAR(5) NOT NULL,
    end_time VARCHAR(5) NOT NULL,
    category_id INT NOT NULL,
    CONSTRAINT fk_agenda_category FOREIGN KEY (category_id) REFERENCES category(id),
    user_id INT NOT NULL,
	CONSTRAINT fk_agenda_user FOREIGN KEY (user_id) REFERENCES `user`(id)
)ENGINE=innoDB;

INSERT INTO `event`(title, village, address, `description`, start_date, end_date, start_time, end_time, category_id, user_id) VALUES ('Formation Prevention et Secours Citoyens (PSC)', 'Belcaire', 'Rue de la Petite Versane 11340 Belcaire', 'Venez apprendre les gestes de premiers secours','2026-09-29', '2026-09-29', '09:00', '17:00', 1, 1);
