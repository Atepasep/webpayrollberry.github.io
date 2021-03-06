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
		$this->load->library('pdf');
		$this->load->library('mailer');
		$this->load->library('dbf');
	}
	function index(){
		$header['submodul'] = 4;
		$header['namalogpayroll']=$this->session->userdata('namalogpayroll');
		if(!$this->session->flashdata('kodepayroll')){
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
		$data['hitungkirim'] = $this->mpayroll->gethitungkirim()->result_array();
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
		$data['bank'] = $temp['bank'];
		$data['bankadr'] = $temp['bankadr'];
		$data['rekname'] = $temp['rekname'];
		$data['norek'] = $temp['norek'];
		$this->load->view('page/viewdetail',$data);
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
		$data['prc_bonus'] = $temp['prc_bonus'];
		$data['thr_bonus'] = $temp['thr_bonus'];
		$data['code'] = $temp['code'];
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
	function senddata($id){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$temp = $this->mpayroll->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $temp['noinduk'];
		$data['nama'] = $temp['nama'];
		$this->load->view('page/senddata',$data);
	}
	function senddataok(){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$id = $_POST['id'];
		$hasil = $this->mpayroll->senddataok($id)->result();
		echo json_encode($hasil);
	}
	function unsenddata($id){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$temp = $this->mpayroll->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $temp['noinduk'];
		$data['nama'] = $temp['nama'];
		$this->load->view('page/unsenddata',$data);
	}
	function senddatang(){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$id = $_POST['id'];
		$hasil = $this->mpayroll->senddatang($id)->result();
		echo json_encode($hasil);
	}	
	function sendall(){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$this->mpayroll->sendall();	
		$url = base_url().'payroll';
		redirect($url);
	}
 	function kirimemail($id){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$temp = $this->mpayroll->getdatasatu($id)->row_array();
		$data['id'] = $id;
		$data['noinduk'] = $temp['noinduk'];
		$data['nama'] = $temp['nama'];
		$data['email'] = $temp['email'];
		$this->load->view('page/kirimemail',$data); 		
	}
	function buatpdf(){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$id = $_POST['id'];
		$temp = $this->mpayroll->getdatasatu($id)->row_array();
		$namafile = $this->session->flashdata('kodepayroll').'_'.namabulan($this->session->flashdata('bulanperiode')).'_'.$this->session->flashdata('tahunperiode');
		$file = LOK_FILE.$namafile.'_'.$temp['noinduk'].'.pdf';
        $pdf = new FPDF_Protection('p','mm','A5');
        $pdf->SetProtection(array('print'), strtolower($temp['pdfpass']));
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        $pdf->Image(base_url().'assets/images/gambar.jpeg',10,10,-300);
        // mencetak string 
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(25);
        $pdf->Cell(110,5,'PT. INDONEPTUNE NET MANUFACTURING',10,1,'L');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(25);
        $pdf->Cell(110,5,'Factory',0,1);
        $pdf->Line(10,30,140,30);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('times','B',9);
        $pdf->Cell(65,6,$temp['code'].' '.namabulan(substr($temp['periode'], 4,2)).' '.substr($temp['periode'], 0,4),0,0);
        $pdf->SetFont('times','',9);
        $pdf->Cell(65,6,date('d-m-Y'),0,0);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(65,6,'Nama',0,0);
        $pdf->Cell(65,6,': '.$temp['nama'],0,0);
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Beneficiary Bank',0,0);
        $pdf->Cell(65,6,': '.$temp['bank'].'-'.$temp['bankadr'],0,0);
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Nomor Rekening',0,0);
        $pdf->Cell(65,6,': '.$temp['norek'],0,0);
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Atas Nama',0,0);
        $pdf->Cell(65,6,': '.$temp['rekname'],0,0);
        $pdf->Line(10,58,140,58);
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(65,6,'Gaji Pokok',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['gaji'],0),0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Tunjangan Jabatan',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['tunjab'],0),0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Tunjangan Skill',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['tunskill'],0),0,0,'R');
        $pdf->Line(70,74,140,74);
        $pdf->SetFont('times','B',9);
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(65,6,'Gaji Kotor',0,0,'C');
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['gaji']+$temp['tunjab']+$temp['tunskill'],0),0,0,'R');
        $pdf->SetFont('times','',9);
        $pdf->Cell(10,8,'',0,1);
        $pdf->Cell(65,6,'Astek',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['astek'],0),0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Jaminan Pensiun',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['jp'],0),0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Biaya Jabatan',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['bijab'],0),0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Penghasilan Tidak Kena Pajak (PTKP)',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['ptkp'],0),0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Penghasil Kena Pajak (PKP)',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['pkp'],0),0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'PPh 21',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['pphmonth'],0),0,0,'R');
        $pdf->Cell(10,8,'',0,1);
        $pdf->Cell(65,6,'Gaji Kotor',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['gaji']+$temp['tunjab']+$temp['tunskill'],0),0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Astek',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['astek'],0),0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Jaminan Pensiun',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['jp'],0),0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'PPh 21',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['pphmonth'],0),0,0,'R');
        $pdf->Cell(10,8,'',0,1);
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Transport Allowance',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['transport'],0),0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Koperasi',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['koperasi'],0),0,0,'R');
        $pdf->Line(70,145,140,145);
        $pdf->SetFont('times','B',9);
        $pdf->Cell(10,8,'',0,1);
        $pdf->Cell(65,6,'Take Home Pay',0,0,'C');
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,rupiah($temp['realthp'],0),0,0,'R');
        $pdf->Output($file,'F');
        if(file_exists($file)){
        	$kode = $temp['code'].' '.namabulan(substr($temp['periode'], 4,2)).' '.substr($temp['periode'], 0,4);
			$bapakibu = $temp['jenkel']=='L' ? 'Bapak ' : 'Ibu ';
			$namakar  = $temp['nama'];
			$message = '<html><body>';
			$message .= '<table style="border-collapse: collapse; width: 100%; height: 144px;" border="0">';
			$message .= '<tbody>';
			$message .= '<tr><td colspan="3">Kepada Yth <br> '.$bapakibu.' <strong>'.$namakar.'</strong></td></tr>';
			$message .= '<tr><td colspan="3">Terlampir kami sampaikan e-Slip <strong>'.$kode.'</strong> anda.<br></td></tr>';
			$message .= '<tr><td colspan="3">Silahkan gunakan password untuk membuka e-Slip gaji anda, yang terdiri dari :<br></td></tr>';
			$message .= '<tr><td style="width:45px; padding-left:20px;">xxxx</td><td>:</td><td>Empat Digit terakhir nomor kartu debit anda<td></tr>';
			$message .= '<tr><td style="padding-left:20px;">dd</td><td>:</td><td>Dua digit tanggal lahir anda</td></tr>';
			$message .= '<tr><td style="padding-left:20px;">mm</td><td>:</td><td>Dua digit bulan lahir anda</td></tr>';
			$message .= '<tr><td style="padding-left:20px;">yy</td><td>:</td><td>Dua digit tahun lahir anda</td></tr>';
			$message .= '<tr><td colspan="3"><br>Contoh : Password untuk tanggal lahir 20 Maret 1971 dan 4 Digit terakhir kartu debit anda misalnya 4444 adalah 4444200371.<br></td></tr>';
			$message .= '<tr><td colspan="3"><br>Untuk menikmati fasilitas layanan e-Slip gaji, pastikan anda memiliki program Adobe Reader minimal versi 6.0 pada komputer atau handphone anda.<br></td></tr>';
			$message .= '<tr><td colspan="3"><br>Hormat kami, <br> Berry Laksana</td></tr>';
			$message .= '</tbody>';
			$message .= '</table>';
			$message .= '</body></html>';
        	$sendmail = array('file'=>$file,'penerima'=>$temp['email'],'pesan'=>$message,'subjek'=>$kode);
        	$send = $this->mailer->send_with_attachment($sendmail);
	        if(strtoupper($send['status'])=='SUKSES'){
	        	$this->mpayroll->sendmail($temp['id']);
	        	echo true;
	        }else{
	        	echo $send['message'];
	        }
    	}
	}
	function getalldatatomail(){
		$this->session->set_flashdata('bulanperiode',$this->session->flashdata('bulanperiode'));
		$this->session->set_flashdata('tahunperiode',$this->session->flashdata('tahunperiode'));
		$this->session->set_flashdata('kodepayroll',$this->session->flashdata('kodepayroll'));
		$temp['dataemail'] = $this->mpayroll->getdata()->result_array();
		$this->load->view('page/kirimemailall',$temp); 
	}
	function bacadbf($file){
		if(file_exists($file)){
			$datatrans = $this->dbf->bacadbf($file);
			$stres = print_r($datatrans);
			$this->session->set_flashdata('msgbacadbf',$stres);
			return $stres;
		}
	}
}