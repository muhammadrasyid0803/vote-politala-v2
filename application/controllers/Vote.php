<?php
defined('BASEPATH') or exit('No direct script access allowed');

// ************************************************************************************* //
// File Kontroller ini berfungsi untuk mengirim data paslon yang dipilih                 //
// ************************************************************************************* //

class Vote extends CI_Controller
{
    // Perbarui data pemilihan
    function __construct()
    {

        parent::__construct();
        $this->Data->refresh_VoteValue();
    }

    // Fungsi untuk memasukkan paslon pilihan
    public function index(){
        if(isset($_POST['no_urut'])){
            $new_data = array(
                'paslon_pilihan' => $_POST['no_urut']
            );
            $this->Data->update_Data("pencoblos", "nim", $this->session->userdata("nim"),$new_data);

            // Mengambil data jumlah pemilih dari paslon yang dipilih
            $last_VoteValue = $this->Data->get_Data_byID("paslon","no_urut",$_POST['no_urut']);
            
            // Menambahkan nilai 1 pada jumlah pemilih paslon
            $curr_VoteValue = $last_VoteValue[0]['jumlah_pemilih'] + 1;

            $new_data = array(
                'jumlah_pemilih' => $curr_VoteValue
            );

            // Update jumlah pemilih
            $this->Data->update_Data("paslon", "no_urut", $_POST['no_urut'],$new_data);

            redirect("pencoblos/vote");
            
        }else{
            redirect("pencoblos/vote");
        }
    }
}