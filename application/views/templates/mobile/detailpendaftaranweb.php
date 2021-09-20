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
<br>
<small>* Harap lindungi data pribadi Anda. </small>
<br>

                                      </div>
                                      <div class="col-lg-6">
 <a href="<?= base_url();?>"><button type="button" class="btn btn-info btn-lg float-right"><strong>Kembali ke Depan </strong></button></a>
  </div>
  <div class="col-lg-6">
   <a href="<?= base_url()."profile/web";?>"><button type="button" class="btn btn-info btn-lg"><strong>Halaman Profile </strong></button></a>
  </div>
										   <span>
                                             
                                              
                                            </span>
							</ons-col></ons-row><hr>
                           
                                        
                    
              </ons-card><br>
<br><br><br><br>
  </ons-page>