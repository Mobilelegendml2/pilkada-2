<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller{
    public $data = array();
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('admin_model');
    }
    
    function index()
    {
        $sesi=$this->session->userdata('username');
        if($sesi=='')
        {
            $this->load->view('admin/login');
        }
        else
        {
            redirect('http://localhost/pilkada/index.php/admin');
        }

    }
    
    function verifikasi(){
        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
        if($this->form_validation->run() == FALSE){
	     //Field validation failed.  User redirected to login page
            redirect('http://localhost/pilkada/index.php/login');
        }
        else{
	    //Go to private area
            $this->session->set_userdata('username',$this->input->post('username'));
            redirect('http://localhost/pilkada/index.php/admin');
        }
    }
    
    function check_database($password){
	   //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
	   //query the database
        $result = $this->admin_model->login($username, $password);
        if($result){
            return true;
        }
        else{
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
    
    function logout(){
        //$this->session->unset_userdata($data);
        $this->session->unset_userdata('username');
        session_destroy();
        //$this->load->view('login_view');
        redirect('http://localhost/pilkada/index.php/home');
    }
    
}
