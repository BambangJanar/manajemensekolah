<div class="row">
    <div class="col-8">
        <h3 class="mt-4">Daftar Kelas</h3>
        <a href="<?= BASEURL; ?>/kelas/create" class="btn btn-primary my-3">Tambah Data Kelas</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Wali Kelas</th>
                    <th>Kapasitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['kelas'] as $kelas) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $kelas['nama_kelas']; ?></td>
                        <td><?= $kelas['wali_kelas']; ?></td>
                        <td><?= $kelas['kapasitas']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/kelas/edit/<?= $kelas['id']; ?>" class="btn btn-success btn-sm">Ubah</a>
                            <a href="<?= BASEURL; ?>/kelas/delete/<?= $kelas['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>