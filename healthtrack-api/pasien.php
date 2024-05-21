<?php
    require_once "config.php";
    $request_method = $_SERVER["REQUEST_METHOD"];

    switch ($request_method) {
        case 'GET':
            if (!empty($_GET["id"])) {
                // get_pasien($_GET["id"]);
            } else {
                // get_all_pasien();
            }
            break;
        case 'POST':
            if (!empty($_GET["id"])) {
                // update_pasien($_GET["id"]);
            } else {
                // insert_pasien();
            }
            break;
        case 'DELETE':
            // delete_pasien($_GET["id"]);
            break;
        default:
            header("HTTP/1.0 405 Method Not Allowed");
            break;
    }


?>