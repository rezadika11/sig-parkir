@extends('layouts.main')
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