<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/svg" href="assets/icon.svg">
    <title>Error - Health Track</title>
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

    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Terjadi Kesalahan!</h4>
            <p>Maaf, terjadi kesalahan saat mengirim data. Silakan coba lagi.</p>
            <hr>
            <p class="mb-0">Klik <a href="../tambah-pasien.php" class="alert-link">di sini</a> untuk kembali ke halaman sebelumnya.</p>
        </div>
    </div>
</body>
</html>
