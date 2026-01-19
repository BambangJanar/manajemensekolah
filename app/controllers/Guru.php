<?php

class Guru extends Controller
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
        $data['judul'] = 'Daftar Guru';
        $data['guru'] = $this->model('GuruModel')->getAllGuru();
        $this->view('templates/header', $data);
        $this->view('guru/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('GuruModel')->tambahDataGuru($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/guru');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/guru');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('GuruModel')->hapusDataGuru($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/guru');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/guru');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('GuruModel')->getGuruById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('GuruModel')->ubahDataGuru($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/guru');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/guru');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Guru';
        $data['guru'] = $this->model('GuruModel')->cariDataGuru();
        $this->view('templates/header', $data);
        $this->view('guru/index', $data);
        $this->view('templates/footer');
    }
}
