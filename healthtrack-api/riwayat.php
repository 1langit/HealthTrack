<?php
    require_once "config.php";
    $request_method = $_SERVER["REQUEST_METHOD"];

    switch ($request_method) {
        case 'GET':
            if (!empty($_GET["id"])) {
                // get_riwayat($_GET["id"]);
            } else {
                // get_all_riwayat();
            }
            break;
        case 'POST':
            if (!empty($_GET["id"])) {
                // update_riwayat($_GET["id"]);
            } else {
                // insert_riwayat();
            }
            break;
        case 'DELETE':
            // delete_riwayat($_GET["id"]);
            break;
        default:
            header("HTTP/1.0 405 Method Not Allowed");
            break;
    }

    
?>