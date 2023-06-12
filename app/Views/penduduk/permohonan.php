

<?= $this->extend('penduduk/templates/page_main') ?>

<?= $this->section('content') ?>

<?php
    function array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
    }
    $pendingPermohonan = [];
    $pendingPermohonanId = [];
?>

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
  
  




  <div class="row my-2 mt-5">
    <div class="col-12">
      <h3>Permohonan Surat</h3>
    </div>
  </div>
  <div class="row">
    <?php foreach($suratAll as $sa) : ?>
        <?php

        foreach($suratPending as $sp) 
        {
            if ($sp["id_surat"] == $sa["id_surat"]) array_push($pendingPermohonan,$sa['id_surat']); $pendingPermohonanId[$sa["id_surat"]] = $sp['id_permohonan'];
        } 
         ?>
    <div class="col-md-4 my-3">

      <div class="card bg-white text-center">
        <div class="card-header">
          <p class="text-uppercase text-md text-bold mb-0">Permohonan Surat Pengantar RT/RW Untuk <?= $sa["nama_surat"] ?></p>
        
        </div>
        <div class="card-body pt-0">
            <?php if(in_array($sa["id_surat"], $pendingPermohonan) ) : ?>
                <p class="text-md">Anda Sudah membuat Permohonan Surat Pengantar RT/RW Untuk <?= $sa["nama_surat"] ?>, Silahkan tunggu respon dari admin.</p>
                <p class="text-sm">Status : Pending</p>

            <?php endif; ?>
        </div>
        <div class="card-footer pt-0">
            <?php if(in_array($sa["id_surat"], $pendingPermohonan) ) : ?>
            <form action="<?= base_url('penduduk/batal-permohonan/') ?>" method="post">
            <input type="hidden" name="id-permohonan" value="<?= $pendingPermohonanId[$sa["id_surat"]] ?>">
            <button type="submit" class="btn btn-danger btn-block w-100">
                Batal Permohonan <?= $sa["nama_surat"] ?>
            </button>
            </form>
            <?php else : ?>
            <button type="button" class="btn btn-primary btn-block w-100" data-bs-toggle="modal" data-bs-target="#surat-<?= $sa["slug_name"] ?>">
                Buat Permohonan Surat Pengantar <?= $sa["nama_surat"] ?>
            </button>
            <?php endif; ?>
            
        </div>
      </div>
      
    </div>



    <div class="modal fade" id="surat-<?= $sa["slug_name"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body p-0">
            <form method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card bg-white text-center">
              <div class="card-header">
                <p class="text-uppercase text-md text-bold mb-0">Request Surat Pengantar RT/RW Untuk Permohonan <?= $sa["nama_surat"] ?></p>
              </div>
              <div class="card-body pt-2">
                <div class="input-group mt-4">
                    <textarea name="tujuan" placeholder="Isi tujuan anda membuat permohonan Surat Pengantar" class="form-control" aria-label="tujuan" aria-describedby="tujuan" required></textarea>
                </div>
              </div>
              <input type="hidden" name="id-surat" value="<?= $sa["id_surat"] ?>">
              <div class="card-footer">
                  <button type="submit" class="btn bg-gradient-primary btn-block w-100">
                      Buat Permohonan Surat Pengantar <?= $sa["nama_surat"] ?>
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