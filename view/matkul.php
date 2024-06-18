<?php
    $matkul = new xquery('matkul');
    $data_matkul = $matkul->get();
    if(isset(Req()['delete'] )){
        $matkul->delete(['id_matkul' => Req()['delete'] ]);
        $_SESSION['success'] = 'Data Berhasil DIHAPUS';
        redirect(url('matkul'));
    }
    ?>
<?php include basedir().'view/layouts/master.php' ?>

<?php startblock('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Matkul</h1>
</div>

<div class="card">
    <div class="card-body">

    <a href="<?= url('matkul/create') ?>" class="btn btn-sm btn-primary mb-5">Tambah</a>

        <div class="table-responsive">
            <table class="table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>KODE</th>
                        <th>MATKUL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($data_matkul as $key => $value): ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $value['kode'] ?></td>
                        <td><?= $value['matkul'] ?></td>
                        <td>
                            <a href="<?= url('matkul/edit?id='.$value['id_matkul']) ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?= url('matkul?delete='.$value['id_matkul']) ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>



<?php endblock() ?>