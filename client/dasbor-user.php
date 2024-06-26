<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/svg" href="assets/icon.svg">
    <title>Dasbor - Health Track</title>
</head>
<body>
    <div class="navbar">
        <a href="dasbor-user.php"><img src="assets/logo.svg" alt="logo image"></a>
        <a href="" class="d-flex column gap-2 align-items-center hover-container text-decoration-none">
            <img src="assets/logout.svg" width="18px" alt="Logout">
            <span class="body" style="color: red;">Logout</span>
        </a>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12 mb-4">
                <div class="container-form">
                    <div class="d-flex flex-row align-items-center gap-3">
                        <img src="assets/male.png" height="64px" alt="profil">
                        <div class="d-flex flex-column">
                            <h1>Andi Wijaya</h1>
                            <div class="d-flex flex-row gap-4">
                                <span class="body gray">Laki-laki</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex flex-column gap-4">
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Tanggal Lahir</span>
                            <span class="body gray">1990-01-01</span>
                        </div>
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">No. Telpon</span>
                            <span class="body gray">08123823872</span>
                        </div>
                        <div class="d-flex flex-column gap-3">
                            <span class="body-reguler">Alamat</span>
                            <span class="body gray">Jl. Kebon Jeruk No. 15, Jakarta</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 col-12 p-0">
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
                                <td><a href="detail-riwayat-user.php" class="body-semibold">21 September 2023</a></td>
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