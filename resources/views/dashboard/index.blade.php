@extends('layouts.main')
@section('css')
<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- Template CSS -->
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/components.css">

<!-- leaftlet js -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<!--select 2-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection
@section('title','Dashboard')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Juru Parkir</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataLokasi }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-map-marked"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Kecamatan</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataKecamatan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-map-marked"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Desa</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataDesa }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Jalan</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataJalan }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <form action="{{ route('filterdata') }}" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control select2 @error('kecamatan') is-invalid @enderror"
                                name="kecamatan" id="kecamatan">
                                <option selected disabled>-Pilih Kecamatan-</option>
                                @foreach ($kecamatan as $kec)
                                <option value="{{ $kec->id_kecamatan }}"
                                    {{ old('kecamatan') == $kec->id_kecamatan ? 'selected' : '' }}>
                                    {{ $kec->nama_kecamatan }}
                                </option>
                                @endforeach
                            </select>
                            @error('kecamatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control select2 mb-3 @error('kecamatan') is-invalid @enderror"
                                name="desa" id="desa">
                                <option selected disabled>-Pilih Desa-</option>
                            </select>
                            @error('desa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                      <div class="form-group">
                          <input type="text" class="form-control" name="search" id="search">
                      </div>
                  </div> --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </div>
              </form>
                <div id="map"></div>
                <div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('javascript')
<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="/assets/js/stisla.js"></script>

<!-- Template JS File -->
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/custom.js"></script>

{{-- <script src="/assets/js/page/index-0.js"></script> --}}
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>

<!--select 2-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select').select2();
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="kecamatan"]').on('change', function () {
            var kecId = $(this).val();
            if (kecId) {
                $.ajax({
                    url: 'getajaxdesa/' + kecId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="desa"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="desa"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="desa"]').empty();
            }
        });

    });

</script>

<script>
    //   getLocation();
    //   function getLocation(){
    //       if (navigator.geolocation) {
    //       navigator.geolocation.getCurrentPosition(showPosition);
    //      }  
    //   }

    // function showPosition() {
 

    let lat = "-7.396149";
    let long = "109.695122";

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
    var baseLayers = {
    "Mapbox": mapbox,
    "OpenStreetMap": osm
};

var overlays = {
    "Marker": marker,
    "Roads": roadsLayer
};

L.control.layers(baseLayers, overlays).addTo(map);



    // }

</script>

@endpush
