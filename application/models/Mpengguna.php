<?php
	class Mpengguna extends CI_Model {
		function getdata(){
			$hasil = $this->db->query("select * from pengguna");
			return $hasil;
		}
		function getdatasatu($id){
			$hasil = $this->db->query("select * from pengguna where id =".$id." ");
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
			$dek = $this->input->post('aktiv');
			if($dek=='on'){
				$data['aktiv'] = 1; 
			}
			$data['nama'] = $this->input->post('nama');
			$data['jabatan'] = $this->input->post('jabatan');
			$data['username'] = $this->input->post('username');
			$data['password'] = encrypto($this->input->post('password'));
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
		function editjabatan(){
			$data = $_POST;
			$data['id'] = $this->input->post('id');
			$data['jabatan'] = $this->input->post('jabatan');
			$this->db->where('id',$data['id']);
			$simpan = $this->db->update('jabatan',$data);
			//getdatabykode($data['kode']);
			if($simpan){
				$hasil = $this->db->query("select * from jabatan where id ='".$data['id']."' ");
			}else{
				$hasil = "gagal";
			}
			return $hasil;			
		}
		function hapuspengguna($id){
			$this->db->where('id',$id);
			$this->db->delete('pengguna');
		}
	}
?>