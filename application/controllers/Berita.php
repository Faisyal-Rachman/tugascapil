<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Berita extends MY_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->Model('admin/Brands_model');
		$this->load->Model('Public_model');
    }

	public function index(){
		$data = array();
        $slideD = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
        $head['title'] = @$arrSeo['title'];
		$head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
		$data['record'] = $this->Public_model->view('rating');
		$this->render('view_berita',$head,$data);
	}

	function tambah_rating(){
		if ($this->input->post('rating')!=''){
	$data = array('id_berita'=>$this->input->post('id'),'rating'=>$this->input->post('rating'),'user'=>$this->input->post('user'));
	     //   $data = array('user'=>$this->input->post('user'));
	       // $where = array('id_berita' => $this->input->post('id'));
		$this->Public_model->update('rating', $data);
		}
	}
}