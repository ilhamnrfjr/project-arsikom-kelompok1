<?php
    $jadwal = new xquery('jadwal');
    $dosen = new xquery('dosen');
    $matkul = new xquery('matkul');
    $d = $dosen->get();
    $m = $matkul->get();
    if(isset($_POST['tanggal'])){
        $jadwal->insert($_POST);
        $_SESSION['success'] = 'Data Berhasil DITAMBAHKAN';
        redirect(url('jadwal'));
    }
?>

<?php include basedir().'view/layouts/master.php' ?>

<?php startblock('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah jadwal</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">    
                <label for="">TANGGAL</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="form-group">    
                <label for="">JAM</label>
                <input type="time" name="jam" class="form-control" required>
            </div>

            <div class="form-group">    
                <label for="">NAMA DOSEN</label>
                <select name="dosen_id" class="form-control" required>
                    <option value="">Pilih Dosen</option>
                    <?php foreach($d as $dosenn){ ?>
                        <option value="<?= $dosenn['id'] ?>"><?= $dosenn['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">    
                <label for="">MATKUL</label>
                <select name="matkul_id" class="form-control" required>
                    <option value="">Pilih Matkul</option>
                    <?php foreach($m as $matkull){ ?>
                        <option value="<?= $matkull['id_matkul'] ?>"><?= $matkull['matkul'] ?></option>
                    <?php } ?>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            
        </form>
    </div>

</div>

<?php endblock() ?>
