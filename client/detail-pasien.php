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
                <a href="detail-pasien.html">Detail Pasien</a>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <div>
                    <div style="display: flex; align-items: center; gap: 23px;">
                        <img src="assets/male.png" width="64px" height="64px">
                        <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 10px;">
                            <div style="display: flex; align-items: center; gap: 48px;">
                                <h1>Andi Wijaya</h1>
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M6 19C6 19.5304 6.21071 20.0391 6.58579 20.4142C6.96086 20.7893 7.46957 21 8 21H16C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19V7H6V19ZM8 9H16V19H8V9ZM15.5 4L14.5 3H9.5L8.5 4H5V6H19V4H15.5Z" fill="#FF0000"/>
                                    </svg>
                                    <a href="" class="body-semibold" style="color: red; text-decoration: none;">
                                        Hapus Pasien
                                    </a>
                                </div>
                            </div>
                            <div style="display: flex; align-items: flex-start; gap: 32px;">
                                <span class="detail-data-pasien">
                                    Laki-laki
                                </span>
                                <span class="detail-data-pasien">
                                    1990-01-01
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="tambah-riwayat.html" class="button-primary">Tambah Riwayat</a>
                </div>
            </div>

            <div class="row mt-4 p-0">
                <div class="col-sm-5 container-form" style="display: flex; padding: 24px; flex-direction: column; align-items: flex-start; gap: 24px;">
                    <div style="display: flex; align-items: center; gap: 16px;">
                        <img src="assets/ic_person.png" alt="">
                        <h2>Data Pasien</h2>
                    </div>
                    <div class="d-flex flex-column gap-3 w-100">
                        <span class="body-reguler">Nama</span>
                        <input type="text" class="data-input form-control" name="tanggal_lahir" id="tanggal_lahir">
                    </div>
                    <div class="d-flex flex-column gap-3 w-100">
                        <span class="body-reguler">Gender</span>
                        <select class="custom-dropdown form-control">
                            <option value="" disabled selected></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column gap-3 w-100">
                        <span class="body-reguler">Tanggal Lahir</span>
                        <input type="text" class="data-input form-control" name="tanggal_lahir" id="tanggal_lahir">
                    </div>
                    <div class="d-flex flex-column gap-3 w-100">
                        <span class="body-reguler">No. Telp</span>
                        <input type="text" class="data-input form-control" name="tanggal_lahir" id="tanggal_lahir">
                    </div>
                    <div class="d-flex flex-column gap-3 w-100">
                        <span class="body-reguler">Alamat</span>
                        <input type="text" class="data-input form-control" name="tanggal_lahir" id="tanggal_lahir">
                    </div>
                    <div class="d-flex align-items-center w-100">
                        <input type="submit" class="button-primary w-100" value="Simpan">
                    </div>
                </div>
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
                                        <th>Dokter Pemeriksa</th>
                                    </tr>
                                </thead>
                                    <tr>
                                    </tr>
                                <tbody>
                                    <td><a href="detail-riwayat.html" class="body-semibold">21 September 2023</a></td>
                                    <td>Masuk Angin</td>
                                    <td>Dr. Sajahbandi</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>



</body>
</html>