<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI
class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //$this->check_isvalidated();
        $this->load->library('session');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('admin_model','',TRUE);
        $this->load->helper(array('form', 'url','date'));
    }

    function index()
    {
        if($this->session->userdata('username') == '') redirect ('login');
        
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/index');
        $this->load->view('admin/templates/footer');
    }
        
    function login()
    {
        $this->load->view('admin/login');
        //redirect('login');
    }


    function kandidat()
    {
        if($this->session->userdata('username') == '') redirect ('login');
        
        $kandidat = $this->admin_model->kandidat() == false ? '' : $this->admin_model->kandidat();
        $data = array('kandidat' => $kandidat);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/kandidat',$data);
        $this->load->view('admin/templates/footer');
    }
        
    function edit_kandidat()
    {
        if($this->session->userdata('username') == '') redirect ('login');
        
        $id = $this->input->post('id');
        $cagub = $this->input->post('cagub');
        $cawagub = $this->input->post('cawagub');
        $julukan = $this->input->post('julukan');
        $sekilas = $this->input->post('sekilas');
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');

        $this->admin_model->aksi_edit_kandidat($id,$cagub,$cawagub,$julukan,$sekilas,$visi,$misi);
    }

    function daftar_pemilih()
    {
        if($this->session->userdata('username') == '') redirect ('login');
        
        $pemilih = $this->admin_model->get_data_pemilih() == false ? '' : $this->admin_model->get_data_pemilih();
        $data = array('pemilih' => $pemilih);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/daftar_pemilih',$data);
        $this->load->view('admin/templates/footer');
    }
    
    function hasil_polling()
    {
        if($this->session->userdata('username') == '') redirect ('login');
        $kota = $this->admin_model->get_kota()==false? '' : $this->admin_model->get_kota();
        $suara = $this->admin_model->get_suara_all() == false ? '' : $this->admin_model->get_suara_all();
        //$suara_kota = $this->admin_model->get_suara_kota($id) == false ? '' : $this->admin_model->get_suara_kota($id);
        $jum_kandidat = count($suara);
        $data = array ('suara' => $suara,'kota'=>$kota);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/hasil_polling',$data);
        $this->load->view('admin/templates/footer');
        
    }
        
    function detail_suara()
    {
        $suara = $this->admin_model->get_suara_all() == false ? '' : $this->admin_model->get_suara_all();
        echo json_encode($suara);
    }
    
    function detail_suara_kota()
    {
        $id = $this->input->get('id');
        $suara_kota = $this->admin_model->get_suara_kota($id) == false ? '' : $this->admin_model->get_suara_kota($id);
        echo json_encode($suara_kota);
    }
}