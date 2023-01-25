<?php
include "database/connection.php";
?>

<div id="top" class="row mb-3">
    <div class="col">
        <h3>Tambah Data Karyawan</h3>
    </div>
    <div class="col">
        <a href="?page=karyawan" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col">
        <?php
        if (isset($_POST["simpan_button"])) {
            $nik = $_POST["nik"];
            $nama = $_POST["nama"];
            $tanggal_mulai = $_POST["tanggal_mulai"];
            $gaji_pokok = $_POST["gaji_pokok"];
            $status_karyawan = $_POST["status_karyawan"];
            $bagian_id = $_POST["bagian_id"];

            $sudahAda = false;
            $checkSQL = "SELECT * FROM karyawan WHERE nik='$nik'";
            $resultCheck = mysqli_query($connection, $checkSQL);
            if (mysqli_num_rows($resultCheck) > 0) {
                $sudahAda = true;
            }

            if ($sudahAda) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    Nomor Induk Karyawan (NIK) sama sudah ada
                </div>
                <?php
            } else {
                $insertSQL = "INSERT INTO karyawan SET nik='$nik', nama='$nama', tanggal_mulai='$tanggal_mulai', gaji_pokok=$gaji_pokok, status_karyawan='$status_karyawan', bagian_id=$bagian_id";
                $result = mysqli_query($connection, $insertSQL);
                if (!$result) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-exclamation-circle"></i>
                        <?php echo mysqli_error($connection); ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-check-circle"></i>
                        Data berhasil disimpan
                    </div>
                    <meta http-equiv="refresh" content="2; url=?page=karyawan">
        <?php
                }
            }
        }
        ?>
    </div>
</div>
<div id="inputan" class="row mb-3">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
                <div class="mb-3 mt-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Misal: 0001" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Misal: Fulan" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai Bekerja</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" required>
                </div>
                <label class="form-label">Status Karyawan</label>
                <div class="mb-3 mt-3">
                    <input type="radio" class="form-check-input" id="TETAP" name="status_karyawan" value="TETAP" required>
                    <label for="TETAP" class="form-check-label">Tetap</label>
                </div>
                <div class="mb-3 mt-3">
                    <input type="radio" class="form-check-input" id="KONTRAK" name="status_karyawan" value="KONTRAK" required>
                    <label for="KONTRAK" class="form-check-label">Kontrak</label>
                </div>
                <div class="mb-3 mt-3">
                    <input type="radio" class="form-check-input" id="MAGANG" name="status_karyawan" value="MAGANG" required>
                    <label for="MAGANG" class="form-check-label">Magang</label>
                </div>
                <div class="col mb-3 mt-3">
                    <label for="bagian_id" class="form-label">Bagian</label>
                    <?php
                    $selectSQL = "SELECT * FROM bagian";
                    $result = mysqli_query($connection, $selectSQL);

                    if (!$result) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-exclamation-circle"></i>
                            <?php echo mysqli_error($connection); ?>
                        </div>
                    <?php
                        return;
                    }
                    ?>
                    <select name="bagian_id" id="bagian_id" class="form-select">
                        <option value="" selected> -- Pilih Bagian -- </option>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?= $row["id"] ?>"><?= $row["nama"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="col mb-3 mt-3">
                        <button type="submit" class="btn btn-success" name="simpan_button">
                            <i class="fa fa-save"></i>
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>