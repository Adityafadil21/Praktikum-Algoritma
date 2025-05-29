<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Pohon Dunia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&family=Share+Tech&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-color: #f9f9f9;
        }

        .navbar-brand,
        .nav-link {
            font-family: 'Segoe UI', sans-serif;
        }

        .hero {
            height: 400px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            z-index: 1;
        }

        .container {
            max-width: 960px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .section {
            margin-bottom: 3rem;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .section:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
        }

        .section h2 {
            color: #2e7d32;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 0.5rem;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        ul li {
            position: relative;
            padding-left: 1.5em;
            margin-bottom: 0.5em;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
            margin-bottom: 1rem;
        }

        .card h4 {
            margin: 0.75rem 0 0.5rem;
            color: #333;
            font-size: 1.25rem;
        }

        .card p {
            margin: 0;
            font-size: 1rem;
            color: #555;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 4rem;
        }

        .btn-primary {
            background-color: #4caf50;
            border-color: #4caf50;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #388e3c;
            border-color: #388e3c;
        }

    body {
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
        line-height: 1.6;
        background-color: #f9f9f9;
    }

    .navbar-brand,
    .nav-link {
        font-family: 'Segoe UI', sans-serif;
    }

    .navbar-nav .nav-link {
            color: white;
            margin-right: 1rem;
            transition: color 0.3s ease;
     }

    .navbar-nav .nav-link:hover {
        color: #98FB98;
    }
    .bunga{
        font-style: italic;
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

        <section class="section">
            <h2>Apa Itu Pohon Dunia?</h2>
            <p class="bunga">
                Pohon Dunia adalah sebuah platform yang didedikasikan untuk meningkatkan kesadaran akan pentingnya pohon dan hutan bagi kehidupan kita. Kami percaya bahwa dengan edukasi dan aksi nyata, kita dapat menciptakan dunia yang lebih hijau dan berkelanjutan.
            </p>
        </section>

        <section class="section">
            <h2>Visi & Misi</h2>
            <ul>
                <li><strong>Visi:</strong> Menjadi garda terdepan dalam gerakan global untuk pelestarian pohon dan hutan.</li>
                <li><strong>Misi:</strong>
                    <ul>
                        <li>Mengedukasi masyarakat tentang manfaat pohon dan hutan.</li>
                        <li>Memfasilitasi adopsi pohon sebagai bentuk dukungan nyata.</li>
                        <li>Mengadakan kampanye dan acara untuk meningkatkan kesadaran lingkungan.</li>
                        <li>Berkolaborasi dengan komunitas dan organisasi lain untuk mencapai tujuan bersama.</li>
                    </ul>
                </li>
            </ul>
        </section>

        <section class="section">
            <h2>Tim Kami</h2>
            <div class="grid">
                <div class="card">
                    <img src="adit.jpg.jpg" alt="Adit Photo">
                    <h4>Adit</h4>
                </div>
                <div class="card">
                    <img src="fotohan.jpg" alt="Han Photo">
                    <h4>Han</h4>
                </div>
                </div>
        </section>

        <section class="section">
            <h2>Program Unggulan</h2>
            <ul>
                <li>Kampanye Jaga Pohon: Mengajak masyarakat untuk aktif dalam menjaga dan melestarikan pohon di sekitar mereka.</li>
                <li>Adopsi Pohon: Memberikan kesempatan kepada individu dan organisasi untuk mengadopsi pohon dan berkontribusi pada penghijauan.</li>
                <li>Kelas Suka Pohon: Program edukasi interaktif tentang pentingnya pohon dan cara merawatnya.</li>
                <li>Cerita dari Pohon: Mengumpulkan dan berbagi cerita inspiratif tentang hubungan manusia dengan pohon.</li>
                <li>Hari Pohon Dunia: Merayakan Hari Pohon Dunia dengan berbagai kegiatan yang meningkatkan kesadaran lingkungan.</li>
            </ul>
        </section>

        <section class="section">
            <h2>Hubungi Kami</h2>
            <p>
                Kami senang mendengar dari Anda! Jika Anda memiliki pertanyaan, saran, atau ingin berkolaborasi, jangan ragu untuk menghubungi kami.
            </p>
            <form action="TentangKami.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="Nama Anda">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email Anda">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control" id="message" rows="4" placeholder="Pesan Anda"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </section>

    </div>

   <footer class="bg-dark text-white text-center p-3">
        <div class="container">
            <p>Supported by Pigeon | Media Partners: Green Network, Kompasiana, Tribun News</p>
            <p>© 2023 Funhutan Indonesia - #JagaHutanJagaIklim</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>