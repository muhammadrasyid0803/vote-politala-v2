<?php
defined('BASEPATH') or exit('No direct script access allowed');

// ************************************************************************ // 
//     File kontroller ini berfungsi untuk memvalidasi data dari user       //
// ************************************************************************ //

class Validation extends CI_Controller
{
    // Fungsi ini untuk memvalidasi nim paslon yang mendaftar
    public function Paslon_NIMValidation()
    {
        // Mengambil data nim presma dan wapresma dari method POST
        $presma = $_POST['nim-presma'];
        $wapresma = $_POST['nim-wapresma'];

        // Menampung data nim yang didapat ke array
        $where_presma = array(
            'nim' => $presma
        );
        $where_wapresma = array(
            'nim' => $wapresma
        );

        // Melakukan penecekan apakah kedua nim tersebut terdaftar sebagai mahasiswa atau tidak
        $cek_presma = $this->Data->get_isExistData("mahasiswa", $where_presma);
        $cek_wapresma = $this->Data->get_isExistData("mahasiswa", $where_wapresma);

        // Cek apakah nim calon presma terdaftar sebagai mahasiswa
        if ($cek_presma) {
            // Cek apakah nim calon wapresma terdaftar sebagai mahasiswa
            if ($cek_wapresma) {

                // Melakukan pengecekan apakah kedua nim tersebut telah mendaftar sebagai presma dan wapresma
                $cek_presma = $this->Data->get_isExistData("presma", $where_presma);
                $cek_wapresma = $this->Data->get_isExistData("wapresma", $where_wapresma);

                // Cek apakah nim calon presma telah mendaftar
                if ($cek_presma) {
                    echo "3";
                } else {
                    // Cek apakah nim calon wapresma telah mendaftar
                    if ($cek_wapresma) {
                        echo "4";
                    } else {
                        echo "5";
                    }
                }
            } else {
                echo "2";
            }
        } else {
            echo "1";
        }
    }

    // Fungsi ini untuk memvalidasi email paslon yang mendaftar
    public function Paslon_EmailValidation()
    {
        // Mengambil data presma
        $presma = $_POST['email_presma'];
        $email_presma = array(
            'email' => $presma
        );

        // Mengambil data wapresma
        $wapresma = $_POST['email_wapresma'];
        $email_wapresma = array(
            'email' => $wapresma
        );

        // Cek apakah email sudah dipakai
        $cek_presma = $this->Data->get_isExistData("presma", $email_presma);
        $cek_wapresma = $this->Data->get_isExistData("wapresma", $email_wapresma);

        if ($cek_presma) {
            echo "1";
        } else {
            if ($cek_wapresma) {
                echo "2";
            } else {
                echo "3";
            }
        }

        echo "l";
    }

    // Fungsi untuk cek nim pencoblos
    public function Pencoblos_NIMValidation(){

        // Mengambil data nim
        $nim = $_POST['nim'];

        // Menyiapkan array
        $where = array(
            'nim' => $nim
        );

        // Cek apakah terdaftar sebagai mahasiswa
        $cek = $this->Data->get_isExistData("mahasiswa", $where);
        if ($cek == 0) {
            echo "2";
        } else {

            // Cek apakah nim telah terdaftar sebagai pencoblos
            $cek = $this->Data->get_isExistData("pencoblos", $where);
            if ($cek > 0) {
                echo "1";
            } else {
                echo $nim;
            }
        }
    }

    // Fungsi untuk cek email pencoblos
    public function Pencoblos_EmailValidation(){

        // Mengambil data email
        $email = $_POST['email'];

        // Menyiapkan array
        $where = array(
            'email' => $email
        );

        // Cek di database apakah email telah digunakan
        $cek = $this->Data->get_isExistData("pencoblos", $where);
        if ($cek) {
            echo "1";
        } else {
            echo "2";
        }
    }

 // cek kalo da yg sama email
    public function cekEmail(){
            if($this->Data->getEmail($_POST['email'])){
                echo 'taken';
            }else {
                echo 'not_taken';
            }
        }

        // cek kalo da yg sama email
    public function cekEmail2(){
            if($this->Data->getEmail2($_POST['email'])){
                echo 'taken';
            }else {
                echo 'not_taken';
            }
        }





    // Fungsi untuk cek email admin
    public function Admin_DataValidation()
    {
        // Mengambil data username
        $username = $_POST['username'];

        // Mengambil data email
        $email = $_POST['email'];

        // Menyiapkan array username
        $where = array(
            'username' => $username
        );

        // Cek di database apakah username telah digunakan
        $cek = $this->Data->get_isExistData("admin", $where);
        
        // Cek apakah Username telah dipakai
        if ($cek) {
            echo "1";
        } else {
            // Menyiapkan array email
            $where = array(
                'email' => $email
            );

            // Cek di database apakah email telah digunakan
            $cek = $this->Data->get_isExistData("admin", $where);
            if ($cek) {
                echo "2";
            } else {
                echo "3";
            }
        }

    }

    // Fungsi untuk validasi kode akses admin
    public function admin_CodeVerification(){

        if(isset($_POST['code'])){

            // Ambil kode
            $code = $_POST['code'];

            // Menyiapkan data untuk dicari didatabase
            $where = array(
                'code' => $code
            );


            // Mengambil data code dari table Admin_Auth
            $result = $this->Data->get_AllData("admin_auth");
            $match = false;

            // Cek dengan semua kode di database
            for($i=0; $i<sizeof($result);$i++){

                // Cek kecocokan kode
                if (password_verify($code, $result[$i]['code'])) {

                        // Jika sudah diverifikasi maka setting data session
                        $data_session = array(
                            'access' => 1, //menandakan akses admin diberikan
                            'admin_login' => 0
                        );
                        $this->session->set_userdata($data_session);

                        // Kode cocok
                        $match = true;
                }
            }

            // Ouput jika cocok
            if($match){
                echo "0";
            }else{
                echo "1";
            }
            
        }else{
            redirect("admin");
        }

    }
}
