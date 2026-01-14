<?php

class SiswaModel extends Model
{
    private $table = 'siswa';

    public function getAllSiswa()
    {
        $query = "SELECT siswa.*, kelas.nama_kelas 
                  FROM " . $this->table . " 
                  LEFT JOIN kelas ON siswa.id_kelas = kelas.id";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getSiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=?');
        $this->db->bind('i', $id);
        return $this->db->single();
    }

    public function tambahDataSiswa($data)
    {
        $query = "INSERT INTO " . $this->table . " (nis, nama, id_kelas, alamat, no_telp) VALUES (?, ?, ?, ?, ?)";

        $this->db->query($query);
        $this->db->bind('ssiss', $data['nis'], $data['nama'], $data['id_kelas'], $data['alamat'], $data['no_telp']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataSiswa($data)
    {
        $query = "UPDATE " . $this->table . " SET nis = ?, nama = ?, id_kelas = ?, alamat = ?, no_telp = ? WHERE id = ?";

        $this->db->query($query);
        $this->db->bind('ssissi', $data['nis'], $data['nama'], $data['id_kelas'], $data['alamat'], $data['no_telp'], $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataSiswa($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('i', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function countSiswa()
    {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        $result = $this->db->single();
        return $result['total'];
    }
}
