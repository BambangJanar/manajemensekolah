<?php

class RiwayatPoin extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        // Guru and Admin can access
    }

    public function index()
    {
        $data['judul'] = 'Riwayat Poin Siswa';
        $data['riwayat'] = $this->model('RiwayatPoinModel')->getAllRiwayat();

        // Load data needed for modal (Students, Point Types)
        $data['siswa'] = $this->model('SiswaModel')->getAllSiswa();
        $data['jenis_poin'] = $this->model('JenisPoinModel')->getAllJenisPoin();

        $this->view('templates/header', $data);
        $this->view('riwayatpoin/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('RiwayatPoinModel')->tambahDataRiwayat($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/riwayatpoin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/riwayatpoin');
            exit;
        }
    }
}
