<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataJam" data-bs-toggle="modal" data-bs-target="#formModalJam">
                Tambah Jam Pelajaran
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3>Daftar Jam Pelajaran</h3>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jam Mulai</th>
                        <th scope="col">Jam Selesai</th>
                        <th scope="col">Sesi</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['jam_pelajaran'] as $jam) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $jam['jam_mulai']; ?></td>
                            <td><?= $jam['jam_selesai']; ?></td>
                            <td><?= $jam['sesi']; ?></td>
                            <td><?= $jam['keterangan']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/jampelajaran/ubah/<?= $jam['id']; ?>" class="badge text-bg-success float-end ms-1 tampilModalUbahJam" data-bs-toggle="modal" data-bs-target="#formModalJam" data-id="<?= $jam['id']; ?>">ubah</a>
                                <a href="<?= BASEURL; ?>/jampelajaran/hapus/<?= $jam['id']; ?>" class="badge text-bg-danger float-end ms-1" onclick="return confirm('yakin?');">hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModalJam" tabindex="-1" aria-labelledby="formModalLabelJam" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelJam">Tambah Jam Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/jampelajaran/tambah" method="post">
                    <input type="hidden" name="id" id="id_jam">
                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                    </div>

                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                    </div>

                    <div class="mb-3">
                        <label for="sesi" class="form-label">Sesi</label>
                        <input type="text" class="form-control" id="sesi" name="sesi" placeholder="Contoh: Jam Ke-1" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Contoh: Pelajaran">
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