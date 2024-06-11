<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/svg" href="assets/icon.svg">
    <title>Detail Pasien - Health Track</title>
</head>
<body>
    <?php
        include "config.php";
        $id = $_GET['id'];
        $curl= curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $base_url.'/pasien.php?id='.$id);
        $json = json_decode(curl_exec($curl), true);
    ?>
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

    <div class="container">
        <div class="d-flex row">
            <div class="navigasi mt-4 d-inline-flex gap-3 p-0">
                <a href="index.php">Dashboard</a>
                <a href="#">/</a>
                <a href="#">Detail Pasien</a>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <div>
                    <div style="display: flex; align-items: center; gap: 23px;">
                    <img src="assets/<?php echo($json['data'][0]['jenis_kelamin'] == 'Laki-laki' ? 'male' : 'female') ?>.png" width="64px" height="64px">
                        <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 10px;">
                            <div style="display: flex; align-items: center; gap: 48px;">
                                <h1><?php echo($json["data"][0]["nama"]); ?></h1>
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M6 19C6 19.5304 6.21071 20.0391 6.58579 20.4142C6.96086 20.7893 7.46957 21 8 21H16C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19V7H6V19ZM8 9H16V19H8V9ZM15.5 4L14.5 3H9.5L8.5 4H5V6H19V4H15.5Z" fill="#FF0000"/>
                                    </svg>
                                    <a href="do/delete-pasien-do.php?id=<?php echo $id; ?>" class="body-semibold" style="color: red; text-decoration: none;" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien?');">
                                        Hapus Pasien
                                    </a>
                                </div>
                            </div>
                            <div style="display: flex; align-items: flex-start; gap: 32px;">
                                <span class="detail-data-pasien">
                                    <?php echo($json["data"][0]["jenis_kelamin"]); ?>
                                </span>
                                <span class="detail-data-pasien">
                                    <?php echo($json["data"][0]["tgl_lahir"]); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="tambah-riwayat.php?id=<?php echo $id; ?>" class="button-primary">Tambah Riwayat</a>
                </div>
            </div>

            <div class="row mt-4 p-0">
                <form action="do/update-pasien-do.php" method="POST" class="col-sm-5 container-form" style="display: flex; padding: 24px; flex-direction: column; align-items: flex-start; gap: 24px;">
                    <div style="display: flex; align-items: center; gap: 16px;">
                        <img src="assets/ic_person.png" alt="">
                        <h2>Data Pasien</h2>
                    </div>
                    <input type="hidden" name="id_pasien" id="id_pasien" value="<?php echo $json["data"][0]["id_pasien"]; ?>">
                    <div class="d-flex flex-column gap-3 w-100">
                        <span class="body-reguler">Nama</span>
                        <input type="text" class="data-input form-control" name="nama" id="nama" value="<?php echo($json["data"][0]["nama"]); ?>">
                    </div>
                    <div class="d-flex flex-column gap-3 w-100">
                        <span class="body-reguler">Jenis Kelamin</span>
                        <select class="custom-dropdown form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="Laki-laki" <?php echo($json['data'][0]['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''); ?> >Laki-laki</option>
                            <option value="Perempuan" <?php echo($json['data'][0]['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''); ?> >Perempuan</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column gap-3 w-100">
                        <span class="body-reguler">Tanggal Lahir</span>
                        <input type="date" class="data-input form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo($json["data"][0]["tgl_lahir"]); ?>">
                    </div>
                    <div class="d-flex flex-column gap-3 w-100">
                        <span class="body-reguler">No. Telp</span>
                        <input type="text" class="data-input form-control" name="kontak" id="kontak" value="<?php echo($json["data"][0]["kontak"]); ?>">
                    </div>
                    <div class="d-flex flex-column gap-3 w-100">
                        <span class="body-reguler">Alamat</span>
                        <input type="text" class="data-input form-control" name="alamat" id="alamat" value="<?php echo($json["data"][0]["alamat"]); ?>">
                    </div>
                    <div class="d-flex align-items-center w-100">
                        <input type="submit" class="button-primary w-100" name="submit" value="Simpan">
                    </div>
                </form>
                <div class="col-sm-7 p-0">
                    <div class="ms-3 container-form" style="display: flex; padding: 24px; flex-direction: column; align-items: flex-start; gap: 24px;">
                        <div style="display: flex; align-items: center; gap: 16px;">
                            <img src="assets/ic_medical.svg" width="32px" alt="riwayat">
                            <h2 class="detail-data-pasien-teks">
                                Riwayat Pemeriksaan
                            </h2>
                        </div>
                        <div class="w-100">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal Periksa</th>
                                        <th>Diagnosa</th>
                                        <!-- <th>Dokter Pemeriksa</th> -->
                                    </tr>
                                </thead>
                                    <tr>
                                    </tr>
                                <tbody>
                                <?php
                                    $curl = curl_init();
                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($curl, CURLOPT_URL, $base_url.'/riwayat.php?id_pasien='.$id);
                                    $json = json_decode(curl_exec($curl), true);

                                    // Check if data array is empty
                                    if (empty($json['data'])) {
                                        echo "<tr><td colspan='2'>No records found</td></tr>";
                                    } else {
                                        // Loop through the data and display each row
                                        for ($i = 0; $i < count($json["data"]); $i++) {
                                            echo "<tr>";
                                            echo "<td><a href='detail-riwayat.php?id=".$json['data'][$i]['id_riwayat']."' class='body-semibold'>{$json['data'][$i]['Tanggal_Pemeriksaan']}</a></td>";
                                            echo "<td>{$json['data'][$i]['Diagnosis']}</td>";
                                            // echo "<td>{$json['data'][$i]['id_pasien']}</td>";
                                            echo "</tr>";
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>



</body>
</html>