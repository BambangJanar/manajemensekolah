<?php

class Siswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Siswa';
        $data['siswa'] = $this->model('SiswaModel')->getAllSiswa();

        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Data Siswa';
        $data['kelas'] = $this->model('KelasModel')->getAllKelas();

        $this->view('templates/header', $data);
        $this->view('siswa/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        if ($this->model('SiswaModel')->tambahDataSiswa($_POST) > 0) {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Data Siswa';
        $data['siswa'] = $this->model('SiswaModel')->getSiswaById($id);
        $data['kelas'] = $this->model('KelasModel')->getAllKelas();

        $this->view('templates/header', $data);
        $this->view('siswa/edit', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('SiswaModel')->ubahDataSiswa($_POST) > 0) {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('SiswaModel')->hapusDataSiswa($id) > 0) {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        } else {
            header('Location: ' . BASEURL . '/siswa');
            exit;
        }
    }
}
