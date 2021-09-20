<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loginfb extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('facebook');
    }
	
	public function index()
	{
		
		if($this->facebook->is_authenticated()){
			$userProfile = $this->facebook->request('get', '/me?fields=id,name,first_name,last_name,email,gender,locale,picture');

			$data = array('name'=>$userProfile['name'],
							  'email'=>$userProfile['email'],
							  'gambar'=>$userProfile['picture']['data']['url']);
			 $head['title'] = @$arrSeo['title'];
        $head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
			$this->render('homefb',$head,$data);

		}
		else
		{
			 $head['title'] = @$arrSeo['title'];
        $head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
			$data['authUrl'] =  $this->facebook->login_url();
			$this->render('loginfb',$head,$data);
        }
	    
    }

	public function logout() {
		$this->facebook->destroy_session();
		redirect('/loginfb');
    }
}
