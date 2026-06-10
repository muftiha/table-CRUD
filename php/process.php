<?php

include 'conn.php';

if(isset($_POST['simpan'])){

$id_database  =$_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];

    $query = mysqli_query(
        $conn, "INSERT INTO stok_makanan (nama,harga) VALUES ('$nama','$harga')"
    );

    if($query){
        header("Location: table.php");
    }else{
        echo "data gagal disimpan";
    }

    }   

    //update

    elseif(isset($_POST['update'])){
        $id_database = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];

        $query = mysqli_query(
            $conn, "UPDATE stok_makanan SET nama='$nama', harga='$harga' WHERE id='$id_database';"
        );

        //cek

      if($query){
            header("Location: table.php");
        }else{
            echo "data gagal diupdate";
            }

            
        
    }


    elseif(isset($_GET['hapus'])){

         $id_database = $_GET['hapus'];
    
            $query = mysqli_query(
                $conn, "DELETE FROM stok_makanan WHERE id=$id_database"
            );
            
            //cek
            if($query){
                header("Location: table.php");
            }else{
                echo "data gagal dihapus";
            }
            }



?>



 