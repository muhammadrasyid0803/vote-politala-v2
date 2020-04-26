<?php
class Paslon_model extends CI_Model
{

    var $table_paslon = 'paslon';
    var $column_order = array('no_urut', 'presma', 'wapresma', 'jumlah_pemilih'); //field yang ada di table unit
    var $column_search = array('no_urut', 'presma', 'wapresma', 'jumlah_pemilih'); //field yang diizin untuk pencarian 
    var $order = array('presma' => 'asc'); //  default order

    private function _get_datatables_query()
    {

        $this->db->from($this->table_paslon);

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
            $this->db->select('paslon.*,presma.nama AS nama_presma,wapresma.nama AS nama_wapresma');
        $this->db->limit($_POST['length'], $_POST['start']);
        $this->db->join('presma', 'presma.nim = paslon.presma');
        $this->db->join('wapresma', 'wapresma.nim = paslon.wapresma');
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $this->db->select('paslon.*,presma.nama AS nama_presma,wapresma.nama AS nama_wapresma');
        $this->db->join('presma', 'presma.nim = paslon.presma');
        $this->db->join('wapresma', 'wapresma.nim = paslon.wapresma');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table_paslon);
        return $this->db->count_all_results();
    }

    // public function get_mhs_by_nim($nim)
    // {
    //     $sql = "SELECT * FROM mahasiswa WHERE nim = " . $nim . "";
    //     $query = $this->db->query($sql);

    //     return $query->row();
    // }
    public function get_mhs_by_nim($no_urut)
    {
        $this->db->from($this->table_paslon);
        $this->db->where('no_urut', $no_urut);
        $query = $this->db->get();

        return $query->row();
    }
    public function delete_by_id($no_urut)
    {
        $this->db->where('no_urut', $no_urut);
        $this->db->delete($this->table_paslon);
    }
    public function update($where, $data)
    {
        $this->db->update('paslon', $data, $where);
        return $this->db->affected_rows();
    }
}
