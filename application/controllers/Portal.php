<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Portal extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukportal')!=true){
			$url = base_url('loginportal');
			redirect($url);
		 }//else{
		// 	if(substr($this->session->userdata('modulpayroll'),2,1)!='1'){
		// 		$this->session->set_flashdata('msg','akseserror');
		// 		$url = base_url('main');
		// 		redirect($url);
		// 	}
		// }
		$this->load->model('mportal');
	}
	function index(){
		$header['submodul'] = 2;
		$header['namalogportal']=$this->session->userdata('namalogportal');
		$data['databagian'] = $this->mbagian->getdata()->result_array();
		$data['urlsimpan'] = base_url().'bagian/simpanbagian';
		$data['urledit'] = base_url().'bagian/editbagian';
		$footer['modul'] = 'bagian';
		$this->load->view('headerportal',$header);
		$this->load->view('page/portal',$data);
		$this->load->view('footer',$footer);
	}
	function clear(){
		$this->session->set_flashdata('kodeid','');
		$this->session->set_flashdata('msgx','');
		$url = base_url().'portal';
		redirect($url);
	}
}
