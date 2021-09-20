<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">

<ons-card><center><b><h3>" Terima kasih Agan - Sista <i class="zmdi zmdi-mood"></i> "</h3></b>
<img style="width:50%" src="<?= base_url('attachments/site_logo/iconname.png') ?>">
</center></ons-card>

   <ons-card><div class="alert alert-success"><h4><?= lang('c_o_d_order_completed') ?></h4></div></ons-card>
</div>
<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
	 
       <button page="sfgdfsdf" class="tabbar__button" onClick="window.location.href = '<?= base_url('kedai-online-tarakan') ?>'">
    <div class="tabbar__icon" page="sfgdfsdf" >
      <ons-icon icon="md-store" size="30px" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Kedai</div>
    </button>
 
       <button class="tabbar__button" onClick="window.location.href = '<?= base_url('promo') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-tag-more" style="color:#fda134;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Promo</div>
   </button>
  <button class="tabbar__button" onClick="window.location.href = '<?= base_url('profile') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-face" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Saya</div>
  
  </button>
      </ons-tabbar>
    </ons-bottom-toolbar>