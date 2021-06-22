<?php defined('BASEPATH') OR exit('No direct script access allowed');

    use XBase\TableReader;

    class Dbf {
        protected $_ci;
        public function __construct(){
            $this->_ci = &get_instance(); // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter
        }

        public function bacadbf($file=0){
            $table = new TableReader($file);
            $isi = '';
            while ($record = $table->nextRecord()) {
                $isi .= $record->get('nama');
                //or
                //echo $record->my_column;
            }
            return $isi;
        }
    }
?>