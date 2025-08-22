CREATE DATABASE cuti_db;
USE cuti_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('karyawan','admin') DEFAULT 'karyawan'
);

CREATE TABLE leave_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    jenis_cuti VARCHAR(50),
    tgl_mulai DATE,
    tgl_selesai DATE,
    alasan TEXT,
    status ENUM('Pending','Disetujui','Ditolak') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);