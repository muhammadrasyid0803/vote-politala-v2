<?php
defined('BASEPATH') or exit('No direct script access allowed');

// ************************************************************************ // 
// File kontroller ini berfungsi untuk mengatur halaman home pada website   //
// ************************************************************************ // 
  
class Home extends CI_Controller
{
    // Perbarui data pemilihan
    function __construct()
    {

        parent::__construct();
        $this->Data->refresh_VoteValue();
    }
    
    // Fungsi untuk halaman home (dashboard)
    public function index()
    {
        // Setting judul halaman
        $data['title'] = "Home | Vote Politala";
        
        // Mengambil data gambar pemilihan terbaru berdasarkan tahun (angka 0 menandakan tipe file gambar pada database)
        $data['doc_img'] = $this->Data->get_NewestData_byID("dokumentasi_pemilihan","tahun",0);

        // Mengambil seluruh data dari tabel vote, lalu di convert ke format json agar bisa diolah mengunakan javascript
        $data['vote_data'] = json_encode($this->Data->get_AllData("vote"));

        // Load header halaman
        $this->load->view('templates/header', $data);
        
        // Load konten utama
        $this->load->view('home/index');
        
        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');

        // Load script (Isinya script yang hanya digunakan pada halaman ini)
        $this->load->view('script/home',$data);

    }

    // Fungsi untuk halaman KPUM
    public function kpum()
    {
        // Setting judul halaman
        $data['title'] = "KPUM | Vote Politala";

        // Mengambil data gambar pemilihan terbaru berdasarkan tahun (angka 0 menandakan tipe file gambar pada database)
        $data['doc_img'] = $this->Data->get_NewestData_byID("dokumentasi_pemilihan", "tahun", 0);
        
        // Mengambil data gambar KPUM terbaru berdasarkan tahun
        $data['kpum_img'] = $this->Data->get_NewestData("kpum","tahun");

         $data['kpum'] = $this->Data->get_NewestData("kpum","tahun");


        // Mengambil seluruh data dari table KPUM
        $data['history_kpum'] = $this->Data->get_AllData("kpum");

        // Load header halaman
        $this->load->view('templates/header', $data);
        
        // Load konten utama
        $this->load->view('home/kpum');

        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');
    }

    // Fungsi untuk halaman registrasi paslon
    public function registration()
    {
        // Setting judul halaman
        $data['title'] = "Registrasi Paslon | Vote Politala";

        // Load header halaman
        $this->load->view('templates/header', $data);

        // Load konten utama
        $this->load->view('home/registration');

        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');

        // Load script (Isinya script yang hanya digunakan pada halaman ini)
        $this->load->view('script/registration');
    }

    // Fungsi untuk halaman history KPUM
    public function history()
    {
        // Setting judul halaman
        $data['title'] = "History KPUM | Vote Politala";

        // Mengambil kolom tahun yang ada di kpum
        $data['year'] = $this->Data->get_AllData_byCol("kpum","tahun");

        // Kondisi jika variabel year ada atau tidak
        // Jika variabel tidak ada, maka otomatis akan load data terbaru
        if (isset($_GET['year'])) {

            // Mengambil variabel year
            $tahun = $_GET['year'];

            // Mengambil data KPUM berdasarkan tahun
            $data['kpum'] = $this->Data->get_Data_byID("kpum","tahun",$tahun);

            // Mengambil data dokumentasi berdasarkan tahun
            $data['doc_pemilihan'] = $this->Data->get_Data_byID("dokumentasi_pemilihan","tahun",$tahun);
        } else {

            // Mengambil data KPUM terbaru
            $data['kpum'] = $this->Data->get_NewestData("kpum","tahun");

            // Mengambil data dokumentasi terbaru
            $data['doc_pemilihan'] = $this->Data->get_NewestData("dokumentasi_pemilihan","tahun");
        }

        // Load header halaman
        $this->load->view('templates/header', $data);

        // Load konten utama
        $this->load->view('home/history_kpum');

        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');
    }

    // Fungsi untuk halaman List Peserta
    public function list()
    {
        // Setting Judul Halaman
        $data['title'] = "List Paslon | Vote Politala";

        // Mengambil seluruh data paslon
        $data['paslon'] = $this->Data->get_AllData("paslon");
        
        // Mengambil seluruh data presma
        $data['presma'] = $this->Data->get_AllData("presma");
        
        // Mengambil seluruh data wapresma
        $data['wapresma'] = $this->Data->get_AllData("wapresma");
        
        // Mengambil data voting lalu di convert ke format json untuk di olah dengan javascript
        $data['vote_paslon'] = json_encode($this->Data->get_AllData_byCol("paslon","jumlah_pemilih"));

        // Load header halaman
        $this->load->view('templates/header', $data);

        // Load Konten utama
        $this->load->view('home/list_peserta');

        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');

        // Load script (Isinya script yang hanya digunakan pada halaman ini)
        $this->load->view('script/list_peserta', $data);
    }
}
