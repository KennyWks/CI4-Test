<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Craate Mahasiswa
                </div>
                <div class="card-body">
                    <?php
                    $inputs = session()->getFlashdata('inputs');
                    $errors = session()->getFlashdata('errors');
                    ?>
                    <form action="/Mahasiswa/create" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control <?= (!empty($errors['nama'])) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $inputs['nama']; ?>">
                            <?php if (!empty($errors['nama'])) : ?>
                                <div class="invalid-feedback"><?= $errors['nama']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $inputs['nim']; ?>">
                            <?php if (!empty($errors['nim'])) : ?>
                                <small class="text-danger"><?= $errors['nim']; ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $inputs['email']; ?>">
                            <?php if (!empty($errors['email'])) : ?>
                                <small class="text-danger"><?= $errors['email']; ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi</label>
                            <select class="form-control" id="prodi" name="prodi">
                                <option value="">Pilih Prodi</option>
                                <?php foreach ($rowsProdi as $rowProdi) : ?>
                                    <option <?= $inputs['prodi'] == $rowProdi ? "selected" : ""; ?> value="<?= $rowProdi; ?>"><?= $rowProdi; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (!empty($errors['prodi'])) : ?>
                                <small class="text-danger"><?= $errors['prodi']; ?></small>
                            <?php endif; ?> 
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="/img/default.jpg" class="img-thumbnail img-preview" alt="mhs">
                                </div>
                                <div class="col-lg-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= (!empty($errors['foto'])) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="priviewImg()">
                                        <label class="custom-file-label" for="foto">Pilih file</label>
                                        <?php if (!empty($errors['foto'])) : ?>
                                            <div class="invalid-feedback"><?= $errors['foto']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>