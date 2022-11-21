<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Alternatif extends CI_Controller
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
        $this->load->model('prodi_ahp_model');
        $this->load->model('alternatif_ahp_model');
        $this->load->model('kriteria_model');
    }

    public function index()
    {
        $data['prodi'] = $this->prodi_model->get_all_prodi()->result();
        $data['alternatif'] = $this->alternatif_ahp_model->get_all_prodi()->result();
        $allowed = array('admin');
        if (!in_array($this->session->userdata('role'), $allowed)) {
            // $this->load->view('alternatif/index_mhs', $data);
            $this->load->view('alternatif/index', $data);
        } else {
            $this->load->view('alternatif/index', $data);
        }
    }

    public function tambah()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id_prodi', 'Id Prodi', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('nama_prodi', 'nama Prodi', 'required|alpha');

        $this->form_validation->set_message('required', 'Isi dulu %s');
        $this->form_validation->set_message('alpha_numeric_spaces', '%s hanya boleh huruf dan angka!');
        $this->form_validation->set_message('alpha', '%s hanya boleh huruf');

        if ($this->form_validation->run()) {
            $params = array(
                'id_prodi' => $this->input->post('id_prodi', TRUE),
                'nama_prodi' => $this->input->post('nama_prodi', TRUE),
            );
            $this->prodi_model->add_prodi($params);

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('prodi');
        } else {
            // $this->session->set_flashdata('failure', '<div class="alert alert-danger" role="alert">Data gagal disimpan</div>');
            $this->load->view('prodi/tambah');
        }
    }

    public function ubah($id_prodi = '')
    {
        $data['prodi'] = $this->prodi_model->get_prodi($id_prodi)->row();

        if (empty($data['prodi'])) {
            show_404();
        } else {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('id_prodi', 'Id Prodi', 'required|alpha_numeric');
            $this->form_validation->set_rules('nama_prodi', 'nama Prodi', 'required|alpha');

            $this->form_validation->set_message('required', 'Isi dulu %s');
            $this->form_validation->set_message('alpha_numeric', '%s hanya boleh huruf dan angka!');
            $this->form_validation->set_message('alpha', '%s hanya boleh huruf');

            if ($this->form_validation->run()) {
                $params = array(
                    'id_prodi' => $this->input->post('id_prodi', TRUE),
                    'nama_prodi' => $this->input->post('nama_prodi', TRUE),
                );
                $this->prodi_model->update_prodi($id_prodi, $params);

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
                redirect('prodi');
            } else {
                // $this->session->set_flashdata('failure', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
                $this->load->view('alternatif/ubah', $data);
            }
        }
    }

    public function hapus($id_prodi = '')
    {
        $prodi = $this->prodi_model->get_prodi($id_prodi);

        if ($prodi->num_rows() > 0) {
            $this->prodi_model->delete_prodi($id_prodi);
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil dihapus.</div>');

            redirect('prodi');
        } else {
            $this->session->set_flashdata('failure', '<div class="alert alert-danger" role="alert">Data gagal dihapus.</div>');
            redirect('prodi');
            // show_404();
        }
    }

    public function prioritas()
    {
        $this->load->helper('form');
        $query_kriteria = $this->kriteria_model->get_all_kriteria();
        $data['kriteria'] = $query_kriteria->result();
        $query_prodi = $this->prodi_model->get_all_prodi();
        $data['prodi'] = $query_prodi->result();

        $query_alternatif_prodi = $this->alternatif_ahp_model->get_all_prodi();
        $data['alternatif_prodi'] = $query_alternatif_prodi->result();

        if (isset($_POST['save'])) {
            $this->prodi_ahp_model->delete_prodi_ahp();
            $i = 0;
            foreach ($data['prodi'] as $row1) {
                $ii = 0;
                foreach ($data['prodi'] as $row2) {
                    if ($i < $ii) {
                        $nilai_input = $this->input->post('nilai_' . $row1->id_prodi . '_' . $row2->id_prodi);
                        $nilai_1 = 0;
                        $nilai_2 = 0;
                        if ($nilai_input < 1) {
                            $nilai_1 = abs($nilai_input);
                            $nilai_2 = number_format(1 / abs($nilai_input), 5);
                        } elseif ($nilai_input > 1) {
                            $nilai_1 = number_format(1 / abs($nilai_input), 5);
                            $nilai_2 = abs($nilai_input);
                        } elseif ($nilai_input == 1) {
                            $nilai_1 = 1;
                            $nilai_2 = 1;
                        }
                        $params = array(
                            'id_prodi_1' => $row1->id_prodi,
                            'id_prodi_2' => $row2->id_prodi,
                            'nilai_1' => $nilai_1,
                            'nilai_2' => $nilai_2,
                        );
                        $this->prodi_ahp_model->add_prodi_ahp($params);
                    }
                    $ii++;
                }
                $i++;
            }
            $this->session->set_flashdata('pesan_sukses', '<div class="alert alert-success" role="alert">Nilai perbandingan prodi berhasil disimpan</div>');
        }

        if (isset($_POST['check'])) {
            if ($query_prodi->num_rows() < 3) {
                $this->session->set_flashdata('pesan_error', '<div class="alert alert-danger" role="alert">Jumlah prodi kurang, minimal 3</div>');
            } else {
                $id_kriteria = $this->input->post('id_kriteria', TRUE);
                $this->alternatif_ahp_model->delete_alternatif($id_kriteria);

                $id_prodi = array();
                foreach ($data['prodi'] as $row)
                    $id_prodi[] = $row->id_prodi;

                // perhitungan metode AHP
                $matrik_prodi = $this->ahp_get_matrik_prodi($id_prodi);
                $jumlah_kolom = $this->ahp_get_jumlah_kolom($matrik_prodi);
                $matrik_normalisasi = $this->ahp_get_normalisasi($matrik_prodi, $jumlah_kolom);
                $prioritas = $this->ahp_get_prioritas($matrik_normalisasi);
                $lambda = $this->ahp_get_lambda($prioritas, $jumlah_kolom); //lambdA
                $matrik_baris = $this->ahp_get_matrik_baris($prioritas, $matrik_prodi);
                $jumlah_matrik_baris = $this->ahp_get_jumlah_matrik_baris($matrik_baris);
                $hasil_tabel_konsistensi = $this->ahp_get_tabel_konsistensi($jumlah_matrik_baris, $prioritas);

                if ($this->ahp_uji_konsistensi($hasil_tabel_konsistensi)) {
                    // $this->session->set_flashdata('pesan_sukses', '<div class="alert alert-success" role="alert">Nilai perbandingan : KONSISTEN</div>');
                    $i = 0;

                    foreach ($data['prodi'] as $row) {

                        $params = array(
                            'id_prodi' => $row->id_prodi,
                            'id_kriteria' => $this->input->post('id_kriteria', TRUE),
                            'alt_prioritas' => $prioritas[$i++],
                        );
                        $this->alternatif_ahp_model->add_alternatif_prodi($params);
                    }

                    $data['list_data'] = $this->tampil_data_1($matrik_prodi, $jumlah_kolom);
                    $data['list_data2'] = $this->tampil_data_2($matrik_normalisasi, $prioritas);
                    $data['list_data3'] = $this->tampil_data_3($matrik_baris, $jumlah_matrik_baris);
                    $list_data = $this->tampil_data_4($jumlah_matrik_baris, $prioritas, $hasil_tabel_konsistensi, $lambda, $jumlah_kolom);
                    $data['list_data4'] = $list_data[0];
                    $data['list_data5'] = $list_data[1];
                    $data['list_data6'] = $this->tampil_data_5($prioritas, $jumlah_kolom, $lambda);
                } else {
                    $this->session->set_flashdata('pesan_error', '<div class="alert alert-danger" role="alert">Nilai perbandingan : TIDAK KONSISTEN</div>');
                }
            }
        }

        $result = array();
        $i = 0;
        foreach ($data['prodi'] as $row1) {
            $ii = 0;
            foreach ($data['prodi'] as $row2) {
                if ($i < $ii) {
                    $prodi_ahp = $this->prodi_ahp_model->get_prodi_ahp($row1->id_prodi, $row2->id_prodi)->row();
                    if (empty($prodi_ahp)) {
                        $params = array(
                            'id_prodi_1' => $row1->id_prodi,
                            'id_prodi_2' => $row2->id_prodi,
                            'nilai_1' => 1,
                            'nilai_2' => 1,
                        );
                        $this->prodi_ahp_model->add_prodi_ahp($params);
                        $nilai_1 = 1;
                        $nilai_2 = 1;
                    } else {
                        $nilai_1 = $prodi_ahp->nilai_1;
                        $nilai_2 = $prodi_ahp->nilai_2;
                    }
                    $nilai = 0;
                    if ($nilai_1 < 1) {
                        $nilai = $nilai_2;
                    } elseif ($nilai_1 > 1) {
                        $nilai = -$nilai_1;
                    } elseif ($nilai_1 == 1) {
                        $nilai = 1;
                    }
                    $result[$row1->id_prodi][$row2->id_prodi] = $nilai;
                }
                $ii++;
            }
            $i++;
        }

        $data['prodi_ahp'] = $result;
        $this->load->view('alternatif/prioritas', $data);
    }

    public function reset()
    {
        $this->prodi_ahp_model->delete_prodi_ahp();
        $params = array(
            'prioritas' => null,
        );
        $this->prodi_model->update_prioritas($params);
        redirect('alternatif/prioritas');
    }

    // --- metode AHP --- START
    public function ahp_get_matrik_prodi($prodi)
    {
        $matrik = array();
        $i = 0;
        foreach ($prodi as $row1) {
            $ii = 0;
            foreach ($prodi as $row2) {
                if ($i == $ii) {
                    $matrik[$i][$ii] = 1;
                } else {
                    if ($i < $ii) {
                        $prodi_ahp = $this->prodi_ahp_model->get_prodi_ahp($row1, $row2)->row();
                        if (empty($prodi_ahp)) {
                            $matrik[$i][$ii] = 1;
                            $matrik[$ii][$i] = 1;
                        } else {
                            $matrik[$i][$ii] = $prodi_ahp->nilai_1;
                            $matrik[$ii][$i] = $prodi_ahp->nilai_2;
                        }
                    }
                }
                $ii++;
            }
            $i++;
        }
        return $matrik;
    }

    public function ahp_get_jumlah_kolom($matrik)
    {
        $jumlah_kolom = array();
        for ($i = 0; $i < count($matrik); $i++) {
            $jumlah_kolom[$i] = 0;
            for ($ii = 0; $ii < count($matrik); $ii++) {
                $jumlah_kolom[$i] = $jumlah_kolom[$i] + $matrik[$ii][$i];
            }
        }
        return $jumlah_kolom;
    }



    public function ahp_get_normalisasi($matrik, $jumlah_kolom)
    {
        $matrik_normalisasi = array();
        for ($i = 0; $i < count($matrik); $i++) {
            for ($ii = 0; $ii < count($matrik); $ii++) {
                $matrik_normalisasi[$i][$ii] = number_format($matrik[$i][$ii] / $jumlah_kolom[$ii], 5);
            }
        }
        return $matrik_normalisasi;
    }

    public function ahp_get_prioritas($matrik_normalisasi)
    {
        $prioritas = array();
        for ($i = 0; $i < count($matrik_normalisasi); $i++) {
            $prioritas[$i] = 0;
            for ($ii = 0; $ii < count($matrik_normalisasi); $ii++) {
                $prioritas[$i] = $prioritas[$i] + $matrik_normalisasi[$i][$ii];
            }
            $prioritas[$i] = number_format($prioritas[$i] / count($matrik_normalisasi), 5); //Matriks Nilai Prodi (Normalisasi) kolom prioritas
        }
        return $prioritas;
    }

    public function ahp_get_matrik_baris($prioritas, $matrik_prodi)
    {
        $matrik_baris = array();
        for ($i = 0; $i < count($matrik_prodi); $i++) {
            for ($ii = 0; $ii < count($matrik_prodi); $ii++) {
                $matrik_baris[$i][$ii] = number_format($prioritas[$ii] * $matrik_prodi[$i][$ii], 5);
            }
        }
        return $matrik_baris;
    }

    // rata-rata baris dikali jmlah kolom
    // copy dari ahp_get_matrik_baris
    public function ahp_get_lambda($prioritas, $jumlah_kolom) //$tabel_konsistensi)
    {
        $matrik_lamb = array();
        for ($i = 0; $i < count($jumlah_kolom); $i++) {
            $matrik_lamb[$i] = number_format($prioritas[$i] * $jumlah_kolom[$i], 5);
        }
        $jumlah = 0;
        for ($i = 0; $i < count($jumlah_kolom); $i++) {
            $jumlah += $matrik_lamb[$i];
        }
        return $jumlah;
    }

    public function ahp_get_lambda_2($prioritas, $jumlah_kolom)
    {
        $matrik_lamb = array();
        for ($i = 0; $i < count($jumlah_kolom); $i++) {
            $matrik_lamb[$i] = number_format($prioritas[$i] * $jumlah_kolom[$i], 5);
        }
        return $matrik_lamb;
    }

    public function ahp_get_jumlah_matrik_baris($matrik_baris)
    {
        $jumlah_baris = array();
        for ($i = 0; $i < count($matrik_baris); $i++) {
            $jumlah_baris[$i] = 0;
            for ($ii = 0; $ii < count($matrik_baris); $ii++) {
                $jumlah_baris[$i] = $jumlah_baris[$i] + $matrik_baris[$i][$ii];
            }
        }
        return $jumlah_baris;
    }

    public function ahp_get_tabel_konsistensi($jumlah_matrik_baris, $prioritas)
    {
        $jumlah = array();
        for ($i = 0; $i < count($jumlah_matrik_baris); $i++) {
            $jumlah[$i] = $jumlah_matrik_baris[$i] + $prioritas[$i];
        }
        return $jumlah;
    }

    public function ahp_uji_konsistensi($tabel_konsistensi)
    {
        $jumlah = array_sum($tabel_konsistensi);
        $n = count($tabel_konsistensi);
        $lambda_maks = $jumlah / $n;
        $ci = ($lambda_maks - $n) / ($n - 1);
        $ir = array(0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59);
        if ($n <= 15) {
            $ir = $ir[$n - 1];
        } else {
            $ir = $ir[14];
        }
        $cr = number_format($ci / $ir, 5);

        if ($cr <= 0.1) {
            return true;
            $this->session->set_flashdata('pesan_sukses', '<div class="alert alert-success" role="alert">Nilai perbandingan : KONSISTEN</div>');
        } else {
            return false;
        }
    }


    // --- metode AHP --- END

    // --- untuk menampilkan langkah perhitungan ---
    public function tampil_data_1($matrik_prodi, $jumlah_kolom)
    {
        $prodi = $this->prodi_model->get_all_prodi()->result();
        // --- tabel matriks perbandingan berpasangan
        $list_data = '';
        $list_data .= '<tr><td></td>';
        foreach ($prodi as $row) {
            $list_data .= '<td class="text-center">' . $row->nama_prodi . '</td>';
        }
        $list_data .= '</tr>';
        $i = 0;
        foreach ($prodi as $row) {
            $list_data .= '<tr>';
            $list_data .= '<td>' . $row->nama_prodi . '</td>';
            $ii = 0;
            foreach ($prodi as $row2) {
                $list_data .= '<td class="text-center">' . $matrik_prodi[$i][$ii] . '</td>';
                $ii++;
            }
            $list_data .= '</tr>';
            $i++;
        }
        $list_data .= '<tr><td class="font-weight-bold">Jumlah</td>';
        for ($i = 0; $i < count($jumlah_kolom); $i++) {
            $list_data .= '<td class="text-center font-weight-bold">' . $jumlah_kolom[$i] . '</td>';
        }
        $list_data .= '</tr>';
        // ---
        return $list_data;
    }

    public function tampil_data_2($matrik_normalisasi, $prioritas)
    {
        $prodi = $this->prodi_model->get_all_prodi()->result();
        // --- matriks nilai prodi
        $list_data2 = '';
        $list_data2 .= '<tr><td></td>';
        foreach ($prodi as $row) {
            $list_data2 .= '<td class="text-center">' . $row->nama_prodi . '</td>';
        }
        $list_data2 .= '<td class="text-center font-weight-bold">Jumlah</td>';
        $list_data2 .= '<td class="text-center font-weight-bold">Prioritas</td>';
        $list_data2 .= '</tr>';
        $i = 0;
        foreach ($prodi as $row) {
            $list_data2 .= '<tr>';
            $list_data2 .= '<td>' . $row->nama_prodi . '</td>';
            $jumlah = 0;
            $ii = 0;
            foreach ($prodi as $row2) {
                $list_data2 .= '<td class="text-center">' . $matrik_normalisasi[$i][$ii] . '</td>';
                $jumlah += $matrik_normalisasi[$i][$ii];
                $ii++;
            }
            $list_data2 .= '<td class="text-center font-weight-bold">' . $jumlah . '</td>';
            $list_data2 .= '<td class="text-center font-weight-bold">' . $prioritas[$i] . '</td>';
            $list_data2 .= '</tr>';
            $i++;
        }
        // ---
        return $list_data2;
    }

    public function tampil_data_3($matrik_baris, $jumlah_matrik_baris)
    {
        $prodi = $this->prodi_model->get_all_prodi()->result();
        // --- matriks penjumlahan setiap baris
        $list_data3 = '';
        $list_data3 .= '<tr><td></td>';
        foreach ($prodi as $row) {
            $list_data3 .= '<td class="text-center">' . $row->nama_prodi . '</td>';
        }
        $list_data3 .= '<td class="text-center font-weight-bold">Jumlah</td>';
        $list_data3 .= '</tr>';
        $i = 0;
        foreach ($prodi as $row) {
            $list_data3 .= '<tr>';
            $list_data3 .= '<td>' . $row->nama_prodi . '</td>';
            $ii = 0;
            foreach ($prodi as $row2) {
                $list_data3 .= '<td class="text-center">' . $matrik_baris[$i][$ii] . '</td>';
                $ii++;
            }
            $list_data3 .= '<td class="text-center font-weight-bold">' . $jumlah_matrik_baris[$i] . '</td>';
            $list_data3 .= '</tr>';
            $i++;
        }
        // ---
        return $list_data3;
    }

    public function tampil_data_4($jumlah_matrik_baris, $prioritas, $hasil_tabel_konsistensi, $lambda, $jumlah_kolom)
    {
        $prodi = $this->prodi_model->get_all_prodi()->result();
        // --- perhitungan rasio konsistensi
        $list_data4 = '';
        $list_data4 .= '<tr><td></td>';
        $list_data4 .= '<td class="text-center">Jumlah per Baris</td>';
        $list_data4 .= '<td class="text-center">Prioritas</td>';
        $list_data4 .= '<td class="text-center font-weight-bold">Hasil</td>';
        $list_data4 .= '</tr>';
        $i = 0;
        foreach ($prodi as $row) {
            $list_data4 .= '<tr>';
            $list_data4 .= '<td>' . $row->nama_prodi . '</td>';
            $list_data4 .= '<td class="text-center">' . $jumlah_matrik_baris[$i] . '</td>';
            $list_data4 .= '<td class="text-center">' . $prioritas[$i] . '</td>';
            $list_data4 .= '<td class="text-center font-weight-bold">' . $hasil_tabel_konsistensi[$i] . '</td>';
            $list_data4 .= '</tr>';
            $i++;
        }
        // $jumlah = array_sum($hasil_tabel_konsistensi);
        $n = count($jumlah_kolom);
        // $lambda_maks =  $jumlah / $n;
        $lambda_maks = $lambda;
        $ci = ($lambda_maks - $n) / ($n - 1);
        $ir = array(0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59);
        if ($n <= 15) {
            $ir = $ir[$n - 1];
        } else {
            $ir = $ir[14];
        }
        $cr = number_format($ci / $ir, 5);

        $list_data5 = '';
        $list_data5 .= '<table class="table">
        <!--<tr>
            <td width="100">Jumlah</td>
            <td>= ' . //$jumlah . 
            '</td> 
        </tr> -->
        <tr>
            <td width="100">n Prodi</td>
            <td>= ' . $n . '</td>
        </tr>
        <tr>
            <td width="100">λ Maks</td>
            <td>= ' . number_format($lambda_maks, 5) . '</td>
        </tr>
        <tr>
            <td width="100">CI</td>
            <td>= ' . number_format($ci, 5) . '</td>
        </tr>
        <tr>
            <td width="100">CR</td>
            <td>= ' . $cr . '</td>
        </tr>
        <tr>
            <td width="100">CR <= 0.1</td>';
        if ($cr <= 0.1) {
            $list_data5 .= '
            <td class="alert alert-success">KONSISTEN</td>';
            $this->session->set_flashdata('pesan_sukses', '<div class="alert alert-success" role="alert">Nilai perbandingan : KONSISTEN</div>');
        } else {
            $list_data5 .= '
            <td class="alert alert-danger">TIDAK KONSISTEN</td>';
            // <td>Tidak Konsisten</td>';
        }
        $list_data5 .= '
        </tr>
        </table>';
        // ---
        return array($list_data4, $list_data5);
    }
    // -------

    public function tampil_data_5($prioritas, $jumlah_kolom, $lambda)
    {
        $prodi = $this->prodi_model->get_all_prodi()->result();
        // --- perhitungan rasio konsistensi
        $list_data6 = '';
        $list_data6 .= '<tr><td></td>';
        foreach ($prodi as $row) {
            $list_data6 .= '<td class="text-center">' . $row->nama_prodi . '</td>';
        }
        $list_data6 .= '</tr>';
        $list_data6 .= '<tr><td class="font-weight-bold">Jumlah Nilai Kolom</td>';
        for ($i = 0; $i < count($jumlah_kolom); $i++) {
            $list_data6 .= '<td class="text-center font-weight-bold">' . $jumlah_kolom[$i] . '</td>';
        }
        $list_data6 .= '<tr><td class="font-weight-bold">Prioritas</td>';
        for ($i = 0; $i < count($jumlah_kolom); $i++) {
            $list_data6 .= '<td class="text-center font-weight-bold">' . $prioritas[$i] . '</td>';
        }
        $list_data6 .= '<tr><td class="font-weight-bold">Lambda</td>';

        //-------------------------------------------------------------
        // for ($i = 0; $i < count($jumlah_kolom); $i++) {
        //     $list_data6 .= '<td class="text-center font-weight-bold">' . $lambda[$i] . '</td>';
        // }
        // ----------------------------------------------------------
        // $jumlah = 0;
        // for ($i = 0; $i < count($jumlah_kolom); $i++) {
        //     $jumlah += $lambda[$i];
        // }
        //-------------------------------------------------------------
        $list_data6 .= '<td class="text-center font-weight-bold">' . $lambda . '</td>';
        $list_data6 .= '</tr>';
        // ---
        return $list_data6;
    }
}


/* End of file Alternatif.php */
/* Location: ./application/controllers/Alternatif.php */