<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keranjang</title>
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
        th {
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
        }
        th:nth-child(odd) {
            background-color: #45a049; /* Slightly darker green for odd columns */
        }
        th:nth-child(even) {
            background-color: #4CAF50; /* Green background for even columns */
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
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $keranjang)
                <tr>
                    <td>{{ $keranjang->id_keranjang }}</td>
                    <td>{{ $keranjang->userid }}</td>
                    <td>{{ $keranjang->nama_user }}</td>
                    <td>{{ $keranjang->id_produk }}</td>
                    <td>{{ $keranjang->nama_produk }}</td>
                    <td>{{ $keranjang->harga_produk }}</td>
                    <td>{{ $keranjang->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>