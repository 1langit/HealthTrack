<?php
    require_once "config.php";
    $request_method = $_SERVER["REQUEST_METHOD"];

    switch ($request_method) {
        case 'GET':
            if (!empty($_GET["id"])) {
                get_pasien($_GET["id"]);
            } else {
                get_all_pasien();
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

    function get_all_pasien() {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM pasien");
        $data = array();
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 200,
            'message' => 'Get pasien berhasil',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function get_pasien($id) {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM pasien WHERE id_pasien='$id'");
        if ($result->num_rows === 0) {
            $response = array(
                'status' => 404,
                'message' => 'Data tidak ditemukan'
            );
        } else {
            $data = array();
            while ($row = mysqli_fetch_object($result)) {
                $data[] = $row;
            }
            $response = array(
                'status' => 200,
                'message' => 'Get pasien berhasil',
                'data' => $data
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    
?>