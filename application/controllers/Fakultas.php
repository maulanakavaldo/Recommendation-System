<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Fakultas extends CI_Controller
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
        $this->load->model('fakultas_model');
        $this->load->model('hasil_model');
    }

    public function index()
    {
        $data['fakultas'] = $this->fakultas_model->get_all_fakultas('desc')->result();
        $data['rek_prod'] = $this->hasil_model->get_rek_prod('desc')->result();
        // $data["record"] = $this->model->tampil_data();

        $allowed = array('admin');
        if (!in_array($this->session->userdata('role'), $allowed)) {
            $this->load->view('fakultas/index_mhs', $data);
        } else {
            $this->load->view('fakultas/index', $data);
        }
    }

    public function tambah()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required|alpha_spaces');

        $this->form_validation->set_message('required', 'Isi dulu %s');
        $this->form_validation->set_message('alpha_spaces', '%s hanya boleh huruf!');

        if ($this->form_validation->run()) {
            $params = array(
                'nama_fakultas' => $this->input->post('nama_fakultas', TRUE),
            );
            $this->fakultas_model->add_fakultas($params);

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('fakultas');
        } else {
            $this->load->view('fakultas/tambah');
            // $this->session->set_flashdata('failure', '<div class="alert alert-danger" role="alert">Data gagal disimpan. Coba lagi!</div>');
        }
    }

    public function ubah($id_fakultas = '')
    {
        $data['fakultas'] = $this->fakultas_model->get_fakultas($id_fakultas)->row();

        if (empty($data['fakultas'])) {
            show_404();
        } else {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required|alpha');

            $this->form_validation->set_message('required', 'Isi dulu %s');
            $this->form_validation->set_message('alpha', '%s hanya boleh huruf!');

            if ($this->form_validation->run()) {
                $params = array(
                    'nama_fakultas' => $this->input->post('nama_fakultas', TRUE),
                );
                $this->fakultas_model->update_fakultas($id_fakultas, $params);

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
                redirect('fakultas');
            } else {
                // $this->session->set_flashdata('failure', '<div class="alert alert-danger" role="alert">Data gagal diubah. Coba lagi!</div>');
                $this->load->view('fakultas/ubah', $data);
            }
        }
    }

    public function hapus($id_fakultas = '')
    {
        $fakultas = $this->fakultas_model->get_fakultas($id_fakultas);

        if ($fakultas->num_rows() > 0) {
            $this->fakultas_model->delete_fakultas($id_fakultas);
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');

            redirect('fakultas');
        } else {
            $this->session->set_flashdata('failure', '<div class="alert alert-danger" role="alert">Data gagal dihapus</div>');
            show_404();
        }
    }
}


/* End of file Fakultas.php */
/* Location: ./application/controllers/Fakultas.php */