<?php

header('Content-Type: application/jsont/html; charset=utf-8');
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_whatsapp = $_POST["no_whatsapp"];
    $kode_otp = $_POST["kode_otp"];
    $status = $_POST["status"];

    $query = "UPDATE penggunas SET kode_otp = '$kode_otp', status = 'UpdateOtp' 
                WHERE no_whatsapp = '$no_whatsapp'";
    $eksekusi = mysqli_query($koneksi, $query);
    $check = mysqli_affected_rows($koneksi);

    if ($check > 0) {
        $response['kode'] = 1;
        $response["message"] = "Data Tersedia";
        $response["data"] = array();
    } else {
        $response["kode"] = 0;
        $response["message"] = "Data Tidak Tersedia";
        $response["data"] = null;
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}
