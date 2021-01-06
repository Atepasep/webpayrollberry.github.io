<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Human extends CI_Controller {
	function __construct(){
		parent::__construct();
		//if($this->session->userdata('modul')!=true){
		//	$url = base_url();
		//	redirect($url);
		//}
	}
	function index(){
		$header['header'] =2;
		$this->load->view('header',$header);
		$this->load->view('page/human');
		$this->load->view('footer');
	}
}