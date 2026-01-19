<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataRiwayat" data-bs-toggle="modal" data-bs-target="#formModalRiwayat">
                Catat Poin Siswa
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3>Riwayat Poin & Pelanggaran</h3>
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Siswa</th>
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
                            <td><?= $r['tanggal']; ?></td>
                            <td><?= $r['nama_siswa']; ?> (<?= $r['nis']; ?>)</td>
                            <td><?= $r['nama_poin']; ?></td>
                            <td>
                                <span class="badge bg-<?= ($r['kategori'] == 'prestasi') ? 'success' : 'danger'; ?>">
                                    <?= ucfirst($r['kategori']); ?>
                                </span>
                            </td>
                            <td><?= $r['poin']; ?></td>
                            <td><?= $r['keterangan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModalRiwayat" tabindex="-1" aria-labelledby="formModalLabelRiwayat" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelRiwayat">Catat Poin Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/riwayatpoin/tambah" method="post">

                    <div class="mb-3">
                        <label for="id_siswa" class="form-label">Siswa</label>
                        <select class="form-select" id="id_siswa" name="id_siswa" required>
                            <option value="">Pilih Siswa</option>
                            <?php foreach ($data['siswa'] as $s) : ?>
                                <option value="<?= $s['id']; ?>"><?= $s['nama']; ?> (<?= $s['nis']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_jenis_poin" class="form-label">Jenis Poin/Pelanggaran</label>
                        <select class="form-select" id="id_jenis_poin" name="id_jenis_poin" required>
                            <option value="">Pilih Data</option>
                            <?php foreach ($data['jenis_poin'] as $jp) : ?>
                                <option value="<?= $jp['id']; ?>">
                                    <?= $jp['nama_poin']; ?>
                                    (<?= ucfirst($jp['kategori']); ?>: <?= $jp['poin']; ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d\TH:i'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan Tambahan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>