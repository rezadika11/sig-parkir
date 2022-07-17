@extends('layouts.main')
@section('css')
	 <!-- General CSS Files -->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
	 <!-- Template CSS -->
	 <link rel="stylesheet" href="/assets/css/style.css">
	 <link rel="stylesheet" href="/assets/css/components.css">
@endsection
@section('title','Profile')
@section('content')
<div class="main-content" style="min-height: 531px;">
    <section class="section">
      <div class="section-header">
        <h1>@yield('title')</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12 col-sm-12 col-lg-7">
            <div class="card author-box card-primary">
              <div class="card-body">
                @if (session()->has('suksesEdit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('suksesEdit') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                <div class="author-box-left">
                  <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                  <div class="clearfix"></div>
                </div>
                <div class="author-box-details">
                  <div class="author-box-name">
                    <a href="#">{{ Auth()->user()->name }}</a>
                  </div>
                  <div class="author-box-job">Admin <br>
                    Username : {{ Auth()->user()->username }}
                  </div>
                  <div class="author-box-description">
                   
                  </div>
                  <a href="{{ route('admin.editprofil') }}" class="btn btn-primary">Edit</a>
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
