<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Validasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}else{
			if(substr($this->session->userdata('modulpayroll'),8,1)!='1'){
				$this->session->set_flashdata('msg','akseserror');
				$url = base_url('main');
				redirect($url);
			}
		}
		$this->load->model('mvalidasi');
	}
	function index(){
		$header['submodul'] = 5;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		if(!$this->session->flashdata('kodevalid')){
			//$data['bulanperiode'] = date('m');
			//$data['tahunperiode'] = date('Y');
			$this->session->set_flashdata('bulanperiode',date('m'));
			$this->session->set_flashdata('tahunperiode',date('Y'));
			$this->session->set_flashdata('kodepayroll','SALARY');
			$this->session->set_flashdata('kodevalid','hg');
		}else{
			$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
			$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
			$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
			$this->session->set_flashdata('kodevalid',$this->session->flashdata('kodevalid'));
		}
		$data['datavalidasi'] = $this->mvalidasi->getdata()->result_array();
		$data['count'] = count($data['datavalidasi']);
		$footer['modul'] = 'validasi';
		$this->load->view('header',$header);
		$this->load->view('page/validasi',$data);
		$this->load->view('footer',$footer);
	}
	function clear(){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('kodevalid',$this->session->flashdata('kodevalid'));
		$url = base_url().'validasi';
		redirect($url);
	}
	function ubahperiode(){
		$kode = $_POST['kode'];
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$valid = $_POST['valid'];
		$this->session->set_flashdata('kodepayroll',$kode);
		$this->session->set_flashdata('bulanperiode',$bulan);
		$this->session->set_flashdata('tahunperiode',$tahun);
		$this->session->set_flashdata('kodevalid',$valid);
		echo true;
	}
	function getdatasatu(){
		$id = $_POST['id'];
		$hasil = $this->mpengguna->getdatasatu($id)->result();
		echo json_encode($hasil);
	}
	function getview($id){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
 		$temp = $this->mvalidasi->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $temp['noinduk'];
		$data['nama'] = $temp['nama'];
		$data['bagian'] = $temp['bagian'];
		$data['jabatan'] = $temp['jabatan'];
		$data['gaji'] = $temp['gaji'];
		$data['tunjab'] = $temp['tunjab'];
		$data['tunskill'] = $temp['tunskill'];
		$data['astek'] = $temp['astek'];
		$data['jp'] = $temp['jp'];
		$data['other'] = $temp['other'];
		$data['bijab'] = $temp['bijab'];
		$data['ptkp'] = $temp['ptkp'];
		$data['pkp'] = $temp['pkp'];
		$data['pphyear'] = $temp['pphyear'];
		$data['pphmonth'] = $temp['pphmonth'];
		$data['pphgovmnt'] = $temp['pphgovmnt'];
		$data['meal'] = $temp['meal'];
		$data['transport'] = $temp['transport'];
		$data['koperasi'] = $temp['koperasi'];
		$data['thp'] = $temp['thp'];
		$data['loan'] = $temp['loan'];
		$data['bpjs'] = $temp['bpjs'];
		$data['realthp'] = $temp['realthp'];
		$data['biayabank'] = $temp['biayabank'];
		$data['jamsostek'] = $temp['jamsostek'];
		$data['total'] = $temp['total'];
		$data['editke'] = $temp['editke'];
		$data['bank'] = $temp['bank'];
		$data['bankadr'] = $temp['bankadr'];
		$data['rekname'] = $temp['rekname'];
		$data['norek'] = $temp['norek'];
		$this->load->view('page/viewdetail',$data);
	}
	function validoke($id){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('kodevalid',$this->session->flashdata('kodevalid'));
		$temp = $this->mvalidasi->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $temp['noinduk'];
		$data['nama'] = $temp['nama'];
		$this->load->view('page/validoke',$data);
	}
	function valid(){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('kodevalid',$this->session->flashdata('kodevalid'));
		$id = $_POST['id'];
		$hasil = $this->mvalidasi->valid($id)->result();
		echo json_encode($hasil);
	}
	function unvalid($id){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('kodevalid',$this->session->flashdata('kodevalid'));
		$temp = $this->mvalidasi->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $temp['noinduk'];
		$data['nama'] = $temp['nama'];
		$this->load->view('page/unvalid',$data);
	}
	function unvalidoke(){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('kodevalid',$this->session->flashdata('kodevalid'));
		$id = $_POST['id'];
		$hasil = $this->mvalidasi->unvalidoke($id)->result();
		echo json_encode($hasil);
	}	
	function validall(){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$this->session->set_flashdata('kodevalid',$this->session->flashdata('kodevalid'));
		$this->mvalidasi->validall();	
		$url = base_url().'validasi';
		redirect($url);
	}
}
