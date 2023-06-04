<?= $this->extend('penduduk/templates/page_main') ?>

<?= $this->section('content') ?>

  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('<?= base_url('resources/images/curved-images/curved0.jpg') ?>'); background-size: cover; background-position: center;">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <div class="navbar-brand font-weight-bolder ms-lg-0 mb-4 ">
                <img src="<?= base_url('resources/images/logo-light.png') ?>" class="navbar-brand-img" style="height:6rem;" alt="main_logo">
              </div>
              <p class="text-lead text-white">Silahkan isi form untuk masuk ke akun anda.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5>Masuk ke Akun Anda</h5>
              </div>
              
              <div class="card-body">
                <form role="form text-left" method="POST">
                  <div class="mb-3">
                    <input type="nik" class="form-control" placeholder="NIK" aria-label="nik" aria-describedby="nik-addon" name="nik">
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Masuk</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<!--- ////////////// -->



<?= $this->endSection() ?>