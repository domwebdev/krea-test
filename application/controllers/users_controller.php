<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users_controller extends CI_Controller {


    public function __construct(){
        parent::__construct();

        // Load model
        $this->load->model('Users_model');
    }

    //Index page (This is a Login Page)
    public function index()
    {
        if(isset($this->session->userdata['s_lang']) != NULL){

            $lang = $this->session->userdata['s_lang'];

        }else{

            $lang = 'en';
            $newdata = array(
                's_login' => '',
                's_lang' => $lang,
                's_logged_in' => false
            );
            $this->session->set_userdata($newdata);
            $lang = $this->session->userdata['s_lang'];
        }

        $this->lang->load($lang,$lang);

        $this->load->view('users/login_view');
    }

    //Header
    public function header(){
        //library of application_config
        $this->application_config->header();
    }

    //Page of Login
    public function login()
    {
        if(isset($this->session->userdata['s_lang']) != NULL){

            $lang = $this->session->userdata['s_lang'];

        }else{

            $lang = 'en';
            $newdata = array(
                's_login' => '',
                's_lang' => $lang,
                's_logged_in' => false
            );
            $this->session->set_userdata($newdata);
            $lang = $this->session->userdata['s_lang'];
        }

        $this->lang->load($lang,$lang);
        $this->load->view('users/login_view');
    }

    //Dashboard Page
    public function dashboard()
    {
        $this->load->model('contacts_model');

        $this->header();

        $data['controller_users'] = $this;
        //$this->session->userdata['s_search_contact'] = false ;

        //Add to filter data
        if($this->input->post('do') == 'add_to_filter'){

            $ids=$this->input->post('ids');
            $filter_data= new stdClass();
            $filter_data->id=$ids;
            $filter_data->keyword=$_POST["f_keyword"];
            $filter_data->typefilter=$_POST["f_type_filter"];

            //add filter data to session
            $this->session->userdata['s_filters_data'][$ids]= $filter_data;

        }

        //delete filters data
        if($this->input->post('do')=="delete"){

            $ids=$this->input->post('ids');
            //delete filter data from session
            unset($this->session->userdata['s_filters_data'][$ids]);
        }

        //search data
        if($this->input->post('do')=="search"){

            $this->session->userdata['s_search_contact'] = true ;
        }

        $data['contacts'] = $this->contacts_model->getAllContacts();

        $this->load->view('users/dashboard_view',$data);
    }

    //Function  user login process  based on Form
    public function userLoginProcess()
    {
        // Retrieve session data
        if(isset($this->session->userdata['s_lang']) != NULL){

            $lang = $this->session->userdata['s_lang'];
        }else{

            $lang = 'en';
        }

        $newdata = array(
            's_login' => '',
            's_lang' => $lang,
            's_logged_in' => false
        );
        $this->session->set_userdata($newdata);

        $this->lang->load($this->session->userdata['s_lang'],$this->session->userdata['s_lang']);

        if ($this->input->post('do') == "login") {

            // Check for remember_me data in retrieved session data
            $this->form_validation->set_rules('f_login', 'Username', 'trim|required');
            $this->form_validation->set_rules('f_pass', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

            } else {

                $data['non_xss'] = array(

                    'Login' => $this->input->post('f_login'),
                    'Password' => $this->input->post('f_pass'),
                );
                $data['xss_data'] = $this->security->xss_clean($data['non_xss']);
                $result1 = $this->Users_model->login($data['xss_data']);

                if ($result1 == TRUE ) {

                    //get user information
                    $login = $this->input->post('f_login');
                    $db_data = $this->Users_model->readUserInformation($login);

                    //set session
                    $newdata = array(
                        's_login' => $db_data[0]->user_id,
                        's_username' => $db_data[0]->login,
                        's_remember' => $this->input->post('f_remember'),
                        's_logged_in' => TRUE
                    );

                    $this->session->set_userdata($newdata);

                    redirect('dashboard','refresh');

                }else{

                    $this->session->set_flashdata('error_messages', lang('forgot_text_1'));
                    redirect(base_url(), 'refresh');
                }
            }
        }
    }

    //Function  Logout
    public function logout()
    {
        if( $this->session->userdata['s_remember']!= 1){

            $sess_array = array(
                's_login' => '',
                's_username' => '' ,
                's_remember' => '',
                's_logged_in' => FALSE
            );

            $this->session->unset_userdata($sess_array);
            $this->session->sess_destroy();

            redirect( base_url(), 'refresh');
        }else{

            redirect(base_url(), 'refresh');
        }
    }

}
?>