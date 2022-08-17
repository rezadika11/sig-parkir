<div class="mt-4" id="map"></div>

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


            let data = {!!json_encode($data, JSON_NUMERIC_CHECK) !!}
            if(data.length > 0){
                var map = L.map('map').setView([data[0].latitude, data[0].longitude], 10);
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
            }else{
                var map = L.map('map').setView([lat,long], 10);
                // L.marker([lat, long]).addTo(map);
            }
           


            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

        }
</script>