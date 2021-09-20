<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MY_Controller
{
    private $num_rows = 20;

    public function __construct()
    {
         parent::__construct();
        $this->load->Model('admin/Brands_model');
        $this->load->Model('Public_model');
    }

    public function index($page = 0)
    {
       $data = array();
        $slideD = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
        $head['title'] = @$arrSeo['title'];
        $head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
       
        $data['galeri'] = $this->Public_model->getsGaleri($this->num_rows, $page, $_GET);
        $rowscount = $this->Public_model->galeriCount($_GET);
       
        $data['links_pagination'] = pagination('galeri', $rowscount, $this->num_rows);
        $this->render('galeri', $head, $data);
    }

   public function shop($page = 0)
    {
        $data = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('shop');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $all_categories = $this->Public_model->getShopCategories();
        $data['home_categories'] = $this->getHomeCategories($all_categories);
        $data['all_categories'] = $all_categories;
         $sliderDepan = $this->Public_model->getsSlide();
        $slideD = array('sliderDepan' => $sliderDepan);
        $data['showBrands'] = $this->Home_admin_model->getValueStore('showBrands');
        $data['brands'] = $this->Brands_model->getBrands();
        $data['showOutOfStock'] = $this->Home_admin_model->getValueStore('outOfStock');
        $data['shippingOrder'] = $this->Home_admin_model->getValueStore('shippingOrder');
        $data['galeri'] = $this->Public_model->getsGaleri($this->num_rows, $page, $_GET);
        $rowscount = $this->Public_model->galeriCount($_GET);
        $data['links_pagination'] = pagination('galeri', $rowscount, $this->num_rows);
        $this->render('galeri', $head, $data, $slideD);
    }

}
