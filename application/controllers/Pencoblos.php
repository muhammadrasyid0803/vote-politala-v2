<?php
defined('BASEPATH') or exit('No direct script access allowed');

// ********************************************************* // 
// File Kontroller ini berfungsi untuk mengatur pencoblosan  //
// ********************************************************* // 


class Pencoblos extends CI_Controller
{
    // Perbarui data pemilihan
    function __construct()
    {

        parent::__construct();
        $this->Data->refresh_VoteValue();
    }
    
    // Fungsi ini untuk mengarahkan user untuk mencoblos
    public function vote(){

        // Cek apakah user telah login
        if ($this->session->userdata("status") == 1) {

            // Setting judul halaman
            $data['title'] = "Vote Paslon | Vote Politala";

            // Mengambil data video dokumentasi
            $data['video'] = $this->Data->get_NewestData_byID("dokumentasi_pemilihan", "tahun", 1);

            // Mengambil data presma
            $data['presma'] = $this->Data->get_AllData("presma");

            // Mengambil data wapresma
            $data['wapresma'] = $this->Data->get_AllData("wapresma");

            // Mengambil data pemilih
            $data['pemilih'] = $this->Data->get_Data_byID("pencoblos","nim",$this->session->userdata("nim"));

            // Mengambil data paslon
            $data['paslon'] = $this->Data->get_AllData("paslon");

            // Kirim status hak pilih dalam format json
            $data['status_hak_pilih'] = json_encode($this->Data->get_Data_byID("pencoblos","nim",$this->session->userdata("nim")));

            // Load header halaman
            $this->load->view('templates/header', $data);

            // Load konten utama
            $this->load->view('pencoblos/vote');

            // Load footer halaman (Isinya script umum)
            $this->load->view('templates/footer');

            // Load script (Isinya script yang hanya digunakan pada halaman ini)
            $this->load->view('script/vote',$data);

        } else {
            redirect("auth");
        }

    }

}