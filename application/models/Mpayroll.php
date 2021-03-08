<?php
	class Mpayroll extends CI_Model {
		function getdata(){
			$bl = $this->session->flashdata('bulanperiode');
			$th = $this->session->flashdata('tahunperiode');
			$py = $this->session->flashdata('kodepayroll');
			$hasil = $this->db->query("SELECT a.nama,a.noinduk,c.jabatan as jabatan,d.bagian as bagian,b.* FROM karyawan a
										LEFT JOIN payroll b ON a.id = b.id_karyawan 
										LEFT JOIN jabatan c ON a.jabatan = c.id
										LEFT JOIN bagian d ON a.bagian = d.id
										WHERE b.code = '".$py."' AND b.periode = '".$th.$bl."' ");
			return $hasil;
		}
		function getdatasatu($id){
			$bl = $this->session->flashdata('bulanperiode');
			$th = $this->session->flashdata('tahunperiode');
			$py = $this->session->flashdata('kodepayroll');
			$hasil = $this->db->query("SELECT a.nama,a.noinduk,c.jabatan as jabatan,d.bagian as bagian,a.bank,a.bankadr,a.rekname,a.norek,b.* FROM karyawan a
										LEFT JOIN payroll b ON a.id = b.id_karyawan 
										LEFT JOIN jabatan c ON a.jabatan = c.id
										LEFT JOIN bagian d ON a.bagian = d.id
										WHERE b.code = '".$py."' AND b.periode = '".$th.$bl."' and b.id = ".$id);
			return $hasil;
		}
		function daftargajisatu($id){
			$hasil = $this->db->query("select * from gaji where id_karyawan =".$id." ");
			return $hasil;
		}
		function simpanpayroll($id){
			$data = $_POST;
			$data['periode'] = $data['tahunperiode'].$data['bulanperiode'];
			unset($data['bulanperiode']);
			unset($data['tahunperiode']);
			unset($data['xcode']);
			unset($data['xbulanperiode']);
			unset($data['xtahunperiode']);
			unset($data['filekoperasi']);
			unset($data['filepathkoperasi']);
			unset($data['filetransport']);
			unset($data['filepathtransport']);
			if($id=1){
				$this->db->query("delete from payroll where periode = '".$data['periode']."' ");
			}
			$datakaryawan = $this->db->query("SELECT a.id AS xid_karyawan,a.nama,a.ptkp as kodeptkp,c.ptkp,b.* FROM karyawan a
												LEFT JOIN gaji b on a.id = b.id_karyawan
												LEFT JOIN ptkp c ON a.ptkp = c.kodeptkp
												WHERE b.sampai IS null ")->result_array();
			foreach ($datakaryawan as $karyawan) {
				$data['id_karyawan'] = $karyawan['xid_karyawan'];
				$data['gaji'] = $karyawan['gaji'];
				$data['tunjab'] = $karyawan['tunjab'];
				$data['tunskill'] = $karyawan['tunskill'];
				$gross = $data['gaji']+$data['tunjab']+$data['tunskill'];
				$data['astek'] = round($gross*0.02);
				$maxgaji = $data['periode'] == '202003' ? 8939700 : 8512400;
				$data['jp'] = $gross>$maxgaji ? round($maxgaji*0.01) : round($gross*0.01);
				$data['bijab'] = ($gross*0.05)<500000 ? $gross*0.05 : 500000; 
				$data['ptkp'] = $karyawan['ptkp'];
				$pkp = ((($gross-($data['astek']+$data['jp']+$data['bijab']+$karyawan['ptkp']))/1000)*1000)*12;
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
				$data['thp'] = $gross-($data['astek']+$data['jp']+$data['pphmonth']);
				$kondisi1 = array('202004','202005','202006','202007','202008','202009','202010','202011','202012');
				if (in_array($data['periode'], $kondisi1)) {
					if (($gross*12) < 200000000) {
						$data['pphgovmnt'] = $data['pphmonth'];
						$data['thp'] = $gross+$data['other']-($data['astek']+$data['jp']+$data['pphmonth'])+$data['meal']+$data['transport']-$data['koperasi']+$data['pphgovmnt'];
					}else{
						$data['thp'] = $gross+$data['other']-($data['astek']+$data['jp']+$data['pphmonth'])+$data['meal']+$data['transport']-$data['koperasi'];
					}
				}
				$data['realthp'] = $data['thp']; //-$data['loan']-$data['bpjs'];
				$data['biayabank'] = 0;
				$data['total'] = 0;
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
			$bl = $this->session->flashdata('bulanperiode');
			$th = $this->session->flashdata('tahunperiode');
			$py = $this->session->flashdata('kodepayroll');
			$hasil = $this->db->query("update payroll set send=1 where code = '".$py."' and periode = '".$th.$bl."' ");
			return $hasil;
		}
	}
?>