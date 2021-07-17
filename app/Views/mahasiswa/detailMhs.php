<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img class="img-thumbnail my-2" src="/img/<?= $mhs['foto']; ?>">
                    <h5 class="card-title">Nama : <?= $mhs['nama'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-success">NIM : <?= $mhs['nim'] ?></h6>
                    <p class="card-text">Email : <?= $mhs['email'] ?></p>
                    <a href="/Mahasiswa" class="card-link">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>