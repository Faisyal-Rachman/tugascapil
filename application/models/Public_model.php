<?php

class Public_model extends CI_Model
{

    private $showOutOfStock;
    private $showInSliderProducts;
    private $multiVendor;

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Home_admin_model');
        $this->showOutOfStock = $this->Home_admin_model->getValueStore('outOfStock');
        $this->showInSliderProducts = $this->Home_admin_model->getValueStore('showInSlider');
        $this->multiVendor = $this->Home_admin_model->getValueStore('multiVendor');
		
    }

    public function productsCount($big_get)
    {
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        if (!empty($big_get) && isset($big_get['category'])) {
            $this->getFilter($big_get);
        }
        $this->db->where('visibility', 1);
        if ($this->showOutOfStock == 0) {
            $this->db->where('quantity >', 0);
        }
        if ($this->showInSliderProducts == 0) {
            $this->db->where('in_slider', 0);
        }
        
        return $this->db->count_all_results('products');
    }
public function galeriCount($big_get)
    {
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        if (!empty($big_get) && isset($big_get['category'])) {
            $this->getFilter($big_get);
        }
        $this->db->select('vendors.url as vendor_url, galeri.id,galeri.image, galeri_translations.title, galeri.galeri_categorie, galeri.url');
        $this->db->join('galeri_translations', 'galeri_translations.for_id = galeri.id', 'left');
        $this->db->join('vendors', 'vendors.id = galeri.vendor_id', 'left');
        $this->db->where('galeri_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        if ($vendor_id !== false) {
            $this->db->where('vendor_id', $vendor_id);
        }
       
        if ($this->multiVendor == 0) {
            $this->db->where('vendor_id', 0);
        }
        $k="oke";
        $this->db->order_by('galeri_categorie', 'asc');
        $query = $this->db->get('galeri');
        return $query->result_array();
     
    }

    public function get_by_id()
    {
        return $this->db->get_where('value_store', ['id' => 26])->row_array();
    }
    public function get_by_id_anggota($id)
    {
        $this->db->select('*');
        $this->db->join('provinces','provinces.idprov = kta.kode_provinsi');
        return $this->db->get_where('kta', ['idkta' => $id])->row_array();
    }
		  //Kategori
	public function getsGaleriUnderbone() {
		$this->db->select('shop_categories_translations.for_id , shop_categories_translations.name, shop_categories_translations.flag,shop_categories_translations.model,
products.shop_categorie, products.id, products.url');
		$this->db->from('shop_categories_translations');
		// Join
		$this->db->join('products','products.shop_categorie = shop_categories_translations.for_id');
		// End join
		$this->db->where('shop_categories_translations.model','Underbone');
		$query = $this->db->get();
		 return $query->result_array();
	}
	public function getsGaleriBackbone() {
		$this->db->select('shop_categories_translations.for_id , shop_categories_translations.name, shop_categories_translations.flag,shop_categories_translations.model,
products.shop_categorie, products.id, products.url');
		$this->db->from('shop_categories_translations');
		// Join
		$this->db->join('products','products.shop_categorie = shop_categories_translations.for_id');
		// End join
		$this->db->where('shop_categories_translations.model','Backbone');
		$query = $this->db->get();
		 return $query->result_array();
	}
	public function getsGaleriSemua() {
		$this->db->select('shop_categories_translations.for_id , shop_categories_translations.name, shop_categories_translations.flag,shop_categories_translations.model,
products.shop_categorie, products.id, products.url');
		$this->db->from('shop_categories_translations');
		// Join
		$this->db->join('products','products.shop_categorie = shop_categories_translations.for_id');
		// End join
		
		$this->db->like('shop_categories_translations.model', 'Backbone');
		$this->db->or_like('shop_categories_translations.model', 'Underbone');
		$this->db->or_where('shop_categories_translations.model', 'Scooter');
		$query = $this->db->get();
		 return $query->result_array();
	}
	public function getsGaleriPassenger() {
		$this->db->select('shop_categories_translations.for_id , shop_categories_translations.name, shop_categories_translations.flag,shop_categories_translations.model,
products.shop_categorie, products.id, products.url');
		$this->db->from('shop_categories_translations');
		// Join
		$this->db->join('products','products.shop_categorie = shop_categories_translations.for_id');
		// End join
		$this->db->where('shop_categories_translations.model','Passenger Car');
		$query = $this->db->get();
		 return $query->result_array();
	}
		public function getsGaleriCommercial() {
		$this->db->select('shop_categories_translations.for_id , shop_categories_translations.name, shop_categories_translations.flag,shop_categories_translations.model,
products.shop_categorie, products.id, products.url');
		$this->db->from('shop_categories_translations');
		// Join
		$this->db->join('products','products.shop_categorie = shop_categories_translations.for_id');
		// End join
		$this->db->where('shop_categories_translations.model','Commercials Car');
		$query = $this->db->get();
		 return $query->result_array();
	}
		public function getsGaleriMobil() {
		$this->db->select('shop_categories_translations.for_id , shop_categories_translations.name, shop_categories_translations.flag,shop_categories_translations.model,
products.shop_categorie, products.id, products.url');
		$this->db->from('shop_categories_translations');
		// Join
		$this->db->join('products','products.shop_categorie = shop_categories_translations.for_id');
		// End join
		
		$this->db->like('shop_categories_translations.model', 'Passenger Car');
		$this->db->or_like('shop_categories_translations.model', 'Commercials Car');
		$query = $this->db->get();
		 return $query->result_array();
	}
public function getsGaleriKaroseri() {
		$this->db->select('shop_categories_translations.for_id , shop_categories_translations.name, shop_categories_translations.flag,shop_categories_translations.model,
products.shop_categorie, products.id, products.url');
		$this->db->from('shop_categories_translations');
		// Join
		$this->db->join('products','products.shop_categorie = shop_categories_translations.for_id');
		// End join
		
		$this->db->where('shop_categories_translations.model','Nozomi Karoseri');
		
		$query = $this->db->get();
		 return $query->result_array();
	}
	public function getsGaleriNozomi() {
		$this->db->select('shop_categories_translations.for_id , shop_categories_translations.name, shop_categories_translations.flag,shop_categories_translations.model,
products.shop_categorie, products.id, products.url');
		$this->db->from('shop_categories_translations');
		// Join
		$this->db->join('products','products.shop_categorie = shop_categories_translations.for_id');
		// End join
		$this->db->like('shop_categories_translations.model', 'Nozomi Standart');
		$this->db->or_like('shop_categories_translations.model', 'Nozomi Karoseri');
		$query = $this->db->get();
		 return $query->result_array();
	}
	public function getsGaleriStandart() {
		$this->db->select('shop_categories_translations.for_id , shop_categories_translations.name, shop_categories_translations.flag,shop_categories_translations.model,
products.shop_categorie, products.id, products.url');
		$this->db->from('shop_categories_translations');
		// Join
		$this->db->join('products','products.shop_categorie = shop_categories_translations.for_id');
		// End join
		
		$this->db->where('shop_categories_translations.model','Nozomi Standart');
		
		$query = $this->db->get();
		 return $query->result_array();
	}
	public function getsGaleriCam($id_kategori_berita) {
		$this->db->select('shop_categories_translations.*,shop_categories.id');
		$this->db->from('shop_categories_translations');
		// Join
		$this->db->join('shop_categories','shop_categories_translations.for_id = shop_categories.id');
		$this->db->where('shop_categories_translations.for_id',$id_kategori_berita);
		$query = $this->db->get();
		 return $query->result_array();
	}
		public function getsGaleriScooter() {
		$this->db->select('shop_categories_translations.for_id , shop_categories_translations.name, shop_categories_translations.flag,shop_categories_translations.model,
products.shop_categorie, products.id, products.url');
		$this->db->from('shop_categories_translations');
		// Join
		$this->db->join('products','products.shop_categorie = shop_categories_translations.for_id');
		// End join
		$this->db->where('shop_categories_translations.model','Scooter');
		$query = $this->db->get();
		 return $query->result_array();
	}
    public function getNewProducts()
    {
        $this->db->select('vendors.url as vendor_url, products.id, products.quantity, products.image, products.url, products_translations.price, products_translations.title, products_translations.old_price');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
        $this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('products.in_slider', 0);
        $this->db->where('visibility', 1);
        if ($this->showOutOfStock == 0) {
            $this->db->where('quantity >', 0);
        }
        $this->db->order_by('products.id', 'desc');
        $this->db->limit(5);
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function getLastBlogs()
    {
        $this->db->limit(5);
        $this->db->join('blog_translations', 'blog_translations.for_id = blog_posts.id', 'left');
        $this->db->where('blog_translations.abbr', MY_LANGUAGE_ABBR);
        $query = $this->db->select('blog_posts.id, blog_translations.title, blog_translations.description, blog_posts.url, blog_posts.time, blog_posts.image')->get('blog_posts');
        return $query->result_array();
    }

    public function getPosts($limit, $page)
    {
       
        $this->db->join('galeri_translations', 'galeri_translations.for_id = galeri.id', 'left');
       // $this->db->where('galeri_translations.abbr', MY_LANGUAGE_ABBR);
        $query = $this->db->select('galeri.id, galeri_translations.title, galeri_translations.description, galeri.url, galeri.time, galeri.image')->get('galeri', $limit, $page);
        return $query->result_array();
    }
    public function getsA()
    {
	$query = $this->db->query("SELECT id,image,title,tanggal,jnk,agama FROM siswa 
WHERE DATE_FORMAT(tanggal,'%m %d') BETWEEN DATE_FORMAT((INTERVAL 4 DAY + CURDATE()),'%m %d')
AND DATE_FORMAT((INTERVAL 30 DAY + CURDATE()),'%m %d') ORDER BY DATE_FORMAT(tanggal,'%m %d');
")->result();
 return $query;
 }
     public function getsSlide()
    {
     $this->db->select('*');
       $this->db->order_by('id', 'asc');
               $query = $this->db->get('slider');
        return $query->result_array();
      }

 public function getBerita()
    {
        
        $this->db->select('vendors.url as vendor_url, galeri.id,galeri.image, galeri_translations.title, galeri.galeri_categorie, galeri.url as url');
        $this->db->join('galeri_translations', 'galeri_translations.for_id = galeri.id', 'left');
        $this->db->join('vendors', 'vendors.id = galeri.vendor_id', 'left');
        $this->db->where('galeri_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
    
        $k="oke";
        $this->db->order_by('galeri_categorie', 'asc');
        $query = $this->db->get('galeri');
        return $query->result_array();
     
      }

    public function getProducts($limit = null, $start = null, $big_get, $vendor_id = false)
    {
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        if (!empty($big_get) && isset($big_get['category'])) {
            $this->getFilter($big_get);
        }
        $this->db->select('vendors.url as vendor_url, products.id,products.image, products.quantity, products_translations.title, products_translations.price, products_translations.old_price, products.url');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
        $this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
         $this->db->where('products.shop_categorie', 3 );
		$this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        
		$k="oke";
        $this->db->order_by('position', 'asc');
        $query = $this->db->get('products');
        return $query->result_array();
    }
  public function getProductsLoundry($limit = null, $start = null, $big_get, $vendor_id = false)
    {
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        if (!empty($big_get) && isset($big_get['category'])) {
            $this->getFilter($big_get);
        }
        $this->db->select('vendors.url as vendor_url, products.id,products.image, products.quantity, products_translations.title, products_translations.price, products_translations.old_price, products.url');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
		$this->db->join('shop_categories_translations', 'shop_categories_translations.for_id = products.shop_categorie', 'left');
       $this->db->where('products.shop_categorie', 4 );
		$this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        
		$k="oke";
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('products');
        return $query->result_array();
    }
     public function getServices($limit = null, $start = null, $big_get, $vendor_id = false)
    {
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        if (!empty($big_get) && isset($big_get['category'])) {
            $this->getFilter($big_get);
        }
        $this->db->select('vendors.url as vendor_url, products.id,products.image, products.quantity, products_translations.title, products_translations.price, products_translations.old_price, products.url');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
		$this->db->join('shop_categories_translations', 'shop_categories_translations.for_id = products.shop_categorie', 'left');
       $this->db->where('products.shop_categorie', 5 );
		$this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        
		$k="oke";
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('products');
        return $query->result_array();
    }
 public function getJasaBersih($limit = null, $start = null, $big_get, $vendor_id = false)
    {
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        if (!empty($big_get) && isset($big_get['category'])) {
            $this->getFilter($big_get);
        }
        $this->db->select('vendors.url as vendor_url, products.id,products.image, products.quantity, products_translations.title, products_translations.price, products_translations.old_price, products.url');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
		$this->db->join('shop_categories_translations', 'shop_categories_translations.for_id = products.shop_categorie', 'left');
       $this->db->where('products.shop_categorie', 6 );
		$this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        
		$k="oke";
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getJasaBersihPribadi($limit = null, $start = null, $big_get, $vendor_id = false)
    {
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        if (!empty($big_get) && isset($big_get['category'])) {
            $this->getFilter($big_get);
        }
        $this->db->select('vendors.url as vendor_url, products.id,products.image, products.quantity, products_translations.title, products_translations.price, products_translations.old_price, products.url');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
		$this->db->join('shop_categories_translations', 'shop_categories_translations.for_id = products.shop_categorie', 'left');
       $this->db->where('products.shop_categorie', 7 );
		$this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        
		$k="oke";
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getDaftar($limit = null, $start = null, $big_get, $vendor_id = false)
    {
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        if (!empty($big_get) && isset($big_get['category'])) {
            $this->getFilter($big_get);
        }
        $this->db->select('vendors.url as vendor_url, products.id,products.image, products.quantity, products_translations.title, products_translations.price, products_translations.old_price, products.url');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
		$this->db->join('shop_categories_translations', 'shop_categories_translations.for_id = products.shop_categorie', 'left');
       $this->db->where('products.shop_categorie', 7 );
		$this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        
		$k="oke";
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('products');
        return $query->result_array();
    }
	 public function getProductsLoundrySatuan($limit = null, $start = null, $big_get, $vendor_id = false)
    {
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        if (!empty($big_get) && isset($big_get['category'])) {
            $this->getFilter($big_get);
        }
        $this->db->select('vendors.url as vendor_url, products.id,products.image, products.quantity, products_translations.title, products_translations.price, products_translations.old_price, products.url');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
        $this->db->join('shop_categories_translations', 'shop_categories_translations.for_id = products.shop_categorie', 'left');
       $this->db->where('products.shop_categorie', 2 );
        $this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        
		$k="oke";
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getProductsLoundryTas($limit = null, $start = null, $big_get, $vendor_id = false)
    {
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        if (!empty($big_get) && isset($big_get['category'])) {
            $this->getFilter($big_get);
        }
        $this->db->select('vendors.url as vendor_url, products.id,products.image, products.quantity, products_translations.title, products_translations.price, products_translations.old_price, products.url');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
        $this->db->join('shop_categories_translations', 'shop_categories_translations.for_id = products.shop_categorie', 'left');
       $this->db->where('products.shop_categorie', 1 );
        $this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        
		$k="oke";
        $this->db->order_by('id', 'asc');
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getOneLanguage($myLang)
    {
        $this->db->select('*');
        $this->db->where('abbr', $myLang);
        $result = $this->db->get('languages');
        return $result->row_array();
    }
    public function getDaftarIsri($limit){
        return $this->db->get('provinces')->result(); // Tampilkan semua data yang ada di tabel provinsi
      }
     public function Kotalist($id_provinsi)
      {
          $this->db->where('province_id', $id_provinsi);
          $this->db->order_by('id', 'ASC');
          return $this->db->from('regencies')
              ->get()
              ->result();
      }
    private function getFilter($big_get)
    {

        if ($big_get['category'] != '') {
            (int) $big_get['category'];
            $findInIds = array();
            $findInIds[] = $big_get['category'];
            $query = $this->db->query('SELECT id FROM shop_categories WHERE sub_for = ' . $this->db->escape($big_get['category']));
            foreach ($query->result() as $row) {
                $findInIds[] = $row->id;
            }
            $this->db->where_in('products.shop_categorie', $findInIds);
        }
        if ($big_get['in_stock'] != '') {
            if ($big_get['in_stock'] == 1)
                $sign = '>';
            else
                $sign = '=';
            $this->db->where('products.quantity ' . $sign, '0');
        }
        if ($big_get['search_in_title'] != '') {
            $this->db->like('products_translations.title', $big_get['search_in_title']);
        }
        if ($big_get['search_in_body'] != '') {
            $this->db->like('products_translations.description', $big_get['search_in_body']);
        }
        if ($big_get['order_price'] != '') {
            $this->db->order_by('products_translations.price', $big_get['order_price']);
        }
        if ($big_get['order_procurement'] != '') {
            $this->db->order_by('products.procurement', $big_get['order_procurement']);
        }
        if ($big_get['order_new'] != '') {
            $this->db->order_by('products.id', $big_get['order_new']);
        } else {
            $this->db->order_by('products.id', 'DESC');
        }
        if ($big_get['quantity_more'] != '') {
            $this->db->where('products.quantity > ', $big_get['quantity_more']);
        }
        if ($big_get['quantity_more'] != '') {
            $this->db->where('products.quantity > ', $big_get['quantity_more']);
        }
        if ($big_get['brand_id'] != '') {
            $this->db->where('products.brand_id = ', $big_get['brand_id']);
        }
        if ($big_get['added_after'] != '') {
            $time = strtotime($big_get['added_after']);
            $this->db->where('products.time > ', $time);
        }
        if ($big_get['added_before'] != '') {
            $time = strtotime($big_get['added_before']);
            $this->db->where('products.time < ', $time);
        }
        if ($big_get['price_from'] != '') {
            $this->db->where('products_translations.price >= ', $big_get['price_from']);
        }
        if ($big_get['price_to'] != '') {
            $this->db->where('products_translations.price <= ', $big_get['price_to']);
        }
    }
    
    public function getShopCategories()
    {
        $this->db->select('shop_categories.sub_for, shop_categories.id, shop_categories_translations.name');
        $this->db->where('abbr', MY_LANGUAGE_ABBR);
        $this->db->order_by('position', 'asc');
        $this->db->join('shop_categories', 'shop_categories.id = shop_categories_translations.for_id', 'INNER');
        $query = $this->db->get('shop_categories_translations');
        $arr = array();
        if ($query !== false) {
            foreach ($query->result_array() as $row) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public function getSeo($page)
    {
        $this->db->where('page_type', $page);
        $this->db->where('abbr', MY_LANGUAGE_ABBR);
        $query = $this->db->get('seo_pages_translations');
        $arr = array();
        if ($query !== false) {
            foreach ($query->result_array() as $row) {
                $arr['title'] = $row['title'];
                $arr['description'] = $row['description'];
				$arr['tentangweb'] = $row['tentangweb'];
            }
        }
        return $arr;
    }
 public function getOneGaleri($id)
    {
        $this->db->where('galeri.id', $id);

        $this->db->select('vendors.url as vendor_url, galeri.*, galeri_translations.title,galeri_translations.description, galeri.url, galeri_categories_translations.name as categorie_name');

        $this->db->join('galeri_translations', 'galeri_translations.for_id = galeri.id', 'left');
        $this->db->where('galeri_translations.abbr', MY_LANGUAGE_ABBR);

        $this->db->join('galeri_categories_translations', 'galeri_categories_translations.for_id = galeri.galeri_categorie', 'inner');
        $this->db->where('galeri_categories_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->join('vendors', 'vendors.id = galeri.vendor_id', 'left');
        $this->db->where('visibility', 1);
        $query = $this->db->get('galeri');
        return $query->row_array();
    }

    public function getOneProduct($id)
    {
        $this->db->where('products.id', $id);

        $this->db->select('vendors.url as vendor_url, products.*, products_translations.title,products_translations.description, products_translations.price,products_translations.point, products_translations.old_price, products.url, shop_categories_translations.name as categorie_name');

        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);

        $this->db->join('shop_categories_translations', 'shop_categories_translations.for_id = products.shop_categorie', 'inner');
        $this->db->where('shop_categories_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
        $this->db->where('visibility', 1);
        $query = $this->db->get('products');
        return $query->row_array();
    }
public function getOneInfo($id)
    {
         $this->db->where('galeri.id', $id);

        $this->db->select('vendors.url as vendor_url, galeri.*, galeri_translations.title,galeri_translations.description, galeri.url, galeri_categories_translations.name as categorie_name');

        $this->db->join('galeri_translations', 'galeri_translations.for_id = galeri.id', 'left');
        $this->db->where('galeri_translations.abbr', MY_LANGUAGE_ABBR);

        $this->db->join('galeri_categories_translations', 'galeri_categories_translations.for_id = galeri.galeri_categorie', 'inner');
        $this->db->where('galeri_categories_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->join('vendors', 'vendors.id = galeri.vendor_id', 'left');
        $this->db->where('visibility', 1);
        $query = $this->db->get('galeri');
        return $query->row_array();
    }
    public function getCountQuantities()
    {
        $query = $this->db->query('SELECT SUM(IF(quantity<=0,1,0)) as out_of_stock, SUM(IF(quantity>0,1,0)) as in_stock FROM products WHERE visibility = 1');
        return $query->row_array();
    }

    public function view($table){
        return $this->db->get($table);
    }
    public function updatekta($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }
    public function update($table, $data, $where){
        return $this->db->insert($table, $data, $where); 
    }
 public function listrating($email){
$this->db->select('rating.id_berita,rating.rating, rating.user, products.image, products.url, products_translations.title, products_translations.for_id,products_translations.price,products_translations.old_price');
         $this->db->join('products_translations', 'products_translations.for_id = rating.id_berita');
          $this->db->join('products', 'products.id = products_translations.for_id');
          $this->db->group_by('rating.id_berita');
          $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->where('rating.user', $email);
        $query = $this->db->get('rating');
        return $query->result_array();
    }

    public function getShopItems($array_items)
    {
        $this->db->select('products.id, products.image, products.url, products.quantity, products_translations.price, products_translations.point, products_translations.title');
        $this->db->from('products');
        if (count($array_items) > 1) {
            $i = 1;
            $where = '';
            foreach ($array_items as $id) {
                $i == 1 ? $open = '(' : $open = '';
                $i == count($array_items) ? $or = '' : $or = ' OR ';
                $where .= $open . 'products.id = ' . $id . $or;
                $i++;
            }
            $where .= ')';
            $this->db->where($where);
        } else {
            $this->db->where('products.id =', current($array_items));
        }
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'inner');
        $this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
     * Users for notification by email
     */

    public function getNotifyUsers()
    {
        $result = $this->db->query('SELECT email FROM users_public WHERE notify = 1');
        $arr = array();
        foreach ($result->result_array() as $email) {
            $arr[] = $email['email'];
        }
        return $arr;
    }
    public function orders($order_by)
    {
        if ($order_by != null) {
            $this->db->order_by($order_by, 'DESC');
        } else {
            $this->db->order_by('id', 'DESC');
        }
        $this->db->select('orders.*, orders_clients.first_name,'
                . ' orders_clients.last_name, orders_clients.email, orders_clients.phone, '
                . 'orders_clients.address, orders_clients.city, orders_clients.post_code,'
                . ' orders_clients.notes, discount_codes.type as discount_type, discount_codes.amount as discount_amount');
        $this->db->join('orders_clients', 'orders_clients.for_id = orders.id', 'inner');
        $this->db->join('discount_codes', 'discount_codes.code = orders.discount_code', 'left');
        $result = $this->db->get('orders');
        return $result->result_array();
    }

    public function setOrder($post)
    {
        $q = $this->db->query('SELECT MAX(order_id) as order_id FROM orders');
        $rr = $q->row_array();
        if ($rr['order_id'] == 0) {
            $rr['order_id'] = 1233;
        }
        $post['order_id'] = $rr['order_id'] + 1;

        $i = 0;
        $post['products'] = array();
        foreach ($post['id'] as $product) {
            $post['products'][$product] = $post['quantity'][$i];
            $i++;
        }
         
        unset($post['id'], $post['quantity']);
        $post['date'] = time();
        $post['products'] = serialize($post['products']);
        $this->db->trans_begin();
        if (!$this->db->insert('orders', array(
                    'order_id' => $post['order_id'],
                    'products' => $post['products'],
                    'date' => $post['date'],
                    'referrer' => $post['referrer'],
                    'clean_referrer' => $post['clean_referrer'],
                    'payment_type' => $post['payment_type'],
                    'paypal_status' => @$post['paypal_status'],
                    'discount_code' => @$post['discountCode'],
                    'user_id' => $post['user_id']
                ))) {
            log_message('error', print_r($this->db->error(), true));
        }
        $lastId = $this->db->insert_id();
        if (!$this->db->insert('orders_clients', array(
                    'for_id' => $lastId,
                    'first_name' => $post['first_name'],
                    'last_name' => $post['last_name'],
                    'email' => $post['email'],
                    'phone' => $post['phone'],
                    'address' => $post['address'],
                    'city' => $post['city'],
                    'post_code' => $post['post_code'],
                    'notes' => $post['notes']
                ))) {
            log_message('error', print_r($this->db->error(), true));
        }
        if($post['payment_type']=='cashOnDelivery'){
        $this->db->where('email', $post['email']);

        if (!$this->db->update('users_public', array(
                    'point' => $post['pointakhir']
                )))
                 {
            log_message('error', print_r($this->db->error(), true));
        }
    }elseif($post['payment_type']=='pointOnDelivery'){
        $this->db->where('email', $post['email']);

        if (!$this->db->update('users_public', array(
                    'point' => $post['pakaiPoint']
                )))
                 {
            log_message('error', print_r($this->db->error(), true));
        }
    }else{
        echo "NO";
    }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return $post['order_id'];
        }
    }

    public function setVendorOrder($post)
    {
        $i = 0;
        $post['products'] = array();
        foreach ($post['id'] as $product) {
            $post['products'][$product] = $post['quantity'][$i];
            $i++;
        }

        /*
         * Loop products and check if its from vendor - save order for him
         */
        foreach ($post['products'] as $product_id => $product_quantity) {
            $productInfo = $this->getOneProduct($product_id);
            if ($productInfo['vendor_id'] > 0) {

                $q = $this->db->query('SELECT MAX(order_id) as order_id FROM vendors_orders');
                $rr = $q->row_array();
                if ($rr['order_id'] == 0) {
                    $rr['order_id'] = 1233;
                }
                $post['order_id'] = $rr['order_id'] + 1;


                unset($post['id'], $post['quantity']);
                $post['date'] = time();
                $post['products'] = serialize(array($product_id => $product_quantity));
                $this->db->trans_begin();
                if (!$this->db->insert('vendors_orders', array(
                            'order_id' => $post['order_id'],
                            'products' => $post['products'],
                            'date' => $post['date'],
                            'referrer' => $post['referrer'],
                            'clean_referrer' => $post['clean_referrer'],
                            'payment_type' => $post['payment_type'],
                            'paypal_status' => @$post['paypal_status'],
                            'discount_code' => @$post['discountCode'],
                            'vendor_id' => $productInfo['vendor_id']
                        ))) {
                    log_message('error', print_r($this->db->error(), true));
                }
                $lastId = $this->db->insert_id();
                if (!$this->db->insert('vendors_orders_clients', array(
                            'for_id' => $lastId,
                            'first_name' => $post['first_name'],
                            'last_name' => $post['last_name'],
                            'email' => $post['email'],
                            'phone' => $post['phone'],
                            'address' => $post['address'],
                            'city' => $post['city'],
                            'post_code' => $post['post_code'],
                            'notes' => $post['notes']
                        ))) {
                    log_message('error', print_r($this->db->error(), true));
                }
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return false;
                } else {
                    $this->db->trans_commit();
                }
            }
        }
    }
 public function setEmail($post)
   {
        $this->db->trans_begin();
        $is_update = false;
     
            $i = 0;
        
            if (!$this->db->insert('blog_posts', array(
                        
                        'time' => time()
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
            $id = $this->db->insert_id();
            $this->db->where('id', $id);
        
        
        $this->setMailTranslations($post);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            show_error(lang('database_error'));
        } else {
            $this->db->trans_commit();
        }
    }
    public function buat_kode()   {

        $this->db->select('RIGHT(kta.id,4) as kode', FALSE);
        $this->db->order_by('id','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('kta');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
         //jika kode ternyata sudah ada.      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
        }
        else {      
         //jika kode belum ada      
         $kode = 1;    
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = "ISRI-9921-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
        return $kodejadi;  
  }
  public function cek_login($username,$password,$table){
    return $this->db->query("SELECT * FROM $table where kk_ortu='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
}
public function usershow($username){
    $this->db->select('*');
   $this->db->join('tbl_bayi', 'tbl_bayi.no_kk1 = ortu_kk.kk_ortu', 'left');
   $this->db->join('tbl_ibu', 'tbl_ibu.no_kk2 = ortu_kk.kk_ortu', 'left');
   $this->db->join('tbl_ayah', 'tbl_ayah.no_kk3 = ortu_kk.kk_ortu', 'left');
   $this->db->join('tbl_pelapor', 'tbl_pelapor.no_kk4 = ortu_kk.kk_ortu', 'left');
   $this->db->join('tbl_saksi1', 'tbl_saksi1.no_kk5 = ortu_kk.kk_ortu', 'left');
   $this->db->join('tbl_saksi2', 'tbl_saksi2.no_kk6 = ortu_kk.kk_ortu', 'left');
     $this->db->where('kk_ortu', $username);
   $query = $this->db->get('ortu_kk');
   return $query->result_array();
   }
   /*
   public function userbayi($nokk){
    $this->db->select('*');
  //  $this->db->join('provinces', 'provinces.idprov = kta.kode_provinsi', 'left');
 //   $this->db->join('regencies', 'regencies.id = kta.kota', 'left');
   $this->db->where('no_kk1', $nokk);
   $query = $this->db->get('tbl_bayi');
   return $query->result_array();
   }
   public function useribu($nokk){
    $this->db->select('*');
  //  $this->db->join('provinces', 'provinces.idprov = kta.kode_provinsi', 'left');
 //   $this->db->join('regencies', 'regencies.id = kta.kota', 'left');
   $this->db->where('no_kk2', $nokk);
   $query = $this->db->get('tbl_ibu');
   return $query->result_array();
   }
   public function userayah($nokk){
    $this->db->select('*');
  //  $this->db->join('provinces', 'provinces.idprov = kta.kode_provinsi', 'left');
 //   $this->db->join('regencies', 'regencies.id = kta.kota', 'left');
   $this->db->where('no_kk3', $nokk);
   $query = $this->db->get('tbl_ayah');
   return $query->result_array();
   }
   public function userpelapor($nokk){
    $this->db->select('*');
  //  $this->db->join('provinces', 'provinces.idprov = kta.kode_provinsi', 'left');
 //   $this->db->join('regencies', 'regencies.id = kta.kota', 'left');
   $this->db->where('no_kk4', $nokk);
   $query = $this->db->get('tbl_palpor');
   return $query->result_array();
   }
   */
	 private function setMailTranslations($post)
    {
$emergency_insert = true;
            $arr = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
				'subject' =>$_POST['subject'],
				'message' => $_POST['message']
				
               
            );
            if ($emergency_insert === false) {
                 if (!$this->db->insert('kontak', $post)) {
                    log_message('error', print_r($this->db->error(), true));
                }
            } else {
                if (!$this->db->insert('kontak', $arr)) {
                    log_message('error', print_r($this->db->error(), true));
                }
            }
  
        
    }
    public function setActivationLink($link, $orderId)
    {
        $result = $this->db->insert('confirm_links', array('link' => $link, 'for_order' => $orderId));
        return $result;
    }

    public function getSliderProducts()
    {
        $this->db->select('vendors.url as vendor_url, products.id, products.quantity, products.image, products.url, products_translations.price, products_translations.title, products_translations.basic_description, products_translations.old_price');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
        $this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        $this->db->where('in_slider', 1);
        if ($this->showOutOfStock == 0) {
            $this->db->where('quantity >', 0);
        }
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function getbestSellers($categorie = 0, $noId = 0)
    {
        $this->db->select('vendors.url as vendor_url, products.id, products.quantity, products.image, products.url, products_translations.price, products_translations.title, products_translations.old_price');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
        if ($noId > 0) {
            $this->db->where('products.id !=', $noId);
        }
        $this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        if ($categorie != 0) {
            $this->db->where('products.shop_categorie !=', $categorie);
        }
        $this->db->where('visibility', 1);
        if ($this->showOutOfStock == 0) {
            $this->db->where('quantity >', 0);
        }
        $this->db->order_by('products.procurement', 'desc');
        $this->db->limit(5);
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function sameCagegoryProducts($categorie, $noId, $vendor_id = false)
    {
        $this->db->select('vendors.url as vendor_url, products.id, products.quantity, products.image, products.url, products_translations.price, products_translations.title, products_translations.old_price');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
        $this->db->where('products.id !=', $noId);
        if ($vendor_id !== false) {
            $this->db->where('vendor_id', $vendor_id);
        }
        $this->db->where('products.shop_categorie =', $categorie);
        $this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        if ($this->showOutOfStock == 0) {
            $this->db->where('quantity >', 0);
        }
        $this->db->order_by('products.id', 'desc');
        $this->db->limit(5);
        $query = $this->db->get('products');
        return $query->result_array();
    }
public function sameCagegoryGaleri($categorie, $noId, $vendor_id = false)
    {
        $this->db->select('vendors.url as vendor_url, galeri.id, galeri.quantity, galeri.image, galeri.url, galeri_translations.price, galeri_translations.title, galeri_translations.old_price');
        $this->db->join('galeri_translations', 'galeri_translations.for_id = galeri.id', 'left');
        $this->db->join('vendors', 'vendors.id = galeri.vendor_id', 'left');
        $this->db->where('galeri.id !=', $noId);
        if ($vendor_id !== false) {
            $this->db->where('vendor_id', $vendor_id);
        }
        $this->db->where('galeri.shop_categorie =', $categorie);
        $this->db->where('galeri_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        if ($this->showOutOfStock == 0) {
            $this->db->where('quantity >', 0);
        }
        $this->db->order_by('galeri.id', 'desc');
        $this->db->limit(5);
        $query = $this->db->get('galeri');
        return $query->result_array();
    }

    public function getOnePost($id)
    {
        $this->db->select('blog_translations.title, blog_translations.description, blog_posts.image, blog_posts.time');
        $this->db->where('blog_posts.id', $id);
        $this->db->join('blog_translations', 'blog_translations.for_id = blog_posts.id', 'left');
        $this->db->where('blog_translations.abbr', MY_LANGUAGE_ABBR);
        $query = $this->db->get('blog_posts');
        return $query->row_array();
    }

    public function getArchives()
    {
        $result = $this->db->query("SELECT DATE_FORMAT(FROM_UNIXTIME(time), '%M %Y') as month, MAX(time) as maxtime, MIN(time) as mintime FROM blog_posts GROUP BY DATE_FORMAT(FROM_UNIXTIME(time), '%M %Y')");
        if ($result->num_rows() > 0) {
            return $result->result_array();
        }
        return false;
    }

    public function getFooterCategories()
    {
        $this->db->select('shop_categories.id, shop_categories_translations.name');
        $this->db->where('abbr', MY_LANGUAGE_ABBR);
        $this->db->where('shop_categories.sub_for =', 0);
        $this->db->join('shop_categories', 'shop_categories.id = shop_categories_translations.for_id', 'INNER');
        $this->db->limit(10);
        $query = $this->db->get('shop_categories_translations');
        $arr = array();
        if ($query !== false) {
            foreach ($query->result_array() as $row) {
                $arr[$row['id']] = $row['name'];
            }
        }
        return $arr;
    }

    public function setSubscribe($array)
    {
        $num = $this->db->where('email', $arr['email'])->count_all_results('subscribed');
        if ($num == 0) {
            $this->db->insert('subscribed', $array);
        }
    }

    public function getDynPagesLangs($dynPages)
    {
        if (!empty($dynPages)) {
            $this->db->join('textual_pages_tanslations', 'textual_pages_tanslations.for_id = active_pages.id', 'left');
            $this->db->where_in('active_pages.name', $dynPages);
            $this->db->where('textual_pages_tanslations.abbr', MY_LANGUAGE_ABBR);
            $result = $this->db->select('textual_pages_tanslations.name as lname, active_pages.name as pname')->get('active_pages');
            $ar = array();
            $i = 0;
            foreach ($result->result_array() as $arr) {
                $ar[$i]['lname'] = $arr['lname'];
                $ar[$i]['pname'] = $arr['pname'];
                $i++;
            }
            return $ar;
        } else
            return $dynPages;
    }

    public function getOnePage($page)
    {
        $this->db->join('textual_pages_tanslations', 'textual_pages_tanslations.for_id = active_pages.id', 'left');
        $this->db->where('textual_pages_tanslations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('active_pages.name', $page);
        $result = $this->db->select('textual_pages_tanslations.description as content, textual_pages_tanslations.name')->get('active_pages');
        return $result->row_array();
    }

    public function changePaypalOrderStatus($order_id, $status)
    {
        $processed = 0;
        if ($status == 'canceled') {
            $processed = 2;
        }
        $this->db->where('order_id', $order_id);
        if (!$this->db->update('orders', array(
                    'paypal_status' => $status,
                    'processed' => $processed
                ))) {
            log_message('error', print_r($this->db->error(), true));
        }
    }

    public function getCookieLaw()
    {
        $this->db->join('cookie_law_translations', 'cookie_law_translations.for_id = cookie_law.id', 'inner');
        $this->db->where('cookie_law_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('cookie_law.visibility', '1');
        $query = $this->db->select('link, theme, message, button_text, learn_more')->get('cookie_law');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function confirmOrder($md5)
    {
        $this->db->limit(1);
        $this->db->where('link', $md5);
        $result = $this->db->get('confirm_links');
        $row = $result->row_array();
        if (!empty($row)) {
            $orderId = $row['for_order'];
            $this->db->limit(1);
            $this->db->where('order_id', $orderId);
            $result = $this->db->update('orders', array('confirmed' => '1'));
            return $result;
        }
        return false;
    }

    public function getValidDiscountCode($code)
    {
        $time = time();
        $this->db->select('type, amount');
        $this->db->where('code', $code);
        $this->db->where($time . ' BETWEEN valid_from_date AND valid_to_date');
        $query = $this->db->get('discount_codes');
        return $query->row_array();
    }

    public function countPublicUsersWithEmail($email, $id = 0)
    {
        if ($id > 0) {
            $this->db->where('id !=', $id);
        }
        $this->db->where('email', $email);
        return $this->db->count_all_results('users_public');
    }
   public function retrieve($id = "", $username = "")
    {
        if (!empty($id)) {
            $this->db->where('id', $id);
        }
        if (!empty($username)) {
            $this->db->where('username', $username);
        }
 
        $result = $this->db->get('users');
        return $result->row_array();
    }
     public function cekuser($emailuser)
    {
         $this->db->where('email', $emailuser);
        //$result = $this->db->get('users');
       return $this->db->count_all_results('users_public');
    }
   public function registerUser($profile)
    {
        $this->db->insert('users_public', array(
            'name' => $profile['name'],
            'email' => $profile['email'],
             'phone' => $profile['family_name'],
			  'id_social' => $profile['picture'],
			   'point' => 10)
        );
        return $this->db->insert_id();
    }
  public function registerUserFb($profile)
    {
        $this->db->insert('users_public', array(
            'name' => $profile['name'],
            'email' => $profile['email'],
            'id_social' => 'https://graph.facebook.com/'.$profile['id'].'/picture?width=140&height=110',
			  'point' => 10 )
        );
        return $this->db->insert_id();
    }

    public function updateProfile($post)
    {
        $array = array(
            'name' => $post['name'],
            'phone' => $post['phone'],
            'email' => $post['email']
        );
        if (trim($post['pass']) != '') {
            $array['password'] = md5($post['pass']);
        }
        $this->db->where('id', $post['id']);
        $this->db->update('users_public', $array);
    }

    public function checkPublicUserIsValid($post)
    {
        $this->db->where('email', $post['email']);
        $this->db->where('password', md5($post['pass']));
        $query = $this->db->get('users_public');
        $result = $query->row_array();
        if (empty($result)) {
            return false;
        } else {
            return $result['id'];
        }
    }

    public function getUserProfileInfo($email)
    {
         $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('users_public');
              return $query->row_array();
    }

    public function sitemap()
    {
        $query = $this->db->select('url')->get('products');
        return $query;
    }

    public function sitemapBlog()
    {
        $query = $this->db->select('url')->get('blog_posts');
        return $query;
    }

}
