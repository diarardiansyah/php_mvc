<?php

class Mahasiswa_model {

    // private $mhs = [
    //     [
    //         "nama" => "Diar Ardiansyah",
    //         "nim" => "2016271762",
    //         "jurusan" => "Teknik Informatika",
    //         "tempat_tinggal" => "Depok",
    //         "jenis_kelamin" => "Laki Laki"
    //     ],

    //     [
    //         "nama" => "Joni",
    //         "nim" => "2011219829",
    //         "jurusan" => "Teknik Mesin",
    //         "tempat_tinggal" => "Jakarta",
    //         "jenis_kelamin" => "Laki Laki"
    //     ],

    //     [
    //         "nama" => "Mawar",
    //         "nim" => "201871288",
    //         "jurusan" => "Akutansi",
    //         "tempat_tinggal" => "Bogor",
    //         "jenis_kelamin" => "Perempuan"
    //     ]
    // ];

    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMhs() 
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id_mahasiswa)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_mahasiswa=:id_mahasiswa');
        $this->db->bind('id_mahasiswa', $id_mahasiswa);
        return $this->db->single(); // kenapa single ? karena data yang diambil dari query db cuman 1 
    }

    public function tambahDataMhs($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nim, :jurusan, :tempat_tinggal, :jenis_kelamin)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('tempat_tinggal', $data['tempat_tinggal']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);

        $this->db->executeDB();

        return $this->db->rowCount();
    }

    public function hapusDataMhs($id_mahasiswa)
    {
        $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = :id_mahasiswa";

        $this->db->query($query);
        $this->db->bind('id_mahasiswa', $id_mahasiswa);
        $this->db->executeDB();

        return $this->db->rowCount();
    }

    public function ubahDataMhs($data)
    {
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    nim = :nim,
                    jurusan = :jurusan,
                    tempat_tinggal = :tempat_tinggal,
                    jenis_kelamin = :jenis_kelamin
                  WHERE id_mahasiswa = :id_mahasiswa
                 ";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('tempat_tinggal', $data['tempat_tinggal']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('id_mahasiswa', $data['id_mahasiswa']);

        $this->db->executeDB();

        return $this->db->rowCount();
    }

    public function cariDataMhs()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}


