<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
            Tambah Data Mahasiswa
            </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
          <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Cari Nama Mahasiswa..." name="keyword" id="keyword" autocomplete="off">
              <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
          </div>
          </form>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <h3>Daftar Mahasiswa</h3>
                <ul class="list-group">
                <?php foreach ( $data['mhs'] as $mhs ) : ?>
                    <li class="list-group-item"><?= $mhs['nama']; ?>

                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id_mahasiswa']; ?>" class="badge badge-primary float-right ml-1">Detail</a>

                    <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id_mahasiswa']; ?>" class="badge badge-success tampilModalUbah float-right ml-1" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id_mahasiswa']; ?>">Edit</a>

                    <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id_mahasiswa']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin hapus data ini ?');">Hapus</a>
                    </li>
                <?php endforeach; ?>
                </ul>            
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambahMhs" method="post">
        
        <input type="hidden" name="id_mahasiswa" id="id_mahasiswa">
        <div class="form-group">
            <label for="nama">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
        </div>

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="number" class="form-control" id="nim" name="nim">
        </div>

        <div class="form-group">
            <label for="jurusan">Pilih Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Industri">Teknik Industri</option>
                <option value="Teknik Kimia">Teknik Kimia</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tempat_tinggal">Domisili</label>
            <input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal">
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value="Laki Laki">Laki Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>