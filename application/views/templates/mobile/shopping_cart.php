<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
   <ons-page>
    <ons-toolbar class="toolbar--material">
     <div class="toolbar__left toolbar--material__left">
      
           <span class="toolbar-button toolbar-button--material">
    <i class="zmdi zmdi-favorite"></i>
    </span>
      
      </div>
      <div class="center toolbar__center toolbar--material__center" >
        Main
      </div>
	   
	<div class="toolbar__right toolbar--material__right">
     <span class="toolbar-button toolbar-button--material">
    <i class="zmdi zmdi-share"></i>
    </span>
    <span class="toolbar-button toolbar-button--material">
    <i class="zmdi zmdi-notifications"></i>
    </span>
</div>
    </ons-toolbar>
   
<div class="container" id="shopping-cart">
<?php 
    if(isset($_SESSION)){
   echo "Ok";
   var_dump($_SESSION);
  }else{
   echo "No";
  }
  ?>

    <ons-row>
  <ons-col>
    <h1>Login untuk Belanja</h1>
<a href="<?= site_url('checkout/logout')?>">Logout</a>
    <?php
    if ($cartItems['array'] == null) {
        ?>
        <div class="alert alert-info"><?= lang('no_products_in_cart') ?></div>
        <?php
    } else {
        echo purchase_steps(1);

        ?>
		 <ons-card><div class="content">
     
            <table class="table table-bordered table-products">
             
                <tbody>
                    <?php foreach ($cartItems['array'] as $item) { ?>
                        <tr>
                            <td class="relative"> <ons-col>
                                <input type="hidden" name="id[]" value="<?= $item['id'] ?>">
                                <input type="hidden" name="quantity[]" value="<?= $item['num_added'] ?>">
                                <img class="product-image" src="<?= base_url('/attachments/shop_images/' . $item['image']) ?>" alt="">
                                <a href="<?= base_url('home/removeFromCart?delete-product=' . $item['id'] . '&back-to=shopping-cart') ?>" class="btn btn-xs btn-danger remove-product">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a> </ons-col>
                            </td>
                            <td><?= $item['title'] ?>  
							<br>
							     <a class="btn btn-xs btn-primary refresh-me add-to-cart <?= $item['quantity'] <= $item['num_added'] ? 'disabled' : '' ?>" data-id="<?= $item['id'] ?>" href="javascript:void(0);">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                                <span class="quantity-num">
                                    <?= $item['num_added'] ?>
                                </span>
                                <a class="btn  btn-xs btn-danger" onclick="removeProduct(<?= $item['id'] ?>, true)" href="javascript:void(0);">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </a>
							<p> <?= CURRENCY  .  $item['price'] ?></p>
							</td>
                           
                           
                         
                        </tr>
						<tr>
                    <?php } ?>
                  
                </tbody>
            </table>
			 <p style="text-align:right">
      Total <?= CURRENCY  .  $cartItems['finalSum'] ?>
      </p>
        </div> </ons-card>
       
    <?php } ?>
</div>
<?php
if ($this->session->flashdata('deleted')) {
    ?>
    <script>
        $(document).ready(function () {
            ShowNotificator('alert-info', '<?= $this->session->flashdata('deleted') ?>');
        });
    </script>
<?php } ?>
<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar position="auto">
	   <ons-button modifier="large" style="border:1px solid #fff" onClick="window.location.href = 'home'"><i class="zmdi zmdi-undo zmdi-hc-lg"></i> KEMBALI</ons-button>
	   <ons-button modifier="large" style="border:1px solid #fff" onClick="window.location.href = 'checkout'"> BELI <i class="zmdi zmdi-cutlery"></i> </ons-button>
      </ons-tabbar>
    </ons-bottom-toolbar>