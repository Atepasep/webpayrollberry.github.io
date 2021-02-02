<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Personil extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}else{
			if(substr($this->session->userdata('modulpayroll'),5,1)!='1'){
				$this->session->set_flashdata('msg','akseserror');
				$url = base_url('main');
				redirect($url);
			}
		}
		$this->load->model('mpersonil');
		$this->load->model('mdidik');
		$this->load->model('mbagian');
		$this->load->model('mjabatan');
	}
	function index(){
		$header['submodul'] = 3;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$data['datapersonil'] = $this->mpersonil->getdata()->result_array();
		$footer['modul'] = 'personil';
		$this->load->view('header',$header);
		$this->load->view('page/personil',$data);
		$this->load->view('footer',$footer);
	}
	function tambahdata(){
		$header['submodul'] = 3;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$data['urlnya'] = base_url().'personil/simpanpersonil';
		$data['didik'] = $this->mdidik->getdata()->result_array();
		$data['bagian'] = $this->mbagian->getdata()->result_array();
		$data['jabatan'] = $this->mjabatan->getdata()->result_array();
		$footer['modul'] = 'personil';
		$this->load->view('header',$header);
		$this->load->view('page/addpersonil',$data);
		$this->load->view('footer',$footer);
	}
	function getdatasatu(){
		$id = $_POST['id'];
		$hasil = $this->mpengguna->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
	function simpanpersonil(){
		$hasil = $this->mpersonil->simpanpersonil();
		if($hasil->num_rows() > 0){
			$jadi = $hasil->row(); //$this->mpengguna->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid',$jadi->id);
			$url = base_url().'personil';
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
	function hapuspersonil($id){
		$this->mpersonil->hapuspersonil($id);
		$url = base_url().'personil';
		redirect($url);
	}
	function getpass(){
		$id = $_POST['ide'];
		$hasil = $this->mpengguna->getpass($id);
		echo json_encode($hasil);
	}
}
