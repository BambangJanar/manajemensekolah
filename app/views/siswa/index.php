<div class="row">
    <div class="col-12">
        <h3 class="mt-4">Daftar Siswa</h3>

        <div class="row mb-3">
            <div class="col-lg-6">
                <a href="<?= BASEURL; ?>/siswa/create" class="btn btn-primary">Tambah Data Siswa</a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-6">
                <form action="<?= BASEURL; ?>/siswa" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Siswa.." name="keyword" autocomplete="off" value="<?= $data['filters']['keyword']; ?>">

                        <select class="form-select" name="id_kelas">
                            <option value="">Semua Kelas</option>
                            <?php foreach ($data['kelas'] as $kls) : ?>
                                <option value="<?= $kls['id']; ?>" <?= ($data['filters']['id_kelas'] == $kls['id']) ? 'selected' : ''; ?>><?= $kls['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <button class="btn btn-outline-secondary" type="submit">Cari / Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Tlp</th>
                    <th>Poin (P/M/T)</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['siswa'] as $siswa) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td>
                            <?php if ($siswa['foto'] && $siswa['foto'] != 'default.jpg') : ?>
                                <img src="<?= BASEURL; ?>/img/siswa/<?= $siswa['foto']; ?>" width="50" class="img-thumbnail">
                            <?php else : ?>
                                <span class="badge bg-secondary">No img</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $siswa['nis']; ?></td>
                        <td><?= $siswa['nama']; ?></td>
                        <td><?= $siswa['nama_kelas']; ?></td>
                        <td><?= $siswa['alamat']; ?></td>
                        <td><?= $siswa['no_telp']; ?></td>
                        <td>
                            <span class="badge bg-success" title="Prestasi">+<?= $siswa['total_prestasi']; ?></span>
                            <span class="badge bg-danger" title="Pelanggaran"><?= $siswa['total_pelanggaran']; ?></span>
                            <span class="badge bg-primary" title="Total Poin"><?= $siswa['total_poin']; ?></span>
                        </td>
                        <td>
                            <?php
                            $tp = $siswa['total_poin'];
                            $status = 'Aman';
                            $badgeClass = 'bg-primary';

                            if ($tp >= 50) {
                                $status = 'Teladan';
                                $badgeClass = 'bg-success';
                            } elseif ($tp >= 0 && $tp < 50) {
                                $status = 'Aman';
                                $badgeClass = 'bg-info text-dark';
                            } elseif ($tp >= -19 && $tp < 0) {
                                $status = 'Pengawasan';
                                $badgeClass = 'bg-warning text-dark';
                            } elseif ($tp >= -49 && $tp < -19) {
                                $status = 'SP 1';
                                $badgeClass = 'bg-warning border border-danger text-dark';
                            } elseif ($tp >= -99 && $tp < -49) {
                                $status = 'SP 2';
                                $badgeClass = 'bg-danger';
                            } else {
                                $status = 'Drop Out';
                                $badgeClass = 'bg-dark';
                            }
                            ?>
                            <span class="badge <?= $badgeClass; ?>"><?= $status; ?></span>
                        </td>
                        <td>
                            <a href="<?= BASEURL; ?>/siswa/detail_poin/<?= $siswa['id']; ?>" class="btn btn-info btn-sm">Detail Poin</a>
                            <a href="<?= BASEURL; ?>/siswa/edit/<?= $siswa['id']; ?>" class="btn btn-success btn-sm">Ubah</a>
                            <a href="<?= BASEURL; ?>/siswa/delete/<?= $siswa['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>