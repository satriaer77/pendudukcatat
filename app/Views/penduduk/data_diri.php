

  <?= $this->extend('penduduk/templates/page_main') ?>

<?= $this->section('content') ?>


<div class="container-fluid py-4">

  <div class="row">
    <div class="col-12">
      <div class="card h-100 p-0" style="background-image: url('<?= base_url('resources/images/banner.jpg') ?>');
  background-size: cover; min-height:35vh"><span class="mask card bg-primary opacity-6"></span></div>
  
    </div>
  </div>

</div>

      
<div class="row" style="margin-top:-8rem;">
  <div class="col-12">
    <div class="card shadow-lg mx-4 ">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
          <div class="avatar avatar-xl me-3 shadow" style="background: url('<?= base_url('resources/uploads/images/profile/'.$diri["foto"]) ?>'); background-size:cover"></div>   
            
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?= $diri["nama_penduduk"] ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                <?= $diri["nik"] ?>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center" href="<?= base_url('penduduk/data-diri') ?>" role="tab" aria-selected="true">
                    <i class="ni ni-app"></i>
                    <span class="ms-2">Info Penduduk</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center" href="<?= base_url('penduduk/pesan#last-pesan') ?>" role="tab" aria-selected="false">
                    <i class="ni ni-email-83"></i>
                    <span class="ms-2">Pesan</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>




    



<div class="container-fluid py-4">
  
  <div class="row">
    <div class="col-md-8">

      <div class="card">
        <div class="card-body">
          <p class="text-uppercase text-sm">Data Penduduk</p>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">NIK</label>
                <input class="form-control" type="text" value="<?= $diri["nik"] ?>" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Nama Penduduk</label>
                <input class="form-control" type="email" value="<?= $diri["nama_penduduk"] ?>" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                <input class="form-control" type="date" value="<?= $diri["tanggal_lahir"] ?>" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Jenis Kelamin</label>
                <input class="form-control" type="text" value="<?= $diri["jenis_kelamin"] ?>" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Golongan Darah</label>
                <input class="form-control" type="text" value="<?= $diri["golongan_darah"] ?>" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Agama</label>
                <input class="form-control" type="text" value="<?= $diri["agama"] ?>" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Pekerjaan</label>
                <input class="form-control" type="text" value="<?= $diri["nama_pekerjaan"] ?>" disabled>
              </div>
            </div>
          </div>

          <hr class="horizontal dark">

          <p class="text-uppercase text-sm">Detail Alamat Penduduk</p>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Alamat Lengkap</label>
                <input class="form-control" type="text" value="<?= $diri["alamat_detail"] ?> RT <?= $diri["no_rt"] ?>, RW <?= $diri["no_rw"] ?>, Kamal, Bangkalan, Jawa Timur" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">RT</label>
                <input class="form-control" type="text" value="<?= $diri["no_rt"] ?>" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">RW</label>
                <input class="form-control" type="text" value="<?= $diri["no_rw"] ?>" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Desa</label>
                <input class="form-control" type="text" value="Kamal" disabled>
              </div>
            </div>
          </div>
          
        </div>
      </div>


      <div class="row mt-5">
        <div class="col-12">
          <form action="<?= base_url('penduduk/logout') ?>" method="POST">
            <button class="btn btn-lg btn-primary w-100" type="submit">Logout</button>
          </form>
        </div>
      </div>

    </div>
  </div>

    
</div>
    


<?= $this->endSection() ?>