<br>
   <ons-row>
<div class="container text-center">
  <div class="detailjudul"> Makanan Favorite Kamu</div>
<?php
    $columns =3;//No of column
$dataToDisplay = array('green', 'blue', 'white', 'apple', 'computers', 'php');
echo "<table align='center'>";
$columnwidth = 100/$columns;
$count = count($dataToDisplay);
$i =0;
foreach($pd as $data) {
    if($i % $columns == 0){
        echo "<tr>";
    }
	?>
	
 <td align='center' style='padding:8px'>  

    <div class="product-grid">
                <div class="product-image"> 
                    <a href="<?= $data['url'] ?>"> <img class='img-responsive pic-1' style='width:200px' src='<?= base_url('attachments/shop_images/'.$data['image'].'')?>'></a>

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
                <?php

                  echo "<div class='product-discount-label3'>
                <div id='rate-$data[id_berita]'>
                <input type='hidden' name='rating' id='rating' value=''>
                    <ul onMouseOut=\"resetRating($data[id_berita])\">";
                       for($m=1; $m<=1; $m++) {
                          if($m <= $data["rating"]){ $selected = "selected"; }else{ $selected = ""; }
                            echo "<li class='$selected'\"><i class='zmdi zmdi-star-circle zmdi-hc-lg'></i></li>"; 
                        }
                    echo "<ul>
                </div>  </div>";
			  ?>
                  <div class="product-content">
     <h3 class="title"><?= $judul; ?> </h3>
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
                </div>
                       </ons-row>
                       <br><br> <br>  
              </ons-page>      
 <ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
      </ons-tabbar>
    </ons-bottom-toolbar<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
	 
       <button page="sfgdfsdf" class="tabbar__button" onClick="window.location.href = '<?= base_url('kedai-online-tarakan') ?>'">
    <div class="tabbar__icon" page="sfgdfsdf" >
      <ons-icon icon="md-store" size="30px" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Kedai</div>
    </button>
 
             <button class="tabbar__button" onClick="window.location.href = '<?= base_url('kedaionlinetarakan/informasiseputartarakan') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-nature-people" style="color:#fe3824;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Pojok Kedai</div>
   </button>
  <button class="tabbar__button" onClick="window.parent.location.href = '<?= base_url('profile') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-face" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Saya</div>
  
  </button>
      </ons-tabbar>
    </ons-bottom-toolbar>