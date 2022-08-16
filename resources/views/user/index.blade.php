
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SIG Parkir</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  
  <!-- Custom styles for this template -->
  <link href="/assets/user/css/carousel.css" rel="stylesheet">

<!--select 2-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <!-- leaftlet js -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
      integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
      crossorigin="" />
      <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
      integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
      crossorigin=""></script>
     <!-- Template CSS -->
  <style>
      
      #map {
          min-height: 90vh;
      }
      body{
        background-color: rgb(245, 255, 255);
      }

  </style>
  <!-- CSS Libraries -->

 
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <img src="assets/img/logo-kab.png" width="30" height="30" alt="">
      <a class="navbar-brand" href="#"> Sistem Pemetaan</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main role="main">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/assets/img/slider1.png" class="bd-placeholder-img" width="100%" height="100%"  role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text></img>
  
          <div class="container">
            <div class="carousel-caption text-left">
              <h1 class="font-weight-bold">Selamat Datang di </h1>
              <p class="text-hero">Sistem Informasi Pemetaan Parkir</p>
              <p><a class="btn btn-md btn-primary" href="#">Mulai Cari</a></p>
            </div>
          </div>
        </div>
      </div>
     
    </div>

    <!--map-->
    <div class="container">
        <div class="card shadow p-3 mb-5">
          <div class="card-body">
            <h2 class="card-title mb-4 text-center font-weight-bold">Cari Titik Lokasi Parkir</h2>
            <div class="row">
            <div class="col-md-3 mb-4">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Kecamatan</label>
                <select class="form-control select2  @error('kecamatan') is-invalid @enderror"
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
              <div class="form-group">
                <label for="exampleFormControlSelect1">Desa</label>
                <select class="form-control select2  mb-3 @error('kecamatan') is-invalid @enderror"
                            name="desa" id="desa">
                            <option selected disabled>-Pilih Desa-</option>
                        </select>
                        @error('desa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
              </div>
              <button type="button" class="btn btn-primary" id="filterLocation"><li class="fas fa-search"></li> Filter</button>
            </div>
            <div class="col-md-9  ">
              <div id="mapLocation"></div> 
            </div>
          </div>
        </div>
          </div>
        </div>
        </div>
      </div>
    <!-- FOOTER -->
   
  </main>
  <footer class="foot p-3 bg-dark">
    <div class="container">
      <span class="text-white">&copy; 2022 Sistem Pemetaan Parkir</span>
    </div>

  </footer>



  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
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
                    url: 'getajaxuserdesa/' + kecId,
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
    function getLocationMain(){
        $('#mapLocation').html('')
        // map.remove()
        let kecamatan = $('#kecamatan').val()
            let desa = $('#desa').val()
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/getlocation',
                data: {kecamatan, desa},
                success: function(hasil){
                    $('#mapLocation').html(hasil)
                }
                
            })
    }
    $(document).ready(function(){
        $('#filterLocation').click(function(){
            getLocationMain()
        })
        getLocationMain()
    })
</script>
</body>
</html>
