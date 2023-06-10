<?= $this->extend('penduduk/templates/page_main') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
        
            <div class="card h-100 p-0" style="background-image: url('<?= base_url('resources/images/banner.jpg') ?>');
      background-size: cover; min-height:55vh">
            
                    <div class="d-flex justify-content-center align-items-center h-100 flex-column" style="z-index:999">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 mb-3" href="<?= base_url('penduduk/beranda') ?>">
                            <img src="<?= base_url('resources/images/logo-light.png') ?>" class="navbar-brand-img h-100" style="width:18rem;" alt="main_logo">
                        </a>
                        <h2 class="mb-0 text-white">Selamat Datang</h2>
                        <p class="mb-0 text-white"><?= session()->get("nama") ?></p>
                    </div>
                <span class="mask card bg-dark opacity-6">
                
                </span>
                
            </div>

        </div>
    </div>

    <div class="row mt-5">



        <div class="col-md-6">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Permohonan Anda</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Jenis Surat</h6>
                    <span class="mb-2 text-xs">Waktu Permohonan: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
                    <span class="mb-2 text-xs">Status: <span class="text-dark ms-sm-2 font-weight-bold">Pending</span></span>
                    <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        

        <div class="col-md-6">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Pesan Anda</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">

                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-mobile-button text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Devices</h6>
                      <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>

              </ul>
            </div>
          </div>
        </div>

    </div>

</div>

    


<?= $this->endSection() ?>