<?php
    require('connect_db.php');
?>
<!DOCTYPE Html>
<html>
    <head>
        <title>TAMBAH SISWA</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <?php
            if(@$_POST['submit']){

                function validasi(){
                    $check = true;

                    //validasi form
                    if(@$_POST['nama'] == NULL){
                        $check = false;
                    }

                    return $check;
                }
                

                if(validasi() == true) {
                    $query = "INSERT INTO siswa (nama) VALUES ('".$_POST['nama']."')";
                    $result = pg_query($connect, $query);

                    if($result){
                        echo '<div class="alert alert-success">Tambah data siswa berhasil.</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Pastikan data yang diisi sudah lengkap!.</div>';
                }
            }
        ?>

        <div class="container"> 
            <h2>Tambah Siswa</h2>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                        <label for="form_nama" class="form-label">Nama Siswa</label>
                        <input class="form-control" id="form_nama" type="text" name="nama" placeholder="Masukan Nama..." value="<?php echo (@$_POST['nama']) ? $_POST['nama']:""; ?>" require><br>
                        <input class="btn btn-success" type="submit" name="submit" value="SIMPAN">
                        <a class="btn btn-primary" href="<?php echo $base_url.'/belajar_xrpl3/tampil_siswa.php'; ?>">Kembali</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </body>
</html>