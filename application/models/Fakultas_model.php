<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Fakultas_model extends CI_Model
{

    public function get_all_fakultas($sort = 'asc')
    {
        $this->db->order_by('id_fakultas', $sort);
        return $this->db->get('fakultas');
    }

    public function get_fakultas($id_fakultas)
    {
        $this->db->where('id_fakultas', $id_fakultas);
        return $this->db->get('fakultas');
    }

    public function add_fakultas($params)
    {
        return $this->db->insert('fakultas', $params);
    }

    public function update_fakultas($id_fakultas, $params)
    {
        $this->db->where('id_fakultas', $id_fakultas);
        return $this->db->update('fakultas', $params);
    }

    public function delete_fakultas($id_fakultas)
    {
        $this->db->where('id_fakultas', $id_fakultas);
        return $this->db->delete('fakultas');
    }
}

/* End of file Fakultas_model.php */
/* Location: ./application/models/Fakultas_model.php */