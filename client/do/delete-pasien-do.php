<?php
include "../config.php";

// Retrieve pasien ID from the URL parameter
$id_pasien = $_GET['id'];

// Set the API endpoint URL
$url = $base_url.'/pasien?id='.$id_pasien;

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$result = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Decode the JSON response
$response = json_decode($result, true);

// Check if deletion was successful
if ($response["status"] == 200) {
    // Deletion successful, redirect to a success page or display a success message
    header("Location: ../index.php");
    exit();
} else {
    // Deletion failed, redirect to an error page or display an error message
    header("Location: error.php?error=deletion_failed");
    exit();
}
?>
