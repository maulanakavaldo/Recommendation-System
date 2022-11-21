<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_model');
    }

    public function index()
    {
        // if ($this->session->userdata('logged_in')) {
        //     redirect('home');
        // }
        $this->load->helper('form');
        $this->load->view('signup');
    }

    public function tambah()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|alpha_spaces');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_message('required', '%s tidak boleh kosong!');
        $this->form_validation->set_message('alpha_spaces', '%s hanya boleh huruf');
        $this->form_validation->set_message('alpha_numeric', '%s hanya boleh huruf dan angka!');
        $this->form_validation->set_message('is_unique', '%s sudah digunakan!');

        if ($this->form_validation->run()) {
            $params = array(
                'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
                'role' => 'user',
            );
            $this->pengguna_model->add_pengguna($params);

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil. Silakan Login!</div>');
            redirect('signup');
        } else {
            $this->session->set_flashdata('failed', '<div class="alert alert-danger" role="alert">Pendaftaran Gagal. Silakan Coba Lagi!</div>');
            // redirect('signup');
            $this->load->view('signup');
        }
    }

    public function cek_unik_username($username)
    {
        $query = $this->pengguna_model->cek_unik_username($username, $this->input->post('username_tmp'));
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('cek_unik_username', '{field} sudah digunakan');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}


/* End of file SignUp.php */
/* Location: ./application/controllers/SignUp.php */