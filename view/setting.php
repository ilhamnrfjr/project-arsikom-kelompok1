<?php
 $user = new xquery('user');
 if(isset($_POST['password_lama']) && isset($_POST['password_baru'])){
    if(password_verify($_POST['password_lama'], $_SESSION['user']['password'])) {
        $data = [
            'password' => password_hash($_POST['password_baru'], PASSWORD_DEFAULT),
        ];
        $user->update($data, ['id' => $_SESSION['user']['id'] ]);
        $_SESSION['user']['password'] = $data['password'];
        $_SESSION['success'] = 'Password Berhasil DIUBAH';
    }else{
        $_SESSION['error'] = 'Password Lama Tidak Sesuai';
        redirect(url('setting'));
    }   
    redirect(url('setting'));
 }
?>
<?php include basedir().'view/layouts/master.php' ?>

<?php startblock('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
</div>

<div class="card">
    <div class="card-body">

        <form action="" method="post">

            <div class="form-group">
                <label for="">Password Lama</label>
                <input type="password" name="password_lama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Password Baru</label>
                <input type="password" name="password_baru" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
                
        </form>

    </div>
</div>



<?php endblock() ?>