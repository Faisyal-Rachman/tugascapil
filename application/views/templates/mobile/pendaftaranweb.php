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

    <div class="row">
    <div class="col-lg-1"></div>
<div class="col-lg-10"><div class="card"><div class="col-lg-7 col-xl-7">
          <!--Excerpt-->
      <h3 class="mb-4 font-weight-bold dark-grey-text">
            <strong>Petunjuk Pengisian Form</strong>
          </h3>
          <p>
            </p><ul>
                    <li class="letterLi2">Pastikan data yang anda masukkan sesuai kartu identitas yang berlaku, benar, dan dapat dipertanggungjawabkan.</li>
                    <li class="letterLi2">Inputan dengan tanda <span class="mandatory">*</span> wajib diisi.</li>
                    <li class="letterLi2">Konfimasi ke Admin <?php echo $nomorWa; ?>, jika ada kesalahan input data.</li>
                </ul>
          <p></p>
        </div></div></div>
<div class="col-lg-1"></div>
</div>
<br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="card">
	<div class="card-header" style="background-color:#dddddd;"><h3>FORM PENDAFTARAN AKTA KELAHIRAN</h3></div>
  <div class="panel-body">
    <p>
	<form class="form-horizontal" action="<?php echo base_url('daftar_akta_lahirweb'); ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
<div class="col-lg-6">
  <input type="text" class="form-control form-control-lg" name="nama_kepalakeluarga" value="" id="nama_kepalakeluarga" placeholder="Nama kepala keluarga">
</div>

<div class="col-lg-6">
  <input type="text" class="form-control form-control-lg" name="nokk" value="" id="nokk" placeholder="Nomor kartu keluarga">
</div>
</div>






<div class="card">
	<div class="card-header" style="background-color:#d6e9c6;" text-white><h3>BAYI / ANAK</h3></div>
  <div class="panel-body">
    
 <div class="form-group">

<div class="col-lg-6">
  <input type="text" class="form-control form-control-lg" name="namabayi" value="" id="namabayi" placeholder="Nama bayi">
</div>
<div class="col-lg-6">
  <select class="form-control form-control-lg" name="jkb">
  <option value="-" selected>Pilih jenis kelamin</option>
    <option value="Laki-laki">Laki - laki</option>
    <option value="Perempuan">Perempuan</option>
  </select>
</div>


</div>
<div class="form-group">

<div class="col-lg-6">
<select class="form-control form-control-lg" name="tdlb">
  <option value="-" selected>Tempat dilahirkan</option>
    <option value="RS">RS</option>
    <option value="Puskesmas">Puskesmas</option>
    <option value="Polindes">Polindes</option>
    <option value="Rumah">Rumah</option>
    <option value="Lainnya">Lainnya</option>
  </select></div>
<div class="col-lg-6">
<input type="text" class="form-control form-control-lg" name="tkb" value="" id="tkb" placeholder="Tempat kelahiran">
</div>
</div>
<div class="form-group">
<div class="col-lg-3">
  <select class="form-control form-control-lg" name="hlb">
  <option value="-" selected>-Hari lahir-</option>
    <option value="Senin">Senin</option>
    <option value="Selasa">Selasa</option>
    <option value="Rabu">Rabu</option>
    <option value="Kamis">Kamis</option>
    <option value="Jum'at">Jum'at</option>
    <option value="Sabtu">Sabtu</option>
    <option value="Minggu">Minggu</option>
  </select>
</div>
<div class='col-sm-3'>
              <!-- Date input -->
            <input class="form-control form-control-lg" id="tlbayi" name="tlbayi" placeholder="TGL/BULAN/TAHUN" type="text"/>
      </div>

  <div class="col-lg-3">
            <input class="form-control form-control-lg" id="pklb" name="pklb" placeholder="Pukul (07:00)" type="text"/>
   </div>

<div class="col-lg-3">
  <select class="form-control form-control-lg" name="jklb">
  <option value="-" selected>Jenis kelahiran</option>
    <option value="tunggal">Tunggal</option>
    <option value="kembar1">Kembar 1</option>
    <option value="kembar2">Kembar 2</option>
    <option value="kembar3">Kembar 3</option>
    <option value="kembar4">Kembar 4</option>
    <option value="lainnya">Lainnya</option>
  </select>
</div>
</div>
<div class="form-group">
<div class="col-lg-3">
  <select class="form-control form-control-lg" name="kkb">
  <option value="-" selected>Kelahiran ke</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
  </select>
</div>
<div class="col-lg-3">
  <select class="form-control form-control-lg" name="pkb">
  <option value="-" selected>Penolong kelahiran</option>
    <option value="Dokter">Dokter</option>
    <option value="Bidan">Bidan/Perawat</option>
    <option value="Dukun">Dukun</option>
    <option value="Lainnya">Lainnya</option>
  </select>
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="bbkb" value="" id="bbkb" placeholder="Berat bayi (Kg)">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="pbcb" value="" id="pbcb" placeholder="Panjang bayi (Cm)">
</div>
</div>
</div>
</div>
<div class="card">
	<div class="card-header" style="background-color:#d6e9c6;" text-white><h3>I B U</h3></div>
  <div class="panel-body">
    
 <div class="form-group">
