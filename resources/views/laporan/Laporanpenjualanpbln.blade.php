<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Laporan Penjualan</h1>

<table>
    <thead>
        <tr>
            <th>ID Kategori</th>
            <th>Jenis Kategori</th>
            <th>Nama Produk</th>
            <th>Total Quantity Sold</th>
            <th>Total Sales</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id_kategori }}</td>
                <td>{{ $item->jenis_kategori }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->total_quantity_sold }}</td>
                <td>{{ $item->total_sales }}</td> 
            </tr>
        @endforeach
    </tbody>
</table>

<div class="footer">
    <p>Dicetak pada: {{ date('Y-m-d H:i:s') }}</p>
</div>

</body>
</html>