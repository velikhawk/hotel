<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Hotel</h6>
    </div>
    <div class="card-body">

        <form action="/hotel/update/<?= $hotel['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $hotel['id']; ?>">

            <div class="form-group">
                <label for="nama_hotel">Nama </label>
                <input type="text" class="form-control <?= ($validation->hasError('nama_hotel')) ? 'is-invalid' : ''; ?>" id="nama_hotel" name="nama_hotel" autofocus value="<?= $hotel['nama_hotel']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_hotel'); ?>
                </div>
            </div>
            <label class="">Bintang</label> 
                  <div class="">
                    <select class="form-select" name="bintang" aria-label="Default select example">
                      <option selected>-Pilih-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                </div>

            <div class="form-group">
                <label for="alamat">Alamat </label>
                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= $hotel['alamat']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>

           

            <div class="form-group mb-4">
                <label for="telp">Telp </label>
                <input type="text" class="form-control <?= ($validation->hasError('telp')) ? 'is-invalid' : ''; ?>" id="telp" name="telp" autofocus value="<?= $hotel['telp']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('telp'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email </label>
                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= $hotel['email']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

<a href="/hotel" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>