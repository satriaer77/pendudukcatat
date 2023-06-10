<?= $this->extend('admin/templates/page_main') ?>

<?= $this->section('content') ?>


    
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Daftar Permohonan</h6>
            </div>
            <div class="card-body px-4 pt-0 pb-5 d-flex justify-content-around">
        
                <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="fas fa-coffin-cross opacity-10"></i>
                        </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">Surat Kematian</h6>
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0"></h5>
                        <a href="<?= base_url("admin/permohonan/kematian") ?>" class="btn btn-outline-primary">Lihat Permohonan</a>
                    </div>
                </div>
        
                <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="far fa-id-card-alt opacity-10"></i>
                        </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">Kartu Tanda Penduduk</h6>
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0"></h5>
                        <a href="<?= base_url("admin/permohonan/ktp") ?>" class="btn btn-outline-primary">Lihat Permohonan</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="far fa-coffin-cross opacity-10"></i>
                        </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">Kartu Keluarga</h6>
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0"></h5>
                        <a href="<?= base_url("admin/permohonan/kk") ?>" class="btn btn-outline-primary">Lihat Permohonan</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="far fa-coffin-cross opacity-10"></i>
                        </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">Surat Kelahiran</h6>
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0"></h5>
                        <a href="<?= base_url("admin/permohonan/kk") ?>" class="btn btn-outline-primary">Lihat Permohonan</a>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</div>





<?= $this->endSection() ?>