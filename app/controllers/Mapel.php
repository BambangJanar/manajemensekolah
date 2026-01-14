<?php

class Mapel extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mata Pelajaran';
        $data['mapel'] = $this->model('MapelModel')->getAllMapel();

        $this->view('templates/header', $data);
        $this->view('mapel/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Mata Pelajaran';

        $this->view('templates/header', $data);
        $this->view('mapel/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        if ($this->model('MapelModel')->tambahDataMapel($_POST) > 0) {
            header('Location: ' . BASEURL . '/mapel');
            exit;
        } else {
            header('Location: ' . BASEURL . '/mapel');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Mata Pelajaran';
        $data['mapel'] = $this->model('MapelModel')->getMapelById($id);

        $this->view('templates/header', $data);
        $this->view('mapel/edit', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('MapelModel')->ubahDataMapel($_POST) > 0) {
            header('Location: ' . BASEURL . '/mapel');
            exit;
        } else {
            header('Location: ' . BASEURL . '/mapel');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('MapelModel')->hapusDataMapel($id) > 0) {
            header('Location: ' . BASEURL . '/mapel');
            exit;
        } else {
            header('Location: ' . BASEURL . '/mapel');
            exit;
        }
    }
}
