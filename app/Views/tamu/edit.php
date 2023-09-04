<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Tamu</h6>
    </div>
    <div class="card-body">

        <form action="/tamu/update/<?= $tamu['idtamu']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="idtamu" value="<?= $tamu['idtamu']; ?>">
            

            <!-- <div class="form-group">
                <label for="nama">Id</label>
                <input type="text" class="form-control" id="id" name="id" autofocus value="<?= old('idtamu'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('idtamu'); ?>
                </div>
            </div> -->


            <div class="form-group">
                <label for="nama">Nama Tamu </label>
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= $tamu['nama']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= $tamu['alamat']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email </label>
                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= $tamu['email']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="telp">Telp </label>
                <input type="text" class="form-control <?= ($validation->hasError('telp')) ? 'is-invalid' : ''; ?>" id="telp" name="telp" autofocus value="<?= $tamu['telp']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('telp'); ?>
                </div>
            </div>
           

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/tamu" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>