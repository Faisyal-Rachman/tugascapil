<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ons-card style="text-align:center">


  <div style="text-align: center; margin-top: 30px;">

      <h3 class="login-box-msg">Bergabung dengan Kami.</h3>
      <p class="logsmall">Selamat datang, silahkan login.</p>
      <?php 
            echo $this->session->flashdata('message');
            ?>
      <form class="form-horizontal" action="<?php echo base_url('LoginWithGooglePlus/index'); ?>" method="post" enctype="multipart/form-data">
      <div style="text-align: center; margin-top: 30px;">
    <p>
      <ons-input id="username" modifier="underbar" name='a' placeholder="Nomor Anggota" float></ons-input>
    </p>
    <p>
      <ons-input id="password" modifier="underbar" type="password" name='b' placeholder="Password" float></ons-input>
    </p>
    <p style="margin-top: 30px;">
    <button type="submit" name='submit' class="btn btn-info btn-block btn-lg" style="border:none;background-color:#D1B06B;color:#fff;">Login</button>
         
    </p>
  </div>
      
      
      
      </form>
  
      </div>
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