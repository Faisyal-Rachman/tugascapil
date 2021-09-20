<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//require 'PHPMailer/src/PHPMailerAutoload.php';
 require 'PHPMailer/src/Exception.php';
                require 'PHPMailer/src/PHPMailer.php';
                require 'PHPMailer/src/SMTP.php';

class SendMail
{

    public $mail;

    public function __construct()
    {
        
        $this->mail= new PHPMailer\PHPMailer\PHPMailer();
		//$this->mail = new PHPMailer; 
		$this->mail->isSMTP(); 
		// $this->mail->SMTPDebug = 2; 
		$this->mail->Debugoutput = 'html'; 
		$this->mail->Host = 'ssl://smtp.gmail.com'; 
		$this->mail->Port = 465; 
	//	$this->mail->SMTPSecure = 'tls'; 
		$this->mail->SMTPAuth = true; 
		$this->mail->Username = "faipagun@gmail.com";  //email
		$this->mail->Password = "Tarakan1984";
		$this->mail->CharSet = 'UTF-8';
    }

    public function sendTo($toEmail, $recipientName, $subject, $msg)
    {
        
        $this->mail->setFrom('tefabogasmk@gmail.com', 'Tefa Boga');
        $this->mail->addAddress($toEmail, $recipientName);
        $this->mail->addAddress('tefabogasmk@gmail.com', 'PESANAN DARI' . $recipientName);
        //$this->mail->isHTML(true); 
        $this->mail->Subject = $subject;
        $this->mail->Body = $msg;
        if (!$this->mail->send()) {
            log_message('error', 'Mailer Error: ' . $this->mail->ErrorInfo);
            return false;
        }
        return true;
    }

}
