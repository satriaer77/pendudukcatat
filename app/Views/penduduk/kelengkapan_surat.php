

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
          
        </div>
      </div>
    </div>

  </div>
</div>




    



<div class="container-fluid py-4">
  
  <div class="row my-2">
    <div class="col-12">
      <h3>Kelengkapan Surat Wajib</h3>
    </div>
  </div>
  <div class="row">
    <?php foreach($suratWajib as $sw) : ?>
    <div class="col-md-4">

      <div class="card bg-white text-center">
        <div class="card-header">
          <p class="text-uppercase text-md text-bold mb-0"><?= $sw["nama_surat"] ?></p>
          <?php if($sw["foto_surat"] == NULL) : ?>
            <p class="text-sm">Belum Mengupload <?= $sw["nama_surat"] ?></p>
          <?php endif; ?>
        </div>
        <div class="card-body pt-2">
          <?php if($sw['foto_surat'] != NULL) : ?>
            <div class="w-100 card me-3 shadow" style="background: url('<?= base_url('resources/uploads/images/documents/'.$sw["foto_surat"]) ?>'); background-size:cover; height:15rem;"></div>   
          <?php else : ?>
            <div class="w-100 card me-3 shadow" style="background: url('<?= base_url('resources/uploads/images/documents/default_'.$sw["slug_name"].'.png') ?>'); background-size:cover; height:15rem;"></div>   
          <?php endif; ?>
        </div>
        <div class="card-footer">
          <?php if($sw['foto_surat'] != NULL) : ?>
            <button type="button" class="btn btn-outline-primary btn-block w-100" data-bs-toggle="modal" data-bs-target="#surat-<?= $sw["slug_name"] ?>">
                Lihat Scan/Foto <?= $sw["nama_surat"] ?>
            </button>
          <?php endif; ?>
            <button type="button" class="btn btn-primary btn-block w-100" data-bs-toggle="modal" data-bs-target="#surat-<?= $sw["slug_name"] ?>">
                Upload Scan/Foto <?= $sw["nama_surat"] ?>
            </button>
        </div>
      </div>
      
    </div>



    <div class="modal fade" id="surat-<?= $sw["slug_name"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body p-0">
            <form method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card bg-white text-center">
              <div class="card-header">
                <p class="text-uppercase text-md text-bold mb-0">Upload <?= $sw["nama_surat"] ?></p>
              </div>
              <div class="card-body pt-2">
                <?php if($sw['foto_surat'] != NULL) : ?>
                  <img src="<?= base_url('resources/uploads/images/documents/'.$sw["foto_surat"]) ?>" class="w-100" alt="Surat <?= $sw["nama_surat"] ?>">  
                <?php else : ?>
                  <div class="w-100 card me-3 shadow" style="background: url('<?= base_url('resources/uploads/images/documents/default_'.$sw["slug_name"].'.png') ?>'); background-size:cover; height:15rem;"></div>   
                <?php endif; ?>
                <div class="input-group mt-4">
                    <input type="file" name="foto" class="form-control" aria-label="Foto" aria-describedby="foto">
                </div>
              </div>
              <input type="hidden" name="id-surat" value="<?= $sw["id_surat"] ?>">
              <div class="card-footer">
                  <button type="submit" class="btn bg-gradient-primary btn-block w-100">
                      Upload
                  </button>
              </div>
            </div>
            </form>
          </div>

        </div>
      </div>
    </div>


    <?php endforeach; ?>
  </div>


  <div class="row my-2 mt-5">
    <div class="col-12">
      <h3>Kelengkapan Surat (Opsional)</h3>
    </div>
  </div>
  <div class="row">
    <?php foreach($suratOpt as $so) : ?>
    <div class="col-md-4">

      <div class="card bg-white text-center">
        <div class="card-header">
          <p class="text-uppercase text-md text-bold mb-0"><?= $so["nama_surat"] ?></p>
          <?php if($so["foto_surat"] == NULL) : ?>
            <p class="text-sm">Belum Mengupload <?= $so["nama_surat"] ?></p>
          <?php endif; ?>
        </div>
        <div class="card-body pt-2">
          <?php if($so['foto_surat'] != NULL) : ?>
            <div class="w-100 card me-3 shadow" style="background: url('<?= base_url('resources/uploads/images/documents/'.$so["foto_surat"]) ?>'); background-size:cover; height:15rem;"></div>   
          <?php else : ?>
            <div class="w-100 card me-3 shadow" style="background: url('<?= base_url('resources/uploads/images/documents/default_'.$so["slug_name"].'.png') ?>'); background-size:cover; height:15rem;"></div>   
          <?php endif; ?>
        </div>
        <div class="card-footer">
          <?php if($so['foto_surat'] != NULL) : ?>
            <button type="button" class="btn btn-outline-primary btn-block w-100" data-bs-toggle="modal" data-bs-target="#surat-<?= $so["slug_name"] ?>">
                Lihat Scan/Foto <?= $so["nama_surat"] ?>
            </button>
          <?php endif; ?>
            <button type="button" class="btn btn-primary btn-block w-100" data-bs-toggle="modal" data-bs-target="#surat-<?= $so["slug_name"] ?>">
                Upload Scan/Foto <?= $so["nama_surat"] ?>
            </button>
        </div>
      </div>
      
    </div>



    <div class="modal fade" id="surat-<?= $so["slug_name"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body p-0">
            <form method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card bg-white text-center">
              <div class="card-header">
                <p class="text-uppercase text-md text-bold mb-0">Upload <?= $so["nama_surat"] ?></p>
              </div>
              <div class="card-body pt-2">
                <?php if($so['foto_surat'] != NULL) : ?>
                  <img src="<?= base_url('resources/uploads/images/documents/'.$so["foto_surat"]) ?>" class="w-100" alt="Surat <?= $so["nama_surat"] ?>">  
                <?php else : ?>
                  <div class="w-100 card me-3 shadow" style="background: url('<?= base_url('resources/uploads/images/documents/default_'.$so["slug_name"].'.png') ?>'); background-size:cover; height:15rem;"></div>   
                <?php endif; ?>
                <div class="input-group mt-4">
                    <input type="file" name="foto" class="form-control" aria-label="Foto" aria-describedby="foto">
                </div>
              </div>
              <input type="hidden" name="id-surat" value="<?= $so["id_surat"] ?>">
              <div class="card-footer">
                  <button type="submit" class="btn bg-gradient-primary btn-block w-100">
                      Upload
                  </button>
              </div>
            </div>
            </form>
          </div>

        </div>
      </div>
    </div>


    <?php endforeach; ?>
  </div>

    
</div>
    


<?= $this->endSection() ?>