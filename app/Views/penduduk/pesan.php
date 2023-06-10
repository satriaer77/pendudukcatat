

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
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center" href="<?= base_url('penduduk/data-diri') ?>" role="tab" aria-selected="false">
                    <i class="ni ni-app"></i>
                    <span class="ms-2">Info Penduduk</span>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center" href="<?= base_url('penduduk/pesan') ?>" role="tab" aria-selected="true">
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
    <div class="col-md-12">

      <div class="card">
        <div class="card-body">
            <p class="text-uppercase text-sm mb-5">Pesan Anda</p>

            <?php foreach($messages as $message) : ?>
            <?php if($message["pengirim"] == 0) : ?>
            <div class="row my-2">
              <div class="col-md-5">
                <div class="card">
                    <div class="card-header py-1">
                    <span class="text-xs text-bold">-- Admin --</span>
                    </div>
                    <div class="card-body py-1">
                    <p class="text-md"><?= $message['isi_pesan'] ?></p>
                    
                    </div>
                    <div class="card-footer py-1">
                    <div class="d-flex justify-content-between">
                        <span class="text-xs"><?= $message['tanggal_kirim'] ?></span>
                        <span class="text-xs text-bold"><?php if($message['status'] == 0) echo "Belum Dibaca"; else echo "Sudah Dibaca";  ?></span>
                    </div>
                    </div>
                </div>
              </div>
              <div class="col-md-7"></div>
            </div>

            <?php else : ?>

            <div class="row my-2">
              <div class="col-md-7"></div>
              <div class="col-md-5">
                  <div class="card bg-primary text-white">
                      <div class="card-header bg-primary py-1">
                        <span class="text-xs text-bold">-- Anda --</span>
                      </div>
                      <div class="card-body py-1">
                        <p class="text-md"><?= $message['isi_pesan'] ?></p>
                        
                      </div>
                      <div class="card-footer bg-primary py-1">
                        <div class="d-flex justify-content-between">
                            <span class="text-xs"><?= $message['tanggal_kirim'] ?></span>
                            <span class="text-xs text-bold"><?php if($message['status'] == 0) echo "Belum Dibaca"; else echo "Sudah Dibaca";  ?></span>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
          
          
        </div>
      </div>

    </div>
  </div>
    
</div>

<div class="container-fluid py-4 position-sticky z-index-sticky bottom-0">
  <form method="POST">
  <div class="row">
    <div class="col-11">

      <div class="card border border-primary">
        <div class="card-body">
            <input type="hidden" name="nik" value="<?= session()->get('nik') ?>">
            <input class="w-100 border border-0" style="outline:none;" type="text" name="pesan" id="pesan">
        </div>
      </div>

    </div>
    <div class="col-1">
    <button type="submit" class="btn btn-primary w-100 h-100 text-white "><i class="fas fa-paper-plane"></i></button>
      

    </div>
  </div>
  </form>
    
</div>
    


<?= $this->endSection() ?>