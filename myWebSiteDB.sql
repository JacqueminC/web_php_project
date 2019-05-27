DROP DATABASE IF EXISTS myWebSite;

CREATE DATABASE myWebSite;

USE myWebSite;

CREATE TABLE roles(
id INT AUTO_INCREMENT PRIMARY KEY,
roleName VARCHAR(20) NOT NULL
)ENGINE=INNODB;

CREATE TABLE `users`(
id INT AUTO_INCREMENT PRIMARY KEY,
firstName VARCHAR(50) NOT NULL,
lastName VARCHAR(50) NOT NULL,
login VARCHAR(50) NOT NULL UNIQUE,
passwordUser VARCHAR(100) NOT NULL,
email VARCHAR(100),
roleId INT NOT NULL DEFAULT 4,
FOREIGN KEY (roleId) REFERENCES roles (id)
)ENGINE=INNODB;


CREATE TABLE categories(
id INT AUTO_INCREMENT PRIMARY KEY,
categorie VARCHAR(50) NOT NULL UNIQUE
)ENGINE=INNODB;

CREATE TABLE products(
id INT AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(100) NOT NULL UNIQUE,
price DOUBLE (6,3) NOT NULL,
categorieId INT,
description VARCHAR(100),
imageLink VARCHAR(200),
FOREIGN KEY (categorieId) REFERENCES categories (id)
)ENGINE=INNODB;

CREATE TABLE statuts(
id INT AUTO_INCREMENT PRIMARY KEY,
statut VARCHAR(20) NOT NULL UNIQUE
)ENGINE=INNODB;

CREATE TABLE orders(
idOrder INT AUTO_INCREMENT PRIMARY KEY,
userId INT,
statutId INT,
FOREIGN KEY (userId) REFERENCES users (id),
FOREIGN KEY (statutId) REFERENCES statuts (id)
)ENGINE=INNODB;

ALTER TABLE orders
ADD dateOrder DATETIME;

CREATE TABLE orderDetails(
id INT AUTO_INCREMENT PRIMARY KEY,
orderId INT,
productId INT,
price DOUBLE (6,3),
FOREIGN KEY (orderId) REFERENCES orders (idOrder),
FOREIGN KEY (productId) REFERENCES products (id)
)ENGINE=INNODB;

INSERT INTO roles VALUES 
(1, "Root"),
(2, "Administrator"),
(3, "Employee"),
(4, "Customer");

-- hash bcrypt
INSERT INTO users VALUES 
-- root1234
(1, 'Cédric', 'Jacquemin', 'CédricRoot', '$2y$10$wQDmoytI.gXIgm.juxe1N.zSDCyQNkwkvwGpDPcI27TfeOKBOGUxq', 'cedjacq@outlook.com', 1),
-- admin1234
(2, "Cédric", "Jacquemin", "CédricAdmin", "$2y$10$jGVgNc2QyzgqzUSY.wcI2.m7gzryd4Uld7RQaAF291CgAQJkDMHAi", "cedjacq@outlook.com", 2),
-- employee1234
(3, "Edward", "Stark", "Employee", "$2y$10$Nm4N0dVqe03tJWz3aV89AuvWOwvjP5PMxl31mdUyE/R7rrfWWiWji", "edwardstark@westeros.be", 3);
INSERT INTO users (id, firstname, lastname, login, passwordUser, email) VALUES 
-- user1234
(4, "Kurt", "Cobain", "User",  "$2y$10$lYF0YsGTw6qQd82x3DfgAukrNZ/BZRXXU.UdIWlqhBVPt2/iqH6La", "kurtcobain@nirvana.be"); 

INSERT INTO categories VALUES
(1, "jeux de société"),
(2, "jeux de rôle"),
(3, "jeux de plateaux");

INSERT INTO products VALUES
(1, "Dice Forge", 40, 1,'Ajouter déscirption','1diceForge'),
(2, "Zcoprs", 50, 2,'Ajouter déscirption','2zcorps'),
(3, "Descent", 90, 3,'Ajouter déscirption','3descentv2'),
(4, "Catane", 40, 1, '','4Catane'),
(5, "Carcassone", 25, 1, '','5carcassonne');

INSERT INTO statuts VALUES
(1, "En attente"),
(2, "En prépration"),
(3, "Expédiée"),
(4, "Refusée"),
(5, "Panier"),
(6, "Terminée");

INSERT INTO orders VALUES
(1, 1, 6, NOW()),
(2, 1, 6, NOW()),
(3, 2, 6, NOW()),
(4, 2, 6, NOW()),
(5, 3, 6, NOW()),
(6, 4, 6, NOW());

INSERT INTO orders(idOrder, userId,StatutId) VALUES
(7, 1, 1),
(8, 2, 1);

 
INSERT INTO orderDetails VALUES
(1, 1, 1, 40),
(2, 1, 4, 40),
(3, 1, 5, 25),
(4, 2, 1, 40),
(5, 2, 3, 90),
(6, 2, 4, 40),
(7, 2, 5, 25),
(8, 3, 1, 40),
(9, 3, 2, 50),
(10, 3, 5, 25),
(11, 4, 1, 40),
(12, 4, 4, 40),
(13, 5, 1, 40),
(14, 5, 4, 40),
(15, 5, 5, 25),
(16, 6, 1, 40),
(17, 6, 5, 25),
(18, 7, 1, 40),
(19, 8, 1, 40);
