<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Sekolah_m extends CI_Model
{
    var $table = 'tb_sekolah'; //nama tabel dari database
    var $column_order = array(null, 'kab_kota', 'nama', 'npsn', null); //field yang ada di table user
    var $column_search = array('kab_kota', 'nama', 'npsn'); //field yang diizin untuk pencarian 
    // var $order = array('user_id' => 'asc'); // default order 

    public function getData($id)
    {

        $this->db->from($this->table);
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getAll()
    {
        $this->db->from($this->table);


        if (isset($_GET['jenjang'])) {
            if (!is_null($_GET['jenjang'] && !empty($_GET['jenjang'])) && $_GET['jenjang'] !== "") {
                $this->db->where('jenjang', $_GET['jenjang']);
            }
        }
        if (isset($_GET['status'])) {
            if (!is_null($_GET['status'] && !empty($_GET['status'])) && $_GET['status'] !== "") {
                $this->db->where('status', $_GET['status']);
            }
        }

        $data = $this->db->get();
        return $data;
    }

    // datatable

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;
        if (isset($_POST['jenjang'])) {
            if (!is_null($_POST['jenjang'] && !empty($_POST['jenjang'])) && $_POST['jenjang'] !== "") {
                $this->db->where('jenjang', $_POST['jenjang']);
            }
        }
        if (isset($_POST['status'])) {
            if (!is_null($_POST['status'] && !empty($_POST['status'])) && $_POST['status'] !== "") {
                $this->db->where('status', $_POST['status']);
            }
        }

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
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
        } else {
            $this->db->order_by('nama', 'DESC');
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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
