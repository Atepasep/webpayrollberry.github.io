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
            $array1 = [];
            while ($record = $table->nextRecord()) {
                $a = $record->get('noinduk');
                $b = $record->get('total');
                $array1[$a] = $b;
                //$x = array($a=>$b);
                //$array1 = array_merge($array1,$x);
                //or
                //echo $record->my_column;
            }
            return $array1;
        }
    }
?>