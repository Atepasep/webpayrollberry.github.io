<?php
Class Rem_email extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('mailer');
    }
    
    function index(){
        $send = $this->mailer->send();
        echo "<b>".$send['status']."</b><br />";    
        echo $send['message'];
    }
}