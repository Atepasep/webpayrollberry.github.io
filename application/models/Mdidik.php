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
	}
?>