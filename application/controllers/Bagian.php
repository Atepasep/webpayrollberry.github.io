<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Bagian extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}
		$this->load->model('mbagian');
	}
	function index(){
		$header['submodul'] = 2;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$data['databagian'] = $this->mbagian->getdata()->result_array();
		$data['urlsimpan'] = base_url().'bagian/simpanbagian';
		$data['urledit'] = base_url().'bagian/editbagian';
		$footer['modul'] = 'bagian';
		$this->load->view('header',$header);
		$this->load->view('page/bagian',$data);
		$this->load->view('footer',$footer);
	}
	function getdatasatu(){
		$id = $_POST['id'];
		$hasil = $this->mbagian->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
	function simpanbagian(){
		$hasil = $this->mbagian->simpanbagian();
		if($hasil->num_rows() > 0){
			$jadi = $hasil->row(); //$this->mbagian->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid',$jadi->id);
			$url = base_url().'bagian';
			redirect($url);
		}
	}
	function editbagian(){
		$hasil = $this->mbagian->editbagian();
		if($hasil->num_rows() > 0){
			$jadi = $hasil->row(); //$this->mbagian->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid',$jadi->id);
			$url = base_url().'bagian';
			redirect($url);
		}		
	}
	function hapusbagian($id){
		$this->mbagian->hapusbagian($id);
		$url = base_url().'bagian';
		redirect($url);
	}
}
