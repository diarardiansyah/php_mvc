$(function() {

    $('.tombolTambahData').on('click', function() { 
        
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data Mahasiswa');
        $('#nama').val('');
        $('#nim').val('');
        $('#jurusan').val('');
        $('#tempat_tinggal').val('');
        $('#jenis_kelamin').val('');
        $('#id_mahasiswa').val('');
    });

    $('.tampilModalUbah').on('click', function() { 
        
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data Mahasiswa');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');
        
        $.ajax({

            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#jurusan').val(data.jurusan);
                $('#tempat_tinggal').val(data.tempat_tinggal);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#id_mahasiswa').val(data.id_mahasiswa);
            }

        });

    });

});