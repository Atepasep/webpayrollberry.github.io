<?php
	class Mpersonil extends CI_Model {
		function getdata(){
			$hasil = $this->db->query("select * from karyawan");
			return $hasil;
		}
		function getdatasatu($id){
			$hasil = $this->db->query("select * from karyawan where id =".$id." ");
			return $hasil;
		}
		function simpanpengguna(){
			$data = $_POST;
			$data['modul'] = str_repeat('0', 40);
			for($l=0;$l<=10;$l++){
				$cek = $this->input->post('modul'.$l);
				if($cek=='on'){
					$data['modul'] = substr_replace($data['modul'], '1', $l,1);
				}
				unset($data['modul'.$l]);
			}
			$data['aktiv'] = 0;
			$dek = $this->input->post('aktiv');
			if($dek=='on'){
				$data['aktiv'] = 1; 
			}
			$data['nama'] = $this->input->post('nama');
			$data['jabatan'] = $this->input->post('jabatan');
			$data['username'] = $this->input->post('username');
			$data['pass'] = encrypto($this->input->post('pass'));
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
			$simpan = $this->db->insert('pengguna',$data);
			//getdatabykode($data['kode']);
			if($simpan){
				$hasil = $this->db->query("select * from pengguna where nama ='".$data['nama']."' ");
			}else{
				$hasil = "gagal";
			}
			return $hasil;
		}
		function editpengguna(){
			$data = $_POST;
			$data['modul'] = str_repeat('0', 40);
			for($l=0;$l<=10;$l++){
				$cek = $this->input->post('modul'.$l);
				if($cek=='on'){
					$data['modul'] = substr_replace($data['modul'], '1', $l,1);
				}
				unset($data['modul'.$l]);
			}
			$data['aktiv'] = 0;
			$dek = $this->input->post('aktiv');
			if($dek=='on'){
				$data['aktiv'] = 1; 
			}
			$data['nama'] = $this->input->post('nama');
			$data['jabatan'] = $this->input->post('jabatan');
			$data['username'] = $this->input->post('username');
			$data['pass'] = encrypto($this->input->post('pass'));
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
			$simpan = $this->db->update('pengguna',$data);
			//getdatabykode($data['kode']);
			if($simpan){
				$hasil = $this->db->query("select * from pengguna where id ='".$data['id']."' ");
			}else{
				$hasil = "gagal";
			}
			return $hasil;			
		}
		function hapuspengguna($id){
			$hasil = $this->db->query("select profil from pengguna where id ='".$id."' ")->row();
			$foto_old = $hasil->profil;
			if ($foto_old!='nophoto.png') {
				$fotodulu = FCPATH."assets/images/user/".$foto_old;
				unlink($fotodulu);
			}
			$this->db->where('id',$id);
			$this->db->delete('pengguna');
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