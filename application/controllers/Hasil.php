<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Hasil extends CI_Controller
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
        $this->load->model('kriteria_model');
        $this->load->model('alternatif_ahp_model');
        $this->load->model('prodi_ahp_model');
        $this->load->model('prodi_model');
        $this->load->model('nilai_model');
        $this->load->model('prodi_kriteria_model');
        $this->load->model('hasil_model');
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->helper('form');
        $data['role'] = $this->user_model->get_role_pendaftar()->result();
        // $data['rek_prod'] = $this->hasil_model->get_rek_prod('desc')->result();

        $allowed = array('admin');
        if (!in_array($this->session->userdata('role'), $allowed)) {
            $id_pengguna = $this->session->userdata('id_pengguna');
            $data['id_pengguna'] = $id_pengguna;

            $this->hasil_model->delete_hasil($id_pengguna);
            $data['prodi'] = $this->prodi_model->get_all_prodi('asc', $id_pengguna)->result();

            $data['prodi'] = $this->prodi_model->get_all_prodi('asc')->result();
            $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();


            //-----------------------
            $nilai = array();
            $nilai_ahp = array();
            $nilai_prioritas = array();
            $hasil = array();
            foreach ($data['prodi'] as $row_prodi) {
                $nilai_total = 0;
                foreach ($data['kriteria'] as $row_kriteria) {

                    $alternatif_prodi = $this->alternatif_ahp_model->get_alternatif_prodi($row_prodi->id_prodi, $row_kriteria->id_kriteria)->row();

                    $nilai_ahp[$row_prodi->id_prodi][$row_kriteria->id_kriteria] = empty($result) ? '' : $result->alt_prioritas;

                    $prioritas = $row_kriteria->krit_prioritas * $alternatif_prodi->alt_prioritas;
                    $nilai_prioritas[$row_prodi->id_prodi][$row_kriteria->id_kriteria] = number_format($prioritas, 5);

                    $nilai_total += $prioritas;
                }
                $hasil[] = array(
                    "id_prodi" => $row_prodi->id_prodi,
                    "nama_prodi" => $row_prodi->nama_prodi,
                    "nilai_hasil" => number_format($nilai_total, 5),
                );
                $params = array(
                    "id_prodi" => $row_prodi->id_prodi,
                    "nilai_hasil" => number_format($nilai_total, 5),
                    "id_pengguna" => $this->session->userdata('id_pengguna'), //HARUSNYA tambahkan id session loggedin
                );
                $this->hasil_model->add_hasil($params);
            }

            $this->array_sort_by_column($hasil, 'nilai_hasil');
            $data['nilai'] = $nilai;
            $data['nilai_ahp'] = $nilai_ahp;
            $data['nilai_prioritas'] = $nilai_prioritas;
            $data['hasil'] = $hasil;


            $data['alternatif'] = $this->alternatif_ahp_model->get_all_alternatif()->result();

            $this->load->view('hasil/index_mhs', $data);
        } else {
            $id_pengguna = isset($_GET['id_pengguna']) ? $_GET['id_pengguna'] : '';
            $data['id_pengguna'] = $id_pengguna;

            $data['hasil'] = $this->hasil_model->get_by_nilai($id_pengguna)->result();
            $data['user'] = $this->user_model->get_user($id_pengguna)->row();
            $data['alternatif'] = $this->alternatif_ahp_model->get_all_alternatif()->result();

            $lim = isset($_GET['lim']) ? $_GET['lim'] : '';
            // $lim = 3;
            $data['rek_prod'] = $this->hasil_model->get_rek_prod_by($lim)->result();

            $this->load->view('hasil/index', $data);
        }
        // $this->load->view('hasil/index', $data);
    }

    public function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }


    public function cetak($id_pengguna)
    // public function cetak()
    {
        $data['hasil'] = $this->hasil_model->get_by_nilai($id_pengguna)->result();
        $data['user'] = $this->user_model->get_user($id_pengguna)->row();
        $html = $this->load->view('hasil/cetak', $data, TRUE);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Laporan-hasil-rekomendasi-" . $id_pengguna . ".pdf", array("Attachment" => FALSE));
    }

    public function cetak_per_lim($lim)
    {
        $data['rek_prod'] = $this->hasil_model->get_rek_prod_by($lim)->result();
        $html = $this->load->view('hasil/cetak_semua', $data, TRUE);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Laporan-hasil-rekomendasi.pdf", array("Attachment" => FALSE));
    }
}


/* End of file Hasil.php */
/* Location: ./application/controllers/Hasil.php */