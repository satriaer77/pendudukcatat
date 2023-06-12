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
                <?php if(count($suratPending) > 0) : ?>
                <?php foreach($suratPending as $sp) : ?>
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Permohonan <?= $sp['nama_surat'] ?></h6>
                    <span class="mb-2 text-xs">Waktu Permohonan: <span class="text-dark font-weight-bold ms-sm-2"><?= $sp['tanggal_permohonan'] ?></span></span>
                    <span class="mb-2 text-xs">Status: <span class="text-dark ms-sm-2 font-weight-bold">Menunggu Persetujuan Admin</span></span>
                    <span class="text-xs">Tujuan: <span class="text-dark ms-sm-2 font-weight-bold"><?= $sp['tujuan'] ?></span></span>
                  </div>
                  <div class="ms-auto text-end">
                  <form action="<?= base_url('penduduk/batal-permohonan/') ?>" method="post">
                  <input type="hidden" name="id-permohonan" value="<?= $sp["id_permohonan"] ?>">
                  <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0">
                    <i class="far fa-trash-alt me-2"></i>Batal
                  </button>
                  </form>
                    <button class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#permohonan-<?= $sp["id_permohonan"] ?>"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</button>
                  </div>
                </li>


                <div class="modal fade" id="permohonan-<?= $sp["id_permohonan"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">

                      <div class="modal-body p-0">
                        <form method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="card bg-white text-center">
                          <div class="card-header">
                            <p class="text-uppercase text-md text-bold mb-0">Edit Tujuan Surat Pengantar RT/RW Untuk Permohonan <?= $sp["nama_surat"] ?></p>
                          </div>
                          <div class="card-body pt-2">
                            <div class="input-group mt-4">
                                <textarea name="tujuan" placeholder="Isi tujuan anda membuat permohonan Surat Pengantar" class="form-control" aria-label="tujuan" aria-describedby="tujuan" required><?= $sp["tujuan"] ?></textarea>
                            </div>
                          </div>
                          <input type="hidden" name="id-surat" value="<?= $sp["id_permohonan"] ?>">
                          <div class="card-footer">
                              <button type="submit" class="btn bg-gradient-primary btn-block w-100">
                                  Edit Permohonan
                              </button>
                          </div>
                        </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
                <?php else : ?>
                  <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="text-center">
                    <h6 class="text-md">Tidak Ada Permohonan</h6>
                  </div>
                </li>
                <?php endif; ?>

              </ul>
            </div>
          </div>
        </div>
        

        <div class="col-md-6">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Pesan Dari Admin Yang Belum Dibaca</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <?php if(count($messages) > 0) : ?>
                <?php foreach($messages as $message) : ?>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-mobile-button text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Admin</h6>
                      <span class="text-xs"><?= $message['isi_pesan'] ?></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <a href="<?= base_url('penduduk/pesan#last-pesan') ?>" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                  </div>
                </li>
                <?php endforeach; ?>
                <?php else : ?>
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-md">Tidak Ada Pesan Terbaru</h6>
                    </div>
                  </div>
                </li>
                <?php endif; ?>

              </ul>
            </div>
          </div>
        </div>

    </div>

</div>

    


<?= $this->endSection() ?>