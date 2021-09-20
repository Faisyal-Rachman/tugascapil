<?php class Kirimmail extends MY_Controller { 
public function __construct() { 
parent::__construct(); $this->load->library('email'); //tambahkan dalam contruct pemanggil libarary mail
}
function sendMail() 
{
$ci = get_instance();
$config['protocol'] = "smtp";
$config['smtp_host'] = "ssl://smtp.gmail.com";
$config['smtp_port'] = "465";
$config['smtp_user'] = "tefabogasmk@gmail.com";
$config['smtp_pass'] = "Tidak@rahasia";
$config['charset'] = "utf-8";
$config['mailtype'] = "html";
$config['newline'] = "\r\n";
$ci->email->initialize($config);
$ci->email->from('tefabogasmk@gmail.com', 'TEFA BOGA SMKN 1 TARAKAN');
$list = array('tefabogasmk@gmail.com');
$ci->email->to($list);
$ci->email->subject('judul email');
$ci->email->message('isi email');
if ($this->email->send()) {
echo 'Email sent.';
} else {
show_error($this->email->print_debugger());
}
}

}