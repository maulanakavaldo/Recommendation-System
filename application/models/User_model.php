<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends CI_Model
{

    public function get_all_user($sort = 'asc')
    {
        $this->db->order_by('id_pengguna', $sort);
        return $this->db->get('user');
    }

    public function get_user($id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->get('user');
    }

    public function get_role_pendaftar()
    {
        $this->db->where('role', "user");
        $this->db->join('hasil', 'user.id_pengguna=hasil.id_pengguna ');
        $this->db->group_by('hasil.id_pengguna');
        return $this->db->get('user');
    }

    public function add_user($params)
    {
        return $this->db->insert('user', $params);
    }

    public function update_user($id_pengguna, $params)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->update('user', $params);
    }

    public function delete_user($id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->delete('user');
    }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */