<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div class='product-grid'> 
<div id="view-product">
    <ons-row>
        <ons-col>
            <div <?= $product['folder'] != null ? '' : '' ?>>
                
               <center>  <div class="product-image"> <img style="width:90%;" src="<?= base_url('/attachments/shop_images/' . $product['image']) ?>" style="width:auto; height:auto;" data-num="0" class="img-responsive img-sl the-image pic-1" alt="<?= str_replace('"', "'", $product['title']) ?>">
 <?php 
       
        echo "<div class='product-discount-label2'>
                <div id='rate-$product[id]'>
                <input type='hidden' name='rating' id='rating' value=''>
                    <ul onMouseOut=\"resetRating($product[id])\">";
                        for($i=1; $i<=1; $i++) {
                          if($i <= $product["rating"]){ $selected = "selected"; }else{ $selected = ""; }
                            echo "<li class='$selected' onmouseover=\"highlightStar(this,$product[id])\" onmouseout=\"removeHighlight($product[id]);\" onClick=\"addRating(this,$product[id])\"><i class='zmdi zmdi-star zmdi-hc-3x'></i></li>"; 
                        }
                    echo "<ul>
                </div>  </div>";
   
    ?>
               </div></center>

            </div>
            <?php
            if ($product['folder'] != null) {
                $dir = "attachments/shop_images/" . $product['folder'] . '/';
                ?>
                <div class="row">
                    <?php
                    if (is_dir($dir)) {
                        if ($dh = opendir($dir)) {
                            $i = 1;
                            while (($file = readdir($dh)) !== false) {
                                if (is_file($dir . $file)) {
                                    ?>
                                    <div class="col-xs-4 col-sm-6 col-md-4 text-center">
                                        <img src="<?= base_url($dir . $file) ?>" data-num="<?= $i ?>" class="other-img-preview img-sl img-thumbnail the-image" alt="<?= str_replace('"', "'", $product['title']) ?>">

                                    </div>
 <?php
                                    $i++;
                                }
                            }
                            closedir($dh);
                        }
                    }
                    ?>
                </div>
                <?php
            }
            ?>
       
        <ons-card>
              <div class="detailjudul"> <?= $product['title'] ?></div>
          
               
             
            
           <ons-list-item><?= $product['description'] ?> <p>  <?= CURRENCY  . number_format($product['price'],0,',','.') ?> @  <?= $product['categorie_name'] ?> </p> 
                     <?php 
                     if ($product['old_price'] != '') { ?>
               <p>
                Harga <?= lang('old_price') ?>  <strike><?= CURRENCY  . number_format($product['old_price'],0,',','.') ?></strike>

                <font style="color:#21d684;font-weight: bold;"> <i class="zmdi zmdi-label"></i> <?= $product['point'] ?></font>
                  </p> 
               
            <?php } ?>
        </ons-list-item>
     
       
   
        <div class="filter-sidebar">
            <div class="title">
                <span><b> <?= lang('oder_from_category') ?></b></span>
            </div>
        </div>
        <?php
        if (!empty($sameCagegoryProducts)) {
            $load::getProducts($sameCagegoryProducts, 'col-sm-4 col-md-3', false);
        } else {
            ?>
            <div class="alert alert-info"> <div class="alert alert-info">Maaf, Belum tersedia menu lainnya.</div></div>
            <?php
        }
        ?>
    </ons-card>
    
    </ons-col>
    </ons-row>
</div>
</div>

<div id="modalImagePreview" class="modal">
    <div class="image-preview-container">
        <div class="modal-content">
            <div class="inner-prev-container">
                <img id="img01" alt="">
                <span class="close">&times;</span>
                <span class="img-series"></span>
            </div>
        </div>
        <a href="javascript:void(0);" class="inner-next"></a>
        <a href="javascript:void(0);" class="inner-prev"></a>
    </div>
    <div id="caption"></div>
</div>
<script src="<?= base_url('assets/js/image-preveiw.js') ?>"></script>

     
        <ons-bottom-toolbar>
   <?php if ($product['quantity'] > 0) { ?>
                     
                      <a href="javascript:void(0);" class="add-to-cart" data-id="<?= $product['id'] ?>">
       <ons-button modifier="large" style="border:2px solid #0076ff;padding:5px;"> 
 <i class="zmdi zmdi-hc-2x zmdi-cutlery">
   Pesan </i>
                                 </a>
                    <?php } ?>
                    </ons-button>
     </ons-bottom-toolbar>
  
     
   </ons-page>