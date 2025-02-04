<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling untuk tampilan */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }

        /* Container utama */
        .container-fluid {
            position: relative;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }

        /* Background Video */
        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        /* Overlay untuk membuat teks tetap terlihat */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        /* Box untuk konten */
        .content-box {
            position: relative;
            z-index: 2;
            padding: 20px;
            border-radius: 10px;
        }

        /* Styling tombol */
        .btn {
            margin: 10px;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <!-- Video Background -->
    <video autoplay muted loop class="video-background">
        <source src="{{ asset('videos/D.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Konten Tengah -->
    <div class="container-fluid">
        <div class="content-box">
            <h1 class="mb-3">Sistem Inventaris</h1>
            <p class="mb-4">Kelola aset dan stok dengan mudah dan efisien.</p>
            <div>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-light">Register</a>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
