<?php
    $matkul = new xquery('matkul');
    $data_matkul = $matkul->where(['id_matkul' => Req()['id'] ]);
    $m = $data_matkul[0];
    if(isset($_POST['kode'])){
        $matkul->update($_POST, ['id_matkul' => Req()['id'] ]);
        $_SESSION['success'] = 'Data Berhasil DIUBAH';
        redirect(url('matkul'));
    }
?>

<?php include basedir().'view/layouts/master.php' ?>

<?php startblock('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Matkul</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">    
                <label for="">KODE</label>
                <input type="text" name="kode" class="form-control" required value="<?= $m['kode'] ?>">
            </div>

            <div class="form-group">    
                <label for="">MATKUL</label>
                <input type="text" name="matkul" class="form-control" required value="<?= $m['matkul'] ?>">
            </div>
         

            <button type="submit" class="btn btn-primary">Submit</button>
            
        </form>
    </div>

</div>

<?php endblock() ?>
