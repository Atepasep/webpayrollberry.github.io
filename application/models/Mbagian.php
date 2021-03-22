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
		function getgroup($id){
			$hasil = $this->db->query("select * from grp where id_bagian =".$id." ");
			return $hasil;
		}
		function simpangroup($id,$kode,$nama){
			$simpan = $this->db->query("insert into grp (id_bagian,kode_grp,grp) values (".$id.",'".$kode."','".$nama."') ");
			if($simpan){
				$hasil = $this->db->query("select * from grp where id_bagian = ".$id." ");
			}else{
				$hasil = "gagal";
			}
			return $hasil;
		}
		function hapusgroup($id){
			$hasil = $this->db->query("select * from grp where id = ".$id)->row();
			$this->db->where('id',$id);
			$this->db->delete('grp');
			//$hasil = $this->db->query("select * from grp where id_bagian = ".$id." ");
			return $hasil->id_bagian;
		}
	}
?>