<?php

class GuruModel
{
    private $table = 'guru';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGuru()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getGuruById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=?');
        $this->db->bind('i', $id);
        return $this->db->single();
    }

    public function tambahDataGuru($data)
    {
        $query = "INSERT INTO guru (nip, nama, role) VALUES (?, ?, ?)";
        $this->db->query($query);
        $this->db->bind('sss', $data['nip'], $data['nama'], $data['role']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataGuru($id)
    {
        $query = "DELETE FROM guru WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('i', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataGuru($data)
    {
        $query = "UPDATE guru SET nip = ?, nama = ?, role = ? WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('sssi', $data['nip'], $data['nama'], $data['role'], $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataGuru()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM guru WHERE nama LIKE ? OR nip LIKE ?";
        $this->db->query($query);
        $term = "%$keyword%";
        $this->db->bind('ss', $term, $term);
        return $this->db->resultSet();
    }
}
