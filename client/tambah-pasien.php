<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/svg" href="assets/icon.svg">
    <title>Tambah Pasien - Health Track</title>
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
                <a href="tambah-pasien.php">Tambah Pasien</a>
            </div>
            <div class="d-inline-flex gap-3 align-items-center p-0">
                <img src="assets/ic_person.png" alt="ic">
                <h2>Tambah Pasien</h2>
            </div>

            <!-- form -->
            <form class="container-form d-flex row gap-3" action="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Nama</span>
                            <input type="text" class="data-input form-control" name="nama" id="nama">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Gender</span>
                            <select class="custom-dropdown form-control">
                                <option value="" disabled selected></option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Tanggal Lahir</span>
                            <input type="date" class="data-input form-control" name="tanggal_lahir" id="tanggal_lahir">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3 mt-lg-0">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">No. Telpon</span>
                            <input type="text" class="data-input form-control" name="no_telepon" id="no_telepon">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="d-flex flex-column gap-3">
                        <span class="body-reguler">Alamat</span>
                        <input type="text" class="data-input form-control" name="alamat" id="alamat">
                    </div>
                </div>
                <div class="d-inline-flex justify-content-end gap-3">
                    <a href="index.php" class="button-secondary w-auto">Batal</a>
                    <input type="submit" class="button-primary w-auto" value="Tambah">
                </div>
            </form>
        </div>
        
    </div>



</body>
</html>