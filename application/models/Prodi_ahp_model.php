<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Prodi_ahp_model extends CI_Model
{

    public function get_prodi_ahp($id_prodi_1, $id_prodi_2)
    {
        $this->db->where('id_prodi_1', $id_prodi_1);
        $this->db->where('id_prodi_2', $id_prodi_2);
        return $this->db->get('prodi_ahp');
    }

    public function add_prodi_ahp($params)
    {
        return $this->db->insert('prodi_ahp', $params);
    }

    public function update_prodi_ahp($id_prodi_1, $id_prodi_2, $params)
    {
        $this->db->where('id_prodi_1', $id_prodi_1);
        $this->db->where('id_prodi_2', $id_prodi_2);
        return $this->db->update('prodi_ahp', $params);
    }

    public function delete_prodi_ahp()
    {
        return $this->db->empty_table('prodi_ahp');
    }
}

/* End of file Prodi_ahp_model.php */
/* Location: ./application/models/Prodi_ahp_model.php */