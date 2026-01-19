<?php

class JadwalKelasModel
{
    private $table = 'jadwal_kelas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllJadwal()
    {
        $query = "SELECT jadwal_kelas.*, kelas.nama_kelas, mapel.nama_mapel, guru.nama AS nama_guru, jam_pelajaran.sesi, jam_pelajaran.jam_mulai, jam_pelajaran.jam_selesai
                  FROM " . $this->table . "
                  JOIN kelas ON jadwal_kelas.id_kelas = kelas.id
                  JOIN mapel ON jadwal_kelas.id_mapel = mapel.id
                  JOIN guru ON jadwal_kelas.id_guru = guru.id
                  JOIN jam_pelajaran ON jadwal_kelas.id_jam = jam_pelajaran.id
                  ORDER BY jadwal_kelas.hari DESC, jam_pelajaran.jam_mulai ASC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getJadwalById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=?');
        $this->db->bind('i', $id);
        return $this->db->single();
    }

    public function tambahDataJadwal($data)
    {
        $query = "INSERT INTO jadwal_kelas (id_kelas, id_mapel, id_guru, id_jam, hari, ruangan) VALUES (?, ?, ?, ?, ?, ?)";
        $this->db->query($query);
        $this->db->bind('iiiiss', $data['id_kelas'], $data['id_mapel'], $data['id_guru'], $data['id_jam'], $data['hari'], $data['ruangan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataJadwal($id)
    {
        $query = "DELETE FROM jadwal_kelas WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('i', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataJadwal($data)
    {
        $query = "UPDATE jadwal_kelas SET id_kelas = ?, id_mapel = ?, id_guru = ?, id_jam = ?, hari = ?, ruangan = ? WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('iiiissi', $data['id_kelas'], $data['id_mapel'], $data['id_guru'], $data['id_jam'], $data['hari'], $data['ruangan'], $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
