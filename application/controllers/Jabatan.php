<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}
		$this->load->model('mjabatan');
	}
	function index(){
		$header['submodul'] = 2;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$data['datajabatan'] = $this->mjabatan->getdata()->result_array();
		$data['urlsimpan'] = base_url().'jabatan/simpanjabatan';
		$data['urledit'] = base_url().'jabatan/editjabatan';
		$footer['modul'] = 'jabatan';
		$this->load->view('header',$header);
		$this->load->view('page/jabatan',$data);
		$this->load->view('footer',$footer);
	}
	function getdatasatu(){
		$id = $_POST['id'];
		$hasil = $this->mjabatan->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
	function simpanjabatan(){
		$hasil = $this->mjabatan->simpanjabatan();
		if($hasil->num_rows() > 0){
			$jadi = $hasil->row(); //$this->mjabatan->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid',$jadi->id);
			$url = base_url().'jabatan';
			redirect($url);
		}
	}
	function editjabatan(){
		$hasil = $this->mjabatan->editjabatan();
		if($hasil->num_rows() > 0){
			$jadi = $hasil->row(); //$this->mjabatan->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid',$jadi->id);
			$url = base_url().'jabatan';
			redirect($url);
		}		
	}
	function hapusjabatan($id){
		$this->mjabatan->hapusjabatan($id);
		$url = base_url().'jabatan';
		redirect($url);
	}
}
