<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
        }
        .profile {
            display: inline-block;
            padding: 30px 40px;
            margin-top: 80px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            animation: fadeIn 1s ease-in-out;
        }
        .profile img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            border: 4px solid #74ebd5;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .profile img:hover {
            transform: scale(1.1);
        }
        .info {
            background: #f4f6fb;
            padding: 12px;
            margin: 12px 0;
            border-radius: 8px;
            font-size: 18px;
            color: #333;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.05);
            transition: background 0.3s ease;
        }
        .info:hover {
            background: #e1e7f5;
        }
        .label {
            font-weight: bold;
            color: #4a4e69;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="profile">
        <!-- Gambar profil -->
        <img src="{{ asset('gambar.png') }}" alt="Profile Picture">

        <!-- Data -->
        <div class="info"><span class="label">Nama:</span> {{ $nama }}</div>
        <div class="info"><span class="label">Kelas:</span> {{ $kelas }}</div>
        <div class="info"><span class="label">NPM:</span> {{ $npm }}</div>
    </div>
</body>
</html>
