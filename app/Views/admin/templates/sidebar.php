<aside class="sidenav navbar bg-gradient-primary navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?= base_url('dashboard') ?>" target="_blank">
        <img src="<?= base_url('resources/images/logo-light.png') ?>" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 text-white font-weight-bold"><sub>Admin</sub></span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link <?php if($page == "daerah") echo "active";  ?>" href="<?= base_url('admin/daerah')  ?>">
              <div class="fas fa-map text-dark icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></div>
              <span class="<?php if($page == "daerah") echo "text-bold";  ?> text-white nav-link-text ms-1">Pengelolaan Daerah</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page == "penduduk") echo "active";  ?>" href="<?= base_url('admin/penduduk')  ?>">
              <div class="fas fa-user icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></div>
              <span class="<?php if($page == "penduduk") echo "text-bold";  ?> text-white nav-link-text ms-1">Pengelolaan Penduduk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page == "permohonan") echo "active";  ?>" href="<?= base_url('admin/permohonan')  ?>">
              <div class="fas fa-file icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></div>
              <span class="<?php if($page == "permohonan") echo "text-bold";  ?> text-white nav-link-text ms-1">Pengelolaan Permohonan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page == "pesan") echo "active";  ?>" href="<?= base_url('admin/pesan')  ?>">
              <div class="fas fa-file icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></div>
              <span class="<?php if($page == "pesan") echo "text-bold";  ?> text-white nav-link-text ms-1">Pesan Penduduk</span>
            </a>
          </li>
    
      </ul>
    </div>
    
</aside>
