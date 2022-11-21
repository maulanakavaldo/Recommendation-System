<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Grafik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Anda harus login</div>');
            redirect('login');
        }
        $allowed = array('admin', 'user');
        if (!in_array($this->session->userdata('role'), $allowed)) {
            redirect('home');
        }
    }

    public function index()
    {
        $this->load->helper('form');

        $this->load->model('hasil_model');
        $this->load->model('user_model');

        $allowed = array('admin');
        if (!in_array($this->session->userdata('role'), $allowed)) {
            $id_pengguna = $this->session->userdata('id_pengguna');

            $data['id_pengguna'] = $id_pengguna;
            $data['hasil'] = $this->hasil_model->get_all_hasil('asc', $id_pengguna)->result();
            $data['pengguna'] = $this->user_model->get_all_user()->result();

            $this->load->view('grafik/index_mhs', $data);
        } else {
            $id_pengguna = isset($_GET['id_pengguna']) ? $_GET['id_pengguna'] : '';

            $data['id_pengguna'] = $id_pengguna;
            $data['hasil'] = $this->hasil_model->get_all_hasil('asc', $id_pengguna)->result();
            $data['pengguna'] = $this->user_model->get_all_user()->result();
            $data['role'] = $this->user_model->get_role_pendaftar()->result();
            $this->load->view('grafik/index', $data);
        }
    }
}

/* End of file Grafik.php */
/* Location: ./application/controllers/Grafik.php */