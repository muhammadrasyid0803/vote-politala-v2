<?php


// ************************************************************************** // 
// File Model ini berfungsi untuk merequest data dari database ke kontroller  //
// ************************************************************************** // 

class Data extends CI_Model
{

    // Mengambil seluruh data pada tabel
    public function get_AllData($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        return $this->db->get()->result_array();
    }

    // Mengambil seluruh data kolom dari tabel
    public function get_AllData_byCol($table, $selector)
    {
        $this->db->select($selector);
        $this->db->from($table);
        return $this->db->get()->result_array();
    }

    // Mengambil data terbary berdasarkan tabel dan selektornya (bisa berupa kolom)
    public function get_NewestData($table, $selector)
    {
        $query = $this->db->query("SELECT * FROM $table WHERE $selector = ( SELECT MAX($selector) FROM $table )");
        return $query->result_array();
    }

    // Mengambil data terbary berdasarkan tabel dan selektornya (bisa berupa kolom), dan memenuhi nilai id tertentu
    public function get_NewestData_byID($table, $selector, $id)
    {
        $query = $this->db->query("SELECT * FROM $table WHERE $selector = ( SELECT MAX($selector) FROM $table ) AND tipe = $id");
        return $query->result_array();
    }

    // Mengambil data berdasarkan selektor dan id
    public function get_Data_byID($table, $selector, $id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($selector, $id);
        return $this->db->get()->result_array();
    }


    // Mengambil data berdasarkan  2  selektor dan 2 id
    public function get_Data_by2ID($table, $selector1, $id1, $selector2, $id2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($selector1, $id1);
        $this->db->where($selector2, $id2);
        return $this->db->get()->result_array();
    }

    // Mengambil data berdasarkan  2  selektor dan 2 id
    public function get_isExistData_by2ID($table, $selector1, $id1, $selector2, $id2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($selector1, $id1);
        $this->db->where($selector2, $id2);
        $count = $this->db->get()->result_array();

        if (sizeof($count) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Melakukan cek apakah data yang dicari ada didataase
    function get_isExistData($table, $selector)
    {
        $count =  $this->db->get_where($table, $selector)->num_rows();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Mendapatkan nilai terbesar dari suatu kolom
    public function get_MaxValue($table, $selector)
    {
        $query = $this->db->query("SELECT MAX($selector) FROM $table");
        return $query->result_array();
    }

    // Memasukkan data ke database
    public function insert_Data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    // Update data
    public function update_Data($table, $selector, $id, $new_data)
    {
        $this->db->where($selector, $id);
        $this->db->update($table, $new_data);
    }

    // Memperbarui data pemilihan pertahun
    public function refresh_VoteValue()
    {
        $this->db->select("*");
        $this->db->from("mahasiswa");
        $this->db->where("status_value", 1);
        $mahasiswa_aktif = sizeof($this->db->get()->result_array());

        $this->db->select("*");
        $this->db->from("pencoblos");
        $this->db->where("verifikasi", 1);
        $this->db->where("paslon_pilihan", 0);
        $belum_mencoblos = sizeof($this->db->get()->result_array());

        $this->db->select("*");
        $this->db->from("pencoblos");
        $this->db->where("verifikasi", 1);
        $total_pencoblos = sizeof($this->db->get()->result_array());
        $telah_mencoblos = $total_pencoblos - $belum_mencoblos;

        $new_data = array(
            'total' => $mahasiswa_aktif,
            'mencoblos' => $telah_mencoblos,
            'belum_mencoblos' => $belum_mencoblos
        );

        // Tahun terbaru
        $tahun = 2019;

        $this->Data->update_Data("vote", "tahun", $tahun, $new_data);
    }

    // Menghapus data
    public function delete_DatabyID($table, $selector)
    {
        $this->db->where($selector);
        $this->db->delete($table);
    }

    public function tambah_data_kpum($data){
        
    return $this->db->insert('kpum', $data);   
     
    }

    
    // cek email
    public function getEmail($email){
        $this->db->where('email_presma' , $email);
            $query = $this->db->get('pending_paslon');

            if($query->num_rows()>0){
                return true;
            } else {
                return false;
            }
    }

    public function getEmail2($email){
        $this->db->where('email_wapresma' , $email);
            $query = $this->db->get('pending_paslon');

            if($query->num_rows()>0){
                return true;
            } else {
                return false;
            }
    }




    public function tampil_data_kpum(){

        $this->db->select('*');
        $this->db->from('kpum');
        $hasil = $this->db->get();

        return $hasil->result();
    }



    public function tampil_detail_kpum(){
    $id = $this->input->get('id');
    $this->db->select('*');
    $this->db->from('kpum');
    $this->db->where('id', $id);

    $hasil = $this->db->get();

    return $hasil->row();
    }


    public function get_kpum_by_id($id){
    $this->db->select('*');
    $this->db->from('kpum');
    $this->db->where('id', $id);

    $hasil = $this->db->get();

    return $hasil->row();
    }

    public function update_kpum($where, $data){

    $this->db->update('kpum', $data, $where);
    return $this->db->affected_rows();
    
    }

    public function hapus_data_kpum($id){
        $hasil=$this->db->query("DELETE FROM kpum WHERE id='$id'");
        return $hasil;
    }

    public function tambah_data_rules($data){
         return $this->db->insert('vote_rules', $data);  
    }


    public function tampil_data_rules(){
          $this->db->select('*');
        $this->db->from('vote_rules');
        $hasil = $this->db->get();

        return $hasil->result();
    }

    public function tampil_detail_rules(){
    $id = $this->input->get('id');
    $this->db->select('*');
    $this->db->from('vote_rules');
    $this->db->where('id', $id);

    $hasil = $this->db->get();

    return $hasil->row();
    }

    public function get_rules_by_id($id){
    $this->db->select('*');
    $this->db->from('vote_rules');
    $this->db->where('id', $id);

    $hasil = $this->db->get();

    return $hasil->row();
    }

    public function update_rules($where, $data){
        $this->db->update('vote_rules', $data, $where);
    return $this->db->affected_rows();
    } 

    public function hapus_data_rules($id){
          $hasil=$this->db->query("DELETE FROM vote_rules WHERE id='$id'");
        return $hasil;
    }


}
