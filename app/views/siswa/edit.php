<div class="row">
    <div class="col-6">
        <h3 class="mt-4">Ubah Data Siswa</h3>

        <form action="<?= BASEURL; ?>/siswa/update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['siswa']['id']; ?>">
            <input type="hidden" name="oldFoto" value="<?= $data['siswa']['foto']; ?>">

            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" value="<?= $data['siswa']['nis']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['siswa']['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_kelas" class="form-label">Kelas</label>
                <select class="form-select" id="id_kelas" name="id_kelas" required>
                    <option value="">Pilih Kelas</option>
                    <?php foreach ($data['kelas'] as $kelas) : ?>
                        <option value="<?= $kelas['id']; ?>" <?= ($kelas['id'] == $data['siswa']['id_kelas']) ? 'selected' : ''; ?>><?= $kelas['nama_kelas']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <div class="mb-2">
                    <?php if ($data['siswa']['foto'] && $data['siswa']['foto'] != 'default.jpg') : ?>
                        <img src="<?= BASEURL; ?>/img/siswa/<?= $data['siswa']['foto']; ?>" class="img-thumbnail" width="100">
                    <?php endif; ?>
                </div>
                <input class="form-control" type="file" id="foto" name="foto">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $data['siswa']['alamat']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $data['siswa']['no_telp']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <a href="<?= BASEURL; ?>/siswa" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>