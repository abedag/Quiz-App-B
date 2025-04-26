CREATE DATABASE webAppDB;
USE webAppDB;

CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(55) UNIQUE NOT NULL,
  username VARCHAR(20) UNIQUE NOT NULL,
  password VARCHAR(55) NOT NULL,
  scores_json TEXT,
  high_score INT DEFAULT 0,
  role ENUM('user', 'admin') DEFAULT 'user'
);

