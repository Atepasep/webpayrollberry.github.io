<?php
	class Mjabatan extends CI_Model {
		function getdata(){
			$hasil = $this->db->query("select * from jabatan ");
			return $hasil;
		}
		function getdatasatu($id){
			$hasil = $this->db->query("select * from jabatan where id =".$id." ");
			return $hasil;
		}
		function simpanjabatan(){
			$data = $_POST;
			$data['jabatan'] = $this->input->post('jabatan');
			unset($data['id']);
			$simpan = $this->db->insert('jabatan',$data);
			//getdatabykode($data['kode']);
			if($simpan){
				$hasil = $this->db->query("select * from jabatan where jabatan ='".$data['jabatan']."' ");
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
		function hapusjabatan($id){
			$this->db->where('id',$id);
			$this->db->delete('jabatan');
		}
	}
?>