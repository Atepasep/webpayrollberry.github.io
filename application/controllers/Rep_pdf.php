<?php
Class Rep_pdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('p','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        $pdf->Image(base_url().'assets/images/gambar.jpeg',10,10,-300);
        // mencetak string 
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(25);
        $pdf->Cell(110,5,'PT. INDONEPTUNE NET MANUFACTURING',10,1,'L');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(25);
        $pdf->Cell(110,5,'Factory',0,1);
        $pdf->Line(10,30,140,30);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('times','B',9);
        $pdf->Cell(65,6,'SALARY Maret 2021',1,0);
        $pdf->SetFont('times','',9);
        $pdf->Cell(65,6,'Tanggal',1,0);
        // $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
        // $pdf->Cell(27,6,'NO HP',1,0);
        // $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        // $pdf->SetFont('Arial','',10);
        // $mahasiswa = $this->db->get('karyawan')->result();
        // foreach ($mahasiswa as $row){
        //     $pdf->Cell(20,6,$row->noinduk,1,0);
        //     $pdf->Cell(85,6,$row->nama,1,0);
        //     $pdf->Cell(27,6,$row->ptkp,1,0);
        //     $pdf->Cell(25,6,$row->tgllahir,1,1); 
        // }
        $pdf->Output();
    }
}