@extends('layouts.main')
@section('css')
	 <!-- General CSS Files -->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
	 <!-- Template CSS -->
	 <link rel="stylesheet" href="/assets/css/style.css">
	 <link rel="stylesheet" href="/assets/css/components.css">
@endsection
@section('title','Edit Profile')
@section('content')
<div class="main-content" style="min-height: 531px;">
    <section class="section">
      <div class="section-header">
        <h1>@yield('title')</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12 col-sm-12 col-lg-6">
            <div class="card card-primary">
              <div class="card-body">
                <div class="author-box-details">
                   <form action="{{ route('admin.posteditprofil') }}" method="POST">
                    @csrf
                    <div class="col-md col-sm-3 col-lg-3 mb-4 mb-md-0 mx-auto">
                        <div class="avatar-item">
                          <img alt="image" src="../assets/img/avatar/avatar-1.png" class="img-fluid">
                        </div>
                        </div>
                        <div class="form-group col-md col-sm-3 col-lg-7  mx-auto">
                            <input type="file" class="form-control-file">
                          </div>
                    <div class="mt-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$data->name) }}">
                        @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                    </div>
                     <div class="mt-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"" value="{{ old('username', $data->username) }}">
                        @error('username')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                     </div>
                     <div class="mt-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                     </div>
                     <button type="submit" class="btn btn-primary float-right mt-3">Edit</button>
                   </form>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>    
@endsection
@push('javascript')
	<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="/assets/js/stisla.js"></script>

<!-- Template JS File -->
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="/assets/js/page/index-0.js"></script>
@endpush
