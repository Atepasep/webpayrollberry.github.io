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
		//$header['submodul'] = 2;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$data['datadidik'] = $this->mdidik->getdata()->result_array();
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
}
