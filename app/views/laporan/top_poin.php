<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Laporan Top Poin Siswa</h3>
        <button onclick="window.print()" class="btn btn-success d-print-none">Cetak / PDF</button>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header bg-success text-white">Top 10 Prestasi</div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Poin Prestasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['top_prestasi'] as $s) : ?>
                                <?php if ($s['total_prestasi'] > 0): ?>
                                    <tr>
                                        <td><?= $s['nama']; ?></td>
                                        <td><?= $s['nama_kelas']; ?></td>
                                        <td class="text-success fw-bold">+<?= $s['total_prestasi']; ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header bg-danger text-white">Top 10 Pelanggaran (Perlu Bimbingan)</div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Poin Pelanggaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['top_pelanggaran'] as $s) : ?>
                                <?php if ($s['total_pelanggaran'] < 0): ?>
                                    <tr>
                                        <td><?= $s['nama']; ?></td>
                                        <td><?= $s['nama_kelas']; ?></td>
                                        <td class="text-danger fw-bold"><?= $s['total_pelanggaran']; ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 d-none d-print-block">
        <div class="row">
            <div class="col-4 text-center offset-8">
                <p>Mengetahui,<br>Koord. Kesiswaan</p>
                <br><br><br>
                <p>___________________</p>
            </div>
        </div>
    </div>
</div>
<style>
    @media print {
        .d-print-none {
            display: none !important;
        }

        .d-print-block {
            display: block !important;
        }

        .card-header {
            color: black !important;
            background: #eee !important;
            border: 1px solid black;
        }
    }
</style>