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

        $nama = $_POST["nama"];
        $tgl_lahir = $_POST["tgl_lahir"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $kontak = $_POST["kontak"];
        $alamat = $_POST["alamat"];

        if (empty($nama) || empty($tgl_lahir) || empty($jenis_kelamin) || empty($kontak) || empty($alamat)) {
            $response = array(
                'status' => 400,
                'message' => 'Data tidak lengkap'
            );
        } else {
            $stmt = $mysqli->prepare("INSERT INTO pasien (nama, tgl_lahir, jenis_kelamin, kontak, alamat) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nama, $tgl_lahir, $jenis_kelamin, $kontak, $alamat);

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
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function update_pasien($id) {
        global $mysqli;

        $nama = $_POST["nama"];
        $tgl_lahir = $_POST["tgl_lahir"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $kontak = $_POST["kontak"];
        $alamat = $_POST["alamat"];

        if (empty($nama) || empty($tgl_lahir) || empty($jenis_kelamin) || empty($kontak) || empty($alamat)) {
            $response = array(
                'status' => 400,
                'message' => 'Data tidak lengkap'
            );
        } else {
            $stmt = $mysqli->prepare("UPDATE pasien SET nama = ?, tgl_lahir = ?, jenis_kelamin = ?, kontak = ?, alamat = ? WHERE id_pasien = ?");
            $stmt->bind_param("sssssi", $nama, $tgl_lahir, $jenis_kelamin, $kontak, $alamat, $id);

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
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function delete_pasien($id) {
        global $mysqli;

        $stmt = $mysqli->prepare("DELETE FROM pasien WHERE id_pasien = ?");
        $stmt->bind_param("i", $id);

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
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
?>