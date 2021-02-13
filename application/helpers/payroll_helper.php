<?php 
	define('LOK_PAGE',base_url().'assets/');
	define('LOK_UPLOAD_USER',"./assets/images/user/");
	define('LOK_FOTO_USER',base_url().'assets/images/user/');
	define('LOK_FOTO',base_url().'assets/images/');
	define('LOK_UPLOAD_MESIN',"./assets/images/user/FOTO/");

	function max_upload(){
		$max_filesize = (int) (ini_get('upload_max_filesize'));
		$max_post     = (int) (ini_get('post_max_size'));
		$memory_limit = (int) (ini_get('memory_limit'));
		return min($max_filesize, $max_post, $memory_limit);
	}

	function rupiah($nomor,$dec){
		if($nomor == '0' || $nomor == ''){
			$hasil = '';
		}else{
			$hasil = number_format($nomor,$dec,'.',',');
		}
		return $hasil;
	}
	function keangka($rp){
		return str_replace(',', '', $rp);
	}

	function caricek($ini,$ke){
		$kata = '';
		if(substr($ini, $ke-1,1)=='1'){
			$kata = 'checked';
		}
		return $kata;
	}

	function namabulan($i){
		$bulan = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');
		return $bulan[(int)$i];
	}

	function tglmysql($tgl){
		if($tgl == ''){
			$rubah = '';
		}else{
			$x = explode('-',$tgl);
			$rubah = $x[2].'-'.$x[1].'-'.$x[0];
		}
		return $rubah;
	}
	function jikanol($angka){
		$hasil = $angka;
		if($angka <= 0){
			$hasil = '-';
		}
		return $hasil;
	}
	function jikangka($min){
		$hasil = $min;
		if($hasil == '00:00'){
			$hasil = '-';
		}
		return $hasil;
	}
?>