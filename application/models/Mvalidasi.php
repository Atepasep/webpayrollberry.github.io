<?php
	class Mvalidasi extends CI_Model {
		function getdata(){
			$bl = $this->session->flashdata('bulanperiode');
			$th = $this->session->flashdata('tahunperiode');
			$py = $this->session->flashdata('kodepayroll');
			$vl = $this->session->flashdata('kodevalid');
			$hasil = $this->db->query("SELECT a.nama,a.noinduk,c.jabatan as jabatan,d.bagian as bagian,b.* FROM karyawan a
										LEFT JOIN payroll b ON a.id = b.id_karyawan 
										LEFT JOIN jabatan c ON a.jabatan = c.id
										LEFT JOIN bagian d ON a.bagian = d.id
										WHERE b.code = '".$py."' AND b.periode = '".$th.$bl."' and send=1 ");
			return $hasil;
		}
		function getdatasatu($id){
			$bl = $this->session->flashdata('bulanperiode');
			$th = $this->session->flashdata('tahunperiode');
			$py = $this->session->flashdata('kodepayroll');
			$hasil = $this->db->query("SELECT a.nama,a.noinduk,c.jabatan as jabatan,d.bagian as bagian,a.bank,a.bankadr,a.rekname,a.norek,b.* FROM karyawan a
										LEFT JOIN payroll b ON a.id = b.id_karyawan 
										LEFT JOIN jabatan c ON a.jabatan = c.id
										LEFT JOIN bagian d ON a.bagian = d.id
										WHERE b.code = '".$py."' AND b.periode = '".$th.$bl."' and b.id = ".$id);
			return $hasil;
		}
		function valid($id){
			$by = $this->session->flashdata('kodevalid');
			$this->db->where('id',$id);
			$data[$by] = 1;
			$hasil = $this->db->update('payroll',$data);
			if($hasil){
				$query = $this->db->query("select send from payroll where id = ".$id);
			}
			return $query;
		}
		function unvalidoke($id){
			$by = $this->session->flashdata('kodevalid');
			$hasil = $this->db->query("update payroll set ".$by."=0 where id = ".$id." ");
			// if($hasil){
				$query = $this->db->query("select * from payroll where id = ".$id);
			// }
			return $query;
		}
		function validall(){
			$bl = $this->session->flashdata('bulanperiode');
			$th = $this->session->flashdata('tahunperiode');
			$py = $this->session->flashdata('kodepayroll');
			$by = $this->session->flashdata('kodevalid');
			$hasil = $this->db->query("update payroll set ".$by."=1 where code = '".$py."' and periode = '".$th.$bl."' ");
			return $hasil;
		}
	}
?>