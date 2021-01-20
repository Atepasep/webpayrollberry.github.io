<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Didik extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}
	}
	function index(){
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$this->load->view('header',$header);
		$this->load->view('page/didik');
		$this->load->view('footer');
	}
}
