<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aksi Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #228B22;
        }

        .navbar-brand {
            font-size: 1.75rem;
            font-weight: bold;
            color: white;
        }

        .navbar-nav .nav-link {
            color: white;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #98FB98;
        }

        header {
            background-color: #2e7d32;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        .container {
            padding: 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 1rem;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .card-text {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 1rem;
        }

        .card-button {
            display: inline-block;
            background-color: #2e7d32;
            color: white;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 6px;
            font-size: 0.9rem;
        }

        .card-button:hover {
            background-color: #1b5e20;
        }

        .footer {
            background-color: #228B22;
            /* Forest green footer */
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }
        .buttoni{
            justify-content: center;
            text-align: center;
            display: flex;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">World Tree</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="finalproject.html">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="TentangKami.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="aksi.php">Aksi Kami</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="DataWilayah.php">Data Wilayah</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span> </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                        <li><a class="dropdown-item" href="index.php">Logout</a></li>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <img src="kampanye.jpg" alt="Kampanye Pohon">
            <div class="card-content">
                <div class="card-title">Kampanye Jaga Pohon</div>
                <div class="card-text">Mengedukasi masyarakat tentang pentingnya menjaga pohon untuk keseimbangan ekosistem.</div><br>
            </div>
        </div>

        <div class="card">
            <img src="foto2.jpg" alt="Adopsi Pohon">
            <div class="card-content">
                <div class="card-title">Program Adopsi Pohon</div>
                <div class="card-text">Memberikan kesempatan kepada individu dan organisasi untuk mengadopsi pohon dan
                    berkontribusi pada penghijauan.</div>
            </div>
        </div>

        <div class="card">
            <img src="foto3.jpg" alt="Edukasi Pohon">
            <div class="card-content">
                <div class="card-title">Edukasi Pelestarian Pohon</div>
                <div class="card-text">Menyelenggarakan workshop dan seminar tentang cara menanam dan merawat pohon dengan
                    baik.</div>
            </div>
        </div>
    </div>
    <div class="buttoni">
          <a href="finalproject.html" class="card-button">Kembali</a>
    </div>
    <br><br>

    <footer class="bg-dark text-white text-center p-3">
        <div class="clas">
            <p>Supported by Pigeon | Media Partners: Green Network, Kompasiana, Tribun News</p>
            <p>© 2023 Funhutan Indonesia - #JagaHutanJagaIklim</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>