<div class="col-lg-6">
  <input type="text" class="form-control form-control-lg" name="nikibu" value="" id="nikibu" placeholder="NIK">
</div>
<div class="col-lg-6">
<input type="text" class="form-control form-control-lg" name="namaibu" value="" id="namaibu" placeholder="Nama lengkap">
</div>
</div>
<div class="form-group">
<div class='col-sm-3'>
              <!-- Date input -->
            <input class="form-control form-control-lg" id="tlibu" name="tlibu" placeholder="TGL/BULAN/TAHUN" type="text"/>
               </div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="umuribu" value="" id="umuribu" placeholder="Umur">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kerjaibu" value="" id="kerjaibu" placeholder="Pekerjaan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="almtibu" value="" id="almtibu" placeholder="Alamat">
</div>
</div>
<div class="form-group">
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="desaibu" value="" id="desaibu" placeholder="Desa/Kelurahan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kecibu" value="" id="kecibu" placeholder="Kecamatan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kotaibu" value="" id="kotaibu" placeholder="Kota">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="provibu" value="" id="provibu" placeholder="Provinsi">
</div>
</div>
<div class="form-group">
<div class="col-lg-3">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="warga" id="warga" value="wni">
  <label class="form-check-label" for="inlineRadio1">WNI</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="warga" id="warga" value="wna">
  <label class="form-check-label" for="inlineRadio2">WNA</label>
</div>
</div>
<div class="col-lg-9">
<input type="text" class="form-control form-control-lg" name="bangsaibu" value="" id="bangsaibu" placeholder="Kebangsaan">
</div>
</div>
<div class="form-group">
<div class='col-sm-4'>
              <!-- Date input -->
            <input class="form-control form-control-lg" id="tlnikah" name="tlnikah" placeholder="TGL/BULAN/TAHUN PERKAWINAN" type="text"/>
               </div>
</div>
</div>
</div>

<div class="card">
	<div class="card-header" style="background-color:#d6e9c6;" text-white><h3>A Y A H</h3></div>
  <div class="panel-body">
    
 <div class="form-group">
<div class="col-lg-6">
  <input type="text" class="form-control form-control-lg" name="nikayah" value="" id="nikayah" placeholder="NIK">
</div>
<div class="col-lg-6">
<input type="text" class="form-control form-control-lg" name="namaayah" value="" id="namaayah" placeholder="Nama lengkap">
</div>
</div>
<div class="form-group">
<div class='col-sm-3'>
              <!-- Date input -->
            <input class="form-control form-control-lg" id="tlayah" name="tlayah" placeholder="TGL/BULAN/TAHUN" type="text"/>
               </div>
               <div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="umurayah" value="" id="umurayah" placeholder="Umur">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kerjaayah" value="" id="kerjaayah" placeholder="Pekerjaan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="almtayah" value="" id="almtayah" placeholder="Alamat">
</div>
</div>

<div class="form-group">
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="desaayah" value="" id="desaayah" placeholder="Desa/Kelurahan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kecayah" value="" id="kecayah" placeholder="Kecamatan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kotaayah" value="" id="kotaayah" placeholder="Kota">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="provayah" value="" id="provayah" placeholder="Provinsi">
</div>
</div>
<div class="form-group">
<div class="col-lg-3">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="wargaayah" id="wargaayah" value="wniayah">
  <label class="form-check-label" for="inlineRadio1">WNI</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="wargaayah" id="wargaayah" value="wnaayah">
  <label class="form-check-label" for="inlineRadio2">WNA</label>
</div>
</div>
<div class="col-lg-9">
<input type="text" class="form-control form-control-lg" name="bangsaayah" value="" id="bangsaayah" placeholder="Kebangsaan">
</div>
</div>
</div>
</div>
<div class="card">
	<div class="card-header" style="background-color:#d6e9c6;" text-white><h3>PELAPOR</h3></div>
  <div class="panel-body">
    
 <div class="form-group">
<div class="col-lg-6">
  <input type="text" class="form-control form-control-lg" name="nikpelapor" value="" id="nikpelapor" placeholder="NIK">
</div>
<div class="col-lg-6">
<input type="text" class="form-control form-control-lg" name="namapelapor" value="" id="namapelapor" placeholder="Nama lengkap">
</div>
</div>
<div class="form-group">
<div class="col-lg-4">
<input type="text" class="form-control form-control-lg" name="umurpelapor" value="" id="umurpelapor" placeholder="Umur">
</div>
<div class="col-lg-4">
  <select class="form-control form-control-lg" name="jkpelapor">
  <option value="-" selected>-Jenis kelamin-</option>
    <option value="Laki-laki">Laki - laki</option>
    <option value="Perempuan">Perempuan</option>
  </select>
