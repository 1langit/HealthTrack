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
                update_pasien($_GET["id"]);
            } else {
                insert_pasien();
            }
            break;
        case 'DELETE':
            if (!empty($_GET["id"])) {
                delete_pasien($_GET["id"]);
            }
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

    function insert_pasien() {
        global $mysqli;
        
        if (!empty($_POST)) {
            $data = $_POST;
        } else {
            $data = json_decode(file_get_contents('php://input'), true);
        }
    
        $required_fields = ['nama', 'tgl_lahir', 'jenis_kelamin', 'kontak', 'alamat'];
        if (count(array_intersect_key(array_flip($required_fields), $data)) !== count($required_fields)) {
            $response = array(
                'status' => 400,
                'message' => 'Required parameters missing.'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            return;
        }
    
        $stmt = $mysqli->prepare("INSERT INTO pasien (nama, tgl_lahir, jenis_kelamin, kontak, alamat) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $data['nama'], $data['tgl_lahir'], $data['jenis_kelamin'], $data['kontak'], $data['alamat']);
        
        if ($stmt->execute()) {
            $response = array(
                'status' => 201,
                'message' => 'Insert pasien berhasil'
            );
        } else {
            $response = array(
                'status' => 500,
                'message' => 'Insert pasien gagal: ' . $stmt->error
            );
        }
        
        $stmt->close();
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    

    function update_pasien($id_pasien) {
        global $mysqli;
    
        // Check if data is sent through POST or JSON
        if (!empty($_POST)) {
            $data = $_POST;
        } else {
            // Decode JSON data from request body
            $data = json_decode(file_get_contents('php://input'), true);
        }
    
        // Check if the pasien exists
        $result = $mysqli->query("SELECT * FROM pasien WHERE id_pasien='$id_pasien'");
        if ($result->num_rows === 0) {
            $response = array(
                'status' => 404,
                'message' => 'ID pasien tidak ditemukan'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            return;
        }
    
        // Check for required fields
        $required_fields = ['nama', 'tgl_lahir', 'jenis_kelamin', 'kontak', 'alamat'];
        if (count(array_intersect_key(array_flip($required_fields), $data)) !== count($required_fields)) {
            $response = array(
                'status' => 400,
                'message' => 'Data tidak lengkap'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            return;
        }
    
        // Prepare and execute the query
        $stmt = $mysqli->prepare("UPDATE pasien SET nama = ?, tgl_lahir = ?, jenis_kelamin = ?, kontak = ?, alamat = ? WHERE id_pasien = ?");
        $stmt->bind_param("sssssi", $data['nama'], $data['tgl_lahir'], $data['jenis_kelamin'], $data['kontak'], $data['alamat'], $id_pasien);
    
        if ($stmt->execute()) {
            $response = array(
                'status' => 200,
                'message' => 'Update pasien berhasil'
            );
        } else {
            $response = array(
                'status' => 500,
                'message' => 'Update pasien gagal: ' . $stmt->error
            );
        }
        $stmt->close();
    
        // Send response
        header('Content-Type: application/json');
        echo json_encode($response);
    }           

    function delete_pasien($id_pasien) {
        global $mysqli;
    
        $result = $mysqli->query("SELECT * FROM pasien WHERE id_pasien='$id_pasien'");
        if ($result->num_rows === 0) {
            $response = array(
                'status' => 404,
                'message' => 'ID pasien tidak ditemukan'
            );
        } else {
            $stmt = $mysqli->prepare("DELETE FROM pasien WHERE id_pasien = ?");
            if ($stmt === false) {
                $response = array(
                    'status' => 500,
                    'message' => 'Prepare statement failed: ' . $mysqli->error
                );
            } else {
                $stmt->bind_param("i", $id_pasien);
    
                if ($stmt->execute()) {
                    $response = array(
                        'status' => 200,
                        'message' => 'Delete pasien berhasil'
                    );
                } else {
                    $response = array(
                        'status' => 500,
                        'message' => 'Delete pasien gagal: ' . $stmt->error
                    );
                }
    
                $stmt->close();
            }
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
?>
