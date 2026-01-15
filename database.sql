CREATE DATABASE IF NOT EXISTS sekolah_db;
USE sekolah_db;
CREATE TABLE IF NOT EXISTS kelas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR(50) NOT NULL,
    wali_kelas VARCHAR(100),
    kapasitas INT DEFAULT 0
);
CREATE TABLE IF NOT EXISTS mapel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_mapel VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    guru_pengampu VARCHAR(100),
    alokasi_kelas VARCHAR(50)
);
CREATE TABLE IF NOT EXISTS siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    id_kelas INT,
    alamat TEXT,
    no_telp VARCHAR(20),
    foto VARCHAR(255),
    FOREIGN KEY (id_kelas) REFERENCES kelas(id) ON DELETE
    SET NULL
);
-- Insert dummy data
INSERT INTO kelas (nama_kelas, wali_kelas, kapasitas)
VALUES ('X IPA 1', 'Pak Budi', 30),
    ('X IPA 2', 'Bu Siti', 32),
    ('XI IPA 1', 'Pak Joko', 30);
INSERT INTO mapel (
        nama_mapel,
        deskripsi,
        guru_pengampu,
        alokasi_kelas
    )
VALUES (
        'Matematika',
        'Pelajaran Matematika Wajib',
        'Pak Haryo',
        'Semua'
    ),
    (
        'Bahasa Indonesia',
        'Pelajaran Bahasa Indonesia',
        'Bu Wati',
        'Semua'
    );
INSERT INTO siswa (nis, nama, id_kelas, alamat, no_telp)
VALUES (
        '1001',
        'Budi Santoso',
        1,
        'Jl. Mawar No. 1',
        '08123456789'
    );