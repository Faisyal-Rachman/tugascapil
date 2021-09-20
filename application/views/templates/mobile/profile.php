  <center>
  <ons-card>
   <?php foreach($uinfo as $tes){
     $cb = $tes['kk_ortu'];
  //   $id = $tes['idkta'];
   //  $buktitrans = $tes['buktitrf'];
   //  $proses = $tes['processed'];
   } ?>


    <ons-list-header>Nomor Kartu Keluarga  : <?php echo $cb; ?></ons-list-header>
    <ons-list-item modifier="longdivider">Nama Kepala Keluarga : <?php echo $tes['nama_ortu']; ?></ons-list-item>
    <ons-list-item modifier="longdivider">No. KK : <?php echo $tes['kk_ortu']; ?></ons-list-item>
   <br>
   <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#bayi">Data Bayi</a></li>
  <li><a data-toggle="tab" href="#menu1">Data Ibu</a></li>
  <li><a data-toggle="tab" href="#menu2">Data Ayah</a></li>
  <li><a data-toggle="tab" href="#menu2">Data Pelapor</a></li>
  <li><a data-toggle="tab" href="#menu2">Data Saksi 1</a></li>
  <li><a data-toggle="tab" href="#menu2">Data Saksi 2</a></li>
</ul>

<div class="tab-content">
  <div id="bayi" class="tab-pane fade in active">
    <h3>Data Bayi</h3>
    <p><?php echo $tes['nama_bayi']; ?></p>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>Some content in menu 1.</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>
<br>
<ons-button modifier="large" onClick="window.location.href = '<?= base_url()."login/logout"?>'">
       KELUAR
       </ons-button> 
  </ons-card>
 
</center>


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
    <div class="tabbar__label">Pojok Informasi</div>
   </button>
  <button class="tabbar__button" onClick="window.parent.location.href = '<?= base_url('profile') ?>'">
    <div class="tabbar__icon">
      <ons-icon icon="md-face" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon>
    </div>
    <div class="tabbar__label">Saya</div>
  
  </button>
      </ons-tabbar>
    </ons-bottom-toolbar>