<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Hasil_model extends CI_Model
{

    public function get_all_hasil($sort = 'DESC', $id_pengguna = '')
    {
        $this->db->order_by('nilai_hasil', $sort);
        $this->db->join('prodi', 'prodi.id_prodi=hasil.id_prodi', 'left');
        if (!empty($id_pengguna)) {
            $this->db->where('hasil.id_pengguna', $id_pengguna);
        }
        return $this->db->get('hasil');
    }

    public function get_by_nilai($id_pengguna)
    {
        $this->db->order_by('nilai_hasil', 'desc');
        $this->db->join('prodi', 'prodi.id_prodi=hasil.id_prodi', 'left');
        $this->db->join('user', 'user.id_pengguna=hasil.id_pengguna', 'left');
        $this->db->join('fakultas', 'prodi.id_fakultas=fakultas.id_fakultas', 'left');
        $this->db->where('hasil.id_pengguna', $id_pengguna);
        return $this->db->get('hasil');
    }

    public function add_hasil($params)
    {
        return $this->db->insert('hasil', $params);
    }

    public function delete_hasil($id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->delete('hasil');
    }

    public function get_rek_prod()
    {
        $this->db->select('user.nama_lengkap AS nama,nama_prodi,nama_fakultas,nilai_hasil')
            ->from('(SELECT user.nama_lengkap, prodi.nama_prodi, fakultas.nama_fakultas, hasil.nilai_hasil, 
            ROW_NUMBER() OVER (PARTITION BY user.nama_lengkap ORDER BY CAST(hasil.nilai_hasil AS FLOAT) DESC) AS rn 
            FROM hasil  
            JOIN prodi ON hasil.id_prodi    = prodi.id_prodi
            JOIN `user` ON hasil.id_pengguna = user.id_pengguna
            JOIN fakultas ON fakultas.id_fakultas = prodi.id_fakultas
            ORDER BY user.nama_lengkap) `user`')
            ->order_by('user.nama_lengkap ASC, rn ASC');
        return $this->db->get();
    }

    public function get_rek_prod_by($lim)
    {
        $this->db->select('user.nama_lengkap AS nama,nama_prodi,nama_fakultas,nilai_hasil')
            ->from('(SELECT user.nama_lengkap, prodi.nama_prodi, fakultas.nama_fakultas, hasil.nilai_hasil, 
            ROW_NUMBER() OVER (PARTITION BY user.nama_lengkap ORDER BY CAST(hasil.nilai_hasil AS FLOAT) DESC) AS rn 
            FROM hasil  
            JOIN prodi ON hasil.id_prodi    = prodi.id_prodi
            JOIN `user` ON hasil.id_pengguna = user.id_pengguna
            JOIN fakultas ON fakultas.id_fakultas = prodi.id_fakultas
            ORDER BY user.nama_lengkap) `user`')
            ->order_by('user.nama_lengkap ASC, rn ASC')
            ->where('rn >=', 1)
            ->where('rn <=', $lim);
        return $this->db->get();
    }

    function datasama($id_pengguna)
    {
        $this->db->where('hasil.id_pengguna', $id_pengguna);
        return $this->db->get('hasil');
    }
}

/* End of file Hasil_model.php */
/* Location: ./application/models/Hasil_model.php */