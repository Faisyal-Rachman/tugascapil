<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ons-card style="text-align:center">


  <div style="text-align: center; margin-top: 30px;">

      <h3 class="login-box-msg">Selamat datang kembali.</h3>
      <p class="logsmall">Silahkan login dengan NO.KK Anda!</p>
      <?php 
            echo $this->session->flashdata('message');
            ?>
      <form class="form-horizontal" action="<?php echo base_url('LoginWithWeb/index'); ?>" method="post" enctype="multipart/form-data">
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