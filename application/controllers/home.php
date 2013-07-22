<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

	function __construct(){
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('home_model','',TRUE);
        $this->load->helper(array('form', 'url','date'));
	}

	function index(){

		$judul_berita = $this->home_model->get_judul_beritaterkini()==false ? '' : $this->home_model->get_judul_beritaterkini();
		$berita_depan = $this->home_model->get_berita_depan()==false ? '' : $this->home_model->get_berita_depan();
		$data = array( 
			'judul_berita' => $judul_berita,
			'berita_depan' => $berita_depan
		);
		$this->load->view('public/templates/header');
		$this->load->view('public/templates/banner');
		$this->load->view('public/index',$data);
		$this->load->view('public/templates/footer');
			
	}

	function berita(){
		$id = $this->input->get('id');
		$judul_berita = $this->home_model->get_judul_beritaterkini()==false ? '' : $this->home_model->get_judul_beritaterkini();
		$detail_berita = $this->home_model->get_detail_berita($id) ? $this->home_model->get_detail_berita($id) : '';
		$data = array(
			'judul_berita' => $judul_berita,
			'detail_berita'=> $detail_berita
		);
		$this->load->view('public/templates/header');
		$this->load->view('public/templates/banner');
		$this->load->view('public/berita',$data);
		$this->load->view('public/templates/footer');
			
	}

	function profile(){
                $kandidat = $this->home_model->get_sekilas_kandidat()==false? '' :  $this->home_model->get_sekilas_kandidat();
                $judul_berita = $this->home_model->get_judul_beritaterkini()==false ? '' : $this->home_model->get_judul_beritaterkini();
                $data = array (
                            'judul_berita'  => $judul_berita,
                            'kandidat'      => $kandidat
                        );
		$this->load->view('public/templates/header');
		$this->load->view('public/templates/banner');
		$this->load->view('public/profile',$data);
		$this->load->view('public/templates/footer');
	}

        function kandidat(){
            
        }
        
	function polling(){
            $kandidat = $this->home_model->get_sekilas_kandidat()==false? '' :  $this->home_model->get_sekilas_kandidat();
            $kota = $this->home_model->get_kota()==false? '' : $this->home_model->get_kota();
		$header = array('css' => array('bootstrap-datepicker'));
                $data = array (
                            'kandidat'      => $kandidat,
                            'kota'          => $kota
                        );
		$this->load->view('public/templates/header',$header);
		$this->load->view('public/templates/banner');
		$this->load->view('public/polling',$data);
		$this->load->view('public/templates/footer');
	}

	function input_pemilih(){

		$nik = $this->input->post('nik');
		$name = $this->input->post('name');
		$date = $this->input->post('date');
		$city = $this->input->post('city');

		$this->home_model->input_pemilih($nik,$name,$date,$city);
		
	}

	function get_suara(){
            $a = $this->input->get('x');
            $b = $this->input->get('y');
            $c = $this->input->get('z');
            $suara1=$this->home_model->get_suara_satu();
            $suara2=$this->home_model->get_suara_dua();
            $suara3=$this->home_model->get_suara_tiga();
            
            while(true){
                $suara1=$this->home_model->get_suara_satu();
                $suara2=$this->home_model->get_suara_dua();
                $suara3=$this->home_model->get_suara_tiga();
                if(($a!=$suara1) || ($b!=$suara2) || ($c!=$suara3)){
                    $suara = array ('succes' => true, 'satu'=>$suara1,'dua'=>$suara2,'tiga'=>$suara3);
                    echo json_encode($suara);
                    return;
                }
                sleep(1);
            }
            
            
	}
        
        function get_suaraa(){
            $a = $this->input->get('x');
            $b = $this->input->get('y');
            $c = $this->input->get('z');
            $suara1=$this->home_model->get_suara_satu();
            $suara2=$this->home_model->get_suara_dua();
            $suara3=$this->home_model->get_suara_tiga();
            
            $this->output->set_header('Content-type: application/json');
            $suara = array ('satu'=>$suara1,'dua'=>$suara2,'tiga'=>$suara3);
            echo json_encode($suara);
	}
        
        function cek_user_voted(){
            $nik = trim($this->input->post('nik'));
            $status0  = $this->home_model->cek_user_exist($nik)==true? 1 : 0;//cek jika user belum ada didatabase
            $status_dua = $this->home_model->cek_user_has_voted($nik)==true? 1 : 0; //cek jika user pernah voting
            if($status0 == 0){
                $status = 0;//user belum pernah vote
            }
            else{
                if($status_dua == 0) $status = 1; //sudah daftar tapi belum voting
                else $status = 2; // sudah daftar dan sudah voting
            }
            //$status = $status0.$status_dua; 
            $this->output->set_header('Content-type: application/json');
            $stat = array ('status'=>$status);
            echo json_encode($stat);
        }
        
        function update_user(){
            $nik = trim($this->input->post('nik'));
            $name = $this->input->post('name');
            $date = $this->input->post('date');
            $city = $this->input->post('city');
            
            $this->home_model->update_user($nik,$name,$date,$city);
        }

        function voting(){
            $nik = trim($this->input->post('nik'));
            $id_kandidat = $this->input->post('calon');
            
            $this->home_model->update_user_vote_calon($nik, $id_kandidat);
        }
        
        function profile_kandidat(){
            $id = $_GET['id'];
            $info = $this->home_model->profile_kandidat($id) == false? '' : $this->home_model->profile_kandidat($id);
            $judul_berita = $this->home_model->get_judul_beritaterkini()==false ? '' : $this->home_model->get_judul_beritaterkini();
            $data = array(
                        'info' => $info,
                        'judul_berita' => $judul_berita
                    );
            $this->load->view('public/templates/header');
            $this->load->view('public/templates/banner');
            $this->load->view('public/profile-kandidat',$data);
            $this->load->view('public/templates/footer');
        }
}
