<?= $this->extend('admin/templates/page_main') ?>

<?= $this->section('content') ?>


    
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
        <button type="button" class="btn bg-gradient-primary btn-block" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">
            Tambah RW
        </button>
        <div class="card mb-4">
            <div class="card-header pb-0">
            <h6>Daftar RW di desa Telang</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No RW</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Dibuat</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listRw as $rw) : ?>
                    <tr>
                        <td class="align-middle">
                            <span class="px-3 text-secondary text-xs font-weight-bold">RW <?= $rw["no_rw"] ?></span>
                        </td>
                        <td class="align-middle">
                            <span class="px-3 text-secondary text-xs font-weight-bold"><?= $rw["tanggal_dibuat"] ?></span>
                        </td>
                        <td class="align-middle">
                            <a href="<?= base_url('admin/daerah/rw/'.$rw["id_rw"]) ?>" class="btn btn-sm btn-warning text-white text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
                            Lihat Detail RW
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    

    <!-- Modal -->
    <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body p-0">
            <div class="card card-plain">

              <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-primary text-gradient">Tambah Daerah RW</h3>
              </div>
              <div class="card-body pb-3">
                <form method="POST" role="form text-left">
                  <label>No RW</label>
                  <div class="input-group mb-3">
                    <input type="number" name="no-rw" class="form-control" placeholder="No Rw" aria-label="No-Rw" aria-describedby="name-addon">
                  </div>
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
<!--- ////////////// -->



<?= $this->endSection() ?>