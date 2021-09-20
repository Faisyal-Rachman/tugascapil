<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller
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
		$kategori			= $this->Public_model->readKategori($slug_kategori_berita);
		$id_kategori_berita	= $kategori->id_kategori_berita;
		$data['galerinew'] = $this->Public_model->getsGaleriNew($id_kategori_berita);
		$data['productcam'] = $this->Public_model->getsGaleriCam($id_kategori_berita);
        $rowscount = $this->Public_model->galeriCount($_GET);
       
        $data['links_pagination'] = pagination('galeri', $rowscount, $this->num_rows);
        $this->render('product', $head, $data);
    }

   public function shop($page = 0)
    {
        $data = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('shop');
        $head['title'] = 'Toko Online di Tarakan '.@$arrSeo['title'];
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
		$data['galerinew'] = $this->Public_model->getsGaleriNew($id_kategori_berita);
		$data['productcam'] = $this->Public_model->getsGaleriCam($id_kategori_berita);
        $this->render('product', $head, $data, $slideD);
    }
    public function loundry24jamtarakan($id_kategori_berita) {
		 $data = array();
		  $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
		//motorcycle
		$data['productcam'] = $this->Public_model->getsGaleriCam($id_kategori_berita);
		$data['galeriscooter'] = $this->Public_model->getsGaleriScooter();
		$data['galeriunderbone'] = $this->Public_model->getsGaleriUnderbone();
		$data['galeribackbone'] = $this->Public_model->getsGaleriBackbone();
		$data['galerisemua'] = $this->Public_model->getsGaleriSemua();
		// automobile
		$data['galeripassenger'] = $this->Public_model->getsGaleriPassenger();
		$data['galericommercial'] = $this->Public_model->getsGaleriCommercial();
		$data['galerimobil'] = $this->Public_model->getsGaleriMobil();
		// nozomi
		$data['galerikaroseri'] = $this->Public_model->getsGaleriKaroseri();
		$data['galerinozomi'] = $this->Public_model->getsGaleriNozomi();
		$data['galeristandart'] = $this->Public_model->getsGaleriStandart();
		 $head['title'] = 'Toko Online di Tarakan '. @$arrSeo['title'];
        $head['description'] = 'Toko Online di Tarakan '.@$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
		  $sliderDepan = $this->Public_model->getsSlide();
        $slideD = array('sliderDepan' => $sliderDepan);
	  $this->render('product', $head, $data, $slideD);
	}
}
