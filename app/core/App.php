<?php

class App {

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        
        // Controller
        if($url == NULL)
        {
			$url = [$this->controller];
		}

        if ( file_exists('../app/controllers/' . $url[0] . '.php') ) { // maksud dari $url[0] = nama dari controller yang berada di index ke 0
            $this->controller = $url[0];
            unset($url[0]);
        }

        // Load file controller nya 

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method

        if ( isset($url[1]) ) {
            if ( method_exists($this->controller, $url[1]) ) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Params

        if ( !empty($url) ) {
            $this->params = array_values($url);
        }

        // Jalankan Controller, Method dan kirimkan params jika ada 

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if ( isset($_GET["url"]) ) {

            $url = rtrim($_GET["url"], '/'); // Rtrim = fungsi untuk menghapus tanda paling belakang di dlm URL, contoh kasus hapus tanda /
            $url = filter_var($url, FILTER_SANITIZE_URL); // filter_var = Untuk membersihkan URL dari karakter karakter aneh
            $url = explode('/', $url); // Memecah "/" menjadi element array

            return $url;
        }
    }
}