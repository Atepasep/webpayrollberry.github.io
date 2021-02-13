<?php
	class Mmastergaji extends CI_Model {
		function getdata(){
			$hasil = $this->db->query("SELECT a.id as id_personil,a.noinduk,a.nama,c.bagian,d.jabatan,b.* FROM karyawan a
										LEFT JOIN bagian c ON a.bagian = c.id
										LEFT JOIN jabatan d ON a.jabatan = d.id
										left JOIN gaji b ON a.id = b.id_karyawan where b.sampai is null");
			return $hasil;
		}
		function getdatasatu($id){
			$hasil = $this->db->query("select * from gaji where id_karyawan =".$id." and sampai is null ");
			return $hasil;
		}
		function daftargajisatu($id){
			$hasil = $this->db->query("select * from gaji where id_karyawan =".$id." ");
			return $hasil;
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