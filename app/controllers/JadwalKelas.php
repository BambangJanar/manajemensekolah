<?php

class JadwalKelas extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        if ($_SESSION['role'] != 'admin') {
            header('Location: ' . BASEURL);
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Jadwal Kelas';
        $data['jadwal'] = $this->model('JadwalKelasModel')->getAllJadwal();

        // Load data needed for dropdowns
        $data['kelas'] = $this->model('KelasModel')->getAllKelas();
        $data['mapel'] = $this->model('MapelModel')->getAllMapel();
        $data['guru'] = $this->model('GuruModel')->getAllGuru();
        $data['jam'] = $this->model('JamPelajaranModel')->getAllJamPelajaran();

        $this->view('templates/header', $data);
        $this->view('jadwalkelas/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('JadwalKelasModel')->tambahDataJadwal($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/jadwalkelas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/jadwalkelas');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('JadwalKelasModel')->hapusDataJadwal($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/jadwalkelas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/jadwalkelas');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('JadwalKelasModel')->getJadwalById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('JadwalKelasModel')->ubahDataJadwal($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/jadwalkelas');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/jadwalkelas');
            exit;
        }
    }
}
