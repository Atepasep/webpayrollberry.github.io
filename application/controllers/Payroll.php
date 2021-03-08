<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Payroll extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masukkepayroll')!=true){
			$url = base_url('login');
			redirect($url);
		}else{
			if(substr($this->session->userdata('modulpayroll'),7,1)!='1'){
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
		$this->load->model('mpayroll');
	}
	function index(){
		$header['submodul'] = 4;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		if(!$this->session->flashdata('kodepayroll')){
			//$data['bulanperiode'] = date('m');
			//$data['tahunperiode'] = date('Y');
			$this->session->set_flashdata('bulanperiode',date('m'));
			$this->session->set_flashdata('tahunperiode',date('Y'));
			$this->session->set_flashdata('kodepayroll','SALARY');
		}else{
			$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
			$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
			$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		}
		$data['datapayroll'] = $this->mpayroll->getdata()->result_array();
		$data['count'] = count($data['datapayroll']);
		$footer['modul'] = 'payroll';
		$this->load->view('header',$header);
		$this->load->view('page/payroll',$data);
		$this->load->view('footer',$footer);
	}
	function clear(){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$url = base_url().'payroll';
		redirect($url);
	}
	function prosespayroll($id=0){
		$header['submodul'] = 4;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$data['kodepayroll'] = $this->session->flashdata('kodepayroll');
		$data['bulanperiode'] = $this->session->flashdata('bulanperiode');
		$data['tahunperiode'] = $this->session->flashdata('tahunperiode');
		if($id==1){
			$data['urlnya'] = base_url().'payroll/simpanpayroll/1';
			$data['tombol'] = "Reset dan Update";
		}else{
			$data['urlnya'] = base_url().'payroll/simpanpayroll';
			$data['tombol'] = "Proses";
		}
		$footer['modul'] = 'payroll';
		$this->load->view('header',$header);
		$this->load->view('page/prosespayroll',$data);
		$this->load->view('footer',$footer);		
	}
	function simpanpayroll($id=0){
		$hasil = $this->mpayroll->simpanpayroll($id);
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$url = base_url().'payroll';
		redirect($url);
	}
	function ubahperiode(){
		$kode = $_POST['kode'];
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$this->session->set_flashdata('kodepayroll',$kode);
		$this->session->set_flashdata('bulanperiode',$bulan);
		$this->session->set_flashdata('tahunperiode',$tahun);
		echo true;
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
	function getview($id){
		$temp = $this->mpersonil->getdatasatu($id)->row_array();
		$data['nama'] = $temp['nama'];
		$data['noinduk'] = $temp['noinduk'];
		$data['xbagian'] = $temp['xbagian'];
		$data['xjabatan'] = $temp['xjabatan'];
		$data['listgaji'] = $this->mmastergaji->daftargajisatu($id)->result_array();
		$this->load->view('page/viewgaji',$data);
	}
	function editview($id){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
 		$temp = $this->mpayroll->getdatasatu($id)->row_array();
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
		$this->load->view('page/editpayroll',$data);
	}
	function simpaneditpayroll(){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$id = $_POST['id'];
		$other = $_POST['other'];
		$astek = $_POST['astek'];
		$jp = $_POST['jp'];
		$bijab = $_POST['bijab'];
		$pkp = $_POST['pkp'];
		$pphyear = $_POST['pphyear'];
		$pphmonth = $_POST['pphmonth'];
		$pphgovmnt = $_POST['pphgovmnt'];
		$meal = $_POST['meal'];
		$transport = $_POST['transport'];
		$koperasi = $_POST['koperasi'];
		$thp = $_POST['thp'];
		$loan = $_POST['loan'];
		$realthp = $_POST['realthp'];
		$biayabank = $_POST['biayabank'];
		$jamsostek = $_POST['jamsostek'];
		$editke = $_POST['editke'];
		$hasil = $this->mpayroll->simpaneditpayroll($id,$other,$astek,$jp,$bijab,$pkp,$pphyear,$pphmonth,$pphgovmnt,$meal,$transport,$koperasi,$thp,$loan,$realthp,$biayabank,$jamsostek,$editke)->result();
		echo json_encode($hasil);
	}
}
