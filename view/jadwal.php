<?php
    $jadwal = new xquery('jadwal');
    $data_jadwal = $jadwal->query("SELECT jadwal.*, matkul.kode, matkul.matkul, dosen.nama FROM jadwal JOIN matkul ON jadwal.matkul_id = matkul.id_matkul JOIN dosen ON jadwal.dosen_id = dosen.id");
    if(isset(Req()['delete'] )){
        $jadwal->delete(['id_jadwal' => Req()['delete'] ]);
        $_SESSION['success'] = 'Data Berhasil DIHAPUS';
        redirect(url('jadwal'));
    }
    ?>
<?php include basedir().'view/layouts/master.php' ?>

<?php startblock('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jadwal</h1>
</div>

<div class="card">
    <div class="card-body">

    <a href="<?= url('jadwal/create') ?>" class="btn btn-sm btn-primary mb-5">Tambah</a>

        <div class="table-responsive">
            <table class="table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>TANGGAL</th>
                        <th>JAM</th>
                        <th>MATKUL</th>
                        <th>DOSEN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($data_jadwal as $key => $value): ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $value['tanggal'] ?></td>
                        <td><?= substr($value['jam'],0,5) ?></td>
                        <td><?= $value['matkul'] ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td>
                            <a href="<?= url('jadwal/edit?id='.$value['id_jadwal']) ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?= url('jadwal?delete='.$value['id_jadwal']) ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                       
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>



<?php endblock() ?>