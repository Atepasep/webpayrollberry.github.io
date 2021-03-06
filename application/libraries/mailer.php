<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    protected $_ci;
    protected $email_pengirim = 'informasi.ifn@gmail.com'; // Isikan dengan email pengirim
    protected $nama_pengirim = 'Email Informasi IFN'; // Isikan dengan nama pengirim
    protected $password = 'akuanakbaik'; // Isikan dengan password email pengirim

    protected $email_penerima = 'atep.saprudin86@gmail.com'; // Isikan dengan email pengirim

    public function __construct(){
        $this->_ci = &get_instance(); // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter

        require_once(APPPATH.'/third_party/phpmailer/Exception.php');
        require_once(APPPATH.'/third_party/phpmailer/PHPMailer.php');
        require_once(APPPATH.'/third_party/phpmailer/SMTP.php');
    }

    public function send(){
        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $this->email_pengirim; // Email Pengirim
        $mail->Password = $this->password; // Isikan dengan Password email pengirim
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPOptions = array(
        	'ssl'=>array(
        		'verify_peer' => false,
        		'verify_peer_name' => false,
        		'allow_self_signed' => true
        	)
        );
        //$mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

        $mail->setFrom($this->email_pengirim, $this->nama_pengirim);
        $mail->addAddress($this->email_penerima, '');
        $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

        $mail->Subject = 'CEK'; //$data['subjek'];
        $mail->Body = 'Ini adalah email contoh'; //$data['content'];
        //$mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email

        $send = $mail->send();

        if($send){ // Jika Email berhasil dikirim
            $response = array('status'=>'Sukses', 'message'=>'Email berhasil dikirim','error'=>null);
        }else{ // Jika Email Gagal dikirim
            $response = array('status'=>'Gagal', 'message'=>'Email gagal dikirim','error'=>$mail->ErrorInfo);
        }

        return $response;
    }

    public function send_with_attachment($data=0){
        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $this->email_pengirim; // Email Pengirim
        $mail->Password = $this->password; // Isikan dengan Password email pengirim
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPOptions = array(
        	'ssl'=>array(
        		'verify_peer' => false,
        		'verify_peer_name' => false,
        		'allow_self_signed' => true
        	)
        );
        // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

        $mail->setFrom($this->email_pengirim, $this->nama_pengirim);
        $mail->addAddress($data['penerima'], '');
        $mail->addBCC('atep.saprudin86@gmail.com', '');
        $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

        $mail->Subject = $data['subjek'];
        $mail->Body = $data['pesan'];
        //$mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email
        $gambar = $data['file']; //FCPATH.'assets\images\gambar.png';
        if(file_exists($gambar)){
        //if($data['attachment']['size'] <= 25000000){ // Jika ukuran file <= 25 MB (25.000.000 bytes)
            //$mail->addAttachment($data['attachment']['tmp_name'], $data['attachment']['name']);
            $mail->addAttachment($gambar, basename($gambar));

            $send = $mail->send();

            if($send){ // Jika Email berhasil dikirim
                $response = array('status'=>'Sukses', 'message'=>'Email berhasil dikirim'.$gambar);
            }else{ // Jika Email Gagal dikirim
                $response = array('status'=>'Gagal', 'message'=>'Email gagal dikirim');
            }
        // }else{ // Jika Ukuran file lebih dari 25 MB
        //     $response = array('status'=>'Gagal', 'message'=>'Ukuran file attachment maksimal 25 MB');
        // }
        }else{
            $response = array('status'=>'Gagal', 'message'=>'File tidak ada'.$gambar);
        }

        return $response;
    }
}