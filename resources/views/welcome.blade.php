<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to My Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff; /* Change background color to white */
            color: #000; /* Change text color to black */
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main-container {
            background-color: #343a40; /* Change background color to dark grey */
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* Adjust shadow for lighter background */
            max-width: 800px;
            width: 90%;
            margin: 2rem;
            animation: fadeIn 1s ease-out;
            color: #fff; /* Change text color to white */
        }

        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo {
            max-width: 200px;
            height: auto;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out;
        }

        .header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        h1 {
            color: #fff; /* Change text color to white */
            font-size: 2.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out 0.2s;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .subtitle {
            color: #ddd; /* Change text color to light grey */
            font-size: 1.2rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.4s;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .business-description {
            background-color: #495057; /* Change background color to slightly lighter dark grey */
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2.5rem;
            text-align: left;
            animation: fadeInUp 1s ease-out 0.6s;
            opacity: 0;
            animation-fill-mode: forwards;
            transition: transform 0.3s ease;
        }

        .business-description:hover {
            transform: translateY(-5px);
        }

        .business-description h2 {
            color: #fff; /* Change text color to white */
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .business-description p {
            color: #ddd; /* Change text color to light grey */
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            font-size: 1.1rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease-out 0.8s;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .btn-primary {
            background-color: #4299e1;
            border-color: #4299e1;
            min-width: 200px;
        }

        .btn-primary:hover {
            background-color: #3182ce;
            border-color: #3182ce;
            transform: translateY(-2px);
            animation: pulse 1s infinite;
        }

        .btn i {
            margin-right: 0.5rem;
        }

        @media (max-width: 576px) {
            .main-container {
                padding: 2rem;
                margin: 1rem;
            }

            h1 {
                font-size: 2rem;
            }

            .btn {
                width: 100%;
            }

            .logo {
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="logo-container">
            <img src="{{ asset('logo.png') }}" alt="Company Logo" class="logo">
        </div>

        <div class="header">
            <h1>PT Medan Sentra Jaya</h1>
            <p class="subtitle">Sistem Informasi Penjualan LPG</p>
        </div>

        <div class="business-description">
            <h2>Tentang Kami</h2>
            <p>
                PT Sentra Medan Jaya adalah perusahaan distributor yang bergerak dalam bidang penjualan dan distribusi gas LPG (Liquefied Petroleum Gas) di wilayah Medan dan sekitarnya. Perusahaan ini menyediakan layanan penyaluran gas LPG untuk kebutuhan rumah tangga, industri, dan komersial, dengan komitmen untuk memberikan pelayanan yang aman, tepat waktu, dan profesional kepada seluruh pelanggan.
            </p>
        </div>

        <div class="text-center">
            <a href="http://127.0.0.1:8000/admin" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Login ke Panel Admin
            </a>
        </div>
    </div>
</body>
</html>