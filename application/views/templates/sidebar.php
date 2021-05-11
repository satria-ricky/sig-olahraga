

    <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SI Kemenag NTB </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <!-- Nav Item - Charts -->
      
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>c_profile">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>

      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>c_tempat_ibadah/beranda">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
  

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTw" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-list"></i>
          <span>Daftar tempat ibadah</span>
        </a>
        <div id="collapseTw" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Daftar data:</h6>
            <a class="collapse-item" href="<?= base_url(); ?>c_tempat_ibadah/masjid">Masjid</a>
            <a class="collapse-item" href="<?= base_url(); ?>c_tempat_ibadah/gereja">Gereja</a>
            <a class="collapse-item" href="<?= base_url(); ?>c_tempat_ibadah/pura">Pura</a>
            <a class="collapse-item" href="<?= base_url(); ?>c_tempat_ibadah/vihara">Vihara</a>
            <a class="collapse-item" href="<?= base_url(); ?>c_tempat_ibadah/klenteng">Klenteng</a>
          </div>
        </div>
      </li>



      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-plus"></i>
          <span>Tambah tempat ibadah</span>
        </a>
        <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tambah data:</h6>
            <a class="collapse-item" href="<?= base_url('c_tempat_ibadah/tambahMasjid'); ?>">Masjid</a>
            <a class="collapse-item" href="<?= base_url('c_tempat_ibadah/tambahGereja'); ?>">Gereja</a>
            <a class="collapse-item" href="<?= base_url('c_tempat_ibadah/tambahPura'); ?>">Pura</a>
            <a class="collapse-item" href="<?= base_url('c_tempat_ibadah/tambahVihara'); ?>">Vihara</a>
            <a class="collapse-item" href="<?= base_url('c_tempat_ibadah/tambahKlenteng'); ?>">Klenteng</a>
          </div>
        </div>
      </li>



<!-- 
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapsetThree">
        <i class="fas fa-fw fa-map"></i>
          <span>Lihat peta</span></a>
        </a>
        <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">PETA:</h6>
            <a class="collapse-item" href="<?= base_url(); ?>c_tempat_ibadah/peta">Lihat peta</a>
            <a class="collapse-item" href="<?= base_url(); ?>c_tempat_ibadah/kelola_peta">Kelola peta</a>
          </div>
        </div>
      </li> -->



      <hr class="sidebar-divider <?= $hilangkan; ?>" >
      
      <!-- Nav Item - Tables -->
      <li class="nav-item <?= $hilangkan; ?>">
        <a class="nav-link" href="<?= base_url(); ?>c_admin">
          <i class="fas fa-fw fa-users"></i>
          <span>Daftar Admin</span></a>
      </li>

       <hr class="sidebar-divider" >
      
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

