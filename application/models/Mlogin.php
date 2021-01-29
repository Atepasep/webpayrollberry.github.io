<?php
	class Mlogin extends CI_Model {
		function ceklogin($a,$b){
			$hasil = $this->db->query("select * from pengguna where username!='' and pass!='' and username ='".$a."' and pass ='".$b."' and aktiv=1 ");
			return $hasil;
		}
	}
?>