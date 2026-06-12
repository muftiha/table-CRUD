<?php
include 'pagination.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../backend.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Pembuatan CRUD</title>
</head>
<body>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#607456" fill-opacity="1" d="M0,128L26.7,154.7C53.3,181,107,235,160,224C213.3,213,
        267,139,320,117.3C373.3,96,427,128,480,128C533.3,128,587,96,640,85.3C693.3,75,747,85,800,
        106.7C853.3,128,907,160,960,165.3C1013.3,171,1067,149,1120,133.3C1173.3,117,1227,107,1280,112C1333.3,
        117,1387,139,1413,149.3L1440,160L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7
        ,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,
       D 0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path>
    </svg>

    <div class="container bg-white p-4 rounded shadow"
     style="width: 1999px; height: 560px; margin-bottom: 20px">

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">

            <div>
                <h1>Famira Cafe</h1>

                <figure>
                    <blockquote class="blockquote">
                        <p>Cafe Management System</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        <cite title="Source Title">Developed by Famira</cite>
                    </figcaption>
                </figure>
            </div>

    <form method="GET" class="d-flex gap-2" style="max-width: 350px;">
        <input
            type="text"
            name="cari"
            class="form-control"
            placeholder="Cari nama"
            value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">

        <button type="submit" class="btn btn-success text-nowrap" style=" height: 40px">
            Cari
        </button>

        <a href="table.php" class="btn btn-secondary text-nowrap" style=" height: 40px"> Refresh <i class="bi bi-arrow-clockwise"></i> </a>
    </form>

        </div>

        <a href="kelola.php" class="btn btn-success btn-lg mb-3">
            <i class="bi bi-bookmark-plus"></i> Tambah Data
        </a>

        <div class="table-responsive">
            <table class="table table-hover align-middle shadow">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $no = $halaman_awal + 1;
                while($data = mysqli_fetch_array($query_data)){
                ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $no++; ?>
                        </td>

                        <td class="text-center">
                            <?php echo $data['nama']; ?>
                        </td>

                        <td>
                            Rp <?php echo $data['harga']; ?>
                        </td>

                        <td class="text-center">
                            <a href="kelola.php?ubah=<?php echo $data['id']; ?>" class="btn btn-success btn-sm">
                                <i class="bi bi-pencil-square"></i> Ubah
                            </a>

                            <a href="process.php?hapus=<?php echo $data['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                <i class="bi bi-trash3"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>

                </tbody>
            </table>
        </div>

        <div class="pagination gap-1 my-3">
            <?php
            for($i = 1; $i <= $total_halaman; $i++) {
            ?>
                <a class="btn btn-outline-success"
                   href="table.php?halaman=<?php echo $i; ?>&cari=<?php echo $cari; ?>">
                    <?php echo $i; ?>
                </a>
            <?php
            }
            ?>
        </div>

        <button type="button" class="btn btn-success mb-5">
            <i class="bi bi-box-arrow-left"></i> Logout
        </button>

    </div>

</body>
</html>