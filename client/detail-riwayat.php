<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/svg" href="assets/icon.svg">
    <title>Detail Riwayat - Health Track</title>
</head>
<body>
    <?php
        include "config.php";
        $id = $_GET['id'];
        $curl= curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $base_url.'/riwayat.php?id_pasien='.$id);
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
        <div class="d-flex row gap-3">
            <div class="navigasi mt-4 d-inline-flex gap-3 p-0">
                <a href="index.php">Dashboard</a>
                <a href="#">/</a>
                <a href="detail-pasien.php">Detail Pasien</a>
                <a href="#">/</a>
                <a href="detail-riwayat.php">Detail Riwayat</a>
            </div>
            <div class="d-inline-flex gap-3 mt-2 mb-2 align-items-center p-0">
                <img src="assets/ic_medical.svg" height="56px" width="56px" alt="ic">
                <div class="d-inline-flex flex-column">
                    <div class="d-inline-flex flex-row align-itemns-center gap-5">
                        <h2><?php echo($json["data"][0]["Tanggal_Pemeriksaan"]); ?></h2>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M6 19C6 19.5304 6.21071 20.0391 6.58579 20.4142C6.96086 20.7893 7.46957 21 8 21H16C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19V7H6V19ZM8 9H16V19H8V9ZM15.5 4L14.5 3H9.5L8.5 4H5V6H19V4H15.5Z" fill="#FF0000"/>
                            </svg>
                            <a href="" class="body-semibold" style="color: red; text-decoration: none;">
                                Hapus Riwayat
                            </a>
                        </div>
                    </div>
                    <span class="body gray">Andi Wijaya  -  Riwayat Pemeriksaan</span>
                </div>

            </div>

            <!-- form -->
            <form class="container-form d-flex row gap-3" action="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Tanggal Pemeriksaan*</span>
                            <input type="date" class="data-input form-control" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" value="<?php echo($json["data"][0]["Tanggal_Pemeriksaan"]); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Diagnosa*</span>
                            <select class="custom-dropdown form-control">
                                <option value="<?php echo($json["data"][0]["Diagnosis"]); ?>" disabled selected></option>
                                <option value="Anemia">Anemia</option>
                                <option value="Hipertensi">Hipertensi</option>
                                <option value="Diabetes">Diabetes</option>
                                <option value="Migrain">Migrain</option>
                                <option value="Gangguan Saluran Pernapasan">Gangguan Saluran Pernapasan</option>
                                <option value="Asma">Asma</option>
                                <option value="Pneumonia">Pneumonia</option>
                                <option value="Jantung Koroner">Jantung Koroner</option>
                                <option value="Stroke">Stroke</option>
                                <option value="Kanker">Kanker</option>
                                <option value="COVID-19">COVID-19</option>
                                <option value="Infeksi Saluran Kemih">Infeksi Saluran Kemih</option>
                                <option value="Gagal Ginjal">Gagal Ginjal</option>
                                <option value="Gastroenteritis">Gastroenteritis</option>
                                <option value="TBC">TBC</option>
                                <option value="HIV/AIDS">HIV/AIDS</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Tindakan*</span>
                            <input type="text" class="data-input form-control" name="tindakan" id="tindakan" value="<?php echo($json["data"][0]["Tindakan"]); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3 mt-lg-0">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Obat Yang Diresepkan*</span>
                            <input type="text" class="data-input form-control" name="obat" id="obat" value="<?php echo($json["data"][0]["Obat_yang_Diresepkan"]); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="d-flex flex-column gap-3">
                        <span class="body-reguler">Catatan</span>
                        <input type="text" class="data-input form-control" name="catatan" id="catatan" value="<?php echo($json["data"][0]["Catatan"]); ?>">
                    </div>
                </div>
                <div class="d-inline-flex justify-content-end gap-3">
                    <a href="detail-pasien.php" class="button-secondary w-auto">Batal</a>
                    <input type="submit" class="button-primary w-auto" value="Perbarui">
                </div>
            </form>
        </div>
    </div>  
</body>
</html>