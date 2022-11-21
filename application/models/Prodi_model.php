<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Prodi_model extends CI_Model
{

    public function get_all_prodi($sort = 'asc', $id_pengguna = '')
    // public function get_all_prodi($sort = 'asc') //tanpa periode
    {
        $this->db->order_by('id_prodi', $sort);
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas');
        return $this->db->get('prodi');
    }

    public function get_prodi($id_prodi)
    {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas', 'left');
        return $this->db->get('prodi');
    }

    public function add_prodi($params)
    {
        return $this->db->insert('prodi', $params);
    }

    public function update_prodi($id_prodi, $params)
    {
        $this->db->where('id_prodi', $id_prodi);
        return $this->db->update('prodi', $params);
    }

    public function delete_prodi($id_prodi)
    {
        $this->db->where('id_prodi', $id_prodi);
        return $this->db->delete('prodi');
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