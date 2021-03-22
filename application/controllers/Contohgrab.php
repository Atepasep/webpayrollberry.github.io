<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Contohgrab extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index(){
		$kodeHTML =  bacaHTML('https://www.klikbca.com');
		//$kodeHTML = bacaHTML("https://blog.rosihanari.net");
		$pecah = explode('<table width="139" border="0" cellspacing="0" cellpadding="0">', $kodeHTML);
		$pecahLagi = explode('</table>', $pecah[2]);
 
		echo $pecahLagi[0];
	}
}
