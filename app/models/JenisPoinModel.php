<?php

class JenisPoinModel extends Model
{
    private $table = 'jenis_poin';

    public function getAllJenisPoin()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getJenisPoinById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=?');
        $this->db->bind('i', $id);
        return $this->db->single();
    }

    public function tambahDataJenisPoin($data)
    {
        $query = "INSERT INTO jenis_poin (nama_poin, kategori, poin, keterangan) VALUES (?, ?, ?, ?)";
        $this->db->query($query);
        $this->db->bind('ssis', $data['nama_poin'], $data['kategori'], $data['poin'], $data['keterangan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataJenisPoin($id)
    {
        $query = "DELETE FROM jenis_poin WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('i', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataJenisPoin($data)
    {
        $query = "UPDATE jenis_poin SET nama_poin = ?, kategori = ?, poin = ?, keterangan = ? WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('ssisi', $data['nama_poin'], $data['kategori'], $data['poin'], $data['keterangan'], $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
