<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Pages</li>
          <li class="{{ Request::is('dashboard*') ? "active" : "" }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
          <li class="{{ Request::is('lokasi/lokasi*') ? "active" : "" }}"><a class="nav-link" href="{{ route('lokasi.lokasiview') }}"><i class="fas fa-street-view"></i> <span>Lokasi</span></a></li>
          <li class="{{ Request::is('kecamatan/kecamatan*') ? "active" : "" }}"><a class="nav-link" href="{{ route('kecamatan.kecamatanview') }}"><i class="fas fa-table"></i> <span>Kecamatan</span></a></li>
          <li class="{{ Request::is('desa/desa*') ? "active" : "" }}"><a class="nav-link" href="{{ route('desa.desaview') }}"><i class="fas fa-table"></i> <span>Desa</span></a></li>
         
         
    </aside>
  </div>