<div class="container mt-4">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Info Siswa
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $data['siswa']['nama']; ?> (<?= $data['siswa']['nis']; ?>)</h5>
            <p class="card-text">
                Kelas: <?= $data['siswa']['id_kelas']; ?> <br> <!-- Note: This checks id_kelas, might need Join in getSiswaById if name needed, but leaving for now -->
                Alamat: <?= $data['siswa']['alamat']; ?>
            </p>
            <a href="<?= BASEURL; ?>/siswa" class="btn btn-secondary btn-sm">Kembali ke Daftar Siswa</a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahPoin" data-bs-toggle="modal" data-bs-target="#formModalPoin" data-idsiswa="<?= $data['siswa']['id']; ?>">
                Tambah Poin / Pelanggaran
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3>Riwayat Poin</h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Kategori</th>
                        <th>Poin</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data['riwayat'] as $r) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($r['tanggal'])); ?></td>
                            <td><?= $r['nama_poin']; ?></td>
                            <td>
                                <span class="badge bg-<?= ($r['kategori'] == 'prestasi') ? 'success' : 'danger'; ?>">
                                    <?= ucfirst($r['kategori']); ?>
                                </span>
                            </td>
                            <td><?= $r['poin']; ?></td>
                            <td><?= $r['keterangan']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/siswa/ubahPoin/<?= $r['id']; ?>" class="badge bg-success tampilModalUbahPoin" data-bs-toggle="modal" data-bs-target="#formModalPoin" data-id="<?= $r['id']; ?>" data-idsiswa="<?= $data['siswa']['id']; ?>">ubah</a>
                                <a href="<?= BASEURL; ?>/siswa/hapusPoin/<?= $r['id']; ?>/<?= $data['siswa']['id']; ?>" class="badge bg-danger" onclick="return confirm('Yakin hapus poin ini?');">hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModalPoin" tabindex="-1" aria-labelledby="formModalLabelPoin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelPoin">Tambah Poin Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/siswa/tambahPoin" method="post">
                    <input type="hidden" name="id" id="id_poin_transaksi">
                    <input type="hidden" name="id_siswa" id="id_siswa_modal" value="<?= $data['siswa']['id']; ?>">

                    <div class="mb-3">
                        <label for="id_jenis_poin" class="form-label">Jenis Poin</label>
                        <select class="form-select" id="id_jenis_poin" name="id_jenis_poin" required>
                            <option value="">Pilih Jenis</option>
                            <?php foreach ($data['jenis_poin'] as $jp) : ?>
                                <option value="<?= $jp['id']; ?>"><?= $jp['nama_poin']; ?> (<?= $jp['poin']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d\TH:i'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
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