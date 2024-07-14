<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Anggota</title>
    <link rel="stylesheet" href="path/to/bootstrap.css"> <!-- Tambahkan path ke file CSS Bootstrap -->
</head>

<body>
    <nav>
        <div>
            <span></span>
        </div>
    </nav>

    <div class="container">
        <br>
        <h4>
            <center>DAFTAR ANGGOTA HIMATIKA</center>
        </h4>

        <?php 
        include "koneksi.php";

        //Cek apakah ada kiriman form dari method GET
        if (isset($_GET['id_anggota'])){
            $id_anggota = htmlspecialchars($_GET['id_anggota']);

            $sql = "DELETE FROM anggota WHERE id_anggota='$id_anggota'";
            $hasil = mysqli_query($kon, $sql);

            //kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location: index.php");
            } else {
                echo "<div class='alert alert-danger'>Data Gagal dihapus.</div>";
            }
        }
        ?>

        <table class="my-3 table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Posisi Jabatan</th>
                    <th>Tanggal Bergabung</th>
                    <th>Status Keanggotaan</th>
                    <th>Foto Profil</th>
                    <th>Departemen Divisi</th>
                    <th>Catatan Tambahan</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $sql = "SELECT * FROM anggota ORDER BY id_anggota DESC";
                $hasil = mysqli_query($kon, $sql);
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo htmlspecialchars($data["nama_lengkap"]); ?></td>
                    <td><?php echo htmlspecialchars($data["alamat"]); ?></td>
                    <td><?php echo htmlspecialchars($data["tanggal_lahir"]); ?></td>
                    <td><?php echo htmlspecialchars($data["jenis_kelamin"]); ?></td>
                    <td><?php echo htmlspecialchars($data["email"]); ?></td>
                    <td><?php echo htmlspecialchars($data["no_telepon"]); ?></td>
                    <td><?php echo htmlspecialchars($data["posisi_jabatan"]); ?></td>
                    <td><?php echo htmlspecialchars($data["tanggal_bergabung"]); ?></td>
                    <td><?php echo htmlspecialchars($data["status_keanggotaan"]); ?></td>
                    <td><?php echo htmlspecialchars($data["foto_profil"]); ?></td>
                    <td><?php echo htmlspecialchars($data["departemen_divisi"]); ?></td>
                    <td><?php echo htmlspecialchars($data["catatan_tambahan"]); ?></td>
                    <td>
                        <a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>">Update</a>
                        <a
                            href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>">Delete</a>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>

    <script src="path/to/bootstrap.js"></script> <!-- Tambahkan path ke file JS Bootstrap -->
</body>

</html>