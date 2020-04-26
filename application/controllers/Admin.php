<?php
defined('BASEPATH') or exit('No direct script access allowed');

// ************************************************************************************* //
// File Kontroller ini berfungsi untuk mengatur kegiatan Admin                           //
// ************************************************************************************* //

class Admin extends CI_Controller
{

    // Perbarui data pemilihan
    function __construct()
    {

        parent::__construct();
        $this->Data->refresh_VoteValue();
        $this->load->model('user_model');
        $this->load->model('pencoblos_model');
        $this->load->model('presma_model');
        $this->load->model('wapresma_model');
        $this->load->model('vote_model');
        $this->load->model('pending_model');
        $this->load->model('paslon_model');
    }

    // Halaman default mengarahkan ke permintaan kode akses, guna meningkatkan keamanan akun admin
    public function index()
    {
        if (($this->session->userdata("access") == 1) && ($this->session->userdata("admin_login") == 1)) {
            redirect("admin/dashboard");
        } else if ($this->session->userdata("access") == 1) {
            redirect(base_url("admin/login"));
        } else {
            // Setting judul halaman
            $data['title'] = "Authentication";

            // Load konten utama
            $this->load->view('admin/index', $data);

            // Load footer halaman (Isinya script umum)
            $this->load->view('templates/footer');

            // Load script (Isinya script yang hanya digunakan pada halaman ini)
            $this->load->view('script/access_code', $data);
        }
    }

    // Fungsi untuk Halaman Login Admin
    public function login()
    {
        // Setting judul halaman
        $data['title'] = "Sign In Admin";

        // Load header halaman
        $this->load->view('templates/header', $data);

        // Load konten utama
        $this->load->view('admin/login');

        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');

        // Load script (Isinya script yang hanya digunakan pada halaman ini)
        $this->load->view('script/admin_login');
    }

    // Fungsi untuk daftar admin
    public function registration()
    {

        // Setting judul halaman
        $data['title'] = "Sign Up Admin";

        // Load header halaman
        $this->load->view('templates/header', $data);

        // Load konten utama
        $this->load->view('admin/registration');

        // Load footer halaman (Isinya script umum)
        $this->load->view('templates/footer');

        // Load script (Isinya script yang hanya digunakan pada halaman ini)
        $this->load->view('script/registration_admin');
    }

    // Fungsi Halaman Dashboard Admin
    public function dashboard()
    {
        // Cek apakah user telah login
        if (($this->session->userdata("access") == 1) && ($this->session->userdata("admin_login") == 1)) {

            // Mengambil data admin
            $data['admin'] = $this->Data->get_Data_byID("admin", "username", $this->session->userdata("admin_username"));

            // Setting judul halaman
            $data['title'] = "Admin | Dashboard";

            // Load header halaman
            $this->load->view('templates/header_admin', $data);

            // Load konten utama
            $this->load->view('admin/dashboard', $data);
        } else {
            redirect(base_url("admin"));
        }
    }

    // Fungsi untuk meload grafik pada dashboard admin
    public function admin_dashboardPL()
    {

        // Mengambil seluruh data dari tabel vote, lalu di convert ke format json agar bisa diolah mengunakan javascript
        $data['vote_data'] = json_encode($this->Data->get_AllData("vote"));

        // Mengambil data voting lalu di convert ke format json untuk di olah dengan javascript
        $data['vote_paslon'] = json_encode($this->Data->get_AllData_byCol("paslon", "jumlah_pemilih"));

        // Load view untuk grafik
        $this->load->view("admin/admin_dashboardPL", $data);
    }

    // Fungsi untuk meload view profile admin
    public function admin_profilePL()
    {

        // Mengambil data admin
        $data['admin'] = $this->Data->get_Data_byID("admin", "username", $this->session->userdata("admin_username"));

        // Load view untuk profile admin
        $this->load->view("admin/admin_profiledPL", $data);
    }

    // Fungsi untuk meload view password admin
    public function admin_passwordPL()
    {

        // Mengambil data admin
        $data['admin'] = $this->Data->get_Data_byID("admin", "username", $this->session->userdata("admin_username"));

        // Load view untuk password admin
        $this->load->view("admin/admin_passwordPL", $data);
    }

