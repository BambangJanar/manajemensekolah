<?php

class Siswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Siswa';

        $filters = [
            'keyword' => $_GET['keyword'] ?? '',
            'id_kelas' => $_GET['id_kelas'] ?? ''
        ];

        $data['siswa'] = $this->model('SiswaModel')->getAllSiswa($filters);
        $data['kelas'] = $this->model('KelasModel')->getAllKelas(); // For filter dropdown
        $data['filters'] = $filters;

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
        $data = $_POST;
        $data['foto'] = $this->uploadFoto();
        if (!$data['foto']) return false; // Handle error appropriately in real app

        if ($this->model('SiswaModel')->tambahDataSiswa($data) > 0) {
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
        $data = $_POST;
        $oldFoto = $_POST['oldFoto'];

        if ($_FILES['foto']['error'] === 4) {
            $data['foto'] = $oldFoto;
        } else {
            $data['foto'] = $this->uploadFoto();
        }

        if ($this->model('SiswaModel')->ubahDataSiswa($data) > 0) {
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

    public function uploadFoto()
    {
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        // Cek apakah ada gambar yang diupload
        if ($error === 4) {
            return 'default.jpg'; // Return default if store() needs a value, but logic in update() handles this. For store, maybe required?
            // If strictly required:
            // return false; 
        }

        // Cek ekstensi file
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('Yang anda upload bukan gambar!');
                  </script>";
            return false;
        }

        // Cek ukuran (max 2MB)
        if ($ukuranFile > 2000000) {
            echo "<script>
                    alert('Ukuran gambar terlalu besar!');
                  </script>";
            return false;
        }

        // Generate nama baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/siswa/' . $namaFileBaru);

        return $namaFileBaru;
    }
}
