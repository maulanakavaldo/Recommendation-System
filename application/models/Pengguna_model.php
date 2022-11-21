<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pengguna_model extends CI_Model
{

    public function get_all_pengguna($sort = 'asc')
    {
        $this->db->order_by('id_pengguna', $sort);
        return $this->db->get('user');
    }

    public function get_pengguna($id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->get('user');
    }

    public function add_pengguna($params)
    {
        return $this->db->insert('user', $params);
    }

    public function update_pengguna($id_pengguna, $params)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->update('user', $params);
    }

    public function delete_pengguna($id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->delete('user');
    }

    public function get_by_username($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('user');
    }

    public function get_by_user_name($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('user');
    }

    public function cek_unik_username($username, $username_tmp)
    {
        $this->db->where('username', $username);
        $this->db->where('username <>', $username_tmp);
        return $this->db->get('user');
    }
    public function cek_username($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('user');
    }
}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */