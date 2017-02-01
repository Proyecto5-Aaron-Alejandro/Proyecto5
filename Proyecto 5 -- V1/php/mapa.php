<!DOCTYPE html>
<?php
        session_start();
        if(!isset($_SESSION["usu_id"])) {
            header("location:../index.php?nolog=2");
        }
        //realizamos la conexión
        $conexion = mysqli_connect('localhost', 'root', '', 'bd_proyecto5');

        //le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
        $acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

        if (!$conexion) {
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        



            //$sql = "SELECT * FROM `tbl_contactos` WHERE `usuc_id` = 1 ";


    
        extract($_REQUEST);
         $sql = "SELECT `con_latitud`,`con_longitud`  FROM `tbl_contactos` WHERE `con_id`=$con_id";

        $mapa = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($mapa)>0){
            while($mapas    =   mysqli_fetch_array($mapa)){
              $latitud=$mapas['con_latitud'];
              $longitud=$mapas['con_longitud'];
            }
          }else{
              echo "No hay contactos disponibles";
            }
    //echo "$latitud";
    //echo "$longitud";

?>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Dirección de contacto</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>


function initMap() {
  var la= parseFloat('<?php echo $latitud; ?>');
  var lo= parseFloat('<?php echo $longitud; ?>');
  var myLatLng = {lat: la , lng: lo};

  

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Posición del Contacto'
  });
  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Tu localización');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');


}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaNQ_12n0sLg9-ZiUGmQRa3Zoa1HmJ4RI&callback=initMap"></script>
  </body>
</html>