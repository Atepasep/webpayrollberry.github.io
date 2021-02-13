<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Mastergaji extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}else{
			if(substr($this->session->userdata('modulpayroll'),6,1)!='1'){
				$this->session->set_flashdata('msg','akseserror');
				$url = base_url('main');
				redirect($url);
			}
		}
		$this->load->model('mmastergaji');
		$this->load->model('mpersonil');
		$this->load->model('mdidik');
		$this->load->model('mbagian');
		$this->load->model('mjabatan');
	}
	function index(){
		$header['submodul'] = 3;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$data['datagaji'] = $this->mmastergaji->getdata()->result_array();
		$footer['modul'] = 'mastergaji';
		$this->load->view('header',$header);
		$this->load->view('page/mastergaji',$data);
		$this->load->view('footer',$footer);
	}
	function addgaji($id){
		$header['submodul'] = 3;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$data['datapersonil'] = $this->mpersonil->getdatasatu($id)->result_array();
		$data['gajisekarang'] = $this->mmastergaji->getdatasatu($id)->result_array();
		$data['listgaji'] = $this->mmastergaji->daftargajisatu($id)->result_array();
		$data['urlnya'] = base_url().'mastergaji/simpangaji';
		$footer['modul'] = 'mastergaji';
		$this->load->view('header',$header);
		$this->load->view('page/addgaji',$data);
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
		$data['id'] = null;
		$data['noinduk'] = null;
		$data['nama'] = null;
		$data['jenkel'] = null;
		$data['tempatlahir'] = null;
		$data['tgllahir'] = null;
		$data['identitas'] = null;
		$data['noidentitas'] = null;
		$data['alamat'] = null;
		$data['pendidikan'] = null;
		$data['email'] = null;
		$data['notelp'] = null;
		$data['tglmasuk'] = null;
		$data['xbagian'] = null;
		$data['xjabatan'] = null;
		$data['profil'] = null;
		$this->load->view('header',$header);
		$this->load->view('page/addpersonil',$data);
		$this->load->view('footer',$footer);
	}
	function updatepersonil($id){
		$header['submodul'] = 3;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$data['urlnya'] = base_url().'personil/editpersonil';
		$data['didik'] = $this->mdidik->getdata()->result_array();
		$data['bagian'] = $this->mbagian->getdata()->result_array();
		$data['jabatan'] = $this->mjabatan->getdata()->result_array();
		$footer['modul'] = 'personil';
		$datapersonil = $this->mpersonil->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $datapersonil['noinduk'];
		$data['nama'] = $datapersonil['nama'];
		$data['jenkel'] = $datapersonil['jenkel'];
		$data['tempatlahir'] = $datapersonil['tempatlahir'];
		$data['tgllahir'] = $datapersonil['tgllahir'];
		$data['identitas'] = $datapersonil['identitas'];
		$data['noidentitas'] = $datapersonil['noidentitas'];
		$data['alamat'] = $datapersonil['alamat'];
		$data['pendidikan'] = $datapersonil['pendidikan'];
		$data['email'] = $datapersonil['email'];
		$data['notelp'] = $datapersonil['notelp'];
		$data['tglmasuk'] = $datapersonil['tglmasuk'];
		$data['xbagian'] = $datapersonil['bagian'];
		$data['xjabatan'] = $datapersonil['jabatan'];
		$data['profil'] = $datapersonil['profil'];
		$this->load->view('header',$header);
		$this->load->view('page/addpersonil',$data);
		$this->load->view('footer',$footer);	
	}
	function getdatasatu(){
		$id = $_POST['id'];
		$hasil = $this->mpengguna->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
	function simpangaji(){
		$hasil = $this->mmastergaji->simpangaji();
		if($hasil->num_rows() > 0){
			$jadi = $hasil->row(); //$this->mpengguna->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid',$jadi->id);
			$url = base_url().'mastergaji';
			redirect($url);
		}
	}
	function editpersonil(){
		$hasil = $this->mpersonil->editpersonil();
		if($hasil->num_rows() > 0){
			$jadi = $hasil->row(); //$this->mpengguna->getdatabykode($kode)->row();
			$this->session->set_flashdata('kodeid',$jadi->id);
			$url = base_url().'personil';
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
	function getview($id){
		$temp = $this->mpersonil->getdatasatu($id)->row_array();
		$data['nama'] = $temp['nama'];
		$data['noinduk'] = $temp['noinduk'];
		$data['xbagian'] = $temp['xbagian'];
		$data['xjabatan'] = $temp['xjabatan'];
		$data['listgaji'] = $this->mmastergaji->daftargajisatu($id)->result_array();
		$this->load->view('page/viewgaji',$data);
	}
}
