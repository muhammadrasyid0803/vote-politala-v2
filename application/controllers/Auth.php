<?php
defined('BASEPATH') or exit('No direct script access allowed');

// ************************************************************************************* // 
// File Kontroller ini berfungsi untuk mengatur authentikasi login dan daftar pencoblos  //
// ************************************************************************************* // 


class Auth extends CI_Controller
{

    // Fungsi untuk halaman default authentication (halaman login)
    public function index()
    {
        // Cek apakah admin sedang login, jika benar maka akan di redirect ke halaman dashboard admin
        if($this->session->userdata("admin_login") == 1){
            redirect(base_url("admin/dashboard"));
        }else if($this->session->userdata("status") == 0){
            // Setting judul halaman
            $data['title'] = "Sign In | Vote Politala";

            // Load header halaman
            $this->load->view('templates/header', $data);

            // Load konten utama
            $this->load->view('auth/login');

            // Load footer halaman (Isinya script umum)
            $this->load->view('templates/footer');

            // Load script (Isinya script yang hanya digunakan pada halaman ini)
            $this->load->view('script/login');
        }

    }

    // Fungsi untuk mmengautentikasi login user
    public function auth_UserLogin()
    {

        // Menampung data nim dan password
        $nim = $_POST['nim'];
        $password = $_POST['password'];
        
        // Menyiapkan data untuk dicari didatabase
        $where = array(
            'nim' => $nim
        );

        // Cek apakah nim tersebut ada pada tabel pencoblos
        $cek = $this->Data->get_isExistData("pencoblos", $where);

        // Jika data ditemukan, maka lanjut pengecekan password
        if ($cek) {
            
            // Mengambil data pencoblos dari nim di atas
            $result = $this->Data->get_Data_byID("pencoblos","nim",$nim);
            if (password_verify($password, $result[0]['password'])) {
                // Jika password benar, maka cek apakah akun tersebut sudah diverifikasi atau belum
                if ($result[0]['verifikasi'] == 1) {

                    // Jika sudah diverifikasi maka setting data session
                    $data_session = array(
                        'status' => 1, //menandakan user sedang login
                        'nim' => $nim
                    );
                    $this->session->set_userdata($data_session);

                    echo "0";
                } else {
                    echo "1";
                }
            } else {
                echo "2";
            }
        } else {
            echo "3";
        }
    }

    // Fungsi untuk cek apakah nim terdaftar di database
    public function check()
    {
        // Setting judul halaman
        $data['title'] = "Sign Up | Vote Politala";

        // Load header halaman
        $this->load->view('templates/header', $data);

        // Load konten utama
        $this->load->view('auth/check');

        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');

        // Load script (Isinya script yang hanya digunakan pada halaman ini)
        $this->load->view('script/check');
    }

    // Fungsi untuk melengkapi data pencoblos
    public function registration(){
        
        if(isset($_POST['nim'])){

            // Mendapatkan data nim
            $nim = $_POST['nim'];

            // Mengambil data pendaftar dari tabel mahasiswa
            $data['pencoblos'] = $this->Data->get_Data_byID("mahasiswa","nim",$nim);

            // Setting judul halaman
            $data['title'] = "Sign Up | Vote Politala";

            // Load header halaman
            $this->load->view('templates/header', $data);

            // Load konten utama
            $this->load->view('auth/registration_pencoblos');

            // Load footer halaman (Isinya script umum)
            $this->load->view('templates/footer');

            // Load script (Isinya script yang hanya digunakan pada halaman ini)
            $this->load->view('script/registration_pencoblos');
        }else{
            redirect("auth/check");
        }
    }

