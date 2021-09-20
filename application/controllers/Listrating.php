<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listrating extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('facebook');
		$this->load->Model('Public_model');
    }
	
	public function index()
	{

	   $userProfile = $this->facebook->request('get', '/me?fields=id,name,first_name,last_name,email,gender,locale,picture');
       $head['fb'] = $userProfile ; 
/*
            $data = array('name'=>$userProfile['name'],
                              'email'=>$userProfile['email'],
                              'gambar'=>$userProfile['picture']['data']['url']);*/

        $data['record'] = $this->Public_model->view('rating');
        $data['profileData'] = $this->session->userdata('userProfile');
        //$data = array('al' => $al);
         if( $this->session->userdata('userProfile') == true){
            $cvote = $data['profileData']['email'];
        } elseif(isset($fb['email'])){
          $cvote = $fb['email'];
        } else {
          $cvote = "Not";
        }

		$head['title'] = @$arrSeo['title'];
        $head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $data['pd'] = $this->Public_model->listrating($cvote);
		$this->render('listrating',$head,$data);
  }
 }