<?php

class SiswaModel extends Model
{
    private $table = 'siswa';

    public function getAllSiswa($filters = [])
    {
        $query = "SELECT siswa.*, kelas.nama_kelas,
                  (SELECT COALESCE(SUM(jp.poin), 0) FROM riwayat_poin rp JOIN jenis_poin jp ON rp.id_jenis_poin = jp.id WHERE rp.id_siswa = siswa.id AND jp.kategori = 'prestasi') as total_prestasi,
                  (SELECT COALESCE(SUM(jp.poin), 0) FROM riwayat_poin rp JOIN jenis_poin jp ON rp.id_jenis_poin = jp.id WHERE rp.id_siswa = siswa.id AND jp.kategori = 'pelanggaran') as total_pelanggaran,
                  (SELECT COALESCE(SUM(jp.poin), 0) FROM riwayat_poin rp JOIN jenis_poin jp ON rp.id_jenis_poin = jp.id WHERE rp.id_siswa = siswa.id) as total_poin
                  FROM " . $this->table . " 
                  LEFT JOIN kelas ON siswa.id_kelas = kelas.id";

        $conditions = [];
        $types = "";
        $params = [];

        if (!empty($filters['keyword'])) {
            $conditions[] = "(siswa.nama LIKE ? OR siswa.nis LIKE ?)";
            $types .= "ss";
            $params[] = "%" . $filters['keyword'] . "%";
            $params[] = "%" . $filters['keyword'] . "%";
        }

        if (!empty($filters['id_kelas'])) {
            $conditions[] = "siswa.id_kelas = ?";
            $types .= "i";
            $params[] = $filters['id_kelas'];
        }

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $this->db->query($query);

        if (!empty($params)) {
            $this->db->bind($types, ...$params);
        }

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
        $query = "INSERT INTO " . $this->table . " (nis, nama, id_kelas, alamat, no_telp, foto) VALUES (?, ?, ?, ?, ?, ?)";

        $this->db->query($query);
        $this->db->bind('ssisss', $data['nis'], $data['nama'], $data['id_kelas'], $data['alamat'], $data['no_telp'], $data['foto']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataSiswa($data)
    {
        $query = "UPDATE " . $this->table . " SET nis = ?, nama = ?, id_kelas = ?, alamat = ?, no_telp = ?, foto = ? WHERE id = ?";

        $this->db->query($query);
        $this->db->bind('ssisssi', $data['nis'], $data['nama'], $data['id_kelas'], $data['alamat'], $data['no_telp'], $data['foto'], $data['id']);

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
