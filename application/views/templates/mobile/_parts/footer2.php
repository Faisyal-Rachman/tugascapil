<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar swipeable position="auto">
	 
       <button page="sfgdfsdf" class="tabbar__button" onClick="window.location.href = 'shopping-cart'">
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
      <ons-icon icon="md-shopping-basket"></ons-icon>
    </div>
    <div class="tabbar__label">Menu</div>
    <div class="sumOfItems tabbar__badge notification"><?= $cartItems['array'] == 0 ? 0 : $sumOfItems ?></div>
  </button>


<button class="tabbar__button">
    <div class="tabbar__icon">
      <ons-icon icon="md-face"></ons-icon>
    </div>
    <div class="tabbar__label">Saya</div>
  
  </button>
      </ons-tabbar>
    </ons-bottom-toolbar>
	
	
<div id="notificator" class="alert"></div>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-confirmation.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap-select-1.12.1/js/bootstrap-select.min.js') ?>"></script>
<script src="<?= base_url('assets/js/placeholders.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
<script>
var variable = {
    clearShoppingCartUrl: "<?= base_url('clearShoppingCart') ?>",
    manageShoppingCartUrl: "<?= base_url('manageShoppingCart') ?>",
    discountCodeChecker: "<?= base_url('discountCodeChecker') ?>"
};
</script>
<script src="<?= base_url('assets/js/system.js') ?>"></script>
<script src="<?= base_url('templatejs/mine.js') ?>"></script>
</body>
</html>