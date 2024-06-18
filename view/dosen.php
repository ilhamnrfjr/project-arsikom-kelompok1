<?php
    $dosen = new xquery('dosen');
    $data_dosen = $dosen->get();
    if(isset(Req()['delete'] )){
        $dosen->delete(['id' => Req()['delete'] ]);
        $_SESSION['success'] = 'Data Berhasil DIHAPUS';
        redirect(url('dosen'));
    }
    ?>
<?php include basedir().'view/layouts/master.php' ?>

<?php startblock('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dosen</h1>
</div>

<div class="card">
    <div class="card-body">

    <a href="<?= url('dosen/create') ?>" class="btn btn-sm btn-primary mb-5">Tambah</a>

        <div class="table-responsive">
            <table class="table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>EMAIL</th>
                        <th>TELEPON</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($data_dosen as $key => $value): ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $value['nip'] ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['alamat'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['telepon'] ?></td>
                        <td>
                            <a href="<?= url('dosen/edit?id='.$value['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?= url('dosen?delete='.$value['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>



<?php endblock() ?>