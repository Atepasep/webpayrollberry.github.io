<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Bagian extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}else{
			if(substr($this->session->userdata('modulpayroll'),2,1)!='1'){
				$this->session->set_flashdata('msg','akseserror');
				$url = base_url('main');
				redirect($url);
			}
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
	function clear(){
		$this->session->set_flashdata('kodeid','');
		$url = base_url().'bagian';
		redirect($url);
	}
	function getdatasatu(){
		$id = $_POST['id'];
		$hasil = $this->mbagian->getdatasatu($id)->result();
		$this->session->set_flashdata('kodeid',$id);
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
	function getgroup(){
		$id = $_POST['id'];
		$hasil = $this->mbagian->getgroup($id)->result();
		echo json_encode($hasil);
	}
	function addgroup($id){
		$data['id'] = $id;
		$this->load->view('page/addgroup',$data);
	}
	function simpangroup(){
		$id = $_POST['id'];
		$kode = strtoupper($_POST['kode']);
		$nama = $_POST['nama'];
		$hasil = $this->mbagian->simpangroup($id,$kode,$nama)->result();
		echo json_encode($hasil);
	}
	function hapusgroup($id){
		$hapus = $this->mbagian->hapusgroup($id);
		$this->session->set_flashdata('kodeid',$hapus);
		$url = base_url().'bagian';
		redirect($url);
	}
}
