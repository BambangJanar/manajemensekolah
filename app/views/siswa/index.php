<div class="row">
    <div class="col-12">
        <h3 class="mt-4">Daftar Siswa</h3>
        <a href="<?= BASEURL; ?>/siswa/create" class="btn btn-primary my-3">Tambah Data Siswa</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Tlp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['siswa'] as $siswa) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $siswa['nis']; ?></td>
                        <td><?= $siswa['nama']; ?></td>
                        <td><?= $siswa['nama_kelas']; ?></td>
                        <td><?= $siswa['alamat']; ?></td>
                        <td><?= $siswa['no_telp']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/siswa/edit/<?= $siswa['id']; ?>" class="btn btn-success btn-sm">Ubah</a>
                            <a href="<?= BASEURL; ?>/siswa/delete/<?= $siswa['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>