<?php
defined('BASEPATH') or exit('No direct script access allowed');

// ************************************************************************ // 
//     File kontroller ini berfungsi untuk mengatur data dari paslon        //
// ************************************************************************ //

class Paslon extends CI_Controller
{
    // Perbarui data pemilihan
    function __construct()
    {

        parent::__construct();
        $this->Data->refresh_VoteValue();
    }
    
    // Fungsi ini untuk memvalidasi data-data paslon
    public function Data_Validation()
    {
        // Cek apakah ada data yang dikirim dengan method POST
        if(isset($_POST['nim_presma']) && isset($_POST['nim_wapresma'])){
            
            // Mengambil data nim presma dan wapresma
            $presma = $_POST['nim_presma'];
            $wapresma = $_POST['nim_wapresma'];

            // Mengambil data mahasiswa berdasarkan nim presma dan wapresma
            $data['presma'] = $this->Data->get_Data_byID("mahasiswa","nim",$presma);
            $data['wapresma'] = $this->Data->get_Data_byID("mahasiswa", "nim", $wapresma);

            // Setting judul halaman
            $data['title'] = "Berkas Paslon | Vote Politala";

            // Load header halaman
            $this->load->view('templates/header', $data);

            // Load konten utama
            $this->load->view('paslon/data_validation');

            // Load footer halaman (Isinya script umum)
            $this->load->view('templates/footer');

            // Load script (Isinya script yang hanya digunakan pada halaman ini)
            $this->load->view('script/paslon_data', $data);
        }else{
            redirect("home/registration");
        }

    }

     


     private function _do_upload_add_foto_paslon(){
            $config['upload_path']          = 'assets/voting_assets/image/paslon';
            $config['allowed_types']        = 'jpg|png|jpeg';
            // $config['max_size']             = 10000; //set max size allowed in Kilobyte
            // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
            $config['file_name']            = date("dmY_His"); //just milisecond timestamp fot unique name
     
            $this->load->library('upload', $config);
     
            if(!$this->upload->do_upload('file_paslon')) //upload and validate
            {
                
                $data['inputerror'][] = 'file';
                $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
                $data['status'] = FALSE;
                echo json_encode($data);
                alert('error');
                exit();
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
            }
            return $this->upload->data('file_name');
    }

     private function _do_upload_add_foto_visi(){
            $config['upload_path']          = 'assets/voting_assets/image/paslon';
            $config['allowed_types']        = 'jpg|png|jpeg';
            // $config['max_size']             = 10000; //set max size allowed in Kilobyte
            // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
            $config['file_name']            = date("dmY_His"); //just milisecond timestamp fot unique name
     
            $this->load->library('upload', $config);
     
            if(!$this->upload->do_upload('file_visi')) //upload and validate
            {
                
                $data['inputerror'][] = 'file';
                $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
                $data['status'] = FALSE;
                echo json_encode($data);
                alert('error');
                exit();
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
            }
            return $this->upload->data('file_name');
    }
     private function _do_upload_add_foto_misi(){
            $config['upload_path']          = 'assets/voting_assets/image/paslon';
            $config['allowed_types']        = 'jpg|png|jpeg';
            // $config['max_size']             = 10000; //set max size allowed in Kilobyte
            // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
            $config['file_name']            = date("dmY_His"); //just milisecond timestamp fot unique name
     
            $this->load->library('upload', $config);
     
            if(!$this->upload->do_upload('file_misi')) //upload and validate
            {
                
                $data['inputerror'][] = 'file';
                $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
                $data['status'] = FALSE;
                echo json_encode($data);
                alert('error');
                exit();
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
            }
            return $this->upload->data('file_name');
    }
     private function _do_upload_add_foto_presma(){
            $config['upload_path']          = 'assets/voting_assets/image/paslon';
            $config['allowed_types']        = 'jpg|png|jpeg';
            // $config['max_size']             = 10000; //set max size allowed in Kilobyte
            // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
            $config['file_name']            = date("dmY_His"); //just milisecond timestamp fot unique name
     
            $this->load->library('upload', $config);
     
            if(!$this->upload->do_upload('file_presma')) //upload and validate
            {
                
                $data['inputerror'][] = 'file';
                $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
                $data['status'] = FALSE;
                echo json_encode($data);
                alert('error');
                exit();
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
            }
            return $this->upload->data('file_name');
    }
     private function _do_upload_add_foto_wapresma(){
            $config['upload_path']          = 'assets/voting_assets/image/paslon';
            $config['allowed_types']        = 'jpg|png|jpeg';
            // $config['max_size']             = 10000; //set max size allowed in Kilobyte
            // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
            $config['file_name']            = date("dmY_His"); //just milisecond timestamp fot unique name
     
            $this->load->library('upload', $config);
     
            if(!$this->upload->do_upload('file_wapresma')) //upload and validate
            {
                
                $data['inputerror'][] = 'file';
                $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
                $data['status'] = FALSE;
                echo json_encode($data);
                alert('error');
                exit();
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
            }
            return $this->upload->data('file_name');
    }


