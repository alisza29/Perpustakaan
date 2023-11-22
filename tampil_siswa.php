<?php
include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <h3>Data Siswa</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>NAMA SISWA</th><th>TANGGAL LAHIR</th>
                <th>ALAMAT</th><th>GENDER</th>
                <th>USERNAME</th><th>KELAS</th><th>AKSI</th>
            </tr>
</thead>
<tbody>
    <?php
    include "koneksi.php";
    $qry_siswa = mysqli_query($conn,"SELECT siswa.*, kelas.nama_kelas from siswa join kelas on kelas.id_kelas = siswa.id_kelas");

    $no=0;

    while($dt_siswa = mysqli_fetch_array($qry_siswa)){
    $no++;?>
    <tr>              
    <td><?=$no?></td>
    <td><?=$dt_siswa['nama_siswa']?></td> 
    <td><?=$dt_siswa['tanggal_lahir']?></td> 
    <td><?=$dt_siswa['alamat']?></td>
    <td><?=$dt_siswa['gender']?></td> 
    <td><?=$dt_siswa['username']?></td> 
    <td><?=$dt_siswa['nama_kelas']?></td> 
    <td><a href="ubah_siswa.php?id_siswa=<?=$dt_siswa['id_siswa']?>" class="btn btn-success">Ubah</a> | 
    <a href="hapus.php?id_siswa=<?=$dt_siswa['id_siswa']?>" onclick="return 
    confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
    </tr>
    <?php 
    }
    ?>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<a href="tambah_siswa.php"><input type="button" name='' value="Add Siswa" class="btn btn-danger"></a>
</body>
</html>