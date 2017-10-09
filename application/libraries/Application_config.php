<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class application_config {

   protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    function __construct(){
        $this->CI =& get_instance();
    }

    //get header
    public function header(){

        //config page
        $data['fullname'] =( $this->CI->session->userdata['s_username']);

        $this->CI->load->view('header_view',$data);

    }
}