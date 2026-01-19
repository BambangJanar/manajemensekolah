<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataJadwal" data-bs-toggle="modal" data-bs-target="#formModalJadwal">
                Tambah Jadwal Kelas
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3>Daftar Jadwal Kelas</h3>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Guru</th>
                        <th scope="col">Ruangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['jadwal'] as $jadwal) : ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $jadwal['hari']; ?></td>
                            <td><?= $jadwal['jam_mulai'] . ' - ' . $jadwal['jam_selesai']; ?> (<?= $jadwal['sesi']; ?>)</td>
                            <td><?= $jadwal['nama_kelas']; ?></td>
                            <td><?= $jadwal['nama_mapel']; ?></td>
                            <td><?= $jadwal['nama_guru']; ?></td>
                            <td><?= $jadwal['ruangan']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/jadwalkelas/ubah/<?= $jadwal['id']; ?>" class="badge text-bg-success float-end ms-1 tampilModalUbahJadwal" data-bs-toggle="modal" data-bs-target="#formModalJadwal" data-id="<?= $jadwal['id']; ?>">ubah</a>
                                <a href="<?= BASEURL; ?>/jadwalkelas/hapus/<?= $jadwal['id']; ?>" class="badge text-bg-danger float-end ms-1" onclick="return confirm('yakin?');">hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModalJadwal" tabindex="-1" aria-labelledby="formModalLabelJadwal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelJadwal">Tambah Jadwal Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/jadwalkelas/tambah" method="post">
                    <input type="hidden" name="id" id="id_jadwal">

                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <select class="form-select" id="hari" name="hari">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_jam" class="form-label">Jam Pelajaran</label>
                        <select class="form-select" id="id_jam" name="id_jam">
                            <?php foreach ($data['jam'] as $j) : ?>
                                <option value="<?= $j['id']; ?>"><?= $j['jam_mulai'] . ' - ' . $j['jam_selesai']; ?> (<?= $j['sesi']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_kelas" class="form-label">Kelas</label>
                        <select class="form-select" id="id_kelas" name="id_kelas">
                            <?php foreach ($data['kelas'] as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_mapel" class="form-label">Mata Pelajaran</label>
                        <select class="form-select" id="id_mapel" name="id_mapel">
                            <?php foreach ($data['mapel'] as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['nama_mapel']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_guru" class="form-label">Guru</label>
                        <select class="form-select" id="id_guru" name="id_guru">
                            <?php foreach ($data['guru'] as $g) : ?>
                                <option value="<?= $g['id']; ?>"><?= $g['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ruangan" class="form-label">Ruangan</label>
                        <input type="text" class="form-control" id="ruangan" name="ruangan" required>
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