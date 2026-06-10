<?php

include 'conn.php';


$id_database = $_GET['ubah'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM stok_makanan WHERE id='$id_database'"
);

$data = mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="process.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">

        <div class="form">
            <label>Nama</label>

            <input type="text" name="nama" value="<?php echo $data['nama'] ?>">
        </div>

        <div class="form">
            <label>Harga</label>

            <input type="text" name="harga" value="<?php echo $data['harga'] ?>">
        </div>

        <button type="submit" name="update" class="btn">Update Data</button>

    </form>
</body>
</html>