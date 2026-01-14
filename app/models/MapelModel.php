<?php

class MapelModel extends Model
{
    private $table = 'mapel';

    public function getAllMapel()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMapelById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=?');
        $this->db->bind('i', $id);
        return $this->db->single();
    }

    public function tambahDataMapel($data)
    {
        $query = "INSERT INTO " . $this->table . " (nama_mapel, deskripsi) VALUES (?, ?)";

        $this->db->query($query);
        $this->db->bind('ss', $data['nama_mapel'], $data['deskripsi']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMapel($data)
    {
        $query = "UPDATE " . $this->table . " SET nama_mapel = ?, deskripsi = ? WHERE id = ?";

        $this->db->query($query);
        $this->db->bind('ssi', $data['nama_mapel'], $data['deskripsi'], $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMapel($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('i', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function countMapel()
    {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        $result = $this->db->single();
        return $result['total'];
    }
}
