

<?= $this->extend('admin/templates/page_main') ?>

<?= $this->section('content') ?>


<div class="container-fluid py-4">

<div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-body">

            <?php foreach($messages as $message) : ?>
            <?php if($message["pengirim"] == 1) : ?>
            <div class="row my-2">
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