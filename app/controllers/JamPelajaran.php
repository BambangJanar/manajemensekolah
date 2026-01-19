<?php

class JamPelajaran extends Controller
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
        $data['judul'] = 'Daftar Jam Pelajaran';
        $data['jam_pelajaran'] = $this->model('JamPelajaranModel')->getAllJamPelajaran();
        $this->view('templates/header', $data);
        $this->view('jampelajaran/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('JamPelajaranModel')->tambahDataJamPelajaran($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/jampelajaran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/jampelajaran');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('JamPelajaranModel')->hapusDataJamPelajaran($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/jampelajaran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/jampelajaran');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('JamPelajaranModel')->getJamPelajaranById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('JamPelajaranModel')->ubahDataJamPelajaran($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/jampelajaran');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/jampelajaran');
            exit;
        }
    }
}
