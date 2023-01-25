<?php
include "database/connection.php";
?>

<div id="top" class="row mb-3">
    <div class="col">
        <h3>Tambah Data Bagian</h3>
    </div>
    <div class="col">
        <a href="?page=bagian" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col">
        <?php
        if (isset($_POST["simpan_button"])) {
            $nama = $_POST["nama"];

            $queryCariNama = "SELECT * FROM bagian WHERE nama='$nama'";
            $resultCariNama = mysqli_query($connection, $queryCariNama);

            if (mysqli_num_rows($resultCariNama) != 0) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    Data dengan nama tersebut sudah ada
                </div>
                <?php
            } else {
                $insertSQL = "INSERT INTO bagian SET nama='$nama'";
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
                    <meta http-equiv="refresh" content="2; url=?page=bagian">
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
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Bagian</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Misal: HRD" required>
                </div>
                <div class="col mb-3">
                    <button type="submit" class="btn btn-success" name="simpan_button">
                        <i class="fa fa-save"></i>
                        Simpan
                    </button>
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