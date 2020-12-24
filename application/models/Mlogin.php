<?php
	class Mlogin extends CI_Model {
		function ceklogin($a,$b){
			$hasil = $this->db->query("select * from karyawan where username ='".$a."' and password ='".$b."' ");
			return $hasil;
		}
	}
?>