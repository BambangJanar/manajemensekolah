<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal" data-controller="jenispoin">
                Tambah Jenis Poin
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3>Poin Prestasi & Pelanggaran</h3>
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Poin</th>
                        <th>Kategori</th>
                        <th>Poin</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data['jenis_poin'] as $poin) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $poin['nama_poin']; ?></td>
                            <td>
                                <span class="badge bg-<?= ($poin['kategori'] == 'prestasi') ? 'success' : 'danger'; ?>">
                                    <?= ucfirst($poin['kategori']); ?>
                                </span>
                            </td>
                            <td><?= $poin['poin']; ?></td>
                            <td><?= $poin['keterangan']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/jenispoin/ubah/<?= $poin['id']; ?>" class="badge bg-success tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $poin['id']; ?>" data-controller="jenispoin">ubah</a>
                                <a href="<?= BASEURL; ?>/jenispoin/hapus/<?= $poin['id']; ?>" class="badge bg-danger" onclick="return confirm('yakin?');">hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Jenis Poin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/jenispoin/tambah" method="post">
                    <input type="hidden" name="id" id="id">

                    <div class="mb-3">
                        <label for="nama_poin" class="form-label">Nama Poin</label>
                        <input type="text" class="form-control" id="nama_poin" name="nama_poin" required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori">
                            <option value="prestasi">Prestasi</option>
                            <option value="pelanggaran">Pelanggaran</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="poin" class="form-label">Jumlah Poin (Negatif untuk Pelanggaran)</label>
                        <input type="number" class="form-control" id="poin" name="poin" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>