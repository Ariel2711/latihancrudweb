<?php

include "koneksi.php";

if(isset($_POST["bsimpan"])){
    $simpan = mysqli_query($koneksi, "insert into siswa (nis, nama, alamat, jurusan, kelamin, tanggal) values (
        '$_POST[tnis]',
        '$_POST[tnama]',
        '$_POST[talamat]',
        '$_POST[tjurusan]',
        '$_POST[tkelamin]',
        '$_POST[ttanggal]'
        )
        ");

        if($simpan){
            echo "<script>
            alert('Simpan Data Sukses')</script>";
            header("Location: index.php");
        }else{
            echo "<script>
            alert('Simpan Data Gagal')'</script>";
            header("Location: index.php");
        }
}

if(isset($_POST["bubah"])){
    $ubah = mysqli_query($koneksi, "update siswa set
        nis = '$_POST[tnis]',
        nama = '$_POST[tnama]',
        alamat = '$_POST[talamat]',
        jurusan = '$_POST[tjurusan]',
        kelamin = '$_POST[tkelamin]',
        tanggal = '$_POST[ttanggal]'
         where id = '$_POST[tid]'
        ");

        if($ubah){
            echo "<script>
            alert('Ubah Data Sukses')</script>";
            header("Location: index.php");
        }else{
            echo "<script>
            alert('Ubah Data Gagal')'</script>";
            header("Location: index.php");
        }
}

if(isset($_POST["bhapus"])){
    $hapus = mysqli_query($koneksi, "delete from siswa
         where id = '$_POST[tid]'
        ");

        if($hapus){
            echo "<script>
            alert('Hapus Data Sukses')</script>";
            header("Location: index.php");
        }else{
            echo "<script>
            alert('Hapus Data Gagal')'</script>";
            header("Location: index.php");
        }
}