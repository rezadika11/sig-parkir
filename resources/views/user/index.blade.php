<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- leaftlet js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
   
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            height: 537px;
        }

        p {
            margin-bottom: 0px;
            padding: 10px;
        }

    </style>

    <title>SIG Parkir</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container">
            <a class="navbar-brand" href="#">Sig-Parkir</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="#">About</a>
                </div>
                {{-- @if (session()->has('berhasil_login'))
              <div class="navbar-nav ml-auto">
                <a class="nav-link" href="{{ route('dashboard') }}">{{ auth()->user()->name }}</a>
            </div>
            @else
            <div class="navbar-nav ml-auto">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </div>
            @endif --}}
        </div>
        </div>
    </nav>
    <div id="map"></div>



    <div class="footer bg-dark">
        <p class="text-white text-center">Sistem Informasi Geografis 2022</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>


    <script>
        getLocation();

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showPosition(position) {
        
            let lat = position.coords.latitude//"-7.396149";
            let long = position.coords.longitude//"109.695122";

            var map = L.map('map').setView([lat, long], 10);
            L.marker([lat, long]).addTo(map);

            let data = {!!json_encode($data, JSON_NUMERIC_CHECK) !!}

            for (let d of data) {
                L.marker([d.latitude, d.longitude]).addTo(map).bindPopup(
          `<div>
            <img height="150px" src = "storage/${d.foto}">
            <table>
              <tr>
                <th>Lokasi </th>
                <td>:${d.nama_lokasi}</td>
              </tr>
              <tr>
                <th>Jalan </th>
                <td>:${d.jalan}</td>
              </tr>
              <tr>
                <th>Juru parkir</th>
                <td>:${d.juru_parkir}</td>
              </tr>
              <tr>
                <th>Desa </th>
                <td>:${d.nama_desa}</td>
              </tr>
              <tr>
                <th>Kecamatan</th>
                <td>:${d.nama_kecamatan}</td>
              </tr>
            </table>
          </div>`
        )
            }

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

                attribution: '© OpenStreetMap'
            }).addTo(map);
            var geocoder = L.Control.geocoder({
                style:'icon',
                searchLabel:'kecamatan',
                defaultMarkGeocode: false,
            
            })
                .on('markgeocode', function(e) {
                var bbox = e.geocode.bbox;
                var poly = L.polygon([
                bbox.getSouthEast(),
                bbox.getNorthEast(),
                bbox.getNorthWest(),
                bbox.getSouthWest()
             ]).addTo(map);
            map.fitBounds(poly.getBounds());
            }).addTo(map);

        }
       
      
    </script>
</body>

</html>
