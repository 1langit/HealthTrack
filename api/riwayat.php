<?php
    require_once "config.php";
    $request_method = $_SERVER["REQUEST_METHOD"];

    switch ($request_method) {
        case 'GET':
            if (!empty($_GET["id"])) {
                get_riwayat($_GET["id"]);
            } else if (!empty($_GET["id_pasien"])) {
                get_riwayat_by_pasien_id($_GET["id_pasien"]);
            } else {
                get_all_riwayat();
            }
            break;
        case 'POST':
            if (!empty($_GET["id"])) {
                update_riwayat($_GET["id"]);
            } else {
                insert_riwayat();
            }
            break;
        case 'DELETE':
            delete_riwayat($_GET["id"]);
            break;
        default:
            header("HTTP/1.0 405 Method Not Allowed");
            break;
    }

    function get_all_riwayat() {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM riwayat_pemeriksaan");
        $data = array();
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 200,
            'message' => 'Get riwayat berhasil',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function get_riwayat($id_riwayat) {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM riwayat_pemeriksaan WHERE id_riwayat = ?");
        $stmt->bind_param("i", $id_riwayat);
        $stmt->execute();
    
        $result = $stmt->get_result();
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
                'message' => 'Get riwayat berhasil',
                'data' => $data
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function get_riwayat_by_pasien_id($id_pasien) {
        global $mysqli;
    
        $stmt = $mysqli->prepare("SELECT * FROM riwayat_pemeriksaan WHERE id_pasien = ?");
        $stmt->bind_param("i", $id_pasien);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        if ($result->num_rows === 0) {
            $response = array(
                'status' => 404,
                'message' => 'Riwayat pemeriksaan tidak ditemukan untuk pasien dengan ID: '.$id_pasien
            );
        } else {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
    
            $response = array(
                'status' => 200,
                'message' => 'Berhasil mendapatkan riwayat pemeriksaan untuk pasien dengan ID: '.$id_pasien,
                'data' => $data
            );
        }
    
        $stmt->close();
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }    

    function insert_riwayat() {
        global $mysqli;
    
        if (!empty($_POST)) {
            $data = $_POST;
        } else {
            $data = json_decode(file_get_contents('php://input'), true);
        }
    
        $required_fields = ['id_pasien', 'id_dokter', 'tanggal_pemeriksaan', 'diagnosis', 'tindakan', 'obat_yang_diresepkan', 'catatan'];
    
        $missing_fields = array_diff_key(array_flip($required_fields), $data);
    
        if (count($missing_fields) > 0) {
            $response = array(
                'status' => 400,
                'message' => 'Data tidak lengkap'
            );
        } else {
            $stmt = $mysqli->prepare("INSERT INTO riwayat_pemeriksaan (id_pasien, id_dokter, Tanggal_Pemeriksaan, Diagnosis, Tindakan, Obat_yang_Diresepkan, Catatan) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
            if ($stmt === false) {
                $response = array(
                    'status' => 500,
                    'message' => 'Prepare statement failed: ' . $mysqli->error
                );
            } else { 
                $stmt->bind_param("iisssss", $data['id_pasien'], $data['id_dokter'], $data['tanggal_pemeriksaan'], $data['diagnosis'], $data['tindakan'], $data['obat_yang_diresepkan'], $data['catatan']);
    
                if ($stmt->execute()) {
                    $response = array(
                        'status' => 201,
                        'message' => 'Insert riwayat berhasil'
                    );
                } else {
                    $response = array(
                        'status' => 500,
                        'message' => 'Insert riwayat gagal: ' . $stmt->error
                    );
                }
    
                $stmt->close();
            }
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    function update_riwayat($id_riwayat) {
        global $mysqli;
    
        if (!empty($_POST)) {
            $data = $_POST;
        } else {
            $data = json_decode(file_get_contents('php://input'), true);
        }
    
        $required_fields = ['tanggal_pemeriksaan', 'diagnosis', 'tindakan', 'obat_yang_diresepkan', 'catatan'];
    
        $missing_fields = array_diff_key(array_flip($required_fields), $data);
    
        if (count($missing_fields) > 0) {
            $response = array(
                'status' => 400,
                'message' => 'Data tidak lengkap'
            );
        } else {
            $result = $mysqli->query("SELECT * FROM riwayat_pemeriksaan WHERE id_riwayat='$id_riwayat'");
            if ($result->num_rows === 0) {
                $response = array(
                    'status' => 404,
                    'message' => 'ID riwayat tidak ditemukan'
                );
            } else {
                $updateQuery = "UPDATE riwayat_pemeriksaan SET Tanggal_Pemeriksaan=?, Diagnosis=?, Tindakan=?, Obat_yang_Diresepkan=?, Catatan=? WHERE id_riwayat=?";
                $stmt = $mysqli->prepare($updateQuery);
    
                if ($stmt === false) {
                    $response = array(
                        'status' => 500,
                        'message' => 'Prepare statement failed: ' . $mysqli->error
                    );
                } else {
                    $stmt->bind_param("sssssi", $data['tanggal_pemeriksaan'], $data['diagnosis'], $data['tindakan'], $data['obat_yang_diresepkan'], $data['catatan'], $id_riwayat);
    
                    if ($stmt->execute()) {
                        $response = array(
                            'status' => 200,
                            'message' => 'Update riwayat berhasil'
                        );
                    } else {
                        $response = array(
                            'status' => 500,
                            'message' => 'Update riwayat gagal: ' . $stmt->error
                        );
                    }
    
                    $stmt->close();
                }
            }
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }    

    function delete_riwayat($id_riwayat) {
        global $mysqli;
    
        $result = $mysqli->query("SELECT * FROM riwayat_pemeriksaan WHERE id_riwayat='$id_riwayat'");
        if ($result->num_rows === 0) {
            $response = array(
                'status' => 404,
                'message' => 'ID riwayat tidak ditemukan'
            );
        } else {
            $stmt = $mysqli->prepare("DELETE FROM riwayat_pemeriksaan WHERE id_riwayat = ?");
            if ($stmt === false) {
                $response = array(
                    'status' => 500,
                    'message' => 'Prepare statement failed: ' . $mysqli->error
                );
            } else {
                $stmt->bind_param("i", $id_riwayat);
    
                if ($stmt->execute()) {
                    $response = array(
                        'status' => 200,
                        'message' => 'Delete riwayat berhasil'
                    );
                } else {
                    $response = array(
                        'status' => 500,
                        'message' => 'Delete riwayat gagal: ' . $stmt->error
                    );
                }
    
                $stmt->close();
            }
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
?>