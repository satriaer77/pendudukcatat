<?= $this->extend('admin/templates/page_main') ?>

<?= $this->section('content') ?>


    
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
    

    
            <div class="card">

                <div class="card-body p-0">
                    <div class="card card-plain">

                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-primary text-gradient">Edit Penduduk</h3>
                        </div>
                        <div class="card-body pb-3">
                            <form method="POST" role="form text-left" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <label>NIK</label>
                            <div class="input-group mb-3">
                                <input type="number" name="nik" class="form-control" placeholder="NIK" aria-label="NIK" aria-describedby="nik-addon" value="<?= $penduduk["nik"] ?>" required>
                            </div>
                            <label>Nama Penduduk</label>
                            <div class="input-group mb-3">
                                <input type="text" name="nama-penduduk" class="form-control" placeholder="Nama Penduduk" aria-label="Nama Penduduk" aria-describedby="nama-addon" value="<?= $penduduk["nama_penduduk"] ?>" required>
                            </div>
                            <label>Tanggal Lahir</label>
                            <div class="input-group mb-3">
                                <input type="date" name="tanggal-lahir" class="form-control" aria-describedby="tanggal-lahir-addon" value="<?= $penduduk["tanggal_lahir"] ?>" required>
                            </div>
                            <label>Jenis Kelamin</label>
                            <div class="input-group mb-3">
                                <select name="jenis-kelamin" id="jenis-kelamin" class="form-control">
                                    <option value="Pria" <?php if($penduduk["jenis_kelamin"] == "Pria") echo"selected" ?>>Pria</option>
                                    <option value="Wanita" <?php if($penduduk["jenis_kelamin"] == "Pria") echo"selected" ?>>Wanita</option>
                                </select>
                            </div>
                            <label>Agama</label>
                            <div class="input-group mb-3">
                                <select name="agama" id="agama" class="form-control">
                                    <option value="Islam" <?php if($penduduk["agama"] == "Islam") echo"selected" ?> >Islam</option>
                                    <option value="Kristen" <?php if($penduduk["agama"] == "Kristen") echo"selected" ?> >Kristen</option>
                                    <option value="Katholik" <?php if($penduduk["agama"] == "Katholik") echo"selected" ?> >Katholik</option>
                                    <option value="Hindu" <?php if($penduduk["agama"] == "Hindu") echo"selected" ?> >Hindu</option>
                                    <option value="Buddha" <?php if($penduduk["agama"] == "Buddha") echo"selected" ?> >Buddha</option>
                                    <option value="Konghucu" <?php if($penduduk["agama"] == "Konghucu") echo"selected" ?> >Konghucu</option>
                                </select>
                            </div>
                            <label>Golongan Darah</label>
                            <div class="input-group mb-3">
                                <select name="golongan-darah" id="golongan-darah" class="form-control">
                                    <option value="N" <?php if($penduduk["golongan_darah"] == "N") echo"selected" ?>>Tidak Tahu</option>
                                    <option value="A" <?php if($penduduk["golongan_darah"] == "A") echo"selected" ?>>A</option>
                                    <option value="B" <?php if($penduduk["golongan_darah"] == "B") echo"selected" ?>>B</option>
                                    <option value="AB" <?php if($penduduk["golongan_darah"] == "AB") echo"selected" ?>>AB</option>
                                    <option value="O" <?php if($penduduk["golongan_darah"] == "O") echo"selected" ?>>O</option>
                                </select>
                            </div>
                            <label>Kewarganegaraan</label>
                            <div class="input-group mb-3">
                                <select name="kewarganegaraan" id="kewarganegaraan" class="form-control">
                                    <option value="WNI" <?php if($penduduk["kewarganegaraan"] == "WNI") echo"selected" ?>>WNI</option>
                                    <option value="WNA" <?php if($penduduk["kewarganegaraan"] == "WNA") echo"selected" ?>>WNA</option>
                                </select>
                            </div>
                            <label>RW</label>
                            <div class="input-group mb-3">
                                <select name="id-rw" id="id-rw" class="form-control">
                                    <?php foreach($listRw as $rw) : ?>
                                        <option value="<?= $rw["id_rw"] ?>" <?php if($penduduk["id_rw"] == $rw["id_rw"]) echo"selected" ?>><?= $rw["no_rw"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label>RT</label>
                            <div class="input-group mb-3">
                                <select name="id-rt" id="id-rt" class="form-control">
                                    <?php foreach($listRt as $rt) : ?>
                                        <option value="<?= $rt["id_rt"] ?>" <?php if($penduduk["id_rt"] == $rt["id_rt"]) echo"selected" ?>><?= $rt["no_rt"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label>Jalan/Perumahan</label>
                            <div class="input-group mb-3">
                                <input type="text" name="alamat-detail" class="form-control" placeholder="Jalan/Perumahan" aria-label="Jalan/Perumahan" aria-describedby="alamat-addon" value="<?= $penduduk["alamat_detail"] ?>" required>
                            </div>
                            <label>Pekerjaan</label>
                            <div class="input-group mb-3">
                                <select name="pekerjaan" id="pekerjaan" class="form-control">
                                    <?php foreach($listPekerjaan as $pekerjaan) : ?>
                                        <option value="<?= $pekerjaan["id_pekerjaan"] ?>" <?php if($penduduk["id_pekerjaan"] == $pekerjaan["id_pekerjaan"]) echo"selected" ?>><?= $pekerjaan["nama_pekerjaan"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label>Foto</label>
                            <div class="input-group mb-3">
                                <input type="file" name="foto" class="form-control" aria-label="Foto" aria-describedby="foto">
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
<script>
    $.ajax({
        url: "your url",
        headers: {'X-Requested-With': 'XMLHttpRequest'}
    });
</script>


<?= $this->endSection() ?>