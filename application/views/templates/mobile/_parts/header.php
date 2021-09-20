<!DOCTYPE html>
<html lang="<?= MY_LANGUAGE_ABBR ?>">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <meta name="description" content="<?= $description ?>" />
        <meta name="keywords" content="<?= $keywords ?>" />
        <title><?= $title ?></title>
     

        <meta name="theme-color" content="#2979FF" />
    <link href="<?php echo base_url () ?>assets/onsenui/css/onsenui.css" type="text/css" rel="stylesheet" media="all">
     <link href='<?php echo base_url () ?>manifest.json' rel='manifest'>
     <link href='<?php echo base_url () ?>manifest.webmanifest' rel='manifest'>
     <script src="<?php echo base_url () ?>pwabuilder-sw-register.js"></script>
     <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5eaa7befb704b50012abfb8a&product=inline-share-buttons' async='async'></script>
       <link href="<?php echo base_url () ?>assets/onsenui/css/onsen-css-components.css" type="text/css" rel="stylesheet" media="all">
<link rel="manifest" href="<?php echo base_url () ?>manifest.json">    
<link rel="manifest" href="<?php echo base_url () ?>manifest.webmanifest">
  <link href="<?php echo base_url () ?>assets/onsenui/css/ionicons/css/ionicons.min.css" type="text/css" rel="stylesheet" media="all">
  <link href="<?php echo base_url () ?>assets/onsenui/css/ionicons/css/ionicons.css" type="text/css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="<?php echo base_url () ?>assets/onsenui/css/font_awesome/css/fontawesome.css" type="text/css" media="all">
   <link rel="stylesheet" href="<?php echo base_url () ?>assets/onsenui/css/font_awesome/css/fontawesome.min.css" type="text/css" media="all">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.2/leaflet.css" />
        <script src="<?php echo base_url () ?>assets/onsenui/js/onsenui.min.js"></script> 
 <link rel="stylesheet" href="<?= base_url('assets/bootstrap-4.3.1-dist/css/bootstrap.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
   <link rel="stylesheet" href="<?= base_url('assets/bootstrap-4.3.1-dist/css/bootstrap.css') ?>" />
        <link href="<?= base_url('assets/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('templatecss/custom.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('cssloader/theme.css') ?>" rel="stylesheet" />
        <script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?= base_url('loadlanguage/all.js') ?>"></script>
        <?php if ($cookieLaw != false) { ?>
            <script type="text/javascript">
                window.cookieconsent_options = {"message": "<?= $cookieLaw['message'] ?>", "dismiss": "<?= $cookieLaw['button_text'] ?>", "learnMore": "<?= $cookieLaw['learn_more'] ?>", "link": "<?= $cookieLaw['link'] ?>", "theme": "<?= $cookieLaw['theme'] ?>"};
            </script>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
        <?php } ?>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php
       if(isset($profileData['email'])){
          $cvote = $profileData['email'];
        } elseif(isset($fb['email'])){
           $cvote = $fb['email'];
        } else {
          $cvote = "Not";
        }
        ?>
    <style>
.page__background{
  background-color: #DEDFEE !important;
}

ons-dialog:not([modifier='material']) p {
  margin-left: 10px;
  margin-right: 10px;
}
.kedaiolala {
  font-size: 19px;
    background: linear-gradient(to right, #0a24ec 0%, #f50707 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
input {
  width: 100%;
}

  .some-page-wrapper {

  margin: 15px;
  background-color: red;
}

.row {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  width: 100%;
}

.column {
  display: flex;
  flex-direction: column;
  flex-basis: 100%;
  flex: 1;
}

.orange-column {
  background-color: orange;
  height: 100px;
}

.blue-column {
  background-color: blue;
  height: 100px;
}

.green-column {
  background-color: green;
  height: 100px;
}

 #map {
          
         height:35%;
         width:100%;
         padding:0px;
         margin:0px;
         z-index:1;              
      }  
        #distance {
             top: 8px;      
            z-index:2;   
            border-radius:20px;
            font-family: verdana;
            text-decoration: none;
            width:100%;
            height: 170px;
            resize:both;
            overflow: auto;            
          font-weight: bold;
            padding-left: 6px;
            color:#2979FF;
            text-shadow: 1px 2px 3px #fff;
          
            font-size: 13px;
            
        }   
       

