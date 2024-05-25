CREATE DATABASE download_apk;

USE download_apk;

CREATE TABLE emails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    type ENUM('konsumen', 'jasa') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
