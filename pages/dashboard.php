<?php
include 'database/connection.php';
include 'database/fungsi.php';

if (isset($_SESSION['error'])) {
?>
    <div class="alert alert-danger" role="alert">
        <i class="fa fa-exclamation-circle"></i>
        <?= $_SESSION['error']; ?>
    </div>
<?php
    unset($_SESSION['error']);
}


$qry_jumlah_bagian = 'SELECT COUNT(*) as jumlah_bagian FROM bagian';
$result_qry_jumlah_bagian = mysqli_query($connection, $qry_jumlah_bagian);
$data_jumlah_bagian = mysqli_fetch_assoc($result_qry_jumlah_bagian);

$qry_jumlah_karyawan = 'SELECT COUNT(*) AS jumlah_karyawan FROM karyawan';
$result_qry_jumlah_karyawan = mysqli_query($connection, $qry_jumlah_karyawan);
$data_jumlah_karyawan = mysqli_fetch_assoc($result_qry_jumlah_karyawan);

$qry_jumlah_gaji_semua = 'SELECT SUM(gaji_bayar) AS total_gaji_semua FROM penggajian';
$result_qry_jumlah_gaji_semua = mysqli_query($connection, $qry_jumlah_gaji_semua);
$data_jumlah_gaji_semua = mysqli_fetch_assoc($result_qry_jumlah_gaji_semua);


?>

<div class="row g-3 my-2">
    <div class="col-md-12 col-lg-4">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?= $data_jumlah_bagian['jumlah_bagian'] ?></h3>
                <p class="fs-5">Bagian</p>
            </div>
            <i class="fas fa-building fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?= $data_jumlah_karyawan['jumlah_karyawan'] ?></h3>
                <p class="fs-5">Karyawan</p>
            </div>
            <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?= rupiah($data_jumlah_gaji_semua['total_gaji_semua']) ?></h3>
                <p class="fs-5">Total Gaji Dikeluarkan</p>
            </div>
            <i class="fas fa-money-bill fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
</div>