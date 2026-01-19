<?php

class JenisPoin extends Controller
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
        $data['judul'] = 'Poin Prestasi & Pelanggaran';
        $data['jenis_poin'] = $this->model('JenisPoinModel')->getAllJenisPoin();
        $this->view('templates/header', $data);
        $this->view('jenispoin/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('JenisPoinModel')->tambahDataJenisPoin($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/jenispoin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/jenispoin');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('JenisPoinModel')->hapusDataJenisPoin($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/jenispoin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/jenispoin');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('JenisPoinModel')->getJenisPoinById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('JenisPoinModel')->ubahDataJenisPoin($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/jenispoin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/jenispoin');
            exit;
        }
    }
}
