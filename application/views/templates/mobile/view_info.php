<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<ons-page>
    <div class='product-grid'> 
<div id="view-product">
    <ons-row>
        <ons-col>
            <div <?= $info['folder'] != null ? '' : '' ?>>
                
               <center>  <div class="product-image"> <img style="width:90%;" src="https://www.kedaiolala.com/attachments/galeri/<?= $info['image']; ?>" style="width:auto; height:auto;" data-num="0" class="img-responsive img-sl the-image pic-1" alt="<?= str_replace('"', "'", $info['title']) ?>">

               </div></center>

            </div>
            <?php
            if ($info['folder'] != null) {
                $dir = "attachments/galeri/" . $info['folder'] . '/';
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
                                        <img src="<?= base_url($dir . $file) ?>" data-num="<?= $i ?>" class="other-img-preview img-sl img-thumbnail the-image" alt="<?= str_replace('"', "'", $info['title']) ?>">

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
                   
              <div class="judul"> <?= $info['title'] ?></div>
                
           <ons-list-item>
            <h6 style="color:#777"><b><i class="zmdi zmdi-calendar-note"></i> <?= date("d M Y , H:i:s", $info['time']) ?></b></h6><div class="detailjudul">
            <?= $info['description'] ?> 
                    </div><p><small> @  <?= $info['categorie_name'] ?> by <i class="zmdi zmdi-account" aria-hidden="true"></i> Admin</p> </small>
        </ons-list-item>
     
       
   
        <div class="filter-sidebar">
            <div class="title">
               <div class="sharethis-inline-share-buttons"></div>
            </div>
        </div>
       <br>
            <div class="alert alert-info"><marquee scrolldelay="220">Persatuan dan Kesatuan Anggota ISRI !!</marquee></div></div>
          
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
</ons-page>
     
         <ons-bottom-toolbar>
   <?php if ($info['visibility'] > 0) { ?>
                     
                      <a href="<?= base_url() ?>">
       <ons-button modifier="large" style="border:2px solid #0076ff;padding:5px;"> 
 <i class="zmdi zmdi-hc-2x zmdi-mail-reply">
   Kembali <i class="zmdi zmdi-check-all"></i></i>
                                 </a>
                    <?php } ?>
                    </ons-button>
     </ons-bottom-toolbar>
  
  