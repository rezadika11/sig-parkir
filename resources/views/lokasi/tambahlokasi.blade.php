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

<!--select2-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection
@section('title','Tambah Desa')
@section('content')

<div class="main-content" style="min-height: 531px;">
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('suksesTambah'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('suksesTambah') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session()->has('gagalTambah'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('gagalTambah') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lokasi</label>
                                    <input type="text"
                                        class="form-control mb-3 @error('nama_lokasi') is-invalid @enderror"
                                        name="nama_lokasi" value="{{ old('nama_lokasi') }}">
                                    @error('nama_lokasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Juru Parkir</label>
                                    <input type="text"
                                        class="form-control mb-3 @error('juru_parkir') is-invalid @enderror"
                                        name="juru_parkir" value="{{ old('juru_parkir') }}">
                                    @error('juru_parkir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select class="form-control select2 {{ session()->has('id_kecamatan') ? 'is-invalid' : '' }}" name="id_kecamatan">
                                        <option selected disabled>- Kecamatan -</option>
                                        @foreach ($kecamatan as $kec)
                                            <option value="{{ $kec->id_kecamatan }}" {{ old('id_kecamatan') == $kec->id_kecamatan ? 'selected' : '' }}>
                                                {{ $kec->nama_kecamatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="form-group">
                                        <label for="desa">Desa</label>
                                        <select class="form-control select2 mb-3">
                                            <option selected disabled>desa</option>
                                            <option value="3">melati 05</option>
                                            <option value="4">mawar 02</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jalan</label>
                                    <input type="text"
                                        class="form-control mb-3 @error('jalan') is-invalid @enderror"
                                        name="jalan" value="{{ old('jalan') }}">
                                    @error('jalan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <input type="text"
                                        class="form-control mb-3 @error('latitude') is-invalid @enderror"
                                        name="latitude" value="{{ old('latitude') }}">
                                    @error('latitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Longtitude</label>
                                    <input type="text"
                                        class="form-control mb-3 @error('longtitude') is-invalid @enderror"
                                        name="longtitude" value="{{ old('longtitude') }}">
                                    @error('longtitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                   <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file"
                                        class="form-control mb-3 @error('foto') is-invalid @enderror"
                                        name="foto" value="{{ old('foto') }}">
                                    @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
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

<!-- Page Specific JS File -->
<script src="/assets/js/page/index-0.js"></script>

<!--select 2-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select').select2();
    });

</script>

@endpush
