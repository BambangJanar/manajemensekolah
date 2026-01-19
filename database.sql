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
CREATE TABLE IF NOT EXISTS guru (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nip VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    role ENUM('admin', 'guru') DEFAULT 'guru',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS jam_pelajaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jam_mulai TIME NOT NULL,
    jam_selesai TIME NOT NULL,
    sesi VARCHAR(50) NOT NULL,
    -- e.g., 'Jam Ke-1', 'Istirahat'
    keterangan VARCHAR(100)
);
CREATE TABLE IF NOT EXISTS jadwal_kelas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_kelas INT NOT NULL,
    id_mapel INT NOT NULL,
    id_guru INT NOT NULL,
    id_jam INT NOT NULL,
    hari VARCHAR(20) NOT NULL,
    -- Senin, Selasa, etc.
    ruangan VARCHAR(50),
    FOREIGN KEY (id_kelas) REFERENCES kelas(id) ON DELETE CASCADE,
    FOREIGN KEY (id_mapel) REFERENCES mapel(id) ON DELETE CASCADE,
    FOREIGN KEY (id_guru) REFERENCES guru(id) ON DELETE CASCADE,
    FOREIGN KEY (id_jam) REFERENCES jam_pelajaran(id) ON DELETE CASCADE
);
-- Insert dummy data for Guru
INSERT INTO guru (nip, nama, role)
VALUES ('198001012010011001', 'Admin Sekolah', 'admin'),
    ('199002022015021002', 'Pak Haryo', 'guru'),
    ('199203032018032003', 'Bu Wati', 'guru');
-- Insert dummy data for Jam Pelajaran
INSERT INTO jam_pelajaran (jam_mulai, jam_selesai, sesi, keterangan)
VALUES ('07:00', '07:45', 'Jam Ke-1', 'Pelajaran'),
    ('07:45', '08:30', 'Jam Ke-2', 'Pelajaran'),
    ('08:30', '09:15', 'Jam Ke-3', 'Pelajaran');
-- Insert dummy data for Jadwal Kelas
INSERT INTO jadwal_kelas (
        id_kelas,
        id_mapel,
        id_guru,
        id_jam,
        hari,
        ruangan
    )
VALUES (1, 1, 2, 1, 'Senin', 'R. 101'),
    -- X IPA 1, Matematika, Pak Haryo, Jam 1, Senin
    (1, 2, 3, 2, 'Senin', 'R. 101');
-- X IPA 1, B. Indo, Bu Wati, Jam 2, Senin