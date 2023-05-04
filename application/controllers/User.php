<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_m', 'user');
    }
    public function index()
    {
        $data['row'] = $this->user->get();
        $this->template->load('admin/template_cms', 'admin/user/user_index', $data);
    }
    public function add()
    {

        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules(
            'passconf',
            'Password Konfirmasi',
            'required|matches[password]',
            array('matches' => '%s Tidak sesuai Password')
        );

        $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
        $this->form_validation->set_message('min_length', '{field} Minimal 5 Karakter');
        $this->form_validation->set_message('is_unique', '{field} Sudah Digunakan');
        $this->form_validation->set_error_delimiters('<code>', '</code>');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('admin/template_cms', 'admin/user/user_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil di Simpan');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal di Simpan');
                redirect('user');
            }
            redirect('user');
        }
    }
	
    public function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id != $post[user_id]");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} Sudah Digunakan');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function del()
    {
        $id = $this->input->post('user_id');
        $this->user->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('warning', 'Data Berhasil di Hapus');
        }
        redirect('user');
    }
}
