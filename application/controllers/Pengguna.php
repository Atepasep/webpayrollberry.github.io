<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}else{
			if(substr($this->session->userdata('modulpayroll'),4,1)!='1'){
				$this->session->set_flashdata('msg','akseserror');
				$url = base_url('main');
				redirect($url);
			}
		}
		$this->load->model('mpengguna');
	}
	function index(){
		$header['submodul'] = 2;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$data['datapengguna'] = $this->mpengguna->getdata()->result_array();
		$data['urlsimpan'] = base_url().'pengguna/simpanpengguna';
		$data['urledit'] = base_url().'pengguna/editpengguna';
		$footer['modul'] = 'pengguna';
		$this->load->view('header',$header);
		$this->load->view('page/pengguna',$data);
		$this->load->view('footer',$footer);
	}
	function getdatasatu(){
		$id = $_POST['id'];
		$hasil = $this->mpengguna->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
	function simpanpengguna(){
		$hasil = $this->mpengguna->simpanpengguna();
		if($hasil->num_rows() > 0){
			$jadi = $hasil->row(); //$this->mpengguna->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid',$jadi->id);
			$url = base_url().'pengguna';
			redirect($url);
		}
	}
	function editpengguna(){
		$hasil = $this->mpengguna->editpengguna();
		if($hasil->num_rows() > 0){
			$jadi = $hasil->row(); //$this->mpengguna->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid',$jadi->id);
			$url = base_url().'pengguna';
			redirect($url);
		}		
	}
	function hapuspengguna($id){
		$this->mpengguna->hapuspengguna($id);
		$url = base_url().'pengguna';
		redirect($url);
	}
	function getpass(){
		$id = $_POST['ide'];
		$hasil = $this->mpengguna->getpass($id);
		echo json_encode($hasil);
	}
}
