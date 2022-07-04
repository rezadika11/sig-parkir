@extends('layouts.main')
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