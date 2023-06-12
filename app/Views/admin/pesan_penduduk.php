

<?= $this->extend('admin/templates/page_main') ?>

<?= $this->section('content') ?>


<div class="container-fluid py-4">
  <div class="row my-4">
      <div class="col-12" href="<?= base_url('admin/pesan/'.$penduduk["nik"].'#last-pesan') ?>">
          <div class="card shadow-lg">
            <div class="card-body p-3">

              <div class="row gx-4">
                <div class="col-1 my-auto h-100 d-flex">
                  <a class="mx-auto h2" href="<?= base_url('admin/pesan') ?>">
                    <i class="fas fa-chevron-left"></i>
                  </a>
                </div>
                <div class="col-auto">
                  <div class="avatar avatar-xl me-3 shadow" style="background: url('<?= base_url('resources/uploads/images/profile/'.$penduduk["foto"]) ?>'); background-size:cover"></div>  
                </div>
                <div class="col-auto my-auto">
                  <div class="h-100">
                    <h5 class="mb-1">
                      <?= $penduduk["nama_penduduk"] ?>
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                      <?= $penduduk["nik"] ?>
                    </p>
                  </div>
                </div>
                
              </div>

            </div>
          </div>
      </div>
  </div>




  <div class="row min-vh-100">
    <div class="col-md-12">

      <div class="card">
        <div class="card-body">

            <?php foreach($messages as $message) : ?>
            <?php if($message["pengirim"] == 1) : ?>
            <div class="row my-4">
              <div class="col-md-5">
                <div class="card">
                    <div class="card-header py-1">
                    <span class="text-xs text-bold">-- <?= $message['nama_penduduk'] ?> --</span>
                    </div>
                    <div class="card-body py-1">
                    <p class="text-md"><?= $message['isi_pesan'] ?></p>
                    
                    </div>
                    <div class="card-footer py-1">
                    <div class="d-flex justify-content-between">
                        <span class="text-xs"><?= $message['tanggal_kirim'] ?></span>
                    </div>
                    </div>
                </div>
              </div>
              <div class="col-md-7"></div>
            </div>

            <?php else : ?>

            <div class="row my-4">
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
            <div id="last-pesan"></div>
          
        </div>
      </div>

    </div>
  </div>

</div>


<div class="container-fluid py-4 position-sticky z-index-sticky bottom-0">
  <form method="POST" action="#last-pesan">
  <div class="row">
    <div class="col-11">

      <div class="card border border-primary">
        <div class="card-body">
            <input class="w-100 border border-0" style="outline:none;" type="text" name="pesan" id="pesan" required>
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