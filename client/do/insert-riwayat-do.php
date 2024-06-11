<?php
include "../config.php";

if (isset($_POST['submit'])) {
    // Collect form data
    $id_pasien = $_POST['id_pasien'];
    $id_dokter = $_POST['id_dokter'];
    $tanggal_pemeriksaan = $_POST['tanggal_pemeriksaan'];
    $diagnosis = $_POST['diagnosis'];
    $tindakan = $_POST['tindakan'];
    $obat = $_POST['obat'];
    $catatan = $_POST['catatan'];

    // Set the API endpoint URL
    $url = $base_url."/riwayat";

    // Initialize cURL session
    $ch = curl_init($url);

    // Prepare data array for JSON encoding
    $data = array(
        'id_pasien' => $id_pasien,
        'id_dokter' => $id_dokter,
        'tanggal_pemeriksaan' => $tanggal_pemeriksaan,
        'diagnosis' => $diagnosis,
        'tindakan' => $tindakan,
        'obat_yang_diresepkan' => $obat,
        'catatan' => $catatan
    );

    // Encode data to JSON format
    $jsonData = json_encode($data);
    
    // Print JSON data for debugging
    echo "JSON Data: <pre>" . $jsonData . "</pre>";

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData))
    );

    // Execute cURL request
    $result = curl_exec($ch);

    // Check for errors
    if ($result === false) {
        echo 'Curl error: ' . curl_error($ch);
        exit();
    }

    // Close cURL session
    curl_close($ch);

    // Decode the JSON response
    $response = json_decode($result, true);

    // Check if decoding was successful
    if ($response === null) {
        echo 'Error decoding JSON: ' . json_last_error_msg();
        exit();
    }

    // Redirect based on status
    if ($response["status"] == 201) {
        // Success, redirect to the view page
        header("Location: ../index.php");
        exit();
    } else {
        // Error, redirect to the error page
        header("Location: ../errorPage.php?error=api_error");
        exit();
    }
}
?>