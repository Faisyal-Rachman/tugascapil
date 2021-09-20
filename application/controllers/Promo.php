<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends MY_Controller
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
            } else {
                $this->session->set_flashdata('resultSend', 'Email send error!');
            }
            redirect('promo');
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
        $this->render('promo', $head, $data);
    }

    private function sendEmail()
    {
        $myEmail = $this->Home_admin_model->getValueStore('contactsEmailTo');
        if (filter_var($myEmail, FILTER_VALIDATE_EMAIL) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
           
           $ci = get_instance();
$config['protocol'] = "smtp";
$config['smtp_host'] = "ssl://smtp.gmail.com";
$config['smtp_port'] = "465";
$config['smtp_user'] = "faipagun@gmail.com";
$config['smtp_pass'] = "faisyalrachman";
$config['charset'] = "utf-8";
$config['mailtype'] = "html";
$config['newline'] = "\r\n";
$ci->email->initialize($config);
$ci->email->from('faipagun@gmail.com', 'TEFA BOGA SMKN 1 TARAKAN');
$list = array('faipagun@gmail.com');
$ci->email->to($list);
$ci->email->subject($_POST['subject']);
$ci->email->message($_POST['message']);
           /*
            $this->load->library('email');

            $this->email->from($_POST['email'], $_POST['name']);
            $this->email->to($myEmail);

            $this->email->subject($_POST['subject']);
            $this->email->message($_POST['message']);
*/
            $this->email->send();
            return true;
            
        }
        return false;
    }

}