    // Fungsi untuk meload data mahasiswa
    public function admin_mahasiswaPL()
    {
        // Load view untuk mahasiswa
        $this->load->view("admin/admin_mahasiswaPL");
    }

    function list_mahasiswaPL()
    {
        $mahasiswa = $this->user_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($mahasiswa as $mhs) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $mhs->nim;
            $row[] = $mhs->nama;
            $row[] = $mhs->semester;
            $row[] = $mhs->kelas;
            if ($mhs->status == 'Aktif') {
                $row[] = '<a style="color:white;" class="btn btn-sm btn-primary"> Aktif</a>';
            } else {
                $row[] = '<a style="color:white;" class="btn btn-sm btn-danger"> Tidak Aktif</a>';
            }
            $row[] = $mhs->angkatan;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_mahasiswa(' . "'" . $mhs->nim . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_mahasiswa(' . "'" . $mhs->nim . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user_model->count_all(),
            "recordsFiltered" => $this->user_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    public function edit_mhs($nim)
    {
        $data = $this->user_model->get_mhs_by_nim($nim);
        echo json_encode($data);
    }
    public function update_mahasiswa()
    {
        $this->_validate();
        $data = array(
            'nama' => $this->input->post('nama'),
            'semester' => $this->input->post('semester'),
            'kelas' => $this->input->post('kelas'),
            'angkatan' =>$this->input->post('angkatan'),
        );
        $this->user_model->update(array('nim' => $this->input->post('nim')), $data);
        echo json_encode(array("status" => TRUE));
    }
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('nama') == '') {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'nama is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('semester') == '') {
            $data['inputerror'][] = 'semester';
            $data['error_string'][] = 'semester is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('kelas') == '') {
            $data['inputerror'][] = 'kelas';
            $data['error_string'][] = 'kelas is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
    public function delete_mahasiswa($nim)
    {
        $this->user_model->delete_by_id($nim);
        echo json_encode(array("status" => TRUE));
    }

    // Fungsi untuk meload data pencoblos
    public function admin_pencoblosPL()
    {

        // Load view untuk data pencoblos
        $this->load->view("admin/admin_pencoblosPL");
    }
    function list_pencoblosPL()
    {
        $pencoblos = $this->pencoblos_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($pencoblos as $pen) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pen->nim;
            $row[] = $pen->nama;
            $row[] = $pen->jurusan;
            $row[] = $pen->angkatan;
            if ($pen->verifikasi == '1') {
                $row[] = '<a style="color:white;" class="btn btn-sm btn-primary"> Verified </a>';
            } else {
                $row[] = '<a style="color:white;" class="btn btn-sm btn-danger"> Not</a>';
            }
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pencoblos(' . "'" . $pen->nim . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pencoblos(' . "'" . $pen->nim . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pencoblos_model->count_all(),
            "recordsFiltered" => $this->pencoblos_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    public function edit_pencoblos($nim)
    {
        $data = $this->pencoblos_model->get_mhs_by_nim($nim);
        echo json_encode($data);
    }
    public function update_pencoblos()
    {
        $data = array(
            // 'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('selectJurusan'),
            // 'angkatan' => $this->input->post('angkatan'),

        );
        $this->pencoblos_model->update(array('nim' => $this->input->post('nim')), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function delete_pencoblos($nim)
    {
        $this->pencoblos_model->delete_by_id($nim);
        echo json_encode(array("status" => TRUE));
    }

    // Fungsi untuk meload data presma
    public function admin_presmaPL()
    {

        // Load view untuk data presma
        $this->load->view("admin/admin_presmaPL");
    }

    function list_presmaPL()
    {
        $presma = $this->presma_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($presma as $pres) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $pres->nim;
            $row[] = $pres->nama;
            $row[] = $pres->jurusan;
            $row[] = $pres->angkatan;
            $row[] = $pres->no_urut;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_presma(' . "'" . $pres->no_urut . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_presma(' . "'" . $pres->no_urut . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->presma_model->count_all(),
            "recordsFiltered" => $this->presma_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    public function edit_presma($no_urut)
    {
        $data = $this->presma_model->get_mhs_by_nim($no_urut);
        echo json_encode($data);
    }

    public function update_presma()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
            'angkatan' => $this->input->post('angkatan'),
        );
        $this->presma_model->update(array('no_urut' => $this->input->post('no_urut')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function delete_presma($no_urut)
    {
        $this->presma_model->delete_by_id($no_urut);
        echo json_encode(array("status" => TRUE));
    }

    // Fungsi untuk meload data wapresma
    public function admin_wapresmaPL()
    {
        // Load view untuk data wapresma
        $this->load->view("admin/admin_wapresmaPL");
    }

    function list_wapresmaPL()
    {
        $wapresma = $this->wapresma_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($wapresma as $wpres) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $wpres->nim;
            $row[] = $wpres->nama;
            $row[] = $wpres->jurusan;
            $row[] = $wpres->angkatan;
            $row[] = $wpres->no_urut;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_wapresma(' . "'" . $wpres->no_urut . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_wapresma(' . "'" . $wpres->no_urut . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->wapresma_model->count_all(),
            "recordsFiltered" => $this->wapresma_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function edit_wapresma($no_urut)
    {
        $data = $this->wapresma_model->get_mhs_by_nim($no_urut);
        echo json_encode($data);
    }

    public function update_wapresma()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
            'angkatan' => $this->input->post('angkatan'),
        );
        $this->wapresma_model->update(array('no_urut' => $this->input->post('no_urut')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function delete_wapresma($no_urut)
    {
        $this->wapresma_model->delete_by_id($no_urut);
        echo json_encode(array("status" => TRUE));
    }

    // Fungsi untuk meload data rules atau aturan votting
    public function admin_votePL()
    {
        // Load view untuk data wapresma
        $this->load->view("admin/admin_votePL");
    }

    function list_votePL()
    {
        $vote = $this->vote_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($vote as $v) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $v->tahun;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_wapresma(' . "'" . $v->tahun . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> View</a>';
            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Edit" onclick="edit_wapresma(' . "'" . $v->tahun . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="edit_wapresma(' . "'" . $v->tahun . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->vote_model->count_all(),
            "recordsFiltered" => $this->vote_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    // Fungsi untuk meload data paslon yang menunggu persetujuan panitia
    public function admin_pendingPL()
    {
        // Load view untuk data wapresma
        $this->load->view("admin/admin_pendingPL");
    }

    function list_pendingPL()
    {
        $pending = $this->pending_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($pending as $p) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $p->nama_presma;
            $row[] = $p->nama_wapresma;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="lihat_presma(' . "'" . $p->id . "'" . ')"> Presma</a>
            <a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="lihat_wapresma(' . "'" . $p->id . "'" . ')"> Wapresma</a>';
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="terima(' . "'" . $p->id . "'" . ')"> Terima</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="tolak(' . "'" . $p->id . "'" . ')"> Tolak</a>';
            if ($p->status == '0') {
                $row[] = '<a class="btn btn-sm btn-warning" style="color:white;"> Belum di tinjau</a>';
            } else if ($p->status == '1') {
                $row[] = '<a class="btn btn-sm btn-success" style="color:white;">Telah Terima</a>';
            } else {
                $row[] = '<a class="btn btn-sm btn-danger" style="color:white;">Ditolak</a>';
            }
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pending_model->count_all(),
            "recordsFiltered" => $this->pending_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    public function get_foto($id)
    {
        $data = $this->pending_model->get_foto_khs_by_id($id);
        echo json_encode($data);
    }
    public function terima($id)
    {
        $data_paslon = $this->pending_model->get_data_paslon($id);
        $this->pending_model->insert_presma($data_paslon);
        $data_paslon1 = $this->pending_model->get_data_paslon1($id);
        $this->pending_model->insert_wapresma($data_paslon1);
        $data_list_paslon = $this->pending_model->get_data_list($id);
        $this->pending_model->insert_list_paslon($data_list_paslon);
        $data = array(
            'status' => '1',
        );
        $this->pending_model->update(array('id' => $id), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function tolak($id)
    {
        $data = array(
            'status' => '2',
        );
        $this->pending_model->update_t(array('id' => $id), $data);
        echo json_encode(array("status" => TRUE));
    }


    // Fungsi untuk meload data paslon
    public function admin_paslonPL()
    {

        // Load view untuk data paslon
        $this->load->view("admin/admin_paslonPL");
    }

    function list_paslonPL()
    {
        $paslon = $this->paslon_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($paslon as $p) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $p->nama_presma;
            $row[] = $p->nama_wapresma;
            $row[] = $p->jumlah_pemilih;
            $row[] = $p->no_urut;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->paslon_model->count_all(),
            "recordsFiltered" => $this->paslon_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    // Fungsi untuk update data admin
    public function update_profile()
    {

        $password = $_POST['password'];

        // Mengambil data admin
        $result = $this->Data->get_Data_byID("admin", "username", $_POST['username']);
        if (password_verify($password, $result[0]['password'])) {
            // Ambil data yang dikirim
            $new_adminData = array(
                'nama' => $_POST['nama'],
                'email' => $_POST['email']
            );

            // Update ke database
            $this->Data->update_Data("admin", "username", $_POST['username'], $new_adminData);
            echo "1";
        } else {
            echo "2";
        }
    }

    // Fungsi untuk update password admin
    public function update_password()
    {
        $password = $_POST['old-password'];
        $new_password = $_POST['new-password'];
        $new_repassword = $_POST['new-repassword'];

        if ($new_password == $new_repassword) {
            // Mengambil data admin
            $result = $this->Data->get_Data_byID("admin", "username", $_POST['username']);
            if (password_verify($password, $result[0]['password'])) {
                // Ambil data yang dikirim
                $new_adminData = array(
                    'password' => password_hash($new_password, PASSWORD_BCRYPT), // Mengenskripsi password
                );

                // Update ke database
                $this->Data->update_Data("admin", "username", $_POST['username'], $new_adminData);
                echo "4";
            } else {
                echo "3";
            }
        } else {
            echo "5";
        }
    }

    // Fungsi untuk menghapus mahasiswa
    // public function delete_mahasiswa()
    // {
    //     $where = array(
    //         'nim' => $_POST['nim']
    //     );
    //     $this->Data->delete_DatabyID("mahasiswa", $where);
    // }


    // Fungsi untuk mengambil data mahasiswa
    // public function edit_mhs()
    // {
    //     // Menampilkan data dalam bentuk json
    //     echo json_encode($this->Data->get_Data_byID("mahasiswa", "nim", $_POST['nim']));
    // }


    // Fungsi untuk edit data mahasiswa
    // public function update_mahasiswa()
    // {
    //     $data = array(
    //         'nama' => $_POST['nama'],
    //         'semester' => $_POST['semester'],
    //         'kelas' => $_POST['kelas']
    //     );
    //     $this->Data->update_Data("mahasiswa", "nim", $_POST['nim'], $data);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    // 		Data berhasil diubah</div>');
    // }
    // Fungsi untuk mengambil data pencoblos

    public function admin_kpum(){

        $data['kpum'] = $this->Data->get_AllData("kpum");
        

        $this->load->view("admin/admin_kpum", $data);
        // $this->load->view("home/kpum", $data);
    }


    private function _do_upload_add_foto_struktur(){
            $config['upload_path']          = 'assets/voting_assets/image/kpum';
            $config['allowed_types']        = 'jpg|png|jpeg';
            // $config['max_size']             = 10000; //set max size allowed in Kilobyte
            // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
            $config['file_name']            = date("dmY_His"); //just milisecond timestamp fot unique name
     
            $this->load->library('upload', $config);
     
            if(!$this->upload->do_upload('foto_1')) //upload and validate
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
            $config['upload_path']          = 'assets/voting_assets/image/kpum';
            $config['allowed_types']        = 'jpg|png|jpeg';
            // $config['max_size']             = 10000; //set max size allowed in Kilobyte
            // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
            $config['file_name']            = date("dmY_His"); //just milisecond timestamp fot unique name
     
            $this->load->library('upload', $config);
     
            if(!$this->upload->do_upload('foto_2')) //upload and validate
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
            $config['upload_path']          = 'assets/voting_assets/image/kpum';
            $config['allowed_types']        = 'jpg|png|jpeg';
            // $config['max_size']             = 10000; //set max size allowed in Kilobyte
            // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
            $config['file_name']            = date("dmY_His"); //just milisecond timestamp fot unique name
     
            $this->load->library('upload', $config);
     
            if(!$this->upload->do_upload('foto_3')) //upload and validate
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

     private function _do_upload_add_foto_doc(){
            $config['upload_path']          = 'assets/voting_assets/image/dokumentasi';
            $config['allowed_types']        = 'jpg|png|jpeg';
            // $config['max_size']             = 10000; //set max size allowed in Kilobyte
            // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
            $config['file_name']            = date("dmY_His"); //just milisecond timestamp fot unique name
     
            $this->load->library('upload', $config);
     
            if(!$this->upload->do_upload('foto_4')) //upload and validate
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

    public function tambah_data_kpum(){

         $data = array(
            'tahun' => $this->input->post('txtTahun'),

        );

        if(!empty($_FILES['foto_1']['name'])){
            $upload = $this->_do_upload_add_foto_struktur();
            $data['struktur_kepengurusan'] = $upload;
        }

        if(!empty($_FILES['foto_2']['name'])){
            $upload = $this->_do_upload_add_foto_visi();
            $data['visi'] = $upload;
        }

        if(!empty($_FILES['foto_3']['name'])){
            $upload = $this->_do_upload_add_foto_misi();
            $data['misi'] = $upload;
        }
        if(!empty($_FILES['foto_4']['name'])){
            $upload = $this->_do_upload_add_foto_doc();
            $data['dokumentasi'] = $upload;
        }



        $this->Data->tambah_data_kpum($data);
        echo json_encode(array("status" => true));
    }

    public function tampil_data_kpum(){
        $data = $this->Data->tampil_data_kpum();
        echo json_encode($data);
    }


    public function detail_kpum(){
        $result = $this->Data->tampil_detail_kpum();
        echo json_encode($result);
    }

    public function edit_kpum(){
        $id = $this->input->get('id');
        $data = $this->Data->get_kpum_by_id($id);
        echo json_encode($data);
    }

    public function update_kpum(){
        $data = array(
            'tahun' => $this->input->post('txtTahun'),
           
        
        );

        if(!empty($_FILES['foto_1']['name'])){
            $upload = $this->_do_upload_add_foto_struktur();
            $data['struktur_kepengurusan'] = $upload;
        }

        if(!empty($_FILES['foto_2']['name'])){
            $upload = $this->_do_upload_add_foto_visi();
            $data['visi'] = $upload;
        }
        if(!empty($_FILES['foto_3']['name'])){
            $upload = $this->_do_upload_add_foto_misi();
            $data['misi'] = $upload;
        }

          if(!empty($_FILES['foto_4']['name'])){
            $upload = $this->_do_upload_add_foto_doc();
            $data['dokumentasi'] = $upload;
        }


        $hasil = $this->Data->update_kpum(array('id' => $this->input->post('txtId')), $data);
      
        echo json_encode($hasil);
    }


    public function hapus_data_kpum(){
        $id = $this->input->post('TxtId');
        $data = $this->Data->hapus_data_kpum($id);
        echo json_encode($data);
    }

    public function tambah_data_rules(){
          $data = array(
            'tahun' => $this->input->post('txtTahun'),
            'start_date' => $this->input->post('txtStartDate'),
           'end_date' => $this->input->post('txtEndDate'),
           'start_time' => $this->input->post('txtStartTime'),
           'end_time' => $this->input->post('txtEndTime'),
        
        );


        $this->Data->tambah_data_rules($data);
        echo json_encode(array("status" => true));


    }



    public function tampil_data_rules(){
        $data = $this->Data->tampil_data_rules();
        echo json_encode($data);
    }

    public function detail_rules(){
         $result = $this->Data->tampil_detail_rules();
        echo json_encode($result);
    }

    public function edit_rules(){
         $id = $this->input->get('id');
        $data = $this->Data->get_rules_by_id($id);
        echo json_encode($data);
    }

    public function update_rules(){
         $data = array(
            'tahun' => $this->input->post('txtTahun'),
            'start_date' => $this->input->post('txtStartDate'),
           'end_date' => $this->input->post('txtEndDate'),
           'start_time' => $this->input->post('txtStartTime'),
           'end_time' => $this->input->post('txtEndTime'),
        
        );



        $hasil = $this->Data->update_rules(array('id' => $this->input->post('txtId')), $data);
      
        echo json_encode($hasil);
    }

    public function hapus_data_rules(){
         $id = $this->input->post('TxtId');
        $data = $this->Data->hapus_data_rules($id);
        echo json_encode($data);
    }




}
