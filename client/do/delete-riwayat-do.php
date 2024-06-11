<?php
// Check if the 'id' parameter is set in the URL
if (!isset($_GET['id'])) {
    // Redirect to an error page if the 'id' parameter is missing
    header("Location: error.php?error=id_missing");
    exit();
}

// Include the configuration file
include "../config.php";

// Retrieve the ID of the record to delete from the URL parameter
$id_riwayat = $_GET['id'];

// Construct the API endpoint URL
$url = $base_url.'/riwayat?id='.$id_riwayat;

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$result = curl_exec($ch);

// Check for cURL errors
if ($result === false) {
    // Redirect to an error page if there was a cURL error
    header("Location: error.php?error=curl_error");
    exit();
}

// Decode the JSON response
$response = json_decode($result, true);

// Close cURL session
curl_close($ch);

// Check if the response is not empty and contains a status key
if (!empty($response) && isset($response["status"])) {
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
} else {
    // Invalid response format, redirect to an error page or display an error message
    header("Location: error.php?error=invalid_response");
    exit();
}

?>
