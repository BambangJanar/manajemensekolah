<div class="row">
    <div class="col-6">
        <h3 class="mt-4">Ubah Data Mata Pelajaran</h3>

        <form action="<?= BASEURL; ?>/mapel/update" method="post">
            <input type="hidden" name="id" value="<?= $data['mapel']['id']; ?>">
            <div class="mb-3">
                <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="<?= $data['mapel']['nama_mapel']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $data['mapel']['deskripsi']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <a href="<?= BASEURL; ?>/mapel" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>