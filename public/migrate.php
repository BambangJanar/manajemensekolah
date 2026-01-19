<?php
require_once '../app/config/config.php';
require_once '../app/core/Database.php';

echo "<h1>Database Migration</h1>";

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// SQL to create tables
$sql = "
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
    sesi VARCHAR(50) NOT NULL, -- e.g., 'Jam Ke-1', 'Istirahat'
    keterangan VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS jadwal_kelas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_kelas INT NOT NULL,
    id_mapel INT NOT NULL,
    id_guru INT NOT NULL,
    id_jam INT NOT NULL,
    hari VARCHAR(20) NOT NULL, -- Senin, Selasa, etc.
    ruangan VARCHAR(50),
    FOREIGN KEY (id_kelas) REFERENCES kelas(id) ON DELETE CASCADE,
    FOREIGN KEY (id_mapel) REFERENCES mapel(id) ON DELETE CASCADE,
    FOREIGN KEY (id_guru) REFERENCES guru(id) ON DELETE CASCADE,
    FOREIGN KEY (id_jam) REFERENCES jam_pelajaran(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100),
    role ENUM('admin', 'guru') NOT NULL
);

CREATE TABLE IF NOT EXISTS jenis_poin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_poin VARCHAR(100) NOT NULL,
    kategori ENUM('prestasi', 'pelanggaran') NOT NULL,
    poin INT NOT NULL, -- Examples: 10, -5
    keterangan VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS riwayat_poin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_siswa INT NOT NULL,
    id_jenis_poin INT NOT NULL,
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP,
    keterangan TEXT,
    FOREIGN KEY (id_siswa) REFERENCES siswa(id) ON DELETE CASCADE,
    FOREIGN KEY (id_jenis_poin) REFERENCES jenis_poin(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS absensi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_siswa INT NOT NULL,
    tanggal DATE NOT NULL,
    status ENUM('Hadir', 'Sakit', 'Izin', 'Alpha') NOT NULL,
    keterangan VARCHAR(255),
    FOREIGN KEY (id_siswa) REFERENCES siswa(id) ON DELETE CASCADE
);

";

// Execute multi query
if ($db->multi_query($sql)) {
    do {
        // Store first result set
        if ($result = $db->store_result()) {
            $result->free();
        }
        // Check if there are more result sets
    } while ($db->more_results() && $db->next_result());
    echo "<p style='color: green;'>Tables created successfully!</p>";
} else {
    echo "<p style='color: red;'>Error creating tables: " . $db->error . "</p>";
}

// Insert dummy data if table is empty
$result = $db->query("SELECT COUNT(*) as count FROM guru");
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $sql_insert = "
    INSERT INTO guru (nip, nama, role) VALUES 
    ('198001012010011001', 'Admin Sekolah', 'admin'),
    ('199002022015021002', 'Pak Haryo', 'guru'),
    ('199203032018032003', 'Bu Wati', 'guru');

    INSERT INTO jam_pelajaran (jam_mulai, jam_selesai, sesi, keterangan) VALUES
    ('07:00', '07:45', 'Jam Ke-1', 'Pelajaran'),
    ('07:45', '08:30', 'Jam Ke-2', 'Pelajaran'),
    ('08:30', '09:15', 'Jam Ke-3', 'Pelajaran');
    ";

    if ($db->multi_query($sql_insert)) {
        do {
            if ($result = $db->store_result()) {
                $result->free();
            }
        } while ($db->more_results() && $db->next_result());
        echo "<p style='color: green;'>Dummy data inserted.</p>";
    } else {
        echo "<p style='color: red;'>Error inserting data: " . $db->error . "</p>";
    }
}

// Check if users exist
$result = $db->query("SELECT COUNT(*) as count FROM users");
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $pass_admin = password_hash('admin123', PASSWORD_DEFAULT);
    $pass_guru = password_hash('guru123', PASSWORD_DEFAULT);

    $sql_users = "INSERT INTO users (username, password, nama_lengkap, role) VALUES 
    ('admin', '$pass_admin', 'Administrator', 'admin'),
    ('guru', '$pass_guru', 'Guru Pengajar', 'guru')";

    if ($db->query($sql_users) === TRUE) {
        echo "<p style='color: green;'>Users seeded (admin/admin123, guru/guru123).</p>";
    } else {
        echo "<p style='color: red;'>Error seeding users: " . $db->error . "</p>";
    }
}

// Insert dummy data for jenis_poin
$result = $db->query("SELECT COUNT(*) as count FROM jenis_poin");
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $sql_poin = "INSERT INTO jenis_poin (nama_poin, kategori, poin, keterangan) VALUES 
    ('Juara Lomba Tingkat Sekolah', 'prestasi', 20, 'Mengharumkan nama sekolah internal'),
    ('Juara Lomba Tingkat Nasional', 'prestasi', 50, 'Mengharumkan nama sekolah nasional'),
    ('Kehadiran 100% Sebulan', 'prestasi', 10, 'Apresiasi kedisiplinan'),
    ('Terlambat Masuk Sekolah < 15 Menit', 'pelanggaran', -5, 'Disiplin waktu'),
    ('Terlambat Masuk Sekolah > 15 Menit', 'pelanggaran', -10, 'Disiplin waktu berat'),
    ('Tidak Memakai Atribut Lengkap', 'pelanggaran', -5, 'Disiplin seragam'),
    ('Bolos Pelajaran', 'pelanggaran', -20, 'Pelanggaran berat')";

    if ($db->query($sql_poin) === TRUE) {
        echo "<p style='color: green;'>Jenis Poin seeded.</p>";
    } else {
        echo "<p style='color: red;'>Error seeding jenis_poin: " . $db->error . "</p>";
    }
}

$db->close();
echo "<br><br><a href='" . BASEURL . "'>Go to Home</a>";
