<div class="container mt-4">
    <h3>Pusat Laporan</h3>
    <div class="row mt-3">
        <!-- Kesiswaan -->
        <div class="col-md-3 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Poin & Pelanggaran</h5>
                    <p class="card-text">Rekapitulasi riwayat poin.</p>
                    <a href="<?= BASEURL; ?>/laporan/poin" class="btn btn-primary d-block mb-2">Riwayat Poin</a>
                    <a href="<?= BASEURL; ?>/laporan/top_poin" class="btn btn-outline-primary d-block">Top 10 Siswa</a>
                </div>
            </div>
        </div>

        <!-- Data Utama -->
        <div class="col-md-3 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Data Utama</h5>
                    <p class="card-text">Laporan data induk.</p>
                    <a href="<?= BASEURL; ?>/laporan/siswa" class="btn btn-info text-white d-block mb-2">Data Siswa per Kelas</a>
                    <a href="<?= BASEURL; ?>/laporan/guru" class="btn btn-info text-white d-block">Data Guru</a>
                </div>
            </div>
        </div>

        <!-- Akademik -->
        <div class="col-md-3 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Akademik</h5>
                    <p class="card-text">Laporan pembelajaran.</p>
                    <a href="<?= BASEURL; ?>/laporan/jadwal" class="btn btn-success d-block mb-2">Jadwal Pelajaran</a>
                    <!-- <a href="#" class="btn btn-outline-success d-block">Jadwal Mengajar</a> -->
                </div>
            </div>
        </div>

        <!-- Absensi (Placeholder) -->
        <div class="col-md-3 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Laporan Absensi</h5>
                    <p class="card-text">Rekapitulasi kehadiran.</p>
                    <!-- Disabled until Absensi implemented -->
                    <button class="btn btn-secondary" disabled>Segera Hadir</button>
                </div>
            </div>
        </div>
    </div>
</div>