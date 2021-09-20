<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends MY_Controller
{
    private $num_rows = 5;

    public function __construct()
    {
         parent::__construct();
        $this->load->Model('admin/Brands_model');
        $this->load->Model('admin/Galeri_model');
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
    public function loundry24jamtarakan($page = 0) {
		 $data = array();
		  $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
		
		 $head['title'] = 'Toko Online di Tarakan '. @$arrSeo['title'];
        $head['description'] = 'Toko Online di Tarakan '.@$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
		  $sliderDepan = $this->Public_model->getsSlide();
		    $data['products'] = $this->Public_model->getProducts($this->num_rows, $page, $_GET);
			 $data['productsloundry'] = $this->Public_model->getProductsLoundry($this->num_rows, $page, $_GET);
			  $data['productsloundrysatuan'] = $this->Public_model->getProductsLoundrySatuan($this->num_rows, $page, $_GET);
			  $data['productsloundrytas'] = $this->Public_model->getProductsLoundryTas($this->num_rows, $page, $_GET);
        $slideD = array('sliderDepan' => $sliderDepan);
	  $this->render('product', $head, $data, $slideD);
	}
	 public function serviceskomputertarakan($page = 0) {
		 	 $data = array();
		  $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
		
		 $head['title'] = 'Toko Online di Tarakan '. @$arrSeo['title'];
        $head['description'] = 'Toko Online di Tarakan '.@$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
		  $sliderDepan = $this->Public_model->getsSlide();
		    $data['products'] = $this->Public_model->getProducts($this->num_rows, $page, $_GET);
			 $data['servicess'] = $this->Public_model->getServices($this->num_rows, $page, $_GET);
			  $data['productsloundrysatuan'] = $this->Public_model->getProductsLoundrySatuan($this->num_rows, $page, $_GET);
			  $data['productsloundrytas'] = $this->Public_model->getProductsLoundryTas($this->num_rows, $page, $_GET);
        $slideD = array('sliderDepan' => $sliderDepan);
	  $this->render('serviceskomputers', $head, $data, $slideD);
	}
	 public function jasabersihkanrumahtarakan($page = 0) {
		 	 $data = array();
		  $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
		
		 $head['title'] = 'Toko Online di Tarakan '. @$arrSeo['title'];
        $head['description'] = 'Toko Online di Tarakan '.@$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
		  $sliderDepan = $this->Public_model->getsSlide();
		    $data['products'] = $this->Public_model->getProducts($this->num_rows, $page, $_GET);
			 $data['jasabersih'] = $this->Public_model->getJasaBersih($this->num_rows, $page, $_GET);
	$data['jasabersihpribadi'] = $this->Public_model->getJasaBersihPribadi($this->num_rows, $page, $_GET);
			  $data['productsloundrysatuan'] = $this->Public_model->getProductsLoundrySatuan($this->num_rows, $page, $_GET);
			  $data['productsloundrytas'] = $this->Public_model->getProductsLoundryTas($this->num_rows, $page, $_GET);
        $slideD = array('sliderDepan' => $sliderDepan);
	  $this->render('jasabersih', $head, $data, $slideD);
	}
	public function makanan24jamtarakan($page = 0) {
		 $data = array();
		  $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
		
		 $head['title'] = 'Toko Online di Tarakan '. @$arrSeo['title'];
        $head['description'] = 'Toko Online di Tarakan '.@$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
		  $sliderDepan = $this->Public_model->getsSlide();
		    $data['products'] = $this->Public_model->getProducts($this->num_rows, $page, $_GET);
			 $data['productsloundry'] = $this->Public_model->getProductsLoundry($this->num_rows, $page, $_GET);
			  $data['productsloundrysatuan'] = $this->Public_model->getProductsLoundrySatuan($this->num_rows, $page, $_GET);
			   $data['productsloundrytas'] = $this->Public_model->getProductsLoundryTas($this->num_rows, $page, $_GET);
        $slideD = array('sliderDepan' => $sliderDepan);
	  $this->render('produkmakanan', $head, $data, $slideD);
	}
	public function artikel($page = 0) {
		 $data = array();
		  $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
		
		 $head['title'] = 'Toko Online di Tarakan '. @$arrSeo['title'];
        $head['description'] = 'Toko Online di Tarakan '.@$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
		 if (isset($_GET['find'])) {
            $find = $_GET['find'];
        } else {
            $find = null;
        }
        if (isset($_GET['from']) && isset($_GET['to'])) {
            $month = $_GET;
        } else {
            $month = null;
        }
		
		$al = $this->Public_model->getsA();
		$data = array('al' => $al);
		  $data['sliderDepan'] = $this->Public_model->getsSlide();
		   $data['posts'] = $this->Public_model->getPosts($this->num_rows, $page);
			 $rowscount = $this->Galeri_model->galeriCount();
	 $data['links_pagination'] = pagination('informasi/artikel', $rowscount, $this->num_rows, 5);
	  $this->render('artikel', $head, $data);
	}
}
