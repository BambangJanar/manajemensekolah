<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['jml_siswa'] = $this->model('SiswaModel')->countSiswa();
        $data['jml_kelas'] = $this->model('KelasModel')->countKelas();
        $data['jml_mapel'] = $this->model('MapelModel')->countMapel();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
