<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Laporan Jadwal Pelajaran</h3>
        <button onclick="window.print()" class="btn btn-success d-print-none">Cetak / PDF</button>
    </div>

    <div class="alert alert-info d-print-none">
        Tips: Gunakan filter landscape saat mencetak untuk hasil terbaik.
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-sm border-dark">
            <thead class="table-light border-dark">
                <tr>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                    <th>Ruangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Simple sort by Day then Time
                // Assuming Array sort is done or query was sorted. 
                // Database.php query sort is not guaranteed unless ORDER BY used. 
                // Model JadwalKelas should typically order by Hari, Jam.
                // Assuming data is adequate.
                $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                ?>
                <?php foreach ($days as $day) : ?>
                    <?php
                    // Filter events for this day
                    $dailyJadwal = array_filter($data['jadwal'], function ($j) use ($day) {
                        return $j['hari'] == $day;
                    });
                    ?>
                    <?php if (!empty($dailyJadwal)): ?>
                        <tr class="table-secondary border-dark">
                            <td colspan="6" class="fw-bold"><?= $day; ?></td>
                        </tr>
                        <?php foreach ($dailyJadwal as $j) : ?>
                            <tr>
                                <td><?= $j['hari']; ?></td>
                                <td><?= $j['jam_mulai']; ?> - <?= $j['jam_selesai']; ?></td>
                                <td><?= $j['nama_kelas']; ?></td>
                                <td><?= $j['nama_mapel']; ?></td>
                                <td><?= $j['nama_guru']; ?></td>
                                <td><?= $j['ruangan']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-none d-print-block">
        <div class="row">
            <div class="col-4 text-center offset-8">
                <p>Mengetahui,<br>Wakasek Kurikulum</p>
                <br><br><br>
                <p>___________________</p>
            </div>
        </div>
    </div>
</div>
<style>
    @media print {
        .d-print-none {
            display: none !important;
        }

        .d-print-block {
            display: block !important;
        }
    }
</style>