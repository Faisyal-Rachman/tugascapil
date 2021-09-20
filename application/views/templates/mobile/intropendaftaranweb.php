<!DOCTYPE html>
<html lang="<?= MY_LANGUAGE_ABBR ?>">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <meta name="description" content="Pendaftaran KTA ISRI" />
        <meta name="keywords" content="Anggota ISRI,Pendaftaran KTA ISRI" />
        <title>PENDAFTARAN AKTA KELAHIRAN</title>
     

        <meta name="theme-color" content="#2979FF" />
    <link href="<?php echo base_url () ?>assets/onsenui/css/onsenui.css" type="text/css" rel="stylesheet" media="all">

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
        <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?= base_url('loadlanguage/all.js') ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
</style>
    </head>
<body>
<div class="container bg-light">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   
        <div class="col-md-12 text-center">
            <h1>DUKCAPIL DAERAH</h1>
        <h3 class="mb-4 font-weight-bold dark-grey-text">
            <strong>Pendaftaran Akta Kelahiran & Kartu Keluarga Online</strong>
          </h3>
          <p>
            </p>
          <p></p>
            <button type="button" class="btn btn-primary btn-lg" onClick="daftarakta()">Pendaftaran Akta Kelahiran</button>
            <button type="button" class="btn btn-primary btn-lg" onClick="daftarkk()">Pendaftaran Kartu Keluarga</button>
            <br><br>
            <small>* Isi data sesuai dengan aslinya, jika ada kesalahan input harap menghubungi Admin.</small>
        </div>
      
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <script>
        function daftarakta(){
            location.href='<?= base_url('mendaftaranggota/daftarfrontkta') ?>';
        }
        function daftarkk(){
            location.href='<?= base_url('mendaftaranggota/daftarkk') ?>';
        }
        </script>
</body>
    