</div>
<div class="col-lg-4">
<input type="text" class="form-control form-control-lg" name="kerjapelapor" value="" id="kerjapelapor" placeholder="Pekerjaan">
</div>
</div>
<div class="form-group">
<div class="col-lg-12">
<input type="text" class="form-control form-control-lg" name="almtpelapor" value="" id="almtpelapor" placeholder="Alamat">
</div>
</div>
<div class="form-group">
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="desapelapor" value="" id="desapelapor" placeholder="Desa/Kelurahan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kecpelapor" value="" id="kecpelapor" placeholder="Kecamatan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kotapelapor" value="" id="kotapelapor" placeholder="Kota">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="provpelapor" value="" id="provpelapor" placeholder="Provinsi">
</div>
</div>
<div class="form-group">
<div class="col-lg-6">
<input type="text" class="form-control form-control-lg" name="bangsapelapor" value="" id="bangsapelapor" placeholder="Kebangsaan">
</div>
</div>
</div>
</div>
<div class="card">
	<div class="card-header" style="background-color:#d6e9c6;" text-white><h3>SAKSI I</h3></div>
  <div class="panel-body">
    
 <div class="form-group">
<div class="col-lg-6">
  <input type="text" class="form-control form-control-lg" name="niksaksi1" value="" id="niksaksi1" placeholder="NIK">
</div>
<div class="col-lg-6">
<input type="text" class="form-control form-control-lg" name="namasaksi1" value="" id="namasaksi1" placeholder="Nama lengkap">
</div>
</div>
<div class="form-group">
<div class="col-lg-4">
<input type="text" class="form-control form-control-lg" name="umursaksi1" value="" id="umursaksi1" placeholder="Umur">
</div>
<div class="col-lg-4">
<input type="text" class="form-control form-control-lg" name="kerjasaksi1" value="" id="kerjasaksi1" placeholder="Pekerjaan">
</div>
<div class="col-lg-4">
<input type="text" class="form-control form-control-lg" name="almtsaksi1" value="" id="almtsaksi1" placeholder="Alamat">
</div>
</div>
<div class="form-group">
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="desasaksi1" value="" id="desasaksi1" placeholder="Desa/Kelurahan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kecsaksi1" value="" id="kecsaksi1" placeholder="Kecamatan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kotasaksi1" value="" id="kotasaksi1" placeholder="Kota">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="provsaksi1" value="" id="provsaksi1" placeholder="Provinsi">
</div>
</div>
</div>
</div>
<div class="card">
	<div class="card-header" style="background-color:#d6e9c6;" text-white><h3>SAKSI II</h3></div>
  <div class="panel-body">
    
 <div class="form-group">
<div class="col-lg-6">
  <input type="text" class="form-control form-control-lg" name="niksaksi2" value="" id="niksaksi2" placeholder="NIK">
</div>
<div class="col-lg-6">
<input type="text" class="form-control form-control-lg" name="namasaksi2" value="" id="namasaksi2" placeholder="Nama lengkap">
</div>
</div>
<div class="form-group">
<div class="col-lg-4">
<input type="text" class="form-control form-control-lg" name="umursaksi2" value="" id="umursaksi2" placeholder="Umur">
</div>
<div class="col-lg-4">
<input type="text" class="form-control form-control-lg" name="almtsaksi2" value="" id="almtsaksi2" placeholder="Alamat">
</div>
<div class="col-lg-4">
<input type="text" class="form-control form-control-lg" name="kerjasaksi2" value="" id="kerjasaksi2" placeholder="Pekerjaan">
</div>
</div>

<div class="form-group">
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="desasaksi2" value="" id="desasaksi2" placeholder="Desa/Kelurahan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kecsaksi2" value="" id="kecsaksi2" placeholder="Kecamatan">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="kotasaksi2" value="" id="kotasaksi2" placeholder="Kota">
</div>
<div class="col-lg-3">
<input type="text" class="form-control form-control-lg" name="provsaksi2" value="" id="provsaksi2" placeholder="Provinsi">
</div>
</div>
</div>
</div>
</div>

<div class="row">

  <div class="col-lg-4">
    <button type="submit" class="btn btn-info btn-lg float-right"><strong>Kirim Data!</strong></button>
  
</div>

  <div class="col-lg-5">
   <a href="<?= base_url()."index.php/login/loginweb";?>"> <button type="button" class="btn btn-info btn-lg float-right"><strong>Login ke Profile!</strong></button></a>
 
</div>
</div>
</form>
</p>
</div>
</div>
</div>
</div>
<div class="col-md-2"></div>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="tlbayi"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })

    $(document).ready(function(){
      var date_input=$('input[name="tlibu"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })

    $(document).ready(function(){
      var date_input=$('input[name="tlayah"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })

    $(document).ready(function(){
      var date_input=$('input[name="tlnikah"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })


    $("#provinsi").change(function(){

// variabel dari nilai combo box kendaraan
var id = $("#provinsi").val();

// Menggunakan ajax untuk mengirim dan dan menerima data dari server
$.ajax({
    url : "<?php echo base_url();?>listkota",
    method : "POST",
    data : {id:id},
    async : false,
    dataType : 'json',
    success: function(data){
    
        var html = '';
        var i;

        for(i=0; i<data.length; i++){
            html += '<option value='+data[i].id+'>'+data[i].name_kota+'</option>';
        }
      
        $('#merk').html(html);

    }
});
});
 
  </script>