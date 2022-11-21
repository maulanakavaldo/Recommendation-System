<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Prodi_kriteria_model extends CI_Model
{

    public function get_prodi_kriteria($id_prodi, $id_kriteria)
    {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('prodi_kriteria');
    }

    public function add_prodi_kriteria($params2)
    {
        return $this->db->insert('prodi_kriteria', $params2);
    }

    public function update_prodi_kriteria($id_prodi, $id_kriteria, $params)
    {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->update('prodi_kriteria', $params);
    }

    public function get_all_prodi_kriteria()
    {
        return $this->db->get('prodi_kriteria');
    }

    public function update_by_id($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('prodi_kriteria', $params);
    }
}

/* End of file Prodi_kriteria_model.php */
/* Location: ./application/models/Prodi_kriteria_model.php */