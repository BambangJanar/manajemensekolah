<div class="row">
    <div class="col-12">
        <h3 class="mt-4">Daftar Mata Pelajaran</h3>
        <a href="<?= BASEURL; ?>/mapel/create" class="btn btn-primary my-3">Tambah Data Mapel</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mapel</th>
                    <th>Deskripsi</th>
                    <th>Guru Pengampu</th>
                    <th>Alokasi Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['mapel'] as $mapel) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $mapel['nama_mapel']; ?></td>
                        <td><?= $mapel['deskripsi']; ?></td>
                        <td><?= $mapel['guru_pengampu']; ?></td>
                        <td><?= $mapel['alokasi_kelas']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/mapel/edit/<?= $mapel['id']; ?>" class="btn btn-success btn-sm">Ubah</a>
                            <a href="<?= BASEURL; ?>/mapel/delete/<?= $mapel['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>