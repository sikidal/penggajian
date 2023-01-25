<?php
include "database/connection.php";
?>

<div class="row">
    <div class="col">
        <h3>Bagian</h3>
    </div>
    <div class="col">
        <a href="?page=bagiantambah" class="btn btn-success float-end">
            <i class="fa fa-plus-circle"></i>
            Tambah
        </a>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <?php
        $selectSQL = "SELECT * FROM bagian";
        $result = mysqli_query($connection, $selectSQL);

        if (!$result) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo mysqli_error($connection) ?>
            </div>

        <?php
            return;
        }

        if (mysqli_num_rows($result) == 0) {
        ?>
            <div class="alert alert-light" role="alert">
                Data kosong
            </div>
        <?php
            return;
        }
        ?>

        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Bagian</th>
                    <th scope="col" width="200">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="align-middle">
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $row['nama'] ?></td>
                        <td>
                            <a href="?page=bagianubah&id=<?= $row["id"] ?>" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                                Ubah
                            </a>
                            <a href="?page=bagianhapus&id=<?= $row["id"] ?>" onclick="javascript: return confirm('Konfirmasi data akan dihapus?');" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>