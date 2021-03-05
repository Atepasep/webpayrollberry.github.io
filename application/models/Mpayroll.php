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
			$hasil = $this->db->query("SELECT a.nama,a.noinduk,c.jabatan as jabatan,d.bagian as bagian,b.* FROM karyawan a
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
				$pkp = ((($gross-($data['astek']+$data['jp']+$data['bijab']))/1000)*1000)*12;
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
				$kondisi1 = array('202004','202005','202006','202007','202008','202009','202010','202011','202012');
				if (in_array($data['periode'], $kondisi1)) {
					if (($gross*12) < 200000000) {
						$data['pphgovmnt'] = $data['pphmonth'];
						$data['thp'] = $gross+$data['other']-($data['astek']+$data['jp']+$data['pphmonth'])+$data['meal']+$data['transport']-$data['koperasi']+$data['pphgovmnt'];
					}else{
						$data['thp'] = $gross+$data['other']-($data['astek']+$data['jp']+$data['pphmonth'])+$data['meal']+$data['transport']-$data['koperasi'];
					}
				}
				$data['realthp'] = 0;
				$data['biayabank'] = 0;
				$data['total'] = 0;
				$this->db->insert('payroll',$data);
			}
			return true;
		}
		function simpangaji(){
			$data = $_POST;
			$data['gaji'] = keangka($this->input->post('gaji'));
			$data['tunjab'] = keangka($this->input->post('tunjab'));
			$data['tunskill'] = keangka($this->input->post('tunskill'));
			//$data['id'] = $this->input->post('id');
			$data['dari'] = date('Y-m-d');
			unset($data['xgaji']);
			unset($data['xtunjab']);
			unset($data['xtunskill']);
			$first = $this->db->query("update gaji set sampai=now() where id_karyawan='".$data['id_karyawan']."' and sampai is null ");
			if($first){
				$simpan = $this->db->insert('gaji',$data);
			}
			//getdatabykode($data['kode']);
			if($simpan){
				$hasil = $this->db->query("select * from gaji where id_karyawan ='".$data['id_karyawan']."' and sampai is null ");
			}else{
				$hasil = "gagal";
			}
			return $hasil;
		}
		function editpersonil(){
			$data = $_POST;
			$data['noinduk'] = $this->input->post('noinduk');
			$data['nama'] = $this->input->post('nama');
			$data['jenkel'] = $this->input->post('jenkel');
			$data['tempatlahir'] = $this->input->post('tempatlahir');
			$data['tgllahir'] = tglmysql($this->input->post('tgllahir'));
			$data['identitas'] = $this->input->post('identitas');
			$data['noidentitas'] = $this->input->post('noidentitas');
			$data['alamat'] = $this->input->post('alamat');
			$data['pendidikan'] = $this->input->post('pendidikan');
			$data['email'] = $this->input->post('email');
			$data['notelp'] = $this->input->post('notelp');
			$data['tglmasuk'] = tglmysql($this->input->post('tglmasuk'));
			$data['bagian'] = $this->input->post('bagian');
			$data['jabatan'] = $this->input->post('jabatan');
			$foto = $this->input->post('file_path');
			if(!empty($foto)){
				$data['profil'] = $this->uploadLogo();
				$fotodulu = FCPATH."assets/images/user/".$data['old_logo'];
				if($data['old_logo']!='nophoto.png'){
					unlink($fotodulu);
				}
			}else{
				$data['profil'] = $data['old_logo'];
			}
			unset($data['old_logo']);
			unset($data['file_path']);
			unset($data['lokfile']);
			$this->db->where('id',$data['id']);
			$simpan = $this->db->update('karyawan',$data);
			//getdatabykode($data['kode']);
			if($simpan){
				$hasil = $this->db->query("select * from karyawan where id ='".$data['id']."' ");
			}else{
				$hasil = "gagal";
			}
			return $hasil;			
		}
		function hapuspersonil($id){
			$hasil = $this->db->query("select profil from karyawan where id ='".$id."' ")->row();
			$foto_old = $hasil->profil;
			if ($foto_old!='nophoto.png') {
				$fotodulu = FCPATH."assets/images/user/".$foto_old;
				unlink($fotodulu);
			}
			$this->db->where('id',$id);
			$this->db->delete('karyawan');
		}
		function getpass($id){
			$hasil = $this->db->query("select pass from pengguna where id = '".$id."' ")->row();
			return decrypto($hasil->pass);
		}
	}
?>