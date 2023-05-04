<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pembinaan_m extends CI_Model
{

    var $column_order = array(null, 'nama', 'nip'); //set column field database for datatable orderable
    var $column_search = array('nama'); //set column field database for datatable searchable

    var $order = array('id' => 'asc'); // default order

    // var $column_search = array('nama', 'nip', 'no_telp', 'nama_perpustakaan', 'jenis_perpustakaan', 'sub_jenis_perpustakaan', 'nama_lembaga', 'alamat', 'akreditasi', 'status', 'created_at', 'updated_at', 'dibina_at');

    public function get($status = null)
    {
        $this->db->from('tb_permohonan');
        if ($status != null) {
            $this->db->where('status', $status);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getAll()
    {
        $data = $this->db->get('tb_permohonan')->result();
        return $data;
    }

    function _get_datatables_query($status = null)
    {
        $this->db->from('tb_permohonan');
        if ($status != null) {
            $this->db->where('status', $status);
        }
        $i = 0;
        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($status = null)
    {
        $this->_get_datatables_query($status);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($status = null)
    {
        $this->_get_datatables_query($status);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($status = null)
    {
        $this->db->from('tb_permohonan');
        if ($status != null) {
            $this->db->where('status', $status);
        }
        return $this->db->count_all_results();
    }

    public function detail($id)
    {
        $this->db->from('tb_permohonan');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function ubah_status($id)
    {
        $this->db->set([
            'status' => '1',
            'dibina_at' => date('Y-m-d')
        ]);
        $this->db->where('id', $id);
        $this->db->update('tb_permohonan');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_permohonan');
    }
}
