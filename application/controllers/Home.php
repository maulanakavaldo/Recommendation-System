<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        $this->load->model('fakultas_model');
        $this->load->model('prodi_model');

        $data['faperta'] = $this->prodi_model->get_faperta()->result();
        $data['fkh'] = $this->prodi_model->get_fkh()->result();
        $data['fpik'] = $this->prodi_model->get_fpik()->result();
        $data['fkl'] = $this->prodi_model->get_fkl()->result();
        $data['fateta'] = $this->prodi_model->get_fateta()->result();
        $data['fmipa'] = $this->prodi_model->get_fmipa()->result();
        $data['fem'] = $this->prodi_model->get_fem()->result();
        $data['fema'] = $this->prodi_model->get_fema()->result();
        $data['sb'] = $this->prodi_model->get_sb()->result();

        $this->load->view('home', $data);
    }
}
