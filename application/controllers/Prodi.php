<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Prodi extends CI_Controller
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
        $this->load->model('prodi_model');
        $this->load->model('kriteria_model');
        $this->load->model('prodi_kriteria_model');
        $this->load->model('user_model'); //periode
        $this->load->model('fakultas_model');
        $this->load->model('nilai_model');
    }

    public function index()
    {
        $data['prodi'] = $this->prodi_model->get_all_prodi('desc')->result();
        $allowed = array('admin');
        if (!in_array($this->session->userdata('role'), $allowed)) {
            $this->load->view('prodi/index_mhs', $data);
        } else {
            $this->load->view('prodi/index', $data); //admin
        }
    }

    public function tambah()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();

        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|alpha_spaces');
        $this->form_validation->set_rules('id_fakultas', 'Nama Fakultas', 'required');
        $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required|alpha_spaces');
        $this->form_validation->set_rules('prospek_kerja', 'prospek_kerja', 'required|alpha_spaces');
        $this->form_validation->set_rules('kuota_beasiswa', 'kuota_beasiswa', 'required|numeric');
        $this->form_validation->set_rules('daya_tampung', 'daya_tampung', 'required|numeric');
        $this->form_validation->set_rules('jumlah_peminat', 'jumlah_peminat', 'required|numeric');

        $this->form_validation->set_message('required', 'Isi dulu %s');
        $this->form_validation->set_message('alpha_spaces', '%s harus huruf');
        $this->form_validation->set_message('numeric', '%s harus angka');
        $this->form_validation->set_message('less_than_equal_to', '%s maksimal 5');
        $this->form_validation->set_message('greater_than_equal_to', '%s minimal 1');

        if ($this->form_validation->run()) {
            $params = array(
                'nama_prodi' => $this->input->post('nama_prodi', TRUE),
                'id_fakultas' => $this->input->post('id_fakultas', TRUE),
                'akreditasi' => $this->input->post('akreditasi', TRUE),
                'prospek_kerja' => $this->input->post('prospek_kerja', TRUE),
                'kuota_beasiswa' => $this->input->post('kuota_beasiswa', TRUE),
                'daya_tampung' => $this->input->post('daya_tampung', TRUE),
                'jumlah_peminat' => $this->input->post('jumlah_peminat', TRUE),
            );
            $this->prodi_model->add_prodi($params);

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('prodi');
        } else {
            $data['fakultas'] = $this->fakultas_model->get_all_fakultas()->result();
            $data['user'] = $this->user_model->get_all_user()->result(); ///jbj 

            // $this->session->set_flashdata('failure', '<div class="alert alert-danger" role="alert">Data gagal disimpan. Coba lagi!</div>');
            $this->load->view('prodi/tambah', $data);
        }
    }

    public function ubah($id_prodi = '')
    {
        $data['prodi'] = $this->prodi_model->get_prodi($id_prodi)->row();
        $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();

        if (empty($data['prodi'])) {
            show_404();
        } else {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|alpha_spaces');
            $this->form_validation->set_rules('id_fakultas', 'Nama Fakultas', 'required');
            $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required|alpha_spaces');
            $this->form_validation->set_rules('prospek_kerja', 'prospek_kerja', 'required|alpha_spaces');
            $this->form_validation->set_rules('kuota_beasiswa', 'kuota_beasiswa', 'required|numeric');
            $this->form_validation->set_rules('daya_tampung', 'daya_tampung', 'required|numeric');
            $this->form_validation->set_rules('jumlah_peminat', 'jumlah_peminat', 'required|numeric');

            $this->form_validation->set_message('required', 'Isi dulu %s');
            $this->form_validation->set_message('alpha_spaces', '%s harus huruf');
            $this->form_validation->set_message('numeric', '%s harus angka');
            $this->form_validation->set_message('less_than_equal_to', '%s maksimal 5');
            $this->form_validation->set_message('greater_than_equal_to', '%s minimal 1');

            if ($this->form_validation->run()) {
                $prodi = $data['prodi'];

                $params = array(
                    'nama_prodi' => $this->input->post('nama_prodi', TRUE),
                    'id_fakultas' => $this->input->post('id_fakultas', TRUE),
                    'akreditasi' => $this->input->post('akreditasi', TRUE),
                    'prospek_kerja' => $this->input->post('prospek_kerja', TRUE),
                    'kuota_beasiswa' => $this->input->post('kuota_beasiswa', TRUE),
                    'daya_tampung' => $this->input->post('daya_tampung', TRUE),
                    'jumlah_peminat' => $this->input->post('jumlah_peminat', TRUE),

                );
                $this->prodi_model->update_prodi($id_prodi, $params);

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
                redirect('prodi');
            } else {
                $data['fakultas'] = $this->fakultas_model->get_all_fakultas()->result();
                $data['user'] = $this->user_model->get_all_user()->result();

                // $this->session->set_flashdata('failure', '<div class="alert alert-danger" role="alert">Data gagal diubah. Coba lagi!</div>');
                $this->load->view('prodi/ubah', $data);
            }
        }
    }

    public function hapus($id_prodi = '')
    {
        $prodi = $this->prodi_model->get_prodi($id_prodi);

        if ($prodi->num_rows() > 0) {
            $prodi = $prodi->row();

            $this->prodi_model->delete_prodi($id_prodi);
            redirect('prodi');
        } else {
            $this->session->set_flashdata('failure', '<div class="alert alert-danger" role="alert">Data gagal dihapus.</div>');
            show_404();
        }
    }

    public function detail($id_prodi = '')
    {
        $data['prodi'] = $this->prodi_model->get_prodi($id_prodi)->row();

        if (empty($data['prodi'])) {
            show_404();
        } else {

            $this->load->view('prodi/detail', $data);
        }
    }

    public function get_id_nilai($nilai)
    {
        $nilai = $this->nilai_model->get_rentang_nilai($nilai)->row();
        if (empty($nilai)) {
            return null;
        } else {
            return $nilai->id_nilai;
        }
    }

    public function validasi_file()
    {
        $config['upload_path'] = './public/file/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048;
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload()) {
            return TRUE;
        } else {
            $this->form_validation->set_message('validasi_file', $this->upload->display_errors());
            return FALSE;
        }
    }
}


/* End of file Prodi.php */
/* Location: ./application/controllers/Prodi.php */