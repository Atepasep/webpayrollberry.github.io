<?php
	class Mbagian extends CI_Model {
		function getdata(){
			$hasil = $this->db->query("select * from bagian ");
			return $hasil;
		}
		function getdatasatu($id){
			$hasil = $this->db->query("select * from bagian where id =".$id." ");
			return $hasil;
		}
		function simpanbagian(){
			$data = $_POST;
			$data['kode'] = $this->input->post('kode');
			$data['bagian'] = $this->input->post('bagian');
			unset($data['id']);
			$simpan = $this->db->insert('bagian',$data);
			//getdatabykode($data['kode']);
			if($simpan){
				$hasil = $this->db->query("select * from bagian where kode ='".$data['kode']."' ");
			}else{
				$hasil = "gagal";
			}
			return $hasil;
		}
		function editbagian(){
			$data = $_POST;
			$data['id'] = $this->input->post('id');
			$data['kode'] = $this->input->post('kode');
			$data['bagian'] = $this->input->post('bagian');
			$this->db->where('id',$data['id']);
			$simpan = $this->db->update('bagian',$data);
			//getdatabykode($data['kode']);
			if($simpan){
				$hasil = $this->db->query("select * from bagian where id ='".$data['id']."' ");
			}else{
				$hasil = "gagal";
			}
			return $hasil;			
		}
		function hapusbagian($id){
			$this->db->where('id',$id);
			$this->db->delete('bagian');
		}
	}
?>