<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <br>
     
	<div class="toolbar"> 
 <div class="toolbar__center"> <ons-icon icon="md-nature-people" style="color:#fe3824;text-shadow: 1px 1px 1px #cccccc;"></ons-icon> &nbsp;
  <b>Pojok Informasi</b>
 </div>
  </div><ons-card>
            <?php
                    if (!empty($posts)) {
                        foreach ($posts as $post) {
                            ?>
	  <ons-row>
              
                            <ons-col width="25%"> 
                               
                                    <a href="<?= LANG_URL . '/baca/' . $post['url'] ?>" class="img-container">
                                        <img class='img-responsive pic-1' style='width:50px' src="https://www.kedaiolala.com/attachments/galeri/<?= $post['image']; ?>" alt="<?= $post['title'] ?>">
                                    </a>
                              </ons-col>
							<ons-col width="70%" align="left">
							
							<a href="<?= LANG_URL . '/baca/' . $post['url'] ?>">
                                            <div class="judullist">
                                            <?= character_limiter($post['title'], 50) ?>
                                        </div>
                                           </a>
										   <span>
                                                <ons-icon icon="md-time" style="color:#666;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
                                                <?= date('M d, y', $post['time']) ?>
                                            </span>
							</ons-col></ons-row><hr>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-info"><?= lang('no_posts') ?></div>
                    <?php } ?>
                    
                 <?= $links_pagination ?></ons-card><br>
<br><br><br><br>
  </ons-page>
<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
	 
      
  
      </ons-tabbar>
    </ons-bottom-toolbar<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
	 
       <button page="sfgdfsdf" class="tabbar__button" onClick="window.location.href = '<?= base_url() ?>'">
    <div class="tabbar__icon" page="sfgdfsdf" >
      <ons-icon icon="md-store" size="30px" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Home</div>
    </button>
 
             <button class="tabbar__button" onClick="window.location.href = '<?= base_url('informasi/artikel') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-nature-people" style="color:#fe3824;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Pojok Info</div>
   </button>
  <button class="tabbar__button" onClick="window.parent.location.href = '<?= base_url('profile') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-face" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Saya</div>
  
  </button>
      </ons-tabbar>
    </ons-bottom-toolbar>