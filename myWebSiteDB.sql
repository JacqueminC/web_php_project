CREATE DATABASE myWebSite;

DROP DATABASE myWebSite;

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
(1, "Dice Forge", 40, 1,'Ajouter déscirption',''),
(2, "Zcoprs", 50, 2,'Ajouter déscirption',''),
(3, "Descent", 90, 3,'Ajouter déscirption','');

INSERT INTO statuts VALUES
(1, "En attente"),
(2, "En prépration"),
(3, "Expédiée"),
(4, "Refusée");
INSERT INTO statuts VALUES
(5, "Panier");

INSERT INTO orders VALUES
(1, 1, 5);

INSERT INTO orderDetails VALUES
(1, 1, 1, 40),
(2, 1, 3, 90);

INSERT INTO orders VALUE (2, 4, 5);

INSERT INTO orderDetails
VALUES (3, 2, 1, 40),
(4, 2, 2, 50),
(5, 2, 3, 90);
