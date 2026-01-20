$(function() {

    // Generic Modal Handler or Specific Handlers
    // Since the views use specific classes/IDs, we'll stick to specific handlers to avoid breaking existing views without refactoring everything.

    // GURU
    $('.tombolTambahData').on('click', function() {
        const controller = $(this).data('controller');
        if(controller == 'guru') {
            $('#formModalLabel').html('Tambah Data Guru');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $('#nama').val('');
            $('#nip').val('');
            $('#role').val('guru');
            $('#id').val('');
        } else if (controller == 'jenispoin') {
            $('#formModalLabel').html('Tambah Jenis Poin');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $('#nama_poin').val('');
            $('#kategori').val('prestasi');
            $('#poin').val('');
            $('#keterangan').val('');
            $('#id').val('');
        }
    });

    $('.tampilModalUbah').on('click', function() {
        const controller = $(this).data('controller');
        const id = $(this).data('id');
        const baseUrl = 'http://localhost/manajemensekolah/public';

        if(controller == 'guru') {
            $('#formModalLabel').html('Ubah Data Guru');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action', baseUrl + '/guru/ubah');

            $.ajax({
                url: baseUrl + '/guru/getubah',
                data: {id : id},
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#nama').val(data.nama);
                    $('#nip').val(data.nip);
                    $('#role').val(data.role);
                    $('#id').val(data.id);
                }
            });
        } else if (controller == 'jenispoin') {
            $('#formModalLabel').html('Ubah Jenis Poin');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action', baseUrl + '/jenispoin/ubah');

            $.ajax({
                url: baseUrl + '/jenispoin/getubah',
                data: {id : id},
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#nama_poin').val(data.nama_poin);
                    $('#kategori').val(data.kategori);
                    $('#poin').val(data.poin);
                    $('#keterangan').val(data.keterangan);
                    $('#id').val(data.id);
                }
            });
        }
    });


    // JAM PELAJARAN
    $('.tombolTambahDataJam').on('click', function() {
        $('#formModalLabelJam').html('Tambah Jam Pelajaran');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#jam_mulai').val('');
        $('#jam_selesai').val('');
        $('#sesi').val('');
        $('#keterangan').val('');
        $('#id_jam').val('');
        $('.modal-body form').attr('action', 'http://localhost/manajemensekolah/public/jampelajaran/tambah');
    });

    $('.tampilModalUbahJam').on('click', function() {
        $('#formModalLabelJam').html('Ubah Jam Pelajaran');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/manajemensekolah/public/jampelajaran/ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/manajemensekolah/public/jampelajaran/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#jam_mulai').val(data.jam_mulai);
                $('#jam_selesai').val(data.jam_selesai);
                $('#sesi').val(data.sesi);
                $('#keterangan').val(data.keterangan);
                $('#id_jam').val(data.id);
            }
        });
    });

    // JADWAL KELAS
    $('.tombolTambahDataJadwal').on('click', function() {
        $('#formModalLabelJadwal').html('Tambah Jadwal Kelas');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#hari').val('Senin');
        $('#id_jam').val('');
        $('#id_kelas').val('');
        $('#id_mapel').val('');
        $('#id_guru').val('');
        $('#ruangan').val('');
        $('#id_jadwal').val('');
        $('.modal-body form').attr('action', 'http://localhost/manajemensekolah/public/jadwalkelas/tambah');
    });

    $('.tampilModalUbahJadwal').on('click', function() {
        $('#formModalLabelJadwal').html('Ubah Jadwal Kelas');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/manajemensekolah/public/jadwalkelas/ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/manajemensekolah/public/jadwalkelas/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#hari').val(data.hari);
                $('#id_jam').val(data.id_jam);
                $('#id_kelas').val(data.id_kelas);
                $('#id_mapel').val(data.id_mapel);
                $('#id_guru').val(data.id_guru);
                $('#ruangan').val(data.ruangan);
                $('#id_jadwal').val(data.id);
            }
        });
    });

    // POIN SISWA (DETAIL)
    $('.tombolTambahPoin').on('click', function() {
        $('#formModalLabelPoin').html('Tambah Poin Siswa');
        $('.modal-footer button[type=submit]').html('Simpan');
        $('.modal-body form').attr('action', 'http://localhost/manajemensekolah/public/siswa/tambahPoin');
        
        $('#id_poin_transaksi').val('');
        $('#id_jenis_poin').val('');
        $('#keterangan').val('');
        // Date and ID Siswa are handled by PHP/View defaults for Add
    });

    $('.tampilModalUbahPoin').on('click', function() {
        $('#formModalLabelPoin').html('Ubah Poin Siswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/manajemensekolah/public/siswa/ubahPoin');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/manajemensekolah/public/siswa/getUbahPoin',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id_poin_transaksi').val(data.id);
                $('#id_jenis_poin').val(data.id_jenis_poin);
                $('#tanggal').val(data.tanggal); // Format might need adjustment if datetime-local input expects specific format (YYYY-MM-DDTHH:mm), PHP date() usually handles this in value attr, but here we set via JS. Data.tanggal is 'YYYY-MM-DD HH:mm:ss'.
                // Adjust datetime string for input type=datetime-local
                let dt = data.tanggal.replace(' ', 'T');
                $('#tanggal').val(dt);
                
                $('#keterangan').val(data.keterangan);
                $('#id_siswa_modal').val(data.id_siswa); 
            }
        });
    });

});
