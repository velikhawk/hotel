<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw  fa-user-circle"></i> Profile</h1>
</div> -->

<div class="row">
    <div class="col-6">
        <a href="/checkin/tambah" class="btn btn-primary btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text">Tambah Data Checkin</span>
        </a>
    </div>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success my-2 text-center" role="alert">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>

<!-- Data Profile -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw  fa-user-circle"></i> Data Hotel</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                       
                        <th>ID Tamu</th>
                        <th>ID Kamar</th>
                  
                        <th>Checkin</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($checkin as $row) : ?>
                        <tr>
                            <td><?= $row['idtamu']; ?></td>
                            <td><?= $row['idkamar']; ?></td>
                            <td><?= $row['checkin']; ?></td>
                            
                            <td><?= $row['duration']; ?></td>
                            <td><?= $row['status']; ?></td>
                            <td>
                                <a href="/checkin/edit/<?= $row['id']; ?>" class="badge badge-primary">Edit</a>

                                <form action="/checkin/delete/<?= $row['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="badge badge-danger btn-sm" onclick="return confirm('Apa Anda Yakin hapus data?.');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>