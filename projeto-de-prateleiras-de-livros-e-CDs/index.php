CREATE DATABASE media_collection;

USE media_collection;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user'
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255),
    publisher VARCHAR(255),
    year_of_publication YEAR,
    isbn VARCHAR(13) UNIQUE,
    shelf_id INT,
    space_id INT
);

CREATE TABLE cds (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255),
    label VARCHAR(255),
    year_of_release YEAR,
    barcode VARCHAR(13) UNIQUE,
    shelf_id INT,
    space_id INT
);

CREATE TABLE shelves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    identifier VARCHAR(50) NOT NULL,
    description TEXT
);

CREATE TABLE spaces (
    id INT AUTO_INCREMENT PRIMARY KEY,
    identifier VARCHAR(50) NOT NULL,
    shelf_id INT NOT NULL,
    FOREIGN KEY (shelf_id) REFERENCES shelves(id)
);

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_type ENUM('book', 'cd') NOT NULL,
    item_id INT NOT NULL,
    user_id INT NOT NULL,
    action ENUM('checkout', 'return') NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
