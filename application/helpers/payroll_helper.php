<?php 
	define('LOK_PAGE',base_url().'assets/');
	define('LOK_UPLOAD_USER',"./assets/images/user/");
	define('LOK_FOTO_USER',base_url().'assets/images/user/');
	define('LOK_FOTO',base_url().'assets/images/');
	define('LOK_UPLOAD_MESIN',"./assets/images/user/FOTO/");
	define('LOK_FILE',"./assets/FILE/");

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
	function getkodepayroll($id){
		$hasil = '';
		switch ($id) {
			case 1:
				$hasil = 'SALARY';
				break;
			case 2:
				$hasil = 'THR';
				break;
			case 3:
				$hasil = 'BONUS';
				break;
			default:
				# code...
				break;
		}
		return $hasil;
	}
	function simulasipajak($gaji,$tunjab,$tunskill,$thrbonus,$ptkp){
			$xGross = ($gaji+$tunjab+$tunskill)*12;
			$xAstek = $xGross*0.02;
			$docek = $xGross>(8094000*12) ? (8094000*12) : $xGross;
			$xJp = $docek * 0.01;
			$xbijab = ($xGross*0.05)<6000000 ? $xGross*0.05 : 6000000;
			$xptkp = $ptkp;  
			$xpkp = (($xGross-($xAstek+$xJp+$xbijab+$xptkp))/1000)*1000;
			$xpphyear = 0;
			if($xpkp > 500000000){
				$xpphyear = 95000000+(($xpkp-500000000)*0.3);
			}else{
				if ($xpkp > 250000000) {
					$xpphyear = 32500000+(($xpkp-250000000)*0.25);
				}else{
					if ($xpkp > 50000000) {
						$xpphyear = 2500000+(($xpkp-50000000)*0.15);
					}else{
						if ($xpkp > 0) {
							$xpphyear = $xpkp*0.05;
						}else{
							$xpphyear = 0;
						}
					}
				}
			}

			$yGross = (($gaji+$tunjab+$tunskill)*12)+$thrbonus;
			$yAstek = $yGross*0.02;
			$docik = $yGross>(8094000*12) ? (8094000*12) : $yGross;
			$yJp = $docik * 0.01;
			$ybijab = ($yGross*0.05)<6000000 ? $yGross*0.05 : 6000000;
			$yptkp = $ptkp;  
			$ypkp = (($yGross-($yAstek+$yJp+$ybijab+$yptkp))/1000)*1000;
			$ypphyear = 0;
			if($ypkp > 500000000){
				$ypphyear = 95000000+(($ypkp-500000000)*0.3);
			}else{
				if ($ypkp > 250000000) {
					$ypphyear = 32500000+(($ypkp-250000000)*0.25);
				}else{
					if ($ypkp > 50000000) {
						$ypphyear = 2500000+(($ypkp-50000000)*0.15);
					}else{
						if ($ypkp > 0) {
							$ypphyear = $ypkp*0.05;
						}else{
							$ypphyear = 0;
						}
					}
				}
			}

			return $ypphyear-$xpphyear;	
		}
?>