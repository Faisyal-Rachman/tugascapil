<div class="container">
<?php foreach($uinfo as $tes){
     $cb = $tes['kk_ortu'];
  //   $id = $tes['idkta'];
   //  $buktitrans = $tes['buktitrf'];
   //  $proses = $tes['processed'];
   } ?>
    <div class="row">
      <div class="card">
		<div class="col-xs-12">
		  			<!-- tabs -->
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#bayi" data-toggle="tab">Bayi</a></li>
					<li><a href="#ibu" data-toggle="tab">Ibu</a></li>
					<li><a href="#ayah" data-toggle="tab">Ayah</a></li>
					<li><a href="#pelapor" data-toggle="tab">Pelapor</a></li>
          <li><a href="#saksi1" data-toggle="tab">Saksi 1</a></li>
          <li><a href="#saksi2" data-toggle="tab">Saksi 2</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="bayi">                
						<div class="">
						  <h1>Nama : <?php echo $tes['nama_bayi']; ?></h1> 
              <p>Jenis kelamin : <?php echo $tes['jk_bayi']; ?></p> 
              <p>Kelahiran : <?php echo $tes['tmpkelahiran']; ?></p> 
              <p>Tanggal : <?php echo $tes['tgl_lahir']; ?></p> 
              <p>Pukul : <?php echo $tes['pukul']; ?></p> 
              <p>Jenis lahir : <?php echo $tes['jenis_lahir']; ?></p> 
              <p>Penolong lahir : <?php echo $tes['penolong_lahir']; ?></p> 
              <p>Berat : <?php echo $tes['berat']; ?></p>        
              <p>Panjang : <?php echo $tes['panjang']; ?></p>                        
						</div>
            <hr>
            <div>
              <h5><em>* Catatan untuk diperhatikan!</em></h5>
							<p><small>Semua data yang ditampilkan di atas adalah data yang asli yang diinputkan oleh kepala keluarga. Jika terdapat kesalahan, ketidaksesuaian atau perubahan data,<br> harap menghubungi admin 24-Jam <ons-icon icon="md-whatsapp" style="color:#009966; font-size: 14px;" size="14px" class="ons-icon zmdi zmdi-whatsapp"> <strong> <?= $nomorWa ?>  </strong></ons-icon>  </small></p>                 
					 </div>
					</div> 
					<div class="tab-pane" id="ibu"> 
						<div class="">
            <h1>Nama : <?php echo $tes['nama_ibu']; ?></h1> 
              <p>NIK : <?php echo $tes['nik_ibu']; ?></p> 
              <p>Tanggal lahir: <?php echo $tes['tgl_lahir_ibu']; ?></p> 
              <p>Umur : <?php echo $tes['umur_ibu']; ?></p> 
              <p>Alamat : <?php echo $tes['alamat_ibu']; ?></p> 
              <p>Pekerjaan : <?php echo $tes['pekerjaan_ibu']; ?></p>        
              <p>Desa : <?php echo $tes['desa_ibu']; ?></p>            
              <p>Kecamatan : <?php echo $tes['kec_ibu']; ?></p>
              <p>Kota : <?php echo $tes['kota_ibu']; ?></p>
              <p>Provinsi : <?php echo $tes['prov_ibu']; ?></p>
              <p>Warga negara : <?php echo $tes['wn_ibu']; ?></p>
              <p>Bangsa : <?php echo $tes['bangsa_ibu']; ?></p>
              <p>Tanggal catat perkawinan : <?php echo $tes['tgl_catat_kawin']; ?></p>
            </div>
            <div>
              <h5><em>* Catatan untuk diperhatikan!</em></h5>
							<p><small>Semua data yang ditampilkan di atas adalah data yang asli yang diinputkan oleh kepala keluarga. Jika terdapat kesalahan, ketidaksesuaian atau perubahan data,<br> harap menghubungi admin 24-Jam <ons-icon icon="md-whatsapp" style="color:#009966; font-size: 14px;" size="14px" class="ons-icon zmdi zmdi-whatsapp"> <strong> <?= $nomorWa ?>  </strong></ons-icon>  </small></p>                 
					 </div>
					</div>
				
					<div class="tab-pane" id="ayah"> 
						<div class="">
            <h1>Nama : <?php echo $tes['nama_ayah']; ?></h1> 
              <p>NIK : <?php echo $tes['nik_ayah']; ?></p> 
              <p>Tanggal lahir: <?php echo $tes['tgl_lahir_ayah']; ?></p> 
              <p>Umur : <?php echo $tes['umur_ayah']; ?></p> 
              <p>Alamat : <?php echo $tes['alamat_ayah']; ?></p> 
              <p>Pekerjaan : <?php echo $tes['pekerjaan_ayah']; ?></p>        
              <p>Desa : <?php echo $tes['desa_ayah']; ?></p>            
              <p>Kecamatan : <?php echo $tes['kec_ayah']; ?></p>
              <p>Kota : <?php echo $tes['kota_ayah']; ?></p>
              <p>Provinsi : <?php echo $tes['prov_ayah']; ?></p>
              <p>Warga negara : <?php echo $tes['wn_ayah']; ?></p>
              <p>Bangsa : <?php echo $tes['bangsa_ayah']; ?></p>
              </div>
              <div>
              <h5><em>* Catatan untuk diperhatikan!</em></h5>
							<p><small>Semua data yang ditampilkan di atas adalah data yang asli yang diinputkan oleh kepala keluarga. Jika terdapat kesalahan, ketidaksesuaian atau perubahan data,<br> harap menghubungi admin 24-Jam <ons-icon icon="md-whatsapp" style="color:#009966; font-size: 14px;" size="14px" class="ons-icon zmdi zmdi-whatsapp"> <strong> <?= $nomorWa ?>  </strong></ons-icon>  </small></p>                 
					 </div>
  </div>
					<div class="tab-pane" id="pelapor"> 
          <div class="">
            <h1>Nama : <?php echo $tes['nama_pelapor']; ?></h1> 
              <p>NIK : <?php echo $tes['nik_pelapor']; ?></p> 
              <p>Tanggal lahir: <?php echo $tes['tgl_lahir_pelapor']; ?></p> 
              <p>Umur : <?php echo $tes['umur_pelapor']; ?></p> 
              <p>Alamat : <?php echo $tes['alamat_pelapor']; ?></p> 
              <p>Pekerjaan : <?php echo $tes['pekerjaan_pelapor']; ?></p>        
              <p>Desa : <?php echo $tes['desa_pelapor']; ?></p>            
              <p>Kecamatan : <?php echo $tes['kec_pelapor']; ?></p>
              <p>Kota : <?php echo $tes['kota_pelapor']; ?></p>
              <p>Provinsi : <?php echo $tes['prov_pelapor']; ?></p>
              <p>Bangsa : <?php echo $tes['bangsa_pelapor']; ?></p>
              </div>
              <div>
              <h5><em>* Catatan untuk diperhatikan!</em></h5>
							<p><small>Semua data yang ditampilkan di atas adalah data yang asli yang diinputkan oleh kepala keluarga. Jika terdapat kesalahan, ketidaksesuaian atau perubahan data,<br> harap menghubungi admin 24-Jam <ons-icon icon="md-whatsapp" style="color:#009966; font-size: 14px;" size="14px" class="ons-icon zmdi zmdi-whatsapp"> <strong> <?= $nomorWa ?>  </strong></ons-icon>  </small></p>                 
					 </div>
					</div>
          <div class="tab-pane" id="saksi1"> 
          <div class="">
            <h1>Nama : <?php echo $tes['nama_saksi1']; ?></h1> 
              <p>NIK : <?php echo $tes['nik_saksi1']; ?></p> 
              <p>Umur : <?php echo $tes['umur_saksi1']; ?></p> 
              <p>Alamat : <?php echo $tes['alamat_saksi1']; ?></p> 
              <p>Pekerjaan : <?php echo $tes['pekerjaan_saksi1']; ?></p>        
              <p>Desa : <?php echo $tes['desa_saksi1']; ?></p>            
              <p>Kecamatan : <?php echo $tes['kec_saksi1']; ?></p>
              <p>Kota : <?php echo $tes['kota_saksi1']; ?></p>
              <p>Provinsi : <?php echo $tes['prov_saksi1']; ?></p>
             </div>
              <div>
              <h5><em>* Catatan untuk diperhatikan!</em></h5>
							<p><small>Semua data yang ditampilkan di atas adalah data yang asli yang diinputkan oleh kepala keluarga. Jika terdapat kesalahan, ketidaksesuaian atau perubahan data,<br> harap menghubungi admin 24-Jam <ons-icon icon="md-whatsapp" style="color:#009966; font-size: 14px;" size="14px" class="ons-icon zmdi zmdi-whatsapp"> <strong> <?= $nomorWa ?>  </strong></ons-icon>  </small></p>                 
					 </div>
					</div>
          <div class="tab-pane" id="saksi2"> 
          <div class="">
            <h1>Nama : <?php echo $tes['nama_saksi2']; ?></h1> 
              <p>NIK : <?php echo $tes['nik_saksi2']; ?></p> 
              <p>Umur : <?php echo $tes['umur_saksi2']; ?></p> 
              <p>Alamat : <?php echo $tes['alamat_saksi2']; ?></p> 
              <p>Pekerjaan : <?php echo $tes['pekerjaan_saksi2']; ?></p>        
              <p>Desa : <?php echo $tes['desa_saksi1']; ?></p>            
              <p>Kecamatan : <?php echo $tes['kec_saksi2']; ?></p>
              <p>Kota : <?php echo $tes['kota_saksi2']; ?></p>
              <p>Provinsi : <?php echo $tes['prov_saksi2']; ?></p>
             </div>
              <div>
              <h5><em>* Catatan untuk diperhatikan!</em></h5>
							<p><small>Semua data yang ditampilkan di atas adalah data yang asli yang diinputkan oleh kepala keluarga. Jika terdapat kesalahan, ketidaksesuaian atau perubahan data,<br> harap menghubungi admin 24-Jam <ons-icon icon="md-whatsapp" style="color:#009966; font-size: 14px;" size="14px" class="ons-icon zmdi zmdi-whatsapp"> <strong> <?= $nomorWa ?>  </strong></ons-icon>  </small></p>                 
					 </div>
					</div>
				</div>
			</div>
			<!-- /tabs -->
		</div>
	</div>
</div>
</div>