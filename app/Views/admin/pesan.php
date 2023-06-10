

<?= $this->extend('admin/templates/page_main') ?>

<?= $this->section('content') ?>


<div class="container-fluid py-4">

    <?php foreach($messages as $message) : ?>
    <div class="row">
      

        <a class="col-12" href="<?= base_url('admin/pesan/'.$message["nik"]) ?>">
            <div class="card shadow-lg mx-4 ">
              <div class="card-body p-3">

                <div class="row gx-4">
                  <div class="col-auto">
                    <div class="avatar avatar-xl me-3 shadow" style="background: url('<?= base_url('resources/uploads/images/profile/'.$message["foto"]) ?>'); background-size:cover"></div>  
                  </div>
                  <div class="col-auto my-auto">
                    <div class="h-100">
                      <h5 class="mb-1">
                        <?= $message["nama_penduduk"] ?>
                      </h5>
                      <p class="mb-0 font-weight-bold text-sm">
                        <?= $message["nik"] ?>
                      </p>
                    </div>
                  </div>

                  <div class="col-auto my-auto">
                    <div class="h-100">
                      <h5 class="mb-1">
                       
                      </h5>
                    </div>
                  </div>
                  
                </div>

              </div>
            </div>
        </a>

    </div>
    <?php endforeach; ?>

</div>




    


    


<?= $this->endSection() ?>