<?php

class KelasModel extends Model
{
    private $table = 'kelas';

    public function getAllKelas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKelasById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=?');
        $this->db->bind('i', $id);
        return $this->db->single();
    }

    public function tambahDataKelas($data)
    {
        $query = "INSERT INTO " . $this->table . " (nama_kelas) VALUES (?)";

        $this->db->query($query);
        $this->db->bind('s', $data['nama_kelas']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataKelas($data)
    {
        $query = "UPDATE " . $this->table . " SET nama_kelas = ? WHERE id = ?";

        $this->db->query($query);
        $this->db->bind('si', $data['nama_kelas'], $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataKelas($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('i', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function countKelas()
    {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        $result = $this->db->single();
        return $result['total'];
    }
}
