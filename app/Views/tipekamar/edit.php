<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Tipe Kamar</h6>
    </div>
    <div class="card-body">
    <form action="/tipekamar/update/<?= $tipekamar['idtipekamar']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="idtipekamar" value="<?= $tipekamar['idtipekamar']; ?>">
            

            <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('idtipekamar'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('idtipekamar'); ?>
                </div>
            </div> -->


            <div class="form-group">
                <label for="kodekamar">Kode Kamar </label>
                <input type="text" class="form-control <?= ($validation->hasError('kodekamar')) ? 'is-invalid' : ''; ?>" id="kodekamar" name="kodekamar" autofocus value="<?= $tipekamar['kodekamar']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kodekamar'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="namatipe">Nama Tipe</label>
                <input type="text" class="form-control <?= ($validation->hasError('namatipe')) ? 'is-invalid' : ''; ?>" id="namatipe" name="namatipe" autofocus value="<?= $tipekamar['namatipe']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('namatipe'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="ukuran">Ukuran</label>
                <input type="text" class="form-control <?= ($validation->hasError('ukuran')) ? 'is-invalid' : ''; ?>" id="ukuran" name="ukuran" autofocus value="<?= $tipekamar['ukuran']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('ukuran'); ?>
                </div>
            </div>

           

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/tipekamar" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>