#body{ width:60%;}
h1{ color: #000; background-color: none; border-bottom: 1px solid #eeeeee; font-size: 19px; font-weight: bold; margin: 0 0 14px 0; padding: 14px 15px 10px 15px; }
h2{ color:#3e78e2; border-bottom: 1px solid #D0D0D0; font-size: 19px; font-weight: bold; margin: 0; padding: 0}
h3{ color:#727f8a;}
p{ font-size: 15px;margin:0px 0px 20px 0px;}
ul{ margin:0; padding:0; }
li{ cursor:pointer; list-style-type: none; display: inline-block; font-size:20px; }
.highlight, .selected { color:#FE3824; }

</style>

<script>


  function highlightStar(obj,id) {
    removeHighlight(id);    
    $('#rate-'+id+' li').each(function(index) {
      $(this).addClass('highlight');
      if(index == $('#rate-'+id+' li').index(obj)) {
        return false; 
      }
    });
  }

  // event yang terjadi pada saat kita mengarahkan kursor kita ke sebuah object
  function removeHighlight(id) {
    $('#rate-'+id+' li').removeClass('selected');
    $('#rate-'+id+' li').removeClass('highlight');
  }

  function addRating(obj,id) {
    $('#rate-'+id+' li').each(function(index) {
      $(this).addClass('selected');
      $('#rate-'+id+' #rating').val((index+1));
      if(index == $('#rate-'+id+' li').index(obj)) {
        return false; 
      }
    });
    $.ajax({
    url: "<?php echo base_url('berita/tambah_rating'); ?>",
   data:'id='+id+'&rating='+$('#rate-'+id+' #rating').val()+'&user=<?php echo $cvote; ?>',
    type: "POST"
    });
  }

  function resetRating(id) {
    if($('#rate-'+id+' #rating').val() != 0) {
      $('#rate-'+id+' li').each(function(index) {
        $(this).addClass('selected');
        if((index+1) == $('#rate-'+id+' #rating').val()) {
          return false; 
        }
      });
    }
  } 
</script>    
  <script>
// This is the "Offline page" service worker

// Add this below content to your HTML page, or add the js file to your page at the very top to register service worker

// Check compatibility for the browser we're running this in
if ("serviceWorker" in navigator) {
  if (navigator.serviceWorker.controller) {
    console.log("[PWA Builder] active service worker found, no need to register");
  } else {
    // Register the service worker
    navigator.serviceWorker
      .register("pwabuilder-sw.js", {
        scope: "./"
      })
      .then(function (reg) {
        console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
      });
  }
}
      </script>
      <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "ab5428db-ba2b-4abe-9422-18e03a6ebc69",
    });
  });
</script>
    </head>

    <body>
<script src="<?php echo base_url () ?>pwabuilder-sw-register.js"></script>
      <?php echo $cvote; ?>
<script>
 window.addEventListener('load', function() {
    if(!navigator.share) {
      document.querySelector('.share-container').innerHTML = 'Web Share API not supported in this browser';
      return;
    }
    document.getElementById('btn-share').addEventListener('click', function() {
      navigator.share({
        title: '<?php echo $title; ?>',
        text: '<?php echo $description; ?>',
        url: '<?php echo base_url($this->uri->uri_string()); ?>',
      });
    });
  });

</script>
     <ons-page>
    <ons-toolbar class="toolbar--material">
     <div class="toolbar__left toolbar--material__left">
      <button class="tabbar__button" onClick="window.parent.location.href = '#'">
    <div class="tabbar__icon">
     <img src="<?= base_url();?>assets/imgs/logoisrinewblack.png"  style="padding-top:-1px;color:#2979FF;" width="35px"></ons-icon>
    </div>
     </button>
      
      </div>
      <div class="center toolbar__center toolbar--material__center" >
        <b class="kedaiolala">Akta Kelahiran & Kartu Keluarga</b>
      </div>
          
  <div class="toolbar__right toolbar--material__right">
  
</div>

  <div class="toolbar__right toolbar--material__right">

  <button class="tabbar__button" id="btn-share">
    <div class="tabbar__icon">
      <ons-icon icon="md-share" style="padding-top:5px;color:#fda134;" size="30px"></ons-icon>
    </div>
     </button>
   
</div>
    </ons-toolbar>

