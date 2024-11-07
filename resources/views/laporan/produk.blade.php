<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h2>Laporan Produk</h2>
    <table>
        <thead>
            <tr>
                <th>id_produk</th>
                <th>nama_produk</th>
                <th>kategori_produk</th>
                <th>quantity_produk</th>
                <th>harga_produk</th>
                <th>berat</th>
                <th>jenis</th>
                <th>ukuran</th>
                <th>warna</th>
                <th>image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $produk)
                <tr>
                    <td>{{ $produk->id_produk }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->kategori_produk}}</td>
                    <td>{{ $produk->quantity_produk }}</td>
                    <td>{{ $produk->harga_produk}}</td>
                    <td>{{ $produk->berat}}</td>
                    <td>{{ $produk->jenis}}</td>
                    <td>{{ $produk->ukuran}}</td>
                    <td>{{ $produk->warna}}</td>
                    <td>{{ $produk->image }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>