<?php
	class Mpersonil extends CI_Model {
		function getdata(){
			$hasil = $this->db->query("SELECT karyawan.*,bagian.bagian AS xbagian,jabatan.jabatan AS xjabatan FROM karyawan
					 LEFT JOIN bagian ON bagian.id=karyawan.bagian 
					 LEFT JOIN jabatan ON jabatan.id=karyawan.jabatan");
			return $hasil;
		}
		function getdatasatu($id){
			$hasil = $this->db->query("SELECT karyawan.*,bagian.bagian AS xbagian,jabatan.jabatan AS xjabatan FROM karyawan
					 LEFT JOIN bagian ON bagian.id=karyawan.bagian 
					 LEFT JOIN jabatan ON jabatan.id=karyawan.jabatan where karyawan.id =".$id." ");
			return $hasil;
		}
		function simpanpersonil(){
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
			}else{
				$data['profil'] = 'nophoto.png';
			}
			unset($data['old_logo']);
			unset($data['file_path']);
			unset($data['lokfile']);
			unset($data['id']);
			$simpan = $this->db->insert('karyawan',$data);
			//getdatabykode($data['kode']);
			if($simpan){
				$hasil = $this->db->query("select * from karyawan where noinduk ='".$data['noinduk']."' ");
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
		public function uploadLogo(){
			$this->load->library('upload');
			$this->uploadConfig = array(
				'upload_path' => LOK_UPLOAD_USER,
				'allowed_types' => 'jpg|jpeg|png',
				'max_size' => max_upload() * 1024,
			);
			// Adakah berkas yang disertakan?
			$adaBerkas = $_FILES['logo']['name'];
			if (empty($adaBerkas))
			{
				return NULL;
			}
			$uploadData = NULL;
			$this->upload->initialize($this->uploadConfig);
			if ($this->upload->do_upload('logo'))
			{
				$uploadData = $this->upload->data();
				$namaFileUnik = uniqid('PY').$uploadData['file_ext']; //$uploadData['file_name'];
				$fileRenamed = rename(
					$this->uploadConfig['upload_path'].$uploadData['file_name'],
					$this->uploadConfig['upload_path'].$namaFileUnik
				);
				$uploadData['file_name'] = $fileRenamed ? $namaFileUnik : $uploadData['file_name'];
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