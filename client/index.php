<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/svg" href="assets/icon.svg">
    <title>HealthTrack</title>
</head>
<body>
    <div class="navbar">
        <a href="index.php"><img src="assets/logo.svg" alt="logo image"></a>
        <div class="d-flex column gap-3 align-items-center hover-container">
            <img src="assets/profil_doctor.svg" width="40px" height="40px" alt="doctor">
            <div class="d-inline-flex flex-column gap-1">
                <span class="body-semibold">Dr. Budi Santoso</span>
                <span class="gray body">Kardiologi</span>
            </div>
            <div class="logout-menu">
                <span class="body">Logout</span>
            </div>
        </div>
    </div>

    <div class="container bg-white daftar-pasien mt-4">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h1>Daftar Pasien</h1>
            <input type="text" class="search-input" placeholder="Cari">
            <a href="tambah-pasien.php" class="button-primary">Tambah Pasien</a>
        </div>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Tanggal</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    include "config.php";
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_URL, $base_url."/pasien.php");
                    $json = json_decode(curl_exec($curl), true);

                    for ($i = 0; $i < count($json["data"]); $i++) {
                        echo "<tr>";
                            echo "<td scope='row'>{$json['data'][$i]['id_pasien']}</td>";
                            echo "<td>";
                                echo "<img src='assets/".($json['data'][$i]['jenis_kelamin'] == 'Laki-laki' ? 'male' : 'female').".png' class='me-3' alt='profil'>";
                                echo "<a href='detail-pasien.php?id=".$json['data'][$i]['id_pasien']."' class='body-semibold'>{$json['data'][$i]['nama']}</a>";
                            echo "</td>";
                            echo "<td>{$json['data'][$i]['jenis_kelamin']}</td>";
                            echo "<td>{$json['data'][$i]['tgl_lahir']}</td>";
                            echo "<td>{$json['data'][$i]['kontak']}</td>";
                            echo "<td class='text-truncate'>{$json['data'][$i]['alamat']}</td>";
                        echo "</tr>";
                    }
                ?>
                <!-- 
                <tr>
                    <td scope="row">1</td>
                    <td>
                        <!-- Pake percabangan, if gender = laki-laki -> img = male.png. Else -> female.png
                        <img src="assets/male.png" class="me-3" alt="profil">
                        <a href="detail_pasien.php" class="body-semibold">Andi Wijaya</a>
                    </td>
                    <td>Laki-laki</td>
                    <td>1991-01-01</td>
                    <td>082316237123</td>
                    <td class="text-truncate">Jl. Kebon Jeruk No. 15, Jakarta</td>
                </tr>
                -->
              </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>