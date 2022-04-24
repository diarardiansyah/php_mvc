<?php

class About extends Controller { 

    public function index( $nama = "Diar", $job = 'QA', $umur = 25 )
    {
        $data['nama'] = $nama;
        $data['job']  = $job;
        $data['umur'] = $umur;
        $data['judul'] = 'Halaman Index About';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {   
        $data['judul'] = 'Page About';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}