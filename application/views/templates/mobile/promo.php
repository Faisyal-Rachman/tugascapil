<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
<ons-card>
<ons-row>
     <ons-col>
       <ul class="list list--material">
  <li class="list-header list-header--material">
   Promo setiap pekan!
  </li>
  <li class="list-item list-item--material">
    <div class="list-item__center list-item--material__center">
      <div class="list-item__title list-item--material__title">Setiap Jum'at pelanggan bisa mendapatkan makanan gratis.
</div>
      <br><br><div class="list-item__subtitle list-item--material__subtitle"><p>Promo ini berlaku dari pukul 07.30 s/d 09.00.</p></div>
      <div class="list-item__subtitle list-item--material__subtitle"><p>Pelanggan jarak 10Km dari lokasi kedai olala bisa mendapatkan promo ini.</p></div>
      <div class="list-item__subtitle list-item--material__subtitle"><p>Pelanggan hanya bisa memakai 1 akun, untuk dapat promo.</p></div>
    </div>
  </li>
</ul>
                            
                </ons-col>
         </ons-row>

</ons-card>
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
      <ons-icon icon="md-notifications-active" style="color:#fe3824;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Info Paguntaka</div>
   </button>
  <button class="tabbar__button" onClick="window.parent.location.href = '<?= base_url('profile') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-face" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Saya</div>
  
  </button>
      </ons-tabbar>
    </ons-bottom-toolbar>
    

