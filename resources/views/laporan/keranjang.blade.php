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
    <h2>Laporan Keranjang</h2>
    <table>
        <thead>
            <tr>
                <th>ID Keranjang</th>
                <th>User ID</th>
                <th>Nama</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Unit Produk</th>
                <th>Image</th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $keranjang)
                <tr>
                    <td>{{ $keranjang->id_keranjang }}</td>
                    <td>{{ $keranjang->userid }}</td>
                    <td>{{ $keranjang->nama_user }}</td>
                    <td>{{ $keranjang->nama_produk }}</td>
                    <td>{{ $keranjang->harga_produk }}</td>
                    <td>{{ $keranjang->unit_produk }}</td>
                    <td>{{ $keranjang->image }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>