<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
    }

    public function index()
    {
        $head = array();
        $data = array();
        if (isset($_POST['message'])) {
            $result = $this->sendEmail();
			$this->Public_model->setEmail($data);
            if ($result) {
                $this->session->set_flashdata('resultSend', 'Email is sened!');
                $this->email->print_debugger();
            } else {
                $this->session->set_flashdata('resultSend', 'Email send error!');
            }
            redirect('contacts');
        }
		$id = 1;
        $data['id'] = $id;
        $head['title'] = 'Administration - Publish Blog Post';
        $head['description'] = '!';
        $head['keywords'] = '';
        //$data['languages'] = $this->Languages_model->getLanguages();
        //$data['trans_load'] = $trans_load;
        $data['googleMaps'] = $this->Home_admin_model->getValueStore('googleMaps');
        $data['googleApi'] = $this->Home_admin_model->getValueStore('googleApi');
        $arrSeo = $this->Public_model->getSeo('contacts');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $this->render('contacts', $head, $data);
    }

    public function sendEmail()
  {
$ci = get_instance();
$config['protocol'] = "smtp";
$config['smtp_host'] = "ssl://smtp.googlemail.com";
$config['smtp_port'] = "465";
$config['smtp_user'] = "faisal.paguntaka@gmail.com";
$config['smtp_pass'] = "tarakan84";
$config['charset'] = "utf-8";
$config['mailtype'] = "html";
$config['starttls'] = "true";
$config['newline'] = "\n";
$ci->email->initialize($config);
$ci->email->from('faipagun@gmail.com', 'Rumahweb');
$list = array('websitetarakan@gmail.com');
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
