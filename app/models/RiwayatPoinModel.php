<?php

class RiwayatPoinModel extends Model
{
    private $table = 'riwayat_poin';

    public function getAllRiwayat()
    {
        $query = "SELECT r.*, s.nama as nama_siswa, s.nis, j.nama_poin, j.poin, j.kategori 
                  FROM " . $this->table . " r
                  JOIN siswa s ON r.id_siswa = s.id
                  JOIN jenis_poin j ON r.id_jenis_poin = j.id
                  ORDER BY r.tanggal DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getRiwayatBySiswa($id_siswa)
    {
        $query = "SELECT r.*, j.nama_poin, j.poin, j.kategori 
                  FROM " . $this->table . " r
                  JOIN jenis_poin j ON r.id_jenis_poin = j.id
                  WHERE r.id_siswa = ?
                  ORDER BY r.tanggal DESC";
        $this->db->query($query);
        $this->db->bind('i', $id_siswa);
        return $this->db->resultSet();
    }

    public function getRiwayatById($id)
    {
        $query = "SELECT r.*, j.nama_poin, j.poin, j.kategori 
                  FROM " . $this->table . " r
                  JOIN jenis_poin j ON r.id_jenis_poin = j.id
                  WHERE r.id = ?";
        $this->db->query($query);
        $this->db->bind('i', $id);
        return $this->db->single();
    }

    public function tambahDataRiwayat($data)
    {
        $query = "INSERT INTO riwayat_poin (id_siswa, id_jenis_poin, tanggal, keterangan) VALUES (?, ?, ?, ?)";
        $this->db->query($query);
        $this->db->bind('iiss', $data['id_siswa'], $data['id_jenis_poin'], $data['tanggal'], $data['keterangan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataRiwayat($data)
    {
        $query = "UPDATE riwayat_poin SET id_siswa = ?, id_jenis_poin = ?, tanggal = ?, keterangan = ? WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('iissi', $data['id_siswa'], $data['id_jenis_poin'], $data['tanggal'], $data['keterangan'], $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataRiwayat($id)
    {
        $query = "DELETE FROM riwayat_poin WHERE id = ?";
        $this->db->query($query);
        $this->db->bind('i', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getTotalPoinSiswa($id_siswa)
    {
        $query = "SELECT SUM(j.poin) as total_poin 
                  FROM " . $this->table . " r
                  JOIN jenis_poin j ON r.id_jenis_poin = j.id
                  WHERE r.id_siswa = ?";
        $this->db->query($query);
        $this->db->bind('i', $id_siswa);
        $result = $this->db->single();
        return $result['total_poin'] ?? 0;
    }
}
