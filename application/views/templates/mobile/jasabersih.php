<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <br>
   
	<div class="toolbar"> 
 <div class="toolbar__center"><img style='width:7%' src='<?= base_url('attachments/shop_images/kedai-online-tarakan-jasa-bersihkan-rumah-di-tarakan.png')?>'> &nbsp;
  Bersih Rumah (Peralatan Kedai Olala)
  </div>
  </div><ons-card>
	   <?php
  $load::getJasaBersih($jasabersih);
				 ?></ons-card><br>
		<div class="toolbar"> 
 <div class="toolbar__center"><img style='width:7%' src='<?= base_url('attachments/shop_images/kedai-online-tarakan-jasa-bersihkan-rumah-di-tarakan.png')?>'> &nbsp;
  Bersih Rumah (Peralatan Pribadi) 
  </div>
  </div><ons-card>
	   <?php
  $load::getJasaBersihPribadi($jasabersihpribadi);
				 ?></ons-card><br>
				 <br> 
  <br>       
<br><br><br>          
             <br><br> 
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