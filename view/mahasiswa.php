<?php
    $mahasiswa = new xquery('mahasiswa');
    $data_mahasiswa = $mahasiswa->get();
    if(isset(Req()['delete'] )){
        $mahasiswa->delete(['id' => Req()['delete'] ]);
        $_SESSION['success'] = 'Data Berhasil DIHAPUS';
        redirect(url('mahasiswa'));
    }
    ?>
<?php include basedir().'view/layouts/master.php' ?>

<?php startblock('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Mahasiswa</h1>
</div>

<div class="card">
    <div class="card-body">

    <a href="<?= url('mahasiswa/create') ?>" class="btn btn-sm btn-primary mb-5">Tambah</a>

        <div class="table-responsive">
            <table class="table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>EMAIL</th>
                        <th>TELEPON</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($data_mahasiswa as $key => $value): ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $value['nim'] ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['alamat'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['telepon'] ?></td>
                        <td>
                            <a href="<?= url('mahasiswa/edit?id='.$value['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?= url('mahasiswa?delete='.$value['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>



<?php endblock() ?>