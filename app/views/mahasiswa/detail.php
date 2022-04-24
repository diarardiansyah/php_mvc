<div class="container mt-5">

    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Nama : <?= $data['mhs']['nama']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">NIM : <?= $data['mhs']['nim']; ?></h6>
        <p class="card-text">Jurusan : <?= $data['mhs']['jurusan']; ?></p>
        <p class="card-text">Domisili : <?= $data['mhs']['tempat_tinggal']; ?></p>
        <p class="card-text">Jenis Kelamin : <?= $data['mhs']['jenis_kelamin']; ?></p>
        <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
    </div>
    </div>

</div>