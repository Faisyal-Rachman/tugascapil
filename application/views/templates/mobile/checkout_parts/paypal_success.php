<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <?= purchase_steps(1, 2, 3) ?>
    <ons-card><div class="alert alert-success">MAKANAN ANDA SEGERA DIANTARKAN</div></ons-card>
</div>
<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
	 
       <button page="sfgdfsdf" class="tabbar__button">
    <div class="tabbar__icon" page="sfgdfsdf" >
      <ons-icon icon="md-home"></ons-icon>
    </div>
    <div class="tabbar__label">Home</div>
    </button>
 
       <button class="tabbar__button">
    <div class="tabbar__icon">
      <ons-icon icon="md-tag-more"></ons-icon>
    </div>
    <div class="tabbar__label">Promo</div>
   </button>
  <button class="tabbar__button">
    <div class="tabbar__icon">
      <ons-icon icon="md-face"></ons-icon>
    </div>
    <div class="tabbar__label">Saya</div>
  
  </button>
      </ons-tabbar>
    </ons-bottom-toolbar>