<?= $this->extend('admin/templates/page_main') ?>

<?= $this->section('content') ?>


    
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
        
            <div class="card ">
                <div class="card-header pb-0 p-3">
                  <div class="d-flex justify-content-between">
                    <h6 class="mb-2">Daftar Permohonan Surat Kematian</h6>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center ">
                    <tbody>

                      <?php foreach($suratPermohonan as $sp) : ?>
                      <tr>
                        <td class="w-30">
                          <div class="d-flex px-2 py-1 align-items-center">
                            <div class="ms-4">
                              <p class="text-xs font-weight-bold mb-0">Pemohon:</p>
                              <h6 class="text-sm mb-0">United States</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Waktu Permohonan:</p>
                            <h6 class="text-sm mb-0"><?= $sp["waktu_permohonan"] ?></h6>
                          </div>
                        </td>
                        <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                            <h6 class="text-sm mb-0">$230,900</h6>
                          </div>
                        </td>
                        <td class="align-middle text-sm">
                          <div class="col text-center">
                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                            <h6 class="text-sm mb-0">29.9%</h6>
                          </div>
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





<?= $this->endSection() ?>