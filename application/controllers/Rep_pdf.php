<?php
Class Rep_pdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF_Protection('p','mm','A5');
        $pdf->SetProtection(array('print'), 'qwerty');
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
        $pdf->Cell(65,6,'SALARY Maret 2021',0,0);
        $pdf->SetFont('times','',9);
        $pdf->Cell(65,6,'Tanggal',0,0);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(65,6,'Nama',0,0);
        $pdf->Cell(65,6,': Nama Karyawan',0,0);
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Beneficiary Bank',0,0);
        $pdf->Cell(65,6,': Nama Bank - Cabang Bank',0,0);
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Nomor Rekening',0,0);
        $pdf->Cell(65,6,': Norek',0,0);
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Atas Nama',0,0);
        $pdf->Cell(65,6,': A/N',0,0);
        $pdf->Line(10,58,140,58);
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(65,6,'Gaji Pokok',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Tunjangan Jabatan',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Tunjangan Skill',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Line(70,74,140,74);
        $pdf->SetFont('times','B',9);
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(65,6,'Gaji Kotor',0,0,'C');
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->SetFont('times','',9);
        $pdf->Cell(10,8,'',0,1);
        $pdf->Cell(65,6,'Astek',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Jaminan Pensiun',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Biaya Jabatan',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Penghasilan Tidak Kena Pajak (PTKP)',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Penghasil Kena Pajak (PKP)',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'PPh 21',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,8,'',0,1);
        $pdf->Cell(65,6,'Gaji Kotor',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Astek',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Jaminan Pensiun',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'PPh 21',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,8,'',0,1);
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Transport Allowance',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(65,6,'Koperasi',0,0);
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
        $pdf->Line(70,145,140,145);
        $pdf->SetFont('times','B',9);
        $pdf->Cell(10,8,'',0,1);
        $pdf->Cell(65,6,'Take Home Pay',0,0,'C');
        $pdf->Cell(10,6,'Rp.',0,0);
        $pdf->Cell(40,6,'10,000,000',0,0,'R');
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