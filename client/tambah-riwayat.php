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
                <a href="detail-pasien.php?id=<?php echo $_GET['id']; ?>">Detail Pasien</a>
                <a href="#">/</a>
                <a href="#">Tambah Riwayat</a>
            </div>
            <div class="d-inline-flex gap-3 mt-2 mb-2 align-items-center p-0">
                <img src="assets/ic_medical.svg" width="56px" alt="ic">
                <div class="d-inline-flex flex-column">
                    <h2>Tambah Riwayat Pemeriksaan</h2>
                    <span class="body gray">Andi Wijaya</span>
                </div>
            </div>

            <!-- form -->
            <form action="do/insert-riwayat-do.php" method="post" class="container-form d-flex row gap-3">
                <div class="row">
                    <input type="hidden" name="id_pasien" id="id_pasien" value="<?php echo $_GET['id']; ?>">
                    <input type="hidden" name="id_dokter" id="id_dokter" value="2">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Tanggal Pemeriksaan*</span>
                            <input type="date" class="data-input form-control" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Diagnosa*</span>
                            <select class="custom-dropdown form-control" name="diagnosis" id="diagnosis" required>
                                <option value="" disabled selected></option>
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
                            <input type="text" class="data-input form-control" name="tindakan" id="tindakan" required>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3 mt-lg-0">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Obat Yang Diresepkan*</span>
                            <input type="text" class="data-input form-control" name="obat" id="obat" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="d-flex flex-column gap-3">
                        <span class="body-reguler">Catatan</span>
                        <input type="text" class="data-input form-control" name="catatan" id="catatan">
                    </div>
                </div>
                <div class="d-inline-flex justify-content-end gap-3">
                    <a href="detail-pasien.php?id=<?php echo $_GET['id']; ?>" class="button-secondary w-auto">Batal</a>
                    <input type="submit" name="submit" class="button-primary w-auto" value="Tambah">
                </div>
            </form>
        </div>
        
    </div>  
</body>
</html>