<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Laporan Poin Siswa</h3>
        <a href="<?= BASEURL; ?>/laporan/cetakPoin" target="_blank" class="btn btn-success">Cetak / Export PDF</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Siswa</th>
                <th>Kelas</th>
                <th>Jenis Poin</th>
                <th>Kategori</th>
                <th>Poin</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data['riwayat'] as $r) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($r['tanggal'])); ?></td>
                    <td><?= $r['nama_siswa']; ?> (<?= $r['nis']; ?>)</td>
                    <td>-</td> <!-- Needs Join with Kelas if needed -->
                    <td><?= $r['nama_poin']; ?></td>
                    <td><?= ucfirst($r['kategori']); ?></td>
                    <td><?= $r['poin']; ?></td>
                    <td><?= $r['keterangan']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= BASEURL; ?>/laporan" class="btn btn-secondary mt-3">Kembali</a>
</div>