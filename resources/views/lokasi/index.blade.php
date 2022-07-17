@extends('layouts.main')
@section('css')
	 <!-- General CSS Files -->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
	 <!-- Template CSS -->
	 <link rel="stylesheet" href="/assets/css/style.css">
	 <link rel="stylesheet" href="/assets/css/components.css">

	 <!--Data Tables CSS-->
	 <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
	 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
@endsection
@section('title','Lokasi')
@section('content')

<div class="main-content" style="min-height: 531px;">
	<section class="section">
	  <div class="section-header">
		<h1>@yield('title')</h1>
			<a href="{{ route('lokasi.tambahlokasi') }}" class="btn btn-sm btn-primary ml-2"><i class="fas fa-plus-circle"></i> Tambah Lokasi</a>
	  </div>
			<div class="section-body">
				<div class="card">
				  <div class="card-body">
					<table id="data-tables" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead class="thead-dark" style="background-color: #D6EFED">
					<tr>
						<tr>
							<th>No.</th>
							<th>Gambar</th>
							<th>Jalan</th>
							<th>Juru Parkir</th>
							<th>Desa</th>
							<th>Kecamatan</th>
							<th>Latitude</th>
							<th>Longtitude</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><img src="https://www.cityofdenison.com/sites/default/files/styles/gallery500/public/imageattachments/streets/page/7201/coffin_complete.jpg?itok=SnWQESnK" alt="img" class="img-fluid"></td>
							<td>Mawar. pegangsaan</td>
							<td>System Architect</td>
							<td>Karang Tatar</td>
							<td>Belik</td>
							<td>-098776622</td>
							<td>-098776622</td>
							<td>
								<a href="" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
								<a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
							</td>
						</tr>
				</tbody>
			</table>
				  </div>
				  <div class="card-footer bg-whitesmoke">
					This is card footer
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

<!--Data Tables-->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
    $('#data-tables').DataTable();
} );
</script>
@endpush
