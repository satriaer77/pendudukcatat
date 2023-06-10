<?= $this->extend('admin/templates/page_main') ?>

<?= $this->section('content') ?>


    
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn bg-gradient-primary btn-block" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">
                Tambah Penduduk
            </button>
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Penduduk di desa Telang</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bio Penduduk</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Agama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Golongan Darah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pekerjaan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Lahir</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kewarganegaraan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listPenduduk as $penduduk) : ?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="avatar avatar-sm me-3" style="background: url('<?= base_url('resources/uploads/images/profile/'.$penduduk["foto"]) ?>'); background-size:cover">
                                           
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?= $penduduk["nama_penduduk"] ?></h6>
                                            <p class="text-xs text-secondary mb-0"><?= $penduduk["nik"] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle px-4">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $penduduk["jenis_kelamin"] ?></span>
                                </td>
                                <td class="align-middle px-4">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $penduduk["agama"] ?></span>
                                </td>
                                <td class="align-middle px-4">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $penduduk["golongan_darah"] ?></span>
                                </td>
                                <td class="px-4">
                                    <p class="text-xs font-weight-bold mb-0"><?= $penduduk["nama_pekerjaan"] ?></p>
                                </td>
                                <td class="align-middle px-4">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $penduduk["tanggal_lahir"] ?></span>
                                </td>
                                <td class="align-middle px-4">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $penduduk["kewarganegaraan"] ?></span>
                                </td>
                                <td class="align-middle px-4">
                                    <span class="text-secondary text-xs font-weight-bold"><?= $penduduk["alamat_detail"]." RT ".$penduduk["no_rt"]." RW ".$penduduk["no_rw"] ?></span>
                                </td>
                                <td class="align-middle px-4">
                                    <a href="<?= base_url('admin/penduduk/'.$penduduk["nik"]) ?>" class="btn btn-outline-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                    </a>
                                    <a href="<?= base_url('admin/deletePenduduk/'.$penduduk["nik"]) ?>" class="btn btn-outline-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Hapus
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
                  <h3 class="font-weight-bolder text-primary text-gradient">Tambah Penduduk</h3>
              </div>
              <div class="card-body pb-3">
                <form method="POST" role="form text-left">
                  <label>NIK</label>
                  <div class="input-group mb-3">
                    <input type="number" name="nik" class="form-control" placeholder="NIK" aria-label="NIK" aria-describedby="nik-addon" required>
                  </div>
                  <label>Password</label>
                  <div class="input-group mb-3">
                    <input type="password" name="password" minlength=8 class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required>
                  </div>
                  <label>Nama Penduduk</label>
                  <div class="input-group mb-3">
                    <input type="text" name="nama-penduduk" class="form-control" placeholder="Nama Penduduk" aria-label="Nama Penduduk" aria-describedby="nama-addon" required>
                  </div>
                  <label>Tanggal Lahir</label>
                  <div class="input-group mb-3">
                    <input type="date" name="tanggal-lahir" class="form-control" aria-describedby="tanggal-lahir-addon" required>
                  </div>
                  <label>Jenis Kelamin</label>
                  <div class="input-group mb-3">
                    <select name="jenis-kelamin" id="jenis-kelamin" class="form-control">
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                  </div>
                  <label>Agama</label>
                  <div class="input-group mb-3">
                    <select name="agama" id="agama" class="form-control">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                  </div>
                  <label>Golongan Darah</label>
                  <div class="input-group mb-3">
                    <select name="golongan-darah" id="golongan-darah" class="form-control">
                        <option value="N">Tidak Tahu</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                  </div>
                  <label>Kewarganegaraan</label>
                  <div class="input-group mb-3">
                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control">
                        <option value="WNI">WNI</option>
                        <option value="WNA">WNA</option>
                    </select>
                  </div>
                  <label>RW</label>
                  <div class="input-group mb-3">
                    <select name="id-rw" id="id-rw" class="form-control">
                        <?php foreach($listRw as $rw) : ?>
                            <option value="<?= $rw["id_rw"] ?>"><?= $rw["no_rw"] ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <label>RT</label>
                  <div class="input-group mb-3">
                    <select name="id-rt" id="id-rt" class="form-control">
                        <?php foreach($listRt as $rt) : ?>
                            <option value="<?= $rt["id_rt"] ?>"><?= $rt["no_rt"] ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <label>Jalan/Perumahan</label>
                  <div class="input-group mb-3">
                    <input type="text" name="alamat-detail" class="form-control" placeholder="Jalan/Perumahan" aria-label="Jalan/Perumahan" aria-describedby="alamat-addon" required>
                  </div>
                  <label>Pekerjaan</label>
                  <div class="input-group mb-3">
                    <select name="pekerjaan" id="pekerjaan" class="form-control">
                        <?php foreach($listPekerjaan as $pekerjaan) : ?>
                            <option value="<?= $pekerjaan["id_pekerjaan"] ?>"><?= $pekerjaan["nama_pekerjaan"] ?></option>
                        <?php endforeach; ?>
                    </select>
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