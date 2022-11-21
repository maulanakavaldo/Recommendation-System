<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
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
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['user'] = $this->user_model->get_all_user()->result();
        $this->load->view('user/index', $data);
    }

    public function tambah()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_penilaian', 'User Penilaian', 'required');

        $this->form_validation->set_message('required', 'Isi dulu %s');

        if ($this->form_validation->run()) {
            $params = array(
                'user_penilaian' => $this->input->post('user_penilaian', TRUE),
            );
            $this->user_model->add_user($params);

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('user/tambah');
        } else {
            $this->load->view('user/tambah');
        }
    }

    public function ubah($id_user = '')
    {
        $data['user'] = $this->user_model->get_user($id_user)->row();

        if (empty($data['user'])) {
            show_404();
        } else {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('user_penilaian', 'User Penilaian', 'required');

            $this->form_validation->set_message('required', 'Isi dulu %s');

            if ($this->form_validation->run()) {
                $params = array(
                    'user_penilaian' => $this->input->post('user_penilaian', TRUE),
                );
                $this->user_model->update_user($id_user, $params);

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
                redirect('user/ubah/' . $id_user);
            } else {
                $this->load->view('user/ubah', $data);
            }
        }
    }

    public function hapus($id_user = '')
    {
        $user = $this->user_model->get_user($id_user);

        if ($user->num_rows() > 0) {
            $this->user_model->delete_user($id_user);
            redirect('user');
        } else {
            show_404();
        }
    }
}


/* End of file User.php */
/* Location: ./application/controllers/User.php */