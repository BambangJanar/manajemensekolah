<?php

class Home extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['total_siswa'] = $this->model('SiswaModel')->countSiswa();
        $data['total_kelas'] = $this->model('KelasModel')->countKelas();
        $data['total_mapel'] = $this->model('MapelModel')->countMapel();

        // Manual Queries for other stats
        $db = new Database;

        // Count Guru
        $db->query("SELECT COUNT(*) as total FROM guru");
        $data['total_guru'] = $db->single()['total'];

        // Count Transaksi Poin
        $db->query("SELECT COUNT(*) as total FROM riwayat_poin");
        $data['total_poin'] = $db->single()['total'];

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
