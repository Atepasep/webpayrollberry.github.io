<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Didik extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}
		$this->load->model('mdidik');
	}
	function index(){
		$header['submodul'] = 2;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$data['datadidik'] = $this->mdidik->getdata()->result_array();
		$data['urlsimpan'] = base_url().'didik/simpandidik';
		$data['urledit'] = base_url().'didik/editdidik';
		if($this->session->userdata('kodeid')){
			$data['datakodeid'] = $this->session->userdata('kodeid');
		}else{
			$data['datakodeid'] = null;
		}
		$footer['modul'] = 'didik';
		$this->load->view('header',$header);
		$this->load->view('page/didik',$data);
		$this->load->view('footer',$footer);
	}
	function getdatasatu(){
		$id = $_POST['id'];
		$hasil = $this->mdidik->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
	function simpandidik(){
		// $kode = $_POST['kode'];
		// $pendidikan = $_POST['pendidikan'];
		$hasil = $this->mdidik->simpandidik($kode,$pendidikan)->row();
		$this->session->set_userdata('kodeid',$hasil->id);
		// if($hasil=='1'){
			$url = base_url().'didik';
			redirect($url);
		// }
		//echo json_encode($hasil);
	}
}
