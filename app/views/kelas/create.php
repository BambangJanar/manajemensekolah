<div class="row">
    <div class="col-6">
        <h3 class="mt-4">Tambah Data Kelas</h3>

        <form action="<?= BASEURL; ?>/kelas/store" method="post">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= BASEURL; ?>/kelas" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>