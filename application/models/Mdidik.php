<?php
	class Mdidik extends CI_Model {
		function getdata(){
			$hasil = $this->db->query("select * from pendidikan ");
			return $hasil;
		}
		function getdatasatu($id){
			$hasil = $this->db->query("select * from pendidikan where id =".$id." ");
			return $hasil;
		}
		function simpandidik($kode,$pendidikan){
			$data = $_POST;
			$data['kode'] = $this->input->post('kode');
			$data['pendidikan'] = $this->input->post('pendidikan');
			$sukses = $this->db->insert('pendidikan',$data);
			if($sukses){
				$this->db->where('kode',$kode);
				$hasil = $this->db->get('pendidikan');
				return $hasil;
			}	
		}
	}
?>