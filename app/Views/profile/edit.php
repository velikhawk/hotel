<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Profil</h6>
    </div>
    <div class="card-body">

        <form action="/profile/update/<?= $profile['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $profile['id']; ?>">
            <input type="hidden" name="gambarLama" value="<?= $profile['gambar']; ?>">

            <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('nama'); ?>
                </div>
            </div> -->


            <div class="form-group">
                <label for="nama">Nama </label>
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= $profile['nama']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat </label>
                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= $profile['alamat']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email </label>
                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= $profile['email']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="telp">Telp </label>
                <input type="text" class="form-control <?= ($validation->hasError('telp')) ? 'is-invalid' : ''; ?>" id="telp" name="telp" autofocus value="<?= $profile['telp']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('telp'); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-5">
                    <img class="img-thumbnail" src="/img/profile/<?= $profile['gambar']; ?>" height="20px">
                </div>
            </div>

            <div class="custom-file mb-3">
                <div class="col-sm-6">
                    <input type="file" class="form-control custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" autofocus value="<?= old('gambar'); ?>" id="gambar" name="gambar">
                    <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar...</label>
                    <div class="invalid-feedback"> <?= $validation->getError('gambar'); ?></div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/profile" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>