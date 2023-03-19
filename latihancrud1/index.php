<?php

include "koneksi.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h2 class="text-center mt-3">CRUD PHP dan MYSQL</h2>
        <div class="card mt-3">
        <div class="card-header bg-primary">
            <h3 class="text-light">Data Siswa</h3>
        </div>
        <div class="card-body">
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
                    Tambah Data
                    </button>
                                <form action="" method="POST">
                                <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="tcari" value="<?= @$_POST['tcari']?>">
                                        <button class="btn btn-outline-secondary" type="submit" name="bcari">Cari</button>
                                        <button class="btn btn-outline-secondary" type="submit" name="breset">Reset</button>
                                        </div>
                                </form>     
            <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>No.</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
     
            if(isset($_POST["bcari"])){
                $key = $_POST["tcari"];
                $q = "select * from siswa where nama like '%$key%'";
            }else if(isset($_POST["breset"])){
                $q = "select * from siswa";

            }else{
                $q = "select * from siswa";
            }

            $tampil = mysqli_query($koneksi, $q);
            while($data = mysqli_fetch_array($tampil)) :
            ?>

      <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['nis'] ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['alamat'] ?></td>
        <td><?= $data['jurusan'] ?></td>
        <td><?= $data['kelamin'] ?></td>
        <td><?= $data['tanggal'] ?></td>
        <td>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ubahData<?=$no?>">
                    Ubah
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusData<?=$no?>">
                    Hapus
                    </button>
        </td>
      </tr>

      <div class="modal fade" id="ubahData<?=$no?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data Siswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="crud.php" method="POST">
                            <div class="modal-body">
                            <input type="hidden" class="form-control" placeholder="Masukkan NIS" name="tid" value="<?= $data['id'] ?>">
                                    <div class="mb-3">
                                        <label class="form-label">NIS</label>
                                        <input type="text" class="form-control" placeholder="Masukkan NIS" name="tnis" value="<?= $data['nis'] ?>">
                                    </div>
                                        <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="tnama" value="<?= $data['nama'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" rows="3" name="talamat"><?= $data['alamat'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jurusan</label>
                                        <select name="tjurusan" class="form-select">
                                            <option value="<?= $data['jurusan'] ?>"><?= $data['jurusan'] ?></option>
                                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                            <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                        </select>
                                    </div>
                                    <label class="form-label">Jenis Kelamin</label>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="tkelamin" value="Laki-laki" id="flexRadioDefault1" <?php if ($data["kelamin"] == 'Laki-laki') echo 'checked="checked"'; ?>" >
                                        <label class="form-check-label" for="flexRadioDefault1">
                                           Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="tkelamin" value="Perempuan" id="flexRadioDefault2" <?php if ($data["kelamin"] == 'Perempuan') echo 'checked="checked"'; ?>" >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                        Perempuan
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <div class="input-group date">
                                            <input type="date" class="form-control" name="ttanggal" value="<?= $data['tanggal'] ?>">
                                            <!-- <span class="input-group-text bg-light d-block"> -->
                                                <i class="bi bi-calendar"></i>
                                            <!-- </span> -->
                                        </div>
                                    </div>
                                    
                                
                            </div>
                            <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                            
                                    </div>
                            </form>
                    
                    </div>
                </div>
            </div>

            <div class="modal fade" id="hapusData<?=$no?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data Siswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="crud.php" method="POST">
                            <div class="modal-body">
                            <input type="hidden" class="form-control" placeholder="Masukkan NIS" name="tid" value="<?= $data['id'] ?>">
                            <h4 class="text-center">Apakah anda yakin ingin menghapus data ini?<br>
                            <span class="text-danger"><?= $data['nis']?> - <?= $data['nama']?></span>
            </h4>
                                    
                                   
                                
                            </div>
                            <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger" name="bhapus">Hapus</button>
                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Batal</button>
                                            
                                    </div>
                            </form>
                    
                    </div>
                </div>
            </div>

      <?php endwhile; ?>
    </table>
            

            <!-- Modal -->
            <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Siswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="crud.php" method="POST">
                            <div class="modal-body">
                                
                                    <div class="mb-3">
                                        <label class="form-label">NIS</label>
                                        <input type="text" class="form-control" placeholder="Masukkan NIS" name="tnis">
                                    </div>
                                        <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="tnama">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" rows="3" name="talamat"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jurusan</label>
                                        <select name="tjurusan" class="form-select">
                                            <option value=""></option>
                                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                            <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                        </select>
                                    </div>
                                    <label class="form-label">Jenis Kelamin</label>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="tkelamin" value="Laki-laki" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                           Laki-laki
                                        </label>
                                    </div>
                                        <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="tkelamin" value="Perempuan" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                        Perempuan
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <div class="input-group date">
                                            <input type="date" class="form-control" name="ttanggal">
                                            <!-- <span class="input-group-text bg-light d-block"> -->
                                                <i class="bi bi-calendar"></i>
                                            <!-- </span> -->
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                    </div>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>