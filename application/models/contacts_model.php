<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class contacts_model extends CI_Model
{
    // get all contacts form db
    public function getAllContacts()
    {
        //if added filtering values
        if(isset($this->session->userdata['s_filters_data']) and $this->session->userdata['s_filters_data'] != NULL and isset($this->session->userdata['s_search_contact'])){

            $this->db->select('*');
            $this->db->from('contacts');
            $condition = '';
            foreach ($this->session->userdata['s_filters_data'] as $value){
                 if ($value->typefilter=='all'){
                     $condition.= "( contact_value LIKE " . "'%" . $value->keyword . "%') OR ";
                 }else{
                 $condition.= "( contact_type =" . "'" . $value->typefilter . "' AND contact_value LIKE " . "'%" . $value->keyword . "%') OR ";
                 }
            }

            $this->db->where(substr($condition,0,-3));
            $this->db->join('users', 'users.user_id = contacts.user_id ');
            $query = $this->db->get();

        }else{

            $this->db->select('*');
            $this->db->from('contacts');
            $this->db->join('users', 'users.user_id = contacts.user_id ');
            $query = $this->db->get();

        }

        if ($query->num_rows() > 0) {

            return $query->result();

        } else {

            return false;
        }
    }
}

?>