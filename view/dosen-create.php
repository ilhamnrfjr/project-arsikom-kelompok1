<?php
    $dosen = new xquery('dosen');
    if(isset($_POST['nip'])){
        $dosen->insert($_POST);
        $_SESSION['success'] = 'Data Berhasil DITAMBAHKAN';
        redirect(url('dosen'));
    }
?>

<?php include basedir().'view/layouts/master.php' ?>

<?php startblock('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Dosen</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">    
                <label for="">NIP</label>
                <input type="text" name="nip" class="form-control" required>
            </div>

            <div class="form-group">    
                <label for="">NAMA</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">    
                <label for="">ALAMAT</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>

            <div class="form-group">    
                <label for="">EMAIL</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">    
                <label for="">TELEPON</label>
                <input type="text" name="telepon" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            
        </form>
    </div>

</div>

<?php endblock() ?>
