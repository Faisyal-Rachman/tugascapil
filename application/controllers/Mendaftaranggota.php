<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mendaftaranggota extends MY_Controller
{

    private $num_rows = 20;

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('admin/Home_admin_model');
        $this->load->Model('admin/Brands_model');
		$this->load->Model('Public_model');
        $this->load->helper('url', 'form'); 
        $this->load->library('form_validation');
    }
     var $kodejadi;
    public function index($page = 0)
    {
        $data = array();
        $slideD = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
         $head['profileData'] = $this->session->userdata('userProfile');
        $head['title'] = 'Pendaftaran KTA ISRI';
		$head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $all_categories = $this->Public_model->getShopCategories();
		$al = $this->Public_model->getsA();
		$data = array('al' => $al);
        $data['home_categories'] = $this->getHomeCategories($all_categories);
        $data['all_categories'] = $all_categories;
        $data['countQuantities'] = $this->Public_model->getCountQuantities();
        $data['bestSellers'] = $this->Public_model->getbestSellers();
        $data['newProducts'] = $this->Public_model->getNewProducts();
		$data['sliderProducts'] = $this->Public_model->getSliderProducts();
        $data['sliderDepan'] = $this->Public_model->getsSlide();
	    $data['lastBlogs'] = $this->Public_model->getLastBlogs();
        $data['products'] = $this->Public_model->getProducts($this->num_rows, $page, $_GET);
        $data['daftarisri'] = $this->Public_model->getDaftarIsri($this->num_rows);
        $rowscount = $this->Public_model->productsCount($_GET);
        $data['shippingOrder'] = $this->Home_admin_model->getValueStore('shippingOrder');
        $data['showOutOfStock'] = $this->Home_admin_model->getValueStore('outOfStock');
        $data['showBrands'] = $this->Home_admin_model->getValueStore('showBrands');
        $data['brands'] = $this->Brands_model->getBrands();
        $data['nomorWa'] = $this->Home_admin_model->getValueStore('nomorWa');
       /*  $this->googleplus->getAuthenticate();
    $this->session->set_userdata('login',true);
    $this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
         $data['getUserInfo'] = $this->googleplus->getUserInfo();
         $data['loginURL'] = $this->googleplus->loginURL();
       $data['profileData'] = $this->session->userdata('userProfile');
       $profile = $this->googleplus->getUserInfo();
       */

    

      $useragent=$_SERVER['HTTP_USER_AGENT'];
      
      if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
      {
        $data['links_pagination'] = pagination('home', $rowscount, $this->num_rows);
        $this->render('pendaftaran', $head, $data, $slideD);
       
      }else{
        $this->load->view('templates/mobile/intropendaftaranweb', $data);
      }
    }
    public function daftarfrontkta($page = 0)
    {
        $data = array();
        $slideD = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
         $head['profileData'] = $this->session->userdata('userProfile');
        $head['title'] = 'Pendaftaran KTA ISRI';
		$head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $all_categories = $this->Public_model->getShopCategories();
		$al = $this->Public_model->getsA();
		$data = array('al' => $al);
        $data['home_categories'] = $this->getHomeCategories($all_categories);
        $data['all_categories'] = $all_categories;
        $data['countQuantities'] = $this->Public_model->getCountQuantities();
        $data['bestSellers'] = $this->Public_model->getbestSellers();
        $data['newProducts'] = $this->Public_model->getNewProducts();
		$data['sliderProducts'] = $this->Public_model->getSliderProducts();
        $data['sliderDepan'] = $this->Public_model->getsSlide();
	    $data['lastBlogs'] = $this->Public_model->getLastBlogs();
        $data['products'] = $this->Public_model->getProducts($this->num_rows, $page, $_GET);
        $data['daftarisri'] = $this->Public_model->getDaftarIsri($this->num_rows);
        $rowscount = $this->Public_model->productsCount($_GET);
        $data['shippingOrder'] = $this->Home_admin_model->getValueStore('shippingOrder');
        $data['showOutOfStock'] = $this->Home_admin_model->getValueStore('outOfStock');
        $data['showBrands'] = $this->Home_admin_model->getValueStore('showBrands');
        $data['brands'] = $this->Brands_model->getBrands();
        $data['nomorWa'] = $this->Home_admin_model->getValueStore('nomorWa');
       /*  $this->googleplus->getAuthenticate();
    $this->session->set_userdata('login',true);
    $this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
         $data['getUserInfo'] = $this->googleplus->getUserInfo();
         $data['loginURL'] = $this->googleplus->loginURL();
       $data['profileData'] = $this->session->userdata('userProfile');
       $profile = $this->googleplus->getUserInfo();
       */

    

      $useragent=$_SERVER['HTTP_USER_AGENT'];
      
      if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
      {
        $data['links_pagination'] = pagination('home', $rowscount, $this->num_rows);
        $this->render('pendaftaran', $head, $data, $slideD);
       
      }else{
        $this->load->view('templates/mobile/pendaftaranweb', $data);
      }
    }
    public function daftarkk($page = 0)
    {
        $data = array();
        $slideD = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('home');
         $head['profileData'] = $this->session->userdata('userProfile');
        $head['title'] = 'Pendaftaran KTA ISRI';
		$head['tentangweb'] = @$arrSeo['tentangweb'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
        $all_categories = $this->Public_model->getShopCategories();
		$al = $this->Public_model->getsA();
		$data = array('al' => $al);
        $data['home_categories'] = $this->getHomeCategories($all_categories);
        $data['all_categories'] = $all_categories;
        $data['countQuantities'] = $this->Public_model->getCountQuantities();
        $data['bestSellers'] = $this->Public_model->getbestSellers();
        $data['newProducts'] = $this->Public_model->getNewProducts();
		$data['sliderProducts'] = $this->Public_model->getSliderProducts();
        $data['sliderDepan'] = $this->Public_model->getsSlide();
	    $data['lastBlogs'] = $this->Public_model->getLastBlogs();
        $data['products'] = $this->Public_model->getProducts($this->num_rows, $page, $_GET);
        $data['daftarisri'] = $this->Public_model->getDaftarIsri($this->num_rows);
        $rowscount = $this->Public_model->productsCount($_GET);
        $data['shippingOrder'] = $this->Home_admin_model->getValueStore('shippingOrder');
        $data['showOutOfStock'] = $this->Home_admin_model->getValueStore('outOfStock');
        $data['showBrands'] = $this->Home_admin_model->getValueStore('showBrands');
        $data['brands'] = $this->Brands_model->getBrands();
        $data['nomorWa'] = $this->Home_admin_model->getValueStore('nomorWa');
       /*  $this->googleplus->getAuthenticate();
    $this->session->set_userdata('login',true);
    $this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
         $data['getUserInfo'] = $this->googleplus->getUserInfo();
         $data['loginURL'] = $this->googleplus->loginURL();
       $data['profileData'] = $this->session->userdata('userProfile');
       $profile = $this->googleplus->getUserInfo();
       */

    

      $useragent=$_SERVER['HTTP_USER_AGENT'];
      
      if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
      {
        $data['links_pagination'] = pagination('home', $rowscount, $this->num_rows);
        $this->render('pendaftaran', $head, $data, $slideD);
       
      }else{
        $this->load->view('templates/mobile/pendaftaranwebkk', $data);
      }
    }
    /*
     * Used from greenlabel template
     * shop page
     */
    public function daftarkta()
    {
        $data = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('shop');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);

        $config['upload_path'] = './assets/imgs/';
        $config['allowed_types'] = 'jpeg|PNG|gif|jpg|png|ico';
        $config['max_size'] = '1500500'; // kb
        $this->load->library('upload', $config);
        $hasil=$this->upload->data();

        if (isset($_FILES['selfie']) && $_FILES['selfie']['name'] != ''){
            $file1 = $this->upload->do_upload('selfie');
            $hasil1 = $this->upload->data();
            $file1new = $hasil1['file_name'];
        }
            
        if (isset($_FILES['buktitrf']) && $_FILES['buktitrf']['name'] != ''){
            $file2 = $this->upload->do_upload('buktitrf');
            $hasil2 = $this->upload->data();
            $file2new = $hasil2['file_name'];
            $tgl = date('d-m-Y');
        }   else
        {
            $file2new = "Belumbayar";
            $tgl = "";
        }

        

        $this->db->select('RIGHT(kta.idkta,4) as kode', FALSE);
        $this->db->order_by('idkta','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('kta');      //cek dulu apakah ada sudah ada kode di tabel.    
        $prov = $_POST['provinsi'];
         $kota = $_POST['merk'];  
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
        $this->kodejadi = $prov.$kota.$kodemax; 

        $arr = array(
            'no_anggota' => $this->kodejadi,
            'nik' => $_POST['nik'],
            'nama' => $_POST['namalengkap'],
            'email' => $_POST['email'],
            'kode_provinsi' =>$_POST['provinsi'],
            'kota' => $_POST['merk'],
            'alamat' => $_POST['alamat'],
            'telp' =>$_POST['telp'],
            'foto' =>$file1new,
            'tanggal' =>$tgl,
            'buktitrf' =>$file2new,
            'password' => $_POST['password']                   
               );
              $this->send_message();
         //      $this->sendNotifications();   
          $this->db->insert('kta', $arr);
          $this->session->set_userdata($arr);
        $this->render('detailpendaftaran', $head, $data, $arr);
    }

    public function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
  

    public function daftaraktaweb()
    {
        $data = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('shop');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);

        $config['upload_path'] = './assets/imgs/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['max_size'] = '500500'; // kb
        $this->load->library('upload', $config);
        $hasil=$this->upload->data();

        $pass = $this->randomPassword();

        $arr1 = array(
            'nama_ortu' => $_POST['nama_kepalakeluarga'],
            'kk_ortu' => $_POST['nokk'],
            'password' => $pass
        );
        $arr2 = array(
            'nama_bayi' => $_POST['namabayi'],
            'jk_bayi' => $_POST['jkb'],
            'tmpdilahirkan' =>$_POST['tdlb'],
            'tmpkelaihran' => $_POST['tkb'],
            'hari' => $_POST['hlb'],
            'tgl_lahir' => $_POST['tlbayi'],
            'pukul' => $_POST['pklb'],
            'jenis_lahir' => $_POST['jklb'],
            'lahiran_ke' =>$_POST['kkb'],
            'penolong_lahir' => $_POST['pkb'],
            'berat' => $_POST['bbkb'],
            'panjang' =>$_POST['pbcb'],
            'no_kk1' => $_POST['nokk']                      
               );
            $arr3 = array(
                'nik_ibu' => $_POST['nikibu'],
                'nama_ibu' => $_POST['namaibu'],
                'tgl_lahir_ibu' =>$_POST['tlibu'],
                'umur_ibu' => $_POST['umuribu'],
                'pekerjaan_ibu' => $_POST['kerjaibu'],
                'alamat_ibu' => $_POST['almtibu'],
                'desa_ibu' => $_POST['desaibu'],
                'kec_ibu' => $_POST['kecibu'],
                'kota_ibu' =>$_POST['kotaibu'],
                'prov_ibu' => $_POST['provibu'],
                'wn_ibu' => $_POST['warga'],
                'bangsa_ibu' =>$_POST['bangsaibu'],
                'tgl_catat_kawin' =>$_POST['tlnikah'],
                'no_kk2' => $_POST['nokk']                      
             );  
             $arr4 = array(
                'nik_ayah' => $_POST['nikayah'],
                'nama_ayah' => $_POST['namaayah'],
                'tgl_lahir_ayah' =>$_POST['tlayah'],
                'umur_ayah' => $_POST['umurayah'],
                'pekerjaan_ayah' => $_POST['kerjaayah'],
                'alamat_ayah' => $_POST['almtayah'],
                'desa_ayah' => $_POST['desaayah'],
                'kec_ayah' => $_POST['kecayah'],
                'kota_ayah' =>$_POST['kotaayah'],
                'prov_ayah' => $_POST['provayah'],
                'wn_ayah' => $_POST['wargaayah'],
                'bangsa_ayah' =>$_POST['bangsaayah'],
                'no_kk3' => $_POST['nokk']                    
             );
             $arr5 = array(
                'nik_pelapor' => $_POST['nikpelapor'],
                'nama_pelapor' => $_POST['namapelapor'],
                'tgl_lahir_pelapor' =>$_POST['umurpelapor'],
                'umur_pelapor' => $_POST['jkpelapor'],
                'pekerjaan_pelapor' => $_POST['kerjapelapor'],
                'alamat_pelapor' => $_POST['almtpelapor'],
                'desa_pelapor' => $_POST['desapelapor'],
                'kec_pelapor' => $_POST['kecpelapor'],
                'kota_pelapor' =>$_POST['kotapelapor'],
                'prov_pelapor' => $_POST['provpelapor'],
                'bangsa_pelapor' => $_POST['bangsapelapor'],
                'no_kk4' => $_POST['nokk']                   
             );  
             $arr6 = array(
                'nik_saksi1' => $_POST['niksaksi1'],
                'nama_saksi1' => $_POST['namasaksi1'],
                'umur_saksi1' => $_POST['umursaksi1'],
                'pekerjaan_saksi1' => $_POST['kerjasaksi1'],
                'alamat_saksi1' => $_POST['almtsaksi1'],
                'desa_saksi1' => $_POST['desasaksi1'],
                'kec_saksi1' => $_POST['kecsaksi1'],
                'kota_saksi1' =>$_POST['kotasaksi1'],
                'prov_saksi1' => $_POST['provsaksi1'],
                'no_kk5' => $_POST['nokk']                        
             );  
             $arr7 = array(
                'nik_saksi2' => $_POST['niksaksi2'],
                'nama_saksi2' => $_POST['namasaksi2'],
                'umur_saksi2' => $_POST['umursaksi2'],
                'pekerjaan_saksi2' => $_POST['kerjasaksi2'],
                'alamat_saksi2' => $_POST['almtsaksi2'],
                'desa_saksi2' => $_POST['desasaksi2'],
                'kec_saksi2' => $_POST['kecsaksi2'],
                'kota_saksi2' =>$_POST['kotasaksi2'],
                'prov_saksi2' => $_POST['provsaksi2'],
                'no_kk6' => $_POST['nokk']                         
             );      
            //  $this->send_message();
         //      $this->sendNotifications();   
          $this->db->insert('ortu_kk', $arr1);
          $this->db->insert('tbl_bayi', $arr2);
          $this->db->insert('tbl_ibu', $arr3);
          $this->db->insert('tbl_ayah', $arr4);
          $this->db->insert('tbl_pelapor', $arr5);
          $this->db->insert('tbl_saksi1', $arr6);
          $this->db->insert('tbl_saksi2', $arr7);
          $this->session->set_userdata($arr1);
        $this->render('detailpendaftaranweb', $head, $data, $arr1, $arr2, $arr3, $arr4, $arr5, $arr6, $arr7);
    }



    public function send_message() { 
     
        $from_email = "faipagun@gmail.com"; 
        $to_email = $this->input->post('email'); 
        $emailsupport = "webistetarakan@gmail.com"; 
        $config = Array(
               'protocol' => 'smtp',
               'smtp_host' => 'ssl://smtp.googlemail.com',
               'smtp_port' => 465,
               'smtp_user' => $from_email,$emailsupport,
               'smtp_pass' => 'lyqrhtdwewjxzmrz',
               'mailtype'  => 'html', 
               'charset'   => 'iso-8859-1'
       );

           $this->load->library('email', $config);
           $this->email->set_newline("\r\n");   
    $listmail = array($to_email, 'websitetarakan@gmail.com');
        $this->email->from($from_email, 'PENDAFTARAN KTA ISRI'); 
        $this->email->to($listmail);
        $this->email->subject('Informasi Pendafataran KTA ISRI'); 
        $this->email->message('<b>Berikut informasi data Anda sebagai anggota ISRI.</b><br>
        NIK : '.$_POST['nik'].'<br>Nama lengkap & Gelar : '.$_POST['namalengkap'].'
        <br>No. Anggota  : '.$this->kodejadi.'
        <br>Password  : '.$_POST['password'].'
        <br>Email  : '.$_POST['email'].'
        <br>Alamat  : '.$_POST['alamat'].'
        <br>Telp  : '.$_POST['telp']); 

        if ($this->email->send()) {
            echo '  <div class="alert alert-info"> Pendaftaran berhasil..</div>';
        } else {
            show_error($this->email->print_debugger());
        }
     }
    public function updatekta()
    {
        $data = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('shop');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
      
         // $data['uinfo']  = $this->session->userdata('username');
    
        $config['upload_path'] = './assets/imgs/';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|ico';
        $config['max_size'] = '500500'; // kb
        $this->load->library('upload', $config);
        $hasil=$this->upload->data();

             
        if (isset($_FILES['updatebyr']) && $_FILES['updatebyr']['name'] != ''){
            $file2 = $this->upload->do_upload('updatebyr');
            $hasil2 = $this->upload->data();
            $file2new = $hasil2['file_name'];
            $tgl = date('d-m-Y');
          $showuser = $this->session->userdata('no_anggota');
          $data['uinfo'] = $this->Public_model->usershow($showuser);
            $data = array( 
                'buktitrf' =>$file2new,
                'tanggal' =>$tgl);
             $idkta =  array( 
                'idkta' => $this->input->post('idkta'));   
                 //   $data = array('user'=>$this->input->post('user'));
                   // $where = array('id_berita' => $this->input->post('id'));
                $this->Public_model->updatekta('kta',$data,$idkta);
      //$this->db->updatekta('kta', $arr);
      $this->session->set_flashdata('pesan', '<div class="alert alert-info">Bukti bayar telah dikirim!</div>');
     redirect('profile', $head, $data);

        }   else
        {
            redirect('profile', $head, $data);
        //    $file2new = "Belumbayar";
        }

      
    } 
    public function updatektaweb()
    {
        $data = array();
        $head = array();
        $arrSeo = $this->Public_model->getSeo('shop');
        $head['title'] = @$arrSeo['title'];
        $head['description'] = @$arrSeo['description'];
        $head['keywords'] = str_replace(" ", ",", $head['title']);
      
         // $data['uinfo']  = $this->session->userdata('username');
    
        $config['upload_path'] = './assets/imgs/';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|ico';
        $config['max_size'] = '500500'; // kb
        $this->load->library('upload', $config);
        $hasil=$this->upload->data();

             
        if (isset($_FILES['updatebyr']) && $_FILES['updatebyr']['name'] != ''){
            $file2 = $this->upload->do_upload('updatebyr');
            $hasil2 = $this->upload->data();
            $file2new = $hasil2['file_name'];
            $tgl = date('d-m-Y');
          $showuser = $this->session->userdata('no_anggota');
          $data['uinfo'] = $this->Public_model->usershow($showuser);
            $data = array( 
                'buktitrf' =>$file2new,
                'tanggal' =>$tgl);
             $idkta =  array( 
                'idkta' => $this->input->post('idkta'));   
                 //   $data = array('user'=>$this->input->post('user'));
                   // $where = array('id_berita' => $this->input->post('id'));
                $this->Public_model->updatekta('kta',$data,$idkta);
      //$this->db->updatekta('kta', $arr);
      $this->session->set_flashdata('pesan', '<div class="alert alert-info">Bukti bayar telah dikirim!</div>');
     redirect('profile/web', $head, $data);

        }   else
        {
            redirect('profile/web', $head, $data);
        //    $file2new = "Belumbayar";
        }

      
    } 
    public function send_onesignalmessage(){
        $message = $this->input->post("email");
         $user_id = $this->input->post("nik");
         $notelp = $this->input->post("tlp");
         $url = "https://www.google.com/maps/?q=".$this->input->post("namalengkap");
         $headings = $this->input->post("headings");
         $img = $this->input->post("img");
     
         
         $content = array(
             "en" => $notelp
         );
         $headings = array(
             "en" => "Ada User Baru Daftar!"
         );
 
         $fields = array(
             'app_id' => "1bd74b11-6592-4c15-abaf-da08448b44c2",
         //   'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
         //'url' => $url,
              'included_segments' => array('All'),
         'data' => array("foo" => "bar"),
         'url' => $url,
             'contents' => $content,
         //  'chrome_web_icon' => $img,
             'headings' => $headings
         );
 
         $fields = json_encode($fields);
         //print("\nJSON sent:\n");
        // print($fields);
        
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
             'Authorization: Basic OWYzNGNjZjktMzIzMC00ZmFkLWEyMDAtMWM2OTRkNjRjMTg2'));
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
         curl_setopt($ch, CURLOPT_HEADER, FALSE);
         curl_setopt($ch, CURLOPT_POST, TRUE);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 
         $response = curl_exec($ch);
         curl_close($ch);
        return $response;
     }
 
     
     /*
      * Send notifications to users that have nofify=1 in /admin/adminusers
      */
 
     private function sendNotifications()
     {
         $users = $this->Public_model->getNotifyUsers();
         $myDomain = $this->config->item('base_url');
         if (!empty($users)) {
             foreach ($users as $user) {
                 $this->sendmail->sendTo($user, 'Admin', 'New order in ' . $myDomain, 'Hello, you have new order. Can check it in /admin/orders');
             }
         }
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
        $data['products'] = $this->Public_model->getPhroducts($this->num_rows, $page, $_GET);
        $rowscount = $this->Public_model->productsCount($_GET);
        $data['links_pagination'] = pagination('home', $rowscount, $this->num_rows);
        $this->render('home', $head, $data, $slideD);
    }
