<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{

	function __construct()
        {
            parent::__construct();
            $this->db = $this->load->database('default',true);
	}
        
        function login($username, $password)
        {
            //session_start();
            $this->db->select('id,username,password');
            $this->db->from('admin');
            $this->db->where('username',$username);
            $this->db->where('password',MD5($password));

            $query=  $this->db->get();

            if($query->num_rows()==1){
                //kalo ketemu maka langsung buat session data si user
                $row=$query->row();
                $data=array(
                    'id'=>$row->id,
                    'username'=>$row->username,
                    'validate'=>true
                );
                $this->session->set_userdata($data);
                return true;
            }
            else {
                //redirect('login','refresh');
                return false;

            }
        }
        
        function kandidat()
        {
            $this->db->select('id, nama_cagub, nama_cawagub, julukan, sekilas, visi, misi, foto');
            $sql = $this->db->get('kandidat');
            if($sql->num_rows > 0)
            {
                return $sql->result();                
            }
            else return false;
        }
        
        function aksi_edit_kandidat($id,$cagub,$cawagub,$julukan,$sekilas,$visi,$misi)
        {
            $data = array('nama_cagub'=>$cagub,'nama_cawagub'=>$cawagub,'julukan'=>$julukan,'sekilas'=>$sekilas,'visi'=>$visi,'misi'=>$misi);
            $this->db->where('id', $id);
            $this->db->update('kandidat', $data); 
        }
        
        function get_data_pemilih()
        {
            $sql= $this->db->query('select p.id as id,p.nik as nik,p.nama as nama,p.tgl_lahir as tgl_lahir,k.kota from pemilih p, kota k where k.id=p.kota');
            //$sql = $this->db->get('pemilih');
            if($sql->num_rows > 0)
            {
                return $sql->result();
            }
            else return false;
        }
        
        function get_suara_all()
        {
            $this->db->select('id_kandidat as id,count(id_kandidat) as jum');
            $this->db->group_by("id_kandidat");
            $sql = $this->db->get('pemilih');
            if($sql->num_rows > 0)
            {
                return $sql->result();
            }
            else return false;
        }
        
        function get_kota()
        {
            $this->db->select('id,kota');
            $sql=$this->db->get('kota');
            if($sql->num_rows>0){
                return $sql->result();
            }
            else return false;
        }
        
        function get_suara_kota($id)
        {
            $this->db->select('id_kandidat as id,count(id_kandidat) as jum');
            $this->db->group_by("id_kandidat");
            $this->db->where('kota',$id);
            $sql = $this->db->get('pemilih');
            if($sql->num_rows > 0)
            {
                return $sql->result();
            }
            else return false;
        }
}