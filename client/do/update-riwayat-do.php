<?php
// Include the configuration file
include "../config.php";

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Collect form data
    $id_riwayat = $_POST['id_riwayat'];
    $tanggal_pemeriksaan = $_POST['tanggal_pemeriksaan'];
    $diagnosis = $_POST['diagnosis'];
    $tindakan = $_POST['tindakan'];
    $obat = $_POST['obat'];
    $catatan = $_POST['catatan'];

    // Set the API endpoint URL
    $url = $base_url."/riwayat?id=".$id_riwayat;

    // Initialize cURL session
    $ch = curl_init($url);

    // Prepare data array for JSON encoding
    $data = array(
        'tanggal_pemeriksaan' => $tanggal_pemeriksaan,
        'diagnosis' => $diagnosis,
        'tindakan' => $tindakan,
        'obat_yang_diresepkan' => $obat,
        'catatan' => $catatan
    );

    // Encode data to JSON format
    $jsonData = json_encode($data);

    // Debugging - Print JSON data
    echo "JSON Data: <pre>" . $jsonData . "</pre>";

    // Set cURL options for PUT request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData))
    );

    // Execute cURL request
    $result = curl_exec($ch);

    // Check for cURL errors
    if ($result === false) {
        echo 'Curl error: ' . curl_error($ch);
        exit();
    }

    // Debugging - Print API response
    echo "API Response: <pre>" . $result . "</pre>";

    // Close cURL session
    curl_close($ch);

    // Decode the JSON response
    $response = json_decode($result, true);

    // Check if decoding was successful
    if ($response === null) {
        echo 'Error decoding JSON: ' . json_last_error_msg();
        exit();
    }

    // Print status and message
    echo "Status: " . $response["status"] . "<br>";
    echo "Message: " . $response["message"] . "<br>";

    // Redirect based on status
    if ($response["status"] == 200) {
        // Success, redirect to the view page
        header("Location: ../index.php");
        exit();
    } else {
        // Error, redirect to the error page
        header("Location: errorPage.php?error=api_error");
        exit();
    }
} else {
    // If form was not submitted, redirect to an error page
    header("Location: errorPage.php?error=form_not_submitted");
    exit();
}
?>
