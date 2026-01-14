<?php

class Kelas extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Kelas';
        $data['kelas'] = $this->model('KelasModel')->getAllKelas();

        $this->view('templates/header', $data);
        $this->view('kelas/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Kelas';

        $this->view('templates/header', $data);
        $this->view('kelas/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        if ($this->model('KelasModel')->tambahDataKelas($_POST) > 0) {
            // Flash message could be added here
            header('Location: ' . BASEURL . '/kelas');
            exit;
        } else {
            // Error handling
            header('Location: ' . BASEURL . '/kelas');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Kelas';
        $data['kelas'] = $this->model('KelasModel')->getKelasById($id);

        $this->view('templates/header', $data);
        $this->view('kelas/edit', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('KelasModel')->ubahDataKelas($_POST) > 0) {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        } else {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('KelasModel')->hapusDataKelas($id) > 0) {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        } else {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        }
    }
}
