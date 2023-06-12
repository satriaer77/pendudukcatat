<?php if(session()->get('nik') != "") : ?>

<div class="position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="<?= base_url('penduduk/beranda') ?>">
                <img src="<?= base_url('resources/images/logo-dark.png') ?>" class="navbar-brand-img h-100" style="width:8rem;" alt="main_logo">
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="<?= base_url('penduduk/beranda') ?>">
                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                    Beranda
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="<?= base_url('penduduk/data-diri') ?>">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Data Diri
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="<?= base_url('penduduk/permohonan') ?>">
                    <i class="fas fa-inbox opacity-6 text-dark me-1"></i>
                    Permohonan
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="<?= base_url('penduduk/kelengkapan-surat') ?>">
                    <i class="fas fa-file opacity-6 text-dark me-1"></i>
                    Kelengkapan Surat
                  </a>
                </li>
              </ul>

              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="<?= base_url('penduduk/data-diri') ?>">
                    <div class="avatar avatar-md me-3 shadow" style="background: url('<?= base_url('resources/uploads/images/profile/'.session()->get("foto")) ?>'); background-size:cover"></div>   
                  </a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
</div>

<?php endif; ?>