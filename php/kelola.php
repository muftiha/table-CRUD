<?php

include 'conn.php';

$id_database ='';
$nama = '';
$harga = '';

if(isset($_GET['ubah'])){
    $id_diambil = $_GET['ubah'];

    $query = "SELECT * FROM stok_makanan WHERE id = '$id_diambil';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);
    $id_database = $result['id'];
    $nama = $result['nama']; 
    $harga = $result['harga']; 
}
    

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../backend.css">
    <title>Document</title>
</head>
<body>


    <nav class="navbar bg-body-tertiary mb-4">

    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="#"> 
            ☕ FAMIRA CAFE ADMIN
        </a>

    </div>

    </nav>

    <div class="container bg-white p-4 rounded shadow" style="margin-top: 80px; width:800px; margin-bottom:155px">

    <h2 class="mb-4">
        🍜 Kelola Menu Cafe
    </h2>

    <form method="POST" action="process.php">

    <input type="hidden" value="<?php echo $id_database; ?>" name="id" >

    <div class="mb-3 row">
        <label for="no" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
        <input required type="text" name="nama" id="nama"  class="form-control" value = "<?php echo $nama; ?>">
            </div>
    </div>

    <div class="mb-3 row">
        <label for="no" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
        <input required type="text" id="harga" name="harga" class="form-control"value = "<?php echo $harga; ?>">
            </div>
    </div>

    <!-- aksi -->

     <div class="mb-3 row mt-5">

        <div class="col">

            <?php

                if(isset($_GET['ubah'])){

            ?>

    <button type="submit" name="update" value="edit" class="btn btn-success">
        <i class="bi bi-envelope-plus"></i>Simpan Perubahan</button>

            <?php

                }else{

            ?>

    <button type="submit" name="simpan" value="add" class="btn btn-outline-success">Tambahkan</button>

            <?php

                }

            ?>

            <a href="table.php" class="btn btn-danger">Batal</a>


    </div>
</body>
</html>