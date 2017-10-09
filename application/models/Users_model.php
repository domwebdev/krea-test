<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Users_model extends CI_Model
{


    //Login based on form
    public function login($data)
    {
        $condition = "Login =" . "'" . $data['Login'] . "' AND " . "Password =" . "'" . Encode($data['Password']) . "'";
        $this->db->select('*');
        $this->db->from('Users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return false;
        }
    }

    // Select all data of user from database
    public function readUserInformation($login)
    {
        $condition = "Login =" . "'" . $login . "'";
        $this->db->select('*');
        $this->db->from('Users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}


?>