public function profile(){
        if($this->session->userdata('login') == true)
        {
            $data['profileData'] = $this->session->userdata('userProfile');
            $this->load->view('profile',$data);
        }
        else
        {
            redirect('');
        }
    }
    public function listKota(){
        $kota=$this->input->post('id');
        $data=$this->Public_model->Kotalist($kota);
        echo json_encode($data);
      }
    private function getHomeCategories($categories)
    {

        /*
         * Tree Builder for categories menu
         */

        function buildTree(array $elements, $parentId = 0)
        {
            $branch = array();
            foreach ($elements as $element) {
                if ($element['sub_for'] == $parentId) {
                    $children = buildTree($elements, $element['id']);
                    if ($children) {
                        $element['children'] = $children;
                    }
                    $branch[] = $element;
                }
            }
            return $branch;
        }

        return buildTree($categories);
    }

    /*
     * Called to add/remove quantity from cart
     * If is ajax request send POST'S to class ShoppingCart
     */

    public function manageShoppingCart()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $this->shoppingcart->manageShoppingCart();
    }

    /*
     * Called to remove product from cart
     * If is ajax request and send $_GET variable to the class
     */

    public function removeFromCart()
    {
        $backTo = $_GET['back-to'];
        $this->shoppingcart->removeFromCart();
        $this->session->set_flashdata('deleted', lang('deleted_product_from_cart'));
        redirect(LANG_URL . '/' . $backTo);
    }

    public function clearShoppingCart()
    {
        $this->shoppingcart->clearShoppingCart();
    }

    public function viewProduct($id)
    {
        $data = array();
        $head = array();
        $data['product'] = $this->Public_model->getOneProduct($id);
        $data['sameCagegoryProducts'] = $this->Public_model->sameCagegoryProducts($data['product']['shop_categorie'], $id);
        if ($data['product'] === null) {
            show_404();
        }
        $data['record'] = $this->Public_model->view('rating');
        $head['profileData'] = $this->session->userdata('userProfile');
        $vars['publicDateAdded'] = $this->Home_admin_model->getValueStore('publicDateAdded');
        $this->load->vars($vars);
        $head['title'] = $data['product']['title'];
        $description = url_title(character_limiter(strip_tags($data['product']['description']), 130));
        $description = str_replace("-", " ", $description) . '..';
        $head['description'] = $description;
        $head['keywords'] = str_replace(" ", ",", $data['product']['title']);
        $this->render('view_product', $head, $data);
    }
	public function viewInfo($id)
    {
        $data = array();
        $head = array();
        $data['info'] = $this->Public_model->getOneInfo($id);
        
        $data['record'] = $this->Public_model->view('rating');
        $head['profileData'] = $this->session->userdata('userProfile');
        $vars['publicDateAdded'] = $this->Home_admin_model->getValueStore('publicDateAdded');
        $this->load->vars($vars);
        $head['title'] = $data['info']['title'];
        $description = url_title(character_limiter(strip_tags($data['info']['description']), 130));
        $description = str_replace("-", " ", $description) . '..';
        $head['description'] = $description;
        $head['keywords'] = str_replace(" ", ",", $data['info']['title']);
        $this->render('view_info', $head, $data);
    }
  function tambah_rating(){
        if ($this->input->post('rating')!=''){
    $data = array('id_berita'=>$this->input->post('id'),'rating'=>$this->input->post('rating'),'user'=>$this->input->post('user'));
         //   $data = array('user'=>$this->input->post('user'));
           // $where = array('id_berita' => $this->input->post('id'));
        $this->Public_model->update('rating', $data);
        }
    }
    

