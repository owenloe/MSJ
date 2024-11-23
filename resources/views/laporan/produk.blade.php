<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px; /* Reduce font size */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 4px; /* Reduce padding */
            text-align: left;
            border: 1px solid #ddd;
            word-wrap: break-word; /* Ensure long words break to fit in the cell */
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Produk</h2>
    <table>
        <thead>
            <tr>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Kategori Produk</th>
                <th>Stok Produk</th>
                <th>Modal Produk</th>
                <th>Berat</th>
                <th>Jenis</th>
                <th>Ukuran</th>
                <th>Warna</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $produk)
                <tr>
                    <td>{{ $produk->id_produk }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->kategori_produk }}</td>
                    <td>{{ $produk->quantity_produk }}</td>
                    <td>{{ $produk->harga_produk }}</td>
                    <td>{{ $produk->berat }}</td>
                    <td>{{ $produk->jenis }}</td>
                    <td>{{ $produk->ukuran }}</td>
                    <td>{{ $produk->warna }}</td>
                    <td>{{ $produk->image }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>