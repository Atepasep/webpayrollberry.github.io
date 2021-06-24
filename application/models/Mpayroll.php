<?php
	class Mpayroll extends CI_Model {
		function getdata(){
			$py = $this->session->flashdata('kodepayroll');
			$bl = $this->session->flashdata('kodepayroll')=='SALARY' ? $this->session->flashdata('bulanperiode') : '00';
			$th = $this->session->flashdata('tahunperiode');
			$hasil = $this->db->query("SELECT a.ind,a.nama,a.noinduk,c.jabatan as jabatan,d.bagian as bagian,a.loc,b.* FROM karyawan a
										LEFT JOIN payroll b ON a.id = b.id_karyawan 
										LEFT JOIN jabatan c ON a.jabatan = c.id
										LEFT JOIN bagian d ON a.bagian = d.id
										WHERE b.code = '".$py."' AND b.periode = '".$th.$bl."' order by a.ind ");
			return $hasil;
		}
		function getdatasatu($id){
			$py = $this->session->flashdata('kodepayroll');
			$bl = $this->session->flashdata('kodepayroll')=='SALARY' ? $this->session->flashdata('bulanperiode') : '00';
			$th = $this->session->flashdata('tahunperiode');
			$hasil = $this->db->query("SELECT a.nama,a.noinduk,a.jenkel,c.jabatan as jabatan,d.bagian as bagian,a.email,a.bank,a.bankadr,a.rekname,a.norek,a.password,CONCAT_WS('',a.cardcode,DATE_FORMAT(a.tgllahir,'%d%m%y')) as pdfpass,b.* FROM karyawan a
										LEFT JOIN payroll b ON a.id = b.id_karyawan 
										LEFT JOIN jabatan c ON a.jabatan = c.id
										LEFT JOIN bagian d ON a.bagian = d.id
										WHERE b.code = '".$py."' AND b.periode = '".$th.$bl."' and b.id = ".$id);
			return $hasil;
		}
		function gethitungkirim(){
			$py = $this->session->flashdata('kodepayroll');
			$bl = $this->session->flashdata('kodepayroll')=='SALARY' ? $this->session->flashdata('bulanperiode') : '00';
			$th = $this->session->flashdata('tahunperiode');
			$hasil = $this->db->query("SELECT COUNT(*) AS jmpersonil,SUM(send) AS send,SUM(sendmail) AS sendmail,SUM(hg) AS validhg,SUM(mh) AS validmh FROM payroll
										WHERE code = '".$py."' AND periode = '".$th.$bl."' ");
			return $hasil;
		}
		function daftargajisatu($id){
			$hasil = $this->db->query("select * from gaji where id_karyawan =".$id." ");
			return $hasil;
		}
		function simpanpayroll($id){
			$data = $_POST;
			$data['periode'] = $data['tahunperiode'].$data['bulanperiode'];
			if($data['code']!='SALARY'){
				$data['periode'] = $data['tahunperiode'].'00';
				$data['prc_bonus'] = $data['persenthrbonus'];
			}
			$filetransport = $this->input->post('filepathtransport');
			$filekoperasi = $this->input->post('filepathkoperasi');
			if(!empty($filetransport)){
				$this->uploadtransport();
			}
			if(!empty($filekoperasi)){
				$this->uploadkoperasi();
			}
			$data['xperiode'] = $data['bulanperiode'].$data['tahunperiode'];
			unset($data['bulanperiode']);
			unset($data['tahunperiode']);
			unset($data['xcode']);
			unset($data['xbulanperiode']);
			unset($data['xtahunperiode']);
			//unset($data['filekoperasi']);
			unset($data['filepathkoperasi']);
			//unset($data['filetransport']);
			unset($data['filepathtransport']);
			unset($data['persenthrbonus']);
			// Cek
			if($id=1){
				$this->db->query("delete from payroll where periode = '".$data['periode']."' and code = '".$data['code']."' ");
			}
			if(file_exists('assets/FILE/TRANSPMAN'.$data['xperiode'].'.DBF')){
				$datatrans = $this->dbf->bacadbf('assets/FILE/TRANSPMAN'.$data['xperiode'].'.DBF');
			}
			if(file_exists('assets/FILE/KOPMANA'.$data['xperiode'].'.DBF')){
				$datakoper = $this->dbf->bacadbf('assets/FILE/KOPMANA'.$data['xperiode'].'.DBF');
			}
			unset($data['xperiode']);
			$datakaryawan = $this->db->query("SELECT a.id AS xid_karyawan,a.nama,a.ind,a.ptkp as kodeptkp,a.kontrak,c.ptkp,b.* FROM karyawan a
												LEFT JOIN gaji b on a.id = b.id_karyawan
												LEFT JOIN ptkp c ON a.ptkp = c.kodeptkp
												WHERE b.sampai IS null ")->result_array();
			foreach ($datakaryawan as $karyawan) {
				$data['id_karyawan'] = $karyawan['xid_karyawan'];
				$data['ind'] = $karyawan['ind'];
				if(!empty($datatrans)){
					$data['transport'] = $datatrans[$data['ind']];
				}else{
					$data['transport'] = 0;
				}
				if(!empty($datakoper)){
					$data['koperasi'] = $datakoper[$data['ind']];
				}else{
					$data['koperasi'] = 0;
				}
				$data['gaji'] = $karyawan['gaji'];
				$data['tunjab'] = $karyawan['tunjab'];
				$data['tunskill'] = $karyawan['tunskill'];
				$data['ptkp'] = $karyawan['ptkp']/12;
				if($data['code']=='SALARY'){
					$data['other'] = 0;
					$data['meal'] = 0;
					//$data['transport'] = 0;
					//$data['koperasi'] = 0;
					$data['loan'] = 0;
					$data['bpjs'] = 0;
					$gross = $data['gaji']+$data['tunjab']+$data['tunskill'];
					$data['astek'] = $karyawan['kontrak']==1 ? 0 : round($gross*0.02);
					$maxgaji = $data['periode'] >= '202003' ? 8939700 : 8512400;
					if($karyawan['kontrak']==1){
						$data['jp']=0;
					}else{
						$data['jp'] = $gross>$maxgaji ? round($maxgaji*0.01) : round($gross*0.01);
					}
					$data['bijab'] = ($gross*0.05)<500000 ? $gross*0.05 : 500000; 
					$pkp = ((($gross-($data['astek']+$data['jp']+$data['bijab']+$data['ptkp']))/1000)*1000)*12;
					$pphyear = 0;
					if($pkp > 500000000){
						$pphyear = 95000000+(($pkp-500000000)*0.3);
					}else{
						if ($pkp > 250000000) {
							$pphyear = 32500000+(($pkp-250000000)*0.25);
						}else{
							if ($pkp > 50000000) {
								$pphyear = 2500000+(($pkp-50000000)*0.15);
							}else{
								if ($pkp > 0) {
									$pphyear = $pkp*0.05;
								}else{
									$pphyear = 0;
								}
							}
						}
					}
					$data['pkp'] = $pkp < 0 ? 0 : $pkp/12;
					$data['pphyear'] = $pphyear;
					$data['pphmonth'] = round($pphyear/12);
					$data['thp'] = $gross+$data['other']-($data['astek']+$data['jp']+$data['pphmonth'])+$data['meal']+$data['transport']-$data['koperasi'];
					$kondisi1 = array('202004','202005','202006','202007','202008','202009','202010','202011','202012');
					if (in_array($data['periode'], $kondisi1)) {
						if (($gross*12) < 200000000) {
							$data['pphgovmnt'] = $data['pphmonth'];
							$data['thp'] = $gross+$data['other']-($data['astek']+$data['jp']+$data['pphmonth'])+$data['meal']+$data['transport']-$data['koperasi']+$data['pphgovmnt'];
						} //else{
						// 	$data['thp'] = $gross+$data['other']-($data['astek']+$data['jp']+$data['pphmonth'])+$data['meal']+$data['transport']-$data['koperasi'];
						// }
					}
					$data['realthp'] = $data['thp']-$data['loan']-$data['bpjs'];
					$data['biayabank'] = 0;
					$data['total'] = $data['realthp']+$data['biayabank'];
				}else{
					// $data['thr_bonus'] = 0;
					// if($data['code']=='THR'){
						$data['thr_bonus'] = ($data['gaji']+$data['tunjab']+$data['tunskill'])*($data['prc_bonus']/100);
					// }
					$sim = simulasipajak($data['gaji'],$data['tunjab'],$data['tunskill'],$data['thr_bonus'],$data['ptkp']);
					$data['pphyear'] = $sim;
					$data['pphmonth'] = $sim;
					$data['thp'] = $data['thr_bonus']-$data['pphyear'];
					$data['realthp'] = $data['thp'];
					$data['biayabank'] = 0;
					$data['total'] = $data['realthp']+$data['biayabank']; 
				}
				$this->db->insert('payroll',$data);
			}
			return true;
		}
		function simpaneditpayroll($id,$other,$astek,$jp,$bijab,$pkp,$pphyear,$pphmonth,$pphgovmnt,$meal,$transport,$koperasi,$thp,$loan,$realthp,$biayabank,$jamsostek,$editke){
			$data['other'] = keangka($other);
			$data['astek'] = keangka($astek);
			$data['jp'] = keangka($jp);
			$data['bijab'] = keangka($bijab);
			$data['pkp'] = keangka($pkp);
			$data['pphyear'] = keangka($pphyear);
			$data['pphmonth'] = keangka($pphmonth);
			$data['pphgovmnt'] = keangka($pphgovmnt);
			$data['meal'] = keangka($meal);
			$data['transport'] = keangka($transport);
			$data['koperasi'] = keangka($koperasi);
			$data['thp'] = keangka($thp);
			$data['loan'] = keangka($loan);
			$data['realthp'] = keangka($realthp);
			$data['biayabank'] = keangka($biayabank);
			$data['jamsostek'] = keangka($jamsostek);
			$data['editke'] = $editke+1;
			$this->db->where('id',$id);
			$hasil = $this->db->update('payroll',$data);
			if($hasil){
				$query = $this->db->query("select * from payroll where id = ".$id);
			}
			return $query;
		}
		function senddataok($id){
			$this->db->where('id',$id);
			$data['send'] = 1;
			$hasil = $this->db->update('payroll',$data);
			if($hasil){
				$query = $this->db->query("select send from payroll where id = ".$id);
			}
			return $query;
		}
		function senddatang($id){
			$hasil = $this->db->query("update payroll set send=0 where id = ".$id." and hg=0 and mh=0");
			// if($hasil){
				$query = $this->db->query("select * from payroll where id = ".$id);
			// }
			return $query;
		}
		function sendall(){
			$py = $this->session->flashdata('kodepayroll');
			$bl = $py=='SALARY' ? $this->session->flashdata('bulanperiode') : '00';
			$th = $this->session->flashdata('tahunperiode');
			$hasil = $this->db->query("update payroll set send=1 where code = '".$py."' and periode = '".$th.$bl."' ");
			return $hasil;
		}
		function sendmail($id){
			$this->db->where('id',$id);
			$data['sendmail'] = 1;
			$hasil = $this->db->update('payroll',$data);
		}
		public function uploadtransport(){
			$this->load->library('upload');
			$this->uploadConfig = array(
				'upload_path' => LOK_FILE,
				'allowed_types' => '*',
				//'max_size' => max_upload() * 1024,
			);
			// Adakah berkas yang disertakan?
			$adaBerkas = $_FILES['filetransport']['name'];
			if (empty($adaBerkas))
			{
				return NULL;
			}else{
				$fotodulu = FCPATH."assets/FILE/".$_FILES['filetransport']['name'];
				if(file_exists($fotodulu)){
					unlink($fotodulu);
				}
			}
			$uploadData = NULL;
			$this->upload->initialize($this->uploadConfig);
			if ($this->upload->do_upload('filetransport'))
			{
				$uploadData = $this->upload->data();
			}
			else
			{
				$_SESSION['success'] = -1;
				$tidakupload = $this->upload->display_errors(NULL, NULL);
				$this->session->set_flashdata('msgupload',$tidakupload);
			}
			return (!empty($uploadData)) ? $uploadData['file_name'] : 'nophoto.png';
		}
		public function uploadkoperasi(){
			$this->load->library('upload');
			$this->uploadConfig = array(
				'upload_path' => LOK_FILE,
				'allowed_types' => '*',
				//'max_size' => max_upload() * 1024,
			);
			// Adakah berkas yang disertakan?
			$adaBerkas = $_FILES['filekoperasi']['name'];
			if (empty($adaBerkas))
			{
				return NULL;
			}else{
				$fotodulu = FCPATH."assets/FILE/".$_FILES['filekoperasi']['name'];
				if(file_exists($fotodulu)){
					unlink($fotodulu);
				}
			}
			$uploadData = NULL;
			$this->upload->initialize($this->uploadConfig);
			if ($this->upload->do_upload('filekoperasi'))
			{
				$uploadData = $this->upload->data();
			}
			else
			{
				$_SESSION['success'] = -1;
				$tidakupload = $this->upload->display_errors(NULL, NULL);
				$this->session->set_flashdata('msgupload',$tidakupload);
			}
			return (!empty($uploadData)) ? $uploadData['file_name'] : 'nophoto.png';
		}
	}
?>