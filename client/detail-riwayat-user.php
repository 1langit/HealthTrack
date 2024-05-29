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
        <a href="dasbor-user.php"><img src="assets/logo.svg" alt="logo image"></a>
        <a href="" class="d-flex column gap-2 align-items-center hover-container text-decoration-none">
            <img src="assets/logout.svg" width="18px" alt="Logout">
            <span class="body" style="color: red;">Logout</span>
        </a>
    </div>

    <div class="container col-12">
        <div class="d-flex row gap-3 p-3">
            <div class="navigasi mt-4 d-inline-flex gap-3 p-0">
                <a href="dasbor-user.php">Dashboard</a>
                <a href="#">/</a>
                <a href="detail-riwayat-user.php">Detail Riwayat</a>
            </div>
            <div class="d-inline-flex gap-3 mt-2 mb-2 align-items-center p-0">
                <img src="assets/ic_medical.svg" height="56px" width="56px" alt="ic">
                <div class="d-inline-flex flex-column">
                    <div class="d-inline-flex flex-row align-itemns-center gap-5">
                        <h2>10 September 2023</h2>
                    </div>
                    <span class="body gray">Andi Wijaya  -  Riwayat Pemeriksaan</span>
                </div>

            </div>

            <div class="container-form mt-3 col-12 d-flex flex-wrap gap-5">
                <div class="d-flex flex-column gap-3 flex-fill">
                    <span class="body-reguler">Diagnosa</span>
                    <span class="body gray">Hipertensi</span>
                </div>
                <div class="d-flex flex-column gap-3 flex-fill">
                    <span class="body-reguler">Tindakan</span>
                    <span class="body gray">Pengukuran tekanan darah, EKG</span>
                </div>
                <div class="d-flex flex-column gap-3 flex-fill">
                    <span class="body-reguler">Obat Yang Diresepkan</span>
                    <span class="body gray">Amlodipine 10mg</span>
                </div>
                <div class="d-flex flex-column gap-3 flex-fill">
                    <span class="body-reguler">Catatan</span>
                    <span class="body gray">Perlu kontrol tekanan darah setiap bulan</span>
                </div>
            </div>
            
        </div>
        
    </div>  
</body>
</html>