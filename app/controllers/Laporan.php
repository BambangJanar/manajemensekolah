<?php

class Laporan extends Controller
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
        $data['judul'] = 'Laporan';
        $this->view('templates/header', $data);
        $this->view('laporan/index', $data);
        $this->view('templates/footer');
    }

    public function poin()
    {
        $data['judul'] = 'Laporan Poin Siswa';
        // Logic to fetch filtered data (e.g. by date range) can be added here
        // For simplicity, we fetch all
        $data['riwayat'] = $this->model('RiwayatPoinModel')->getAllRiwayat();

        $this->view('templates/header', $data);
        $this->view('laporan/poin', $data);
        $this->view('templates/footer');
    }

    public function cetakPoin()
    {
        $data['judul'] = 'Cetak Laporan Poin';
        $data['riwayat'] = $this->model('RiwayatPoinModel')->getAllRiwayat();
        $this->view('laporan/cetak_poin', $data);
    }
}