    // Fungsi ini untuk menginput data ke database
    public function Insert_Data()
    {


        // Mendapatkan no urut terakhir
        $last = $this->Data->get_MaxValue("paslon","no_urut");
        $curr = $last[0]['MAX(no_urut)'] + 1;

        // Menampung data paslon
        $data = array(
          
            'nim_presma' => $this->input->post('nim_presma'),
            'nim_wapresma' => $this->input->post('nim_wapresma'),
            'nama_presma' => $this->input->post('nama_presma'),
            'nama_wapresma' => $this->input->post('nama_wapresma'),
            'email_presma' =>$this->input->post('email_presma'),
            'email_wapresma' => $this->input->post('email_wapresma'),
            'jurusan_presma' => $this->input->post('jurusan_presma'),
            'jurusan_wapresma' => $this->input->post('jurusan_wapresma'),
            'angkatan_presma' => $this->input->post('angkatan_presma'),
            'angkatan_wapresma' => $this->input->post('angkatan_wapresma'),
         
            'status' => 0

        );


         if(!empty($_FILES['file_paslon']['name'])){
            $upload = $this->_do_upload_add_foto_paslon();
            $data['foto_paslon'] = $upload;
        }

        if(!empty($_FILES['file_visi']['name'])){
            $upload = $this->_do_upload_add_foto_visi();
            $data['visi'] = $upload;
        }

        if(!empty($_FILES['file_misi']['name'])){
            $upload = $this->_do_upload_add_foto_misi();
            $data['misi'] = $upload;
        }
        if(!empty($_FILES['file_presma']['name'])){
            $upload = $this->_do_upload_add_foto_presma();
            $data['berkas_presma'] = $upload;
        }
        if(!empty($_FILES['file_wapresma']['name'])){
            $upload = $this->_do_upload_add_foto_wapresma();
            $data['berkas_wapresma'] = $upload;
        }


       // var_dump($data);
       // die();
        // Memasukkan data paslon ke database
        $this->Data->insert_Data("pending_paslon",$data);
          echo json_encode(array("status" => true));


        // Menampung data presma
        // $data_presma = array(
        //     'no_urut' => $curr,
        //     'nim' => $nim_presma,
        //     'nama' => $nama_presma,
        //     'jurusan' => $prodi_presma,
        //     'angkatan' => $angkatan_presma,
        //     'email' => $email_presma,
        //     'file' => "lorem"
        // );

        // Memasukkan data presma ke database
        // $this->Data->insert_Data("presma", $data_presma);

        // Menampung data wapresma
        // $data_wapresma = array(
        //     'no_urut' => $curr,
        //     'nim' => $nim_wapresma,
        //     'nama' => $nama_wapresma,
        //     'jurusan' => $prodi_wapresma,
        //     'angkatan' => $angkatan_wapresma,
        //     'email' => $email_wapresma,
        //     'file' => "lorem"
        // );

        // Memasukkan data wapresma ke database
        // $this->Data->insert_Data("wapresma" ,$data_wapresma);

        // Redirect ke halaman pemberitahuan
        // redirect(base_url("paslon/Data_Validation"));

    }

    // Fungsi untuk menampilkan jika request pendaftaran paslon telah berhasil
    // public function Pending_Request(){

    //     if(isset($_GET['p']) && isset($_GET['w'])){

    //         // Mendapatkan nim presma dan wapresma dari method GET
    //         $presma = $_GET['p'];
    //         $wapresma = $_GET['w'];

    //         // Menampun nim presma dan wapresma
    //         $nim_presma = array(
    //             'nim' => $presma
    //         );
    //         $nim_wapresma = array(
    //             'nim' => $wapresma
    //         );

    //         // Cek apakah kedua nim tersebut terdaftar
    //         $cek_presma = $this->Data->get_isExistData("presma", $nim_presma);
    //         $cek_wapresma = $this->Data->get_isExistData("wapresma", $nim_wapresma);
    //         if ($cek_presma) {
    //             if ($cek_wapresma) {

    //                 // Setting judul halaman
    //                 $data['title'] = "Pending Paslon | Vote Politala";

    //                 // Load header halaman
    //                 $this->load->view('templates/header', $data);

    //                 // Load konten utama
    //                 $this->load->view('paslon/pending_request');

    //                 // Load footer halaman (Isinya script umum)
    //                 $this->load->view('templates/footer');

    //             } else {
    //                 echo "Data tidak ditemukan!";
    //             }
    //         } else {
    //             echo "Data tidak ditemukan!";
    //         }
    //     }else{
    //         redirect("registration");
    //     }
    // }
}