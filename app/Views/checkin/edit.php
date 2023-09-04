<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Kamar</h6>
    </div>
    <div class="card-body">

        <form action="/checkin/update/<?= $checkin['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $checkin['id']; ?>">
           

            <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('idtamu'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('idtamu'); ?>
                </div>
            </div> -->


            <div class="form-group">
                <label for="idtamu">Id Tamu </label>
                <select class="form-control <?= ($validation->hasError('idtamu')) ? 'is-invalid' : ''; ?>" id="idtamu" name="idtamu" autofocus value="<?= $checkin['idtamu']; ?>">
                <?php foreach($tamu as $row) : ?>
                    <option><?=$row['idtamu'];?></option>
                <?php endforeach; ?>
                </select>    
                <div class="invalid-feedback">
                    <?= $validation->getError('idtamu'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="idkamar">Id Kamar </label>
                <select class="form-control <?= ($validation->hasError('idkamar')) ? 'is-invalid' : ''; ?>" id="idkamar" name="idkamar" autofocus value="<?= $checkin['idkamar']; ?>">
                <?php foreach($kamar as $row) : ?>
                    <option><?=$row['idkamar'];?></option>
                <?php endforeach; ?>
                </select>    
                <div class="invalid-feedback">
                    <?= $validation->getError('idkamar'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="checkin"> Checkin </label>
                <input type="text" class="form-control <?= ($validation->hasError('checkin')) ? 'is-invalid' : ''; ?>" id="checkin" name="checkin" autofocus value="<?= $checkin['checkin']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('checkin'); ?>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="duration">Duration </label>
                <input type="text" class="form-control <?= ($validation->hasError('duration')) ? 'is-invalid' : ''; ?>" id="duration" name="duration" autofocus value="<?= $checkin['duration']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('duration'); ?>
                </div>
            </div>
            <label class="">Status</label> 
                  <div class="">
                    <select class="form-select" name="status" aria-label="Default select example">
                      <option selected>-Pilih-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/checkin" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>