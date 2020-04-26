<?php
class Pending_model extends CI_Model
{

    var $table_pending = 'pending_paslon';
    var $column_order = array('nama_presma', 'nama_wapresma', 'status'); //field yang ada di table unit
    var $column_search = array('nama_presma', 'nama_wapresma', 'status'); //field yang diizin untuk pencarian 
    var $order = array('nama_presma' => 'asc'); //  default order

    private function _get_datatables_query()
    {
        $this->db->from($this->table_pending);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table_pending);
        return $this->db->count_all_results();
    }

    // public function get_mhs_by_nim($nim)
    // {
    //     $sql = "SELECT * FROM mahasiswa WHERE nim = " . $nim . "";
    //     $query = $this->db->query($sql);

    //     return $query->row();
    // }
    public function get_mhs_by_nim($id)
    {
        $this->db->from($this->table_pending);
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }
    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_pending);
    }
    public function get_foto_khs_by_id($id)
    {
        $this->db->select('berkas_presma, berkas_wapresma');
        $this->db->from('pending_paslon');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }
    public function update($where, $data)
    {
        $this->db->update('pending_paslon', $data, $where);
        return $this->db->affected_rows();
    }
    public function update_t($where, $data)
    {
        $this->db->update('pending_paslon', $data, $where);
        return $this->db->affected_rows();
    }
    public function get_data_paslon($id)
    {
        $this->db->select('nim_presma AS nim, nama_presma AS nama, jurusan_presma AS jurusan, angkatan_presma AS angkatan');
        $this->db->from('pending_paslon');
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row_array();
    }
    public function get_data_paslon1($id)
    {
        $this->db->select('nim_wapresma AS nim, nama_wapresma AS nama, jurusan_wapresma AS jurusan, angkatan_wapresma AS angkatan');
        $this->db->from('pending_paslon');
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_data_list($id)
    {
        $this->db->select('nim_presma AS presma, nim_wapresma AS wapresma, foto_paslon AS foto, visi, misi');
        $this->db->from('pending_paslon');
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function insert_presma($data_paslon)
    {
        $this->db->insert('presma', $data_paslon);
        return $this->db->insert_id();
    }
    public function insert_wapresma($data_paslon1)
    {
        $this->db->insert('wapresma', $data_paslon1);
        return $this->db->insert_id();
    }

    public function insert_list_paslon($data_list_paslon)
    {
        $this->db->insert('paslon', $data_list_paslon);
        return $this->db->insert_id();
    }
}
