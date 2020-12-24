<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}
	}
	function index(){
		$this->load->view('page/home');
	}
}
