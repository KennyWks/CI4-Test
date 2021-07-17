<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <a href="/Mahasiswa/add" class="btn btn-primary">Create</a>
                </div>
            </div>
            <h1>Data Mahasiswa</h1>
            <?php if (!empty(session()->getFlashdata('added'))) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('added'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty(session()->getFlashdata('removeMhs'))) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('removeMhs'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty(session()->getFlashdata('updated'))) : ?>
                <div class="alert alert-primary">
                    <?= session()->getFlashdata('updated'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
        </div>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
            <th>#</th>
                <th>NIM</th>
                <th>Name</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Photo</th>
                <th>Action</th>
            </thead>
            <tfoot>
                <th>#</th>
                <th>NIM</th>
                <th>Name</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Photo</th>
                <th>Action</th>
            </tfoot>
            <tbody>
                <?php $i = 1;
                foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['nim']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['prodi']; ?></td>
                        <td><img class="img-thumbnail" style="width: 70px; height:70px;" src="img/<?= $row['foto']; ?>"></td>
                        <td>
                            <a href="/Mahasiswa/<?= $row['id']; ?>" class="btn btn-primary">Detail</a>
                            <a href="/Mahasiswa/edit/<?= $row['id']; ?>" class="btn btn-success">Update</a>
                            <form action="/Mahasiswa/<?= $row['id'] ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="delete" />
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data <?= $row['nim']; ?> ini?')">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('bootstrap', 'bootstrap_pagination'); ?>
    </div>
</div>
</div>