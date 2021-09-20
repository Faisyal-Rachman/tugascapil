<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.2/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://www.mapwizard.eu/articles/js/turf_min.js"></script>
<script src="https://www.mapwizard.eu/articles/js/turf_dist.min.js"></script>
 <ons-toolbar class="toolbar--material">
     <div class="toolbar__left toolbar--material__left">
      
           <span class="toolbar-button toolbar-button--material">
    <i class="zmdi zmdi-favorite"></i>
    </span>
      
      </div>
      <div class="center toolbar__center toolbar--material__center" >
       <?= lang('checkout') ?>
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
<ons-page id="checkout-page">
    <ons-col><br><br>
        <?php
    if ($cartItems['array'] != null) {
        ?>
        <?= purchase_steps(1, 2) ?>
        <ons-row>
            <ons-col>
                <form method="POST" id="goOrder">
                 
                    <?php
                    if ($this->session->flashdata('submit_error')) {
                        ?>
                        <hr>
                        <div class="alert alert-danger">
                            <h4><span class="glyphicon glyphicon-alert"></span> <?= lang('finded_errors') ?></h4>
                            <?php
                            foreach ($this->session->flashdata('submit_error') as $error) {
                                echo $error . '<br>';
                            }
                            ?>
                        </div>
                        <hr>
                        <?php
                    }
                    ?>
                     <ons-card>
                        <ons-list>
    <ons-list-item tappable>
      <label class="left">
        <ons-checkbox name="color" input-id="radio-1" value="cashOnDelivery" checked></ons-checkbox>
      </label>
      <label for="radio-1" class="center">PAY : <?= lang('cash_on_delivery') ?>
      </label>
    </ons-list-item>
     </ons-list>
                  
                    <?php if ($codeDiscounts == 1) { ?>
                        <div class="discount">
                            <label><?= lang('discount_code') ?></label>
                            <input class="form-control" name="discountCode" value="<?= @$_POST['discountCode'] ?>" placeholder="<?= lang('enter_discount_code') ?>" type="text">
                            <a href="javascript:void(0);" class="btn btn-default" onclick="checkDiscountCode()"><?= lang('check_code') ?></a>
                        </div>
                    <?php } ?>
</form>

                        <ons-list>
                        <ons-list-item><?php echo $profileData['family_name']; ?></ons-list-item>
                        <ons-list-item><?php echo $profileData['given_name']; ?></ons-list-item>
                        <ons-list-item> <?php echo $profileData['email']; ?></ons-list-item>
                        </div>
                       
                      </ons-list>
                   <div class="content">
     
            <table class="table table-products">
             
                <tbody>
                    <?php foreach ($cartItems['array'] as $item) { ?>
                        <tr>
                            <td class="relative"> <ons-col>
                                <input type="hidden" name="id[]" value="<?= $item['id'] ?>">
                                <input type="hidden" name="quantity[]" value="<?= $item['num_added'] ?>">
                                <img class="product-image" src="<?= base_url('/attachments/shop_images/' . $item['image']) ?>" alt="">
                                </ons-col>
                            </td>
                            <td><?= $item['title'] ?>  
                            <br>
                             
                                 Qty : <?= $item['num_added'] ?>
                              
                              
                            <p> @ <?= CURRENCY  .  $item['price'] ?></p>
                            </td>
                           
                           
                         
                        </tr>
                        <tr>
                    <?php } ?>
                  
                </tbody>
            </table>
             <p style="text-align:right">
   <?php $tt = $item['sum_price'];?>

<script>
document.write(tarif);
</script>
      </p>
        </div> </ons-card>
<ons-card>     
<div id='distance'><h5 style="text-shadow:0px 1px 9px #cccccc;"><center>ANTAR KEMANA GAN..?<br><img class="img-responsive" style="width:30%" src="<?= base_url('assets/imgs/dboy2.png') ?>"></center></h5></div>
</ons-card>
<div id="map"></div> 
  
<script>

 var map = L.map('map').fitWorld();   
 var osm = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
           maxZoom:19, attribution: '<a href="http://bit.ly/2bD2rGh", title="e-mail: corina@mapwizard.eu">mapWizard</a> <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);
map.locate({setView: true, maxZoom: 18});
 //pagina oficiala turf.js http://turfjs.org/
 // Haversine formula to account for global curvature https://en.wikipedia.org/wiki/Haversine_formula    
 var LeafIcon = L.Icon.extend({
    options: {
            iconSize:     [25, 41], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [12, 41],  // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [2, -33] // point from which the popup should open relative to the iconAnchor
    }
});
var red_icon =new LeafIcon ({iconUrl: 'https://www.mapwizard.eu/articles/img/redIcon.png'});

//GeoJSON structure     
var redIcon = {
    "type": "FeatureCollection",
      "features": [
        {
        "type": "Feature",
         "properties": { 
          "name": "Kedai Olala",
           "label": "Kedai Olala",        
                        },
        "geometry": {
         "type": "Point",
          "coordinates": [
            117.58577,//position of the Red Icon
            3.30195
            ]
          }
        }
      ]
    }; 
    

 var units = "meters"; 
 var unitswaktu = "kilometers"; 
 var dist = [];    
  
//calculate the distance between the Red Icon and each Blue Marker added on the map   
function onEachFeatureCoord (feature, layer) {
// function to add markers on the map when clicking on it   
  map.on('click', function(e){    
    var marker = new L.marker(e.latlng, { draggable:'true'}).addTo(map);
    // make the Blue Markers dragable,   
    marker.on('drag', function(e){
          marker.options.draggable = true;
          marker.bindPopup("<b>Pesanan diantar ke alamat ini</b>");  
             //get the updated coordinates of each marker (blue icon) when the markers are draged/moved on the map      
             var coords = e.target.getLatLng();
             var lat = coords.lat;
             var lng = coords.lng;  
             map.off('click');
         // function getNewDistance calculates the distance between the Red Marker (pointStart) and each draged/moved Blue Marker. 
            function getNewDistance () { 
            for(var i=0;(i<[lat, lng].length) && (i<redIcon.features.length);i++) 
                         {          
                         var distanceLayer = turf.distance(redIcon.features[i].geometry.coordinates, [lng,lat], units).toFixed(2); 
 var distanceLayer2 = turf.distance(redIcon.features[i].geometry.coordinates, [lng,lat], unitswaktu).toFixed(2); 
 var total = Number(distanceLayer2) / 20 * 60;
     
            var tarif = Math.round(total);
            var waktu =' Pengantaran ' + Math.round(total) +  ' Menit ,';
 var greeting;
   var gret;
  if (tarif < 5) {
    greeting = " Ongkir Rp. 1000";
    gret = 1000;
  } else if(tarif >= 5 && tarif <= 10){
    greeting = " Ongkir Rp. 7000";
    gret = 7000;
  }else{
greeting = " Ongkir Rp. 13000";
gret = 13000;
  }
     var bayar = Math.round(<?php echo $tt ?>) + gret;
                   var tes = Math.round(distanceLayer)+' M,'+ (waktu) + (greeting) +'Total Rp.'+ (bayar);
                 

                                   dist.push(tes); 
                                          //  dist.push(waktu);  

               for (var i = 0; i < dist.length; i++)  
                      {           
                      document.getElementById('distance').innerHTML = dist.join('\n');  
                      document.getElementById('distance').innerHTML = dist[i];
                      };  

               };                       
            };
            getNewDistance();     
    });             
    map.off('click');              
    marker.bindPopup("<b>Pesanan diantar ke alamat ini</b>").openPopup();
    //convert the data inside the variable named "marker" in GeoJSON format
    //the conversion is done to make it easier to select the coordinates of each mker added to the map  
    var markersJson =  marker.toGeoJSON();
   //function getDistance calculates the distance between the Red Icon and the Blue Markers when this are added to the map (the initial position)  
    function getDistance () { 
            for(var i=0;(i<markersJson.length) && (i<redIcon.features.length);i++) 
            console.log('test');
            {          
            var distanceLayer = turf.distance( redIcon.features[i].geometry.coordinates, markersJson.geometry.coordinates, units).toFixed(2);
            var jarak = Math.round(distanceLayer) + ' M,';
            var distanceLayer2 = turf.distance( redIcon.features[i].geometry.coordinates, markersJson.geometry.coordinates, unitswaktu).toFixed(2); 
          
            var total = Number(distanceLayer2) / 20 * 60;
            var tarif = Math.round(total);
            var waktu =' Pengantaran ' + Math.round(total) +  ' Menit,';
   var greeting;
   var gret;
  if (tarif < 5) {
    greeting = " Ongkir Rp. 1000 ";
    gret = 1000;
  } else if(tarif >= 5 && tarif <= 10){
    greeting = " Ongkir Rp. 7000 ";
    gret = 7000;
  }else{
greeting = " Ongkir Rp. 13000 ";
gret = 13000;
  }
  var bayar = Math.round(<?php echo $tt ?>) + gret;

                       dist.push(jarak);
                        dist.push(waktu);    
                        dist.push(greeting);
                        dist.push('[ <font style=color:brown><b>Total Rp. '+(bayar)+'</b></font> ]<br>');
                         dist.push('<br><input id="addressInput" name="address" class="form-control" value="<?= @$_POST['address'] ?>" type="text" placeholder="Tambah detail alamat, jika perlu..">');                          
            }
         document.getElementById('distance').innerHTML = dist.join('\n'); 
         };
         getDistance(); 
      }); 
   }; 
    var startPoint=L.geoJson(redIcon, {    
      pointToLayer:function(feature, layer) {
        return L.marker(layer, {
            icon: red_icon, title: feature.properties.name
            //  layer.options.draggable = true;
        })
    }, 
      //call the onEachFeatureCoord function to calculate distance from the Red Icon to each Blue Marker that is added and moved on the map   
      onEachFeature: onEachFeatureCoord
    }).addTo(map);  
    </script>  

                </form>
                
            </div>
            
            </div><br><br>
        </ons-row>
</ons-col>
</ons-page>
<?php } else { ?>
    <div class="alert alert-info"><?= lang('no_products_in_cart') ?></div>
    <?php
}
if ($this->session->flashdata('deleted')) {
    ?>
    <script>
        $(document).ready(function () {
            ShowNotificator('alert-info', '<?= $this->session->flashdata('deleted') ?>');
        });
    </script>
<?php } if ($codeDiscounts == 1 && isset($_POST['discountCode'])) { ?>
    <script>
        $(document).ready(function () {
            checkDiscountCode();
        });
    </script>
<?php } ?>

<ons-bottom-toolbar main-page="home" menu-page="menu.html">
      <ons-tabbar position="auto">
      <ons-button modifier="large" style="border:1px solid #fff" onClick="window.location.href = 'home'"><i class="zmdi zmdi-undo zmdi-hc-lg"></i> KEMBALI</ons-button>
       <ons-button modifier="large" style="border:1px solid #fff" onclick="document.getElementById('goOrder').submit();"> OK PESAN <i class="zmdi zmdi-cutlery"></i> </ons-button>
      </ons-tabbar>
    </ons-bottom-toolbar>