<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan Baru dari Formulir Kontak</title>
    <style>
        /* Basic inline CSS for email compatibility */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
        strong {
            color: #555;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pesan Baru dari Formulir Kontak</h2>
        <p>Anda menerima pesan baru dari formulir kontak website UMKM Desa.</p>
        <p><strong>Nama:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Subjek:</strong> {{ $subject }}</p>
        <p><strong>Pesan:</strong></p>
        <p style="padding: 10px; border: 1px solid #eee; background-color: #f9f9f9; border-radius: 4px;">
            {{ $userMessage }} {{-- <--- UBAH VARIABEL INI! --}}
        </p>
        <p>Terima kasih.</p>
    </div>
    <div class="footer">
        <p>Ini adalah pesan otomatis, mohon jangan balas email ini.</p>
    </div>
</body>
</html>