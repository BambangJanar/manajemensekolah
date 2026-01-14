<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <p>Selamat Datang di Sistem Manajemen Sekolah</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Jumlah Siswa</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $data['jml_siswa']; ?></h5>
                    <p class="card-text">Total data siswa terdaftar.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Jumlah Kelas</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $data['jml_kelas']; ?></h5>
                    <p class="card-text">Total data kelas tersedia.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Jumlah Mata Pelajaran</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $data['jml_mapel']; ?></h5>
                    <p class="card-text">Total data mata pelajaran.</p>
                </div>
            </div>
        </div>
    </div>
</div>