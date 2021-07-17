<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Update Mahasiswa
                </div>
                <div class="card-body">
                    <?php
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) : ?>
                        <div class="alert alert-danger" role="alert">
                            Whoops! Ada kesalahan saat input data, yaitu:
                            <ul>
                                <?php foreach ($errors as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('Mahasiswa/update/' . $mhs['id']); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="fotoLama" value="<?= $mhs['foto']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ? old('nama') : $mhs["nama"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= old('nim') ? old('nim') : $mhs['nim']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= old('email') ? old('email') : $mhs['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi</label>
                            <select class="form-control" id="prodi" name="prodi">
                                <?php foreach ($rowsProdi as $rowProdi) : ?>
                                    <?php if ($rowProdi == $mhs['prodi']) : ?>
                                        <option value="<?= $rowProdi; ?>" selected><?= $rowProdi; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $rowProdi; ?>"><?= $rowProdi; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="/img/<?= $mhs['foto']; ?>" class="img-thumbnail img-preview" alt="mhs">
                                </div>
                                <div class="col-lg-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= (!empty($errors['foto'])) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="priviewImg()">
                                        <label class="custom-file-label" for="foto"><?= $mhs['foto']; ?></label>
                                        <?php if (!empty($errors['foto'])) : ?>
                                            <div class="invalid-feedback"><?= $errors['foto']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>