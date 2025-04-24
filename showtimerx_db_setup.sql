
-- ShowTimerX Datenbankstruktur

CREATE DATABASE IF NOT EXISTS showtimerx;
USE showtimerx;

-- Benutzer-Tabelle
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Mitarbeiter', 'Gast') DEFAULT 'Gast'
);

-- Timer-Tabelle
CREATE TABLE timers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    duration INT, -- Sekunden
    message TEXT,
    image VARCHAR(255),
    created_by INT,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

-- Displays-Tabelle
CREATE TABLE displays (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    assigned_timer INT,
    last_seen TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (assigned_timer) REFERENCES timers(id)
);
