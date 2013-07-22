<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->db = $this->load->database('default',true);
	}

	function get_judul_beritaterkini(){
		$this->db->select('id,judul');
		$this->db->order_by('id','desc');
		$sql = $this->db->get('berita');
		if($sql->num_rows>0){
            return $sql->result();
            }
        else return false;
	}

	function get_detail_berita($id){
		$this->db->select('id, judul, isi, foto, waktu');
		$this->db->where('id',$id);
		$sql = $this->db->get('berita');
		if($sql->num_rows>0){
			return $sql->result();
		}
		else return false;
	}

	function get_berita_depan(){
		$this->db->select('id, judul, isi, foto, waktu');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$sql = $this->db->get('berita');
		if($sql->num_rows>0){
			return $sql->result();
		}
		else return false;	
	}

	function input_pemilih($nik,$name,$date,$city){
		$data= array(
			'nik' => $nik,
			'nama'=> $name,
			'tgl_lahir'=> $date,
			'kota'=>$city
		);

		$this->db->insert('pemilih',$data);
	}

	function get_suara_satu(){
		//select count(id_kandidat) from pemilih where id_kandidat=1;
		$query = $this->db->query('select count(id_kandidat) as jumlah from pemilih where id_kandidat=1');
                foreach($query->result() as $result){
                    return $result->jumlah;
                }
		
	}

	function get_suara_dua(){
		//select count(id_kandidat) from pemilih where id_kandidat=1;
		$query = $this->db->query('select count(id_kandidat) as jumlah from pemilih where id_kandidat=2');
                
                foreach($query->result() as $result){
                    return $result->jumlah;
                }
	}

	function get_suara_tiga(){
		//select count(id_kandidat) from pemilih where id_kandidat=1;
		$query = $this->db->query('select count(id_kandidat) as jumlah from pemilih where id_kandidat=3');

		foreach($query->result() as $result){
                    return $result->jumlah;
                }
	}
        
        function get_sekilas_kandidat(){
            $this->db->select('id,julukan,sekilas,foto');
            $query=  $this->db->get('kandidat');
            
            if($query->num_rows>0){
		return $query->result();
            }
            else return false;
        }
        
        function get_detail_kandidat($id){
            $this->db->select('id,julukan,sekilas,foto');
            $query=  $this->db->get('kandidat');
            
            if($query->num_rows>0){
			return $query->result();
            }
            else return false;
        }
        
        function cek_user_exist($nik){
            $this->db->select('nik');
            $this->db->where('nik',$nik);
            $sql = $this->db->get('pemilih');
            if($sql->num_rows>0){
                return true;
            }
            else return false;
        }
        
        function cek_user_has_voted($nik){
//            $this->db->select('nik');
//            $this->db->where('nik',$nik);
//            $this->db->where('id_kandidat !=','NULL');
//            $sql = $this->db->get('pemilih');
            $sql = $this->db->query("select nik from pemilih where nik='$nik' and id_kandidat is not null");
            if($sql->num_rows > 0){
                return true;
            }
            else return false;
        }
        
        function update_user($nik,$name,$date,$city){
            $data = array(
                        'nama'      => $name,
                        'tgl_lahir'   => $date,
                        'kota'      => $city
                    );
            $this->db->where('nik', $nik);
            $this->db->update('pemilih', $data); 
        }
        
        function update_user_vote_calon($nik, $id_kandidat){
            $this->db->set('id_kandidat',$id_kandidat);
            $this->db->where('nik',$nik);
            $this->db->update('pemilih');
        }
        
        function get_kota(){
            $this->db->select('id,kota');
            $sql=$this->db->get('kota');
            if($sql->num_rows>0){
                return $sql->result();
            }
            else return false;
        }
        
        function profile_kandidat($id){
            $this->db->select('id,julukan,sekilas,visi,misi,foto');
            $this->db->where('id',$id);
            $sql=$this->db->get('kandidat');
            if($sql->num_rows>0){
                return $sql->result();
            }
            else return false;
        }
        
        function profile_kandidat_individu($id){
            
        }
}