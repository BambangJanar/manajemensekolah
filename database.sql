CREATE DATABASE IF NOT EXISTS sekolah_db;
USE sekolah_db;
CREATE TABLE IF NOT EXISTS kelas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR(50) NOT NULL
);
CREATE TABLE IF NOT EXISTS mapel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_mapel VARCHAR(100) NOT NULL,
    deskripsi TEXT
);
CREATE TABLE IF NOT EXISTS siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    id_kelas INT,
    alamat TEXT,
    no_telp VARCHAR(20),
    FOREIGN KEY (id_kelas) REFERENCES kelas(id) ON DELETE
    SET NULL
);
-- Insert dummy data
INSERT INTO kelas (nama_kelas)
VALUES ('X IPA 1'),
    ('X IPA 2'),
    ('XI IPA 1');
INSERT INTO mapel (nama_mapel, deskripsi)
VALUES ('Matematika', 'Pelajaran Matematika Wajib'),
    ('Bahasa Indonesia', 'Pelajaran Bahasa Indonesia');
INSERT INTO siswa (nis, nama, id_kelas, alamat, no_telp)
VALUES (
        '1001',
        'Budi Santoso',
        1,
        'Jl. Mawar No. 1',
        '08123456789'
    );