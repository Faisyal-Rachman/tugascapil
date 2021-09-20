<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <br>
   <ons-row>
    <center>
       
	  <div class="col-sm-8">
                    <div id="home-slider" data-ride="carousel">
                      
                        <div class="carousel-inner" role="listbox">
                            <?php
                            $i = 0;
                            foreach ($sliderDepan as $article) {
                                ?>
                                <div class="item <?= $i == 0 ? 'active' : '' ?>">
                                   
                                    <img style="border-radius: 15px 15px 15px 15px" src="<?= base_url('attachments/slider/' . $article['flag']) ?>" alt="" class="img-responsive">
            
                                </div>
                                <?php
                                $i++;
                            }
                            ?>
                        </div>
                    
                    </div>
                   <!-- <h4 class="hidden-xs"><?= $article['name'] ?> <i class="fa fa-book" aria-hidden="true"></i></h4> -->
                </div>
              
          <?php

            if (!empty($products)) {
                $load::getProducts($products);
            } else {
                ?>
                <script>
                    $(document).ready(function () {
                        ShowNotificator('alert-info', '<?= lang('no_results') ?>');
                    });
                </script>
                <?php
            }
            ?>
 	
		   </center>
     </ons-row>
<br><br><br>          
              
  </ons-page>

<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
	 
       <button page="sfgdfsdf" class="tabbar__button">
    <div class="tabbar__icon" page="sfgdfsdf" >
      <ons-icon icon="md-store" size="30px" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Kedai</div>
    </button>
 
       <button class="tabbar__button" onClick="window.location.href = 'promo'">
    <div class="tabbar__icon">
      <ons-icon icon="md-tag-more" style="color:#fda134;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Promo</div>
   </button>
  <button class="tabbar__button" onClick="window.location.href = 'profile'">
    <div class="tabbar__icon">
      <ons-icon icon="md-face" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Saya</div>
  
  </button>
      </ons-tabbar>
    </ons-bottom-toolbar>
	

	
