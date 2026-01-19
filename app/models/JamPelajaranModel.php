<?php

class JamPelajaranModel
{
    private $table = 'jam_pelajaran';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllJamPelajaran()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getJamPelajaranById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=?');
        $this->db->bind('i', $id);
        return $this->db->single();
    }

    public function tambahDataJamPelajaran($data)
    {
        $query = "INSERT INTO jam_pelajaran (jam_mulai, jam_selesai, sesi, keterangan) VALUES (?, ?, ?, ?)";
        $this->db->query($query);
        $this->db->bind('ssss', $data['jam_mulai'], $data['jam_selesai'], $data['sesi'], $data['keterangan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataJamPelajaran($id)
    {
        $query = "DELETE FROM jam_pelajaran WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('i', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataJamPelajaran($data)
    {
        $query = "UPDATE jam_pelajaran SET jam_mulai = ?, jam_selesai = ?, sesi = ?, keterangan = ? WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('ssssi', $data['jam_mulai'], $data['jam_selesai'], $data['sesi'], $data['keterangan'], $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
