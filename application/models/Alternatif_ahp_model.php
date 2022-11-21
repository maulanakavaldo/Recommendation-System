<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Alternatif_ahp_model extends CI_Model
{

    public function get_all_prodi()
    // public function get_all_prodi($sort = 'asc') //tanpa periode
    {
        $this->db->order_by('alternatif_prodi.id_prodi');
        $this->db->join('prodi', 'prodi.id_prodi=alternatif_prodi.id_prodi');

        return $this->db->get('alternatif_prodi');
    }

    public function get_alternatif_prodi($id_prodi, $id_kriteria)
    {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('alternatif_prodi');
    }
    public function get_all_alternatif()
    {
        $this->db->select('prodi.nama_prodi ,SUM(kriteria.`krit_prioritas` * alternatif_prodi.`alt_prioritas`) AS total')
            ->from('prodi')
            ->join('alternatif_prodi', 'prodi.id_prodi = alternatif_prodi.id_prodi')
            ->join('kriteria', 'kriteria.`id_kriteria` = alternatif_prodi.`id_kriteria`')
            ->group_by('prodi.nama_prodi')
            ->order_by('total DESC')
            ->get();
        return $this->db->get('prodi');
    }

    public function get_prodi($id_prodi)
    {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas', 'left');
        return $this->db->get('prodi');
    }

    public function add_alternatif_prodi($params)
    {
        return $this->db->insert('alternatif_prodi', $params);
    }

    public function update_prodi($id_prodi, $params)
    {
        $this->db->where('id_prodi', $id_prodi);
        return $this->db->update('prodi', $params);
    }

    public function delete_alternatif($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->delete('alternatif_prodi');
    }

    public function get_faperta()
    {
        $this->db->where('nama_fakultas', "Fakultas Pertanian");
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas ');
        return $this->db->get('prodi');
    }

    public function get_fkh()
    {
        $this->db->where('nama_fakultas', "Fakultas Kedokteran Hewan");
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas ');
        return $this->db->get('prodi');
    }

    public function get_fpik()
    {
        $this->db->where('nama_fakultas', "Fakultas Perikanan");
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas ');
        return $this->db->get('prodi');
    }

    public function get_fkl()
    {
        $this->db->where('nama_fakultas', "Fakultas Kehutanan dan Lingkungan");
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas ');
        return $this->db->get('prodi');
    }

    public function get_fateta()
    {
        $this->db->where('nama_fakultas', "Fakultas Teknologi Pertanian");
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas ');
        return $this->db->get('prodi');
    }

    public function get_fmipa()
    {
        $this->db->where('nama_fakultas', "Fakultas Matematika dan Ilmu Pengetahuan Alam");
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas ');
        return $this->db->get('prodi');
    }

    public function get_fem()
    {
        $this->db->where('nama_fakultas', "Fakultas Ekonomi dan Manajemen");
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas ');
        return $this->db->get('prodi');
    }

    public function get_fema()
    {
        $this->db->where('nama_fakultas', "Fakultas Ekologi Manusia");
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas ');
        return $this->db->get('prodi');
    }

    public function get_sb()
    {
        $this->db->where('nama_fakultas', "Sekolah Bisnis");
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas ');
        return $this->db->get('prodi');
    }
}

/* End of file Prodi_model.php */
/* Location: ./application/models/Prodi_model.php */