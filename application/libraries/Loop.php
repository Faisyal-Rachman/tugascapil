<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loop
{

    private static $CI;

    public function __construct()
    {
        self::$CI = & get_instance();
		//self::$CI->load->model('admin/Titles_model');
    }

    static function getCartItems($cartItems)
    {
        if (!empty($cartItems['array'])) {
            ?>
            <li class="cleaner text-right">
                <a href="javascript:void(0);" class="btn-blue-round" onclick="clearCart()">
                    <?= lang('clear_all') ?>
                </a>
            </li>
            <li class="divider"></li>
            <?php
            foreach ($cartItems['array'] as $cartItem) {
                ?>
                <li class="shop-item" data-artticle-id="<?= $cartItem['id'] ?>">
                    <tr>
  <td width="150px"> <img style="width:10px;" src="<?= base_url('/attachments/shop_images/' . $cartItem['image']) ?>" alt="" />
                          <button class="btn btn-xs btn-danger pull-right" onclick="removeProduct(<?= $cartItem['id'] ?>)">
                                x
                            </button> </td></tr>
  <tr><?= $cartItem['title'] ?><span class="prices">
                                        <?=
                                        $cartItem['num_added'] == 1 ? number_format($cartItem['price'],0,',','.') : '<span class="num-added-single">'
                                                . number_format($cartItem['price'],0,',','.') . '</span> - <span class="sum-price-single">'
												. number_format($cartItem['sum_price'],0,',','.') . '</span>'
                                        ?>
                                    </span>
                                </tr>
                    <span class="num_added hidden"><?= $cartItem['num_added'] ?></span>
                    <div class="item">
                        <div class="item-in">
                           
                            <div>
                              
                  
                 
                            </div>
                        </div>
                        
                    </div>
                </li>
                <?php
            }
            ?>
            <li class="divider"></li>
            <li class="text-center">
                <button onClick="window.parent.location.href = '<?= base_url('checkout') ?>'"> <?=
                    !empty($cartItems['array']) ? '<i class="fa fa-check"></i> '
                            . lang('checkout') . ' - <span class="finalSum">' . $cartItems['finalSum']
                            . '</span>' : '<span class="no-for-pay">' . lang('no_for_pay') . '</span>'
                    ?>
                </button>
               
            </li>
        <?php } else {
            ?>
            <li class="text-center"><?= lang('no_products') ?></li>
            <?php
        }
    }

static public function getOlala(){

echo "<table align='center'>";

    ?>
    <tr>
 <td align='center' style='padding:8px'>  

    <div class="product-grid2">
                <div class="product-image"> 
                    <a href="kedaionlinetarakan/loundry24jamtarakan"> <img class='img-responsive pic-1' style='width:200px' src='<?= base_url('attachments/shop_images/kedai-online-tarakan.png')?>'>

                 </div> 

                </div>
                        
    </td>
    
 <td align='center' style='padding:8px'>  

    <div class="product-grid2">
                <div class="product-image"> 
                    <a href="kedaionlinetarakan/makanan24jamtarakan"> <img class='img-responsive pic-1' style='width:200px' src='<?= base_url('attachments/shop_images/kedai-online-tarakan-kalimantan-utara.png')?>'>

                 </div> 

                </div>
                        
    </td></tr>
    <tr>
        <td align='center' style='padding:8px'>  

    <div class="product-grid2">
                <div class="product-image"> 
                    <a href="kedaionlinetarakan/servicesKomputertarakan"> <img class='img-responsive pic-1' style='width:200px' src='<?= base_url('attachments/shop_images/kedai-online-tarakan-services-komputer.png')?>'>

                 </div> 

                </div>
                        
    </td>
    
 <td align='center' style='padding:8px'>  

    <div class="product-grid2">
                <div class="product-image"> 
                    <a href="kedaionlinetarakan/jasabersihkanrumahtarakan"> <img class='img-responsive pic-1' style='width:200px' src='<?= base_url('attachments/shop_images/kedai-online-tarakan-home-cleaning.png')?>'>

                 </div> 

                </div>
                        
    </td>
 
 </tr> 
    <?php


echo "</table>";
                
              
            
                    ?>
      
                         
            <?php
}
public function listKota(){
  // Ambil data ID Provinsi yang dikirim via ajax post
  $id_provinsi = $this->input->post('id_provinsi');
  
  $kota = $this->KotaModel->viewByProvinsi($id_provinsi);
  
  // Buat variabel untuk menampung tag-tag option nya
  // Set defaultnya dengan tag option Pilih
  $lists = "<option value=''>Pilih</option>";
  
  foreach($kota as $data){
    $lists .= "<option value='".$data->id."'>".$data->nama."</option>"; // Tambahkan tag option ke variabel $lists
  }
  
  $callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
  echo json_encode($callback); // konversi varibael $callback menjadi JSON
}
static public function getDaftarIsri($b){
  ?>

<div class="panel panel-info">
	<div class="panel-heading"><h3>Form Pendaftaran AKTA Kelahiran</h3></div>
  <div class="panel-body">
    <p>
	<form class="form-horizontal" action="<?php echo base_url('daftar_kartu_anggota'); ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
<div class="col-lg-6">
  <input type="text" class="form-control form-control-lg" name="kepalakeluarga" value="" id="kepalakeluarga" placeholder="Nama Kepala Keluarga">
</div>
</div>
<div class="form-group">
<div class="col-lg-6">
  <input type="text" class="form-control form-control-lg" name="nokk" value="" id="nokk" placeholder="Nomor Kartu Keluarga">
</div>
</div>
 <div class="form-group">

  <div class="col-lg-12">
    <input type="text" class="form-control form-control-lg" name="nik" value="" id="nik" placeholder="NIK">
  </div>
</div>

<div class="form-group">
  
  <div class="col-lg-12">
    <input type="text" class="form-control form-control-lg" name="namalengkap" value="" id="namalengkap" placeholder="Nama Lengkap dan Gelar">
  </div>
</div>
<div class="form-group">
  
  <div class="col-lg-12">
    <input type="text" class="form-control form-control-lg" name="email" value="" id="email" placeholder="Email">
  </div>
</div>

<div class="form-group">
    <div class="col-lg-12">
    <select class="form-control form-control-lg" name="provinsi" id="provinsi" required>
    <option value='#'>Pilih</option>
            <?php
            foreach ($b as $value) {
                echo "<option value='$value->idprov'>$value->name_prov</option>";
            }
            ?>
        </select>
        </div>
</div>
        <div class="form-group">
    <div class="col-lg-12">
        <select class="form-control form-control-lg" name="merk" id="merk" required>
            <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
        </select>
  </div>
</div>


<div class="form-group">
 
  <div class="col-lg-12">
    <input type="text" class="form-control form-control-lg" name="alamat" id="alamat" placeholder="Alamat">
  </div>
</div>

<div class="form-group">
 
  <div class="col-lg-12">
    <input type="text" class="form-control form-control-lg" name="telp" value="" id="telp" placeholder="No.Telp">
  </div>
</div>


 
</form>
</p>
</div>
</div>
                  
                
              
        
                           
 <?php
  }
static public function getLoundry(){


	?>
	 <ons-row>
    <center>
       
 	  <div class="col-sm-8">
                    <div id="home-slider" data-ride="carousel">
                      
                        <div class="carousel-inner" role="listbox">
                            <?php
                         
                                ?>
                                <div>
                                   
                                    <img style="border-radius: 15px 15px 15px 15px" src="<?= base_url('attachments/slider/slide6.jpg') ?>" alt="" class="img-responsive">
            
                                </div>
                                <?php
                               
                            ?>
                        </div>
                    
                    </div>
                   <!-- <h4 class="hidden-xs"><?= $article['name'] ?> <i class="fa fa-book" aria-hidden="true"></i></h4> -->
                </div>
				 	
		   </center>
     </ons-row>
	<?php

          
            
                    ?>
      
                         
            <?php
}
  static public function getProductsLoundry($productsloundry)
    {
$current_time = date('h:i a');
$sunrise = "5:42 am";
$sunset = "10:00 pm";
$date1 = DateTime::createFromFormat('h:i a', $current_time);
$date2 = DateTime::createFromFormat('h:i a', $sunrise);
$date3 = DateTime::createFromFormat('h:i a', $sunset);

foreach($productsloundry as $data) {
            ?>
                     <?php 
                 if (strlen($data['title'])<=23){
$judul = $data['title'];
                 }else{
                    $judul = substr($data['title'],0,50);
                 }
                 ?>
           <center>    <br>             
          <ons-row> <ons-col width="10%"><img class='img-responsive pic-1' style='width:20px' src='<?= base_url('attachments/shop_images/'.$data['image'].'')?>'></ons-col>
  <ons-col width="60%" align="left"> <h5 class="title"><strong><?= $judul; ?></strong></h5></a>
  </ons-col>
  <ons-col width="30%">
 
  
  <?php if ($date1 > $date2 && $date1 < $date3)
{
    
 $ok = '<a href="javascript:void(0);" class="add-to-cart button" data-id="'.$data['id'].'"><ons-button onclick="this.disabled = true;" class="button">
  <b>PESAN</b></ons-button></a>';
}else{
$ok = '<a href="javascript:void(0);"><ons-button onclick="this.disabled = false;" class="button">
  <b style="color:#000;">TUTUP </b></ons-button></a>';
} 
echo $ok; ?>
  </ons-col>
</ons-row>

                 </center>
                 <?php
}
?>
                             <?php
        
    }
	 static public function getUserProfileInfoPoint2($point)
    {
echo $point;
    }
    static public function getServices($m)
   {
        $current_time = date('h:i a');
$sunrise = "5:42 am";
$sunset = "10:00 pm";
$date1 = DateTime::createFromFormat('h:i a', $current_time);
$date2 = DateTime::createFromFormat('h:i a', $sunrise);
$date3 = DateTime::createFromFormat('h:i a', $sunset);

foreach($m as $data) {
            
                    ?>
                     <?php 
                 if (strlen($data['title'])<=23){
$judul = $data['title'];
                 }else{
                    $judul = substr($data['title'],0,50);
                 }
                 ?>
           <center>    <br>             
          <ons-row> <ons-col width="10%"><img class='img-responsive pic-1' style='width:20px' src='<?= base_url('attachments/shop_images/'.$data['image'].'')?>'></ons-col>
  <ons-col width="60%" align="left"> <h5 class="title"><strong><?= $judul; ?></strong></h5></a>
  </ons-col>
  <ons-col width="30%">
 
  
 <?php if ($date1 > $date2 && $date1 < $date3)
{
    
 $ok = '<a href="javascript:void(0);" class="add-to-cart button" data-id="'.$data['id'].'"><ons-button onclick="this.disabled = true;" class="button">
  <b>PESAN </b></ons-button></a>';
}else{
$ok = '<a href="javascript:void(0);"><ons-button onclick="this.disabled = false;" class="button">
  <b style="color:#000;">TUTUP </b></ons-button></a>';
}
echo $ok; ?>
  </ons-col>
</ons-row>

                 </center>
                 <?php
}
?>
                             <?php
        
    }
 static public function getJasaBersih($m)
     {
        $current_time = date('h:i a');
$sunrise = "5:42 am";
$sunset = "10:00 pm";
$date1 = DateTime::createFromFormat('h:i a', $current_time);
$date2 = DateTime::createFromFormat('h:i a', $sunrise);
$date3 = DateTime::createFromFormat('h:i a', $sunset);

foreach($m as $data) {
            
                    ?>
                     <?php 
                 if (strlen($data['title'])<=23){
$judul = $data['title'];
                 }else{
                    $judul = substr($data['title'],0,50);
                 }
                 ?>
           <center>    <br>             
          <ons-row><ons-col width="10%"><img class='img-responsive pic-1' style='width:20px' src='<?= base_url('attachments/shop_images/'.$data['image'].'')?>'></ons-col>
  <ons-col width="60%" align="left"> <h5 class="title"><?= $judul; ?></h5></a>
  </ons-col>
  <ons-col width="30%">
 
  
  <?php if ($date1 > $date2 && $date1 < $date3)
{
    
 $ok = '<a href="javascript:void(0);" class="add-to-cart button" data-id="'.$data['id'].'"><ons-button onclick="this.disabled = true;" class="button">
  <b>PESAN </b></ons-button></a>';
}else{
$ok = '<a href="javascript:void(0);"><ons-button onclick="this.disabled = false;" class="button">
  <b style="color:#000;">TUTUP </b></ons-button></a>';
}
echo $ok; ?>
  </ons-col>
</ons-row>


                 </center>
                 <?php
}
?>
                             <?php
        
    }
static public function getJasaBersihPribadi($m)
    {
$current_time = date('h:i a');
$sunrise = "5:42 am";
$sunset = "10:00 pm";
$date1 = DateTime::createFromFormat('h:i a', $current_time);
$date2 = DateTime::createFromFormat('h:i a', $sunrise);
$date3 = DateTime::createFromFormat('h:i a', $sunset);

foreach($m as $data) {
            
                    ?>
                     <?php 
                 if (strlen($data['title'])<=23){
$judul = $data['title'];
                 }else{
                    $judul = substr($data['title'],0,50);
                 }
                 ?>
           <center>    <br>             
          <ons-row><ons-col width="10%"><img class='img-responsive pic-1' style='width:20px' src='<?= base_url('attachments/shop_images/'.$data['image'].'')?>'></ons-col>
  <ons-col width="60%" align="left"> <h5 class="title"><?= $judul; ?></h5></a>
  </ons-col>
  <ons-col width="30%">
 
  
  <?php if ($date1 > $date2 && $date1 < $date3)
{
    
 $ok = '<a href="javascript:void(0);" class="add-to-cart button" data-id="'.$data['id'].'"><ons-button onclick="this.disabled = true;" class="button">
  <b>PESAN </b></ons-button></a>';
}else{
$ok = '<a href="javascript:void(0);"><ons-button onclick="this.disabled = false;" class="button">
  <b style="color:#000;">TUTUP </b></ons-button></a>';
}
echo $ok; ?>
  </ons-col>
</ons-row>


                 </center>
                 <?php
}
?>
                             <?php
        
    }
	    static public function getProductsLoundrySatuan($productsloundrysatuan)
   {
        $current_time = date('h:i a');
$sunrise = "5:42 am";
$sunset = "10:00 pm";
$date1 = DateTime::createFromFormat('h:i a', $current_time);
$date2 = DateTime::createFromFormat('h:i a', $sunrise);
$date3 = DateTime::createFromFormat('h:i a', $sunset);

          foreach($productsloundrysatuan as $data) {
            
                    ?>
                     <?php 
                 if (strlen($data['title'])<=23){
$judul = $data['title'];
                 }else{
                    $judul = substr($data['title'],0,50);
                 }
                 ?>
           <center>    <br>             
          <ons-row><ons-col width="10%"><img class='img-responsive pic-1' style='width:20px' src='<?= base_url('attachments/shop_images/'.$data['image'].'')?>'></ons-col>
  <ons-col width="60%" align="left"> <h5 class="title"><strong><?= $judul; ?></strong></h5></a>
  </ons-col>
  <ons-col width="30%">
 <?php if ($date1 > $date2 && $date1 < $date3)
{
    
 $ok = '<a href="javascript:void(0);" class="add-to-cart button" data-id="'.$data['id'].'"><ons-button onclick="this.disabled = true;" class="button">
  <b>PESAN </b></ons-button></a>';
}else{
$ok = '<a href="javascript:void(0);"><ons-button onclick="this.disabled = false;" class="button">
  <b style="color:#000;">TUTUP </b></ons-button></a>';
}
echo $ok; ?>
  </ons-col>
</ons-row>

                 </center>
                 <?php
}
?>
          
                  
                 
                             <?php
        
    }
	   static public function getProductsLoundryTas($productsloundrytas)
    {
        $current_time = date('h:i a');
$sunrise = "5:42 am";
$sunset = "10:00 pm";
$date1 = DateTime::createFromFormat('h:i a', $current_time);
$date2 = DateTime::createFromFormat('h:i a', $sunrise);
$date3 = DateTime::createFromFormat('h:i a', $sunset);

          foreach($productsloundrytas as $data) {
            
                    ?>
                     <?php 
                 if (strlen($data['title'])<=23){
$judul = $data['title'];
                 }else{
                    $judul = substr($data['title'],0,50);
                 }
                 ?>
           <center>    <br>             
          <ons-row><ons-col width="10%"><img class='img-responsive pic-1' style='width:20px' src='<?= base_url('attachments/shop_images/'.$data['image'].'')?>'></ons-col>
  <ons-col width="60%" align="left"> <h5 class="title"><strong><?= $judul; ?></strong></h5></a>
  </ons-col>
  <ons-col width="30%">
 <?php if ($date1 > $date2 && $date1 < $date3)
{
    
 $ok = '<a href="javascript:void(0);" class="add-to-cart button" data-id="'.$data['id'].'"><ons-button onclick="this.disabled = true;" class="button">
  <b>PESAN </b></ons-button></a>';
}else{
$ok = '<a href="javascript:void(0);"><ons-button onclick="this.disabled = false;" class="button">
  <b style="color:#000;">TUTUP </b></ons-button></a>';
}
echo $ok; ?>
  </ons-col>
</ons-row>

                 </center>
                 <?php
}
?>
                                   <?php
        
    }


  static public function getBerita($berita)
    {
foreach($berita as $data) {
            
                    ?>
					 <?php 
                 if (strlen($data['title'])<=23){
$judul = $data['title'];
                 }else{
                    $judul = substr($data['title'],0,50);
                 }
                 ?>
           <center>
<br>             
 <ons-row> <ons-col width="30%"> <a href="<?= $data['vendor_url'] == null ? LANG_URL . '/' . $data['url'] : LANG_URL . '/' . $data['vendor_url'] . '/' . $data['url'] ?>"> <img class='img-responsive pic-1' style='width:40px' src='<?= base_url('attachments/galeri/'.$data['image'].'')?>'>
</ons-col>
<ons-col width="70%" align="left"> <a href="<?= $data['vendor_url'] == null ? LANG_URL . '/' . 'baca/' . $data['url'] : LANG_URL . '/' . $data['vendor_url'] . '/' . 'baca/' . $data['url'] ?>"><h5><?= $judul; ?></h5></a>
</ons-col>
</ons-row>
</center>
				 <?php
}
?>
 <?php
        
    }


  static public function getBeritaWeb($berita)
    {
foreach($berita as $data) {
            
                    ?>
					 <?php 
                 if (strlen($data['title'])<=23){
$judul = $data['title'];
                 }else{
                    $judul = substr($data['title'],0,100);
                 }
                 ?>
           <center>
<br>             
       <div class="col-sm-2"> <a href="<?= $data['vendor_url'] == null ? LANG_URL . '/' . $data['url'] : LANG_URL . '/' . $data['vendor_url'] . '/' . $data['url'] ?>"> <img class='img-responsive pic-1' style='width:80%' src='<?= base_url('attachments/galeri/'.$data['image'].'')?>'>
</div>
 <div class="col-sm-16"><a href="<?= $data['vendor_url'] == null ? LANG_URL . '/' . 'baca/' . $data['url'] : LANG_URL . '/' . $data['vendor_url'] . '/' . 'baca/' . $data['url'] ?>"><p align="justify"><?= $judul; ?></p></a>
</div>
     
	  
</center>
				 <?php
}
?>
  <?php
     }
 static public function getProducts($products)
    {
 $columns =3;//No of column
$dataToDisplay = array('green', 'blue', 'white', 'apple', 'computers', 'php');
echo "<table align='center'>";
$columnwidth = 100/$columns;
$count = count($dataToDisplay);
$i =0;
foreach($products as $data) {
    if($i % $columns == 0){
        echo "<tr>";
    }
	?>
	
 <td align='center' style='padding:8px'>  

    <div class="product-grid">
                <div class="product-image"> 
                    <a href="<?= $data['vendor_url'] == null ? LANG_URL . '/' . $data['url'] : LANG_URL . '/' . $data['vendor_url'] . '/' . $data['url'] ?>"> <img class='img-responsive pic-1' style='width:200px' src='<?= base_url('attachments/shop_images/'.$data['image'].'')?>'>

   <?php
                                if ($data['old_price'] != '' && $data['old_price'] != 0) {
                                    $percent_friendly = number_format((($data['old_price'] - $data['price']) / $data['old_price']) * 100) . '%';
                                    ?>
                                    <div class="product-discount-label"><?= $percent_friendly ?></div>
                                <?php } ?>


                 </div> 
                 <?php 
                 if (strlen($data['title'])<=23){
$judul = $data['title'];
                 }else{
                    $judul = substr($data['title'],0,23).'..';
                 }
                 ?>
                  <div class="product-content">
     <h3 class="title"><?= $judul; ?> </h3></a>
   <div class="price"><?= number_format($data['price'],0,',','.');?>
 <div class="<?= $data['old_price'] == '' ? 'invisible' : '' ?>">
                               <span><?= $data['old_price'] != '' ? number_format($data['old_price'] ,0,',','.') : '' ?></span>
                            </div>
            </div>
                       </div>      
                           

                </div>
                        
	</td>
  
	<?php
    if(($i % $columns) == ($columns - 1) || ($i + 1) == $columns){
        echo "</tr>";
    }
    $i++;
}

echo "</table>";
				
              
            
                    ?>
                 
  
	
                                   	 
            <?php
        
    }
}
