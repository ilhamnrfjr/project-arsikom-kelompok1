<?php
    $jadwal = new xquery('jadwal');
    $dosen = new xquery('dosen');
    $matkul = new xquery('matkul');
    $d = $dosen->get();
    $m = $matkul->get();
    $j = $jadwal->where(['id_jadwal' => Req()['id'] ]);
    $jd = $j[0];
    if(isset($_POST['tanggal'])){
        $jadwal->update($_POST, ['id_jadwal' => Req()['id'] ]);
        $_SESSION['success'] = 'Data Berhasil DIUBAH';
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
                <input type="date" name="tanggal" class="form-control" required value="<?= $jd['tanggal'] ?>">
            </div>

            <div class="form-group">    
                <label for="">JAM</label>
                <input type="time" name="jam" class="form-control" required value="<?= $jd['jam'] ?>">
            </div>

            <div class="form-group">    
                <label for="">NAMA DOSEN</label>
                <select name="dosen_id" class="form-control" required>
                    <option value="">Pilih Dosen</option>
                    <?php foreach($d as $dosenn){ ?>
                        <option value="<?= $dosenn['id'] ?>" <?= $jd['dosen_id'] == $dosenn['id'] ? 'selected' : ''?> ><?= $dosenn['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">    
                <label for="">MATKUL</label>
                <select name="matkul_id" class="form-control" required>
                    <option value="">Pilih Matkul</option>
                    <?php foreach($m as $matkull){ ?>
                        <option value="<?= $matkull['id_matkul'] ?>" <?= $jd['matkul_id'] == $matkull['id_matkul'] ? 'selected' : ''?> ><?= $matkull['matkul'] ?></option>
                    <?php } ?>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            
        </form>
    </div>

</div>

<?php endblock() ?>