    // Fungsi untuk meminta verifikasi
    public function need_Verification(){

        // Setting judul halaman
        $data['title'] = "Verification | Vote Politala";

        // Mendapatkan data nama dan email
        $data['name'] = $_POST['nama'];
        $data['email'] = $_POST['email'];

        // Mendapatkan password
        $password = $_POST['password'];

        // Menyiapkan kode verifikasi
        $code_verif = md5($_POST['nim']);

        // Menyiapka array data pencoblos
        $data_pencoblos = array(
            'nim' => $_POST['nim'],
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'jurusan' => $_POST['jurusan'],
            'angkatan' => $_POST['angkatan'],
            'password' => password_hash($password, PASSWORD_BCRYPT), // Mengenskripsi password
            'verifikasi' => 0,
            'paslon_pilihan' => 0,
            'code_verif' => $code_verif
        );

        // Memasukkan data ke database
        $this->Data->insert_Data("pencoblos", $data_pencoblos);

        // Menyiapkan pengiriman email ke pencoblos
        $from_email = "vote.politala@gmail.com";
        $to_email = $_POST['email'];

        $config = [
            'protocol'  => 'smtp',
            'smtp_crypto' => 'ssl',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'vote.politala@gmail.com',  // Email gmail
            'smtp_pass'   => 'vote123456_',  // Password gmail
            'smtp_port'   => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8', 
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from($from_email, 'Politala');
        $this->email->to($to_email);
        $this->email->subject('Verifikasi Voting Online');

        // Jika nama website berubah silahkan ubah domain link di bawah
        $this->email->message('Silahkan verifikasi dengan mengklik link berikut : http://localhost/vote/auth/verification?key=' . $code_verif . '&nim=' . $_POST['nim']);

       $this->email->send();
       

        // Load header halaman
        $this->load->view('templates/header', $data);

        // Load konten utama
        $this->load->view('auth/need_verification');

        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');

    }

    
    // Fungsi untuk meminta verifikasi akun admin
    public function need_AdminVerification()
    {

        // Setting judul halaman
        $data['title'] = "Verification | Vote Politala";

        // Mendapatkan data nama dan email
        $data['nama'] = $_POST['nama'];
        $data['email'] = $_POST['email'];

        // Mendapatkan password
        $password = $_POST['password'];

        // Menyiapkan kode verifikasi
        $code_verif = md5($_POST['username']);

        // Menyiapka array data pencoblos
        $data_admin = array(
            'username' => $_POST['username'],
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'password' => password_hash($password, PASSWORD_BCRYPT), // Mengenskripsi password
            'verifikasi' => 0,
            'code_verif' => $code_verif
        );

        // Memasukkan data ke database
        $this->Data->insert_Data("admin", $data_admin);

        // Menyiapkan pengiriman email ke pencoblos
        $from_email = "rasyidtasel98@gmail.com";
        $to_email = $_POST['email'];

        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'rasyidtasel98@gmail.com',  // Email gmail
            'smtp_pass'   => 'acid0308',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from($from_email, 'Politala');
        $this->email->to($to_email);
        $this->email->subject('Verifikasi Akun Admin');

        // Jika nama website berubah silahkan ubah domain link di bawah
        $this->email->message('Silahkan verifikasi dengan mengklik link berikut : http://localhost/vote/auth/verification_admin?key=' . $code_verif . '&username=' . $_POST['username']);
        $this->email->send();

        // Load header halaman
        $this->load->view('templates/header', $data);

        // Load konten utama
        $this->load->view('auth/need_adminverification');

        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');
    }

    // Fungsi untuk verifikasi email
    public function verification(){

        if(isset($_GET['key']) && isset($_GET['nim'])){

        }

        // Setting Judul halaman
        $data['title'] = "Verification | Vote Politala";

        // Cek apakah data kode verifikasi dan nim ada di database
        $cek = $this->Data->get_isExistData_by2ID("pencoblos","code_verif",$_GET['key'], "nim",$_GET['nim']);
        if ($cek) {

            // Menyiapkan array verifikasi
            $new_data = array(
                'nim' => $_GET['nim'],
                'verifikasi' => 1
            );
            $data['pencoblos'] = $this->Data->get_Data_byID("pencoblos","nim", $_GET['nim']);
            $this->Data->update_Data("pencoblos", "nim",$_GET['nim'],$new_data);
        }

        // Load header halaman
        $this->load->view('templates/header', $data);

        // Load konten utama
        $this->load->view('auth/verification');

        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');
    }

    // Fungsi untuk verifikasi email
    public function verification_admin()
    {

        if (isset($_GET['key']) && isset($_GET['username'])) {
        }

        // Setting Judul halaman
        $data['title'] = "Verification Admin";

        // Cek apakah data kode verifikasi dan nim ada di database
        $cek = $this->Data->get_isExistData_by2ID("admin", "code_verif", $_GET['key'], "username", $_GET['username']);
        if ($cek) {

            // Menyiapkan array verifikasi
            $new_data = array(
                'username' => $_GET['username'],
                'verifikasi' => 1
            );
            $this->Data->update_Data("admin", "username", $_GET['username'], $new_data);
            $data['pencoblos'] = $this->Data->get_Data_byID("admin", "username", $_GET['username']);
        }

        // Load header halaman
        $this->load->view('templates/header', $data);

        // Load konten utama
        $this->load->view('auth/verification_admin');

        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');
    }

    // Fungsi untuk mmengautentikasi login user
    public function auth_AdminLogin()
    {

        // Menampung data nim dan password
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Menyiapkan data untuk dicari didatabase
        $where = array(
            'username' => $username
        );

        // Cek apakah nim tersebut ada pada tabel pencoblos
        $cek = $this->Data->get_isExistData("admin", $where);

        // Jika data ditemukan, maka lanjut pengecekan password
        if ($cek) {
            // Mengambil data admin dari username di atas
            $result = $this->Data->get_Data_byID("admin", "username", $username);
            if (password_verify($password, $result[0]['password'])) {
                // Jika password benar, maka cek apakah akun tersebut sudah diverifikasi atau belum
                if ($result[0]['verifikasi'] == 1) {

                    // Jika sudah diverifikasi maka setting data session
                    $data_session = array(
                        'access' => 1, //menandakan akses admin diberikan
                        'admin_login' => 1, //login admin aktif
                        'admin_username' => $result[0]['username'] //user agent admin
                    );
                    $this->session->set_userdata($data_session);

                    echo "0";
                } else {
                    echo "1";
                }
            } else {
                echo "2";
            }
        } else {
            echo "3";
        }
    }

    // Fungsi untuk logout
    function logout()
    {
        // Menghapus session login
        $data_session = array(
            'status' => 0,
            'nim' => "empty"
        );
        $this->session->set_userdata($data_session);

        // Redirect ke halaman home
        redirect(base_url());
    }

    // Fungsi untuk logout Admin
    function logout_admin()
    {
        // Jika sudah diverifikasi maka setting data session
        $data_session = array(
            'access' => 0, //menandakan akses admin diberikan
            'admin_login' => 0
        );
        $this->session->set_userdata($data_session);

        // Redirect ke halaman home
        redirect(base_url());
    }

}