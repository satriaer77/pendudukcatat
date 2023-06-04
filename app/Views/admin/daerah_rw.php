<?= $this->extend('admin/templates/page_main') ?>

<?= $this->section('content') ?>
    
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
        <button type="button" class="btn bg-gradient-primary btn-block" data-bs-toggle="modal" data-bs-target="#tambahRt">
            Tambah RT
        </button>
        <button type="button" class="btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#editRw">
            Edit Data RW
        </button>
        <div class="card mb-4">
            <div class="card-header pb-0">
            <h6>Daftar RT di RW <?= $rw['no_rw']  ?> desa Telang</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No RT</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Dibuat</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listRt as $rt) : ?>
                    <tr>
                        <td class="align-middle">
                            <span class="px-3 text-secondary text-xs font-weight-bold">RT <?= $rt["no_rt"] ?></span>
                        </td>
                        <td class="align-middle">
                            <span class="px-3 text-secondary text-xs font-weight-bold"><?= $rt["tanggal_dibuat"] ?></span>
                        </td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#editRt<?= $rt["id_rt"] ?>">
                                Edit Data RT
                            </button>
                            <a href="<?= base_url('admin/daerah/deleteRt/'.$rt["id_rw"]."/".$rt["id_rt"]) ?>" class="btn btn-sm btn-danger text-white text-secondary font-weight-bold">Hapus RT</a>
                        </td>
                    </tr>
                    <!-- Edit RW -->

                    <div class="col-md-4">
                        <div class="modal fade" id="editRt<?= $rt["id_rt"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">

                              <div class="modal-body p-0">
                                <div class="card card-plain">

                                  <div class="card-header pb-0 text-left">
                                      <h3 class="font-weight-bolder text-primary text-gradient">Edit Data RT <?= $rt["no_rt"] ?> Di RW <?= $rw["no_rw"] ?></h3>
                                  </div>
                                  <div class="card-body pb-3">
                                    <form method="POST" role="form text-left">
                                      <label>No RT</label>
                                      <div class="input-group mb-3">
                                        <input type="number" name="no-rw" class="form-control" placeholder="No Rw" aria-label="No-Rw" aria-describedby="name-addon" value="<?= $rt["no_rt"] ?>">
                                      </div>
                                      <input type="hidden" name="id-rw" value="<?= $rt["id_rt"] ?>">
                                      <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Submit Edit</button>
                                      </div>
                                    </form>
                                  </div>

                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- End Edit RW -->
                
                    <?php endforeach; ?>

                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>


<!-- Tambah RT -->
<div class="col-md-4">
    <div class="modal fade" id="tambahRt" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body p-0">
            <div class="card card-plain">

              <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-primary text-gradient">Tambah Daerah RT di RW <?= $rw["no_rw"] ?></h3>
              </div>
              <div class="card-body pb-3">
                <form method="POST" role="form text-left">
                  <label>No RT</label>
                  <div class="input-group mb-3">
                    <input type="number" name="no-rt" class="form-control" placeholder="No Rt" aria-label="No-Rt" aria-describedby="name-addon">
                  </div>
                  <input type="hidden" name="id-rw" value="<?= $rw["id_rw"] ?>">
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Submit</button>
                  </div>
                </form>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
</div>
<!-- End Tambah RT -->


<!-- Edit RW -->

<div class="col-md-4">
    <div class="modal fade" id="editRw" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body p-0">
            <div class="card card-plain">

              <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-primary text-gradient">Edit Data RW <?= $rw["no_rw"] ?></h3>
              </div>
              <div class="card-body pb-3">
                <form method="POST" role="form text-left">
                  <label>No RW</label>
                  <div class="input-group mb-3">
                    <input type="number" name="no-rw" class="form-control" placeholder="No Rw" aria-label="No-Rw" aria-describedby="name-addon" value="<?= $rw["no_rw"] ?>">
                  </div>
                  <input type="hidden" name="id-rw" value="<?= $rw["id_rw"] ?>">
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Submit Edit</button>
                  </div>
                </form>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
</div>
<!-- End Edit RW -->


<!--- ////////////// -->



<?= $this->endSection() ?>