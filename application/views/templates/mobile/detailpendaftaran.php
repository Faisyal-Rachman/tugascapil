<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <br>
     
	<div class="toolbar"> 
 <div class="toolbar__center"> <ons-icon icon="md-face" style="color:#2979ff;text-shadow: 1px 1px 1px #cccccc;"></ons-icon> &nbsp;
  <b>Detail Informasi Pendaftaran!</b>
 </div>
  </div><ons-card>
         
	  <ons-row>
              
                         
							<ons-col width="100%" align="left">
	
              <div class="alert alert-info">   
                                           <?php
                                            $nik = $this->session->userdata('nik'); 
                                            $noanggota = $this->session->userdata('no_anggota');
                                            $nama = $this->session->userdata('nama');
                                            $email = $this->session->userdata('email');
                                            $alamat = $this->session->userdata('alamat');
                                            $telp = $this->session->userdata('telp');
                                            $foto = $this->session->userdata('foto');
                                           
                                           echo "<h4>No. Anggota : ".$noanggota."<h4>";
                                           echo "<h4>NIK : ".$nik."</h4>";
                                           echo "<h4>Nama : ".$nama."</h4>";
                                           echo "<h4>Email : ".$email."</h4>";
                                           echo "<h4>Alamat : ".$alamat."</h4>";
                                           echo "<h4>Telp : ".$telp."</h4>";
                                           echo "<img src=".base_url()."assets/imgs/".$foto." class='img-fluid'>";
                                           
                                           ?>

<small>* Harap lindungi data pribadi Anda. </small>

                                      </div>
                                          
										   <span>
                                             
                                              
                                            </span>
							</ons-col></ons-row><hr>
                           
                                        
                    
              </ons-card><br>
<br><br><br><br>
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
    <div class="tabbar__label">Depan</div>
    </button>
 
             <button class="tabbar__button" onClick="window.location.href = '<?= base_url('kedaionlinetarakan/informasiseputartarakan') ?>'">
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