public function viewGaleri($id)
    {
        $data = array();
        $head = array();
        $data['galeri'] = $this->Public_model->getOneGaleri($id);
        $data['sameCagegoryProducts'] = $this->Public_model->sameCagegoryProducts($data['galeri']['galeri_categorie'], $id);
        if ($data['galeri'] === null) {
            show_404();
        }
        $vars['publicDateAdded'] = $this->Home_admin_model->getValueStore('publicDateAdded');
        $this->load->vars($vars);
        $head['title'] = $data['galeri']['title'];
        $description = url_title(character_limiter(strip_tags($data['galeri']['description']), 130));
        $description = str_replace("-", " ", $description) . '..';
        $head['description'] = $description;
        $head['keywords'] = str_replace(" ", ",", $data['galeri']['title']);
        $this->render('view_galeri', $head, $data);
    }
    public function confirmLink($md5)
    {
        if (preg_match('/^[a-f0-9]{32}$/', $md5)) {
            $result = $this->Public_model->confirmOrder($md5);
            if ($result === true) {
                $data = array();
                $head = array();
                $head['title'] = '';
                $head['description'] = '';
                $head['keywords'] = '';
                $this->render('confirmed', $head, $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function discountCodeChecker()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $result = $this->Public_model->getValidDiscountCode($_POST['enteredCode']);
        if ($result == null) {
            echo 0;
        } else {
            echo json_encode($result);
        }
    }

    public function sitemap()
    {
        header("Content-Type:text/xml");
        echo '<?xml version="1.0" encoding="UTF-8"?>
                <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $products = $this->Public_model->sitemap();
        $blogPosts = $this->Public_model->sitemapBlog();

        foreach ($blogPosts->result() as $row1) {
            echo '<url>

      <loc>' . base_url('blog/' . $row1->url) . '</loc>

      <changefreq>monthly</changefreq>

      <priority>0.1</priority>

   </url>';
        }

        foreach ($products->result() as $row) {
            echo '<url>

      <loc>' . base_url($row->url) . '</loc>

      <changefreq>monthly</changefreq>

      <priority>0.1</priority>

   </url>';
        }

        echo '</urlset>';
    }

}
