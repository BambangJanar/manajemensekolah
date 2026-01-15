<div class="row">
    <div class="col-6">
        <h3 class="mt-4">Ubah Data Kelas</h3>

        <form action="<?= BASEURL; ?>/kelas/update" method="post">
            <input type="hidden" name="id" value="<?= $data['kelas']['id']; ?>">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $data['kelas']['nama_kelas']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="wali_kelas" class="form-label">Wali Kelas</label>
                <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" value="<?= $data['kelas']['wali_kelas']; ?>">
            </div>
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" min="0" value="<?= $data['kelas']['kapasitas']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <a href="<?= BASEURL; ?>/kelas" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>