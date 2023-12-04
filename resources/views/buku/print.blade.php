<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .resi-container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .resi-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .resi-details {
            margin-bottom: 20px;
        }

        .resi-details label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .resi-details span {
            display: block;
            margin-bottom: 10px;
        }

        .barcode {
            text-align: center;
            margin-top: 20px;
            clear: both;
        }

        .barcode img {
            max-width: 100%;
            height: auto;
        }

        .resi-sinopsis {
            border-top: 1px solid #ddd;
            padding-top: 20px;
            margin-top: 20px; /* Menambahkan margin atas pada .resi-sinopsis */
        }
    </style>
</head>
<body>
    <div class="resi-container">
        <div class="resi-header">
            <h2>Detail Buku</h2>
        </div>
        <div class="resi-details">
            <label>Kode:</label> <span>{{$buku->kode}}</span><br>
            <label>Judul:</label> <span>{{$buku->judul}}</span><br>
            <label>Pengarang:</label> <span>{{$buku->pengarang}}</span><br>
            <label>Jumlah Halaman:</label> <span>{{$buku->jumlah_halaman}}</span><br>
            <label>Tahun Terbit:</label> <span>{{$buku->tahun_terbit}}</span><br>
            <div class="barcode">
                {!! DNS1D::getBarcodeHTML('$ ' .$buku->kode, 'C39+') !!}
            </div>
        </div>
    </div>
</body>
</html>