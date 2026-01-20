<?php

class Laporan extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Laporan';
        $this->view('templates/header', $data);
        $this->view('laporan/index', $data);
        $this->view('templates/footer');
    }

    public function poin()
    {
        $data['judul'] = 'Laporan Poin Siswa';
        // Logic to fetch filtered data (e.g. by date range) can be added here
        // For simplicity, we fetch all
        $data['riwayat'] = $this->model('RiwayatPoinModel')->getAllRiwayat();

        $this->view('templates/header', $data);
        $this->view('laporan/poin', $data);
        $this->view('templates/footer');
    }

    public function cetakPoin()
    {
        $data['judul'] = 'Cetak Laporan Poin';
        $data['riwayat'] = $this->model('RiwayatPoinModel')->getAllRiwayat();
        $this->view('laporan/cetak_poin', $data);
    }

    public function guru()
    {
        $data['judul'] = 'Laporan Data Guru';
        $data['guru'] = $this->model('GuruModel')->getAllGuru();
        $this->view('templates/header', $data);
        $this->view('laporan/guru', $data);
        $this->view('templates/footer');
    }

    public function siswa()
    {
        $data['judul'] = 'Laporan Data Siswa';
        $data['kelas'] = $this->model('KelasModel')->getAllKelas();

        // Filter logic if class selected
        $filters = [];
        if (isset($_POST['id_kelas']) && $_POST['id_kelas'] != '') {
            $filters['id_kelas'] = $_POST['id_kelas'];
            $data['selected_kelas'] = $_POST['id_kelas'];
        }

        $data['siswa'] = $this->model('SiswaModel')->getAllSiswa($filters);
        $this->view('templates/header', $data);
        $this->view('laporan/siswa', $data);
        $this->view('templates/footer');
    }

    public function jadwal()
    {
        $data['judul'] = 'Laporan Jadwal Pelajaran';
        $data['kelas'] = $this->model('KelasModel')->getAllKelas();
        // Assuming JadwalKelasModel has a way to get all or by class
        // I will use getAllJadwal() from the model created earlier
        $data['jadwal'] = $this->model('JadwalKelasModel')->getAllJadwal();
        $this->view('templates/header', $data);
        $this->view('laporan/jadwal', $data);
        $this->view('templates/footer');
    }

    public function top_poin()
    {
        $data['judul'] = 'Laporan Top Poin';
        // Need to add logic in Laporan or RiwayatModel to get Top Siswa. 
        // For now, I'll fetch all students and sort in PHP or Model.
        // Better to add getTopStudents into RiwayatPoinModel or SiswaModel.
        // I will use SiswaModel->getAllSiswa and sort here for simplicity first.

        $siswa = $this->model('SiswaModel')->getAllSiswa();

        // Sort for Top Prestasi
        usort($siswa, function ($a, $b) {
            return $b['total_prestasi'] <=> $a['total_prestasi'];
        });
        $data['top_prestasi'] = array_slice($siswa, 0, 10);

        // Sort for Top Pelanggaran (Most Negative means smallest number, but we want "Top Pelanggaran" meaning biggest issue, so smallest total_poin or biggest absolute pelanggaran?)
        // Pelanggaran sum is usually negative (e.g. -50). So smallest arithmetic value is "Top Pelanggaran".
        usort($siswa, function ($a, $b) {
            return $a['total_pelanggaran'] <=> $b['total_pelanggaran'];
        });
        $data['top_pelanggaran'] = array_slice($siswa, 0, 10);

        $this->view('templates/header', $data);
        $this->view('laporan/top_poin', $data);
        $this->view('templates/footer');
    }
}
