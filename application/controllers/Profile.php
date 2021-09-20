<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('facebook');
		$this->load->Model('Public_model');
    }
	
	public function index()
	{
      $data = array();
        $slideD = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
         $head['profileData'] = $this->session->userdata('userProfile');
        $head['title'] = "Profil Anggota";
         $head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
         //       $data['profileData'] = $this->session->userdata('userProfile');
      //  $data['uinfo']  = $this->Public_model->getUserProfileInfo($data['profileData']['email']);
      //  $data['orders'] = $this->Public_model->orders($this->num_rows, $page, $order_by);
if($this->session->userdata('kk_ortu') == true)
    {
      $showuser = $this->session->userdata('kk_ortu');
			$data['uinfo'] = $this->Public_model->usershow($showuser);
     // $data['uinfo']  = $this->session->userdata('username');

   $this->render('profile',$head,$data);
    }else   {
      redirect('login/index');
    }
 }
 public function web()
 {
     $data = array();
       $slideD = array();
       $head = array();
       $arrSeo = $this->Public_model->getSeo('home');
        $head['profileData'] = $this->session->userdata('userProfile');
       $head['title'] = "Profil Anggota";
        $head['tentangweb'] = @$arrSeo['tentangweb'];
       $head['description'] = @$arrSeo['description'];
       $head['keywords'] = str_replace(" ", ",", $head['title']);
       $data['nomorWa'] = $this->Home_admin_model->getValueStore('nomorWa');
        //       $data['profileData'] = $this->session->userdata('userProfile');
     //  $data['uinfo']  = $this->Public_model->getUserProfileInfo($data['profileData']['email']);
     //  $data['orders'] = $this->Public_model->orders($this->num_rows, $page, $order_by);
if($this->session->userdata('kk_ortu') == true)
   {
     $showuser = $this->session->userdata('kk_ortu');
     $data['uinfo'] = $this->Public_model->usershow($showuser);
    // $data['uinfobayi'] = $this->Public_model->userbayi($showuser);
    // $data['uinfoibu'] = $this->Public_model->useribu($showuser);
   //  $data['uinfoayah'] = $this->Public_model->userayah($showuser);
    // $data['uinfopelapor'] = $this->Public_model->userpelapor($showuser);
    // $data['uinfo']  = $this->session->userdata('username');

  $this->render('profileweb',$head,$data);
   }else   {
     redirect('login/index');
   }
}
 public function print($id)
    {
     // $head['profileData'] = $this->session->userdata('userProfile');
   
            $data['sekolah'] = $this->Public_model->get_by_id();
            $data['s'] = $this->Public_model->get_by_id_anggota($id);
            $this->load->view('templates/mobile/print3', $data);
       

    }


}