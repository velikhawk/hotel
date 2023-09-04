<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Kamar</h6>
    </div>
    <div class="card-body">

        <form action="/kamar/update/<?= $kamar['idkamar']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="idkamar" value="<?= $kamar['idkamar']; ?>">
            <input type="hidden" name="gambarLama" value="<?= $kamar['picture']; ?>">

            <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('nokamar'); ?>
                </div>
            </div> -->


            <div class="form-group">
                <label for="nokamar">No Kamar </label>
                <input type="text" class="form-control <?= ($validation->hasError('nokamar')) ? 'is-invalid' : ''; ?>" id="nokamar" name="nokamar" autofocus value="<?= $kamar['nokamar']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nokamar'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="idtipekamar">Id Tipe Kamar </label>
                <select class="form-control <?= ($validation->hasError('idtipekamar')) ? 'is-invalid' : ''; ?>" id="idtipekamar" name="idtipekamar" autofocus value="<?= $kamar['idtipekamar']; ?>">
                <?php foreach($tipekamar as $row) : ?>
                    <option><?=$row['idtipekamar'];?></option>
                <?php endforeach; ?>
                </select>    
                <div class="invalid-feedback">
                    <?= $validation->getError('idtipekamar'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="price"> Harga </label>
                <input type="text" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?>" id="price" name="price" autofocus value="<?= $kamar['price']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('price'); ?>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="allotment">Telp </label>
                <input type="text" class="form-control <?= ($validation->hasError('allotment')) ? 'is-invalid' : ''; ?>" id="allotment" name="allotment" autofocus value="<?= $kamar['allotment']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('allotment'); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-5">
                    <img class="img-thumbnail" src="/img/kamar/<?= $kamar['picture']; ?>" height="20px">
                </div>
            </div>

            <div class="custom-file mb-3">
                <div class="col-sm-6">
                    <input type="file" class="form-control custom-file-input <?= ($validation->hasError('picture')) ? 'is-invalid' : ''; ?>" id="picture" name="picture" autofocus value="<?= old('picture'); ?>" id="picture" name="picture">
                    <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar...</label>
                    <div class="invalid-feedback"> <?= $validation->getError('picture'); ?></div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/kamar" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>