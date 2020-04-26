<?php
class User_model extends CI_Model
{

    var $table_mahasiswa = 'mahasiswa';
    var $column_order = array('nim', 'nama', 'semester', 'status', 'kelas', 'angkatan'); //field yang ada di table unit
    var $column_search = array('nim', 'nama', 'semester', 'status', 'kelas', 'angkatan'); //field yang diizin untuk pencarian 
    var $order = array('nama' => 'asc'); //  default order

    private function _get_datatables_query()
    {
        $this->db->from($this->table_mahasiswa);

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
        $this->db->from($this->table_mahasiswa);
        return $this->db->count_all_results();
    }

    // public function get_mhs_by_nim($nim)
    // {
    //     $sql = "SELECT * FROM mahasiswa WHERE nim = " . $nim . "";
    //     $query = $this->db->query($sql);

    //     return $query->row();
    // }
    public function get_mhs_by_nim($nim)
    {
        $this->db->from($this->table_mahasiswa);
        $this->db->where('nim', $nim);
        $query = $this->db->get();

        return $query->row();
    }
    public function delete_by_id($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->delete($this->table_mahasiswa);
    }

    public function update($where, $data)
    {
        $this->db->update('mahasiswa', $data, $where);
        return $this->db->affected_rows();
    }
}
