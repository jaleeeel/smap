-- Database schema for Sacramental Records Management System
CREATE DATABASE IF NOT EXISTS sacramental_records;
USE sacramental_records;

-- Users table for authentication
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Baptismal records table
CREATE TABLE IF NOT EXISTS baptismal_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    child_name VARCHAR(100) NOT NULL,
    birth_date DATE NOT NULL,
    baptism_date DATE NOT NULL,
    father_name VARCHAR(100) NOT NULL,
    mother_name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    godparents TEXT NOT NULL,
    minister VARCHAR(100) NOT NULL,
    book_number VARCHAR(20) NOT NULL,
    page_number VARCHAR(20) NOT NULL,
    entry_number VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Communion records table
CREATE TABLE IF NOT EXISTS communion_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    recipient_name VARCHAR(100) NOT NULL,
    communion_date DATE NOT NULL,
    birth_date DATE NOT NULL,
    parents_names VARCHAR(200) NOT NULL,
    address TEXT NOT NULL,
    parish VARCHAR(100) NOT NULL,
    minister VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Confirmation records table
CREATE TABLE IF NOT EXISTS confirmation_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    candidate_name VARCHAR(100) NOT NULL,
    confirmation_date DATE NOT NULL,
    birth_date DATE NOT NULL,
    parents_names VARCHAR(200) NOT NULL,
    sponsor VARCHAR(100) NOT NULL,
    minister VARCHAR(100) NOT NULL,
    parish VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Marriage records table
CREATE TABLE IF NOT EXISTS marriage_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    groom_name VARCHAR(100) NOT NULL,
    bride_name VARCHAR(100) NOT NULL,
    marriage_date DATE NOT NULL,
    groom_parents VARCHAR(200) NOT NULL,
    bride_parents VARCHAR(200) NOT NULL,
    address TEXT NOT NULL,
    minister VARCHAR(100) NOT NULL,
    witnesses TEXT NOT NULL,
    book_number VARCHAR(20) NOT NULL,
    page_number VARCHAR(20) NOT NULL,
    entry_number VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
