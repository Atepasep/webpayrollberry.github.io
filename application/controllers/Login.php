<?php
if(!defined('BASEPATH'))exit('No direct access allowed');
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mlogin');
	}
	function index(){
		$data['formAction'] = base_url().'login/cekauth';
		$data['formAction2'] = base_url().'login/cekauth';
		$this->load->view('login',$data);
	}
	function cekauth(){
		if($this->input->post('username')!=null AND $this->input->post('password')!=null){
			$username=strip_tags(str_replace("'", "", $this->input->post('username')));
            $password=strip_tags(str_replace("'", "", $this->input->post('password')));
            $u      = $username; //strtoupper($username);
            $pe     = encrypto($password);
            // $p      = $this->encrypt->encode($pe);
            $cekadmin = $this->mlogin->ceklogin($u,$pe);
            if($cekadmin->num_rows() > 0){
            	$datalogin = $cekadmin->row();
            	$this->session->set_userdata('masukkepayroll',true);
                $this->session->set_userdata('namalogpayroll',$datalogin->nama);
                $this->session->set_userdata('modulpayroll',$datalogin->modul);
                $this->session->set_userdata('fotoprofilnya',$datalogin->profil);
                $this->session->set_userdata('valid',$datalogin->validasi);
            	$this->session->set_flashdata('msgx','suksesbrad');
            	$url = base_url('login');
                redirect($url);
            }else{
             	$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Perhatian!</strong> <br>Username / password yang anda masukan salah.
                    </div>');
                $url = base_url('login');
                redirect($url);
            }
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Perhatian!</strong> <br>Isi Username dan Password terlebih dulu.
                </div>');
            $url = base_url('login');
            redirect($url);
		}
	}
	function logout(){
		$this->session->sess_destroy();
        $url = base_url('Login');
        redirect($url);
	}
}